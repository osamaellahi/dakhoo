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
    return view('message.index');
});
Route::get('/about', function () {
    return view('message.about');
});
Route::get('/message/alldata','MessageController@alldata');
Route::resource('messages', 'MessageController');
