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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{postId}', 'PostsController@show')
    ->where(['postId' => '[0-9]{1,2}']);

Route::get('/profile/{userId}', 'ProfilesController@index')
    ->where(['userId' => '[0-9]{1,2}'])
    ->name('profile.show');
Route::get('/profile/{userId}/edit', 'ProfilesController@edit')
    ->where(['userId' => '[0-9]{1,2}'])
    ->name('profile.edit');;
Route::patch('/profile/{userId}', 'ProfilesController@update')
    ->where(['userId' => '[0-9]{1,2}'])
    ->name('profile.update');;
