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
//角色权限路由
   Route::group(['prifix'=>'admin', 'middleware'=>'AdminChenckLogin'], function () {
        Route::resource('roles', 'RolesController');
        Route::resource('permissions', 'PermissionsController');
        Route::resource('admins', 'AdminsController');

    });

    //管理员登录、注销、认证码路由
    Route::get('login', 'LoginController@login');
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

//角色权限路由
Route::group(['prifix'=>'admin', 'middleware'=>'AdminChenckLogin'], function () {
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('admins', 'AdminsController');


});

//管理员登录、注销、认证码路由
    Route::get('login', 'LoginController@login');
    Route::post('login', 'LoginController@signin');
    Route::get('logout', 'LoginController@logout');
    Route::any('code', 'LoginController@code');
    Route::any('getcode', 'LoginController@getCode');

    //验证码的路由

    //文件上传路由
     Route::any('upload', 'UploadsController@upload');

     //添加管理员时，ajax检查管理员用户名是否存在
    Route::any('checkAdminName', 'AdminsController@checkAdminName');

    //添加角色时，ajax检查角色名称是否存在
    Route::any('checkRoleName', 'RolesController@checkRoleName');

    //添加权限时，ajax检查权限名称是否存在
    Route::any('checkPermsName', 'PermissionsController@checkPermsName');

    //批量删除路由
    Route::any('roles/del/ee', 'RolesController@del');



});