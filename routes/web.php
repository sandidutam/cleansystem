<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

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

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
    Route::resource('/pegawai','PegawaiController');
    Route::resource('/user', 'UserController');

    Route::get('/presensi/indexin','PresensiController@indexIn')->name('presensi.indexin');
    Route::get('/presensi/indexout','PresensiController@indexOut')->name('presensi.indexout');
    Route::get('/presensi/riwayat', 'PresensiController@history')->name('presensi.history');
    Route::post('/presensi/store','PresensiController@store')->name('presensi.store');
    Route::put('/presensi/{id}/update','PresensiController@update')->name('presensi.update');
    Route::get('/presensi/{id}/masuk','PresensiController@checkIn')->name('presensi.checkin');
    Route::get('/presensi/{id}/keluar','PresensiController@checkOut')->name('presensi.checkout');
    Route::get('/presensi/{id}/profile','PresensiController@showProfile')->name('presensi.show');
    Route::delete('/presensi/{id}/destroy', 'PresensiController@destroy')->name('presensi.destroy');

});
