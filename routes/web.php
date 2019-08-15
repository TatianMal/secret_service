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

Route::get('/', 'DataController@index')->name('index');

Route::post('/create', 'DataController@create_data')->name('create_data');

Route::get('/{data}', 'DataController@show')->name('show_data');

Route::post('/{data}', 'DataController@get_data')->name('get_data');

Route::delete('/{data}', 'DataController@delete')->name('delete_data');
