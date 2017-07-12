<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Categories;
use App\Descr;
use App\Goods;
use App\Price;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class ItemController extends Controller
{
    public function show( $id)
    {
        $type = Categories::get();
        $newgoods = DB::table('goods as g')
            ->join('prices as p','g.id','=','p.goods_id')
            ->select('g.id','g.name','p.price','p.image')
            ->where('status',1)
            ->orderBy('created_at','desc')
            ->limit(10)
            ->get();
        $goods = Goods::where('id',$id)->first();
        $pid = Categories::where('id',$goods['type_id'])->pluck('pid')->first();//找到这个商品类别的父类别id
        $attr = Attribute::where('type_id',$pid)->pluck('attr_name','attr_price');
        $descrs = Descr::where('id',$id)->first();//商品的详细介绍
        $price = Price::where('goods_id',$id)->first();//价钱，属性参数，图片

//        dump($goods);dump($price);
//        echo "<img src='".asset($price['image'])."'>";dd($descrs);
        return view('home.item',compact('goods','descrs','price','attr','type','newgoods'));
    }
}
