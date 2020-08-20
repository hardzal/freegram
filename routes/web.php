<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/welcome/{lang?}', 'HomeController@welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PostsController@index')->name('posts.index');

Route::get('/profile/{user?}', 'ProfilesController@index')->name('profile.index');
Route::get('/profile/u/{username}', 'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}/update', 'ProfilesController@update')->name('profile.update');

Route::get('/p/create', 'PostsController@create')->name('post.create');
Route::post('/p', 'PostsController@store')->name('post.store');
Route::get('/p/{post}', 'PostsController@show')->name('post.show');
// Route::get('/p/{post}-{slug}', 'PostsController@show')->name('post.show');
Route::get('/p/{post}/edit', 'PostsController@edit')->name('post.edit');
Route::put("/p/{post}", 'PostsController@update')->name('post.update');
Route::delete("/p/{post}/delete", 'PostsController@destroy')->name('post.delete');

Route::post('/follow/{user}', 'FollowsController@store');

Route::post('/comments/{post}', 'CommentsController@store')->name('comment.create');
Route::put('/comments/{post}', 'CommentsController@update')->name('comment.update');
Route::delete('/comments/{comment}', 'CommentsController@destroy')->name('comment.delete');
