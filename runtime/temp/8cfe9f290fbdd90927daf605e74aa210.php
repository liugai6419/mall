<?php /*a:3:{s:89:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\authority_allocation\index.html";i:1599555684;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" />
<link rel="stylesheet" href="/static/admin/css/authority_control/authority_allocation.css" />
</head>
<body>

	<!-- 搜索和新增 -->
	<div class="top">
		<div></div>
		<button type="button" class="layui-btn found"><i class="layui-icon">&#xe608;</i> 新增</button>
	</div>

	<div class="layui-collapse" lay-accordion>
		<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
		<div class="layui-colla-item">
			<h2 class="layui-colla-title"><?php echo htmlentities($list['authority_name']); ?><i class="iconfont iconedit" data-id="<?php echo htmlentities($list['id']); ?>"></i></h2>
			<div class="layui-colla-content">
				<div class="second-centent">
					<?php if(is_array($list['second_authority']) || $list['second_authority'] instanceof \think\Collection || $list['second_authority'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['second_authority'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<span class="second-authority <?php echo $vo['is_show']==1 ? 'green'  :  'yellow'; ?>">
						<?php echo htmlentities($vo['authority_name']); ?>
						<span><i class="iconfont iconedit" data-id="<?php echo htmlentities($vo['id']); ?>"></i><i class="iconfont icondelete" data-id="<?php echo htmlentities($vo['id']); ?>"></i></span>
					</span>
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


	<script src="/static/admin/js/authority_control/authority_allocation.js"></script>
</body>
</html>