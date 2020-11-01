<?php /*a:3:{s:78:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\user_list\found.html";i:1603073835;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/user_manage/user_list.css" />
</head>
<body>
	<div class="found-top">
		<div class="return-page"><i class="iconfont iconreturn"></i><span>返回</span></div>
		<div class="title">用户添加</div>
	</div>

	<div class="layer-container">
		<form class="layui-form layui-form-pane" action="">
			<!-- 用户id -->
			<?php if($results !=  null): ?>
			<input type="hidden" name="id" value="<?php echo htmlentities($results['id']); ?>">
			<?php endif; ?>
			
			<div class="second-container">
				<div class="layui-form-item">
					<label class="layui-form-label">用户名</label>
					<div class="layui-input-inline">
						<input type="text" name="username" value="<?php echo htmlentities($results['username']); ?>" lay-verify="required" placeholder="填写用户名" autocomplete="off" class="layui-input route-delimiter">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">昵称</label>
					<div class="layui-input-inline">
						<input type="text" name="nickname" value="<?php echo htmlentities($results['nickname']); ?>" lay-verify="required" placeholder="填写昵称" autocomplete="off" class="layui-input route-delimiter">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">出生日期</label>
					<div class="layui-input-inline">
						<input type="text" name="birthday" <?php if($results['birthday'] != 0): ?> value="<?php echo date('Y-m-d',$results['birthday']); ?>" <?php endif; ?> placeholder="填写出生日期" class="layui-input" id="date">
					</div>
				</div>

				<div class="layui-form-item" pane>
					<label class="layui-form-label">性别</label>
					<div class="layui-input-inline">
						<input type="radio" name="sex" value="1" title="男性" <?php echo $results['sex']==1 ? 'checked'  :  ''; ?>>
						<input type="radio" name="sex" value="2" title="女性" <?php echo $results['sex']==2 ? 'checked'  :  ''; ?>>
						<input type="radio" name="sex" value="3" title="保密" <?php echo $results['sex']==3||$results['sex'] == '' ? 'checked'  :  ''; ?>>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">详细地址</label>
					<div class="layui-input-inline">
						<input type="text" name="detail_address" value="<?php echo htmlentities($results['detail_address']); ?>" placeholder="填写详细地址" autocomplete="off" class="layui-input route-delimiter">
					</div>
				</div>
			</div>

			<div class="second-container">
				<div class="layui-form-item">
					<label class="layui-form-label">登录密码</label>
					<div class="layui-input-inline">
						<input type="password" name="password" lay-verify="<?php echo $results==null ? 'required'  :  ''; ?>" placeholder="<?php echo $results==null ? '请填登录密码'  :  '若不修改密码则不用填写'; ?>" autocomplete="off" class="layui-input route-delimiter">
					</div>
				</div>
			</div>

			<div class="second-container">
				<div class="layui-form-item">
					<label class="layui-form-label">手机号码</label>
					<div class="layui-input-inline">
						<input type="text" name="telephone" value="<?php echo htmlentities($results['telephone']); ?>" lay-verify="required|phone" placeholder="填写手机号码" autocomplete="off" class="layui-input route-delimiter">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">电子邮箱</label>
					<div class="layui-input-inline">
						<input type="text" name="email" value="<?php echo htmlentities($results['email']); ?>" lay-verify="myemail" placeholder="填写电子邮箱" autocomplete="off" class="layui-input route-delimiter">
					</div>
				</div>
			</div>

			<div class="second-container">
				<div class="layui-form-item">
					<label class="layui-form-label">积分</label>
					<div class="layui-input-inline">
						<input type="text" name="point" value="<?php echo $results==null ? 0  : htmlentities($results['point']); ?>" lay-verify="required|number" placeholder="填写积分" autocomplete="off" class="layui-input route-delimiter">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">用户状态</label>
					<div class="layui-input-inline">
						<select name="user_status" lay-verify="required" lay-search>
							<option value="1" <?php echo $results['user_status']==1 ? 'selected'  :  ''; ?>>正常</option>
							<option value="2" <?php echo $results['user_status']==2 ? 'selected'  :  ''; ?>>待审核</option>
							<option value="3" <?php echo $results['user_status']==3 ? 'selected'  :  ''; ?>>禁止发言</option>
							<option value="4" <?php echo $results['user_status']==4 ? 'selected'  :  ''; ?>>禁止登录</option>
						</select>
					</div>
				</div>
			</div>

			<div>
				<div class="layui-form-item">
					<label class="layui-form-label">支付宝openid</label>
					<div class="layui-input-inline">
						<input type="text" name="alipay_openid" value="<?php echo htmlentities($results['alipay_openid']); ?>" placeholder="填写支付宝openid" autocomplete="off" class="layui-input route-delimiter">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">微信openid</label>
					<div class="layui-input-inline">
						<input type="text" name="wechat_opneid" value="<?php echo htmlentities($results['wechat_opneid']); ?>" placeholder="填写微信openid" autocomplete="off" class="layui-input route-delimiter">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">百度openid</label>
					<div class="layui-input-inline">
						<input type="text" name="baidu_openid" value="<?php echo htmlentities($results['baidu_openid']); ?>" placeholder="填写百度openid" autocomplete="off" class="layui-input route-delimiter">
					</div>
				</div>
			</div>

			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn" lay-submit lay-filter="foundUser">保存</button>
				</div>
			</div>
		</form>
	</div>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/user_manage/found_user.js"></script>
</body>
</html>