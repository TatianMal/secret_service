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

Route::get('/', 'DataController@index');

Route::post('/create', 'DataController@create_data');

Route::get('/{id}', 'DataController@show');

Route::post('/{id}', 'DataController@get_data');

Route::delete('/{id}', 'DataController@delete');
