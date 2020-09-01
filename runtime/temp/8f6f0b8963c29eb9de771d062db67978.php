<?php /*a:4:{s:82:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\email_setting\index.html";i:1597585101;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:90:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\email_setting\email_setting.html";i:1597587281;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/site_configure/email_setting.css" />
</head>
<body>

	<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
		<ul class="layui-tab-title">
			<a href="/admin/email_setting/index?tab=1"><li class="<?php echo $tab==1 ? 'layui-this'  :  ''; ?>">邮箱设置</li></a>
			<a href="/admin/email_setting/index?tab=2"><li class="<?php echo $tab==2 ? 'layui-this'  :  ''; ?>">邮箱模板</li></a>
		</ul>
		<div class="layui-tab-content">
			<div class="layui-tab-item layui-show">
				<?php switch($tab): case "1": ?>
						
<form class="layui-form layui-form-pane" action="">

	<div class="layui-form-item">
		<label class="layui-form-label">SMTP服务器</label>
		<div class="layui-input-inline">
			<input type="text" name="smtp_server" value="" placeholder="请填SMTP服务器" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">设置SMTP服务器的地址，如 smtp.163.com</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">SMTP端口</label>
		<div class="layui-input-inline">
			<input type="number" name="smtp_port" value="" placeholder="请填SMTP端口" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">设置SMTP服务器的端口，默认为 25</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">发信人邮件地址</label>
		<div class="layui-input-inline">
			<input type="email" name="sender_email_address" value="" placeholder="请填发信人邮件地址" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">使用SMTP协议发送的邮件地址，如 shopxo@163.com</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">SMTP身份验证用户名</label>
		<div class="layui-input-inline">
			<input type="text" name="smtp_proving_username" value="" placeholder="请填SMTP身份验证用户名" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">如 ShopXO</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">SMTP身份验证密码</label>
		<div class="layui-input-inline">
			<input type="password" name="smtp_proving_password" value="" placeholder="请填SMTP身份验证密码" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">shopxo@163.com邮件的密码</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">SSL方式加密</label>
		<div class="layui-input-inline">
			<select name="ssl_encrypt_way" lay-verify="required" lay-search>
				<option value="1" >关闭</option>
				<option value="2" >开启</option>
			</select>
		</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">发件人显示名称</label>
		<div class="layui-input-inline">
			<input type="text" name="sender_show_name" value="" placeholder="请填发件人显示名称" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">如 ShopXO</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">测试接收的邮件地址</label>
		<div class="layui-input-inline receive_email_address">
			<input type="email" name="receive_email_address" value="" placeholder="请填测试接收的邮件地址" autocomplete="off" class="layui-input">
			<button type="button">测试</button>
		</div>
		<div class="layui-form-mid layui-word-aux">请先保存配置后，再进行测试</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="emailSetting">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; case "2": ?>
						<?php echo htmlentities($tab); break; ?>
				<?php endswitch; ?>
			</div>
		</div>
	</div>

		<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


<?php switch($tab): case "1": ?>
		<script src="/static/admin/js/site_configure/email_setting/email_setting.js"></script>
	<?php break; case "2": ?>
		<!-- <script src="/static/admin/js/site_configure/sms_setting/message_template.js"></script> -->
	<?php break; ?>
<?php endswitch; ?>
</body>
</html>