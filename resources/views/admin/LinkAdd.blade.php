@extends('admin.layouts.app')

@section('content')

<div class="page-content">
	<div class="page-header">
		<h1>
			Form Elements
			<small>
				<i class="icon-double-angle-right"></i>
				Common form elements and layouts
			</small>
		</h1>
	</div><!-- /.page-header -->
	@if(count($errors)>0)
		<div class="alert alert-danger">
			@if(is_object($errors))
				@foreach($errors->all() as $error)
					<p>{{$error}}</p>
				@endforeach
			@else
				<p>{{$errors}}</p>
			@endif
		</div>
	@endif
	<div class="row">

		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="hr hr-24"></div>

			<form class="form-horizontal" role="form" action="{{url('admin/link')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接标签名 </label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name="name"/>
					</div>
				</div>

				<div class="space-4"></div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> URL </label>

					<div class="col-sm-9">
						<input type="url" id="form-field-2"  class="col-xs-10 col-sm-5" name="url"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 排序号 </label>

					<div class="col-sm-2">
						<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5"  name="sort_num"/>
					</div>
				</div>

				<div class="space-4"></div>







				<div class="row ">
						<div class="control-group ">
							<label class="control-label bolder  col-sm-3">链接状态</label>
							<div class="radio col-sm-2">
								<label>
									<input name="status" type="radio" class="ace col-sm-5" checked value="1"/>
									<span class="lbl"> 显示</span>
								</label>
							</div>

							<div class="radio ">
								<label>
									<input name="status" type="radio" class="ace" value="0"/>
									<span class="lbl"> 隐藏</span>
								</label>
							</div>
						</div>

				</div><!-- /row -->



				{{--<div class="form-group">
					<label class="control-label col-xs-12 col-sm-3">链接状态</label>
					<div class="controls col-xs-12 col-sm-9">
						<div class="row">
							<div class="col-xs-3">
								<label>
									<input name="switch-field-1" class="ace ace-switch ace-switch-7" type="checkbox" id="switch"/>
									<span class="lbl"></span>
								</label>
							</div>
						</div>
					</div>
				</div>--}}
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button class="btn btn-info" type="sumbit">
							<i class="icon-ok bigger-110"></i>
							Submit
						</button>

						&nbsp; &nbsp; &nbsp;
						<button class="btn" type="reset">
							<i class="icon-undo bigger-110"></i>
							Reset
						</button>
					</div>
				</div>

				<div class="hr hr-24"></div>








			</form>





		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
</div>




{{--
<script type="text/javascript">
    jQuery(function($) {
		var flag = 'off';
		$('#switch').on('click', function(){
		    switch(flag){
				case 'off':flag = 'on';
				alert('状态由off变成on');
				break;
                case 'on':flag = 'off';
                    alert('状态由on变成off');
                    break;
			}
		});

    });
</script>
--}}





@endsection