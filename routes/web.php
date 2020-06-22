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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','Index\IndexController@index');
Route::get('/add','Index\IndexController@add');
Route::any('/do_add','Index\IndexController@do_add');
Route::any('/show','Index\IndexController@show');
Route::any('/do_del','Index\IndexController@do_del');
Route::any('/up/{id}','Index\IndexController@up');
Route::any('/do_up','Index\IndexController@do_up');