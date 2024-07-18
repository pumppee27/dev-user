<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use App\Models\Level;
use App\Models\Pegawai;
use App\Models\SubHakAkses;
use App\Models\TitikLayanan;
use App\Models\Uppd;
use App\Models\UserSamsat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserSamsatController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->level_id == 2) {
            $data = UserSamsat::where('created_by', Auth::user()->id);
        } else {
            $data = UserSamsat::get();
        }

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'is_active',
                    '<span class="badge. @if ($is_active) ? badge text-bg-success @else badge text-bg-danger @endif.">@if ($is_active) Aktif @else Tidak Aktif @endif</span>'
                )
                ->addColumn('action', 'user-samsat.btn-action')
                ->rawColumns(['action', 'is_active'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('user-samsat.index', compact('data'));
    }

    public function create()
    {
        $hak_akses = HakAkses::get();
        $sub_hak_akses = SubHakAkses::get();
        $uppd = Uppd::get();
        return view(
            'user-samsat.tambah',
            compact(['uppd', 'hak_akses', 'sub_hak_akses'])
        );
    }

    public function store(Request $request)
    {
        $rules = $request->validate(
            [
                'uppd_id' => 'required',
                'titik_layanan_id' => 'required',
                'pegawai_id' => 'required',
                'nama_alias' => 'required',
                'password' => 'required|confirmed|min:8|regex:/^[\w-]*$/',
                'password_confirmation' => 'required',
                'hak_akses_id' => '',
                'sub_hak_akses_id' => '',
                'is_active' => '',
                'created_by' => '',
                'updated_by' => '',
                'deleted_at' => '',
            ],
            [
                'pegawai_id.required' => 'Pegawai harus dipilih',
                'nama_alias.required' => 'Nama alias tidak boleh kosong',
                'password_confirmation.required' =>
                    'Konfirmasi password tidak boleh kosong',
                'password.confirmed' => 'Konfimasi password tidak sesuai',
                'password.min' => 'Password minimal 6 karakter',
                'password.regex' => 'Password harus kombinasi huruf dan angka',
            ]
        );

        $rules['password'] = Hash::make($request->password);

        $rules['hak_akses_id'] = join(',', $request->hak_akses_id);
        if (empty($request->sub_hak_akses_id)) {
            $rules['sub_hak_akses_id'] = null;
        } else {
            $rules['sub_hak_akses_id'] = join(',', $request->sub_hak_akses_id);
        }
        $rules['created_by'] = Auth::user()->id;

        UserSamsat::create($rules);
        return redirect('/user_samsat')->with(
            'success',
            'Data berhasil ditambah'
        );
    }

    public function is_active(Request $request, string $id)
    {
        $is_active = UserSamsat::find($id);

        // $rules = $request->validate(['is_active' => 'required']);
        // UserSamsat::where('id', $is_active->id)->update($rules);
        if ($is_active) {
            if ($is_active->is_active) {
                $is_active->is_active = 0;
            } else {
                $is_active->is_active = 1;
            }
        }
        $is_active->save();
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil diubah',
        ]);
    }

    public function edit($id)
    {
        $user_samsat = UserSamsat::join(
            'uppd',
            'uppd.id',
            'user_samsat.uppd_id'
        )
            ->join(
                'titik_layanan',
                'titik_layanan.lokasi_id',
                'user_samsat.titik_layanan_id'
            )
            ->join('pegawai', 'pegawai.id', 'user_samsat.pegawai_id')
            ->select('user_samsat.*', 'uppd.*', 'titik_layanan.*', 'pegawai.*')
            ->find(decrypt($id));
        $hak_akses = HakAkses::get();
        $sub_hak_akses = SubHakAkses::get();
        $titikLayanan = TitikLayanan::where(
            'uppd_id',
            $user_samsat->uppd_id
        )->get();
        $pegawai = Pegawai::where('id', $user_samsat->pegawai_id)->get();
        if (!$user_samsat) {
            Abort(404);
        }
        return view(
            'user-samsat.ubah',
            compact([
                'user_samsat',
                'hak_akses',
                'sub_hak_akses',
                'titikLayanan',
                'pegawai',
            ])
        );
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'uppd_id' => 'required',
                'titik_layanan_id' => 'required',
                'pegawai_id' => 'required',
                'nama_alias' => 'required',
                'hak_akses_id' => '',
                'sub_hak_akses_id' => '',
                'is_active' => '',
            ],
            [
                'uppd_id.required' => 'UPPD harus dipilih',
                'titik_layanan_id.required' => 'Titik Layanan harus dipilih',
                'pegawai_id.required' => 'Pegawai harus dipilih',
                'nama_alias.required' => 'Nama alias tidak boleh kosong',
            ]
        );

        $update = UserSamsat::find($request->id);
        if (!empty($request->password && $request->password_confirmation)) {
            $request->validate(
                [
                    'password' => 'required|confirmed|min:6',
                    'password_confirmation' => 'required',
                ],
                [
                    'password_confirmation.required' =>
                        'Konfirmasi password tidak boleh kosong',
                    'password.confirmed' => 'Konfimasi password tidak sesuai',
                    'password.min' => 'Password minimal 6 karakter',
                ]
            );

            $update->password = Hash::make($request->password);
        }

        $update->uppd_id = $request->uppd_id;
        $update->titik_layanan_id = $request->titik_layanan_id;
        $update->pegawai_id = $request->pegawai_id;
        $update->nama_alias = $request->nama_alias;
        $update->hak_akses_id = join(',', $request->hak_akses_id);
        if (empty($request->sub_hak_akses_id)) {
            $update->sub_hak_akses_id = '';
        } else {
            $update->sub_hak_akses_id = join(',', $request->sub_hak_akses_id);
        }
        $update->created_by = Auth::user()->id;
        $update->updated_by = Auth::user()->id;
        $update->save();

        return redirect('/user_samsat')->with(
            'success',
            'Data berhasil diubah'
        );
    }

    public function destroy($id)
    {
        $del = UserSamsat::find($id);
        $del->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil dihapus',
        ]);
    }
}
