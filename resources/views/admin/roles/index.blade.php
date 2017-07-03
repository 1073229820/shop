@extends('admin.layouts.app')

@section('content')
    <div class="container">

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
                        用户角色
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
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <th class="center">
                                                <label>
                                                    <input type="checkbox" class="ace" />
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
                                        @foreach($roles as $v)
                                            <tbody>
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

                                                    @if($v->description)
                                                        <td class="hidden-480">
                                                            {{$v->description}}
                                                        </td>
                                                    @else <td></td>
                                                    @endif
                                                    @if($v->perms)
                                                        <td class="hidden-480">
                                                            @foreach($v->perms as $perm)
                                                                <span class="label label-sm label-warning">{{$perm->display_name}}</span>
                                                            @endforeach
                                                        </td>
                                                    @else <td></td>
                                                    @endif
                                                    <td>
                                                        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                            {{--@ability('admin', 'edit_role')--}}
                                                                <a href="roles/{{{$v->id}}}/edit" >
                                                                <button class="btn btn-xs btn-info">
                                                                    <i class="icon-edit bigger-120"></i>
                                                                </button>
                                                            </a>
                                                            {{--@endability--}}
                                                           {{-- 如果角色名为'admin'时，不给删除这个按钮--}}
                                                            @if($v->name !== 'admin')
                                                                {{--@ability('admin', 'delete_role')--}}
                                                                <form action="roles/{{{$v->id}}}" method="post">

                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                    <input type="hidden" name="_method" value="DELETE">

                                                                    <button class="btn btn-xs btn-danger">
                                                                        <i class="icon-trash bigger-120"></i>
                                                                    </button>
                                                                </form>
                                                                {{--@endability--}}
                                                            @endif
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

    </div>
@endsection