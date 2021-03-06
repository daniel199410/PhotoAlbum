<?php
Route::get('/', 'ControladorUsuario@index');
Route::get('inicio', 'ControladorUsuario@inicio');
Route::get('reset', 'ControladorUsuario@reset');
Route::get('logout', 'ControladorUsuario@logout');
Route::get('addAdministratorView', 'ControladorUsuario@addAdministratorView');

Route::get('404', 'ControladorUsuario@forbidden');

Route::get('albumController', 'albumController@load');
Route::get('showAlbums', 'albumController@showAlbum');
Route::get('albums', 'albumController@listing');
Route::get('albumsType', 'albumController@listingByType');
Route::get('editalbum/{album}', 'albumController@edit');

Route::get('imageController', 'imageController@load');
Route::get('listImage/{album}/{owner}', 'imageController@listing');
Route::get('image/{nickname}/{image_title}', 'imageController@show');
Route::get('editImageForm/{image_title}', 'imageController@formEdit');

Route::post('submitLogin', 'ControladorUsuario@login');
Route::post('submitRegister', 'ControladorUsuario@register');
Route::post('registerAdmin', 'ControladorUsuario@registerAdmin');
Route::post('comment/{image_title}/{nick}', [
    'as' => 'user.comment',
    'uses' => 'ControladorUsuario@comment'
]);

Route::post('createAlbum', 'albumController@create');
Route::post('addImageAlbum', 'albumController@addImage');
Route::post('editAlbum', 'albumController@edition');

Route::post('addImage', 'imageController@add');
Route::post('edit/{image_title}', [
    'as' => 'image.edit',
    'uses' => 'imageController@edit'
]);