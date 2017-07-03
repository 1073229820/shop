@extends('admin.layouts.app')
@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="/">主页</a>
            </li>

            <li>
                <a href="#">表格</a>
            </li>
            <li class="active">XXX表格</li>
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
    <div class="page-content">
        <div class="page-header">
            <h1>
                表格
                <small>
                    <i class="icon-double-angle-right"></i>
                    动态 &amp; 静态表格
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
                                            <span class="lbl">属性ID</span>
                                        </label>
                                    </th>
                                    <th>商品ID</th>
                                    <th>商品属性ID</th>
                                    <th class="hidden-480">属性对应的值</th>

                                    <th>
                                        <i class="icon-time bigger-110 hidden-480"></i>
                                        属性对应的价格
                                    </th>
                                    <th class="hidden-480">操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>
                                        <a href="#">1</a>
                                    </td>
                                    <td>颜色</td>
                                    <td class="hidden-480">白</td>
                                    <td>1</td>

                                    <td class="hidden-480">
                                        <span class="label label-sm label-warning">100￥</span>
                                    </td>

                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                            <button class="btn btn-xs btn-success">
                                                <i class="icon-ok bigger-120"></i>
                                            </button>

                                            <button class="btn btn-xs btn-info">
                                                <i class="icon-edit bigger-120"></i>
                                            </button>

                                            <button class="btn btn-xs btn-danger">
                                                <i class="icon-trash bigger-120"></i>
                                            </button>

                                            <button class="btn btn-xs btn-warning">
                                                <i class="icon-flag bigger-120"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#">2</a>
                                    </td>
                                    <td>大小</td>
                                    <td class="hidden-480">M</td>
                                    <td>1</td>

                                    <td class="hidden-480">
                                        <span class="label label-sm label-warning">100￥</span>
                                    </td>

                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                            <button class="btn btn-xs btn-success">
                                                <i class="icon-ok bigger-120"></i>
                                            </button>

                                            <button class="btn btn-xs btn-info">
                                                <i class="icon-edit bigger-120"></i>
                                            </button>

                                            <button class="btn btn-xs btn-danger">
                                                <i class="icon-trash bigger-120"></i>
                                            </button>

                                            <button class="btn btn-xs btn-warning">
                                                <i class="icon-flag bigger-120"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    @endsection
