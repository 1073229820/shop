<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Categories;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //商品属性信息列表主页
        $post = Attribute::all();
        $type = Categories::pluck('name','id');
//        dd($type);
        return view('admin/goods/attribute',compact('post','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //把商品类型的信息返回给主页
        $data = Categories::groupBy('pid','id')->orderBy('pid')->get();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //添加商品属性信息
        $post = $request->except('_token');
        if(Attribute::create($post)){
            return  redirect('/attribute');
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
        //
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
        if (Attribute::destroy($id))
        {
            return $id;
        }
    }

    public function data()
    {
        $type_id = request('type_id');
//        $data = Attribute::distinct()->where('type_name',$type_name)->pluck('attr_name');
        $data = DB::select('select * from attributes where type_id=? ;',[$type_id]);
//        $data->attr = ['memory','color'];
        return $data;
    }
}
