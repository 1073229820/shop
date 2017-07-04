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
            <a href="/attribute/create">新增属性表</a>
        </div><!-- #nav-search -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                表格
                <small>
                    <i class="icon-double-angle-right"></i>
                    动态 &amp; 静态表格
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <span class="lbl">ID</span>
                                        </label>
                                    </th>
                                    <th>属性名称</th>
                                    <th>属性可选值</th>

                                    <th>
                                        <i class="icon-time bigger-110 hidden-480"></i>
                                        商品类型名
                                    </th>
                                    <th class="hidden-480">操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($post as $v)
                                <tr class="{{$v->id}}">
                                    <td>
                                        <a href="#">{{$v->id}}</a>
                                    </td>
                                    <td>{{$v->attr_name}}</td>
                                    <td class="hidden-480">{{$v->attr_value}}</td>

                                    <td class="hidden-480">
                                        <span class="label label-sm label-warning">{{$type[$v->type_id]}}</span>
                                    </td>

                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                            <button class="update btn btn-xs btn-info">
                                                <i class="icon-edit bigger-120"></i>
                                            </button>

                                            <button class="del btn btn-xs btn-danger" name='{{$v->id}}'>
                                                <i class="icon-trash bigger-120"></i>
                                            </button>

                                            <button class=" btn btn-xs btn-warning">
                                                <i class="icon-flag bigger-120"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->

                <div class="row">
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>属性名称</th>
                            <th>属性可选值</th>
                            <th>
                                <i class="icon-time bigger-110 hidden-480"></i>
                                商品类型名
                            </th>
                            <th class="hidden-480">操作</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="create">
                        	<form action="/attribute" method="post">
                        	{{csrf_field()}}
                            <td>
                            	<input type="text" name="attr_name">
                            </td>
                            <td class="hidden-480">
                            	<input type="text" name="attr_value">
                            </td>
                            <td >
	                            <select class="col-xs-10 col-sm-5" id="form-field-select-1" name="type_name">
									
	                            </select>
                            </td>
                            <td>
                                <button class="create btn btn-xs btn-warning">
                                    <input type="submit" value='添加'>
                                </button>
                                <button class="off btn btn-xs btn-warning" style="visibility:hidden;">
                                    取消
                                </button>
                            </td>
                            </form>
                        </tr>
                        </tbody>
                    </table>

                    <script type="text/javascript" src="{{asset('/assets/admin/js/jquery-1.10.2.min.js')}}"></script>
					<script type="text/javascript">
	                    $(function($) {         //商品类别
	                        $.get("/data/goodstype",function(data){
                                var str = '';
                                for (var i = data.length - 1; i >= 0; i--) {
                                	str += `<option value="`+data[i]['name']+`" >`+data[i]['name']+`</option>`;
                                }
                                $('select').append(str);
	                        });
	                    })

	                    /*$('button.create').click( function(){  //商品属性的添加(出错，变成GET方式提交了)
	                    	var attr_name = $('input').eq(0).val();
	                    	var attr_value = $('input').eq(1).val();
	                    	var type_name = $('select').val();
	                    	// console.log(attr_name+'+'+attr_value+'+'+type_name);
                            $.post(
                                "/attribute/",
                                {'_token':'{{csrf_token()}}','attr_name':attr_name,'attr_value':attr_value,'type_name':type_name,'_method':'post'},
                                function (data) {
                                	console.log(data);
                            })
	                    })*/

	                    $('button.del').click( function () { //删除操作
	                    	id = $(this).attr('name');
	                    	console.log(id);
	        	            $.post(
	                            "/attribute/"+id,
	                            {'_method':'delete','_token':'{{csrf_token()}}'},
	                            function (data) {
	                                if(data > 0) {
	                                    $('tr.'+id).empty();
	                                }
	                        }) 
	                    })

	                    $('button.update').click( function () { //修改操作
	                    	var id = $(this).next().attr('name');
	                    	var attr_name = $('tr.'+id+' td').eq(1).text();
	                    	var attr_value =  $('tr.'+id+' td').eq(2).text();
	                    	var type_name =  $('tr.'+id+' td').eq(3).text();
	                    	$('button.off').css('visibility','visible');
	                    	// console.log(id+attr_name+attr_value+type_name);
	                    	$('button.create input').val('修改');
	                    	$('form').eq(0).attr('action','/attribute/'+id+'/edit')
	                    	$("input[name='attr_name']").val(attr_name);
	                    	$("input[name='attr_value']").val(attr_value);


	                    })

	                    $('button.off').click( function () {
	                    	$('button.create input').val('提交');
	                    	$('button.off').css('visibility','hidden');
	                    	$('form').eq(0).attr('action','/attribute/create')
	                    	$("input[name='attr_name']").val('');
	                    	$("input[name='attr_value']").val('');
	                    	return false;
	                    })


					</script>



                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    @endsection
