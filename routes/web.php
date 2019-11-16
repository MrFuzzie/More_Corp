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

Route::get('/dashboard', 'AdminController@dashboard');

Route::resource('products', 'ProductController');

Route::get('/', 'StoreFrontController@index');
Route::post('/product/{product}/bid', 'StoreFrontController@storeBid');
