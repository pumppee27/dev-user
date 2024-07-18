<?php

namespace App\Http\Controllers;

use App\Models\KategoriPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KategoriPegawaiController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->level_id == 1) {
            if ($request->ajax()) {
                return DataTables::of(KategoriPegawai::query())
                    ->addIndexColumn()
                    ->addColumn('action', 'kategori-pegawai.btn-action')
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
            }
            return view('kategori-pegawai.index');
        } else {
            return abort(403);
        }
    }

    public function create()
    {
        if (Auth::user()->level_id == 1) {
            return view('kategori-pegawai.tambah');
        } else {
            return abort(403);
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->level_id == 1) {
            $rules = $request->validate(
                [
                    'kategori_pegawai' =>
                        'required|unique:kategori_pegawai,kategori_pegawai',
                ],
                [
                    'kategori_pegawai.required' =>
                        'Kolom kategori pegawai tidak boleh kosong',
                    'kategori_pegawai.unique' =>
                        'Nama kategori pegawai sudah digunakan',
                ]
            );

            KategoriPegawai::create($rules);
            return redirect(route('kategori-pegawai'))->with(
                'success',
                'Data berhasil disimpan'
            );
        } else {
            return abort(403);
        }
    }

    public function edit($id)
    {
        if (Auth::user()->level_id == 1) {
            $kategoriPegawai = KategoriPegawai::find(decrypt($id));
            if (!$kategoriPegawai) {
                Abort(404);
            }
            return view('kategori-pegawai.ubah', compact('kategoriPegawai'));
        } else {
            return abort(403);
        }
    }

    public function update(Request $request, KategoriPegawai $kategoriPegawai)
    {
        if (Auth::user()->level_id == 1) {
            $request->validate(
                [
                    'kategori_pegawai' =>
                        'required|unique:kategori_pegawai,kategori_pegawai',
                ],
                [
                    'kategori_pegawai.required' =>
                        'Kolom kategori pegawai tidak boleh kosong',
                    'kategori_pegawai.unique' =>
                        'Nama kategori pegawai sudah digunakan',
                ]
            );

            $update = KategoriPegawai::find($request->id);
            $update->kategori_pegawai = $request->kategori_pegawai;
            $update->updated_by = 1;
            $update->save();

            return redirect(route('kategori-pegawai'))->with(
                'success',
                'Data berhasil diubah'
            );
        } else {
            return abort(403);
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->level_id == 1) {
            $del = KategoriPegawai::find($id);
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
