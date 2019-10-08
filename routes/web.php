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

//イベント一覧画面
Route::get('/events', 'EventsController@index');

//お問い合わせフォーム
Route::get('/contact', 'ContactController@input');
//お問い合わせ確認画面
Route::post('/confirm', 'ContactController@confirm')->name('contact.confirm');
//お問い合わせ完了画面
Route::get('/finish', 'ContactController@finish')->name('contact.finish');

//主催者登録ー仮登録画面
Route::post('register/pre_check', 'Auth\RegisterController@pre_check')->name('register.pre_check');


//主催者のTOPページ画面
Route::group(['middleware' => 'auth'], function(){
    Route::get('/user_top', 'User_topController@index');
    Route::get('/event_input','User_topController@eventInput');
});






