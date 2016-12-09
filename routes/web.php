<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin' , 'middleware' => 'auth'] , function () {
    Route::get('/' , function () {
        return 'test';
    });
    Route::get('demo' , function () {
        return 'demo';
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index');