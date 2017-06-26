<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\Admin as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class Admin extends Model
{
    use EntrustUserTrait;

    protected $fillable = [
        'name', 'pass', 'userpic', 'sex', 'email', 'status'
    ];

    public function role ()
    {
        return $this->belongsToMany('App\Role');
    }
}
