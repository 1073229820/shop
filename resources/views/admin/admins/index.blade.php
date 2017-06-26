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
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>账号</th>
                                        <th>密码</th>
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
                                            <td>{{$v->pass}}</td>
                                            <td class="hidden-480">
                                                <img src="{{$v->userpic}}">
                                            </td>
                                            <td>{{$v->sex}}</td>
                                            <td>{{$v->email}}</td>
                                            <td class="hidden-480">
                                                @foreach($v->roles as $role)
                                                    <span class="label label-sm label-warning">{{$role->display_name}}</span>
                                                @endforeach
                                            </td>
                                            <td>{{$v->status}}</td>
                                            <td>{{$v->created_at}}</td>
                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                    <a href="admins/{{{$v->id}}}/edit">
                                                        <button class="btn btn-xs btn-info">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </button>
                                                    </a>
                                                    <form action="admins/{{{$v->id}}}" method="post">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="_method" value="DELETE">

                                                        <button class="btn btn-xs btn-danger">
                                                            <i class="icon-trash bigger-120"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection