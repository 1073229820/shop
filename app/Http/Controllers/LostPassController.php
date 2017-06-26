<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LostPassController extends Controller
{
    //找回密码
    public function show()
    {
        return view('home/lostpass');
    }

    public function getpass()
    {
        //验证
        $rules =[
            'email'=>'required | email',
        ];

        $message=[
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不对',
        ];


        $input = Input::except('_token');
        $validator = Validator::make($input, $rules, $message);
        if($validator->passes()){
            $user =User::where('email', $input['email'])->first();
            //dd($user);

            if ($user!=null){
               return view('home/setpass', compact('user'));
            }else{
                return back()->with('errors','没有该用户，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    //密码重新设置
    public function setpass()
    {
        $input = Input::except('_token');
        //dd($input);
        //验证
        $rules =[
            'pass'=>'required',
        ];

        $message=[
            'pass.required'=>'密码不能为空',
        ];

        $input = Input::except('_token');
        $user = User::find($input['id']);
        //dd($info);
        $validator = Validator::make($input, $rules, $message);
        if($validator->passes()){
            $user->pass = $input['pass'];
            $res = $user->update();
            if($res){
                return redirect('ulogin');
            }else{
                return back()->with('errors','找回密码错误');
            }

        }else{
            return back()->withErrors($validator);
        }




    }


}
