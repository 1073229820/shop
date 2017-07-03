@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="breadcrumbs" id="breadcrumbs">

            <script src="{{asset('assets/admin/js/jquery-1.10.2.min.js')}}"></script>
            <script src="{{asset('layer/layer.js')}}"></script>
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
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

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                               autocomplete="off"/>
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
                        角色列表
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover"
                                       style="margin: -5px 0">
                                    <thead>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>序号</th>
                                        <th>角色名称</th>
                                        <th>显示名称</th>
                                        <th>角色描述</th>
                                        <th class="hidden-480">相关权限</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($roles as $v)
                                        <tr>
                                            <td class="center">
                                                <label>
                                                    <input type="checkbox" name="roles[]" value="{{$v->id}}"
                                                           class="ace"/>
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td>{{$v->id}}</td>
                                            <td>
                                                <a href="#">{{$v->name}}</a>
                                            </td>
                                            <td>{{$v->display_name}}</td>

                                            @if($v->description)
                                                <td class="hidden-480">
                                                    {{$v->description}}
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                            @if($v->perms)
                                                <td class="hidden-480">
                                                    @foreach($v->perms as $perm)
                                                        <span class="label label-sm label-warning">{{$perm->display_name}}</span>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                    {{--@ability('admin', 'edit_role')--}}
                                                    @if (session('adminname'))
                                                        @if(session('adminname')->ability('admin', 'role_edit'))
                                                            <a href="roles/{{{$v->id}}}/edit"
                                                               class="btn btn-xs btn-info">
                                                                <i class="icon-edit bigger-120"></i>
                                                            </a>
                                                        @endif
                                                    @endif
                                                    {{--@endability--}}
                                                    {{-- 如果角色名为'admin'时，不给删除这个按钮--}}
                                                    {{--                                                    @if($v->name !== 'admin')--}}
                                                    @if (session('adminname'))
                                                        @if (session('adminname')->ability('admin', 'role_delete'))
                                                            <a href="javascript:;" onclick="delRole('{{$v->id}}', this)"
                                                               class="btn btn-xs btn-danger">
                                                                <i class="icon-trash bigger-120"></i>
                                                            </a>
                                                        @endif
                                                    @endif
                                                    {{--@endif--}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    <div class="pull-left" style="margin-top: 20px ">
                                        <tr>
                                            <td>
                                                <a href="{{url('admin/roles/create')}}"
                                                   class="btn btn-primary glyphicon glyphicon-plus">
                                                    添加角色
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" onclick="delRoles()"
                                                   class="btn btn-danger glyphicon glyphicon-trash">
                                                    批量删除
                                                </a>
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="pull-right">
                                        {{$roles->links()}}
                                    </div>

                                </div>
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
    <script>
        //ajax删除单个
        function delRole(role_id, that) {
            layer.confirm('确定删除该角色吗？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.post(
                    "{{url('admin/roles')}}/" + role_id,

                    {'_method': 'delete', '_token': '{{csrf_token()}}'},

                    function (data) {

                        if (data.status == 1) {
                            layer.msg(data.msg, {icon: 6});
                            //如果返回真，删掉这一行数据(局部刷新)
                            $(that).parents('div').parents('td').parents('tr').remove();

                        } else {

                            layer.msg(data.msg, {icon: 5});
                        }

                    }, 'json');
            }, function () {

            });
        }

        //ajax批量删除
        function delRoles() {
            layer.confirm('确认批量删除角色？', {

                btn: ['确定', '取消'] //按钮

            }, function () {

                //找到选中的input标签
                var box = $("input[name='roles[]']:checked");

                var arr = [];

                for (var i = 0; i < box.length; i++) {
                    arr.push($(box[i]).val());
                }

                //发送ajax请求
                $.post(

                    "{{url('admin/roles/del/ee')}}",

                    {'_method': 'delete', '_token': '{{csrf_token()}}', 'id': arr},

                    function (data) {

                        if (data.status == 1) {

                            layer.msg(data.msg, {icon: 6});
                            //循环删除选中的input标签所在行（局部刷新）
                            for (var i=0; i<box.length; i++) {

                                $(box[i]).parents('label').parents('td').parents('tr').remove()
                            }

                        } else {

                            layer.msg(data.msg, {icon: 5});
                        }

                    }, 'json');

            }, function () {

            });
        }
    </script>
@endsection