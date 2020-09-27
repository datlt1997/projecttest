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
Route::group(['prefix' => 'admin/', 'namespace' => 'Admin'], function() {
	
	Route::get('/','LoginController@loginFormAdmin')->name('form-login-admin')->middleware('checklogin');
	Route::post('loginUser', 'LoginController@loginAdmin')->name('admin-login');
	Route::get('logout', 'LoginController@logoutAdmin')->name('admin-logout');

	Route::group(['middleware' => ['admin']], function () {
		Route::group(['prefix' => 'user/',], function() {
			Route::get('list', 'UserController@showUser')->name('show-user');
			Route::get('register', 'UserController@addUser')->name('add-user');
			Route::post('add', 'UserController@saveUser')->name('save-user');
			Route::get('{id}/edit', 'UserController@editUser')->name('edit-user');
			Route::put('{id}/update', 'UserController@updateUser')->name('update-user');
			Route::delete('{id}/delete', 'UserController@deleteUser')->name('delete-user');
			Route::get('search/','UserController@searchUser')->name('search-user');
		});
	});

});

