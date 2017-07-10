<?php

use App\AdminLoginInfo;

class LoginInfo
{
    /**
     * 用户输入密码错误时，记录一次
     *
     * @param $id
     */
    public function recordPassWrongTime($id)
    {
        //ip2long()函数可以将IP地址转换成数字
        $ipaddr = ip2long($_SERVER['REMOTE_ADDR']);

        $time =date("Y-m-d H:i:s");

        AdminLoginInfo::create([

            'user_id' => $id,
            'ipaddr' => $ipaddr,
            'logintime' => $time,
            'pass_wrong_time_status' => 2
        ]);
    }

    /**
     * 检查用户最近$min分钟密码错误次数
     * $uid 用户ID
     * $min 锁定时间
     * $wTime 错误次数
     * @return 错误次数超过返回false, 其他返回错误次数，提示用户
     */
    public function checkPassWrongTime($uid, $min =30, $wTime=3)
    {
        $time = date('Y-m-d H:i:s',time());//9:00
        $pervTime = time() - $min * 60;//8:30 过去的30分钟到现在
        $pervTime =date('Y-m-d H:i:s',$pervTime);
        //用户所在登录ip
        $ipaddr = ip2long($_SERVER['REMOTE_ADDR']);

        $data = AdminLoginInfo::where('user_id', $uid)
            ->where('ipaddr', $ipaddr)
            ->where('pass_wrong_time_status', 2)
            ->whereBetween('logintime', [$pervTime, $time])
            ->get();

//        dump($data);
//        dump(time());
//        exit();

        $wrongTime = count($data);

        if ($wrongTime >= $wTime) {

            return false;
        } else {

            return $wrongTime;
        }

    }
}