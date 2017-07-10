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
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form" method="post" action="/admin/goods/{{$goods['id']}}">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}}              
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品名 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-3" name="name" value="{{$goods['name']}}" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品类别 </label>
                        <div class="type col-sm-9">
                            <select class="col-xs-10 col-sm-3" id="form-field-select-1" name="type_id">
                                @foreach($type as $name=>$id)
                                <option value="{{$id}}" @if($goods['type_id'] == $id) selected  @endif>{{$name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if(count($attr)>0)
                    @foreach($attr as $v)
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{$v['attr_name']}} :</label>
                            <div class="type col-sm-9">
                            <?php $array = explode(',', $v['attr_value']); ?>
                            @foreach($array as $val)
                            <input type="radio" name="{{$v['attr_price']}}" value="{{$val}}" @if( $goods[$v['attr_price']] == $val) checked @endif> {{$val}}
                            @endforeach   
                            </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 价格： </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-2" name="price" value="{{$goods['price']}}"/>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品库存量 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-2" name="store" value="{{$goods['store']}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品厂家 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-3" name="production" value="{{$goods['production']}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 销售量 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-2" name="num" value="{{$goods['num']}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 点击量 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-2" name="clicknum" value="{{$goods['clicknum']}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品图片 </label>

                        <div class="col-sm-9">

                            <input type="text" size="50" name="image" class="col-xs-10 col-sm-5">
                            <input id="file_upload" name="file_upload" type="file" multiple="true" value="{{$goods['image']}}">
                            <script src="{{asset('/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('/uploadify/uploadify.css')}}">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'buttonText' : '图片上传',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : "{{csrf_token()}}"
                                        },
                                        'swf'      : "{{asset('/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{asset('admin/upload')}}",
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('input[name=image]').val(data);
                                            $('#art_thumb_img').attr('src','/'+data);

                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                            </style>

                        </div>
                    </div>
                    <!-- 显示图片 -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>
                        <div class="col-sm-9 " >
                            <img src="{{asset($goods['image'])}}" id="art_thumb_img" style="max-width:350px;max-height:70px;">
                        </div>
                    </div>
                    <!-- 显示图片结束 -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品状态 </label>

                        <div class="col-sm-9">
                            <select class="col-xs-10 col-sm-3" id="form-field-select-1" name="status">
                                <option value="1" @if($goods['status']==1) selected @endif>新添加</option>
                                <option value="2" @if($goods['status']==2) selected @endif>在售</option>
                                <option value="3" @if($goods['status']==3) selected @endif>下架</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品简单描述 </label>

                        <div class="col-sm-9">
                            <textarea id="form-field-11" class="autosize-transition col-xs-10 col-sm-6 " name="descr">{{$goods['descr']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品详细描述 </label>
                        <div class="col-sm-9">
                            <textarea id="form-field-11" class="autosize-transition col-xs-10 col-sm-6 " name="descrs">{{$goods['descrs']}}</textarea>
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="button">
                                <i class="icon-ok bigger-110"></i>
                                <input type="submit" value="提交">
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>
                </form>
                <script type="text/javascript">

                </script>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection

