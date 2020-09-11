<?php /*a:3:{s:80:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\role_manage\index.html";i:1599828529;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
		<button type="button" class="layui-btn found"><i class="layui-icon">&#xe608;</i>新增</button>
	</div>

	<table>
		<thead>
			<tr>
				<th>序列</th>
				<th>角色名称</th>
				<th>角色</th>
				<th>创建时间</th>
				<th>操作</th>
			</tr>
		</thead>

		<tbody>
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr>
				<td><?php echo htmlentities($num++); ?></td>
				<td><?php echo htmlentities($vo['role_delimiter']); ?></td>
				<td><span class="<?php echo $vo['is_start']==2 ? 'start'  :  'stop'; ?>"><?php echo $vo['role_delimiter']==2 ? '启用'  :  '停用'; ?></span></td>
				<td><?php echo date('Y-m-d H:i:s',$vo['create_time']); ?></td>
				<td>
					<button type="button" data-id="<?php echo htmlentities($vo['id']); ?>" class="layui-btn layui-btn-xs edit">编辑</button>
					<button type="button" data-id="<?php echo htmlentities($vo['id']); ?>" class="layui-btn layui-btn-xs layui-btn-danger delete">删除</button>
				</td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $page; ?>
				</td>
			</tr>
		</tfoot>
	</table>

	<!-- <table class="layui-table" id="demo"></table> -->
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/authority_control/role_manage.js"></script>
<!-- <script>
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
				{title: '序号', type: 'numbers'},
				{field: 'id', title: 'id', hide: true},
				{field: 'role_delimiter', title: '角色名称'},
				{title: '状态', toolbar: '#status'},
				{field: 'create_time', title: '创建时间'},
				{title: '操作', toolbar: '#operation'}
			]]
		});
    });
</script>

<script type="text/html" id="operation">
	<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
	<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>

<script type="text/html" id="status">
	<span class="stop">启用</span>
</script> -->

</body>
</html>