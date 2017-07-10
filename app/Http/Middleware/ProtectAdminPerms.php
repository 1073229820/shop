<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;

class ProtectAdminPerms
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = [
            //管理员权限
            'admin_create', 'admin_edit', 'admin_delete',

            //前台用户权限
            'user_create', 'user_edit', 'user_delete',

            //角色权限
            'role_create', 'role_edit', 'role_delete',

            //权限操作
            'perms_create', 'perms_edit', 'perms_delete',

            //商品分类权限
            'category_create', 'category_edit', 'category_delete',

            //商品权限
            'goods_create', 'goods_edit', 'goods_delete',

            //订单权限
            'orders_create', 'orders_edit', 'orders_delete',

            //友链权限
            'link_create', 'link_edit', 'link_delete',

        ];

        $id = $request->route('permissions');
        $perms = Permission::findOrFail($id);
        $name = $perms->name;
        if (in_array($name, $data)) {

            $data = [
                    'status'=> 2,
                    'msg' => '初始权限不能删除'
                ];

            return $data;
        }
        return $next($request);
    }
}
