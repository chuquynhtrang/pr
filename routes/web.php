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

	Route::get('/profile/{user}', 'AdminController@profile');
	Route::put('/profile/{user}', 'AdminController@updateProfile');
	Route::get('/change-password/{id}', 'AdminController@changePassword');
	Route::put('/change-password/{id}', 'AdminController@updatePassword');

	Route::get('/users/{role}', 'UserController@index');
	Route::get('/users/{role}/create', 'UserController@create');
	Route::post('/users/{role}/store', 'UserController@store');
	Route::get('/users/{role}/edit/{id}', 'UserController@edit');
	Route::put('/users/{role}/update/{id}', 'UserController@update');
	Route::delete('/users/{role}/delete/{id}', 'UserController@delete');
	Route::get('/users/{role}/show/{user}', 'UserController@show');
	Route::post('/users/{role}/importExcel', 'UserController@importExcel');

	Route::resource('/forms', 'FormController');
	Route::post('/forms/upload', 'FormController@upload');

	Route::resource('/councils', 'CouncilController');

	Route::get('/projects', 'ProjectController@index');
	Route::get('/progress', 'UserController@progress');
	Route::get('/old-projects', 'ProjectController@getOldProjects');
	Route::resource('/news', 'NewController');

	Route::get('/points', 'ProjectController@getPoints');
	Route::get('/points/edit/{point}', 'ProjectController@editPoint');
	Route::post('/points/{point}', 'ProjectController@updatePoint');
});

Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
	Route::get('/', 'UserController@index');
	Route::get('/profile/{user}', 'UserController@profile');
	Route::put('/profile/{user}', 'UserController@updateProfile');
	Route::get('/change-password/{id}', 'UserController@changePassword');
	Route::put('/change-password/{id}', 'UserController@updatePassword');

	Route::get('/projects', 'ProjectController@index');
	Route::get('/projects/{project}', 'ProjectController@show');
	Route::post('/projects/register/{project}', 'ProjectController@register');
	Route::delete('/{user}/projects', 'ProjectController@destroy');
	Route::get('/forms', 'FormController@index');
	Route::get('/progress', 'UserController@progress');
	Route::post('/progress', 'UserController@updateProgress');
	Route::get('/progress/{diary}', 'UserController@showDiary');
	Route::get('/news', 'NewController@index');
	Route::get('/news/{new}', 'NewController@show');
	Route::get('/councils', 'CouncilController@index');
});

Route::group(['prefix' => 'teacher', 'namespace' => 'Teacher'], function() {
	Route::get('/', 'TeacherController@index');
	Route::resource('/projects', 'ProjectController');
	Route::get('/profile/{user}', 'TeacherController@profile');
	Route::put('/profile/{user}', 'TeacherController@updateProfile');
	Route::get('/change-password/{id}', 'TeacherController@changePassword');
	Route::put('/change-password/{id}', 'TeacherController@updatePassword');

	Route::get('/users/wait', 'UserController@wait');
	Route::get('/users/receive', 'UserController@receive');
	Route::get('/users/{user}', 'UserController@show');
	Route::get('/progress', 'UserController@progress');
	Route::post('/projects/{project}/users/{user}/approve', 'ProjectController@approve');
	Route::get('/forms', 'FormController@index');
	Route::get('/news', 'NewController@index');
	Route::get('/news/{new}', 'NewController@show');
});