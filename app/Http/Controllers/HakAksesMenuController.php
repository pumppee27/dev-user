<?php

namespace App\Http\Controllers;

use App\Models\HakAksesMenu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HakAksesMenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(HakAksesMenu::query())
                ->addIndexColumn()
                ->addColumn('action', 'hak-akses-menu.btn-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('hak-akses-menu.index');
    }

    public function create()
    {
        return view('hak-akses-menu.tambah');
    }

    public function store(Request $request)
    {
        $rules = $request->validate(
            [
                'hak_akses_menu' =>
                    'required|unique:hak_akses_menu,hak_akses_menu',
            ],
            [
                'hak_akses_menu.required' =>
                    'Kolom hak akses menu tidak boleh kosong',
                'hak_akses_menu.unique' =>
                    'Nama hak akses menu sudah digunakan',
            ]
        );

        HakAksesMenu::create($rules);
        return redirect(route('hak-akses-menu'))->with(
            'success',
            'Data berhasil disimpan'
        );
    }

    public function edit($id)
    {
        $hakAksesMenu = HakAksesMenu::find(decrypt($id));
        if (!$hakAksesMenu) {
            Abort(404);
        }
        return view('hak-akses-menu.ubah', compact('hakAksesMenu'));
    }

    public function update(Request $request, HakAksesMenu $hakAksesMenu)
    {
        $request->validate(
            [
                'hak_akses_menu' =>
                    'required|unique:hak_akses_menu,hak_akses_menu',
            ],
            [
                'hak_akses_menu.required' =>
                    'Kolom hak akses menu tidak boleh kosong',
                'hak_akses_menu.unique' =>
                    'Nama hak akses menu sudah digunakan',
            ]
        );

        $update = HakAksesMenu::find($request->id);
        $update->hak_akses_menu = $request->hak_akses_menu;
        $update->updated_by = 1;
        $update->save();

        return redirect(route('hak-akses-menu'))->with(
            'success',
            'Data berhasil diubah'
        );
    }

    public function destroy($id)
    {
        $del = HakAksesMenu::find($id);
        $del->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil dihapus',
        ]);
    }
}
