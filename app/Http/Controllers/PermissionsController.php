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
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(9);

        return view('admin.permissions.index', compact('permissions'));

    }

    /**
     *添加权限
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     *执行添加权限
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PermissionsRequest $request)
    {
       $permission = $request->all();
       Permission::create($permission);

       return redirect('/admin/permissions');

    }

    /**
     * @param  int  $id   编辑权限
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perms = Permission::findOrFail($id);

        return view('admin/permissions/edit',compact('perms'));
    }

    /**
     *  执行编辑权限
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PermissionsRequest $request, $id)
    {
        $perms = Permission::findOrFail($id);
        $perms->name = $request->name;
        $perms->display_name = $request->display_name;
        $perms->description = $request->description;
        $perms->save();

        return redirect('admin/permissions');
    }

    /**
     * @param  int  $id   删除权限
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perms = Permission::findOrFail($id);
        if ($perms->delete()) {

            $data = [
                'status' =>1,
                'msg' => '删除权限成功'
            ];
        } else {
            $data = [
                'status' => 2,
                'msg' => '删除权限失败，请稍后再试！'
            ];
        }

        return $data;
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
