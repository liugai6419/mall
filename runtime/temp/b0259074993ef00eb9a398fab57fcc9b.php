<?php /*a:3:{s:83:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\brand_list\add_brand.html";i:1604216266;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
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


<link rel="stylesheet" href="/static/admin/css/brand_manage/brand_list.css" />
</head>
<body>
	<div class="layer-container">
		<form class="layui-form layui-form-pane" action="">
			<?php if($datas !=  null): ?>
			<input type="hidden" name="id" value="<?php echo htmlentities($datas['id']); ?>">
			<?php endif; ?>

			<div class="layui-form-item">
				<label class="layui-form-label">品牌名称</label>
				<div class="layui-input-inline">
					<input type="text" name="name" value="<?php echo htmlentities($datas['name']); ?>" lay-verify="required" placeholder="请填品牌名称" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">品牌分类</label>
				<div class="layui-input-inline">
					<select name="classify" lay-verify="required" lay-search>
						<?php if(is_array($brandClassify) || $brandClassify instanceof \think\Collection || $brandClassify instanceof \think\Paginator): $i = 0; $__LIST__ = $brandClassify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo htmlentities($vo['id']); ?>" <?php echo $vo['id']==$datas['classify'] ? 'selected'  :  ''; ?>><?php echo htmlentities($vo['name']); ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">官网地址</label>
				<div class="layui-input-inline">
					<input type="text" name="website" value="<?php echo htmlentities($datas['website']); ?>" placeholder="带http://或https://" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item logo-img">
				<label class="layui-form-label">LOGO</label>
				<div class="layui-input-inline">
					<div class="layui-upload-drag" id="logo-img">
						<div class="icon" style="display:<?php echo !empty($datas['logo_img']) ? 'none'  :  'block'; ?>">
							<i class="layui-icon"></i>
							<p>点击上传</p>
						</div>
						<div class="<?php echo !empty($datas['logo_img']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
							<img src="<?php echo htmlentities($datas['logo_img']); ?>" alt="上传成功后渲染" >
						</div>
					</div>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">排列顺序</label>
				<div class="layui-input-inline">
					<input type="number" name="order" value="<?php echo $datas==null ? 0  : htmlentities($datas['order']); ?>" placeholder="请填排列顺序" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item" pane>
				<label class="layui-form-label">是否启用</label>
				<div class="layui-input-inline">
					<input type="radio" name="is_start" value="1" title="启用" <?php echo $datas['is_start']==1 ? 'checked'  :  ''; ?>>
					<input type="radio" name="is_start" value="2" title="停用" <?php echo $datas['is_start']==2||$datas['is_start'] == '' ? 'checked'  :  ''; ?>>
				</div>
			</div>

			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn" lay-submit lay-filter="saveBrand">保存</button>
				</div>
			</div>
		</form>
	</div>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/brand_manage/add_brand.js"></script>
</body>
</html>