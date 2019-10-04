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



//お問い合わせフォーム
Route::get('/contact', 'ContactController@input');
//お問い合わせ確認画面
Route::post('/confirm', 'ContactController@confirm')->name('contact.confirm');
//お問い合わせ完了画面
Route::get('/finish', 'ContactController@finish')->name('contact.finish');


//主催者のTOPページ画面
Route::get('/user_top', 'User_topController@index');



