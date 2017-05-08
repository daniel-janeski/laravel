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

Route::get('/', 'ArticleController@index');

Route::get('about', 'PublicController@about');
Route::get('articles', 'ArticleController@index');
Route::get('articles/create', 'ArticleController@create');
Route::get('articles/edit/{id}', 'ArticleController@edit');
Route::get('articles/{slug}', 'ArticleController@view');
Route::post('articles', 'ArticleController@store');
Route::patch('articles/{id}', 'ArticleController@update');
Route::resource('tags', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');
