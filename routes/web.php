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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'TopController@index');

Route::get('/user_top', 'User_topController@index');

//お問い合わせフォーム
Route::get('/contact', 'ContactController@input');

Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');

