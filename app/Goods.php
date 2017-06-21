<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //取消自动插入updated_at和created_at字段
    public $timestamps = false;
}
