<?php /*a:3:{s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\product\index.html";i:1594041433;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1593788018;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1593828258;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo config('mall.default_charset'); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="/static/admin/images/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1" />
	<title>后台信息</title>
	
	<link rel="stylesheet" href="/static/admin/lib/layui/css/layui.css" />
	<link rel="stylesheet" href="/static/admin/common/fonts/iconfont.css" />
	<link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" />
	<link rel="stylesheet" href="/static/admin/common/css/reset.css" />
	<link rel="stylesheet" href="/static/admin/common/css/style.css" />
	<link rel="stylesheet" href="/static/admin/css/config.css" />

<link rel="stylesheet" href="/static/admin/css/shop_msg.css" />
</head>
<body>

<form class="layui-form layui-form-pane" enctype="multipart/form-data" action="">

	<div class="layui-upload">
		<button type="button" class="layui-btn" id="test1">上传图片</button>
		<div class="layui-upload-list">
			<img class="layui-upload-img" id="demo1">
			<p id="demoText"></p>
		</div>
	</div>
	
	<div class="layui-upload-drag" id="test10">
		<i class="layui-icon"></i>
		<p>点击上传，或将文件拖拽到此处</p>
		<div class="layui-hide" id="uploadDemoView">
		    <hr>
			<img src="" alt="上传成功后渲染" style="max-width: 196px">
		</div>
	</div>
</form>

		<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<script src="/static/admin/lib/echarts.js"></script>
		<script src="/static/admin/js/product.js"></script>

</body>
</html>