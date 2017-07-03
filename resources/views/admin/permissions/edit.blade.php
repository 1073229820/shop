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
                <a href="/">权限管理</a>
            </li>

            <li>
                <a href="#">编辑权限</a>
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
        <form action="/admin/permissions/{{$perms->id}}" method="post" class="form-horizontal">
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
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 权限名称 </label>
                <div class="col-sm-9">
                    <input type="text" name="name" value="{{$perms->name}}" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 显示名称 </label>
                <div class="col-sm-9">
                    <input type="text" name="display_name" value="{{$perms->display_name}}" id="form-field-2" placeholder="" class="col-xs-10 col-sm-5"/>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 角色描述 </label>
                <div class="col-sm-9">
                    <input type="text" name="description" value="{{$perms->description}}" id="form-field-2" placeholder="" class="col-xs-10 col-sm-5"/>
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