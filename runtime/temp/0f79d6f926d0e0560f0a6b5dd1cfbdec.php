<?php /*a:3:{s:80:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\role_manage\found.html";i:1599663352;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/authority_control/role_manage.css" />
</head>
<body>
	<div class="found-top">
		<div class="return-page"><i class="iconfont iconreturn"></i><span>返回</span></div>
		<div class="title">角色添加</div>
	</div>

	<div class="layer-container">
		<form class="layui-form layui-form-pane" action="">
			<!-- 角色id -->
			
			<!-- <input type="hidden" name="id" value=""> -->
			

			<div class="layui-form-item">
				<label class="layui-form-label">角色名称</label>
				<div class="layui-input-inline">
					<input type="text" name="route_delimiter" value="" placeholder="角色名称格式2~8个字符之间" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-collapse">
				<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
				<div class="layui-colla-item">
					<h2 class="layui-colla-title"></h2>
					<span class="first-authority">
						<input id="id<?php echo htmlentities($list['id']); ?>" type="checkbox" name="name<?php echo htmlentities($list['id']); ?>" value="<?php echo htmlentities($list['id']); ?>" lay-ignore>
						<label for="id<?php echo htmlentities($list['id']); ?>"><?php echo htmlentities($list['authority_name']); ?></label>
					</span>
					<!-- <input type="checkbox" name="" title="" lay-skin="primary" checked> -->
					
					<div class="layui-colla-content layui-show">
						<div class="second-centent">
							<?php if(is_array($list['second_authority']) || $list['second_authority'] instanceof \think\Collection || $list['second_authority'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['second_authority'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<span class="second-authority <?php echo $vo['is_show']==1 ? 'green'  :  'yellow'; ?>">
								<input id="id<?php echo htmlentities($vo['id']); ?>" type="checkbox" name="name<?php echo htmlentities($vo['id']); ?>" value="<?php echo htmlentities($vo['id']); ?>" lay-ignore>
								<label for="id<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['authority_name']); ?></label>
							</span>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn" lay-submit lay-filter="foundRole">保存</button>
				</div>
			</div>
		</form>
	</div>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/authority_control/found_role.js"></script>
</body>
</html>