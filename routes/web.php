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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/nilaiTema/lihat','nilaiTemaController@lihatNilai');
Route::get('/nilaiUtsUas/lihat','nilaiUtsUasController@lihatNilai');
Route::get('/nilaiRapot/lihat','nilaiRapotController@lihatNilai');
Route::get('/jadwalAkademik/lihat','jadwalController@lihatJadwal');
Route::get('/daftarTema/lihat','temaController@lihat');
Route::get('/standarNilai/lihat','nilaiController@lihat');
Route::get('/home', 'HomeController@index')->name('home');
Route::resources([
    'siswa' => 'siswaController',
    'orangtua' => 'orangtuaController',
    'nilaiUtsUas' => 'nilaiUtsUasController',
    'nilaiRapot' => 'nilaiRapotController',
    'nilaiTema' => 'nilaiTemaController',
    'waliKelas' => 'waliKelasController',
    'nilaiSikap' => 'nilaiSikapController',
    'nilaiAkhirSikap' => 'nilaiAkhirSikapController',
    'naikKelas' => 'kelasController',
    'jadwalAkademik' => 'jadwalController',
    'daftarTema' => 'temaController',
    'standarNilai' => 'nilaiController',
    'subtema' => 'subtemaController',
]);

Route::get('/daftarSiswa', 'SiswaController@daftarSiswa');
Route::get('/daftarOrangtua', 'orangtuaController@daftarOrangtua');
Route::get('/daftarNilaiTema', 'nilaiTemaController@daftarNilaiTema');
Route::get('/daftarNilaiUtsUas', 'nilaiUtsUasController@daftarNilaiUtsUas');
Route::get('/daftarNilaiRapot', 'nilaiRapotController@daftarNilaiRapot');
Route::get('/daftarNilaiSubtema', 'nilaiTemaController@daftarNilaiSubtema');
Route::get('/nilaiSubTema/{nilaiTema}', 'nilaiTemaController@nilaiSubtema');




