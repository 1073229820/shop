<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


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
        $rules = [
            'gid' => 'required',
        ];

        $message = [
            'gid.required' => '必须选择一件商品',

        ];

        $validator = Validator::make($input, $rules, $message);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $userId = session('user_id');


        if ($userId) {
            //用户已登录存入redis数据库
        }else {

            //用户未登录存入session
            $gid = $request->get('gid');
            $cartList = session('cartList');
            if (isset($cartList[$gid])) {
                $cartList[$gid]['buynum'] += 1;
                $cartList[$gid]['addtime'] = time();
            }else {
                $cartList[$gid] = array_merge(Goods::find($gid)->toArray(), ['buynum'=>1, 'addtime'=>time()]);
            }
            session()->put('cartList', $cartList);

            return redirect('cart');
        }


    }

    public function ajaxUpdateGoods(Request $request)
    {

        //修改session中保存的购物信息
        $gid = $request->get('gid');
        $buynum = $request->get('buynum');
        $cartList = session('cartList');
        $cartList[$gid]['buynum'] = $buynum;
        session()->put('cartList', $cartList);
        return Response::json([
//            'status' => false,
//            'errors' => '修改购物车失败'
            'price' => $cartList[$gid]['price']
        ]);
    }

    public function order(Request $request)
    {
        return view('home/checkout');
    }

    /**
     * 购物车列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart)
    {

       $cartList = $cart->getCartList();
//       dd($cartList);
       return view('home/cart', compact('cartList'));

    }
}
