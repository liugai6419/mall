<?php /*a:3:{s:81:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\manager_list\index.html";i:1599834877;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/authority_control/manager_list.css" />
</head>
<body>

	<!-- 搜索和新增 -->
	<div class="top">
		<form class="layui-form" action="">
			<div class="layui-form-item">
				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 200px;">
						<input type="text" name="title" placeholder="用户名/手机" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 200px;">
						<select name="city">
							<option value="">选择权限</option>
							<option value="1">权限组</option>
							<option value="2">管理员</option>
							<option value="3">超级管理员</option>
						</select>
					</div>
				</div>

				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 200px;">
						<select name="city">
							<option value="">选择性别</option>
							<option value="1">保密</option>
							<option value="2">男性</option>
							<option value="3">女性</option>
						</select>
					</div>
				</div>
	 
				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 200px;">
						<input type="text" class="layui-input" id="date" placeholder="选择日期">
					</div>
				</div>

				 <div class="layui-inline">
					<div class="layui-input-inline" style="width: 66px;">
						<button class="layui-btn" lay-submit lay-filter="formDemo">搜索</button>
					</div>
					<div class="layui-input-inline" style="width: 66px;">
						<button type="reset" class="layui-btn layui-btn-primary">清空</button>
					</div>
				</div>

			</div>
		</form>

		<button type="button" class="layui-btn save-manager"><i class="layui-icon">&#xe608;</i> 新增</button>

	</div>

	<!-- 数据表格 -->
	<table>
		<thead>
			<tr>
				<th>序列</th>
				<th>管理员</th>
				<th>登录次数</th>
				<th>手机号码</th>
				<th>权限组</th>
				<th>上一次登录时间</th>
				<th>创建时间</th>
				<th>操作</th>
			</tr>
		</thead>

		<tbody>
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr>
				<td><?php echo htmlentities($num++); ?></td>
				<td><?php echo htmlentities($vo['username']); ?></td>
				<td><?php echo htmlentities($vo['login_total']); ?></td>
				<td><?php echo htmlentities($vo['telephone']); ?></td>
				<td><?php echo htmlentities($vo['authority_group']); ?></td>
				<td><?php if($vo['login_time'] == '0'): ?>0<?php else: ?><?php echo date('Y-m-d H:i:s',$vo['login_time']); ?><?php endif; ?></td>
				<td><?php echo date('Y-m-d H:i:s',$vo['create_time']); ?></td>
				<td>
					<button type="button" data-id="" class="layui-btn layui-btn-xs edit">编辑</button>
					<button type="button" data-id="" class="layui-btn layui-btn-xs layui-btn-danger delete">删除</button>
				</td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

		<tfoot>
			<tr>
				<td colspan="5">
					
				</td>
			</tr>
		</tfoot>
	</table>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/authority_control/manager_list.js"></script>
</body>
</html>