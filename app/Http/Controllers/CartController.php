<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;


class CartController extends Controller
{
    /**
     * 存储购物信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $userId = session('user_id');
//        $goodsId = $input['goods_id'];
//        $buyNum = $input['buynum'];

        if ($userId) {
            //用户已登录存入redis数据库
        }else {
            //用户未登录存入session

            $cartList[] = Goods::find(2);
            session()->put('cartList', $cartList);
            session()->put('addtime', time());
            return redirect('cart');


        }

    }

    /**
     * 购物车列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart)
    {

       $cartList = $cart->getCartList();
       return view('home/cart', compact('cartList'));

    }
}
