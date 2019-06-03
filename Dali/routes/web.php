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


Route::get('sample', 'databaseController@index');
Route::post('sample/{id}', 'databaseController@delete');
Route::get('insert','databaseController@create');// URL/insertの画面でGETを受け取ればdatabaseコントローラーのcreate関数を作動させる
Route::post('insert','databaseController@save');// URL/insertの画面でPOSTを受け取ればdatabaseコントローラーのsave関数を作動させる


Auth::routes();  //ユーザー認証に必要なルートが入ってる
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/draw', 'HomeController@draw');
Route::post('/draw', 'HomeController@insert');
Route::get('/profile', 'HomeController@profile');

Route::get('/edit', 'HomeController@edit');
Route::post('/edit', 'HomeController@done');

Route::post('home/{id}', 'HomeController@delete');

Route::get('/search', 'HomeController@search');
Route::post('/search', 'HomeController@get');