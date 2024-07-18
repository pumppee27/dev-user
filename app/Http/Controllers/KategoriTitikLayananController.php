<?php

namespace App\Http\Controllers;

use App\Models\KategoriLayanan;
use App\Models\KategoriTitikLayanan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriTitikLayananController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Hapus Data!';
        $text = 'Anda akan menghapus data?';
        confirmDelete($title, $text);
        if ($request->ajax()) {
            return DataTables::of(KategoriTitikLayanan::query())
                ->addIndexColumn()
                ->addColumn('action', 'kategori-titik-layanan.btn-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('kategori-titik-layanan.index');
    }

    public function create()
    {
        return view('kategori-titik-layanan.tambah');
    }

    public function store(Request $request)
    {
        $rules = $request->validate(
            [
                'nama_kategori_titik_layanan' =>
                    'required|unique:kategori_titik_layanan,nama_kategori_titik_layanan',
            ],
            [
                'nama_kategori_titik_layanan.required' =>
                    'Kolom nama kategori titik layanan tidak boleh kosong',
                'nama_kategori_titik_layanan.unique' =>
                    'Nama kategori titik layanan sudah digunakan',
            ]
        );

        KategoriTitikLayanan::create($rules);
        return redirect(route('kategori-titik-layanan'))->with(
            'success',
            'Data berhasil disimpan'
        );
    }

    public function edit($id)
    {
        $kategoriTitikLayanan = KategoriTitikLayanan::find(decrypt($id));
        if (!$kategoriTitikLayanan) {
            Abort(404);
        }
        return view(
            'kategori-titik-layanan.ubah',
            compact('kategoriTitikLayanan')
        );
    }

    public function update(
        Request $request,
        KategoriTitikLayanan $kategoriTitikLayanan
    ) {
        $request->validate(
            [
                'nama_kategori_titik_layanan' =>
                    'required|unique:kategori_titik_layanan,nama_kategori_titik_layanan',
            ],
            [
                'nama_kategori_titik_layanan.required' =>
                    'Kolom nama kategori titik layanan tidak boleh kosong',
                'nama_kategori_titik_layanan.unique' =>
                    'Nama kategori titik layanan sudah digunakan',
            ]
        );

        $update = KategoriTitikLayanan::find($request->id);
        $update->nama_kategori_titik_layanan =
            $request->nama_kategori_titik_layanan;
        $update->updated_by = 1;
        $update->save();

        return redirect(route('kategori-titik-layanan'))->with(
            'success',
            'Data berhasil diubah'
        );
    }

    public function destroy($id)
    {
        $del = KategoriTitikLayanan::find($id);
        $del->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil dihapus',
        ]);
    }
}
