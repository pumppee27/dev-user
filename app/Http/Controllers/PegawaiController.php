<?php

namespace App\Http\Controllers;

use App\Models\KategoriPegawai;
use App\Models\Pegawai;
use App\Models\TitikLayanan;
use App\Models\Uppd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PegawaiController extends Controller
{
    // Index
    public function index(Request $request, Pegawai $pegawai)
    {
        if (Auth::user()->level_id == 1) {
            if ($request->ajax()) {
                $data = Pegawai::join('uppd', 'pegawai.uppd_id', 'uppd.id')
                    ->join(
                        'kategori_pegawai',
                        'pegawai.kategori_pegawai_id',
                        'kategori_pegawai.id'
                    )
                    ->select(
                        'pegawai.*',
                        'uppd.nama_uppd',
                        'kategori_pegawai.kategori_pegawai'
                    )
                    ->orderBy('id', 'asc')
                    ->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'pegawai.btn-action')
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            return view('pegawai.index');
        } else {
            return Abort(403);
        }
    }

    // Tambah
    public function create()
    {
        if (Auth::user()->level_id == 1) {
            $kategoriPegawai = KategoriPegawai::get();
            $uppd = Uppd::get();
            return view('pegawai.tambah', compact(['uppd', 'kategoriPegawai']));
        } else {
            return abort(403);
        }
    }

    public function getDataPegawai(TitikLayanan $titikLayanan, string $id)
    {
        $pegawai = Pegawai::where('uppd_id', $id)
            ->select('id', 'nama_pegawai')
            ->get();
        return response()->json([
            'data' => $pegawai,
        ]);
    }

    public function getDataTitikLayanan(TitikLayanan $titikLayanan, string $id)
    {
        $titikLayanan = TitikLayanan::where('uppd_id', $id)
            ->select('lokasi_id', 'nama_titik_layanan')
            ->get();
        return response()->json([
            'data' => $titikLayanan,
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->level_id == 1) {
            $rules = $request->validate(
                [
                    'uppd_id' => 'required',
                    'kategori_pegawai_id' => 'required',
                    'nama_pegawai' => 'required',
                    'nip' => 'required|unique:pegawai,nip',
                ],
                [
                    'uppd_id.required' => 'Silahkan pilih UPPD',
                    'kategori_pegawai_id.required' =>
                        'Silahkan pilih kategori pegawai',
                    'kategori_pegawai_id.required' =>
                        'Silahkan pilih kategori pegawai',
                    'nama_pegawai.required' =>
                        'Kolom nama pegawai tidak boleh kosong',
                    'nip.required' => 'Kolom NIP / NRP tidak boleh kosong',
                    'nip.unique' => 'NIP / NRP sudah digunakan',
                ]
            );

            Pegawai::create($rules);
            return redirect('pegawai')->with(
                'success',
                'Data berhasil disimpan'
            );
        } else {
            return abort(403);
        }
    }

    // Edit
    public function edit(Pegawai $pegawai, $id)
    {
        if (Auth::user()->level_id == 1) {
            $uppd = Uppd::get();
            $kategoriPegawai = KategoriPegawai::get();
            $pegawai = Pegawai::join('uppd', 'pegawai.uppd_id', 'uppd.id')
                ->join(
                    'kategori_pegawai',
                    'pegawai.kategori_pegawai_id',
                    'kategori_pegawai.id'
                )
                ->select(
                    'pegawai.*',
                    'uppd.nama_uppd',
                    'kategori_pegawai.kategori_pegawai'
                )
                ->find(decrypt($id));
            if (!$pegawai) {
                Abort(404);
            }

            return view(
                'pegawai.ubah',
                compact(['pegawai', 'uppd', 'kategoriPegawai'])
            );
        } else {
            return abort(403);
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->level_id == 1) {
            $request->validate(
                [
                    'uppd_id' => 'required',
                    'kategori_pegawai_id' => 'required',
                    'nama_pegawai' => 'required',
                    'nip' => 'required',
                ],
                [
                    'uppd_id.required' => 'Silahkan pilih UPPD',
                    'kategori_pegawai_id.required' =>
                        'Silahkan pilih kategori pegawai',
                    'kategori_pegawai_id.required' =>
                        'Silahkan pilih kategori pegawai',
                    'nama_pegawai.required' =>
                        'Kolom nama pegawai tidak boleh kosong',
                    'nip.required' => 'Kolom NIP / NRP tidak boleh kosong',
                ]
            );

            $update = Pegawai::find($id);
            $update->uppd_id = $request->uppd_id;
            $update->kategori_pegawai_id = $request->kategori_pegawai_id;
            $update->nama_pegawai = $request->nama_pegawai;
            $update->nip = $request->nip;
            $update->updated_by = Auth::user()->id;

            $update->save();
            return redirect(route('pegawai'))->with(
                'success',
                'Data berhasil diubah'
            );
        } else {
            return abort(403);
        }
    }

    // Hapus
    public function destroy($id)
    {
        if (Auth::user()->level_id == 1) {
            $del = Pegawai::find($id);
            $del->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Data berhasil dihapus',
            ]);
        } else {
            return abort(403);
        }
    }
}
