<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Foundation\Auth\Admin as Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Admin extends Authenticatable
{
    use EntrustUserTrait;

    protected $fillable = [
        'name', 'pass', 'userpic', 'sex', 'email', 'status'
    ];

    public function role ()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     *判断是否是初始管理员admin和初始角色admin，编辑初始管理员时，
     * 不给修改admin这个角色，其他角色可以添加或去除
     */
    public function is_admin ($role)
    {
        $role = $role->name == 'admin';
        $admin = $this->name == 'admin';

        if ($role && $admin) {
            //给所在的checkbox返回'disabled'值，不给修改
            return 'disabled';
        }
    }
}
