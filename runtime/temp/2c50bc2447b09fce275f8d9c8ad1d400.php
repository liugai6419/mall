<?php /*a:5:{s:80:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\sms_setting\index.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:86:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\sms_setting\sms_setting.html";i:1599108235;s:91:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\sms_setting\message_template.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/system_setting/backstage_configure.css" />
<link rel="stylesheet" href="/static/admin/css/site_configure/sms_setting.css" />
</head>
<body>

	<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
		<ul class="layui-tab-title">
			<a href="/admin/sms_setting/index?tab=1"><li class="<?php echo $tab==1 ? 'layui-this'  :  ''; ?>">短信设置</li></a>
			<a href="/admin/sms_setting/index?tab=2"><li class="<?php echo $tab==2 ? 'layui-this'  :  ''; ?>">消息模板</li></a>
		</ul>
		<div class="layui-tab-content">
			<div class="layui-tab-item layui-show">
				<?php switch($tab): case "1": ?>
						<div class="tip">阿里云短信管理地址 https://dysms.console.aliyun.com/dysms.html<i class="iconfont iconclose"></i></div>

<form class="layui-form layui-form-pane" action="">

	<div class="layui-form-item">
		<label class="layui-form-label">短信KeyID</label>
		<div class="layui-input-inline">
			<input type="text" name="sms_key_id" value="<?php echo htmlentities($data['sms_key_id']); ?>" placeholder="请填短信KeyID" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">Access Key ID</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">短信KeySecret</label>
		<div class="layui-input-inline">
			<input type="text" name="sms_key_secret" value="<?php echo htmlentities($data['sms_key_secret']); ?>" placeholder="请填短信KeySecret" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">Access Key Secret</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">短信签名</label>
		<div class="layui-input-inline">
			<input type="text" name="sms_sign" value="<?php echo htmlentities($data['sms_sign']); ?>" placeholder="请填短信签名" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">发送短信包含的签名</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="smsSetting">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; case "2": ?>
						<div class="tip">阿里云短信管理地址 https://dysms.console.aliyun.com/dysms.html<i class="iconfont iconclose"></i></div>

<form class="layui-form layui-form-pane" action="">

	<div class="layui-form-item">
		<label class="layui-form-label">通用-短信模板ID</label>
		<div class="layui-input-inline">
			<input type="text" name="currency_sms_id" value="<?php echo htmlentities($data['currency_sms_id']); ?>" placeholder="请填通用-短信模板ID" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">验证码code</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">用户注册-短信模板ID</label>
		<div class="layui-input-inline">
			<input type="text" name="user_register_sms_id" value="<?php echo htmlentities($data['user_register_sms_id']); ?>" placeholder="请填用户注册-短信模板ID" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">验证码code</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">密码找回-短信模板ID</label>
		<div class="layui-input-inline">
			<input type="text" name="password_find_sms_id" value="<?php echo htmlentities($data['password_find_sms_id']); ?>" placeholder="请填密码找回-短信模板ID" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">验证码code</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">手机号码绑定-短信模板ID</label>
		<div class="layui-input-inline">
			<input type="text" name="telephone_bind_sms_id" value="<?php echo htmlentities($data['telephone_bind_sms_id']); ?>" placeholder="请填手机号码绑定-短信模板ID" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">验证码code</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="messageTemplate">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; ?>
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
		<script src="/static/admin/js/site_configure/sms_setting/sms_setting.js"></script>
	<?php break; case "2": ?>
		<script src="/static/admin/js/site_configure/sms_setting/message_template.js"></script>
	<?php break; ?>
<?php endswitch; ?>
</body>
</html>