<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('auth/login');})->name('/login'); 

// Route::get('/profil', function () {
//     return view('user.profil');
// }); 

// Route::get('/profill', function () {
//     return view('user.ubah_profil');
// }); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user-home/{id}', [App\Http\Controllers\HomeController::class, 'userhomex'])->name('user.homex');
Route::get('/user-home', [App\Http\Controllers\HomeController::class, 'userhome'])->name('userhome');
Route::get('/admin-home', [App\Http\Controllers\HomeController::class,'adminhome'])->name('adminhome');
Route::get('/board-pak', [App\Http\Controllers\HomeController::class,'boardpak'])->name('boardpak');
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
Route::get('/ubahprofil/{id}', [App\Http\Controllers\ProfilController::class, 'edit'])->name('profill');
Route::put('/ubahprofil/update/{id}', [App\Http\Controllers\ProfilController::class, 'update'])->name('profilll');

Route::resource('kum', App\Http\Controllers\KumController::class);
Route::resource('pendidikan', App\Http\Controllers\PendidikanController::class);
Route::resource('pelaksanaanpendidikan', App\Http\Controllers\PelaksanaanPendidikanController::class);
Route::resource('pelaksanaanpenelitian', App\Http\Controllers\PelaksananPenelitianController::class);
Route::resource('pelaksanaan_pm', App\Http\Controllers\PelaksanaanPmController::class);
Route::resource('unsurdp', App\Http\Controllers\DokumenpenunjangController::class);
Route::resource('doumenpenunjang', App\Http\Controllers\DokumenpenunjangController::class);
Route::resource('pengajaran', App\Http\Controllers\PengajaranController::class);
Route::resource('karya', App\Http\Controllers\PenelitianHakidankaryaController::class);

Route::resource('unsurpelaksanaan', App\Http\Controllers\PelaksanaanPendidikanController::class);


Route::get('/lampiran', [App\Http\Controllers\LampiranController::class,'index'])->name('lampiran');
Route::get('/lampiran-datapenelitian', [App\Http\Controllers\LampiranController::class,'datapenelitian'])->name('datapenelitian');
Route::get('/lampiran-datapenunjang', [App\Http\Controllers\LampiranController::class,'datapenunjang'])->name('datapenunjang');
Route::get('/lampiran-datapendidikan', [App\Http\Controllers\LampiranController::class,'datapendidikan'])->name('lampirandatapendidikan');
Route::get('/lampiran-datapm', [App\Http\Controllers\LampiranController::class,'datapm'])->name('datapm');
Route::get('/lampiran-pendidikan', [App\Http\Controllers\LampiranController::class,'pendidikan'])->name('lampiranpendidikan');

Route::get('/pendidikan/{id}', [App\Http\Controllers\PendidikanController::class, 'show'])->name('pendidikan.show');
Route::get('/pelaksanaanpendidikan/{id}', [App\Http\Controllers\PelaksanaanPendidikanController::class, 'show'])->name('pelaksanaanpendidikan.show');


Route::delete('/dokumenpenunjang/{id}', 'DokumenpenunjangController@destroy')->name('dokumenpenunjang.destroy');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['AuthPort:1']], function () {
        Route::get('/admin-pendidikan', [App\Http\Controllers\HomeController::class,'adminpendidikan'])->name('admin-pendidikan');
        Route::get('/pendidikan', [App\Http\Controllers\AdminPageController::class,'pendidikan'])->name('pendidikan');

    });

    Route::group(['middleware' => ['AuthPort:2']], function () {


    });
});
