<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\FacadesDB;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Tahun_ajaranController;
use Illuminate\Http\Request;


Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::prefix('admin')->group(function () {
    Route::get('/admin', 'AdminController@index')->name('adminhome');


    // Mata Pelajaran
    Route::get('/matpel3', 'MatpelController@index')->name('dataMatpel');
    Route::get('/dataMatpel', 'MatpelController@get')->name('daftarMatpel');
    Route::post('/simpanMatpel', 'MatpelController@save')->name('simpanDataMatpel');
    Route::get('/cariMatpel/{id}', 'MatpelController@getMatpel'); //mencari data 
    Route::post('/editMatpel/{id}', 'MatpelController@update');
    Route::get('/hapusDataMatpel/{id}', 'MatpelController@delete');
    //cari data berdasarkan input dari form
    //Route::get('/cariURLMatpel/{id}/{id1}/{id2}', 'MatpelController@getURLMatpel');
    //Route::get('/cariURLMatpel/{id}/{id2}/{id3}', 'MatpelController@getURLMatpel');

    //tahun_ajaran
    Route::get('/tahun_ajaran', 'Tahun_ajaranController@index')->name('datatahun_ajaran');
    Route::get('/datatahun_ajaran', 'Tahun_ajaranController@get')->name('daftartahun_ajaran');
    Route::post('/simpantahun_ajaran', 'Tahun_ajaranController@save')->name('simpanDatatahun_ajaran');
    Route::get('/caritahun_ajaran/{id}', 'Tahun_ajaranController@gettahun_ajaran'); //mencari data 
    Route::post('/edittahun_ajaran/{id}', 'Tahun_ajaranController@update');
    Route::get('/hapusDatatahun_ajaran/{id}', 'Tahun_ajaranController@delete');

    //guru
    Route::get('/guru', 'GuruController@index')->name('dataguru');
    Route::get('/dataguru', 'GuruController@get')->name('daftarguru');
    Route::post('/simpanguru', 'GuruController@save')->name('simpanDataguru');
    Route::get('/cariguru/{id}', 'GuruController@getguru'); //mencari data
    Route::post('/editguru/{id}', 'GuruController@update');
    Route::get('/hapusDataguru/{id}', 'GuruController@delete');

    //siswa
    Route::get('/siswa', 'SiswaController@index')->name('datasiswa');
    Route::get('/datasiswa', 'SiswaController@get')->name('daftarsiswa');
    Route::post('/simpansiswa', 'SiswaController@save')->name('simpanDatasiswa');
    Route::get('/carisiswa/{id}', 'SiswaController@getsiswa'); //mencari data
    Route::post('/editsiswa/{id}', 'SiswaController@update');
    Route::get('/hapusDatasiswa/{id}', 'SiswaController@delete');

    //profile_sekolah
    Route::get('/profile_sekolah', 'Profile_sekolahController@index')->name('dataprofile_sekolah');
    Route::get('/dataprofile_sekolah', 'Profile_sekolahController@get')->name('daftarprofile_sekolah');
    Route::post('/simpanprofile_sekolah', 'Profile_sekolahController@save')->name('simpanDataprofile_sekolah');
    Route::get('/cariprofile_sekolah/{id}', 'Profile_sekolahController@getprofile_sekolah'); //mencari data
    Route::post('/editprofile_sekolah/{id}', 'Profile_sekolahController@update');
    Route::get('/hapusDataprofile_sekolah/{id}', 'Profile_sekolahController@delete');
});
