<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $info = User::orderby('id','desc')->where(
            function ($query) use ($request){
                $info = $request->input('keyword');

                if(!empty($info)){
                    $query->where('user_name','like','%'.$info.'%');
                }
            }
        )->paginate(5);
        //dd($user);
        return view('admin/userInfo', compact('info','request'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //修改会员状态

        $res = User::find($id);
        //dd($res);
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
        return $data;


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //删除操作
        $res = User::where('id', $id)->delete();
        //dd($res);
        if($res){
            $data = [
                'status'=>1,
                'msg'=>'分类删除成功！',
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'分类删除失败！',
            ];
        }
        return $data;
    }
}
