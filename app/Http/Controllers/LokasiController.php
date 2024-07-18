<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Lokasi;
use App\Models\Uppd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class LokasiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $lokasi = Lokasi::join(
                'levels',
                'lokasi.level_id',
                '=',
                'levels.id'
            )
                ->join('uppd', 'lokasi.uppd_id', '=', 'uppd.id')
                ->select('levels.level', 'lokasi.*', 'uppd.nama_uppd')
                ->get();
            return DataTables::of($lokasi)
                ->addIndexColumn()
                ->addColumn('action', 'lokasi.btn-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('lokasi.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'level_id' => 'required',
                'uppd_id' => 'required',
                'kode_lokasi' => 'required',
                'lokasi' => 'required',
            ],
            [
                'level_id.required' => 'Silahkan pilih level',
            ]
        );

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = Lokasi::create([
            'level_id' => $request->level_id,
            'uppd_id' => $request->uppd_id,
            'kode_lokasi' => $request->kode_lokasi,
            'lokasi' => $request->lokasi,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data' => $data,
        ]);
    }

    public function show(Request $request, Lokasi $lokasi)
    {
        if ($request->ajax) {
            Lokasi::join('levels', 'lokasi.level_id', '=', 'levels.id')
                ->join('uppd', 'lokasi.uppd_id', '=', 'uppd.id')
                ->select(
                    'levels.level',
                    'levels.id',
                    'lokasi.*',
                    'uppd.nama_uppd',
                    'uppd.id'
                )
                ->get();
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Level',
                'data' => $lokasi,
            ]);
        }
        return view('uppd.modal.detail-uppd', compact('lokasi'));
    }

    public function edit(Lokasi $lokasi)
    {
        Lokasi::find($lokasi);
        if (!$lokasi) {
            Abort(404);
        }
        return $lokasi;
    }
}
