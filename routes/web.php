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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/latest', 'PagesController@latest');
Route::get('/archve', 'PagesController@archive');
Route::get('/faq', 'PagesController@faq');
Route::get('/contact', 'PagesController@contact');

Route::resource('posts', 'PostsController');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/albums/archive', 'AlbumsController@index');
Route::get('/albums', 'AlbumsController@index');
Route::get('/albums/create', 'AlbumsController@create');
Route::post('/albums/store', 'AlbumsController@store');
Route::get('/albums/{id}', 'AlbumsController@show');
Route::get('/posts/create/{id}', 'PostsController@create');
// Route::get('/posts/{id}', 'PostsController@show');
// Route::get('/posts/{id}', 'PostsController@destroy');
