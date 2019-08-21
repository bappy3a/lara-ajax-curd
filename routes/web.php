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
Route::get('/', 'CustomerController@home');
Route::post('add/customer/data', 'CustomerController@add');
Route::get('get/customer/data', 'CustomerController@get');
Route::get('view/customer/data/{id}', 'CustomerController@viewdata');
Route::get('delete/customer/data/{id}', 'CustomerController@deletedata');
