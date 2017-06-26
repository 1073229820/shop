<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Role;
use App\Permission;

class RolesController extends Controller
{
    //这里限制了用户通过地址栏方式访问到这个页面，只有这个用户登录了并且角色为admin是才可以访问
 /*   public function __construct()
    {
        $this->middleware('role:admin');
        $this->middleware('ability:admin|owner, edit_role', ['only' => 'update']);
        $this->middleware(['abliity:delete_role', 'protect.admin.role'], ['only' => 'destroy']);

    }*/

    /**
     * 角色首页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('perms')->get();
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
    public function store(Request $request)
    {

        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);

        //判断是否有勾选上权限
        if ($request->perm) {
            $permission = Permission::find($request->perm);
            //attachPermissions有‘s’意思是可以赋予多个权限
            $role->attachPermissions($permission);
        }

        if ($role) {
            return redirect('admin/roles');
        } else {
            return back()->withInput();
        }
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
     * 功能：更新角色
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        if ($role->name !== 'admin') {
            $role->name = $request->name;
        }
        $role->display_name = $request->display_name;
        $role->description = $request->descritpion;
        $role->save();

        //获取所选中的权限，并赋予角色
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

        //当角色为admin时不给执行删除这个角色
        if ($role->name !== 'admin') {

            $role->permission()->detach();
            $role->delete();
        }

        return redirect('admin/role');

        /*   $role->users()->sync();
           $role->perms->sync();
   //        $role->forceDelete();*/


    }

}
