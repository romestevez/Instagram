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

Route::get('/users/', 'UsersController@index');
Route::get('/users/add/', 'UsersController@create');
Route::post('/users/add/', 'UsersController@store');
Route::get('/users', 'UsersController@show')->name('users.show');
Route::get('/users/delete', 'UsersController@destroy')->middleware('auth');
Route::get('/users/edit', 'UsersController@edit')->middleware('auth')->name('users.edit');
Route::post('/users/edit', 'UsersController@update');

Route::post('/instagram', 'InstagramController@store')->name('instagram.store');
Route::get('/instagram/delete/{id}', 'InstagramController@destroy')->middleware('auth');

// Route::get('/images/{id}/comments', 'CommentController@create')->name('comment.create');
Route::post('/images/{id}/comments', 'CommentController@store')->middleware('auth')->name('comment.store');
Route::get('/images/{id}/comments/delete', 'CommentController@destroy')->middleware('auth')->name('comment.destroy');

Route::get('/like/{id}', 'LikeController@store')->middleware('auth');
Route::get('/unlike/{id}', 'LikeController@destroy')->middleware('auth');


Auth::routes();

Route::redirect('/', 'home');
Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');