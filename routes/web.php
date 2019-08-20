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

Route::get('/index', 'FrontController@index')->name('index');
Route::post('/confirm', 'FrontController@confirm')->name('confirm');
Route::post('/index', 'FrontController@store')->name('store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
