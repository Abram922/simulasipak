<?php

use App\Http\Controllers\DokumenpenunjangController;

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

Route::get('/', function () { return view('auth/login');})->name('/halaman_login'); 

// Route::get('/profil', function () {
//     return view('user.profil');
// }); 

// Route::get('/profill', function () {
//     return view('user.ubah_profil');
// }); 

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/user-home/{id}', [App\Http\Controllers\HomeController::class, 'userhomex'])->name('user.homex');
// Route::get('/user-home', [App\Http\Controllers\HomeController::class, 'userhome'])->name('userhome');
// Route::get('/admin-home', [App\Http\Controllers\HomeController::class,'adminhome'])->name('adminhome');
// Route::get('/board-pak', [App\Http\Controllers\HomeController::class,'boardpak'])->name('boardpak');
// Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
// Route::get('/ubahprofil/{id}', [App\Http\Controllers\ProfilController::class, 'edit'])->name('profill');
// Route::put('/ubahprofil/update/{id}', [App\Http\Controllers\ProfilController::class, 'update'])->name('profilll');

// Route::resource('kum', App\Http\Controllers\KumController::class);
// Route::resource('pendidikan', App\Http\Controllers\PendidikanController::class);
// Route::resource('pelaksanaanpendidikan', App\Http\Controllers\PelaksanaanPendidikanController::class);
// Route::resource('pelaksanaanpenelitian', App\Http\Controllers\PelaksananPenelitianController::class);
// Route::resource('pelaksanaan_pm', App\Http\Controllers\PelaksanaanPmController::class);
// Route::resource('unsurdp', App\Http\Controllers\DokumenpenunjangController::class);
// Route::resource('doumenpenunjang', App\Http\Controllers\DokumenpenunjangController::class);
// Route::resource('pengajaran', App\Http\Controllers\PengajaranController::class);
// Route::resource('karya', App\Http\Controllers\PenelitianHakidankaryaController::class);




// Route::get('/lampiran', [App\Http\Controllers\LampiranController::class,'index'])->name('lampiran');
// Route::get('/lampiran-datapenelitian', [App\Http\Controllers\LampiranController::class,'datapenelitian'])->name('datapenelitian');
// Route::get('/lampiran-datapenunjang', [App\Http\Controllers\LampiranController::class,'datapenunjang'])->name('datapenunjang');
// Route::get('/lampiran-datapendidikan', [App\Http\Controllers\LampiranController::class,'datapendidikan'])->name('lampirandatapendidikan');
// Route::get('/lampiran-datapm', [App\Http\Controllers\LampiranController::class,'datapm'])->name('datapm');




