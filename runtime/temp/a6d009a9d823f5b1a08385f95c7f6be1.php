<?php /*a:3:{s:78:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\user_list\index.html";i:1603074974;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/user_manage/user_list.css" />
</head>
<body>

	<!-- 搜索和新增 -->
	<div class="top">
		<form class="layui-form" action="/admin/user_list/search" method="get">
			<div class="layui-form-item">
				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<input type="text" name="npen" placeholder="姓名/手机号/邮箱/昵称" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<select name="sex">
							<option value="">选择性别</option>
							<option value="1">男性</option>
							<option value="2">女性</option>
							<option value="3">保密</option>
						</select>
					</div>
				</div>

				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<select name="user_status">
							<option value="">选择状态</option>
							<option value="1">正常</option>
							<option value="2">待审核</option>
							<option value="3">禁止发言</option>
							<option value="4">禁止登录</option>
						</select>
					</div>
				</div>
	 
				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<input type="text" name="date" class="layui-input" id="date" placeholder="选择日期">
					</div>
				</div>

				 <div class="layui-inline">
					<div class="layui-input-inline" style="width: 66px;">
						<button class="layui-btn" lay-submit lay-filter="search">搜索</button>
					</div>
					<div class="layui-input-inline" style="width: 66px;">
						<button type="reset" class="layui-btn layui-btn-primary">清空</button>
					</div>
				</div>

			</div>
		</form>
		
		<span>
			<button type="button" class="layui-btn found"><i class="layui-icon">&#xe608;</i> 新增</button>
			<button type="button" class="layui-btn layui-bg-red import-excel"><i class="iconfont iconexcel"></i> 导出</button>
		</span>
	</div>

	<!-- 数据表格 -->
	<table>
		<thead>
			<tr>
				<th style="width:60px">序列</th>
				<th style="width:320px">基础信息</th>
				<th style="width:150px">积分</th>
				<th style="width:150px">性别</th>
				<th style="width:150px">状态</th>
				<th style="width:150px">生日</th>
				<th style="width:200px">操作</th>
			</tr>
		</thead>

		<tbody>
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr>
				<td><?php echo htmlentities($num++); ?></td>
				<td class="base-msg">
					<img src="/static/admin/images/default-figure.jpg">
					<ul>
						<li><span>姓名: </span><span><?php echo htmlentities($vo['username']); ?></span></li>
						<li><span>昵称: </span><span><?php echo htmlentities($vo['nickname']); ?></span></li>
						<li><span>手机: </span><span><?php echo htmlentities($vo['telephone']); ?></span></li>
						<li><span>邮箱: </span><span class="<?php echo $vo['email']=='' ? 'fill-out'  :  ''; ?>"><?php echo $vo['email']=="" ? '未填写'  : htmlentities($vo['email']); ?></span></li>
					</ul>
				</td>
				<td><?php echo htmlentities($vo['point']); ?></td>
				<td>
					<?php switch($vo['sex']): case "1": ?>男性<?php break; case "2": ?>女性<?php break; default: ?>保密
					<?php endswitch; ?>
				</td>
				<td>
					<?php switch($vo['user_status']): case "1": ?><span class="normal">正常</span><?php break; case "2": ?><span class="check">待审核</span><?php break; case "3": ?><span class="ban-speak">禁止发言</span><?php break; default: ?><span class="ban-login">禁止登录</span>
					<?php endswitch; ?>
				</td>
				<td>
					<?php if($vo['birthday'] == 0): ?>
						<span class="fill-out">未填写</span>
					<?php else: ?>
						<?php echo date('Y-m-d',$vo['birthday']); ?>
					<?php endif; ?>
				</td>
				<td>
					<button type="button" data-id="<?php echo htmlentities($vo['id']); ?>" class="layui-btn layui-btn-xs preview">查看</button>
					<button type="button" data-id="<?php echo htmlentities($vo['id']); ?>" class="layui-btn layui-btn-xs edit">编辑</button>
					<button type="button" data-id="<?php echo htmlentities($vo['id']); ?>" class="layui-btn layui-btn-xs layui-btn-danger delete">删除</button>
					
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


	<script src="/static/admin/js/user_manage/user_list.js"></script>

</body>
</html>