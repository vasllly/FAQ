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
    return view('index');
});

Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::middleware('auth')->namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('admin.index');
    Route::resource('users', 'UserController');
    Route::resource('themes', 'ThemeController');
    Route::resource('questions', 'QuestionController');
    Route::get('questions/{question}/answer', 'QuestionController@answer')->name('questions.answer');
});
