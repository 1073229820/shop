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
                <a href="#">表单</a>
            </li>
            <li class="active">表单元素</li>
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
                表单元素
                <small>
                    <i class="icon-double-angle-right"></i>
                    常见的表单元素和布局
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品名： </label>
                    <div class="">
                        {{$goods->name}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品简单描述： </label>
                    <div class="">
                        {{$goods->descr}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品类别: </label>
                    <div class="">
                        {{$goods->type}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{$attr['attr1']}} </label>
                    <div class="">
                        {{$price['attr1']}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{$attr['attr2']}} </label>
                    <div class="">
                        {{$price['attr2']}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">价格：  </label>
                    <div class="">
                        <span class="price">{{$price['price']}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品库存量: </label>
                    <div class="">
                        <span class="store">{{$price['store']}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品厂家： </label>
                    <div class="">
                        {{$goods->production}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品图片 ： </label>
                    <div class="">
                        <img src="{{asset($goods->image)}}"><br>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品状态 ： </label>
                    <div class="">
                        @if ($goods->status == 1)
                        <span class="label label-sm label-success">新添加</span>
                        @elseif ($goods->status == 2)
                        <span class="label label-sm label-info">在售</span>
                        @else
                        <span class="label label-sm label-inverse">下架</span>
                        @endif                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品描述： </label>
                    <div class="">
                        @if(count($descr)>0)
                        {{$descr[0]['descrs']}}
                        @endif                        
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>
                    <div class="col-sm-9">
                    </div>
                </div> -->
                <script src="{{asset('/assets/admin/js/jquery-1.10.2.min.js')}}" type="text/javascript"></script>
                <script type="text/javascript">
                    $('div.attr').on('change','select',function () {
                         var color = $('select').val();
                         var memory = $('select:eq(1)').val();
                        $.get( '/admin/data/goodsprice', {color: color,memory: memory}, function (data) {
                            $('span.price').text(data[0]['price']);
                            $('span.store').text(data[0]['store']);
                        }) 
                    })
                </script>   
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection

