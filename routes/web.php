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



Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('/', 'AvatarController@showAvatarsList')
        -> name('listAvatars');

    Route::post('/ajouter-avatar', 'AvatarController@addAvatar')
        -> name('addAvatar');

    Route::delete('/supprimer-avatar/{id}', 'AvatarController@deleteAvatar')
        -> name('deleteAvatar')
        -> where('id', '[0-9]+');
});

