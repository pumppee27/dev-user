<?php

namespace App\Http\Controllers;

use App\Models\UserSamsatHistori;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class UserSamsatHistoriController extends Controller
{
    public function index(Request $request)
    {
        $data = UserSamsatHistori::join(
            'titik_layanan',
            'titik_layanan.lokasi_id',
            'user_samsat_histori.titik_layanan_id'
        )
            ->join('uppd', 'uppd.id', 'user_samsat_histori.uppd_id')
            ->select('uppd.*', 'titik_layanan.*', 'user_samsat_histori.*')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addIndexColumn()
                ->make(true);
        }
        return view('user-samsat-history.index');
    }
}
