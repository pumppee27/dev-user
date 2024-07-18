<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\IsEmpty;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request, User $user)
    {
        if (Auth::user()->level_id == 1) {
            if ($request->ajax()) {
                return DataTables::of(User::query())
                    ->addIndexColumn()
                    ->addColumn('action', 'pengguna.btn-action')
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
            }
            return view('pengguna.index', compact(['user']));
        } else {
            return abort(403);
        }
    }

    public function create()
    {
        if (Auth::user()->level_id == 1) {
            $level = Level::get();
            return view('pengguna.tambah', compact(['level']));
        } else {
            return abort(403);
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->level_id == 1) {
            $rules = $request->validate(
                [
                    'level_id' => 'required',
                    'name' => 'required',
                    'username' => 'required',
                    'password' => [
                        'required',
                        'min:8',
                        'regex:/^(?=.*[a-z])(?=.*[0-9]).+$/',
                    ],
                    'password_confirmation' => 'required',
                    'created_by' => '',
                ],
                [
                    'level_id.required' => 'Silahkan pilih level',
                    'name.required' => 'Kolom nama tidak boleh kosong',
                    'username.required' => 'Kolom username tidak boleh kosong',
                    'password.required' => 'Password tidak boleh kosong',
                    'password_confirmation.required' =>
                        'Konfimasi password tidak boleh kosong',
                    'password.confirmed' => 'Konfimasi password tidak sesuai',
                    'password.min' => 'Password minimal 8 karakter',
                    'password.regex' =>
                        'Password harus kombinasi huruf dan angka',
                ]
            );

            $rules['password'] = Hash::make($request->password);
            $rules['created_by'] = Auth::user()->id;

            User::create($rules);

            return redirect('/pengguna')->with(
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
            $user = User::find(decrypt($id));
            if (!$user) {
                Abort(404);
            }
            return view('pengguna.ubah', compact('user'));
        } else {
            return abort(403);
        }
    }

    public function update(Request $request)
    {
        if (Auth::user()->level_id == 1) {
            $request->validate(
                [
                    'name' => 'required',
                    'username' => 'required',
                ],
                [
                    'name.required' => 'Kolom nama tidak boleh kosong',
                    'username.required' => 'Kolom username tidak boleh kosong',
                ]
            );
            $update = User::find($request->id);
            if (!empty($request->password && $request->password_confirmation)) {
                $request->validate(
                    [
                        'password' => [
                            'required',
                            'min:8',
                            'regex:/^(?=.*[a-z])(?=.*[0-9]).+$/',
                        ],
                        'password_confirmation' => 'required',
                    ],
                    [
                        'name.required' => 'Kolom nama tidak boleh kosong',
                        'username.required' =>
                            'Kolom username tidak boleh kosong',
                        'password.required' => 'Password tidak boleh kosong',
                        'password_confirmation.required' =>
                            'Konfimasi password tidak boleh kosong',
                        'password.confirmed' =>
                            'Konfimasi password tidak sesuai',
                        'password.min' => 'Password minimal 8 karakter',
                        'password.regex' =>
                            'Password harus kombinasi huruf dan angka',
                    ]
                );

                $update->password = Hash::make($request->password);
                $update = User::find($request->id);
                $update->name = $request->name;
                $update->username = $request->username;
                $update->password = Hash::make($request->password);
                $update->created_by = Auth::user()->id;
                $update->updated_by = Auth::user()->id;
                $update->save();
                return redirect('/pengguna')->with(
                    'success',
                    'Data berhasil diubah'
                );
            }
            $update = User::find($request->id);
            $update->name = $request->name;
            $update->username = $request->username;
            $update->created_by = Auth::user()->id;
            $update->updated_by = Auth::user()->id;
            $update->save();
            return redirect('/pengguna')->with(
                'success',
                'Data berhasil diubah'
            );
        } else {
            return abort(403);
        }
    }

    public function edit_password(Request $request, $id)
    {
        User::find(decrypt($id));
        return view('pengguna.ubah-password');
    }

    public function update_password(Request $request)
    {
        if (empty($request->old_password)) {
            $request->validate(
                [
                    'old_password' => 'required',
                ],
                ['old_password' => 'Password lama tidak boleh kosong']
            );
        }
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error', 'Password lama tidak sesuai');
        }

        $request->validate(
            [
                'password' => [
                    'required',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[0-9]).+$/',
                ],
                'password_confirmation' => 'required',
            ],
            [
                'password.required' => 'Password tidak boleh kosong',
                'password_confirmation.required' =>
                    'Konfimasi password tidak boleh kosong',
                'password.confirmed' => 'Konfimasi password tidak sesuai',
                'password.min' => 'Password minimal 8 karakter',
                'password.regex' => 'Password harus kombinasi huruf dan angka',
            ]
        );

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->password),
        ]);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with(
            'toast_success',
            'Password berhasil diubah, Silahkan Login kembali'
        );
    }

    public function destroy($id)
    {
        $del = User::find($id);
        $del->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil dihapus',
        ]);
    }
}
