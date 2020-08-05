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

// GET

Route::get('/','UserController@index');

Route::get('admin/login', 'UserController@loginAdmin');

Route::get('admin/home', 'UserController@adminHome');

Route::get('admin/addImage', 'UserController@adminAddImage');

Route::get('admin/addImage/{id}', 'UserController@adminEditImage');

Route::get('admin/articulo', 'UserController@adminArticulo');

Route::get('/admin/addArticulo', 'UserController@adminAddArticulo');

Route::get('/admin/addArticulo/{id}', 'UserController@adminEditArticulo');


// POST

Route::post('admin/loged', 'UserController@login');

Route::post('admin/uploadedImage', 'UserController@uploadedImage');

Route::post('admin/uploadedImageArticle', 'UserController@uploadedImageArticle');

//DELETE

Route::delete('admin/deleteImage/{id}','UserController@deleteImage');

Route::delete('admin/deleteImageArticulo/{id}','UserController@deleteImageArticulo');

Route::delete('admin/deleteArticulo/{id}','UserController@deleteArticulo');