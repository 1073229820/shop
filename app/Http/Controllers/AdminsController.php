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
     *管理员首页
     *
     */
    public function index()
    {
        if(session('adminname')->ability(array('admin'), array('admin_create','admin_edit','admin_delete')))
        {
            //相当于联表查询
            $post = Admin::with('roles')->paginate(10);
            return view('admin/admins/index', compact('post'));
        } else {

            return abort(503);
        }
    }

    /**
     *添加管理员
     *
     */
    public function create()
    {
        if(session('adminname')->ability('admin', 'admin_create'))
        {
            $roles = Role::all();
            return view('admin/admins/create', compact('roles'));
        } else {

            return abort(503);
        }
    }

    /**
     *执行添加管理员
     *
     */
    public function store(Requests\AdminsRequest $request)
    {
        if(session('adminname')->ability('admin', 'admin_create'))
        {
            $filePath = '';
            //判断是否有头像上传
            $file = $request->file('userpic');
            if ($file) {
                $originalExtension = $file->getClientOriginalExtension();//获取扩展名
                $realPath = $file->getRealPath();//临时路径
                $fileName = date('YmdHis') . uniqid() . '.' . $originalExtension;//拼接文件名
                Storage::disk('uploads')->put($fileName, file_get_contents($realPath));//执行移动
                $filePath = 'uploads/' . $fileName;//上传后的文件路径
            }

            //执行添加管理员
            $admin = Admin::create([
                'name' => $request->name,
                'pass' => Hash::make($request->pass),//hash加密密码
                'userpic' => $filePath,
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
        } else {

            return abort(503);
        }
    }

    /**
     *编辑管理员
     *
     */
    public function edit($id)
    {
        if(session('adminname')->ability('admin', 'admin_edit'))
        {
            $post = Admin::findOrFail($id);
            $roles = Role::get();
            return view('admin/admins/edit', compact('post', 'roles'));
        } else {

            return abort(503);
        }
    }

    /**
     *执行编辑管理员
     *
     */
    public function update(Requests\AdminsRequest $request, $id)
    {
        if(session('adminname')->ability('admin', 'admin_edit')) {
            //获取旧的头像路径
            $admin = Admin::findOrFail($id);
            $filePath = $admin->userpic;

            //判断头像是否更新,有执行上传，并更改路径
            $file = $request->file('userpic');
            if ($file) {

                $originalExtension = $file->getClientOriginalExtension();//获取扩展名
                $realPath = $file->getRealPath();//临时路径s
                $fileName = date('YmdHis') . uniqid() . '.' . $originalExtension;//拼接文件名
                Storage::disk('uploads')->put($fileName, file_get_contents($realPath));//执行移动
                Storage::disk('uploads')->delete(substr($filePath, 8));//删除原有的头像
                $filePath = 'uploads/' . $fileName;//上传后的文件路径

            }


            //获取原来的密码,判断与传过来的密码是否一样，不一样的话要hash加密，然后再插入数据库
            $originPass = $admin->pass;
            //传过来的密码
            $pass = $request->pass;
            if ($originPass != $pass) {
                $pass = Hash::make($pass);
            }

            $admin->name = $request->name;
            $admin->pass = $pass;
            $admin->userpic = $filePath;
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

        } else {

            return abort(503);
        }
    }

    /**
     * 执行删除管理员
     *
     */
    public function destroy($id)
    {
        if(session('adminname')->ability('admin', 'admin_delete')) {
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
        } else {

            $data = [
                'status' => 2,
                'msg' => '管理员删除失败,没有删除管理员权限！'
            ];
            return $data;
        }
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
