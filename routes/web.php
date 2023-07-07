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

Route::get('/login', 'UserController@index')->middleware('guest')->name('login');
Route::post('/login', 'UserController@authenticate');
Route::post('/logout', 'UserController@logout');



Route::get('/', 'JadwalController@index');
Route::get('/video', 'JadwalController@show');
Route::get('/dashboard/create', 'JadwalController@create');
Route::post('/dashboard/create', 'JadwalController@store');


Route::get('/dashboard/edit/{id}', 'JadwalController@edit')->middleware('auth');
Route::post('/dashboard/update/{id}', 'JadwalController@update')->middleware('auth');

Route::get('/dashboard/code', 'UrlController@create')->middleware('auth');
Route::post('/dashboard/code', 'UrlController@store')->middleware('auth');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
Route::delete('/dashboard/jadwal/{id}', 'DashboardController@destroy')->middleware('auth');
Route::delete('/dashboard/code/{id}', 'DashboardController@destroyCode')->middleware('auth');
