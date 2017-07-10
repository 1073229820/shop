<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Http\Requests;
use DB;


class ProductListController extends Controller
{
    public function index()
    {
        $type = Categories::get();
        $first = DB::table('goods as g')
            ->join('prices as p','g.id','=','p.goods_id')
            ->select('g.id','g.name','p.price','p.image');
        if( !empty( request('type')) ) {
            $first = $first->where('type_id',request('type'));
        }
        if( !empty( request('search')) ) {
            $first = $first->where('name','like','%'.request('search').'%');
        }

        if( !empty( request('order')) ) {
            $order = request('order');
            $ordername = request('ordername');
            $goods = $first
                ->orderBy($ordername,$order)
                ->paginate(9);
        } else {
            $goods = $first->paginate(9);
        }
//        dd($goods);
        return view('home.productList',compact('type','goods'));


    }
}
