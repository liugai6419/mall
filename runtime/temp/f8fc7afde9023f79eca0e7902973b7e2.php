<?php /*a:3:{s:74:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\login\index.html";i:1600248539;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo config('mall.default_charset'); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="/static/admin/images/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1" />
	<title>用户登录</title>
	
	<link rel="stylesheet" href="/static/admin/lib/layui/css/layui.css" />
	<!-- <link rel="stylesheet" href="/static/admin/lib/layui/css/formSelects-v4.css" /> -->
	<!-- <link rel="stylesheet" href="/static/admin/common/fonts/iconfont.css" /> -->
	<!-- <link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" /> -->
	<link rel="stylesheet" href="/static/admin/common/css/reset.css" />
	<!-- <link rel="stylesheet" href="/static/admin/css/[my_css].css" /> -->

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
					      <input type="text" name="account" placeholder="请输入用户名或手机号" autocomplete="on" class="layui-input account">
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
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->

<script src="/static/admin/js/login.js"></script>
</body>
</html>