<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Permissions;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

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
    public function store(Request $request)
    {
       $permission = $request->all();
       Permission::create($permission);

       return redirect('/admin/permissions');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function update(Request $request, $id)
    {
        $perms = Permission::findOrFail($id);
        $perms->name = $request->name;
        $perms->display_name = $request->display_name;
        $perms->description = $request->description;
        dd($perms->save());

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
            return redirect('admin/permissions');
        }
    }
}
