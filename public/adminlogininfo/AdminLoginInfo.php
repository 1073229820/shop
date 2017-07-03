<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/7/3
 * Time: 17:03
 */
class AdminLoginInfo
{
    public function recordPassWrongTime($name)
    {
        //ip2long()函数可以将IP地址转换成数字
        $ip = ip2long( $_SERVER['ROMOTE_ADDR']);

        $time = date('Y-m-d H:i:s');


    }
}