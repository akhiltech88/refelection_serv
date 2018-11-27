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
Route::get('contact', 'MemorialController@contact');
Route::get('memorial-wall', 'MemorialController@memorialWall');
Route::get('memorial-page/{id}', 'MemorialController@memorialPage');
Route::get('price', 'MemorialController@price');
Route::get('about-us', 'MemorialController@aboutUs');


Route::apiResource('memorials', 'MemorialAccountController');
//Route::get('/home', 'HomeController@index')->name('home');
Route::post('image_upload','MemorialGalleryController@imageUpload');
Route::post('audio_upload','MemorialGalleryController@audioUpload');
Route::post('video_upload','MemorialGalleryController@videoUpload');
Route::post('payments','MemorialAccountController@postPayments');
Route::post('login','UserController@login');
Route::post('save_memorial','MemorialController@saveMemorial');
Route::post('register','UserController@register');
Route::post('login','UserController@login');
