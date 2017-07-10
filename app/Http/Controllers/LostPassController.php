<?php

namespace App\Http\Controllers;

use App\M3Email;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Tool\uuid;
use Illuminate\Support\Facades\Hash;
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

        //dd($_SERVER['HTTP_HOST']);
        $input = Input::except('_token');
        $validator = Validator::make($input, $rules, $message);
        if($validator->passes()){
            $user =User::where('email', $input['email'])->first();
            //dd($user);
            $time  = time()+60*60*24;
            $email = $user->email;
            $uuid =uuid::create();
            $e3email = new M3Email();
            $e3email->to = $email;
            $e3email->cc = 'm13412559929@163.com';
            $e3email->subject = '密码找回验证';
            $e3email->content = '请于24小时点击该链接完成验证. http://'.$_SERVER['HTTP_HOST'] .'/passsetshow'
                . '?user_id=' . $user->id
                . '&code=' . $uuid.'&time='.$time;

            if ($user!=null){

                $flag = Mail::send('email_register', ['e3email' => $e3email], function ($m) use ($e3email) {
                    $m->to($e3email->to, '尊敬的用户')
                        ->cc($e3email->cc)
                        ->subject($e3email->subject);
                });

                if($flag){

                    DB::table('users')->update(['email_code' => $uuid]);
                    return view('home.passinfo');
                }else{
                    return back()->with('errors','邮件发送失败！');
                }


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
            if(time() >$input['time'] ){
                return back()->with('errors', '超过链接有效期');
            }else{
                $rules = [
                    'pass' => 'required',
                ];

                $message = [
                    'pass.required' => '密码不能为空',
                ];

                $input = Input::except('_token');
                //dd($input);
                $user = User::find($input['id']);
                //dd($user);
                $validator = Validator::make($input, $rules, $message);
                if ($validator->passes()) {
                    $user->pass = Hash::make($input['pass']);
                    // dd($user->pass);
                    $res = $user->update();
                    if ($res) {
                        return redirect('ulogin');
                    } else {
                        return back()->with('errors', '找回密码错误');
                    }

                } else {
                    return back()->withErrors($validator);
                }

            }


    }

    public function setpassshow()
    {
        return view('home/setpass');
       //return 111111;
    }




}
