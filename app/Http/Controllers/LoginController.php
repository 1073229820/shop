<?php

namespace App\Http\Controllers;

use App\Goods;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;
use App\Admin;
use Illuminate\Support\Facades\Hash;

require_once '/code/Code.class.php';

class LoginController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('admin');
    }*/

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

                //验证用户状态
                if($user->status != '0'){
                    if($user->pass == $input['pass']){
                        session(['user'=>$user]);
                        //dd(session('user'));
                        return redirect('index');
                        //return 'good';
                    }else{
                        return back()->with('errors','密码错误');
                    }
                }else{
                    return back()->with('errors','账号被禁用，请联系管理员');
                }


            }else{
                return back()->with('errors','账号错误');
            }
        }else{
            //session(['user'=>null]);
            return view('home/login');
        }


    }

    //前台注册页
    public function reg()
    {
        return view('home/reg');
    }

    //前台注册操作
    public function register()
    {
        $input = Input::except('_token');
        $input['addtime'] = time();
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

    public function ajax()
    {
        $goodsList = Goods::where('cat_id', 4)->take(5)->get();
        return view('home/ajax', compact('goodsList'));
    }

    public function ajaxGet(Request $request)
    {
        $input = $request->except('_token');

        $goodsList = Goods::where('cat_id', $input['catId'])->take(5)->get();
        return JSON_ENCODE($goodsList);
    }


    /**
     * 后台管理员登录界面
     */
    public function adminLogin()
    {
        return view('admin/admins/login');
    }

    /**
     * 认证码
     */
    public function code()
    {
        $code = new \Code();
        $code->make();
    }

    /**
     * 处理后台管理员登录
     */
    public function signin(Requests\AdminLoginRequest $request)
    {
        $name = $request->name;
        $pass = $request->pass;
        $code = $request->code;

        //核对验证码
        $Code = new \Code();
        if ($Code->check($code)) {

            //验证管理员账号
            $user = Admin::where('name', $name)->first();
            if ($user) {
                //判断密码
                if (Hash::check($pass, $user->pass)) {

                    //判断用户状态
                    if ($user->status == 1) {

                        //存入session
                        session(['adminname' => $user]);
                        return redirect('admin/')->with(['success' => '登录成功']);
                    } else {
                        return redirect('admin/login')->withInput()->with(['fail' => '该管理员已被禁用']);
                    }
                } else {
                    return redirect('admin/login')->withInput()->with(['fail' => '账号和密码不匹配']);
                }
            } else {
                return redirect('admin/login')->withInput()->with(['fail' => '账号不存在']);
            }
        } else {
            return redirect('admin/login')->withInput()->with(['fail' => '认证码不正确']);

        }
        /*   if ($user) {
               session(['adminname' => $user]);
               return redirect('admin/')->with(['success'=>'登录成功']);
           } else {
               return redirect('admin/login')->withInput()->with(['fail'=>'账号和密码不匹配或被禁用']);
           }*/

    }

    /**
     *  处理管理员注销
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        //清除session值
        $request->session()->forget('adminname');
        return redirect('admin/login');
    }

}
