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
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', ['as'=>'login','uses'=>'auth\LoginController@login']);
Route::get('/logout', ['as'=>'logout','uses'=>'auth\LoginController@logout']);




Route::group(['middleware' => ['Admin']], function () 
{

    Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'admin\pageController@index']);
    Route::Resource('admin/upload', 'admin\uploadController');

});