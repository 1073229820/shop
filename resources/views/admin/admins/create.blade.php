@extends('admin.layouts.app')

@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script src="{{asset('assets/admin/js/jquery-1.10.2.min.js')}}"></script>
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="/">管理员</a>
            </li>

            <li>
                <a href="#">添加管理员</a>
            </li>

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
    <div class="col-xs-12">
        <form action="/admin/admins" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名 </label>
                <div class="col-sm-9">
                    <input type="text" name="name" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5"/>
                    <span id="pass1" style="display:none;">a</span>
                </div>

            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 密码 </label>
                <div class="col-sm-9">
                    <input type="password" name="pass" id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-5"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> 性别 </label>
                <div class="col-sm-3" style="padding-top:6px;">
                    <label><input type="radio" name="sex[]" value="1" checked>男</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="sex[]" value="2">女</label>
                    <!--<input type="radio" id="form-field-2" placeholder="Email" class="col-xs-10 col-sm-5" />男-->
                </div>
            </div>
            {{--<div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2" style="margin-top: 10px"> 缩略图 </label>
                <div class="col-sm-4" style="margin-top: 10px">--}}
            <input type="hidden" name="userpic" />
            {{--    </div>

            </div>--}}
            {{--显示图片--}}
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2" style="margin-top: 20px"> 图片 </label>
                <div class="col-sm-2" style="margin-top: 10px">
                    {{--文件上传--}}
                    <script src="{{asset('assets/admin/js/jquery-1.10.2.min.js')}}" type="text/javascript"></script>
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                    <script src="{{asset('uploadify/jquery.uploadify.js')}}" type="text/javascript"></script>
                    <link rel="stylesheet" type="text/css" href="{{asset('uploadify/uploadify.css')}}">

                    <script type="text/javascript">
                        <?php $timestamp = time();?>
                        $(function () {
                            $('#file_upload').uploadify({
                                'buttonText' : '图片上传',
                                'formData': {
                                    'timestamp': '<?php echo $timestamp;?>',
                                    '_token': '{{csrf_token()}}'
                                },
                                'swf': '{{asset('uploadify/uploadify.swf')}}',
                                'uploader': '{{url('admin/upload')}}',
                                'onUploadSuccess': function (file, data, response ){
//                                    alert(data);
                                    //给缩略图赋值，文件上传后的路径
                                    $('input[name=userpic]').val(data);
                                    //插入图片
                                    $('#art_thumb_img').attr('src','/'+data);
                                }
                            });
                        });
                    </script>
                    <style>
                        .uploadify{display:inline-block;}
                        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                    </style>
                    {{--文件上传--}}
                </div>
                <div class="col-sm-5 " >
                    <img src="" id="art_thumb_img" style="max-width:350px;max-height:70px;">
                </div>

            </div>
            {{--显示图片--}}
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 邮箱 </label>
                <div class="col-sm-9">
                    <input type="text" name="email" id="form-field-2" placeholder="Email" class="col-xs-10 col-sm-5"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> 状态 </label>
                <div class="col-sm-3" style="padding-top:6px;">
                    <label><input type="radio" name="status[]" value="1" checked>启用</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="status[]" value="2">禁用</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> 角色 </label>
                <div class="col-sm-9 no-padding-right " style="padding-top:6px;">
                    @foreach($roles as $role)
                        <label><input type="checkbox" name="roles[]"
                                      value="{{$role->id}}">{{$role->display_name or $rols->name}}</label>
                    @endforeach
                </div>
            </div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                     <button class="btn btn-info" type="submit">
                         <i class="icon-ok bigger-110"></i>
                         提交
                     </button>
                    {{--<label class="btn btn-info">--}}
                    {{--<input type="submit" value="提交" class="btn btn-info ">--}}
                    {{--</label>&nbsp; &nbsp; &nbsp;--}}
                    <button class="btn" type="reset">
                        <i class="icon-undo bigger-110"></i>
                        重置
                    </button>
                </div>
            </div>
        </form>
    </div>
    {{--ajax失去焦点，检查管理员账号是否存在--}}
    <script>
        $('input[name=name]').blur( function () {

            //获取到用户输入的用户名
            var uname = $(this).val();

            var that = $(this);

            //判断当前用户输入的用户名是否与之前存放的U属性的的值是否相等

            //获取到之前保存的用户名
            var origin = that.data('u');

            if (origin != uname) {
                $.ajax({
                    type: 'post',
                    url: "{{url('admin/checkAdminName')}}",
                    data: {"name": uname, '_token': '{{csrf_token()}}'},
                    success: function (data) {

                        //先把用户名存放起来
                        that.data('u', uname);

                        if (data.status == 1) {
                            $("#pass1").css({"display": "block", "color": "red", 'margin-top': '5px'})
                                .html(data.msg);
                        } else {
                            $("#pass1").css('display','none');
                        }
                    },
                    dataType: 'json'
                });
            }
        });
    </script>
    {{--ajax检查账号是否存在--}}
@endsection
