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

// ご意見フォーム
Route::get('/', 'FrontController@index')->name('index');
Route::post('/', 'FrontController@store')->name('store');
Route::post('/confirm', 'FrontController@confirm')->name('confirm');
Auth::routes();

// 管理者に許可
Route::group(['middleware' => ['auth', 'can:admin-only']], function () {
    Route::get('/system/answer/index', 'AnswerController@index')->name('home');
    Route::get('/system/answer/{id}', 'AnswerController@show')->name('show');
    Route::get('/system/answer/index/search', 'AnswerController@search')->name('search');
    Route::delete('/system/answer/index/{id}', 'AnswerController@destroy')->name('delete');
});

// Route::get('/home', 'HomeController@index')->name('home');