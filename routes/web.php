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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id?}', 'ProfilesController@index')->name('profile.index');
Route::get('/profile/u/{username}', 'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}/update', 'ProfilesController@update')->name('profile.update');

Route::get('/p/create', 'PostsController@create')->name('post.create');
Route::post('/p', 'PostsController@store')->name('post.store');
Route::get('/p/{id}', 'PostsController@show')->name('post.show');
