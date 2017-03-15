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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
	Route::get('/', 'AdminController@index');

	Route::get('/profile/{user}', 'UserController@profile');
	Route::put('/profile/{user}', 'UserController@updateProfile');

	Route::get('/users/{role}', 'UserController@index');
	Route::get('/users/{role}/create', 'UserController@create');
	Route::post('/users/{role}/store', 'UserController@store');
	Route::get('/users/{role}/show/{user}', 'UserController@show');

	Route::resource('/forms', 'FormController');
	Route::post('/forms/upload', 'FormController@upload');

	Route::resource('/councils', 'CouncilController');
});

Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
	Route::get('/', 'UserController@index');
});
