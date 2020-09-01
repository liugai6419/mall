<?php /*a:3:{s:81:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\shop_message\index.html";i:1597411714;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/system_setting/shop_message.css" />
</head>
<body>

<form class="layui-form layui-form-pane" action="">
	<div class="layui-form-item">
    	<label class="layui-form-label">商店电话</label>
		<div class="layui-input-inline">
			<input type="telephone" name="shop_telephone" value="<?php echo htmlentities($data['shop_telephone']); ?>" lay-verify="myphone" placeholder="请填商店电话" autocomplete="off" class="layui-input">
		</div>
    	<div class="layui-form-mid layui-word-aux">空则不显示</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">商店邮箱</label>
		<div class="layui-input-inline">
			<input type="email" name="shop_email" value="<?php echo htmlentities($data['shop_email']); ?>" lay-verify="myemail" placeholder="请填商店邮箱" autocomplete="off" class="layui-input">
		</div>
    	<div class="layui-form-mid layui-word-aux">空则不显示</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">商店地址</label>
		<div class="layui-input-inline">
			<input type="text" name="shop_address" value="<?php echo htmlentities($data['shop_address']); ?>" placeholder="请填商店地址" autocomplete="off" class="layui-input">
		</div>
    	<div class="layui-form-mid layui-word-aux">空则不显示</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">商店二维码</label>
		<div class="layui-input-inline">
			<div class="layui-upload-drag" id="update_qrcode">
				<div class="icon" style="display:<?php echo !empty($data['qrcode_img']) ? 'none'  :  'block'; ?>">
					<i class="layui-icon"></i>
					<p>点击上传，或将文件拖拽到此处</p>
				</div>
				<div class="<?php echo !empty($data['qrcode_img']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
					<img src="<?php echo htmlentities($data['qrcode_img']); ?>" alt="上传成功后渲染">
				</div>
			</div>
	    </div>
    	<div class="layui-form-mid layui-word-aux">请上传jpg、png、bmp、jpeg格式,且小于200KB的图片</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="submitConfig">立即提交</button>
	    </div>
	</div>
</form>

		<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->

<script src="/static/admin/js/system_setting/shop_message.js"></script>
</body>
</html>