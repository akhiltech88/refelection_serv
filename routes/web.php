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

//Route::get('/', );

//Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('create-memorials', 'MemorialController@createMemorial');
Route::apiResource('memorials', 'MemmorialAccountController');
//Route::get('/home', 'HomeController@index')->name('home');
Route::post('login','UserController@login');
Route::post('save_memorial','MemorialController@saveMemorial');
Route::post('register','UserController@register');
