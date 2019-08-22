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

Route::get('/', 'FrontController@index')->name('index');
Route::post('/', 'FrontController@store')->name('store');
Route::post('/confirm', 'FrontController@confirm')->name('confirm');
Auth::routes();


// 管理者以上（管理者＆システム管理者）に許可
Route::group(['middleware' => ['auth', 'can:admin-only']], function () {
    Route::get('/system/answer/index', 'AnswerController@index')->name('home');
    Route::get('/system/answer/{id}', 'AnswerController@show')->name('show');
});

// Route::get('/home', 'HomeController@index')->name('home');