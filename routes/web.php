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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/users', 'UserController@index')->name('users.index');

Route::resource('/users', 'UserController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
Route::resource('/posts', 'PostController', ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);

//いいね処理
Route::get('/posts/{post_id}/likes', 'LikesController@store');
//いいね取消処理
Route::get('/likes/{like_id}', 'LikesController@destroy');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
