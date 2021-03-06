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




//Route::get('/', 'Master\kelasControl@sendWA');

Auth::routes();


//Login
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'],function(){

Route::prefix('jadwal')->group(function(){
    Route::get('/', 'Master\jadwalControl@index')->name('dataJadwal');
    Route::get('/getDataJadwal','Master\jadwalControl@getDataJadwal');
    Route::post('/simpanDataJadwal','Master\jadwalControl@insert')->name('simpanJadwal');
    Route::post('/editDataJadwal','Master\jadwalControl@update')->name('editJadwal');
    Route::delete('/hapusDataJadwal','Master\jadwalControl@delete');

});

Route::prefix('tahapan')->group(function(){
    Route::get('/', 'Master\tahapanControl@index')->name('dataTahapan');
    Route::get('/getDataTahapan','Master\tahapanControl@getDataTahapan');
    Route::post('/simpanDataTahapan','Master\tahapanControl@insert')->name('simpanTahapan');
    Route::post('/editDataTahapan','Master\tahapanControl@update')->name('editTahapan');
    Route::delete('/hapusDataTahapan','Master\tahapanControl@delete');
});

Route::prefix('lelang')->group(function(){
    Route::get('/','Master\lelangControl@index')->name( 'dataLelang');
    Route::get('/getDataLelang', 'Master\lelangControl@getDataLelang');
    Route::post('/simpanDataLelang', 'Master\lelangControl@insert')->name('simpanLelang');
    Route::post('/editDataLelang','Master\lelangControl@update')->name('editLelang');
    Route::delete('/hapusDataLelang','Master\lelangControl@delete');
});

Route::prefix('laporanlelang')->group(function(){
    Route::get('/','Master\tahapanControl@index')->name( 'dataLelang');
    Route::get('/getDataLelang', 'Master\tahapanControl@getDataTahapan');
    Route::get('/getData','laporan\laplelang@tampil');
    Route::get('/laporan','laporan\laplelang@cetak');
    Route::get('/cetak','laporan\laplelang@cetak2')->name('ctk');

});
Route::get('/admin', function () {
    return view('/admin/menuawal');
})->name('admin');

    Route::get('/', function () {
        return view('/admin/menuawal');
    });



Route::get('/laporanlelang', function () {
    return view('/admin/laporan/laporanlelang');
})->name('laporanLelang');

Route::get('/lelangpdf', function () {
    return view('/admin/pdf/lelangpdf');
})->name('lelangpdf');
});

