<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HakAksesMenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriPegawaiController;
use App\Http\Controllers\KategoriTitikLayananController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MutasiPegawaiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\TitikLayananController;
use App\Http\Controllers\UppdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSamsatController;
use App\Http\Controllers\UserSamsatHistoriController;
use App\Models\KategoriTitikLayanan;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

// Auth
Route::get('/login', [AuthController::class, 'login'])
    ->name('login')
    ->middleware('guest');
Route::post('/auth', [AuthController::class, 'authanticate'])->name(
    'authanticate'
);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Level
Route::get('level', [LevelController::class, 'index'])->name('level');
Route::post('level/', [LevelController::class, 'store'])->name('level.store');
Route::get('level/show/{id}', [LevelController::class, 'show']);
Route::get('level/{id}/edit', [LevelController::class, 'edit'])->name(
    'level.edit'
);
Route::patch('/level/update/{id}', [LevelController::class, 'update'])->name(
    'level.update'
);
Route::delete('/level/delete/{id}', [LevelController::class, 'destroy'])->name(
    'level.destroy'
);
Route::get('/level/data', [LevelController::class, 'getData'])->name(
    'level.data'
);

// UPPD
Route::middleware('auth')
    ->controller(UppdController::class)
    ->group(function () {
        Route::get('/uppd', 'index')->name('uppd');
        Route::get('/uppd/data', 'getData')->name('uppd.data');
        Route::get('/uppd/tambah', 'create')->name('uppd.tambah');
        Route::post('/uppd', 'store')->name('uppd.store');
        Route::get('/uppd/show/{id}', 'show');
        Route::get('/uppd/e{id}', 'edit')->name('uppd.edit');
        Route::patch('/uppd/{id}', 'update')->name('uppd.update');
        Route::delete('/uppd/delete/{id}', 'destroy')->name('uppd.destroy');
    });

// Pejabat
Route::middleware('auth')
    ->controller(PejabatController::class)
    ->group(function () {
        Route::get('/pejabat', 'index')->name('pejabat');
        Route::get('/pejabat/tambah', 'create')->name('pejabat.tambah');
        Route::post('/pejabat', 'store')->name('pejabat.store');
        Route::get('/pejabat/e{id}', 'edit')->name('pejabat.edit');
        Route::patch('/pejabat/{id}', 'update')->name('pejabat.update');
        Route::delete('/pejabat/delete/{id}', 'destroy')->name(
            'pejabat.destroy'
        );
    });

// Kategori Titik Layanan
Route::middleware('auth')
    ->controller(KategoriTitikLayananController::class)
    ->group(function () {
        Route::get('/kategori_titik_layanan', 'index')->name(
            'kategori-titik-layanan'
        );
        Route::get('kategori_titik_layanan/tambah', 'create')->name(
            'kategori-titik-layanan.tambah'
        );

        Route::post('kategori_titik_layanan', 'store')->name(
            'kategori-titik-layanan.store'
        );
        Route::get('/kategori_titik_layanan/k{id}', 'edit')->name(
            'kategori-titik-layanan.edit'
        );

        Route::patch('/kategori_titik_layanan/{id}', 'update')->name(
            'kategori-titik-layanan.update'
        );

        Route::delete('/kategori_titik_layanan/delete/{id}', 'destroy')->name(
            'kategori-titik-layanan.destroy'
        );
    });

// Kategori Pegawai
Route::middleware('auth')
    ->controller(KategoriPegawaiController::class)
    ->group(function () {
        Route::get('/kategori_pegawai', 'index')->name('kategori-pegawai');
        Route::get('kategori_pegawai/tambah', 'create')->name(
            'kategori-pegawai.tambah'
        );
        Route::post('kategori_pegawai', 'store')->name(
            'kategori-pegawai.store'
        );
        Route::get('/kategori_pegawai/k{id}', 'edit')->name(
            'kategori-pegawai.edit'
        );

        Route::patch('/kategori_pegawai/{id}', 'update')->name(
            'kategori-pegawai.update'
        );

        Route::delete('/kategori_pegawai/delete/{id}', 'destroy')->name(
            'kategori-pegawai.destroy'
        );
    });

// Kategori Hak Akses Menu
Route::get('/hak_akses_menu', [HakAksesMenuController::class, 'index'])->name(
    'hak-akses-menu'
);
Route::get('hak_akses_menu/tambah', [HakAksesMenuController::class, 'create'])
    ->name('hak-akses-menu.tambah')
    ->middleware('auth');

Route::post('hak_akses_menu', [HakAksesMenuController::class, 'store'])->name(
    'hak-akses-menu.store'
);
Route::get('/hak_akses_menu/k{id}', [HakAksesMenuController::class, 'edit'])
    ->name('hak-akses-menu.edit')
    ->middleware('auth');

