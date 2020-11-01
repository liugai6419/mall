<?php /*a:3:{s:80:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\user_list\preview.html";i:1602649933;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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


<link rel="stylesheet" href="/static/admin/css/user_manage/user_list.css" />
</head>
<body>
	<div class="layer-container">
		<div class="top">
			<div class="left">
				<ul>
					<li>用户名</li>
					<li><?php echo htmlentities($results['username']); ?></li>
				</ul>
				<ul>
					<li>昵称</li>
					<li><?php echo htmlentities($results['nickname']); ?></li>
				</ul>
				<ul>
					<li>性别</li>
					<li>
						<?php switch($results['sex']): case "1": ?>男性<?php break; case "2": ?>女性<?php break; default: ?>保密
					<?php endswitch; ?>
					</li>
				</ul>
			</div>
			<div class="right">
				<img src="/static/admin/images/default-figure.jpg">
			</div>
		</div>
		<ul>
			<li>手机号码</li>
			<li><?php echo htmlentities($results['telephone']); ?></li>
		</ul>
		<ul>
			<li>电子邮箱</li>
			<li class="<?php echo $results['email']=='' ? 'fill-out'  :  ''; ?>"><?php echo $results['email']=="" ? '未填写'  : htmlentities($results['email']); ?></li>
		</ul>
		<ul>
			<li>状态</li>
			<li>
				<?php switch($results['user_status']): case "1": ?>正常<?php break; case "2": ?>待审核<?php break; case "3": ?>禁止发言<?php break; default: ?>禁止登录
				<?php endswitch; ?>
			</li>
		</ul>
		<ul>
			<li>支付宝openid</li>
			<li class="<?php echo $results['alipay_openid']=='' ? 'fill-out'  :  ''; ?>"><?php echo $results['alipay_openid']=="" ? '未填写'  : htmlentities($results['alipay_openid']); ?></li>
		</ul>
		<ul>
			<li>微信openid</li>
			<li class="<?php echo $results['alipay_openid']=='' ? 'fill-out'  :  ''; ?>"><?php echo $results['alipay_openid']=="" ? '未填写'  : htmlentities($results['alipay_openid']); ?></li>
		</ul>
		<ul>
			<li>百度openid</li>
			<li class="<?php echo $results['alipay_openid']=='' ? 'fill-out'  :  ''; ?>"><?php echo $results['alipay_openid']=="" ? '未填写'  : htmlentities($results['alipay_openid']); ?></li>
		</ul>
		<ul>
			<li>生日</li>
			<li>
				<?php if($results['birthday'] == 0): ?>
					<span class="fill-out">未填写</span>
				<?php else: ?>
					<?php echo date('Y-m-d',$results['birthday']); ?>
				<?php endif; ?>
			</li>
		</ul>
		<ul>
			<li>所在省</li>
			<li class="fill-out">未填写</li>
		</ul>
		<ul>
			<li>所在市</li>
			<li class="fill-out">未填写</li>
		</ul>
		<ul>
			<li>详细地址</li>
			<li class="fill-out">未填写</li>
		</ul>
		<ul>
			<li>积分</li>
			<li><?php echo htmlentities($results['point']); ?></li>
		</ul>
		<ul>
			<li>注册时间</li>
			<li><?php echo date('Y-m-d H:i:s',$results['create_time']); ?></li>
		</ul>
		<ul>
			<li>更新时间</li>
			<li>
				<?php if($results['update_time'] == 0): ?>
					<span class="fill-out">未有更新</span>
				<?php else: ?>
					<?php echo date('Y-m-d H:i:s',$results['update_time']); ?>
				<?php endif; ?>
			</li>
		</ul>
		
	</div>
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<!-- <script src="/static/admin/js/authority_control/found_manager.js"></script> -->
</body>
</html>