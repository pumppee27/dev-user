<?php

namespace App\Http\Controllers;

use App\Models\Uppd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UppdController extends Controller
{
    // Index
    public function index(Request $request, Uppd $uppd)
    {
        if ($request->ajax()) {
            return DataTables::of(Uppd::query())
                ->addIndexColumn()
                ->addColumn('action', 'uppd.btn-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        if (Auth::user()->level_id == 1) {
            return view('uppd.index', compact('uppd'));
        } else {
            return abort(403);
        }
    }

    public function create()
    {
        if (Auth::user()->level_id == 1) {
            return view('uppd.tambah');
        } else {
            return abort(403);
        }
    }

    public function store(Request $request)
    {
        $rules = $request->validate(
            [
                'nama_uppd' => 'required|unique:uppd,nama_uppd',
                'alamat' => 'required',
                'mapping_nopol' => 'required|max:5',
            ],
            [
                'nama_uppd.required' => 'Kolom Nama UPPD tidak boleh kosong',
                'nama_uppd.unique' => 'Nama UPPD sudah digunakan',
                'alamat.required' => 'Kolom Alamat UPPD tidak boleh kosong',
                'mapping_nopol.required' =>
                    'Kolom Mapping Nopol tidak boleh kosong',
                'mapping_nopol.max' => 'Maksimal 5 huruf',
            ]
        );
        if (Auth::user()->level_id == 1) {
            Uppd::create($rules);
            return redirect('/uppd')->with('success', 'Data berhasil disimpan');
        } else {
            return abort(403);
        }
    }

    public function edit($id)
    {
        $uppd = Uppd::find(decrypt($id));
        if (!$uppd) {
            Abort(404);
        }
        if (Auth::user()->level_id == 1) {
            return view('uppd.ubah', compact('uppd'));
        } else {
            return abort(403);
        }
    }

    public function update(Request $request, Uppd $uppd)
    {
        if (Auth::user()->level_id == 1) {
            if ($request->nama_uppd == $uppd->nama_uppd) {
                $request->validate(
                    [
                        'nama_uppd' => 'required|unique:uppd,nama_uppd',
                        'alamat' => 'required',
                        'mapping_nopol' => 'required|max:5',
                    ],
                    [
                        'nama_uppd.required' =>
                            'Kolom Nama UPPD tidak boleh kosong',
                        'nama_uppd.unique' => 'Nama UPPD sudah digunakan',
                        'alamat.required' =>
                            'Kolom Alamat UPPD tidak boleh kosong',
                        'mapping_nopol.required' =>
                            'Kolom Mapping Nopol tidak boleh kosong',
                        'mapping_nopol.max' => 'Maksimal 5 huruf',
                    ]
                );
            } else {
                $request->validate(
                    [
                        'alamat' => 'required',
                        'mapping_nopol' => 'required|max:5',
                    ],
                    [
                        'alamat.required' =>
                            'Kolom Alamat UPPD tidak boleh kosong',
                        'mapping_nopol.required' =>
                            'Kolom Mapping Nopol tidak boleh kosong',
                        'mapping_nopol.max' => 'Maksimal 5 huruf',
                    ]
                );
            }

            $update = Uppd::find($request->id);
            $update->nama_uppd = $request->nama_uppd;
            $update->alamat = $request->alamat;
            $update->mapping_nopol = $request->mapping_nopol;
            $update->updated_by = Auth::user()->id;
            $update->save();

            return redirect('/uppd')->with('success', 'Data berhasil diubah');
        } else {
            return abort(403);
        }
    }

    public function getData(Uppd $uppd)
    {
        $uppd = Uppd::where(
            'nama_uppd',
            'LIKE',
            '%' . request('q') . '%'
        )->get();
        return response()->json([
            'data' => $uppd,
        ]);
    }

    public function destroy($id)
    {
        if (Auth::user()->level_id == 1) {
            $del = Uppd::find($id);
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
