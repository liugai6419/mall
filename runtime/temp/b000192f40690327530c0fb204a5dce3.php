<?php /*a:3:{s:80:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\seo_setting\index.html";i:1599403557;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/site_configure/seo_setting.css" />
</head>
<body>

	<form class="layui-form layui-form-pane" action="">
		<div class="layui-form-item">
	    	<label class="layui-form-label">链接模式</label>
			<div class="layui-input-inline">
				<select name="link_mode" lay-verify="required" lay-search>
					<option value="1" <?php echo $data['link_mode']==1 ? 'selected'  :  ''; ?>>兼容模式</option>
					<option value="2" <?php echo $data['link_mode']==2 ? 'selected'  :  ''; ?>>PATHINFO模式</option>
					<option value="3" <?php echo $data['link_mode']==3 ? 'selected'  :  ''; ?>>PATHINFO模式+短地址</option>
				</select>
			</div>
			<div class="layui-form-mid layui-word-aux">详情ThinkPHP官网5.1版本文档 [http://www.thinkphp.cn/]</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">路由分隔符</label>
			<div class="layui-input-inline">
				<input type="text" name="route_delimiter" lay-verify="required" value="<?php echo htmlentities($data['route_delimiter']); ?>" placeholder="填写路由分隔符" autocomplete="off" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux">建议填写 [ - 或 / ] 默认 [ - ] ，仅PATHINFO模式+短地址模式下有效</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">伪静态后缀</label>
			<div class="layui-input-inline">
				<input type="text" name="static_suffix" lay-verify="required" value="<?php echo htmlentities($data['static_suffix']); ?>" placeholder="填写伪静态后缀" autocomplete="off" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux">链接后面的后缀别名，默认 [ html ]</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">站点标题</label>
			<div class="layui-input-inline">
				<input type="text" name="site_title" lay-verify="required" value="<?php echo htmlentities($data['site_title']); ?>" placeholder="填写站点标题" autocomplete="off" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux">浏览器标题，一般不超过80个字符</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">站点关键字</label>
			<div class="layui-input-inline">
				<input type="text" name="site_key" lay-verify="required" value="<?php echo htmlentities($data['site_key']); ?>" placeholder="填写站点关键字" autocomplete="off" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux">一般不超过100个字符，多个关键字以半圆角逗号 [ , ] 隔开</div>
		</div>

		<div class="layui-form-item textarea">
			<label class="layui-form-label">站点描述</label>
			<div class="layui-input-inline">
				<textarea name="site_description" lay-verify="required" placeholder="填写站点描述" class="layui-textarea"><?php echo htmlentities($data['site_description']); ?></textarea>
			</div>
			<div class="layui-form-mid layui-word-aux">站点描述，一般不超过200个字符</div>
		</div>

		<div class="layui-form-item">
		    <div class="layui-input-block">
		    	<button class="layui-btn" lay-submit lay-filter="seoSetting">立即提交</button>
		    </div>
		</div>
	</form>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->

	<script src="/static/admin/js/site_configure/seo_setting/seo_setting.js"></script>
</body>
</html>