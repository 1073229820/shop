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
                                    <th class="center" >
                                        <label>
                                            *
                                        </label>
                                    </th>
                                    <th>类别ID</th>
                                    <th>类别名称</th>
                                    <th class="hidden-480">父类别ID</th>

                                    <th class="hidden-480">path路径</th>

                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($data as $v)
                                <tr class="id{{$v['id']}}">
                                    <td class="center" >
                                        *
                                    </td>
                                    <td>
                                        <a href="#">{{$v['id']}}</a>
                                    </td>
                                    <td>
                                        <?php
                                            $m = substr_count($v['path'],",");
                                            $nbsp = str_repeat("-->",$m);
                                        ?>    
                                        @if($m>0)                                    
                                        <button class="btn btn-xs btn-info">
                                        {{$nbsp}}
                                        </button>   
                                        @endif                                    
                                       {{$v['name']}}
                                    </td>
                                    <td class="hidden-480">{{$v['pid']}}</td>

                                    <td class="hidden-480">
                                        <span class="label label-sm label-warning">{{$v['path']}}</span>
                                    </td>

                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                            <button class="edit btn btn-xs btn-info" >
                                                <i class="icon-edit bigger-120"></i>修改
                                            </button>

                                            <button class="del btn btn-xs btn-danger"  data='{{$v->id}}'>
                                                <i class="icon-trash bigger-120"></i>删除
                                            </button>

                                            <button class="add btn btn-xs btn-warning">
                                               <i class="icon-flag bigger-120"></i>添加子类
                                            </button>

                                            <div class="btn btn-xs btn-warning" name="create" style="visibility:hidden; ">
                                                <form method="post" action="/admin/goodstype">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="pid" value="{{$v['id']}}">
                                                <input type="hidden" name="path" value="{{ $v['path'].','.$v['id'] }}">
                                                <input type="text" name="name" placeholder="子类名" >
                                                <input type="submit" value="提交">
                                                </form>
                                            </div>   
                                            
                                            <div style="visibility:hidden; ">
                                                    <input type='text' placeholder="新类名" name='name' data='{{$v['id']}}'>
                                                    <button class="update">确定</button>
                                            </div>
                                            <div class='text'></div>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                 <div class="col-sm-6">
                                     <div class="dataTables_info" id="sample-table-2_info">共 {{$data->total()}} 条数据</div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="dataTables_paginate paging_bootstrap">
                                         {{$data->links()}}
                                     </div>
                                 </div> 
                            </div> 
                            <script type="text/javascript" src="{{asset('/assets/admin/js/jquery-1.10.2.min.js')}}"></script>
                            <script type="text/javascript">
                          
                                $('button.add').click(function () {
                                    var button = $(this);
                                    if( button.next().css('visibility') != 'hidden'){
                                        button.next().css('visibility','hidden');
                                    } else {
                                        button.next().css('visibility','visible');
                                    } 
                                })

                                $('button.edit').click(function () {
                                    // $(this).nextAll().last().css('visibility','visible')
                                    var edit = $(this);
                                    if( edit.nextAll().eq(3).css('visibility') != 'hidden'){
                                        edit.nextAll().eq(3).css('visibility','hidden');
                                    } else {
                                        edit.nextAll().eq(3).css('visibility','visible');
                                    }                                       
                                })

                                $('button.update').click(function () { //修改
                                    var update =  $(this);
                                    var name = $(this).prev().val();
                                    // console.log(name);
                                    var id = $(this).prev().attr('data');
                                    // console.log(id);
                                    $.ajax({
                                        url:'/admin/goodstype/'+id+'/edit?name='+name,
                                        type:'get',
                                        dataType:'json',
                                        success:function(data){
                                            if(data) {
                                                update.parent().css('visibility','hidden');
                                                $('.id'+id).children().eq(2).text(name);
                                                update.parent().next().text('修改成功');
                                                setTimeout(function(){      //5秒后提示消失
                                                    update.parent().next().text('');
                                                },5000)
                                            } else {
                                                update.parent().next().text('修改失败');
                                                setTimeout(function(){
                                                    update.parent().next().text('');
                                                },5000)
                                            }
                                        }
                                    });
                                })

                               
                                $("button.del").click(function () { //删除
                                    var del = $(this);
                                    id = $(this).attr('data');
                                    $.post(
                                        "/admin/goodstype/"+id,
                                        {'_method':'delete','_token':'{{csrf_token()}}'},
                                        function (data) {
                                            if(data>0) {
                                                $('tr.id'+id).empty();
                                            } else {
                                                del.nextAll('div.text').text('该类别有子类无法删除！');
                                                setTimeout(function(){
                                                    del.nextAll('div.text').text('');
                                                },5000)
                                            }
                                    }) 
                                })
                                
                            </script>                           
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection

