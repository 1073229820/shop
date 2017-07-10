<?php

use Illuminate\Database\Seeder;

use App\Permission;
use App\Role;
use App\Admin;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //清空权限相关的数据表
        Permission::truncate();
        Role::truncate();
        Admin::truncate();


        DB::table('role_admin')->delete();
        DB::table('permission_role')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        //创建初始化的管理员用户
        $admin = Admin::create([

            'name'=>'admin',
            'pass'=>Hash::make(123456),
            'userpic'=>'20170703154404595a664459db4.jpg',
            'sex'=>'1',
            'email'=>'1073229820@qq.com',
            'status'=>'1',
        ]);

        //创建初始化的role(初始化的角色设定)
        $role  = Role::create([
            'name'=>'admin',
            'display_name'=>'超级管理员',
            'description'=>'super admin role'
        ]);


        //创建相应的初始权限
        $permissions = [
            [
                'name'=>'admin_create',
                'display_name'=>'创建管理员',

            ], [

                'name'=>'admin_edit',
                'display_name'=>'编辑管理员',

            ], [

                'name'=>'admin_delete',
                'display_name'=>'删除管理员',
            ], [

                'name'=>'user_create',
                'display_name'=>'创建用户',

            ], [

                'name'=>'user_edit',
                'display_name'=>'编辑用户',

            ], [

                'name'=>'user_delete',
                'display_name'=>'删除用户',
            ], [

                'name'=>'role_create',
                'display_name'=>'创建角色',

            ], [

                'name'=>'role_edit',
                'display_name'=>'编辑角色',

            ], [

                'name'=>'role_delete',
                'display_name'=>'删除角色',

            ], [

                'name'=>'perms_create',
                'display_name'=>'创建权限',

            ], [

                'name'=>'perms_edit',
                'display_name'=>'编辑权限',

            ], [

                'name'=>'perms_delete',
                'display_name'=>'删除权限',

            ],[

                'name'=>'category_create',
                'display_name'=>'创建商品分类',

            ], [

                'name'=>'category_edit',
                'display_name'=>'编辑商品分类',

            ], [

                'name'=>'category_delete',
                'display_name'=>'删除商品分类',

            ],[

                'name'=>'goods_create',
                'display_name'=>'创建商品',

            ], [

                'name'=>'goods_edit',
                'display_name'=>'编辑商品',

            ], [

                'name'=>'goods_delete',
                'display_name'=>'删除商品',

            ],[

                'name'=>'orders_create',
                'display_name'=>'创建订单',

            ], [

                'name'=>'orders_edit',
                'display_name'=>'编辑订单',

            ], [

                'name'=>'orders_delete',
                'display_name'=>'删除订单',

            ], [

                'name'=>'link_create',
                'display_name'=>'创建友链',

            ], [

                'name'=>'link_edit',
                'display_name'=>'编辑友链',

            ], [

                'name'=>'link_delete',
                'display_name'=>'删除友链',

            ],


        ];

        foreach ($permissions as $permission) {

            $manage_user = Permission::create($permission);

            //给角色赋予相应的权限
//            $role->attachPermission($manage_user);
    }



        //给用户赋予相应的角色
        $admin->attachRole($admin);
    }
}
