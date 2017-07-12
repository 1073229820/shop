<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Permissions;

class PermissionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('ProtectAdminPerms', ['only'=> 'destroy'] );
    }

    /**
     * 权限首页
     *
     */
    public function index()
    {
        //判断当前登录用户是否拥有admin或perms 角色，或者用户有perms_create,perms_edit,perms_delete这三个中的任意权限
        if (session('adminname')->ability(array('admin', 'perms'), array('perms_create', 'perms_edit', 'perms_delete'))) {

            $permissions = Permission::paginate(9);
            return view('admin.permissions.index', compact('permissions'));
        } else {

            return abort(404);
        }

    }

    /**
     *添加权限
     *
     */
    public function create()
    {
        if (session('adminname')->ability('admin', 'perms_create'))
        {
            return view('admin.permissions.create');

        } else {

            return abort(404);
        }

    }

    /**
     *执行添加权限
     *
     */
    public function store(Requests\PermissionsRequest $request)
    {
        if (session('adminname')->ability('admin', 'perms_create')) {

            $permission = $request->all();
            Permission::create($permission);
            return redirect('/admin/permissions');

        } else {

            return abort(404);
        }

    }

    /**
     * 编辑权限
     *
     */
    public function edit($id)
    {
        if (session('adminname')->ability('admin', 'perms_edit'))
        {
            $perms = Permission::findOrFail($id);
            return view('admin/permissions/edit', compact('perms'));

        } else {

            return abort(404);
        }
    }

    /**
     *  执行编辑权限
     *
     */
    public function update(Requests\PermissionsRequest $request, $id)
    {
        if (session('adminname')->ability('admin', 'perms_edit'))
        {
            $perms = Permission::findOrFail($id);
            $perms->name = $request->name;
            $perms->display_name = $request->display_name;
            $perms->description = $request->description;
            $perms->save();

            return redirect('admin/permissions');

        } else {

            return abort(404);
        }
    }

    /**
     * 删除权限
     *
     */
    public function destroy($id)
    {
        if (session('adminname')->ability('admin', 'perms_delete'))
        {
            $perms = Permission::findOrFail($id);
            if ($perms->delete()) {

                $data = [
                    'status' => 1,
                    'msg' => '删除权限成功'
                ];
            } else {
                $data = [
                    'status' => 2,
                    'msg' => '删除权限失败，请稍后再试！'
                ];
            }

            return $data;
        } else {

            $data = [
                'status' => 2,
                'msg' => '没有删除权限！'
            ];

            return $data;
        }
    }

    /**
     * ajax检查权限名称是否存在
     */
    public function checkPermsName ()
    {
        //获取ajax传过来的name 值，并查询数据库
        $pname = $_POST['name'];
        $result = Permission::where('name', $pname)->first();

        if ($result) {

            $data = [
                'status' => 1,
                'msg' => '*该权限名称已存在'
            ];
        } else {

            $data = [
                'status' => 2,
                'msg' => '可以添加'
            ];
        }

        return json_encode($data);
    }
}
