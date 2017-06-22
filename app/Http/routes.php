<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('admin/index');
    });
    Route::get('table', function () {
        return view('admin/table');
    });
    Route::get('jqgrid', function () {
        return view('admin/jqgrid');
    });

    //商品管理模块
    Route::get('goods/lst', 'GoodsController@index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin/index');
    });
    Route::get('table', function () {
        return view('admin/table');
    });
    Route::get('jqgrid', function () {
        return view('admin/jqgrid');
    });

    Route::get('goods/lst', 'GoodsController@index');
});

Route::resource('Goods', 'GoodsController');


//前台的登录
Route::any('ulogin', 'LoginController@login');
//前台首页
Route::any('index', 'LoginController@index');
//前台注册页
Route::any('reg', 'LoginController@reg');
//前台注册
Route::any('register', 'LoginController@register');
//个人中心
Route::any('order', 'OrderController@order');