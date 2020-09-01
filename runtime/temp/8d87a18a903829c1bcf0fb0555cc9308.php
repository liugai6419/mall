<?php /*a:3:{s:65:"D:\phpstudy\WWW\mall\tp51\application\admin\view\login\index.html";i:1590327037;s:67:"D:\phpstudy\WWW\mall\tp51\application\admin\view\public\header.html";i:1591024403;s:67:"D:\phpstudy\WWW\mall\tp51\application\admin\view\public\footer.html";i:1590850212;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo config('mall.default_charset'); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="/static/admin/images/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1" />
	<title>用户登录</title>
	
	<link rel="stylesheet" href="/static/admin/lib/layui/css/layui.css" />
	<link rel="stylesheet" href="/static/admin/common/fonts/iconfont.css" />
	<link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" />
	<link rel="stylesheet" href="/static/admin/common/css/reset.css" />
	<link rel="stylesheet" href="/static/admin/common/css/style.css" />
	<link rel="stylesheet" href="/static/admin/css/login.css" />
</head>
<body>

	<div class="container layui-bg-blue">
		<div class="inner">
			<div class="title">ShopOX</div>
			<div class="login-panel">
				<form class="layui-form" action="">
					<div class="layui-form-item">
					    <div class="layui-input-block">
					      <input type="text" name="username" placeholder="请输入用户名称" autocomplete="on" class="layui-input username">
					    </div>
				  	</div>
				  	<div class="layui-form-item">
					    <div class="layui-input-block">
					      <input type="password" name="password" placeholder="请输入密码" autocomplete="on" class="layui-input password">
					    </div>
				  	</div>
				  	<div class="layui-form-item">
					    <div class="layui-input-block">
					    	<button class="layui-btn" lay-submit lay-filter="login">立即登录</button>
					    </div>
				  	</div>
				</form>
				<div class="forget-password-container">
					<div class="forget-password">忘记密码?</div>
					<div class="forget-password-tip">
						请联系管理员重置密码
					</div>
				</div>
			</div>
		</div>
	</div>


		<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<script src="/static/admin/lib/echarts.js"></script>
		<script src="/static/admin/js/login.js"></script>
	</body>
</html>