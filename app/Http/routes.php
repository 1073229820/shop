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


/*

DB::listen(function($sql) {
dump($sql);
echo $sql->sql;
dump($sql->bindings);
});*/

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


/*Route::group(['middleware' => ['web','user.login']], function(){*/

    //前台的登录
    Route::any('ulogin', 'LoginController@login');
    //前台退出
    Route::any('logout', 'LoginController@logout');
//前台首页
    Route::any('index', 'LoginController@index');
//前台注册页
    Route::any('reg', 'LoginController@reg');
//前台注册

    Route::any('register', 'LoginController@register');

    Route::any('checkemail', 'LoginController@checkemail');
//个人中心
  /*  Route::any('order', 'OrderController@order');*/
//修改个人资料
    /*Route::any('newinfo', 'OrderController@newinfo');*/
//密码找回
    Route::any('passshow', 'LostPassController@show');
    Route::any('passget', 'LostPassController@getpass');
//密码重设
    Route::any('passsetshow', 'LostPassController@setpassshow');
    Route::any('passset', 'LostPassController@setpass');
    Route::any('newpass', 'LostPassController@newpass');
//邮箱密码找回
    Route::any('passinfo', 'LostPassController@passinfo');

/*});*/

Route::group(['middleware' => ['web','user.login']], function(){

    //个人中心
    Route::any('order', 'OrderController@order');
//修改个人资料
    Route::any('newinfo', 'OrderController@newinfo');

});


//会员管理
Route::group(['prefix' => 'admin'], function () {

    Route::resource('userInfo', 'UserController');

//友情链接

    Route::resource('link', 'LinkController');
    Route::post('link/changesortnum', 'LinkController@changesortnum');
});





