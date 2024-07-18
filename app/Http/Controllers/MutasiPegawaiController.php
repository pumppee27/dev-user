<?php

namespace App\Http\Controllers;

use App\Models\MutasiPegawai;
use App\Models\Uppd;
use App\Models\UserSamsat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MutasiPegawaiController extends Controller
{
    public function index(Request $request)
    {
        $data = MutasiPegawai::join(
            'pegawai',
            'mutasi_pegawai.pegawai_id',
            'pegawai.id'
        )
            ->select('mutasi_pegawai.*', 'pegawai.nama_pegawai')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', 'mutasi.btn-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('mutasi.index');
    }

    public function create()
    {
        $uppd = Uppd::get();
        return view('mutasi.tambah', compact(['uppd']));
    }

    public function store(Request $request)
    {
        $rules = $request->validate(
            [
                'uppd_id' => 'required',
                'pegawai_id' => 'required',
                'jenis_mutasi' => 'required',
                'uppd_tujuan' => '',
            ],
            [
                'uppd_id.required' => 'Silahkan pilih UPPD',
                'pegawai_id.required' => 'Silahkan pilih pegawai',
                'jenis__mutasi.required' => 'Silahkan pilih jenis mutasi',
            ]
        );
        MutasiPegawai::create($rules);
        $del = UserSamsat::find($rules['pegawai_id']);
        $del->delete();
        return redirect('pegawai')->with('success', 'Data berhasil disimpan');
    }
}
