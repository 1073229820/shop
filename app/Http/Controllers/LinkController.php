<?php

namespace App\Http\Controllers;

use App\Link;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(session('adminname')->ability(array('admin'), array('link_create','link_edit','link_delete'))){
            $info = Link::orderBy('sort_num','asc')->get();
            return view('admin/LinkInfo', compact('info'));
        }


    }

    //AJAX路由方法用于异步修改排序
    public function changesortnum()
    {

        $input = Input::all();
        //var_dump($input['cate_id']);
        //var_dump($input['cate_order']);
        //dd($input);
        $link = Link::find($input['id']);
        //dd($link);
        $link->sort_num = $input['sortnum'];
        $res = $link->update();
        //echo $res;
        if($res){
            $data = [
                'status'=>1,
                'msg'=>'友情链接排序更新成功！',
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'友情链接排序更新失败！，稍后重试',
            ];
        }
        return $data;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(session('adminname')->ability('admin', 'link_create')) {
            return view('admin/Linkadd');

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //友情链接添加
        if(session('adminname')->ability('admin', 'link_create')) {

            $input = Input::except('_token');
            //dd($input);
            $rules = [
                'name' => 'required|alpha_num',
                'url' => 'required|url',
                'sort_num' => 'required|integer|max:1000'
            ];
            $message = [
                'name.required' => '链接名称不能为空',
                'name.alpha_num' => '链接名称只能数字字母',
                'url.required' => '链接不能为空',
                'sort_num.required' => '排序号不能为空',
                'sort_num.integer' => '排序号必须整数',
                'sort_num.max' => '排序号不能超过1000',
                'url.url' => '链接不符合格式哦',
            ];

            $validator = Validator::make($input, $rules, $message);
            if ($validator->passes()) {
                //dd($input);
                $re = Link::create($input);
                if ($re) {
                    return redirect('admin/link');
                } else {
                    return back()->with('errors', '数据填充失败，请稍后重试！');
                }
            } else {
                return back()->withErrors($validator);
            }
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //修改链接状态
        if(session('adminname')->ability('admin', 'link_edit')){
            $res = Link::find($id);
            if($res->status == '0'){
                $res->status = '1';
            }else{
                $res->status = '0';
            }
            $res->save();
            if($res){
                $data = [
                    'status'=>1,
                    'msg'=>'状态修改成功！',
                ];
            }else{
                $data = [
                    'status'=>0,
                    'msg'=>'状态修改失败！',
                ];
            }
        }else{
            $data = [
                'status'=>0,
                'msg'=>'你没有权限请联系管理员！',
            ];
        }

        return $data;


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //
        //删除操作

        if(session('adminname')->ability('admin', 'link_delete')) {

            $res = Link::where('id', $id)->delete();
            //dd($res);
            if ($res) {
                $data = [
                    'status' => 1,
                    'msg' => '分类删除成功！',
                ];
            } else {
                $data = [
                    'status' => 0,
                    'msg' => '分类删除失败！',
                ];
            }
        }else{
            $data = [
                'status'=>0,
                'msg'=>'你没有权限请联系管理员！',
            ];
        }

        return $data;


    }
}
