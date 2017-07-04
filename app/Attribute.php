<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];    //这里的字段不可写入

    public $timestamps = false;
}
