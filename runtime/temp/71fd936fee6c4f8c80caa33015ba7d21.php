<?php /*a:3:{s:81:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\goods_list\preview.html";i:1613142085;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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


<link rel="stylesheet" href="/static/admin/css/goods_manage/goods_list.css" />
</head>
<body>
	<div class="layer-container">
		<ul>
			<li>标题名称</li>
			<li><?php echo htmlentities($results['name']); ?></li>
		</ul>
		<ul>
			<li>商品简述</li>
			<li><?php echo htmlentities($results['summary']); ?></li>
		</ul>
		<ul>
			<li>销售价格</li>
			<li>
				<?php if($results['min_price'] == $results['max_price'] || $results['min_price'] == 0): ?>
					售价: <?php echo htmlentities($results['max_price']); else: ?>
					售价: <?php echo htmlentities($results['min_price']); ?>-<?php echo htmlentities($results['max_price']); ?>
				<?php endif; if($results['max_origin_coset'] == 0): elseif($results['min_origin_coset'] == $results['max_origin_coset'] || $results['min_origin_coset'] == 0): ?>
					—— 原价: <?php echo htmlentities($results['max_origin_coset']); else: ?>
					—— 原价: <?php echo htmlentities($results['min_origin_coset']); ?>-<?php echo htmlentities($results['max_origin_coset']); ?>
				<?php endif; ?>
			</li>
		</ul>
		<ul>
			<li>上下架</li>
			<li><?php echo $results['is_sell']==1 ? '上架'  :  '下架'; ?></li>
		</ul>
		<ul>
			<li>库存数量</li>
			<li><?php echo htmlentities($results['inventory_total']); ?><?php echo htmlentities($results['repertory_unit']); ?></li>
		</ul>
		<ul>
			<li>最低起购量</li>
			<li><?php echo htmlentities($results['min_buy_num']); ?><?php echo htmlentities($results['repertory_unit']); ?></li>
		</ul>
		<ul>
			<li>单次最大购买量</li>
			<li>
				<?php if($results['max_buy_num'] == ""): ?>
					<span class="fill-out">不限</span>
				<?php else: ?>
					<?php echo htmlentities($results['max_buy_num']); ?><?php echo htmlentities($results['repertory_unit']); ?>
				<?php endif; ?>
			</li>
		</ul>
		<ul>
			<li>商品型号</li>
			<li><?php echo htmlentities($results['model']); ?></li>
		</ul>
		<ul>
			<li>品牌</li>
			<li><?php echo htmlentities($results['brand']); ?></li>
		</ul>
		<ul>
			<li>生产地</li>
			<li><?php echo htmlentities($results['yieldly']); ?></li>
		</ul>
		<ul>
			<li>商品分类</li>
			<li><?php echo htmlentities($results['classify']); ?></li>
		</ul>
		<ul>
			<li>购买赠送积分</li>
			<li><?php echo htmlentities($results['point']); ?></li>
		</ul>
		<ul>
			<li>扣减库存</li>
			<li><?php echo $results['reduce_repertory']==1 ? '是'  :  '否'; ?></li>
		</ul>
		<ul>
			<li>访问次数</li>
			<li></li>
		</ul>
		<ul>
			<li>SEO标题</li>
			<li><?php echo htmlentities($results['seo_name']); ?></li>
		</ul>
		<ul>
			<li>SEO关键字</li>
			<li><?php echo htmlentities($results['seo_key']); ?></li>
		</ul>
		<ul>
			<li>SEO描述</li>
			<li><?php echo htmlentities($results['seo_describe']); ?></li>
		</ul>
		<ul>
			<li>注册时间</li>
			<li><?php echo date('Y-m-d H:i:s',$results['create_time']); ?></li>
		</ul>
		<ul>
			<li>更新时间</li>
			<li>
				<?php if($results['update_time'] == 0): ?>
					<span class="fill-out">未有更新</span>
				<?php else: ?>
					<?php echo date('Y-m-d H:i:s',$results['update_time']); ?>
				<?php endif; ?>
			</li>
		</ul>
		
	</div>
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<!-- <script src="/static/admin/js/authority_control/found_manager.js"></script> -->
</body>
</html>