@extends('admin.layouts.app')

@section('content')

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
                管理员
                <small>
                    <i class="icon-double-angle-right"></i>
                    管理员列表
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
                                                <input type="checkbox" class="ace"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>账号</th>
                                        <th class="hidden-480">用户头像</th>
                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            性别
                                        </th>
                                        <th class="hidden-480">邮箱</th>
                                        <th class="hidden-480">角色</th>
                                        <th>状态</th>
                                        <th>注册时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                @foreach($post as $v)
                                    <tbody>
                                        <tr>
                                            <td class="center">
                                                <label>
                                                    <input type="checkbox" class="ace"/>
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="#">{{$v->name}}</a>
                                            </td>
                                            <td class="hidden-480">
                                                <img src="{{asset($v->userpic)}}" style="max-width:100px;max-height:35px;">
                                            </td>
                                            <td style="text-align:center">{{$v->sex == 1? '男': '女'}}</td>
                                            <td>{{$v->email}}</td>
                                            <td class="hidden-480">
                                                @if ($v->roles)
                                                    @foreach($v->roles as $role)
                                                        <span class="label label-sm label-warning">{{$role->display_name or $role->name}}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{$v->status ==1 ? '正常': '禁用'}}</td>
                                            <td>{{$v->created_at}}</td>
                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                                    @if (session('adminname'))
                                                        @if (session('adminname')->ability('admin', 'admin_edit'))
                                                            <a href="admins/{{{$v->id}}}/edit" class="btn btn-xs btn-info">
                                                                <i class="icon-edit bigger-120"></i>
                                                            </a>
                                                        @endif
                                                    @endif
{{--                                                    @if ($v->name !== 'admin')--}}
                                                        @if (session('adminname'))
                                                            @if(session('adminname')->ability('admin', 'admin_delete'))
                                                                <a href="javascript:;"
                                                                   onclick="delUser('{{$v->id}}',this)"
                                                                   class="btn btn-xs btn-danger">
                                                                    <i class="icon-trash bigger-120"></i>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    {{--@endif--}}
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            <div class="pull-right">
                            {{$post->links()}}
                            </div>
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->

    <script>
        //删除用户操作
        function delUser (user_id,that)
        {
            layer.confirm('确认删除该管理员吗？', {

                btn: ['确定','取消'] //按钮

            }, function(){
                
                $.post(

                    "{{url('admin/admins')}}/"+user_id,

                 {'_method':'delete', '_token':'{{csrf_token()}}'},

                    function (data) {

                       if (data.status == 1) {
                           layer.msg(data.msg, {icon:6});
                            //如果返回真，删除这一行的数据（局部刷新） that为点击的标签
                           $(that).parents('div').parents('td').parents('tr').remove();

                       } else {
                           layer.msg(data.msg, {icon:5});
                       }
                });
            }, function(){

            });
        }

    </script>
@endsection
