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

Route::get('/registeruser', 'HomeController@registeruser')->name('registeruser');
Route::post('/simpanregister', 'HomeController@simpanregister')->name('saveregister');

Auth::routes();


Route::group(['middleware' => 'auth'] ,  function()
{
    Route::get('/beranda', 'HomeController@index')->name('home');
    Route::get('/profil', 'HomeController@profil')->name('profil');
    Route::post('/gantipassword', 'HomeController@gantipassword');
    Route::get('/pendaftaran', 'PemesananController@daftar');
    Route::post('/pendaftaran/store', 'PemesananController@daftarsimpan');
    Route::get('/user/pembayaran', 'PemesananController@bayar');
    Route::get('/user/pembayaran/cetak', 'PemesananController@cetakbayar');
    Route::post('/user/konfirmasipembayaran/{id}', 'PemesananController@konfirmasibayar');
    Route::get('/user/riwayat', 'PemesananController@riwayat');
    Route::get('/user/riwayat/detail/{id}', 'PemesananController@detailriwayat');
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

    // Pembayaran
    Route::get('/pembayaran', 'PembayaranController@index');
    Route::get('/konfirmasipembayaran/{id}', 'PembayaranController@konfirmasibayar');
    Route::get('/konfirmasi/{id}', 'PembayaranController@konfirmasi');
    Route::get('/pembayaran/detail/{id}', 'PembayaranController@detailbayar');

    // User
    Route::get('/user', 'UserController@index');

    // Laporan
    Route::get('/laporan', 'LaporanController@index');
    Route::get('/laporan/pendaftaran', 'LaporanController@show');
});
