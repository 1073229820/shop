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
        $pilishen = Admin::create([

            'name'=>'jack',
            'pass'=>bcrypt('secret'),
            'userpic'=>'1.jpg',
            'sex'=>'1',
            'email'=>'1073229820@qq.com',
            'status'=>'1',
        ]);

        //创建初始化的role(初始化的角色设定)
        $admin  = Role::create([
            'name'=>'admin',
            'display_name'=>'管理员',
            'description'=>'super admin role'
        ]);


        //创建相应的初始权限
        $permissions = [
            [
                'name'=>'create_user',
                'display_name'=>'创建用户',
            ],

            [
                'name'=>'edit_user',
                'display_name'=>'编辑用户',
            ],

            [
                'name'=>'delete_user',
                'display_name'=>'删除用户',
            ],

        ];

        foreach ($permissions as $permission) {

            $manage_user = Permission::create($permission);

            //给角色赋予相应的权限
            $admin->attachPermission($manage_user);
        }



        //给用户赋予相应的角色
        $pilishen->attachRole($admin);
    }
}
