<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable=[
        'name', 'display_name', 'description'
    ];

    public function admin ()
    {
        return $this->belongsToMany('App\Admin');
    }

    public function permission ()
    {
        return $this->belongsToMany('App\Permission');
    }


}