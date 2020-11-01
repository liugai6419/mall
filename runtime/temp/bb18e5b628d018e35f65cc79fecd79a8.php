<?php /*a:3:{s:90:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\brand_classify\add_classify.html";i:1603454029;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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


<link rel="stylesheet" href="/static/admin/css/brand_manage/brand_classify.css" />
</head>
<body>
	<div class="layer-container">
		<form class="layui-form layui-form-pane" action="">
			<?php if($results !=  null): ?>
			<input type="hidden" name="id" value="<?php echo htmlentities($results['id']); ?>">
			<?php endif; ?>

			<div class="layui-form-item">
		    	<label class="layui-form-label">分类名称</label>
				<div class="layui-input-inline">
					<input type="text" name="name" value="<?php echo htmlentities($results['name']); ?>" lay-verify="required" placeholder="请填分类名称" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">排列顺序</label>
				<div class="layui-input-inline">
					<input type="number" name="order" value="<?php echo htmlentities($results['order']); ?>" placeholder="请填排列顺序" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item" pane>
				<label class="layui-form-label">是否启用</label>
				<div class="layui-input-inline">
					<input type="radio" name="is_start" value="1" title="启用" <?php echo $results['is_start']==1 ? 'checked'  :  ''; ?>>
					<input type="radio" name="is_start" value="2" title="停用" <?php echo $results['is_start']==2||$results['is_start'] == '' ? 'checked'  :  ''; ?>>
				</div>
			</div>

			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn" lay-submit lay-filter="addClassify">保存</button>
				</div>
			</div>
		</form>
	</div>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/brand_manage/add_classify.js"></script>
</body>
</html>