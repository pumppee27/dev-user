<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

use function PHPUnit\Framework\returnSelf;

class LevelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Level::query())
                ->addIndexColumn()
                ->addColumn('action', 'level.btn-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('level.index');
        // return response()->json([
        //     'success' => true,
        //     'data' => $level,
        // ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'level' => 'required|unique:levels,level',
            ],
            [
                'level.required' => 'Kolom level harus diisi!',
                'level.unique' => 'Nama level sudah digunakan',
            ]
        );

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $level = Level::create([
            'level' => $request->level,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data' => $level,
        ]);
    }

    public function show(Level $level)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Level',
            'data' => $level,
        ]);
    }

    public function edit($id)
    {
        $level = Level::find($id);
        if (!$level) {
            Abort(404);
        }
        return $level;
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'level' => 'required|unique:levels,level',
            ],
            [
                'level.required' => 'Kolom level harus diisi!',
                'level.unique' => 'Nama level sudah digunakan',
            ]
        );

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $update = Level::find($id);
            $update->level = $request->level;
            $update->save();

            return response()->json([
                'status' => 200,
                'message' => 'Level berhasil diubah',
            ]);
        }
    }

    public function destroy(string $id)
    {
        $del = Level::find($id);
        $del->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil dihapus',
            'data' => $id,
        ]);
    }

    public function getData(Level $level)
    {
        $level = Level::where('level', 'LIKE', '%' . request('q') . '%')->get();
        return response()->json([
            'data' => $level,
        ]);
    }
}
