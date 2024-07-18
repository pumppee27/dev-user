<?php

namespace App\Http\Controllers;

use App\Models\KategoriTitikLayanan;
use App\Models\TitikLayanan;
use App\Models\Uppd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TitikLayananController extends Controller
{
    // Index
    public function index(Request $request, TitikLayanan $titikLayanan)
    {
        if (Auth::user()->level_id == 1) {
            if ($request->ajax()) {
                $data = TitikLayanan::join(
                    'uppd',
                    'titik_layanan.uppd_id',
                    'uppd.id'
                )
                    ->join(
                        'kategori_titik_layanan',
                        'titik_layanan.kategori_titik_layanan_id',
                        'kategori_titik_layanan.id'
                    )
                    ->select(
                        'titik_layanan.*',
                        'uppd.nama_uppd',
                        'kategori_titik_layanan.*'
                    )
                    ->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'titik-layanan.btn-action')
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('titik-layanan.index');
        } else {
            return abort(403);
        }
    }

    // Tambah
    public function create()
    {
        if (Auth::user()->level_id == 1) {
            $uppd = Uppd::get();
            $kategoriTitikLayanan = KategoriTitikLayanan::get();
            return view(
                'titik-layanan.tambah',
                compact(['uppd', 'kategoriTitikLayanan'])
            );
        } else {
            return abort(403);
        }
    }

    // Store
    public function store(Request $request)
    {
        if (Auth::user()->level_id == 1) {
            $rules = $request->validate(
                [
                    'lokasi_id' => 'required|numeric',
                    'uppd_id' => 'required',
                    'kategori_titik_layanan_id' => 'required',
                    'nama_titik_layanan' => 'required',
                ],
                [
                    'lokasi_id.required' => 'Lokasi id tidak boleh kosong',
                    'uppd_id.required' => 'Silahkan pilih UPPD',
                    'kategori_titik_layanan.required' =>
                        'Silahkan pilih kategori titik layanan',
                    'nama_titik_layanan.required' =>
                        'Kolom nama titik layanan tidak boleh kosong',
                ]
            );

            TitikLayanan::create($rules);

            return redirect(route('titik-layanan'))->with(
                'success',
                'Data berhasil disimpan'
            );
        } else {
            return abort(403);
        }
    }

    // Edit
    public function edit($lokasi_id)
    {
        if (Auth::user()->level_id == 1) {
            $uppd = Uppd::get();
            $kategoriTitikLayanan = KategoriTitikLayanan::get();
            $titikLayanan = TitikLayanan::join(
                'uppd',
                'uppd.id',
                'titik_layanan.uppd_id'
            )
                ->join(
                    'kategori_titik_layanan',
                    'titik_layanan.kategori_titik_layanan_id',
                    'kategori_titik_layanan.id'
                )
                ->select(
                    'titik_layanan.*',
                    'uppd.nama_uppd',
                    'kategori_titik_layanan.kategori_titik_layanan'
                )
                ->find(decrypt($lokasi_id));

            if (!$titikLayanan) {
                Abort(404);
            }

            return view(
                'titik-layanan.ubah',
                compact(['titikLayanan', 'uppd', 'kategoriTitikLayanan'])
            );
        } else {
            return abort(403);
        }
    }

    // Update
    public function update(Request $request, $lokasi_id)
    {
        if (Auth::user()->level_id == 1) {
            $request->validate(
                [
                    'uppd_id' => 'required',
                    'kategori_titik_layanan_id' => 'required',
                    'nama_titik_layanan' => 'required',
                ],
                [
                    'uppd_id.required' => 'Silahkan pilih UPPD',
                    'kategori_titik_layanan_id.required' =>
                        'Silahkan pilih kategori titik layanan',
                    'nama_titik_layanan.required' =>
                        'Kolom nama titik layanan tidak boleh kosong',
                ]
            );

            $update = TitikLayanan::find($lokasi_id);
            $update->uppd_id = $request->uppd_id;
            $update->kategori_titik_layanan_id =
                $request->kategori_titik_layanan_id;
            $update->nama_titik_layanan = $request->nama_titik_layanan;
            $update->updated_by = Auth::user()->id;
            $update->save();
            return redirect(route('titik-layanan'))->with(
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
            $del = TitikLayanan::find($id);
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
