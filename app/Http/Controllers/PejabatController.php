<?php

namespace App\Http\Controllers;

use App\Models\Pejabat;
use App\Models\Uppd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PejabatController extends Controller
{
    public function index(Request $request, Pejabat $pejabat)
    {
        if (Auth::user()->level_id == 1) {
            if ($request->ajax()) {
                $data = Pejabat::join('uppd', 'uppd.id', 'pejabat.uppd_id')
                    ->select('pejabat.*', 'uppd.nama_uppd')
                    ->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'pejabat.btn-action')
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
            }
            return view('pejabat.index', compact('pejabat'));
        } else {
            return abort(403);
        }
    }

    public function create()
    {
        if (Auth::user()->level_id == 1) {
            $uppd = Uppd::get();
            return view('pejabat.tambah', compact('uppd'));
        } else {
            return abort(403);
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->level_id == 1) {
            $rules = $request->validate(
                [
                    'uppd_id' => 'required',
                    'ka_uppd' => 'required',
                    'nip_ka_uppd' => 'required',
                    'plt_ka_uppd' => '',
                    'kasi_pkb' => 'required',
                    'nip_kasi_pkb' => 'required',
                    'plt_kasi_pkb' => '',
                    'bend_penerimaan' => 'required',
                    'nip_bend_penerimaan' => 'required',
                ],
                [
                    'uppd_id.required' => 'UPPD harus dipilih',
                    'ka_uppd.required' =>
                        'Kolom Kepala UPPD tidak boleh kosong',
                    'nip_ka_uppd.required' =>
                        'Kolom NIP Kepala UPPD tidak boleh kosong',
                    'nip_kasi_pkb.required' =>
                        'Kolom NIP Kasi PKB tidak boleh kosong',
                    'nip_bend_penerimaan.required' =>
                        'Kolom NIP Bendahara Penerimaan tidak boleh kosong',
                    'kasi_pkb.required' => 'Kolom Kasi PKB tidak boleh kosong',
                    'bend_penerimaan.required' =>
                        'Kolom Bendahara Penerimaan tidak boleh kosong',
                ]
            );

            Pejabat::create($rules);
            return redirect('/pejabat')->with(
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
            $pejabat = Pejabat::find(decrypt($id));

            if (!$pejabat) {
                Abort(404);
            }
            return view('pejabat.ubah', compact(['pejabat']));
        } else {
            return abort(403);
        }
    }

    public function update(Request $request)
    {
        if (Auth::user()->level_id == 1) {
            $request->validate(
                [
                    'uppd_id' => 'required',
                    'ka_uppd' => 'required',
                    'nip_ka_uppd' => 'required',
                    'plt_ka_uppd' => '',
                    'kasi_pkb' => 'required',
                    'nip_kasi_pkb' => 'required',
                    'plt_kasi_pkb' => '',
                    'bend_penerimaan' => 'required',
                    'nip_bend_penerimaan' => 'required',
                ],
                [
                    'uppd_id.required' => 'UPPD harus dipilih',
                    'ka_uppd.required' =>
                        'Kolom Kepala UPPD tidak boleh kosong',
                    'nip_ka_uppd.required' =>
                        'Kolom NIP Kepala UPPD tidak boleh kosong',
                    'nip_kasi_pkb.required' =>
                        'Kolom NIP Kasi PKB tidak boleh kosong',
                    'nip_bend_penerimaan.required' =>
                        'Kolom NIP Bendahara Penerimaan tidak boleh kosong',
                    'kasi_pkb.required' => 'Kolom Kasi PKB tidak boleh kosong',
                    'bend_penerimaan.required' =>
                        'Kolom Bendahara Penerimaan tidak boleh kosong',
                ]
            );

            $update = Pejabat::find($request->id);
            $update->uppd_id = $request->uppd_id;
            $update->ka_uppd = $request->ka_uppd;
            $update->nip_ka_uppd = $request->nip_ka_uppd;
            $update->plt_ka_uppd = $request->plt_ka_uppd;
            $update->kasi_pkb = $request->kasi_pkb;
            $update->nip_kasi_pkb = $request->nip_kasi_pkb;
            $update->plt_kasi_pkb = $request->plt_kasi_pkb;
            $update->bend_penerimaan = $request->bend_penerimaan;
            $update->nip_bend_penerimaan = $request->nip_bend_penerimaan;
            $update->updated_by = Auth::user()->id;
            $update->save();

            return redirect('/pejabat')->with(
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
            $del = Pejabat::find($id);
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
