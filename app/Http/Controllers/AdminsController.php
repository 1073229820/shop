<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use App\Role;

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
//        return redirect('admin/admins/login')->withInput();
        dd($request->all());

    }


    /**
     *管理员首页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //相当于联表查询
        $post = Admin::with('roles')->get();
        return view('admin/admins/index', compact('post'));
    }

    /**
     *添加管理员
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin/admins/create', compact('roles'));
    }

    /**
     *处理添加管理员
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = Admin::create([
            'name' => $request->name,
            'pass' => $request->pass,
            'userpic' => $request->userpic,
            'sex' => $request->sex[0],
            'email' => $request->email,
            'status' => $request->status[0],
        ]);
        //给管理员赋予角色
        $roles = $request->roles;
        $admin->attachRoles($roles);

        return redirect('admin/admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     *更新管理员
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
//        dd($request->status[0]);
        $admin->name = $request->name;
        $admin->pass = $request->pass;
        $admin->userpic = $request->userpic;
        $admin->sex = ($request->sex)[0];
        $admin->email = $request->email;
        $admin->status = ($request->status)[0];
        $admin->save();

        //清空原有的角色
        $admin->detachRoles();
        //给管理员赋予角色
        if ($request->roles) {
            $admin->attachRoles($request->roles);
        }
        return redirect('admin/admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin->delete()) {
            return redirect('admin/admins');
        }
    }
}
