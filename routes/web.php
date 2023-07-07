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




Route::get('/', 'JadwalController@index');
Route::get('/video', 'JadwalController@show');
Route::get('/dashboard/create', 'JadwalController@create');
Route::post('/dashboard/create', 'JadwalController@store');
Route::get('/dashboard/edit/{id}', 'JadwalController@edit');
Route::post('/dashboard/update/{id}', 'JadwalController@update');

Route::get('/dashboard/code', 'UrlController@create');
Route::post('/dashboard/code', 'UrlController@store');

Route::get('/dashboard', 'DashboardController@index');
Route::delete('/dashboard/jadwal/{id}', 'DashboardController@destroy');
Route::delete('/dashboard/code/{id}', 'DashboardController@destroyCode');
