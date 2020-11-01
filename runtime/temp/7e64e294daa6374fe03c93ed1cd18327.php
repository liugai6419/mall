<?php /*a:3:{s:81:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\goods_classify\add.html";i:1603790908;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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


<link rel="stylesheet" href="/static/admin/css/goods_manage/goods_classify.css" />
</head>
<body>
	<div class="layer-container">
		<form class="layui-form layui-form-pane" action="">
			
			<input type="hidden" name="user_id" value="<?php echo htmlentities($userId); ?>">

			<?php if($classify != null): ?>
				<input type="hidden" name="classify" value="<?php echo htmlentities($classify); ?>">
			<?php endif; if($data != null): ?>
				<input type="hidden" name="id" value="<?php echo htmlentities($data['id']); ?>">
			<?php endif; ?>

			<div class="img">
				<div class="layui-form-item image">
					<label class="layui-form-label">icon图标</label>
					<div class="layui-input-inline">
						<div class="layui-upload-drag" id="small-icon">
							<div class="icon" style="display:<?php echo !empty($data['small_icon']) ? 'none'  :  'block'; ?>">
								<i class="layui-icon"></i>
								<p>点击上传</p>
							</div>
							<div class="<?php echo !empty($data['small_icon']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
								<img src="<?php echo htmlentities($data['small_icon']); ?>" alt="上传成功后渲染" >
							</div>
						</div>
					</div>
				</div>

				<div class="layui-form-item image">
					<label class="layui-form-label">大图片</label>
					<div class="layui-input-inline">
						<div class="layui-upload-drag" id="big-img">
							<div class="icon" style="display:<?php echo !empty($data['big_img']) ? 'none'  :  'block'; ?>">
								<i class="layui-icon"></i>
								<p>点击上传</p>
							</div>
							<div class="<?php echo !empty($data['big_img']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
								<img src="<?php echo htmlentities($data['big_img']); ?>" alt="上传成功后渲染" >
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">背景色</label>
				<div class="layui-input-inline" style="width: 75%;">
					<div class="layui-input-inline" style="width: 294px;">
						<input type="text" name="bg_color" value="<?php echo htmlentities($data['bg_color']); ?>" disabled placeholder="请选择颜色" class="layui-input color" id="bg-color">
					</div>
					<div class="layui-inline" style="margin:0">
						<div id="login_color_selector1" style="margin:0"></div>
					</div>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">名称</label>
				<div class="layui-input-inline">
					<input type="text" name="name" value="<?php echo htmlentities($data['name']); ?>" lay-verify="required" placeholder="请填名称" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">副名称</label>
				<div class="layui-input-inline">
					<input type="text" name="deputy_name" value="<?php echo htmlentities($data['deputy_name']); ?>" placeholder="请填副名称" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item textarea">
				<label class="layui-form-label">描述</label>
				<div class="layui-input-inline">
					<textarea name="describe" placeholder="描述" class="layui-textarea"><?php echo htmlentities($data['describe']); ?></textarea>
				</div>
			</div>

			<div class="layui-form-item" pane>
				<label class="layui-form-label">首页推荐</label>
				<div class="layui-input-inline">
					<input type="radio" name="home_recommend" value="1" title="否" <?php echo $data['home_recommend']==1 ? 'checked'  :  ''; ?>>
					<input type="radio" name="home_recommend" value="2" title="是" <?php echo $data['home_recommend']==2||$data['home_recommend'] == '' ? 'checked'  :  ''; ?>>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">顺序</label>
				<div class="layui-input-inline">
					<input type="number" name="order" value="<?php echo $data==null ? 0  : htmlentities($data['order']); ?>" placeholder="请填顺序" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item" pane>
				<label class="layui-form-label">是否启用</label>
				<div class="layui-input-inline">
					<input type="radio" name="is_start" value="1" title="停用" <?php echo $data['is_start']==1 ? 'checked'  :  ''; ?>>
					<input type="radio" name="is_start" value="2" title="启用" <?php echo $data['is_start']==2||$data['is_start'] == '' ? 'checked'  :  ''; ?>>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">SEO标题</label>
				<div class="layui-input-inline">
					<input type="text" name="seo_title" value="<?php echo htmlentities($data['seo_title']); ?>" placeholder="一般不超过80个字符" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">SEO关键词</label>
				<div class="layui-input-inline">
					<input type="text" name="seo_key" value="<?php echo htmlentities($data['seo_key']); ?>" placeholder="一般不超过100个字符，多个关键字以半圆角逗号 “,” 隔开" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item textarea">
				<label class="layui-form-label">SEO描述</label>
				<div class="layui-input-inline">
					<textarea name="seo_describe" placeholder="一般不超过200个字符" class="layui-textarea"><?php echo htmlentities($data['seo_describe']); ?></textarea>
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


	<script src="/static/admin/js/goods_manage/add_classify.js"></script>
</body>
</html>