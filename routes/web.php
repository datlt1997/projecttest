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
Route::get('/', function () {
    return view('login.login_form');
});
Route::post('loginUser', 'UserController@loginWeb')->name('user-login');
Route::get('showUser', 'UserController@showUser')->name('show-user');
Route::get('addUser', 'UserController@addUser')->name('add-user');
Route::post('userUser', 'UserController@saveUser')->name('save-user');
Route::get('editUser/[id]', 'UserController@editUser')->name('edit-user');
Route::put('updateUser/[id]', 'UserController@updateUser')->name('update-user');
Route::delete('deleteUser/[id]', 'UserController@deleteUser')->name('delete-user');

