<?php

namespace App\Http\Controllers;

use App\Goods;
use App\User;
use App\Userinfo;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;
use App\Admin;



require_once './code/Code.class.php';
require_once 'adminlogininfo/LoginInfo.class.php';

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

    //前台退出
    public function logout()
    {
        session(['user' => null]);
        return view('home/login');
    }

    //前台登录验证
    public function login(Request $request)
    {
     /*   dd(Input::all());
        $request = new Request();
        $post=$request->all();
        dd($post);*/

        if($input = Input::all()){

            //dd($input);
            //dd($input['email']);
            //$user = User::first();
            //dd($user->pass);
            $code = $input['code'];
            $Code = new \Code();
            if ($Code->check($code)) {
                $user = User::where('email', $input['email'])->first();
                //dd($user);
                if($user!=null){

                    //验证用户状态
                    $user_id = $user->id;
                    $ip = $request->getClientIp();
                    $logintime = time();

                    if($user->status != '0'){
                        //验证登录错误次数
                        $error = DB::table('userinfos')->select('pass_wrong_time_status', 'logintime')->where('user_id' , $user_id)->whereBetween('logintime', [$logintime-300, $logintime])->orderBy('id','desc')->get();
                        //dd($error);
                        if(count($error)>=3){
                            $errors = DB::table('userinfos')->select('pass_wrong_time_status')->where('user_id', $user_id)->orderby('id','desc')->take(3)->get();
                            //dd($errors);
                            $json= json_encode($errors);
                            $dejson = json_decode($json, true);
                            $a = array_column($dejson, 'pass_wrong_time_status');
                            //dd($a);
                            //$b = array_search('0', $a);

                            $b = in_array('0', $a);

                            //dd($b);
                            if($b){
                                if(Hash::check($input['pass'], $user->pass)){
                                    session(['user'=>$user]);
                                    //dd(session('user'));
                                    Userinfo::create(['ipaddr'=>$ip, 'user_id'=>$user_id, 'pass_wrong_time_status'=>'0', 'logintime'=>$logintime]);
                                    return redirect('index');
                                    //return 'good';
                                }else{

                                    Userinfo::create(['ipaddr'=>$ip, 'user_id'=>$user_id, 'pass_wrong_time_status'=>'1', 'logintime'=>$logintime]);
                                    return back()->with('errors','密码错误');
                                }

                            }else{
                                $errorss = DB::table('userinfos')->where('user_id', $user_id)->orderBy('id', 'desc')->take(1)->value('logintime');
                                //dd($errorss);
                                $time = $errorss;

                                $nowtime = time();
                                //dd($nowtime-$time);
                                if($nowtime-$time>=300){

                                    if(Hash::check($input['pass'], $user->pass)){
                                        session(['user'=>$user]);
                                        //dd(session('user'));
                                        Userinfo::create(['ipaddr'=>$ip, 'user_id'=>$user_id, 'pass_wrong_time_status'=>'0', 'logintime'=>$logintime]);
                                        return redirect('index');
                                        //return 'good';
                                    }else{

                                        Userinfo::create(['ipaddr'=>$ip, 'user_id'=>$user_id, 'pass_wrong_time_status'=>'1', 'logintime'=>$logintime]);
                                        return back()->with('errors','密码错误');
                                    }
                                }else{
                                    return back()->with('errors','账号错误3次。。5分钟后再试');
                                }


                            }

                        }else{
                            if(Hash::check($input['pass'], $user->pass)){
                                session(['user'=>$user]);
                                //dd(session('user'));
                                Userinfo::create(['ipaddr'=>$ip, 'user_id'=>$user_id, 'pass_wrong_time_status'=>'0', 'logintime'=>$logintime]);
                                return redirect('index');
                                //return 'good';
                            }else{

                                Userinfo::create(['ipaddr'=>$ip, 'user_id'=>$user_id, 'pass_wrong_time_status'=>'1', 'logintime'=>$logintime]);
                                return back()->with('errors','密码错误');
                            }
                        }




                    }else{
                        return back()->with('errors','账号被禁用，请联系管理员');
                    }


                }else{
                    return back()->with('errors','账号错误');
                }
            }else{
                return back()->with('errors','验证码错误');
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
        $input['pass'] = Hash::make($input['pass']);


        // dd($input);


        $emailinfo = $this->checkemail();



        $rules =[
            'user_name'=>'required|alpha_dash|max:20',
            'name'=>'required|chinese|max:10',
            'pass'=>'required',
            'email'=>'required | email',
            'phone'=>'required | regex:/^1[34578][0-9]{9}$/',
        ];
        $message=[

            'user_name.alpha_dash'=>'用户名数字字母下划线',
            'user_name.max'=>'用户名字段不能大于10位',
            'user_name.required'=>'用户名不能为空',
            'name.required'=>'真实姓名不能为空',
            'name.digits_between'=>'真实姓名2-10个',
            'name.chinese'=>'真实姓名为汉字',
            'pass.required'=>'密码不能为空',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不对',
            'phone.required'=>'电话不能为空',
            'phone.regex'=>'电话号码格式不对'

        ];

        $validator = Validator::make($input, $rules, $message);
        if ($emailinfo['status'] != 1) {
            if ($validator->passes()) {
                $re = User::create($input);
                //dd($re);
                if ($re) {
                    return redirect('ulogin');
                } else {
                    return back()->with('errors', '数据填充失败，请稍后重试！');
                }
            } else {
                return back()->withErrors($validator);
            }

        } else {
            return back()->with('errors', '该邮箱已经被注册！');
        }

    }


    public function checkemail()
    {
        $input = Input::except('_token');
        $emailifno = User::where('email', $input['email'])->first();
        if ($emailifno) {
            $data = ['status' => 1];
        } else {
            $data = ['status' => 0];
        }
        return $data;
    }


    //前台首页遍历测试
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
     * 生成认证码
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

                //检查用户最近30分钟密码错误次数
               $check = new \LoginInfo();
                $res = $check->checkPassWrongTime($user->id);

                //次数达到3次，返回false 锁住账号
                if ($res === false) {

                    return redirect('admin/login')->withInput()->with(['fail' => '密码错误频繁，账号被锁定，请稍后再试!']);
                }

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
                    //账号和密码不匹配时，记录一次到admin_login_infos表中
                    $check->recordPassWrongTime($user->id);

                    return redirect('admin/login')->withInput()->with(['fail' => '账号和密码不匹配']);
                }
            } else {
                return redirect('admin/login')->withInput()->with(['fail' => '账号不存在']);
            }
        } else {
            return redirect('admin/login')->withInput()->with(['fail' => '认证码不正确']);

        }

    }

    /**
     *  处理管理员注销
     */
    public function signout(Request $request)
    {
        //清除session值
        $request->session()->forget('adminname');
        return redirect('admin/login');
    }

}
