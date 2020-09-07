<?php /*a:3:{s:89:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\authority_allocation\index.html";i:1599470594;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo config('mall.default_charset'); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="/static/admin/images/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1" />
	<title>后台信息</title>
	
	<link rel="stylesheet" href="/static/admin/lib/layui/css/layui.css" />
	<!-- <link rel="stylesheet" href="/static/admin/lib/layui/css/formSelects-v4.css" /> -->
	<!-- <link rel="stylesheet" href="/static/admin/common/fonts/iconfont.css" /> -->
	<!-- <link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" /> -->
	<link rel="stylesheet" href="/static/admin/common/css/reset.css" />
	<!-- <link rel="stylesheet" href="/static/admin/css/[my_css].css" /> -->


<link rel="stylesheet" href="/static/admin/css/system_setting/backstage_configure.css" />
<link rel="stylesheet" href="/static/admin/css/authority_control/authority_allocation.css" />
</head>
<body>

	<!-- 搜索和新增 -->
	<div class="top">
		<div></div>
		<button type="button" class="layui-btn found"><i class="layui-icon">&#xe608;</i> 新增</button>
	</div>

	<div class="layui-collapse" lay-accordion>
		<div class="layui-colla-item">
			<h2 class="layui-colla-title">杜甫</h2>
			<div class="layui-colla-content">内容区域</div>
		</div>
		<div class="layui-colla-item">
			<h2 class="layui-colla-title">李清照</h2>
			<div class="layui-colla-content">内容区域</div>
		</div>
		<div class="layui-colla-item">
			<h2 class="layui-colla-title">鲁迅</h2>
			<div class="layui-colla-content">内容区域</div>
		</div>
	</div>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/authority_control/authority_allocation.js"></script>
</body>
</html>