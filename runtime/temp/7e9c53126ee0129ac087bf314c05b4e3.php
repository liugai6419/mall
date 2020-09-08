<?php /*a:3:{s:89:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\authority_allocation\found.html";i:1599544202;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
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


<link rel="stylesheet" href="/static/admin/css/authority_control/authority_allocation.css" />
</head>
<body>
	<div class="layer-container">
		<form class="layui-form layui-form-pane" action="">
			<?php if($list !=  null): ?>
			<input type="hidden" name="id" value="<?php echo htmlentities($list['id']); ?>">
			<?php endif; ?>

			<div class="layui-form-item">
				<label class="layui-form-label">栏目级别</label>
				<div class="layui-input-inline">
					<select name="parent_id" lay-verify="required" lay-search>
						<option value="0" <?php echo $list['parent_id']==0 ? 'selected'  :  ''; ?>>一级栏目</option>
						<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo htmlentities($vo['id']); ?>" <?php echo $list['parent_id']==$vo['id'] ? 'selected'  :  ''; ?>><?php echo htmlentities($vo['authority_name']); ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>

			<div class="layui-form-item">
		    	<label class="layui-form-label">权限名称</label>
				<div class="layui-input-inline">
					<input type="text" name="authority_name" value="<?php echo htmlentities($list['authority_name']); ?>" lay-verify="required" placeholder="请填权限名称" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">控制器名称</label>
				<div class="layui-input-inline">
					<input type="text" name="controller_name" value="<?php echo htmlentities($list['controller_name']); ?>" lay-verify="required" placeholder="请填控制器名称" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">方法名称</label>
				<div class="layui-input-inline">
					<input type="text" name="method_name" value="<?php echo htmlentities($list['method_name']); ?>" lay-verify="required" placeholder="请填方法名称" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">图标名称</label>
				<div class="layui-input-inline">
					<input type="text" name="icon_name" value="<?php echo htmlentities($list['icon_name']); ?>" placeholder="将svg格式icon放到/static/admin/images文件夹中" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">排序顺序</label>
				<div class="layui-input-inline">
					<input type="number" name="marshalling_sequence" value="<?php echo htmlentities($list['marshalling_sequence']); ?>" lay-verify="required" placeholder="请填排序顺序" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">是否显示</label>
				<div class="layui-input-inline">
					<input type="radio" name="is_show" value="1" title="显示" <?php echo $list['is_show']==1 ? 'checked'  :  ''; ?>>
					<input type="radio" name="is_show" value="2" title="隐藏" <?php echo $list['is_show']==2 ? 'checked'  :  ''; ?>>
				</div>
			</div>

			<div class="layui-form-item">
			    <div class="layui-input-block">
			    	<button class="layui-btn" lay-submit lay-filter="foundAuthority">保存</button>
			    </div>
			</div>
		</form>
	</div>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/authority_control/found_authority.js"></script>
</body>
</html>