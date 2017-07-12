<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Order;
use App\OrdersDetail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    //个人中心

    public function order()
    {
        $type = Categories::get();
        $newgoods = DB::table('goods as g')
            ->join('prices as p','g.id','=','p.goods_id')
            ->select('g.id','g.name','p.price','p.image')
            ->where('status',1)
            ->orderBy('created_at','desc')
            ->limit(10)
            ->get();
        $info = session('user')->email;
        //dd($info);
        $user = User::where('email', $info)->first();
        //dd($user);
        return view('home/order', compact('user','type','newgoods'));

    }

    //个人中心修改操作
    public function newinfo()
    {


        $input = Input::except('_token');
        //dd($input);

        $rules =[
            'user_name'=>'required',
            'name'=>'required',
            'pass'=>'required',
            'email'=>'required | email',
            'phone'=>'required | regex:/^1[34578][0-9]{9}$/',
        ];
        $message=[
            'user_name.required'=>'用户名不能为空',
            'name.required'=>'真实姓名不能为空',
            'pass.required'=>'密码不能为空',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不对',
            'phone.required'=>'电话不能为空',
            'phone.regex'=>'电话号码格式不对'
        ];

        $validator = Validator::make($input, $rules, $message);

        if($validator->passes()) {
            $id = $input['id'];
            $res = User::where('id', $id)->first();
          $res->user_name = $input['user_name'];
            $res->name = $input['name'];
            $res->phone = $input['phone'];
            $res->sex = $input['sex'];
            $res->email = $input['email'];
            //dd(Hash::check('$2y$10$9su0RnLTOy21rz5X2ZiUpeW29H3j5Jnx59TfFLMWQb8B2O8ogFpp2'));
            if ($input['pass'] != $res->pass){
                $res->pass =Hash::make($input['pass']);
            }
            //dd($res);
            $res->save();
//            dd($res);
            if ($res) {
                session(['user' => null]);
                return redirect('ulogin');
            } else {
                return back()->with('errors', '失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }



    //下单
    public function store(Request $request)
    {

        $input = $request->except('_token');

        $rules = [
            'uid' => 'required',
            'cnee_name' => 'required|between:1,30',
            'cnee_tel' => 'required|digits:11',
            'cnee_address' => 'required',
            'code' => 'required',
        ];

        $message = [
            'required' => ':attribute不能为空',
            'cnee_tel.digits' => '收货人电话必须是11位!',
            'uid.required' => '请先登录！',
        ];

        $attribute = [
            'cnee_name' => '收货人姓名',
            'cnee_tel' => '收货人电话',
            'cnee_address' => '收货人地址',
            'code' => '邮编',
        ];

        $validator = Validator::make($input, $rules, $message, $attribute);

        if($validator->fails()) {

            return back()->withErrors($validator)->withInput();
        }

        $cartList = session('cartList');


//        dd($cartList);


        $order = [];
        $order['user_id'] = session('user')->id;
        $order['cnee_name'] = $request->get('cnee_name');
        $order['cnee_tel'] = $request->get('cnee_tel');
        $order['cnee_address'] = $request->get('cnee_address');
        $order['code'] = $request->get('code');
        $order['order_number'] = session('user')->id.time().rand(0,9999);
        $order['ordertime'] = time();
        $order['total_price'] = $request->get('total_price');
        $order['status'] = 0;

        //开启事务
        DB::beginTransaction();

        //插入订单表
        $insertId = DB::table('orders')->insertGetId($order);

        if(!$insertId){

            DB::rollBack();
        }

        foreach ($cartList as $cart) {
//            DB::listen(function ($sql) {
//                dump($sql);
//            });

            //插入商品订单表
            $res = DB::table('goods_orders')
                ->insert([
                    'order_id' => $insertId,
                    'goods_id' => $cart['id'],

                ]);

            if(!$res){
                DB::rollBack();
            }

            // 减少商品表中库存
            $res = DB::table('goods')
                ->where('id', '=', $cart['id'])
                ->decrement('store', $cart['buynum']);

            if(!$res){
                DB::rollBack();
            }

            //插入订单详情表
            $res = DB::table('orders_detail')
                ->insert([
                    'order_id' => $insertId,
                    'goods_id' => $cart['id'],
                    'price' => $cart['price'],
                    'buynum' => $cart['buynum'],

                ]);

            if(!$res){
                DB::rollBack();
            }

        }

        //提交事务
        DB::commit();

        //清空购物车中已买的商品
        session()->forget('cartList');

        return redirect('history/orders');

    }

    public function index()
    {
        //查询订单表,前台遍历
        $userId = session('user')->id;
        $ordersId = Order::where('user_id', '=', $userId)->lists('id');

        $orderList = [];

        foreach ($ordersId as $oid) {
            $orderList[] = OrdersDetail::where('order_id', '=', $oid)
                ->leftJoin('orders', 'orders_detail.order_id', '=', 'orders.id')
                ->leftJoin('goods', 'orders_detail.goods_id', '=', 'goods.id')
                ->get();

        }

        return view('home/order/index', compact('orderList'));
    }

    public function adminIndex()
    {
        $orders = Order::leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.user_name')
            ->paginate(6);
        return view('admin.order', compact('orders'));
    }

    public function edit($id)
    {
        Order::where('id', '=', $id)->update(['status' => 1]);
        return back();

    }

    public function detail($id)
    {
        $orderDetail = OrdersDetail::where('order_id', '=', $id)
            ->leftJoin('orders', 'orders_detail.order_id', '=', 'orders.id')
            ->leftJoin('goods', 'orders_detail.goods_id', '=', 'goods.id')
            ->leftJoin('prices', 'orders_detail.goods_id', '=', 'prices.id')
            ->select('goods.*', 'orders.order_number', 'orders.paytime', 'orders_detail.buynum', 'prices.price')
            ->get();
        return view('admin.order-detail', compact('orderDetail'));

    }
}
