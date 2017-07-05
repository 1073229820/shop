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
        //添加商品主表
        $post = $request->only(['type_id','name','production','descr','image','status','store']);
        //商品的销售量，点击量，热卖，推荐初始为0
        $post['num'] = 0;$post['clicknum'] = 0;$post['hot'] = 0;$post['recommend'] = 0;
//        dd($post);
        $goods = Goods::create($post);

        //添加商品详情表(商品的图文介绍)
        $post = $request->only(['descrs']);
        $post['id']=$goods->id;
        Descr::create($post);

        //添加商品属性价格表
        $post = $request->only(['attr1','attr2','price','store','image']);
        $post['goods_id']=$goods->id;
//        return redirect()->action('GoodsPriceController@store',compact('post'));
        Price::create($post);
        return view('admin.goods.goodsCreate');
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
//        $goods = Goods::where('id',$id)->get();
//        $goods = Goods::join('categories c','goods.type_id','=','c.id')->select('goods.*','c.name type')->where('id',$id)->first();
        $goods = DB::select('select g.*,c.name type from goods g,categories c where g.id= ? and type_id =c.id;',[$id]);
        $descr = Descr::where('id',$id)->get();
        $goods = $goods[0];
        //商品的主要信息完
        $type_id = Categories::where('id',$goods->type_id)->pluck('pid')->first();  //获取商品的父类，决定属性的二级类
        $attr = Attribute::where('type_id',$type_id)->pluck('attr_name','attr_price');
        $price = Price::where('goods_id',$id)->first();
//        dump($type_id);
//        dump($attr);
//        dd($descr);
//        dump($goods);
//        dump($price);
        return view('admin.goods.goodsShow',compact('goods','descr','price','attr'));
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