Route::patch('/hak_akses_menu/{id}', [HakAksesMenuController::class, 'update'])
    ->name('hak-akses-menu.update')
    ->middleware('auth');

Route::delete('/hak_akses_menu/delete/{id}', [
    HakAksesMenuController::class,
    'destroy',
])
    ->name('hak-akses-menu.destroy')
    ->middleware('auth');

// Titik Layanan
Route::middleware('auth')
    ->controller(TitikLayananController::class)
    ->group(function () {
        Route::get('/titik_layanan', 'index')->name('titik-layanan');
        Route::get('titik_layanan/tambah', 'create')->name(
            'titik-layanan.tambah'
        );
        Route::post('titik_layanan', 'store')->name('titik-layanan.store');
        Route::get('/titik_layanan/e{id}', 'edit')->name('titik-layanan.edit');
        Route::patch('/titik_layanan/k{id}', 'update')->name(
            'titik-layanan.update'
        );
        Route::delete('/titik_layanan/delete/{id}', 'destroy')->name(
            'titik-layanan.destroy'
        );
    });

// Pegawai
Route::middleware(['auth'])
    ->controller(PegawaiController::class)
    ->group(function () {
        Route::get('/pegawai', 'index')->name('pegawai');
        Route::get('/pegawai/tambah', 'create')->name('pegawai.tambah');
        Route::post('/pegawai', 'store')->name('pegawai.store');
        Route::get('/pegawai/{id}', 'edit')->name('pegawai.edit');
        Route::patch('/pegawai/{id}', 'update')->name('pegawai.update');
        Route::get('/edit_password/{id}', 'edit_password');
        Route::patch('/update_password/{id}', 'update_password');
        Route::delete('/pegawai/delete/{id}', 'destroy')->name(
            'pegawai.destroy'
        );
        Route::get('/selectTitikLayanan/{id}', 'getDataTitikLayanan');
        Route::get('/selectPegawai/{id}', 'getDataPegawai');
    });

// Mutasi
Route::middleware(['auth'])
    ->controller(MutasiPegawaiController::class)
    ->group(function () {
        Route::get('/mutasi', 'index')->name('mutasi');
        Route::get('/mutasi/tambah', 'create')->name('mutasi.tambah');
        Route::post('/mutasi', 'store')->name('mutasi.store');
        Route::get('/mutasi/e{id}', 'edit')->name('mutasi.edit');
        Route::patch('/mutasi/{id}', 'update')->name('mutasi.update');
        Route::delete('/mutasi/delete/{id}', 'destroy')->name('mutasi.destroy');
    });

// Lokasi
Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi');
Route::post('/lokasi', [LokasiController::class, 'store'])->name(
    'lokasi.store'
);
Route::get('/lokasi/show/{id}', [LokasiController::class, 'show']);
Route::get('/lokasi/{id}/edit', [LokasiController::class, 'edit'])->name(
    'lokasi.edit'
);

// User
Route::middleware(['auth'])
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/pengguna', 'index')->name('pengguna');
        Route::get('/pengguna/tambah', 'create')->name('pengguna.tambah');
        Route::post('/pengguna', 'store')->name('pengguna.store');
        Route::get('/pengguna/e{id}', 'edit')->name('pengguna.edit');
        Route::patch('/pengguna/{id}', 'update')->name('pengguna.update');
        Route::get('/edit_password/{id}', 'edit_password');
        Route::patch('/update_password/{id}', 'update_password');
        Route::delete('/pengguna/delete/{id}', 'destroy')->name(
            'pengguna.destroy'
        );
    });

// USer Samsat
Route::middleware(['auth'])
    ->controller(UserSamsatController::class)
    ->group(function () {
        Route::get('/user_samsat', 'index')->name('user-samsat');
        Route::get('/user_samsat/tambah', 'create')->name('user-samsat.tambah');
        Route::post('/user_samsat', 'store')->name('user-samsat.store');
        Route::get('/user_samsat/e{id}', 'edit')->name('user-samsat.edit');
        Route::patch('/user_samsat/{id}', 'update')->name('user-samsat.update');
        Route::patch('/is_active/{id}', 'is_active');
        Route::delete('/user_samsat/delete/{id}', 'destroy')->name(
            'user-samsat.destroy'
        );
    });

// USer Samsat Histori
Route::middleware(['auth'])
    ->controller(UserSamsatHistoriController::class)
    ->group(function () {
        Route::get('/history_user_samsat', 'index')->name(
            'histori-user-samsat'
        );
    });
