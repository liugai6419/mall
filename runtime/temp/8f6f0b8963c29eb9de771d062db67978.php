<?php /*a:5:{s:82:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\email_setting\index.html";i:1599393743;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:90:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\email_setting\email_setting.html";i:1599358582;s:93:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\email_setting\message_template.html";i:1599394470;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
			<input type="text" name="smtp_server" lay-verify="required" value="<?php echo htmlentities($data['smtp_server']); ?>" placeholder="请填SMTP服务器" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">设置SMTP服务器的地址，如: smtp.qq.com</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">SMTP端口</label>
		<div class="layui-input-inline">
			<input type="number" name="smtp_port" lay-verify="required|number" value="<?php echo htmlentities($data['smtp_port']); ?>" placeholder="请填SMTP端口" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">设置SMTP服务器的端口，默认为465</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">发信人邮件地址</label>
		<div class="layui-input-inline">
			<input type="email" name="sender_email_address" lay-verify="required|email" value="<?php echo htmlentities($data['sender_email_address']); ?>" placeholder="请填发信人邮件地址" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">使用SMTP协议发送的邮件地址，如: shopxo@qq.com</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">SMTP身份验证用户名</label>
		<div class="layui-input-inline">
			<input type="email" name="smtp_proving_username" lay-verify="required|email" value="<?php echo htmlentities($data['smtp_proving_username']); ?>" placeholder="请填SMTP身份验证用户名" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">如: shopxo@qq.com</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">SMTP身份验证授权码</label>
		<div class="layui-input-inline">
			<input type="password" name="smtp_proving_password" lay-verify="required" value="<?php echo htmlentities($data['smtp_proving_password']); ?>" placeholder="请填SMTP身份验证密码" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">shopxo@qq.com授权码</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">SSL方式加密</label>
		<div class="layui-input-inline">
			<select name="ssl_encrypt_way" lay-verify="required" lay-search>
				<option value="1" <?php echo $data['ssl_encrypt_way']==1 ? 'selected'  :  ''; ?>>关闭</option>
				<option value="2" <?php echo $data['ssl_encrypt_way']==2 ? 'selected'  :  ''; ?>>开启</option>
			</select>
		</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">发件人显示名称</label>
		<div class="layui-input-inline">
			<input type="text" name="sender_show_name" lay-verify="required" value="<?php echo htmlentities($data['sender_show_name']); ?>" placeholder="请填发件人显示名称" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">如 ShopXO</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">测试接收的邮件地址</label>
		<div class="layui-input-inline receive_email_address">
			<input type="email" name="receive_email_address" value="<?php echo htmlentities($data['receive_email_address']); ?>" placeholder="请填测试接收的邮件地址" autocomplete="off" class="layui-input">
			<button class="layui-btn" lay-submit lay-filter="testEmail">测试</button>
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
						<form class="layui-form layui-form-pane" action="">

	<div class="layui-form-item">
		<label class="layui-form-label message-template-title">通用-邮件模板</label>
		<div class="layui-input-inline rich-text">
			<script id="general-template" name="general_template" type="text/plain"></script>

		</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label message-template-title">用户注册-邮件模板</label>
		<div class="layui-input-inline rich-text">
			<script id="user-register-template" name="user_register_template" type="text/plain"></script>
		</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label message-template-title">密码找回-邮件模板</label>
		<div class="layui-input-inline rich-text">
			<script id="find-password-template" name="find_password_template" type="text/plain"></script>
		</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label message-template-title">邮箱绑定-邮件模板</label>
		<div class="layui-input-inline rich-text">
			<script id="email-bind-template" name="email_bind_template" type="text/plain"></script>
		</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn message-template-btn" lay-submit lay-filter="messageTemplate">立即提交</button>
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
		<script src="/static/admin/js/site_configure/email_setting/email_setting.js"></script>
	<?php break; case "2": ?>
		
		<script type="text/javascript" charset="gbk" src="/static/admin/lib/ueditor/ueditor.config.js"></script>
		<script type="text/javascript" charset="gbk" src="/static/admin/lib/ueditor/ueditor.all.min.js"></script>
		<script type="text/javascript" charset="gbk" src="/static/admin/lib/ueditor/lang/zh-cn/zh-cn.js"></script>

		<script type="text/javascript">

			$(function(){
				var toolbars = [[
					'fullscreen', 'source', '|', 'undo', 'redo', '|',
					'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
					'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
					'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
					'directionalityltr', 'directionalityrtl', 'indent', '|',
					'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|', 'link', 'unlink', 'anchor', '|',
					'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
					'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
					'print', 'preview', 'searchreplace', 'drafts', 'help'
				]];

				function htmlRestore(str) {
					var s = "";
					if (str.length === 0) {
						return "";
					}
					s = str.replace(/&amp;/g, "&");
					s = s.replace(/&lt;/g, "<");
					s = s.replace(/&gt;/g, ">");
					s = s.replace(/&nbsp;/g, " ");
					s = s.replace(/&#39;/g, "\'");
					s = s.replace(/&quot;/g, "\"");
					return s;
				}

				// 通用-邮件模板
				var generalTemplate = UE.getEditor('general-template',{
					toolbars: toolbars,
					initialFrameHeight: 150,
					autoHeightEnabled: false
				});

				generalTemplate.ready(function() {
					var html = htmlRestore('<?php echo htmlentities($data['general_template']); ?>');
					generalTemplate.setContent(html);
				});
				

				// 用户注册-邮件模板
				var userRegisterTemplate = UE.getEditor('user-register-template',{
					toolbars: toolbars,
					initialFrameHeight: 150,
					autoHeightEnabled: false
				});

				userRegisterTemplate.ready(function() {
					var html = htmlRestore('<?php echo htmlentities($data['user_register_template']); ?>');
					userRegisterTemplate.setContent(html);
				});

				// 密码找回-邮件模板
				var findPasswordTemplate = UE.getEditor('find-password-template',{
					toolbars: toolbars,
					initialFrameHeight: 150,
					autoHeightEnabled: false
				});

				findPasswordTemplate.ready(function() {
					var html = htmlRestore('<?php echo htmlentities($data['find_password_template']); ?>');
					findPasswordTemplate.setContent(html);
				});

				// 邮箱绑定-邮件模板
				var emailBindTemplate = UE.getEditor('email-bind-template',{
					toolbars: toolbars,
					initialFrameHeight: 150,
					autoHeightEnabled: false
				});

				emailBindTemplate.ready(function() {
					var html = htmlRestore('<?php echo htmlentities($data['email_bind_template']); ?>');
					emailBindTemplate.setContent(html);
				});


				layui.use(['layer', 'form'], function(){
					var layer = layui.layer,
						form = layui.form;

					form.on('submit(messageTemplate)', function(data){

						var field = data.field;

						$.post("/admin/email_setting/saveEmailMessageTemplate",field,function(res){

							if(res.code === 1){
								layer.msg(res.msg);
							}else{
								layer.msg(res.msg);
							}
						});
						return false;
					});
				});
			});

    	</script>

		<!-- <script src="/static/admin/js/site_configure/email_setting/message_template.js"></script> -->
	<?php break; ?>
<?php endswitch; ?>
</body>
</html>