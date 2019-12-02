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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/submit_prop', 'SubmitPropController@index')->name('submit_prop');
Route::post('/gogo', ['as' => 'form_url', 'uses' => 'SubmitPropController@store']);
Route::get('/searchDosbing', 'DosbingController@searchDosbing');

//
Route::get('/mahasiswa','MahasiswaController@index');
Route::post('/mahasiswa/store','MahasiswaController@store');
Route::post('/mahasiswa/update','MahasiswaController@update');
Route::get('/mahasiswa/hapus/{nim}','MahasiswaController@hapus');
