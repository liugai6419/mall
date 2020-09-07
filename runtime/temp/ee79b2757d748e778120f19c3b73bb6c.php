<?php /*a:3:{s:84:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\agreement_mange\index.html";i:1599448716;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/site_configure/agreement_mange.css" />
</head>
<body>

	<form class="layui-form layui-form-pane" action="">

		<div class="layui-form-item">
			<label class="layui-form-label message-template-title">用户注册协议</label>
			<div class="layui-input-inline rich-text">
				<script id="agreement-mange" name="agreement_mange" type="text/plain"></script>
			</div>
		</div>

		<div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn message-template-btn" lay-submit lay-filter="agreementMange">立即提交</button>
			</div>
		</div>

	</form>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script type="text/javascript" charset="gbk" src="/static/admin/lib/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="gbk" src="/static/admin/lib/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript" charset="gbk" src="/static/admin/lib/ueditor/lang/zh-cn/zh-cn.js"></script>

	<script type="text/javascript">

		$(function(){

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
			var agreementMange = UE.getEditor('agreement-mange',{
				initialFrameHeight: 500,
				autoHeightEnabled: false
			});

			agreementMange.ready(function() {
				var html = htmlRestore('<?php echo htmlentities($data['agreement_mange']); ?>');
				agreementMange.setContent(html);
			});


			layui.use(['layer', 'form'], function(){
				var layer = layui.layer,
					form = layui.form;

				form.on('submit(agreementMange)', function(data){

					var field = data.field;

					console.log(field);

					$.post("/admin/agreement_mange/saveAgreementMange",field,function(res){

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
	<!-- <script src="/static/admin/js/site_configure/agreement_mange/agreement_mange.js"></script> -->
</body>
</html>