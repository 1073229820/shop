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
     *
     */
    public function is_admin ($role)
    {
        $role = $role->name == 'admin';
        $admin = $this->name == 'admin';

        if ($role && $admin) {
            return 'disabled';
        }
    }
}
