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
                订单详情
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

                                    <th>商品名</th>
                                    <th>商品logo</th>
                                    <th>商品价格</th>
                                    <th>购买数量</th>
                                    <th>小计</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php($sum = 0)
                                @foreach($orderDetail as $item)
                                    <tr>
                                        <td>{{$item['order_number']}}</td>
                                        <td>
                                            {{$item['name']}}
                                        </td>
                                        <td>{{$item['image']}}</td>
                                        <td>{{$item['price']}}</td>
                                        <td>{{$item['buynum']}}</td>

                                        <td>{{$item['buynum']*$item['price']}}</td>

                                        @php($sum += $item['buynum']*$item['price'])
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6">
                                        <span>
                                              总计: {{$sum}}
                                        </span>

                                    </td>

                                </tr>

                                </tbody>
                            </table>
                            <div>



                            </div>


                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->






            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection




