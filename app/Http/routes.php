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



Route::group(['prefix' => 'admin'], function () {


    Route::group(['middleware'=>'AdminCheckLogin'], function () {
        Route::resource('roles', 'RolesController');
        Route::resource('permissions', 'PermissionsController');
        Route::resource('admins', 'AdminsController');
        Route::get('/', function () {
            return view('admin/index');
        });


        Route::get('table', function () {
            return view('admin/table');
        });
        Route::get('jqgrid', function () {
            return view('admin/jqgrid');
        });
        //文件上传路由
        Route::any('upload', 'UploadsController@upload');

        //添加管理员时，ajax检查管理员用户名是否存在
        Route::any('checkAdminName', 'AdminsController@checkAdminName');

        //添加角色时，ajax检查角色名称是否存在
        Route::any('checkRoleName', 'RolesController@checkRoleName');


        //添加权限时，ajax检查权限名称是否存在
        Route::any('checkPermsName', 'PermissionsController@checkPermsName');

        //批量删除路由
        Route::any('roles/del/del', 'RolesController@del');


        Route::resource('userInfo', 'UserController');
//友情链接

        Route::resource('link', 'LinkController');
        Route::post('link/changesortnum', 'LinkController@changesortnum');


        //订单管理
        Route::get('orders', 'OrderController@adminIndex');

        Route::get('orders/edit/{id}', 'OrderController@edit');
        Route::get('orders/detail/{id}', 'OrderController@detail');


    });

    //管理员登录、注销、认证码路由
    Route::get('login', 'LoginController@AdminLogin');
    Route::post('login', 'LoginController@signin');
    Route::get('logout', 'LoginController@signout');
    Route::any('code', 'LoginController@code');
    Route::any('getcode', 'LoginController@getCode');


//商品管理模块
    Route::resource('goods', 'GoodsController');//商品
    Route::resource('goodstype','GoodsTypeController');//商品类别
    Route::get('data/goodstype','GoodsTypeController@data');
    Route::get('data2/goodstype','GoodsTypeController@data2');
    Route::get('data3/goodstype','GoodsTypeController@data3');
    Route::resource('attribute','AttributeController');//商品属性
    Route::get('data/attribute','AttributeController@data');
    Route::any('admin/upload','UploadController@upload');//图片上传
    Route::resource('goodsprice','GoodsPriceController');
    Route::get('data/goodsprice','GoodsPriceController@data');



});

// 前台首页
    Route::any('home','HomeController@index');
    Route::any('item/{id?}','ItemController@show');//商品详情页
    Route::any('productlist','ProductListController@index');


//首页ajax滚动加载测试
Route::get('ajax', 'LoginController@ajax');
Route::get('ajaxGet', 'LoginController@ajaxGet');
Route::get('cart', 'CartController@index');
Route::any('cart/store', 'CartController@store');
Route::any('cart/order', 'CartController@order');

Route::get('cart/ajaxUpdateGoods', 'CartController@ajaxUpdateGoods');
Route::post('order/store', 'OrderController@store');
Route::get('history/orders', 'OrderController@index');


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

//个人中心6
    Route::any('order', 'OrderController@order');

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




