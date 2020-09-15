<?php /*a:3:{s:88:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\manager_list\save_manager.html";i:1600069076;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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


<link rel="stylesheet" href="/static/admin/css/authority_control/manager_list.css" />
</head>
<body>
	<div class="layer-container">
		<form class="layui-form layui-form-pane" action="">
			<?php if($list !=  null): ?>
			<input type="hidden" name="id" value="<?php echo htmlentities($list['id']); ?>">
			<?php endif; ?>

			

			<div class="layui-form-item">
		    	<label class="layui-form-label">用户名</label>
				<div class="layui-input-inline">
					<input type="text" name="username" value="<?php echo htmlentities($list['username']); ?>" lay-verify="required" placeholder="请填用户名" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">登录密码</label>
				<div class="layui-input-inline">
					<input type="password" name="password" value="" lay-verify="<?php echo $list==null ? 'required'  :  ''; ?>" placeholder="<?php echo $list==null ? '请填登录密码'  :  '若不修改密码则不用填写'; ?>" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">手机号码</label>
				<div class="layui-input-inline">
					<input type="number" name="telephone" value="<?php echo htmlentities($list['telephone']); ?>" lay-verify="required|phone" placeholder="请填手机号码" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">权限组</label>
				<div class="layui-input-inline">
					<select name="authority_group" lay-verify="required" lay-search>
						<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo htmlentities($vo['id']); ?>" <?php echo $list['authority_group']==$vo['id'] ? 'selected'  :  ''; ?>><?php echo htmlentities($vo['role_delimiter']); ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>

			<div class="layui-form-item" pane>
				<label class="layui-form-label">性别</label>
				<div class="layui-input-inline">
					<input type="radio" name="sex" value="1" title="男性" <?php echo $list['sex']==1 ? 'checked'  :  ''; ?>>
					<input type="radio" name="sex" value="2" title="女性" <?php echo $list['sex']==2 ? 'checked'  :  ''; ?>>
					<input type="radio" name="sex" value="3" title="保密" <?php echo $list['sex']==3||$list['sex'] == '' ? 'checked'  :  ''; ?>>
				</div>
			</div>

			<div class="layui-form-item">
			    <div class="layui-input-block">
			    	<button class="layui-btn" lay-submit lay-filter="foundGroup">保存</button>
			    </div>
			</div>
		</form>
	</div>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/authority_control/found_manager.js"></script>
</body>
</html>