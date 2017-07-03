<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //
    protected $fillable = [
        'pass_wrong_time_status', 'ipaddr','logintime','user_id'
    ];
    public $timestamps = false;

}
