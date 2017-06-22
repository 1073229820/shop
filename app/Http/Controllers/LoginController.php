<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Session;
class LoginController extends Controller
{
    //前台主页
    public function index()
    {
        return view('home/index');
    }

    //前台登录验证
    public function login()
    {

        if($input = Input::all()){
            //dd($input['email']);
            //$user = User::first();
            //dd($user->pass);

            $user = User::where('email', $input['email'])->first();
            //dd($user);
            if($user!=null){
                if($user->pass == $input['pass']){
                    session(['user'=>$user]);
                    //dd(session('user')->user_name);
                    return redirect('index');
                    //return 'good';
                }else{
                    return back()->with('errors','密码错误');
                }
            }else{
                return back()->with('errors','账号错误');
            }
        }else{
            return view('home/login');
        }
    }

    //前台注册页
    public function reg(){
        return view('home/reg');
    }

    //前台注册操作
    public function register()
    {
        $input = Input::except('_token');
        dd($input);
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
        if($validator->passes()){
            $re = User::create($input);
            //dd($re);
            if($re){
                return redirect('ulogin');
            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

}
