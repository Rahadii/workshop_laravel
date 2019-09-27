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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tambah_mahasiswa', [
	'uses' => 'MahasiswaController@create',
	'as' => 'tambah_mahasiswa'
]);

Route::post('/simpan_mahasiswa', [
	'uses' => 'MahasiswaController@store',
	'as' => 'simpan_mahasiswa'
]);

Route::get('/edit_mahasiswa/{id}', [
	'uses' => 'MahasiswaController@edit',
	'as' => 'edit_mahasiswa'
]);

Route::patch('/update_mahasiswa/{id}', [
	'uses' => 'MahasiswaController@update',
	'as' => 'update_mahasiswa'
]);

Route::delete('/delete_mahasiswa', [
	'uses' => 'MahasiswaController@destroy',
	'as' => 'delete_mahasiswa'
]);