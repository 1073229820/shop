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
                <a href="#">商品管理</a>
            </li>
            <li class="active">浏览商品</li>
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

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="header smaller lighter blue"><i class="icon-hand-right icon-animated-hand-pointer blue"></i>
                            <span class="green" data-toggle="modal"> 浏览商品 </span>
                        </h3>
                        <div class="table-header">
                            商品列表
                        </div>

                        <div class="table-responsive">
                            <div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div id="sample-table-2_length" class="dataTables_length">
                                            <label>Display
                                                <select size="1" name="sample-table-2_length" aria-controls="sample-table-2">
                                                    <option value="10" selected="selected">10</option>
                                                    <option value="25">25</option><option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                                records
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="dataTables_filter" id="sample-table-2_filter">
                                            <label>Search: <input type="text" aria-controls="sample-table-2"></label>
                                        </div>
                                    </div>
                                </div>

                                <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th>商品名</th>
                                    <th>缩略图</th>
                                    <th class="hidden-480">库存量</th>
                                    <th>
                                        <i class="icon-time bigger-110 hidden-480"></i>
                                        添加时间
                                    </th>
                                    <th class="hidden-480">状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                @foreach($goodsList as $goods)
                                <tbody>
                                <tr>
                                    <td class="center">
                                        <label>
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </td>

                                    <td>
                                        <a href="#">{{$goods->goods_name}}</a>
                                    </td>
                                    <td>{{$goods->logo}}</td>
                                    <td class="hidden-480">{{$goods->num}}</td>
                                    <td>{{date('Y-m-d H:i:s', $goods->addtime)}}</td>

                                    <td class="hidden-480">
                                        @if ($goods->status == 1)
                                        <span class="label label-sm label-success">新添加</span>
                                        @elseif ($goods->status == 2)
                                        <span class="label label-sm label-info">在售</span>
                                        @else
                                        <span class="label label-sm label-inverse">下架</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                            <a class="blue" href="#">
                                                <i class="icon-zoom-in bigger-130"></i>
                                            </a>

                                            <a class="green" href="#">
                                                <i class="icon-pencil bigger-130"></i>
                                            </a>

                                            <a class="red" href="#">
                                                <i class="icon-trash bigger-130"></i>
                                            </a>
                                        </div>

                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="inline position-relative">
                                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-caret-down icon-only bigger-120"></i>
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



                                </tbody>
                                @endforeach
                                </table>
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="dataTables_info" id="sample-table-2_info">共 {{$goodsList->total()}} 条数据</div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="dataTables_paginate paging_bootstrap">
                                             {{$goodsList->links()}}
                                         </div>
                                     </div>
                                 </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->


@endsection

