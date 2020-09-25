<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin/')->group(function () {
	Route::get('/','UserController@loginFormAdmin')->name('login-admin');

	// Route::group(['middleware' => ['admin']], function () {
		Route::post('loginUser', 'UserController@loginUser')->name('user-login');

		Route::prefix('user/')->group(function () {
			Route::get('list', 'UserController@showUser')->name('show-user');
			Route::get('register', 'UserController@addUser')->name('add-user');
			Route::post('add', 'UserController@saveUser')->name('save-user');
			Route::get('{id}/edit', 'UserController@editUser')->name('edit-user');
			Route::put('{id}/update', 'UserController@updateUser')->name('update-user');
			Route::delete('{id}/delete', 'UserController@deleteUser')->name('delete-user');
			Route::get('search','UserController@searchUser')->name('search-user');
		});
	// });
});

