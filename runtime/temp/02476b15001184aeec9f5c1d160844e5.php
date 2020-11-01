<?php /*a:3:{s:83:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\goods_classify\index.html";i:1603791125;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/goods_manage/goods_classify.css" />
</head>
<body>

	<!-- 搜索和新增 -->
	<div class="top">
		<div></div>
		<button type="button" class="layui-btn add" classify="1" data-userId="0"><i class="layui-icon">&#xe608;</i> 新增一级分类</button>
	</div>

	<div class="layui-collapse" lay-accordion>
		<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$first): $mod = ($i % 2 );++$i;?>
		<div class="layui-colla-item">
			<h2 class="layui-colla-title">
				<span>
					<?php if($first['small_icon'] != ""): ?>
					<img class="classify-img" src="<?php echo htmlentities($first['small_icon']); ?>">
					<?php endif; ?>

					<?php echo htmlentities($first['name']); ?>
				</span>
				<span class="icon">
					<span class="add" classify="2" data-userId="<?php echo htmlentities($first['id']); ?>"><i class="iconfont iconadd"></i>新增子级</span>
					<span class="edit" data-userId="<?php echo htmlentities($first['user_id']); ?>" data-id="<?php echo htmlentities($first['id']); ?>"><i class="iconfont iconedit2"></i>编辑</span>
					<span class="del" classify="1" data-id="<?php echo htmlentities($first['id']); ?>"><i class="iconfont icondelete"></i>删除</span>
				</span>
			</h2>
			<div class="layui-colla-content second-title">
				<div class="layui-collapse" lay-accordion>
					<?php if(is_array($first['second']) || $first['second'] instanceof \think\Collection || $first['second'] instanceof \think\Paginator): $i = 0; $__LIST__ = $first['second'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$second): $mod = ($i % 2 );++$i;?>
					<div class="layui-colla-item">
						<h2 class="layui-colla-title">
							<span>
								<?php if($second['small_icon'] != ""): ?>
								<img class="classify-img" src="<?php echo htmlentities($second['small_icon']); ?>">
								<?php endif; ?>
								
								<?php echo htmlentities($second['name']); ?>
							</span>
							<span class="icon">
								<span class="add" classify="3" data-userId="<?php echo htmlentities($second['id']); ?>"><i class="iconfont iconadd"></i>新增子级</span>
								<span class="edit" data-userId="<?php echo htmlentities($second['user_id']); ?>" data-id="<?php echo htmlentities($second['id']); ?>"><i class="iconfont iconedit2"></i>编辑</span>
								<span class="del" classify="2" data-id="<?php echo htmlentities($second['id']); ?>"><i class="iconfont icondelete"></i>删除</span>
							</span>
						</h2>
						<div class="layui-colla-content">
							<ul>
								<?php if(is_array($second['third']) || $second['third'] instanceof \think\Collection || $second['third'] instanceof \think\Paginator): $i = 0; $__LIST__ = $second['third'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$third): $mod = ($i % 2 );++$i;?>
								<li>
									<span>
										<?php if($third['small_icon'] != ""): ?>
										<img class="classify-img" src="<?php echo htmlentities($third['small_icon']); ?>">
										<?php endif; ?>
										
										<?php echo htmlentities($third['name']); ?>
									</span>
									<span class="icon">
										<span class="edit" data-userId="<?php echo htmlentities($third['user_id']); ?>" data-id="<?php echo htmlentities($third['id']); ?>"><i class="iconfont iconedit2"></i>编辑</span>
										<span class="del" classify="3" data-id="<?php echo htmlentities($third['id']); ?>"><i class="iconfont icondelete"></i>删除</span>
									</span>
								</li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/goods_manage/goods_classify.js"></script>
</body>
</html>