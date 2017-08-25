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

Route::get('/', 'ControladorUsuario@index');
Route::get('inicio', 'ControladorUsuario@inicio');

Route::get('albumController', 'albumController@load');

Route::post('submitLogin', 'ControladorUsuario@login');
Route::post('submitRegister', 'ControladorUsuario@register');

Route::post('createAlbum', 'albumController@create');