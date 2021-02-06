<?php /*a:3:{s:83:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\brand_classify\index.html";i:1604216266;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
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


<link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" />
<link rel="stylesheet" href="/static/admin/css/brand_manage/brand_classify.css" />
</head>
<body>

	<!-- 搜索和新增 -->
	<div class="top">
		<div></div>

		<button typSe="button" class="layui-btn add"><i class="layui-icon">&#xe608;</i> 新增</button>
	</div>

	<!-- 数据表格 -->
	<table>
		<thead>
			<tr>
				<th style="width:5%">序列</th>
				<th style="width:40%">品牌名称</th>
				<th style="width:40%">状态</th>
				<th style="width:15%">操作</th>
			</tr>
		</thead>

		<tbody>
			<?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
			<tr>
				<td><?php echo htmlentities($num++); ?></td>
				<td><?php echo htmlentities($data['name']); ?></td>
				<td><span class="<?php echo $data['is_start']==1 ? 'start'  :  'stop'; ?>"><?php echo $data['is_start']==1 ? '启用'  :  '停用'; ?></span></td>
				<td>
					<button type="button" data-id="<?php echo htmlentities($data['id']); ?>" class="layui-btn layui-btn-xs edit">编辑</button>
					<button type="button" data-id="<?php echo htmlentities($data['id']); ?>" class="layui-btn layui-btn-xs layui-btn-danger del">删除</button>
				</td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

		<tfoot>
			<tr>
				<td colspan="8">
					<?php echo $page; ?>
				</td>
			</tr>
		</tfoot>
	</table>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/brand_manage/brand_classify.js"></script>

</body>
</html>