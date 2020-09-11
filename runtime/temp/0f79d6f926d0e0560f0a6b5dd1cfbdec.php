<?php /*a:3:{s:80:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\role_manage\found.html";i:1599828529;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
			<?php if($results !=  null): ?>
			<input type="hidden" name="id" value="<?php echo htmlentities($results['id']); ?>">
			<?php endif; ?>

			<div class="layui-form-item">
				<label class="layui-form-label">角色名称</label>
				<div class="layui-input-inline">
					<input type="text" name="role_delimiter" value="<?php echo htmlentities($results['role_delimiter']); ?>" placeholder="角色名称2~6个字符" autocomplete="off" class="layui-input route-delimiter">
				</div>
			</div>

			<div class="layui-form-item">
		    	<label class="layui-form-label">是否启用</label>
				<div class="layui-input-inline">
					<select name="is_start" lay-verify="required" lay-search>
						<option value="1" <?php echo $results['is_start']==1 ? 'selected'  :  ''; ?>>关闭</option>
						<option value="2" <?php echo $results['is_start']==2 ? 'selected'  :  ''; ?>>开启</option>
					</select>
				</div>
			</div>

			<div class="layui-collapse">
				<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
				<div class="layui-colla-item">
					<h2 class="layui-colla-title"></h2>
					<span class="first-authority">
						<input class="first-input" type="checkbox" name="name<?php echo htmlentities($list['id']); ?>" value="<?php echo htmlentities($list['id']); ?>" <?php echo in_array($list['id'],$results['authority'] ? $results['authority'] : []) ? 'checked' : ''; ?> lay-ignore>
						<span><?php echo htmlentities($list['authority_name']); ?></span>
					</span>
					
					<div class="layui-colla-content layui-show">
						<div class="second-centent">
							<?php if(is_array($list['second_authority']) || $list['second_authority'] instanceof \think\Collection || $list['second_authority'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['second_authority'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<span class="second-authority <?php echo $vo['is_show']==1 ? 'green'  :  'yellow'; ?>">
								<input class="second-input" type="checkbox" name="name<?php echo htmlentities($vo['id']); ?>" value="<?php echo htmlentities($vo['id']); ?>" <?php echo in_array($vo['id'],$results['authority'] ? $results['authority'] : []) ? 'checked' : ''; ?> lay-ignore>
								<span><?php echo htmlentities($vo['authority_name']); ?></span>
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