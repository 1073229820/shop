<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Categories;
use App\Descr;
use App\Goods;
use App\Price;
use Illuminate\Http\Request;

use App\Http\Requests;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::orderby('id','asc')->paginate(10);
        return view('admin.goods.goods',compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.goodsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*        $goods = new Goods();
        $goods->type_id = request('type_id');
        $goods->name = request('name');
        $goods->descr = request('descr');
        $goods->production = request('production');
        $goods->image = request('image');
        $goods->status = request('status');
        $goods->store = request('store');
        dump($goods);
        $goods->save();$post = $request->all();dd($post);*/
        //添加商品主表
        $post = $request->only(['type_id','name','descr','production','image','status','store']);
        $goods = Goods::create($post);

        //添加商品详情表(商品的图文介绍)
        $post = $request->only(['descr']);
        $post['id']=$goods->id;
        Descr::create($post);

        //添加商品属性价格表
        $post = $request->only(['color','memory','price','store','image']);
        $post['goods_id']=$goods->id;
//        return redirect()->action('GoodsPriceController@store',compact('post'));
        Price::create($post);
        return view('admin.goods.goodsCreate');
        dump($goods);
        dd($post);
        $post = $request->except('_token');
        dd($post);
 /*       if(Goods::create($post)){
            return redirect('admin/goods/create')->with(['success'=>'添加成功！！！！！']);
        } else {
            return back()->withInput();
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $goods = Goods::where('id',$id)->get();
        $descr = Descr::where('id',$id)->get();
        $goods = $goods[0];
        //商品的主要信息完
        $attr = Attribute::where('type_id',$goods->type_id)->groupBy('attr_name')->get();
        //有几个商品属性
        $array = [];
        foreach ($attr as $v) {
            $array[$v->attr_name] = Price::distinct()->pluck($v->attr_name);
        }
//        dump($array);
//        $price = Price::where('goods_id',$id)->groupBy('color')->get();
//        $price = Price::where('goods_id',$id)->groupBy('memory')->get();

//        dump($attr);
//////        dump($price);
//        dump($goods);
//        dd($descr);
        return view('admin.goods.goodsShow',compact('goods','descr','array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Goods::destroy($id))
        {
            return $id;
        } else {
            return 0;
        }
    }


}
