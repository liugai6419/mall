<?php /*a:3:{s:79:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\goods_list\index.html";i:1613141509;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
		<form class="layui-form" action="/admin/goods_list/search" method="get">
			<div class="layui-form-item">
				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<input type="text" name="nm" placeholder="名称/型号" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<select name="is_sell">
							<option value="">上下架</option>
							<option value="1">已上架</option>
							<option value="2">已下架</option>
						</select>
					</div>
				</div>

				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<select name="is_recommend">
							<option value="">首页推荐</option>
							<option value="1">推荐</option>
							<option value="2">默认</option>
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
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr>
				<td><?php echo htmlentities($num++); ?></td>
				<td class="base-msg">
					<img src="<?php echo htmlentities($vo['home_img']); ?>">
					<div><?php echo htmlentities($vo['name']); ?></div>
				</td>
				<td>
					<ul>
						<li>
							<?php if($vo['min_price'] == $vo['max_price'] || $vo['min_price'] == 0): ?>
								售价: <?php echo htmlentities($vo['max_price']); else: ?>
								售价: <?php echo htmlentities($vo['min_price']); ?>-<?php echo htmlentities($vo['max_price']); ?>
							<?php endif; ?>
						</li>
						<li>
							<?php if($vo['max_origin_coset'] == 0): elseif($vo['min_origin_coset'] == $vo['max_origin_coset'] || $vo['min_origin_coset'] == 0): ?>
								原价: <?php echo htmlentities($vo['max_origin_coset']); else: ?>
								原价: <?php echo htmlentities($vo['min_origin_coset']); ?>-<?php echo htmlentities($vo['max_origin_coset']); ?>
							<?php endif; ?>
						</li>
					</ul>
				</td>
				<td><span class="<?php echo $vo['is_sell']==1 ? 'start'  :  'stop'; ?>"><?php echo $vo['is_sell']==1 ? '上架'  :  '下架'; ?></span></td>
				<td><span class="<?php echo $vo['is_recommend']==1 ? 'start'  :  'normal'; ?>"><?php echo $vo['is_recommend']==1 ? '推荐'  :  '默认'; ?></span></td>
				<td><?php echo htmlentities($vo['inventory_total']); ?><?php echo htmlentities($vo['repertory_unit']); ?></td>
				<?php if($vo['model'] == ""): ?>
					<td class="no-has">没填写</td>
				<?php else: ?>
					<td><?php echo htmlentities($vo['model']); ?></td>
				<?php endif; if($vo['brand'] == ""): ?>
					<td class="no-has">没填写</td>
				<?php else: ?>
					<td><?php echo htmlentities($vo['brand']); ?></td>
				<?php endif; ?>
				<td>
					<button type="button" data-id="<?php echo htmlentities($vo['id']); ?>" class="layui-btn layui-btn-xs preview">查看</button>
					<button type="button" data-id="" class="layui-btn layui-btn-xs edit">编辑</button>
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


	<script src="/static/admin/js/goods_manage/goods_list.js"></script>

</body>
</html>