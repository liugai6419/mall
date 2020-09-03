<?php /*a:3:{s:85:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\backstage_config\index.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo config('mall.default_charset'); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="/static/admin/images/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1" />
	<title>后台配置</title>
	
	<link rel="stylesheet" href="/static/admin/lib/layui/css/layui.css" />
	<!-- <link rel="stylesheet" href="/static/admin/lib/layui/css/formSelects-v4.css" /> -->
	<!-- <link rel="stylesheet" href="/static/admin/common/fonts/iconfont.css" /> -->
	<!-- <link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" /> -->
	<link rel="stylesheet" href="/static/admin/common/css/reset.css" />
	<!-- <link rel="stylesheet" href="/static/admin/css/[my_css].css" /> -->

<link rel="stylesheet" href="/static/admin/css/system_setting/backstage_configure.css" />
</head>
<body>

<form class="layui-form layui-form-pane" action="">
	<div class="layui-form-item">
    	<label class="layui-form-label">Excel编码</label>
		    <div class="layui-input-inline">
		    	<select name="excel_encoded" lay-verify="required" lay-search>
			        <option value="1" <?php echo $data['excel_encoded']==1 ? 'selected'  :  ''; ?>>utf-8</option>
			        <option value="2" <?php echo $data['excel_encoded']==2 ? 'selected'  :  ''; ?>>gbk</option>
		    	</select>
		    </div>
    	<div class="layui-form-mid layui-word-aux">excel模块编码选择</div>
	</div>

	<div class="layui-form-item">
	    <label class="layui-form-label">分页数量</label>
		    <div class="layui-input-inline">
		    	<input type="number" name="paging_num" value="<?php echo htmlentities($data['paging_num']); ?>" required lay-verify="required" placeholder="请填写分页数量" autocomplete="off" class="layui-input">
		    </div>
	    <div class="layui-form-mid layui-word-aux">分页显示数量</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">是否扣减库存</label>
		    <div class="layui-input-inline">
		    	<select name="is_reduce_repertory" lay-verify="required" lay-search>
			        <option value="1" <?php echo $data['is_reduce_repertory']==1 ? 'selected'  :  ''; ?>>否</option>
			        <option value="2" <?php echo $data['is_reduce_repertory']==2 ? 'selected'  :  ''; ?>>是</option>
		    	</select>
		    </div>
    	<div class="layui-form-mid layui-word-aux">建议不要随意修改，以免造成库存数据错乱，关闭不影响库存回滚</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">扣减库存规则</label>
		    <div class="layui-input-inline">
		    	<select name="reduce_repertory_regulation" lay-verify="required" lay-search>
			        <option value="1" <?php echo $data['reduce_repertory_regulation']==1 ? 'selected'  :  ''; ?>>订单确认成功</option>
			        <option value="2" <?php echo $data['reduce_repertory_regulation']==2 ? 'selected'  :  ''; ?>>订单支付成功</option>
			        <option value="3" <?php echo $data['reduce_repertory_regulation']==3 ? 'selected'  :  ''; ?>>订单发货</option>
		    	</select>
		    </div>
    	<div class="layui-form-mid layui-word-aux">需扣减库存开启方可有效，默认订单支付成功</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">订单预约模式</label>
		    <div class="layui-input-inline">
		    	<select name="ordering_bespeak_model" lay-verify="required" lay-search>
			        <option value="1" <?php echo $data['ordering_bespeak_model']==1 ? 'selected'  :  ''; ?>>否</option>
			        <option value="2" <?php echo $data['ordering_bespeak_model']==2 ? 'selected'  :  ''; ?>>是</option>
		    	</select>
		    </div>
    	<div class="layui-form-mid layui-word-aux">开启后用户提交订单需要管理员确认</div>
	</div>

	<div class="layui-form-item">
	    <label class="layui-form-label">商品可添加规格最大数量</label>
		    <div class="layui-input-inline">
		    	<input type="number" name="max_num" value="<?php echo htmlentities($data['max_num']); ?>" required lay-verify="required" placeholder="请填写商品可添加规格最大数量" autocomplete="off" class="layui-input">
		    </div>
	    <div class="layui-form-mid layui-word-aux">建议不超过3个规格</div>
	</div>

	<div class="layui-form-item">
	    <label class="layui-form-label">百度地图api密钥</label>
		    <div class="layui-input-inline">
		    	<input type="text" name="api_pwd" value="<?php echo htmlentities($data['api_pwd']); ?>" placeholder="请填写百度地图api密钥" autocomplete="off" class="layui-input">
		    </div>
	    <div class="layui-form-mid layui-word-aux">百度地图api密钥</div>
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

<script src="/static/admin/js/system_setting/backstage_configure.js"></script>
</body>
</html>