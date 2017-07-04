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
                <a href="#">表单</a>
            </li>
            <li class="active">表单元素</li>
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
	<script type="text/javascript" src="{{asset('/assets/admin/js/jquery-2.0.3.min.js')}}"></script>
    <div class="page-content">
        <div class="page-header">
            <h1>
                表单元素
                <small>
                    <i class="icon-double-angle-right"></i>
                    常见的表单元素和布局
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal" role="form"  action='/goodstype'  method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 类别名 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" name="name"/>
                            {{ csrf_field() }}

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品类别 </label>

                        <div class="type col-sm-9">
                            <select class="col-xs-10 col-sm-3" id="form-field-select-1" name="pid">
                                <option value="0" data="0">顶级类别</option>
                            </select>
                            <input type="hidden" name="path" value="0" class="path">
                        </div>
                    </div>

                    @if(!empty($success))
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            {{$success}}
                        </div>
                    </div>                                          
                    @endif              
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="button">
                                <i class="icon-ok bigger-110"></i>
                                <input type="submit" value="提交">
                            </button>
                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>
                </form>
                <script type="text/javascript">
                    $(function($) {         //商品顶级类别
                        $.get("/admin/data/goodstype",function(data){
                            console.log(data);
                            var str = '';
                            for (var i = data.length - 1; i >= 0; i--) {
                                str += `<option value="`+data[i]['id']+`" data='`+data[i]['path']+`'>`+data[i]['name']+`</option>`;
                            }
                            $('select').eq(0).append(str);
                        })
                    })

                    $('div.type').on( 'change','select', function () {
                        var that = $(this);
                        var id = that.val();
                        console.log(id);
                        that.nextAll('select').remove();
                        $.get(                          //获取下一级类别
                            '/admin/data2/goodstype',
                            {pid: id},
                            function (data) {
                                console.log(data);
                                if(data.length>0){      //只有下一级类别有值才执行，
                                    var str = '<select name="pid">';
                                    str += '<option value="'+id+'" data="">--请选择--</option>'
                                    for (var i = 0; i<data.length; i++) {
                                        str += '<option value="'+data[i].id+'" data="'+data[i].path+'">'+data[i].name+'</option>';
                                    }
                                    str += '</select>';
                                    //在当前点击的select标签后面加str
                                    that.after(str);                                    
                                }
                            },
                            'json'
                        );
                        var data = $(this).find("option:selected").attr('data');
                        console.log(data);
                        if(id != '0'){                      //确定新添加类别的路径path
                            var path = data + ',' + id ;
                            $('.path').val(path);
                            console.log(path);
                        } else {
                            $('input.path').val('0');
                        }
                    })
                </script>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    @endsection

