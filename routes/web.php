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
//});

//管理员
Route::get('/','Index\IndexController@index');
Route::get('/add','Index\IndexController@add');
Route::any('/do_add','Index\IndexController@do_add');
Route::any('/show','Index\IndexController@show');
Route::any('/do_del','Index\IndexController@do_del');
Route::any('/up/{id}','Index\IndexController@up');
Route::any('/do_up','Index\IndexController@do_up');
//分类
Route::get('/addcate','Index\CateController@addcate');
Route::any('/do_addcate','Index\CateController@do_addcate');
Route::any('/catelist','Index\CateController@catelist')->middleware('checklogin');
Route::any('/deldo','Index\CateController@deldo');
Route::any('/cateup','Index\CateController@cateup');
Route::any('/docateup','Index\CateController@docateup');


Route::any('/reg','Reg\RegController@reg');
Route::any('/do_reg','Reg\RegController@do_reg');
Route::any('/login','Reg\RegController@login');
Route::any('/do_login','Reg\RegController@do_login');
Route::any('/role','Reg\RegController@role');
Route::any('/addrole','Reg\RegController@addrole');
Route::any('/rolelist','Reg\RegController@rolelist');
Route::any('/uprole/{id}','Reg\RegController@up');
Route::any('/do_uprole','Reg\RegController@do_up');
Route::any('/priv','Reg\RegController@priv');
Route::any('/do_priv','Reg\RegController@do_priv');
Route::any('/privlist','Reg\RegController@privlist');

//前台
Route::get('/index','QianTai\IndexController@index');