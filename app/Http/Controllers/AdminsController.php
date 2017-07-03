<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Admin;
use App\Role;
use Auth;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminsController extends Controller
{

    /**
     * 后台管理员登录界面
     */
    public function login()
    {
        return view('admin/admins/login');
    }

    /**
     * 处理后台管理员登录
     */
    public function signin(Requests\AdminLoginRequest $request)
    {
        $name = $request->name;
        $pass = $request->pass;

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

    /**
     *管理员首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //相当于联表查询
        $post = Admin::with('roles')->paginate(10);
        return view('admin/admins/index', compact('post'));
    }

    /**
     *添加管理员
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin/admins/create', compact('roles'));
    }

    /**
     *执行添加管理员
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\AdminsRequest $request)
    {
        $pass = Hash::make($request->pass);
        $admin = Admin::create([
            'name' => $request->name,
            'pass' => $pass,
            'userpic' => $request->userpic,
            'sex' => $request->sex[0],
            'email' => $request->email,
            'status' => $request->status[0],
        ]);
        //给管理员赋予角色
        $roles = $request->roles;
        if ($roles) {
            $admin->attachRoles($roles);
        }
        return redirect('admin/admins');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Admin::findOrFail($id);
        $roles = Role::get();
        return view('admin/admins/edit', compact('post', 'roles'));
    }

    /**
     *执行编辑管理员
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\AdminsRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);

        //获取原来的密码,判断与传过来的密码是否一样，不一样的话要hash加密，然后再插入数据库
        $originPass = $admin->pass;
        //传过来的密码
        $pass = $request->pass;
        if ($originPass != $pass) {
            $pass = Hash::make($pass);
        }

        $admin->name = $request->name;
        $admin->pass = $pass;
        $admin->userpic = $request->userpic;
        $admin->sex = ($request->sex)[0];
        $admin->email = $request->email;
        $admin->status = ($request->status)[0];
        $admin->save();

        //清空原有的角色
        $admin->detachRoles();
        //判断是否为初始管理员admin，是的话赋予超级管理员的角色
        if ($admin->name == 'admin') {
            $role = Role::where('name', 'admin')->first();
            $admin->attachRole($role);
        }
        //给管理员赋予角色
        if ($request->roles) {
            $admin->attachRoles($request->roles);
        }
        return redirect('admin/admins');
    }

    /**
     * 执行删除管理员
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
//        dd($admin);
        $data = ['msg' => '初始管理员不能删除'];
        if ($admin->name !== 'admin') {
            //删除管理员
            $result = Admin::where('id', $id)->delete();
            //删除与该管理员所关联的role_admin表的数据
            $role_admin = DB::table('role_admin')->where('admin_id', $id)->delete();

            if ($result) {
                $data = [
                    'status' => 1,
                    'msg' => '管理员删除成功'
                ];
            } else {
                $data = [
                    'status' => 2,
                    'msg' => '管理员删除失败,请稍后重试！'
                ];
            }
        }
        return $data;
    }

    /**
     * ajax发送请求查询检查用户名是否存在
     *
     */
    public function checkAdminName()
    {
        $name = $_POST['name'];
        $result = Admin::where('name', $name)->first();

        if ($result) {
            $data = [
                'status' => 1,
                'msg' => '*用户名已存在',
            ];
        } else {
            $data = [
                'status' => 2,
                'msg' => ''
            ];
        }

        return $data;
    }
}
