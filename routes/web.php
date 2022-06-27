<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', 'UserController@index')->name('userhome');
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('adminhome');


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
});
