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
//    Route::get('goods/lst', 'GoodsController@index');



//角色权限路由
   Route::group(['prefix'=>'admin', 'middleware'=>'AdminChenckLogin'], function () {
        Route::resource('roles', 'RolesController');
        Route::resource('permissions', 'PermissionsController');
        Route::resource('admins', 'AdminsController');

    });

    //管理员登录、注销、认证码路由
    Route::get('login', 'LoginController@AdminLogin');
    Route::post('login', 'LoginController@signin');
    Route::get('logout', 'LoginController@logout');
    Route::any('code', 'LoginController@code');
    Route::any('getcode', 'LoginController@getCode');

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


//    Route::get('goods/lst', 'GoodsController@index');
});





//首页ajax滚动加载测试
Route::get('ajax', 'LoginController@ajax');
Route::get('ajaxGet', 'LoginController@ajaxGet');


/*Route::group(['middleware' => ['web','user.login']], function(){*/

    //前台的登录
    Route::any('ulogin', 'LoginController@login');
//前台首页
    Route::any('index', 'LoginController@index');
//前台注册页
    Route::any('reg', 'LoginController@reg');
//前台注册

    Route::any('register', 'LoginController@register');

    Route::any('register', 'LoginController@register');
//个人中心6
    Route::any('order', 'OrderController@order');
//修改个人资料
    Route::any('newinfo', 'OrderController@newinfo');
//密码找回
    Route::any('passshow', 'LostPassController@show');
    Route::any('passget', 'LostPassController@getpass');
//密码重设
    Route::any('passsetshow', 'LostPassController@setpassshow');
    Route::any('passset', 'LostPassController@setpass');
    Route::any('newpass', 'LostPassController@newpass');

/*});*/


//会员管理
Route::group(['prefix' => 'admin'], function () {

    Route::r0esource('userinfo', 'UserController');


});






