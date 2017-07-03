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
    //这里限制了用户通过地址栏方式访问到这个页面
    public function __construct()
    {
//        $this->middleware('ability:admin|roles, role_edit', ['only' => 'update']);
//        $this->middleware(['abliity:role_edit', 'protect.admin.role'], ['only' => 'destroy']);

//        $this->middleware('ProtectAdminRole', ['only'=>'destroy']);
    }

    /**
     * 角色首页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('perms')->paginate(9);
//        $perms = Permission::get();
        return view('/admin/roles/index', compact('roles'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perms = Permission::get();
        return view('admin/roles/create', compact('perms'));
    }

    /**
     *  功能：处理创建角色
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RolesRequest $request)
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
    }

    /**
     * 功能：编辑角色
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::with('perms')->find($id);
        $perms = Permission::get();
        return view('admin.roles.edit', compact('role', 'perms'));
    }

    /**
     * 功能：处理编辑角色
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\RolesRequest $request, $id)
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
    }

    /**
     * 删除角色
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $data = ['msg'=> '超级管理员,不能删除!!!'];

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

    public function del()
    {
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
    }



}
