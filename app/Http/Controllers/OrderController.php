<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Session;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    //个人中心

    public function order()
    {

        $info = session('user')->email;
        //dd($info);
        $user = User::where('email', $info)->first();
        //dd($user);
        return view('home/order', compact('user'));

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
            $res = User::where('id', $id)->update($input);
            if ($res) {
                session(['user' => null]);
                return redirect('ulogin');
            } else {
                return back()->with('errors', '修改分类失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

}
