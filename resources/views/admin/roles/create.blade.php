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
                <a href="/">角色管理</a>
            </li>

            <li>
                <a href="#">添加角色</a>
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
        <form action="/admin/roles" method="post" class="form-horizontal">
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
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色名称 </label>
                <div class="col-sm-9">
                    <input type="text" name="name" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5"/>
                    <span id="pass1" style="display:none;margin-top: 5px">aaa</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 显示名称 </label>
                <div class="col-sm-9">
                    <input type="text" name="display_name" id="form-field-2" placeholder="" class="col-xs-10 col-sm-5"/>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 角色描述 </label>
                <div class="col-sm-9">
                    <input type="text" name="description" id="form-field-2" placeholder="" class="col-xs-10 col-sm-5"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="" style="margin-top: 5px"> 关联权限 </label>
                <div class="col-sm-9 no-padding-right " style="padding-top:6px;">
                    @foreach($perms as $perm)
                        <label><input type="checkbox" name="perms[]"
                                      value="{{$perm->id}}">{{$perm->display_name or $perm->name}}</label>
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
    <script>
        $('input[name=name]').on('blur', function () {

            //获取用户输入的角色名
            var uname = $(this).val();
            var that = $(this);

            //获取旧数据，并判断用户输入的数据是否与旧数据相同，
            var origin = that.data('u');
            if (origin != uname) {

                //发送ajax请求
                $.get("{{url('admin/checkRoleName')}}", {'name': uname}, function (data) {

                    //保存用户输入的数据，保存在一个属性中，用来下次和输入的数据做比较
                    that.data('u', uname);

                    data = JSON.parse(data);

                    if (data.status == 1) {

                        $('#pass1').css({'display': 'block', 'color': 'red'}).html(data.msg);

                    } else {

                        $('#pass1').css('display', 'none');
                    }
                });
            }

        });
    </script>
@endsection