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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'] ,  function()
{
    Route::get('/beranda', 'HomeController@index')->name('home');
    Route::get('/pendaftaran', 'PemesananController@daftar');
    Route::post('/pendaftaran/store', 'PemesananController@daftarsimpan');
    Route::get('/pembayaranuser', 'PemesananController@bayar');
});


Route::group(['middleware' => 'admin'] ,  function()
{
    Route::get('/admin', 'HomeController@index')->name('home');

    // CRUD KELAS
    Route::resource( '/kelas' , 'KelasController' );
    Route::get('/kelas/hapus/{kode}','KelasController@destroy');

    // CRUD Jadwal
    Route::resource( '/jadwal' , 'JadwalController' );
    Route::get('/jadwal/hapus/{kode}','JadwalController@destroy');
});
