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

                <form class="form-horizontal" role="form" method="post" action="/goods">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品名 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-1" name="name" />
                            {{ csrf_field() }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品类别 </label>

                        <div class="type col-sm-9">
                            <select class="col-xs-10 col-sm-3" id="form-field-select-1" name="type_id">
                                <option>选择商品类别</option>
                            </select>
                        </div>
                    </div>
                    <div class="attr">
                        <!-- <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">颜色</label>
                            <div class="col-sm-9">
                                <input name="color"  type="radio" value="红色">红色
                                <input name="color"  type="radio" value="白色">白色
                            </div>                       
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">内存</label>
                            <div class="col-sm-9">
                                <input name="memory"  type="radio" value="8G">8G
                                <input name="memory"  type="radio" value="16G">16G
                                <input name="memory"  type="radio" value="32G">32G
                                <input name="memory"  type="radio" value="64G">64G
                            </div> 
                        </div> -->                        
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 价格： </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-1" name="price" />
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品库存量 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-1" name="store"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品厂家 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-1" name="production"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品图片 </label>

                        <div class="col-sm-9">
                        
                            <input type="text" size="50" name="image" class="col-xs-10 col-sm-5">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
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
                            <img src="" id="art_thumb_img" style="max-width:350px;max-height:70px;">
                        </div>
                    </div>
                    <!-- 显示图片结束 -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品状态 </label>

                        <div class="col-sm-9">
                            <select class="col-xs-10 col-sm-3" id="form-field-select-1" name="status">
                                <option value="1" >新添加</option>
                                <option value="2" >在售</option>
                                <option value="3" >下架</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品简单描述 </label>

                        <div class="col-sm-9">
                            <textarea id="form-field-11" class="autosize-transition col-xs-10 col-sm-6 " name="descr"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品描述 </label>

                        <div class="col-sm-9">
                            <textarea id="form-field-11" class="autosize-transition col-xs-10 col-sm-6 " name="descrs"></textarea>
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
                    $(function($) {         //商品顶级类别
                        $.get("/admin/data/goodstype",function(data){
                            var str = '';
                            for (var i = data.length - 1; i >= 0; i--) {
                                str += `<option value="`+data[i]['id']+`" >`+data[i]['name']+`</option>`;
                            }
                            $('select').eq(0).append(str);
                        })
                    })

                    $('div.type').on( 'change','select', function () {
                        var that = $(this);
                        var id = that.val();
                        console.log(id);
                        that.nextAll('select').remove();
                        $.get(                      //获取下一级类别
                            '/admin/data2/goodstype',
                            {pid: id},
                            function (data) {
                                console.log(data);
                                if(data.length>0){      //只有下一级类别有值才执行，
                                    var str = '<select name="type_id">';
                                    str += '<option value="-1">--请选择--</option>'
                                    for (var i = 0; i<data.length; i++) {
                                        str += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                    }
                                    str += '</select>';
                                    //在当前点击的select标签后面加str
                                    that.after(str);                                    
                                }
                            },
                            'json'
                        );

                        //这个AJAX获取选择商品类别的属性
                        if($('select:eq(1)').val() == id){
                            $.get( '/admin/data/attribute', {type_id: id}, function (data) {    
                                var str = '';
                                for (var i = 0; i<data.length; i++) {
                                    str += `<div class="form-group">
                                                <label class="attr col-sm-3 control-label no-padding-right" for="form-field-1">`+data[i].attr_name+`</label>
                                                <div class="col-sm-9">`
                                    //将属性可选值(字串)变成数组（用','分割）            
                                    var array = data[i].attr_value.split(",");          
                                                    for(var j = 0; j<array.length; j++) {
                                                        str += `<input name="`+data[i].attr_price+`"  type="radio" value=`+array[j]+`>`+array[j];
                                                    }
                                    str += `    </div>                       
                                            </div>`
                                }
                                $('.attr').html(str);
                                console.log(data);
                            })                            
                        }

                        


                    })
                    // vat aa = $('select:eq(1)');
                    // $('div.type').on( 'change',aa, function () {console.log('aa')})
                </script>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    @endsection

