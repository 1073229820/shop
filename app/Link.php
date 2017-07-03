<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    protected $fillable = [
       'name', 'url', 'sort_num','status'
    ];
    public $timestamps = false;
}