// Route::delete('/dokumenpenunjang/{id}', 'DokumenpenunjangController@destroy')->name('dokumenpenunjang.destroy');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['AuthPort:1']], function () {
        Route::get('/admin-pendidikan', [App\Http\Controllers\HomeController::class,'adminpendidikan'])->name('admin-pendidikan');
        Route::get('/admin-penelitian', [App\Http\Controllers\KomponenPenelitianController::class,'index'])->name('admin-penelitian');
        Route::get('/admin-pengabdian', [App\Http\Controllers\KomponenpmController::class,'index'])->name('admin-pengabdian');
        Route::get('/admin-penunjang', [App\Http\Controllers\KomponendokumenpenunjangController::class,'index'])->name('admin-penunjang');
        Route::get('/pendidikan-admin', [App\Http\Controllers\AdminPageController::class,'pendidikan'])->name('pendidikan');
        Route::get('/staratapendidikan-admin', [App\Http\Controllers\StratapendidikanController::class,'index'])->name('strata-pendidikan');
        
        
        Route::get('/admin-home', [App\Http\Controllers\HomeController::class,'adminhome'])->name('adminhome');
        Route::resource('komponenpendidikan', App\Http\Controllers\JenisPelaksananPendidikanController::class);
        Route::resource('komponenpenelitian', App\Http\Controllers\KomponenPenelitianController::class);
        Route::resource('komponenpm', App\Http\Controllers\KomponenpmController::class);
        Route::resource('komponenpenunjang', App\Http\Controllers\KomponendokumenpenunjangController::class);
        Route::resource('stratapendidikan', App\Http\Controllers\StratapendidikanController::class);


        Route::resource('unsurpelaksanaan', App\Http\Controllers\PelaksanaanPendidikanController::class);
        Route::resource('semester', App\Http\Controllers\SemesterController::class);
        Route::resource('akreditasipenelitian', App\Http\Controllers\AkreditasiPenelitianController::class);
        Route::resource('penulis', App\Http\Controllers\PenulisController::class);
        Route::resource('jabatan', App\Http\Controllers\JabatanController::class);
        

    });

    Route::group(['middleware' => ['AuthPortUser:2']], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/user-home/{id}', [App\Http\Controllers\HomeController::class, 'userhomex'])->name('user.homex');
        Route::get('/user-home', [App\Http\Controllers\HomeController::class, 'userhome'])->name('userhome');

        Route::get('/board-pak', [App\Http\Controllers\HomeController::class,'boardpak'])->name('boardpak');
        Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
        Route::get('/ubahprofil/{id}', [App\Http\Controllers\ProfilController::class, 'edit'])->name('profill');
        Route::put('/ubahprofil/update/{id}', [App\Http\Controllers\ProfilController::class, 'update'])->name('profilll');

        Route::resource('kum', App\Http\Controllers\KumController::class);
        Route::resource('pendidikan', App\Http\Controllers\PendidikanController::class)->except(['show']);
        Route::resource('pelaksanaanpendidikan', App\Http\Controllers\PelaksanaanPendidikanController::class);
        Route::resource('pelaksanaanpenelitian', App\Http\Controllers\PelaksananPenelitianController::class);
        Route::resource('pelaksanaan_pm', App\Http\Controllers\PelaksanaanPmController::class);
        Route::resource('unsurdp', App\Http\Controllers\DokumenpenunjangController::class);
        Route::resource('doumenpenunjang', App\Http\Controllers\DokumenpenunjangController::class);
        Route::resource('pengajaran', App\Http\Controllers\PengajaranController::class);
        Route::resource('karya', App\Http\Controllers\PenelitianHakidankaryaController::class);

        Route::resource('unsurpelaksanaan', App\Http\Controllers\PelaksanaanPendidikanController::class);
        Route::resource('unsurpenelitian-admin', App\Http\Controllers\KomponenPenelitianController::class);


        Route::get('/lampiran-all', [App\Http\Controllers\LampiranController::class,'index'])->name('lampiran-all');
        Route::get('/lampiran-datapenelitian', [App\Http\Controllers\LampiranController::class,'datapenelitian'])->name('datapenelitian');
        Route::get('/lampiran-datapenunjang', [App\Http\Controllers\LampiranController::class,'datapenunjang'])->name('datapenunjang');
        Route::get('/lampiran-datapendidikan', [App\Http\Controllers\LampiranController::class,'datapendidikan'])->name('lampirandatapendidikan');
        Route::get('/lampiran-datapm', [App\Http\Controllers\LampiranController::class,'datapm'])->name('datapm');
        Route::get('/lampiran-pendidikan', [App\Http\Controllers\LampiranController::class,'pendidikan'])->name('lampiranpendidikan');

        Route::get('/pendidikan/{id}', [App\Http\Controllers\PendidikanController::class, 'show'])->name('pendidikan-tampilan');

        Route::get('/pelaksanaanpendidikan/{id}', [App\Http\Controllers\PelaksanaanPendidikanController::class, 'show'])->name('pelaksanaanpendidikan-tampilan');


        Route::delete('/dokumenpenunjang/{id}', [DokumenpenunjangController::class, 'destroy'])->name('dokumenpenunjang.destroy');

        //lampiran
        Route::resource('lampirans', App\Http\Controllers\LampiranController::class)->except('index','update');



    });
    Route::group(['middleware' => ['AuthPortBAA:3']], function () {
        
        Route::get('/baa-home', [App\Http\Controllers\HomeController::class, 'baahome'])->name('baahome');
        Route::get('/daftar-pengajaran/{id}', [App\Http\Controllers\PengajaranController::class, 'show_baa'])->name('pengajaran');
        Route::get('/baa-pengajaran', [App\Http\Controllers\PengajaranController::class, 'baa_pelaksanaan_pendidikan'])->name('baa_pelaksanaan_pendidikan');
        Route::post('/baa-store-pengajaran', [App\Http\Controllers\PengajaranController::class, 'store_baa'])->name('store_baa');
        Route::post('/import-pengajaran', [App\Http\Controllers\PengajaranController::class, 'import'])->name('import_baa');
    });
});