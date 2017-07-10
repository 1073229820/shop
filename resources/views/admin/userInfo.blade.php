@extends('admin.layouts.app')

@section('content')

    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">会员</a>
            </li>

            <li>
                <a href="#">会员管理</a>
            </li>
            <li class="active">会员列表</li>
        </ul><!-- .breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search" action="{{url('admin/userInfo')}}" method="get">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"  name="keyword"/>
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
                        <h3 class="header smaller lighter blue">jQuery dataTables</h3>
                        <div class="table-header">
                           会员信息列表
                        </div>

                        <div class="table-responsive">
                            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th>用户名</th>
                                    <th>真实姓名</th>


                                    <th>

                                        性别
                                    </th>
                                    <th class="hidden-480">  <i class="icon-time bigger-110 hidden-480"></i>电话</th>
                                    <th class="hidden-480">邮箱</th>
                                    <th>状态</th>
                                    <th class="hidden-480">注册时间</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($info as $v)
                                <tr>

                                    <td>
                                       {{$v->user_name}}
                                    </td>
                                    <td>{{$v->name}}</td>
                                    <td>@if($v->sex == 1)
                                            男
                                            @else
                                            女
                                        @endif
                                    </td>
                                    <td class="hidden-480">{{$v->phone}}</td>


                                    <td class="hidden-480">
                                      {{$v->email}}
                                    </td>
                                    <td class="hidden-480">
                                        @if($v->status == '1')
                                            正常
                                            @else
                                            禁用
                                            @endif
                                    </td>
                                    <td class="hidden-480">
                                        {{date('Y-m-d H:i:s', $v->addtime)}}
                                    </td>

                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                           {{-- <a class="blue" href="#">
                                                <i class="icon-zoom-in bigger-130"></i>
                                            </a>
--}}
                                            <a class="green" href="javascript:;"   onclick="edit({{$v->id}})">
                                                <i class="icon-pencil bigger-130"></i>
                                            </a>

                                            <a class="red" href="javascript:;"   onclick="deleteClick({{$v->id}})">
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
                                                        <a   class="tooltip-error" data-rel="tooltip" title="Delete">
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
                        </div>
                    </div>
                </div>



                {!! $info->appends($request->only(['keyword']))->render() !!}

                <div id="modal-table" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header no-padding">
                                <div class="table-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        <span class="white">&times;</span>
                                    </button>
                                    Results for "Latest Registered Domains
                                </div>
                            </div>

                            <div class="modal-body no-padding">
                                <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                                    <thead>
                                    <tr>
                                        <th>Domain</th>
                                        <th>Price</th>
                                        <th>Clicks</th>

                                        <th>
                                            <i class="icon-time bigger-110"></i>
                                            Update
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">ace.com</a>
                                        </td>
                                        <td>$45</td>
                                        <td>3,330</td>
                                        <td>Feb 12</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#">base.com</a>
                                        </td>
                                        <td>$35</td>
                                        <td>2,595</td>
                                        <td>Feb 18</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#">max.com</a>
                                        </td>
                                        <td>$60</td>
                                        <td>4,400</td>
                                        <td>Mar 11</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#">best.com</a>
                                        </td>
                                        <td>$75</td>
                                        <td>6,500</td>
                                        <td>Apr 03</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#">pro.com</a>
                                        </td>
                                        <td>$55</td>
                                        <td>4,250</td>
                                        <td>Jan 21</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal-footer no-margin-top">
                                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                                    <i class="icon-remove"></i>
                                    Close
                                </button>

                                <ul class="pagination pull-right no-margin">
                                    <li class="prev disabled">
                                        <a href="#">
                                            <i class="icon-double-angle-left"></i>
                                        </a>
                                    </li>

                                    <li class="active">
                                        <a href="#">1</a>
                                    </li>

                                    <li>
                                        <a href="#">2</a>
                                    </li>

                                    <li>
                                        <a href="#">3</a>
                                    </li>

                                    <li class="next">
                                        <a href="#">
                                            <i class="icon-double-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->

    <script>

        //删除用户
        function deleteClick(cate_id)
        {
            //询问框
            layer.confirm('你确定要删除这个会员信息么？', {
                btn: ['是的','不不'] //按钮
            }, function(){
                $.post("{{url('/admin/userInfo')}}/"+cate_id, {'_method':'delete', '_token':'{{csrf_token()}}'}, function(data){
                    if(data.status == 1){
                        //删除成功后就马上刷新
                        location.href = location.href;
                        layer.msg('删除成功', {icon: 6});
                    }else{
                        layer.msg('删除失败！稍后再试', {icon: 5});
                    }
                });
                //alert(cate_id);
            }, function(){

            });

        }

        //修改用户状态
        function edit(cate_id)
        {
            //询问框
            layer.confirm('你确定要修改该会员状态么？', {
                btn: ['是的','不不'] //按钮
            }, function(){
                $.post("{{url('/admin/userInfo')}}/"+cate_id+"/edit", {'_method':'get', '_token':'{{csrf_token()}}'}, function(data){
                    if(data.status == 1){
                        //删除成功后就马上刷新
                        location.href = location.href;
                        layer.msg('修改成功', {icon: 6});
                    }else{
                        layer.msg('修改失败！稍后再试', {icon: 5});
                    }
                });
                //alert(cate_id);
            }, function(){

            });

        }





    </script>





@endsection




