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

Route::get('/','UserController@index');

Route::get('/contacto','UserController@contacto');

Route::get('/nosotros','UserController@nosotros');

Route::get('admin/login', 'UserController@loginAdmin');

Route::get('admin/home', 'UserController@adminHome');

Route::post('admin/loged', 'UserController@login');