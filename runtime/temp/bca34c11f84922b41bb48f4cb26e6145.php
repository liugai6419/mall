<?php /*a:3:{s:79:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\goods_list\index.html";i:1603075060;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/goods_manage/goods_list.css" />
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

		<button typSe="button" class="layui-btn found"><i class="layui-icon">&#xe608;</i> 新增</button>
	</div>

	<!-- 数据表格 -->
	<table>
		<thead>
			<tr>
				<th style="width:60px">序列</th>
				<th style="width:380px">标题名称</th>
				<th style="width:150px">销售价格(元)</th>
				<th style="width:120px">上下架</th>
				<th style="width:120px">首页推荐</th>
				<th style="width:150px">库存数量</th>
				<th style="width:200px">商品型号</th>
				<th style="width:150px">品牌</th>
				<th style="width:200px">操作</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>1</td>
				<td class="base-msg">
					<img src="/static/admin/images/default-figure.jpg">
					<div>纽芝兰包包女士2018新款潮百搭韩版时尚单肩斜挎包少女小挎包链条</div>
				</td>
				<td>
					<ul>
						<li>售价: 160.00-258.00</li>
						<li>原价: 160.00-258.00</li>
					</ul>
				</td>
				<td><span class="start">上架</span></td>
				<td><span class="stop">推荐</span></td>
				<td>36665977件</td>
				<td>iPhone 6 Plus</td>
				<td>强生</td>
				<td>
					<button type="button" data-id="" class="layui-btn layui-btn-xs preview">查看</button>
					<button type="button" data-id="" class="layui-btn layui-btn-xs edit">编辑</button>
					<button type="button" data-id="" class="layui-btn layui-btn-xs layui-btn-danger delete">删除</button>
					
				</td>
			</tr>

			<tr>
				<td>2</td>
				<td class="base-msg">
					<img src="/static/admin/images/default-figure.jpg">
					<div>纽芝兰包包女士2018新款潮百搭韩版时尚单肩斜挎包少女小挎包链条</div>
				</td>
				<td>
					<ul>
						<li>售价: 160.00-258.00</li>
						<li>原价: 160.00-258.00</li>
					</ul>
				</td>
				<td><span class="start">下架</span></td>
				<td><span class="stop">不推</span></td>
				<td>36665977件</td>
				<td>iPhone 6 Plus</td>
				<td>强生</td>
				<td>
					<button type="button" data-id="" class="layui-btn layui-btn-xs preview">查看</button>
					<button type="button" data-id="" class="layui-btn layui-btn-xs edit">编辑</button>
					<button type="button" data-id="" class="layui-btn layui-btn-xs layui-btn-danger delete">删除</button>
					
				</td>
			</tr>
		</tbody>

		<tfoot>
			<tr>
				<td colspan="8">
					
				</td>
			</tr>
		</tfoot>
	</table>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/goods_manage/goods_list.js"></script>

</body>
</html>