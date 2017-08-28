<?php

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


Route::get('login', ['as' => 'login', 'uses' => 'LoginController@getView']);

Route::get('/', function () {
    return view('/home');
});

Route::get('/login', function () {
    return view('layouts/login');
});

Route::get('transaksi_bank/{id}/view', 'TransaksiBankController@View');
Route::resource('transaksi_bank', 'TransaksiBankController');

Route::get('transaksi_tunai/{id}/view', 'TransaksiTunaiController@View');
Route::resource('transaksi_tunai', 'TransaksiTunaiController');

Route::resource('induk_penduduk', 'IndukPendudukController');
Route::get('induk_penduduk/{id}/download', 'IndukPendudukController@getDownload');

Route::get('rencana_anggaran_biaya/filter', 'RencanaAnggaranBiayaController@getFilter');
Route::get('rencana_anggaran_biaya/{id}/download', 'RencanaAnggaranBiayaController@getDownload');
Route::get('rencana_anggaran_biaya/{buku_rencana_anggaran_biaya_id}/print', 'RencanaAnggaranBiayaController@getPrint');
Route::get('rencana_anggaran_biaya/{buku_rencana_anggaran_biaya_id}/excel', 'RencanaAnggaranBiayaController@getExcel');
Route::get('rencana_anggaran_biaya/{buku_rencana_anggaran_biaya_id}/members', 'RencanaAnggaranBiayaController@memberIndex')->name('rencana_anggaran_biaya.member_index');
Route::get('rencana_anggaran_biaya/{buku_rencana_anggaran_biaya_id}/members/create', 'RencanaAnggaranBiayaController@memberCreate');
Route::post('rencana_anggaran_biaya/{buku_rencana_anggaran_biaya_id}/members/create', 'RencanaAnggaranBiayaController@memberStore');
Route::get('rencana_anggaran_biaya/{buku_rencana_anggaran_biaya_id}/members/{rencana_anggaran_biaya_id}/edit', 'RencanaAnggaranBiayaController@memberEdit');
Route::put('rencana_anggaran_biaya/{buku_rencana_anggaran_biaya_id}/members/{rencana_anggaran_biaya_id}/edit', 'RencanaAnggaranBiayaController@memberUpdate')->name('rencana_anggaran_biaya.member_edit');
Route::delete('rencana_anggaran_biaya/{buku_rencana_anggaran_biaya_id}/members/{rencana_anggaran_biaya_id}', 'RencanaAnggaranBiayaController@memberDestroy');
Route::resource('rencana_anggaran_biaya', 'RencanaAnggaranBiayaController');

Route::get('ket_tidak_mampu/{id}/view', 'KetTidakMampuController@getView');
Route::get('ket_tidak_mampu/{id}/print', 'KetTidakMampuController@getPrint');
Route::get('ket_tidak_mampu/{id}/download', 'KetTidakMampuController@getDownload');
Route::get('ket_tidak_mampu/{id}/word', 'KetTidakMampuController@getWord');
Route::resource('ket_tidak_mampu', 'KetTidakMampuController');


Route::get('/profil_desa', 'ProfilDesaController@Edit');
Route::post('/profil_desa', 'ProfilDesaController@Store');
Route::put('/profil_desa', 'ProfilDesaController@Update')->name('profil_desa.update');

Route::get('/sandi/lupa/', 'Auth\UbahController@getLupa')->name('sandi.lupa');
Route::post('/sandi/ubah/', 'Auth\UbahController@postUbah')->name('sandi.ubah');
Route::post('/sandi/jawab/', 'Auth\UbahController@postJawab')->name('sandi.jawab');
Route::post('/sandi/ulang/', 'Auth\UbahController@postUlang')->name('sandi.ulang');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
