<?php /*a:3:{s:80:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\role_manage\index.html";i:1599726585;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/authority_control/role_manage.css" />
</head>
<body>

	<!-- 搜索和新增 -->
	<div class="top">
		<div></div>
		<button type="button" class="layui-btn found"><i class="layui-icon">&#xe608;</i> 新增</button>
	</div>

	<table id="demo" lay-filter="test"></table>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<!-- <script src="/static/admin/js/authority_control/role_manage.js"></script> -->
<script>
    layui.use('table', function(){
        var table = layui.table;

		//第一个实例
		table.render({
			elem: '#demo',
			height: 312,
			url:"<?php echo url('/admin/role_manage/returnLayui'); ?>",
			id:'tryReload',
			parseData:function(res){
				return{
					"code":0,
					"msg":"",
					"count":8,
					data:res
				}
			},
			cols: [[
				{title: '序号', type: 'numbers', rowspan: 2},
				{type: 'checkbox', LAY_CHECKED: true, hide: true},
				{field: 'role_delimiter', title: '角色名称'},
				{field: 'create_time', title: '创建时间'}

			]]
		});
    });
</script>
</body>
</html>