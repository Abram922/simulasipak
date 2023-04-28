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

Route::get('/', function () {
    return view('auth/login');
}); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user-home', [App\Http\Controllers\HomeController::class,'userhome'])->name('userhome');
Route::get('/admin-home', [App\Http\Controllers\HomeController::class,'adminhome'])->name('adminhome');
Route::get('/board-pak', [App\Http\Controllers\HomeController::class,'boardpak'])->name('boardpak');


Route::resource('kum', App\Http\Controllers\KumController::class);
Route::resource('pendidikan', App\Http\Controllers\PendidikanController::class);
Route::resource('pelaksanaanpendidikan', App\Http\Controllers\PelaksanaanPendidikanController::class);
Route::resource('pelaksanaanpenelitian', App\Http\Controllers\PelaksananPenelitianController::class);
