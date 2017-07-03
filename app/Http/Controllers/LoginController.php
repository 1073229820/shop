<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use Illuminate\Support\Facades\Hash;
require_once '/code/Code.class.php';

class LoginController extends Controller
{
    /**
     * 后台管理员登录界面
     */
    public function login()
    {
        return view('admin/admins/login');
    }

    /**
     * 认证码
     */
    public function code()
    {
        $code = new \Code();
        $code->make();
    }

    /**
     * 处理后台管理员登录
     */
    public function signin(Requests\AdminLoginRequest $request)
    {
        $name = $request->name;
        $pass = $request->pass;
        $code = $request->code;

        //核对验证码
        $Code = new \Code();
        if ($Code->check($code)) {

            //验证管理员账号
            $user = Admin::where('name', $name)->first();
            if ($user) {
                //判断密码
                if (Hash::check($pass, $user->pass)) {

                    //判断用户状态
                    if ($user->status == 1) {

                        //存入session
                        session(['adminname' => $user]);
                        return redirect('admin/')->with(['success' => '登录成功']);
                    } else {
                        return redirect('admin/login')->withInput()->with(['fail' => '该管理员已被禁用']);
                    }
                } else {
                    return redirect('admin/login')->withInput()->with(['fail' => '账号和密码不匹配']);
                }
            } else {
                return redirect('admin/login')->withInput()->with(['fail' => '账号不存在']);
            }
        } else {
            return redirect('admin/login')->withInput()->with(['fail' => '认证码不正确']);

        }
        /*   if ($user) {
               session(['adminname' => $user]);
               return redirect('admin/')->with(['success'=>'登录成功']);
           } else {
               return redirect('admin/login')->withInput()->with(['fail'=>'账号和密码不匹配或被禁用']);
           }*/

    }

    /**
     *  处理管理员注销
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        //清除session值
        $request->session()->forget('adminname');
        return redirect('admin/login');
    }
}
