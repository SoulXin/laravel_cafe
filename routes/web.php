<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('/');
Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::get('/pesanan','PesananController@index')->name('pesanan');

// Makanan
Route::resource('/makanan', 'MakananController');
Route::get("/makanan_server_side", "MakananController@getAllMakananServerSide")->name("makanan.data");

// Akun
Route::get('/hak_akses','Akun\HakAksesController@index')->name('hak_akses.index');
Route::get('/edit_hak_akses/{id}','Akun\HakAksesController@edit')->name('hak_akses.edit');
Route::put('/update_hak_akses','Akun\HakAksesController@update')->name('hak_akses.update');
Route::get("/hak_akses_server_side", "Akun\HakAksesController@getAllUserServerSide")->name("hak_akses.data");
