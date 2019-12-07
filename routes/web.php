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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/submit_prop', 'SubmitPropController@index')->name('submit_prop')->middleware('verified');
Route::post('/gogo', ['as' => 'form_url', 'uses' => 'SubmitPropController@store']);
Route::get('/searchDosbing', 'DosbingController@searchDosbing');
