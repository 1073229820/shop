<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        $type = Categories::get();
        return view('home.index',compact('type'));
    }
}
