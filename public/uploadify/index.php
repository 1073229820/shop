<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>

<body>
	<h1>Uploadify Demo</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>

	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'buttonText' : '上传',
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'_token'     : "{{csrf_token()}}"
				},
				'swf'      : 'uploadify.swf',
				'uploader' : "{{url('admin/upload')}}",//上传的路径
				//指定swf文件
                // 'swf': 'js/uploadify/uploadify.swf',
                //后台处理的页面
                // 'uploader': 'UploadHandler.ashx',
                //按钮显示的文字
                // 'buttonText': '上传图片',
                //显示的高度和宽度，默认 height 30；width 120
                //'height': 15,
                //'width': 80,
                //上传文件的类型  默认为所有文件    'All Files'  ;  '*.*'
                //在浏览窗口底部的文件类型下拉菜单中显示的文本
                // 'fileTypeDesc': 'Image Files',
                //允许上传的文件后缀
                // 'fileTypeExts': '*.gif; *.jpg; *.png',
                //发送给后台的其他参数通过formData指定
                //'formData': { 'someKey': 'someValue', 'someOtherKey': 1 },
                //上传文件页面中，你想要用来作为文件队列的元素的id, 默认为false  自动生成,  不带#
                //'queueID': 'fileQueue',
                //选择文件后自动上传
                // 'auto': true,
                //设置为true将允许多文件上传
                // 'multi': true
			});
		});
	</script>
</body>
</html>