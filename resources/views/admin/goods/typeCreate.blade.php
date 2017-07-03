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
	<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
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

                <form class="form-horizontal" role="form"  action='/goodstype'  method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 类别名 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" name="name"/>
                            {{ csrf_field() }}

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">父类名</label>
                        <div class="col-sm-9">
	                        <select class="col-xs-10 col-sm-5" id="form-field-select-1" name="pid">
	                            <option value="0" data="0,">顶级类别</option>
	                            @if(!empty($data))
	                            @foreach($data as $v)
	                            <option value="{{$v['id']}}" data="{{$v['path']}}">
                                    <?php
                                        $m = substr_count($v['path'],",")-1;
                                        $nbsp = str_repeat("-->",$m);
                                        echo $nbsp.$v['name'];
                                    ?>
	                            </option>	
	                            @endforeach
	                            @endif
	                        </select>
							<input type="hidden" name="path" value="0," class="path">
							<script type="text/javascript">
								$('.col-sm-9').on('change','select',function () {
                                    var data = $(this).find("option:selected").attr('data');
                                    console.log(data);
									var num = $(this).val();
									if(num!='0'){
										var path = data + num + ',';
										$('.path').val(path);
                                        console.log(path);
									} else {
										$('.path').val('0,');
									}
								})
							</script>	                       
                        </div>
                    </div>   
                    @if(!empty($success))
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            {{$success}}
                        </div>
                    </div>   
                    @endif              
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

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    @endsection

