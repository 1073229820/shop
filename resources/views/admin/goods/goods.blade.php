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
        	<a href="/goods/create" style="float: right;">添加商品</a>
            <h1>
                Tables
                <small>
                    <i class="icon-double-angle-right"></i>
                    <a href="/goods/create">新增商品</a>
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
                                            <label>
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>id</th>
                                        <th>商品名称</th>
                                        <th class="hidden-480">类型</th>
                                        <th>图片</th>
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
                                        <td><a href="/goods/{{$v['id']}}">{{$v['name']}}</a></td>
                                        <td class="hidden-480">{{$v['type_id']}}</td>
                                        <td>{{$v['image']}}</td>                                       
                                        <td>{{$v['clicknum']}}</td>
                                        <td>{{$v['store']}}</td>                                            
                                        <td class="hidden-480">
                                            <span class="label label-sm label-warning">{{$v['num']}}</span>
                                        </td>
                                        <td>
	                                        @if ($v->status == 1)
	                                        <span class="label label-sm label-success">新添加</span>
	                                        @elseif ($v->status == 2)
	                                        <span class="label label-sm label-info">在售</span>
	                                        @else
	                                        <span class="label label-sm label-inverse">下架</span>
	                                        @endif
                                        </td>
                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                                <a class="blue" href="#">
                                                    <i class="icon-zoom-in bigger-130"></i>
                                                </a>

                                                <a class="green" href="#">
                                                    <i class="icon-pencil bigger-130"></i>
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
                                        "/goods/"+id,
                                        {'_method':'delete','_token':'{{csrf_token()}}'},
                                        function (data) {
                                            if( data>0) {
                                                $('tr.'+id).empty();
                                            } else {
                                            	console.log('失败');
                                            }
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
