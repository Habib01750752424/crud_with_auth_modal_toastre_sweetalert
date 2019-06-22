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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/insert-post', 'PostController@store');
Route::get(md5('/all-posts'), 'PostController@AllPost')->name('all.posts');
Route::get('/edit/{id}', 'PostController@Edit');
Route::post('/update-post/{id}', 'PostController@Update');
Route::get('/details/{id}', 'PostController@Detail');
Route::get('/delete/{id}', 'PostController@Delete');
Route::get('/password-change', 'HomeController@ChnagePass')->name('password.change');
Route::post('/update-password', 'HomeController@UpdatePass')->name('update.password');
Route::get('/news-add', 'PostController@News')->name('news.add');
Route::post('/insert-news', 'PostController@InsertNews');
Route::get('/all-news', 'PostController@AllNews')->name('all.news');
