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
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('login', ['as'=>'login','uses'=>'auth\LoginController@login']);
Route::get('/logout', ['as'=>'logout','uses'=>'auth\LoginController@logout']);



Route::get('/','frontController@home');
Route::get('/sports','frontController@sports');
Route::get('/politics','frontController@politics');
Route::get('/entertainment','frontController@entertainment');

Route::get('/news/api/{type}/{category}/{limit}','frontController@api');





Route::group(['middleware' => ['Admin']], function () 
{

    Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'admin\pageController@index']);
    Route::Resource('admin/upload', 'admin\uploadController');

});

