<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;

class GoodsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categories::orderby('id','asc')->paginate(6);
        return view('admin.goods.goodstype',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Categories::get();
        return view('admin.goods.typeCreate',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');
//        dd($post);
        $success = "true";
        if(Categories::create($post)){
//            return redirect()->action('GoodsTypeController@create',compact('success'));
            return back();
        } else {
            return back()->withInput();
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
    public function edit(Request $request, $id)
    {
        if (Categories::where('id','=',$id)->update(['name'=>$request->name]))
        {
            return "true";
        } else {
            return 'false';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Categories $categories)
    {
        $categories->name=request('name');
        dd($categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Categories::destroy($id))
        {
            return true;
        }
    }

    public function data()
    {
        $data = Categories::where('pid','=','0')->get();
        return $data;
    }

    public function data2()
    {
        $pid =request('pid');
        $post = Categories::where('pid',$pid)->get();
        return $post;
    }

}
