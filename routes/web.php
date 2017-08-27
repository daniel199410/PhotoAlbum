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
Route::get('reset', 'ControladorUsuario@reset');
Route::get('logout', 'ControladorUsuario@logout');

Route::get('404', 'ControladorUsuario@forbidden');

Route::get('albumController', 'albumController@load');
Route::get('showAlbums', 'albumController@showAlbum');
Route::get('albums', 'albumController@listing');
Route::get('editalbum/{album}', 'albumController@edit');

Route::get('imageController', 'imageController@load');
Route::get('listImage/{album}', 'imageController@listing');
Route::get('image/{nickname}', 'imageController@show');

Route::post('submitLogin', 'ControladorUsuario@login');
Route::post('submitRegister', 'ControladorUsuario@register');

Route::post('createAlbum', 'albumController@create');
Route::post('addImageAlbum', 'albumController@addImage');
Route::post('editAlbum', 'albumController@edition');

Route::post('addImage', 'imageController@add');

Route::get('storage/{file}', function ($archivo) {
    
    $public_path = public_path();
    
    $url = $public_path.'/storage/images/'.$archivo;
    
    //verificamos si el archivo existe y lo retornamos
    
    if (Storage::exists($archivo))
    
    {
    
    return response()->download($url);
    
    }
    
    //si no se encuentra lanzamos un error 404.
    
    abort(404);
    
});