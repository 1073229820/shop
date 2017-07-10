<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLoginInfo extends Model
{
    protected $table = 'admin_login_infos';

    protected $fillable = [
        'user_id', 'ipaddr', 'logintime', 'pass_wrong_time_status',
    ];
}
