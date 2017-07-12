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

    public function index()
    {   //商品列表
        $goods = Goods::join('categories as c','goods.type_id','=','c.id')
            ->join('prices as p','goods.id','=','p.goods_id')
            ->select('goods.*','c.name as type','p.store')
            ->orderby('goods.id','asc')
            ->paginate(10);
        return view('admin.goods.goods',compact('goods'));
    }

    public function create()
    {
        return view('admin.goods.goodsCreate');
    }

    public function store(Request $request)
    {
//        $post = $request->all();dd($post);
        //表单验证
        $this->validate($request, [
            'name' => 'required',
            'type_id' => 'required',
            'price' => 'required',
            'store' => 'required',

        ],[
            'required' => ':attribute 不可以少',
        ],[
            'name' => '类别名',
            'type_id' => '种类',
            'price' => '价格',
            'store' => '库存量',

        ]);
//        添加商品主表
        $post = $request->only(['type_id','name','production','descr','status','store']);
//        商品的销售量，点击量，热卖，推荐初始为0
        $post['num'] = 0;$post['clicknum'] = 0;$post['hot'] = 0;$post['recommend'] = 0;
//       $post = $request->all();dd($post);
        $goods = Goods::create($post);

        //添加商品详情表(商品的图文介绍)
        $post = $request->only(['descrs']);
        $post['id']=$goods->id;
        Descr::create($post);

        //添加商品属性价格表
        $post = $request->only(['attr1','attr2','price','store','image']);
        $post['goods_id']=$goods->id;
        Price::create($post);

        return view('admin.goods.goodsCreate');
 /*       if(Goods::create($post)){
            return redirect('admin/goods/create')->with(['success'=>'添加成功！！！！！']);
        } else {
            return back()->withInput();
        }*/
    }

    public function show($id)
    {
        $goods = Goods::join('categories as c','c.id','=','goods.type_id')
            ->select('goods.*','c.name as type')
            ->where('goods.id',$id)
            ->first();
        $descr = Descr::where('id',$id)->get();
        $price = Price::where('goods_id',$id)->first();
        //商品的主要信息完
        $type_id = Categories::where('id',$goods->type_id)->pluck('pid')->first();  //获取商品的父类，决定属性的二级类
        $attr = Attribute::where('type_id',$type_id)->pluck('attr_name','attr_price');
        return view('admin.goods.goodsShow',compact('goods','descr','price','attr'));
    }

    public function edit($id)
    {
        //商品的信息
        $goods = Goods::join('prices as p','p.goods_id','=','goods.id')
            ->join('descrs as d','d.id','=','goods.id')
            ->select('goods.*','p.*','d.*')
            ->where('goods.id',$id)
            ->first();
        //商品类别改变的只能改当前父类下的所有子类，因为其他类别的规格都不同，要改的话还不如删掉这个商品
        $pid = Categories::where('id',$goods['type_id'])->value('pid');
        $type = Categories::where('pid',$pid)->pluck('id','name');
        //商品属性
        $attr = Attribute::where('type_id',$pid)->get();
//        dump($goods);dd($type);
        return view('admin.goods.goodsUpdate',compact('goods','type','attr'));
    }

    public function update(Request $request,$id)
    {
//        $post = $request->all();return $post;dd($post);
        if(request('update') == 'status'){              //修改商品状态
            $post = $request->only('status');
            if(Goods::where('id',$id)->update($post)) {
                return "1";
            };
        } elseif (request('update') == 'hot'){          //修改是否热卖
            $post = $request->only('hot');
            if(Goods::where('id',$id)->update($post)) {
                return "1";
            };
        } elseif (request('update') == 'recommend') {  //修改是否推荐
            $post = $request->only('recommend');
            if(Goods::where('id',$id)->update($post)) {
                return "1";
            };
        } else {                                          //修改商品信息
            $post = $request->only(['type_id','name','production','descr','image','status','num','clicknum']);
            Goods::where('id',$id)->update($post);
            $post = $request->only(['descrs']);
            Descr::where('id',$id)->update($post);
            $post = $request->only(['attr1','attr2','price','store','image']);
            Price::where('id',$id)->update($post);
        }


    }

    public function destroy($id)
    {
        if (Goods::destroy($id))                    //删除商品
        {
            return $id;
        } else {
            return 0;
        }
    }


}
