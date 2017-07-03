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
                <a href="#">编辑角色</a>
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
        <form action="/admin/roles/{{{$role->id}}}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="PUT">
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
            @if ($role->name == 'admin')
                <input type="hidden" name="name" value="{{$role->name}}" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5"/>
            @else
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色名称 </label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="{{$role->name}}" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5"/>
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 显示名称 </label>
                <div class="col-sm-9">
                    <input type="text" name="display_name" value="{{$role->display_name}}" id="form-field-2" placeholder="" class="col-xs-10 col-sm-5"/>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 角色描述 </label>
                <div class="col-sm-9">
                    <input type="text" name="description" value="{{$role->description}}" id="form-field-2" placeholder="" class="col-xs-10 col-sm-5"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="" style="margin-top: 5px"> 关联权限 </label>
                <div class="col-sm-9 no-padding-right " style="padding-top:6px;">
                    @foreach($perms as $perm)
                        <label><input type="checkbox" name="perm[]"
                                      value="{{$perm->id}}" {{$role->hasPermission($perm->name)?'checked':''}}>{{$perm->display_name or $perm->name}}</label>
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
@endsection