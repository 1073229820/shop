<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
class UploadController extends Controller
{
    public function upload ()
    {
        $file = Input::file('Filedata');
        if ($file->isValid()) {
            $realPath = $file->getRealPath(); //获取临时路径
            $originalExtension = $file->getClientOriginalExtension(); //扩展名
            $fileName = date('YmdHis') . uniqid() . '.'.$originalExtension;//拼接文件名
            $path = $file->move(base_path().'/public/upload', $fileName);
            $filePath = 'uploads/'.$fileName;//上传后的文件路径

            return $filePath;
        }
    }

}
