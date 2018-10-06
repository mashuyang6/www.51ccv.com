<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group([
], function () {
    Route::get('/', 'IndexController@index');

    //管理员登录
    Route::get('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');
    Route::post('/dologin', 'LoginController@doLogin');

});