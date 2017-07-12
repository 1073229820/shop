<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Role;
use App\Permission;
use App\Admin;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{

    /**
     * 角色首页
     *
     */
    public function index()
    {
        if (session('adminname')->ability(array('admin', 'roles'), array('role_create', 'role_edit', 'role_delete')))
        {
            $roles = Role::with('perms')->paginate(9);
            return view('/admin/roles/index', compact('roles'));
        } else {
            return abort(404);
        }

    }

    /**
     * 添加角色
     *
     */
    public function create()
    {
        if (session('adminname')->ability('admin', 'role_create'))
        {

            $perms = Permission::get();
            return view('admin/roles/create', compact('perms'));

        } else {
            return abort(404);
        }

    }

    /**
     *  功能：处理创建角色
     *
     */
    public function store(Requests\RolesRequest $request)
    {
        if (session('adminname')->ability('admin', 'role_create'))
        {

            $role = Role::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'description' => $request->description
            ]);

            //判断是否有勾选上权限
            if ($request->perms) {
//            dd($request->perms);
//            $permission = Permission::find($request->perm);
                //attachPermissions有‘s’意思是可以赋予多个权限
                $role->attachPermissions($request->perms);
            }

            if ($role) {
                return redirect('admin/roles');
            } else {
                return back()->withInput();
            }
        } else {

            return abort(404);
        }
    }

    /**
     * 功能：编辑角色
     *
     */
    public function edit($id)
    {
        if (session('adminname')->ability('admin', 'role_edit'))
        {

            $role = Role::with('perms')->find($id);
            $perms = Permission::get();
            return view('admin.roles.edit', compact('role', 'perms'));

        } else {

            return abort(404);
        }
    }

    /**
     * 功能：处理编辑角色
     *
     */
    public function update(Requests\RolesRequest $request, $id)
    {
        if (session('adminname')->ability('admin', 'role_edit'))
        {


            $role = Role::findOrFail($id);
            if ($role->name !== 'admin') {
                $role->name = $request->name;
            }
            $role->display_name = $request->display_name;
            $role->description = $request->descritpion;
            $role->save();
//        dd($request->perm);
            //获取所选中的权限，并赋予角色
            DB::table('permission_role')->where('role_id', $id)->delete();
            if ($request->perm) {

                $role->savePermissions($request->perm);
            }
            return redirect('admin/roles');
        } else {

            return abort(404);
        }
    }

    /**
     * 删除角色
     *
     */
    public function destroy($id)
    {
        if (session('adminname')->ability('admin', 'role_delete')) {

            $role = Role::findOrFail($id);
            $data = ['msg' => '超级管理员,不能删除!!!'];

            //当角色为admin时不给执行删除这个角色
            if ($role->name !== 'admin') {

                $role_admin = DB::table('role_admin')->where('role_id', $id)->delete();
                $permission_role = DB::table('permission_role')->where('role_id', $id)->delete();
                $roles = DB::table('roles')->where('id', $id)->delete();

                if ($roles) {
                    $data = [
                        'status' => 1,
                        'msg' => '删除角色成功'
                    ];
                } else {
                    $data = [
                        'status' => 2,
                        'msg' => '删除角色失败，请稍后再试！'
                    ];
                }
            }

            return $data;
        } else {

            $data = [
                'status' => 2,
                'msg' => '没有权限删除'
            ];

            return $data;
        }
    }

    /**
     * ajax检查创建的角色名称是否已存在
     *
     */
    public function checkRoleName()
    {
        $rname = $_GET['name'];
        $result = Role::where('name', $rname)->first();

        if ($result) {
            $data = [
                'status' => 1,
                'msg' => '*该角色名称已存在',
            ];
        } else {
            $data = [
                'status' => 2,
                'msg' => '可以添加'
            ];
        }
        return json_encode($data);

    }

    /**
     * ajax批量删除
     *
     */
    public function del()
    {
        //判断是否为admin这个角色或有role_delete这个权限
        if (session('adminname')->ability('admin', 'role_delete')) {
            $ids = $_POST['id'];
            //遍历删除
            foreach ($ids as $id) {

                $role = Role::findOrFail($id);
                $data = ['msg' => '超级管理员,不能删除!!!'];

                //当角色为admin时不给执行删除这个角色
                if ($role->name !== 'admin') {

                    $role_admin = DB::table('role_admin')->where('role_id', $id)->delete();
                    $permission_role = DB::table('permission_role')->where('role_id', $id)->delete();
                    $roles = DB::table('roles')->where('id', $id)->delete();

                    if ($roles) {
                        $data = [
                            'status' => 1,
                            'msg' => '批量删除成功'
                        ];
                    } else {
                        $data = [
                            'status' => 2,
                            'msg' => '删除角色失败，请稍后再试！'
                        ];
                    }
                }
            }
            return $data;
        } else {

            $data = [
                'stauts' => 2,
                'msg' => '没有删除权限'
            ];

            return $data;
        }
    }



}
