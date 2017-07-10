@extends('admin.layouts.app')

@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">Tables</a>
            </li>
            <li class="active">Simple &amp; Dynamic</li>
        </ul>
    </div><!-- .breadcrumb -->

    <script src="{{asset('assets/admin/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('layer/layer.js')}}"></script>
    <div class="nav-search" id="nav-search">
        <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="icon-search nav-search-icon"></i>
                    </span>
        </form>
    </div><!-- #nav-search -->
    <div class="page-content">
        <div class="page-header">
            <h1>
                权限管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    权限列表
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover" style="margin-bottom: -5px">
                                <thead>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>序号</th>
                                        <th>权限名称</th>
                                        <th>显示名称</th>
                                        <th class="hidden-480">权限描述</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($permissions as $v)
                                        <tr>
                                            <td class="center">
                                                <label>
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td>{{$v->id}}</td>
                                            <td>
                                                <a href="#">{{$v->name}}</a>
                                            </td>
                                            <td>{{$v->display_name}}</td>
                                            <td class="hidden-480">
                                                {{$v->description}}
                                            </td>
                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                    @if (session('adminname'))
                                                        @if (session('adminname')->ability('admin', 'perms_edit'))
                                                            <a href="permissions/{{{$v->id}}}/edit"
                                                               class="btn btn-xs btn-info">
                                                                <i class="icon-edit bigger-120"></i>
                                                            </a>
                                                        @endif
                                                    @endif
                                                    @if (session('adminname'))
{{--                                                        @if (session('adminname')->ability('admin', 'perms_delete'))--}}
                                                            <a href="javascript:;"
                                                               onclick="delPerms('{{$v->id}}', this)"
                                                               class="btn btn-xs btn-danger">
                                                                <i class="icon-trash bigger-120"></i>
                                                            </a>
                                                        {{--@endif--}}
                                                    @endif
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pull-right">
                            {{$permissions->links()}}
                            </div>
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    <script>

        function delPerms (perms_id, that)
        {
            layer.confirm('确定删除该权限吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //ajax请求删除数据
                $.post("{{url('admin/permissions')}}/"+perms_id, {'_method':'delete', '_token':'{{csrf_token()}}'},
                    function (data) {
                        //返回值为真，删除改行数据（局部刷新）
                        if (data.status == 1) {
                            layer.msg(data.msg, {icon: 6});
                            $(that).parents('div').parents('td').parents('tr').remove();

                        } else {
                            layer.msg(data.msg, {icon: 5});
                        }
                    });
            }, function(){});
        }
    </script>
@endsection


