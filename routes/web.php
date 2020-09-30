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

Route::get('/', 'HomeController@index')->name('home');

/**
 *  Авторизация
 */
Route::get('/register', 'AuthController@getRegister')->middleware('guest')->name('auth.register');
Route::post('/register', 'AuthController@postRegister')->middleware('guest');

Route::get('/login', 'AuthController@getLogin')->middleware('guest')->name('auth.login');
Route::post('/login', 'AuthController@postLogin')->middleware('guest');
Route::get('/logout', "AuthController@getLogout")->name("auth.logout");


/**
 * Поиск
 */
Route::get('/search', "SearchController@getResults")->name('search.results');


/**
 * Профили
 */
Route::get('/user/{username}', 'ProfileController@getProfile')->name('profile.index');









