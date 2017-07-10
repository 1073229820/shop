@extends('admin.layouts.app')

@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">主页</a>
            </li>

            <li>
                <a href="#">订单管理</a>
            </li>
            <li class="active">浏览订单</li>
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
               订单列表
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
                                    <th>订单号</th>

                                    <th>用户名</th>
                                    <th>收货人姓名</th>
                                    <th>收货人电话</th>
                                    <th>收货人地址</th>
                                    <th>邮编</th>
                                    <th>
                                        <i class="icon-time bigger-110 hidden-480"></i>
                                        下单时间
                                    </th>
                                    <th>订单总价</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($orders as $item)
                                <tr>
                                    <td>{{$item['order_number']}}</td>
                                    <td>
                                        {{$item['user_name']}}
                                    </td>
                                    <td>{{$item['cnee_name']}}</td>
                                    <td class="hidden-480">{{$item['cnee_tel']}}</td>
                                    <td>{{$item['cnee_address']}}</td>
                                    <td>{{$item['code']}}</td>
                                    <td>{{date('Y-m-d H:i:s', $item['ordertime'])}}</td>
                                    <td>{{'￥'.$item['total_price']}}</td>

                                    <td class="hidden-480">
                                        @if($item['status'] == 0)
                                        <span class="label label-sm label-success">新订单</span>
                                            @elseif($item['status'] == 1)
                                            <span class="label label-sm label-warning">已发货</span>
                                            @elseif($item['status'] == 2)
                                            <span class="label label-sm label-info">已收货</span>
                                            @else
                                            <span class="label label-sm label-default">无效订单</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                            @if($item['status'] == 0)
                                            <a class="btn btn-xs btn-success" href="/admin/orders/edit/{{$item['id']}}">
                                                <i class="icon-ok bigger-120">发货</i>
                                            </a>
                                                @else
                                                <button class="btn btn-xs btn-default disabled" >
                                                    <i class="icon-ok bigger-120">发货</i>
                                                </button>
                                            @endif
                                            <a class="btn btn-xs btn-info" href="/admin/orders/detail/{{$item['id']}}">
                                                <i class="icon-edit bigger-120">详情</i>
                                            </a>
                                        </div>

                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="inline position-relative">
                                                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-cog icon-only bigger-110"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                    <li>
                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                        <span class="blue">
                                                                            <i class="icon-zoom-in bigger-120"></i>
                                                                        </span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                        <span class="green">
                                                                            <i class="icon-edit bigger-120"></i>
                                                                        </span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                        <span class="red">
                                                                            <i class="icon-trash bigger-120"></i>
                                                                        </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="pull-right">
                                {{ $orders->links() }}

                            </div>

                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->






            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection




