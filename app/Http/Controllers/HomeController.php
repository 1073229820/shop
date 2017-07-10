<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use App\Price;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {   
        $type = Categories::get();
        $goods = DB::select('select g.*,p.* from goods g,prices p where g.id = p.goods_id');
//        dd($goods);
//        $newgood = Goods::where('status',1)->limit(10);
//        $data = DB::table('goods')->lists('name','id');dd($data);
        //新品上市
        $newgoods = DB::table('goods as g')
            ->join('prices as p','g.id','=','p.goods_id')
            ->select('g.id','g.name','p.price','p.image')
            ->where('status',1)
            ->orderBy('created_at','desc')
            ->limit(10)
            ->get();
        //店家推荐
        $recommend = DB::table('goods as g')
            ->join('prices as p','g.id','=','p.goods_id')
            ->select('g.id','g.name','p.price','p.image')
            ->where('recommend',1)
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();
//        dd($newgoods);
        //热卖中
        $hotgoods = DB::table('goods as g')
            ->join('prices as p','g.id','=','p.goods_id')
            ->select('g.id','g.name','p.price','p.image')
            ->where('hot',1)
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();
        return view('home.index',compact('type','goods','newgoods','hotgoods','recommend'));
    }
}
