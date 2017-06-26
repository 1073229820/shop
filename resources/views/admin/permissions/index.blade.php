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
                用户权限
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
                                        <th>权限名称</th>
                                        <th>显示名称</th>
                                        <th class="hidden-480">权限描述</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                @foreach($permissions as $v)
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

                                            <td class="hidden-480">
                                                {{$v->description}}
                                            </td>
                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                    <a href="permissions/{{{$v->id}}}/edit">
                                                        <button class="btn btn-xs btn-info">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </button>
                                                    </a>

                                                    <form action="permissions/{{{$v->id}}}" method="post">
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


