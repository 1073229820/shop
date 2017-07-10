@extends('admin.layouts.app')
@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="/">主页</a>
            </li>

            <li>
                <a href="#">表格</a>
            </li>
            <li class="active">XXX表格</li>
        </ul><!-- .breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
					<i class="icon-search nav-search-icon"></i>
				</span>
            </form>
        </div><!-- #nav-search -->
    </div>
    <div class="page-content">
        <div class="page-header">
        	<a href="/admin/goods/create" style="float: right;">添加商品</a>
            <h1>
                Tables
                <small>
                    <i class="icon-double-angle-right"></i>
                    <a href="/admin/goods/create">新增商品</a>
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">

                                        </th>
                                        <th>id</th>
                                        <th>商品名称</th>
                                        <th class="hidden-480">类型</th>
                                        <th>图片</th>
                                        <th>热卖</th>
                                        <th>推荐</th>
                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            点击量
                                        </th>
                                        <th class="hidden-480">库存</th>
                                        <th>销售量</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($goods as $v)
                                    <tr class='{{$v->id}}'>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">{{$v['id']}}</a>
                                        </td>
                                        <td><a href="/admin/goods/{{$v['id']}}">{{$v['name']}}</a></td>
                                        <td class="hidden-480">{{$v['type']}}</td>
                                        <td><img src="{{asset($v['image'])}}" width='50' height='50
                                        '></td>    
                                        <td>
                                            <label>
                                                <input name="hot" data-id={{$v['id']}} class="update ace ace-switch ace-switch-6" type="checkbox" @if($v['hot']==1) checked data="1"  @endif  />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>                                   
                                        <td>
                                            <label>
                                                <input name="recommend"  data-id={{$v['id']}} class="update ace ace-switch ace-switch-7" type="checkbox" @if($v['recommend']==1) data="1" checked  @endif />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>                                   
                                        <td>{{$v['clicknum']}}</td>
                                        <td>{{$v['store']}}</td>                                            
                                        <td class="hidden-480">
                                            <span class="label label-sm label-warning">{{$v['num']}}</span>
                                        </td>
                                        <td>
                                            <select name="status" data-id={{$v['id']}}>
                                                <option value="1" @if($v->status == 1) selected @endif>新添加</option>
                                                <option value="2" @if($v->status == 2) selected @endif>在售</option>
                                                <option value="3" @if($v->status == 3) selected @endif>下架</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                                <a class="blue" href="{{asset('/admin/goods/'.$v['id'].'/edit')}}">
                                                    <i class="icon-edit bigger-130"></i>
                                                </a>

                                                <a class="del red" href="#" data='{{$v->id}}'>
                                                    <i class="icon-trash bigger-130"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- 分页 -->
                            <div class="row">
                                 <div class="col-sm-6">
                                     <div class="dataTables_info" id="sample-table-2_info">共 {{$goods->total()}} 条数据</div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="dataTables_paginate paging_bootstrap">
                                         {{$goods->links()}}
                                     </div>
                                 </div>	
                            </div>
                            <!-- 分页结束 -->
                            <script type="text/javascript" src="{{asset('/assets/admin/js/jquery-1.10.2.min.js')}}"></script>
							<script type="text/javascript">
								//点击删除操作
								$('a.del').click( function () {
									var id = $(this).attr('data');
                                    $.post(
                                        "/admin/goods/"+id,
                                        {'_method':'delete','_token':'{{csrf_token()}}'},
                                        function (data) {
                                            if( data>0) {
                                                $('tr.'+id).empty();
                                            } else {
                                            	console.log('失败');
                                            }
                                    }) 
								})

                                $('input.update').click( function () {
                                    var id = $(this).attr('data-id');
                                    var name = $(this).attr('name');
                                    // console.log($(this).attr('data'));
                                    if($(this).attr('data')>0){
                                        var val = $(this).attr('data',0).attr('data');
                                    } else {
                                        var val = $(this).attr('data',1).attr('data');
                                    }
                                    console.log(val);
                                    $.post(
                                        "/admin/goods/"+id,
                                        {'_method':'put','_token':'{{csrf_token()}}','hot':val,'recommend':val,'update':name},
                                        function (data) {
                                            /*if( data > 0 ) {
                                                alert('修改成功！');
                                            } else {
                                                alert('修改失败，请刷新页面重新修改！')
                                            }*/
                                        })
                                })

                                $('select').change( function () {
                                    var id = $(this).attr('data-id');
                                    var status = $(this).val();
                                    console.log(status+'a'+id);
                                    $.post(
                                        "/admin/goods/"+id,
                                        {'_method':'put','_token':'{{csrf_token()}}','status':status,'update':'status'},
                                        function (data) {
                                            /*if( data > 0 ){
                                                alert('修改成功！');
                                            } else {
                                                alert('修改失败，请刷新页面重新修改！')
                                            }*/
                                        }) 
                                })


							</script>


	                    </div>
                    </div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    @endsection
