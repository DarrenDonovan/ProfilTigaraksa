<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\SuperAdminMiddleware;


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

//Index
Route::get('/', function () {
    return view('index');
});

//Admin Login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate']);

//Other Pages
Route::get('about', [UserController::class, 'about'])->name('about');
Route::get('infografis', [UserController::class, 'infografis'])->name('infografis');
Route::get('maps', [UserController::class, 'maps'])->name('maps');
Route::get('berita', [UserController::class, 'berita'])->name('berita');
Route::get('berita/detailberita/{id}', [UserController::class, 'detailberita'])->name('detailberita');
Route::get('profildesa/{id}', [UserController::class, 'profildesa'])->name('profildesa');
Route::get('profildesa/{id_wilayah}/wisata/{id_wisata}', [UserController::class, 'wisata'])->name('wisata');
Route::get('rute/{id}', [UserController::class, 'rute'])->name('rute');

//Admin Dashboard Landpage
Route::get('admin/dashboard', [AdminController::class, 'admin'])->middleware('auth')->name('admin');
Route::get('admin/kegiatan', [AdminController::class, 'kegiatan'])->middleware('auth')->name('admin.kegiatan');
Route::get('admin/profil_wilayah', [AdminController::class, 'profilWilayah'])->middleware('auth')->name('admin.profilWilayah');
Route::get('admin/berita', [AdminController::class, 'berita'])->middleware('auth')->name('admin.berita');
Route::get('admin/infografis', [AdminController::class, 'infografis'])->middleware('auth')->name('admin.infografis');
Route::get('admin/wisata', [AdminController::class, 'wisata'])->middleware('auth')->name('admin.wisata');
Route::get('admin/umkm', [AdminController::class, 'umkm'])->middleware('auth')->name('admin.umkm');
Route::get('admin/penduduk', [AdminController::class, 'penduduk'])->middleware('auth')->name('admin.penduduk');
Route::get('admin/log', [AdminController::class, 'adminLog'])->middleware('auth')->name('admin.adminLog');
Route::get('admin/penduduk/tambahPenduduk', [AdminController::class, 'tambahPenduduk'])->middleware('auth')->name('admin.tambahPenduduk');
Route::get('admin/penduduk/editPenduduk/{id}', [AdminController::class, 'editPenduduk'])->middleware('auth')->name('admin.editPenduduk');
Route::get('admin/penduduk/tambahWisata', [AdminController::class, 'tambahWisata'])->middleware('auth')->name('admin.tambahWisata');
Route::get('admin/wisata/editWisata/{id}', [AdminController::class, 'editWisata'])->middleware('auth')->name('admin.editWisata');
Route::get('admin/umkm/tambahUmkm', [AdminController::class, 'tambahUmkm'])->middleware('auth')->name('admin.tambahUmkm');
Route::get('admin/umkm/editUmkm/{id}', [AdminController::class, 'editUmkm'])->middleware('auth')->name('admin.editUmkm');
Route::get('/', [AdminController::class, 'index'])->name('index');

// Admin Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Create Admin
Route::get('admin/createadmin', function(){
    return view('createadmin');
});

Route::middleware(['auth', SuperAdminMiddleware::class])->group(function(){
    Route::get('admin/createadmin', [AdminController::class, 'create']);
    Route::post('admin/storeadmin', [AdminController::class, 'store']);
    Route::get('admin/deleteAdmin',[AdminController::class, 'admin'])->name('removeAdmin');
    Route::post('admin/deleteAdmin', [AdminController::class, 'deleteAdmin'])->name('removeAdmin');
});

//Admin Function
Route::post('/admin/update/{id}', [AdminController::class, 'updateKegiatan'])->middleware('auth')->name('admin.updateKegiatan');

Route::get('admin/delete/{id}', [AdminController::class, 'deleteKegiatan'])->middleware('auth')->name('admin.deleteKegiatan');

Route::post('admin/createKegiatan', [AdminController::class, 'createKegiatan'])->middleware('auth')->name('admin.createKegiatan');

Route::post('/admin/updateAboutUs', [AdminController::class, 'updateAboutUs'])->middleware('auth')->name('admin.updateAboutUs');

//Route untuk Perangkat Kecamatan
Route::post('admin/tambahPenduduk/tambahDataPenduduk', [AdminController::class, 'createDataPenduduk'])->middleware('auth')->name('admin.createDataPenduduk');
Route::post('admin/penduduk/editPenduduk/{id}/edit', [AdminController::class, 'updateDataPenduduk'])->middleware('auth')->name('admin.updateDataPenduduk');

Route::post('admin/createPerangkat', [AdminController::class, 'createPerangkat'])->middleware('auth')->name('admin.createPerangkat');
Route::post('/admin/updatePerangkat/{id}', [AdminController::class, 'updatePerangkat'])->middleware('auth')->name('admin.updatePerangkat');
Route::get('admin/deletePerangkat/{id}', [AdminController::class, 'deletePerangkat'])->middleware('auth')->name('admin.removePerangkat');

//Route untuk berita
Route::post('admin/createBerita', [AdminController::class, 'createBerita'])->middleware('auth')->name('admin.createBerita');
Route::post('admin/updateBerita/{id}', [AdminController::class, 'updateBerita'])->middleware('auth')->name('admin.updateBerita');
Route::get('admin/deleteBerita/{id}', [AdminController::class, 'deleteBerita'])->middleware('auth')->name('admin.deleteBerita');

//Route untuk Profil
Route::post('admin/updateProfil/{id}', [AdminController::class, 'updateProfil'])->middleware('auth')->name('admin.updateProfil');

//Route untuk Wisata
Route::post('admin/wisata/editWisata/{id}/edit', [AdminController::class, 'updateWisata'])->middleware('auth')->name('admin.updateWisata');
Route::post('admin/wisata/createWisata', [AdminController::class, 'createWisata'])->middleware('auth')->name('admin.createWisata');
Route::get('admin/wisata/deleteWisata/{id}', [AdminController::class, 'deleteWisata'])->middleware('auth')->name('admin.deleteWisata');

Route::post('admin/umkm/editUmkm/{id}/edit', [AdminController::class, 'updateUMKM'])->middleware('auth')->name('admin.updateUmkm');
Route::post('admin/umkm/createUmkm', [AdminController::class, 'createUMKM'])->middleware('auth')->name('admin.createUmkm');
Route::get('admin/umkm/deleteUmkm/{id}', [AdminController::class, 'deleteUMKM'])->middleware('auth')->name('admin.deleteUmkm');