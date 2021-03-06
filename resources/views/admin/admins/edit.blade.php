@extends('admin.layouts.app')

@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {
            }
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
                		<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                               autocomplete="off"/>
                		<i class="icon-search nav-search-icon"></i>
                	</span>
            </form>
        </div><!-- #nav-search -->
    </div>
    <div class="col-xs-12">
        <form action="/admin/admins/{{{$post->id}}}" method="post" class="form-horizontal" role="form"
              enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="PUT">
            {{--错误提示--}}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{--错误提示--}}

            @if ($post->name == 'admin')
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px"> 用户名 </label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="{{$post->name}}" readonly id="form-field-1" placeholder="" class="col-xs-10 col-sm-5"/>
                    </div>
                </div>
            @else
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名 </label>
                <div class="col-sm-9">
                    <input type="text" name="name" value="{{$post->name}}" id="form-field-1" placeholder="Username"
                           class="col-xs-10 col-sm-5"/>
                </div>
            </div>
            @endif

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 密码 </label>
                <div class="col-sm-9">
                    <input type="password" name="pass" value="{{$post->pass}}" id="form-field-2" placeholder="Password"
                           class="col-xs-10 col-sm-5"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> 性别 </label>
                <div class="col-sm-3" style="padding-top:6px;">
                    <label><input type="radio" name="sex[]" value="1" {{$post->sex == 1?'checked':''}}>男</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="sex[]" value="2" {{$post->sex == 2?'checked':''}}>女</label>
                    <!--<input type="radio" id="form-field-2" placeholder="Email" class="col-xs-10 col-sm-5" />男-->
                </div>
            </div>

            <div class="form-group">

                <label class="col-sm-3 control-label no-padding-right" for="form-field-2" style="margin-top: 20px"> 头像 </label>
                <div style="margin-top: 20px" class="col-sm-2">
                    <input type="file" name="userpic" value="{{$post->userpic}}">
                </div>
                <div class="col-sm-5">
                    <img src="{{asset($post->userpic)}}" id="art_thumb_img" style="max-width:500px;max-height:100px;">
                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 邮箱 </label>
                <div class="col-sm-9">
                    <input type="text" name="email" value="{{$post->email}}" id="form-field-2" placeholder="Email"
                           class="col-xs-10 col-sm-5"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> 状态 </label>
                <div class="col-sm-3" style="padding-top:6px;">
                    <label><input type="radio" name="status[]" value="1" {{$post->status==1?'checked':''}}>启用</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="status[]" value="2" {{$post->status==2?'checked':''}}>禁用</label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> 角色 </label>
                <div class="col-sm-9 no-padding-right " style="padding-top:6px;">
                    @if ($roles)
                        @foreach($roles as $role)
                            <label>
                                <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                        {{$post->hasRole($role->name)?'checked':''}}
                                        {{$post->is_admin($role)}}>
                                        {{$role->display_name or $rols->name}}
                            </label>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        提交
                    </button>
                    {{--  <label class="btn btn-info">
                          <input type="submit" value="提交">
                      </label>--}}&nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="icon-undo bigger-110"></i>
                        重置
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
