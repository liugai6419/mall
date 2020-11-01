<?php /*a:3:{s:74:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\index\index.html";i:1602410636;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo config('mall.default_charset'); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="/static/admin/images/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1" />
	<title>运营后台</title>
	
	<link rel="stylesheet" href="/static/admin/lib/layui/css/layui.css" />
	<!-- <link rel="stylesheet" href="/static/admin/lib/layui/css/formSelects-v4.css" /> -->
	<!-- <link rel="stylesheet" href="/static/admin/common/fonts/iconfont.css" /> -->
	<!-- <link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" /> -->
	<link rel="stylesheet" href="/static/admin/common/css/reset.css" />
	<!-- <link rel="stylesheet" href="/static/admin/css/[my_css].css" /> -->

<link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" />
<link rel="stylesheet" href="/static/admin/css/index.css" />
</head>
<body>

<div class="container">
	<div class="top-nav">
		<div class="company-name"><a href="javascript:;" data-url="/admin/home/index" class="nav">ShopXO</a></div>
		<div class="enlarg-shrink"><i class="iconfont iconenlarge"></i><span>全屏显示</span></div>
		<div class="my">
			<div class="username"><?php echo htmlentities($admin['username']); ?></div>
			<div class="setting-back">
				<a href="javascript:;" data-url="/admin/home/index" class="nav"><span class="iconfont iconsetting"></span>设置</a>
				<a href="/admin/index/loginout"><span class="iconfont iconback"></span>退出</a>
			</div>
		</div>
	</div>
	
	<div class="bottom">
		<div class="left-nav">
			<ul class="layui-nav layui-nav-tree layui-nav-side" lay-shrink="all">
			
				<li class="layui-nav-item">
					<a href="javascript:;" data-url="/admin/home/index" class="nav">首页</a>
				</li>

				<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
					<li class="layui-nav-item">
						<a href="javascript:;"><?php echo htmlentities($list['authority_name']); ?></a>
						<dl class="layui-nav-child">
							<?php if(is_array($list['second_authority']) || $list['second_authority'] instanceof \think\Collection || $list['second_authority'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['second_authority'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<dd><a href="javascript:;" data-url="/admin/<?php echo htmlentities($vo['controller_name']); ?>/<?php echo htmlentities($vo['method_name']); ?>" class="nav"><?php echo htmlentities($vo['authority_name']); ?></a></dd>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</dl>
					</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				
				<!-- <li class="layui-nav-item">
					<a href="javascript:;">系统设置</a>
					<dl class="layui-nav-child">
						<dd><a href="javascript:;" data-url="/admin/backstage_config/index" class="nav">后台配置</a></dd>
						<dd><a href="javascript:;" data-url="/admin/shop_message/index" class="nav">商店信息</a></dd>
					</dl>
				</li>
				<li class="layui-nav-item">
					<a href="javascript:;">站点配置</a>
					<dl class="layui-nav-child">
						<dd><a href="javascript:;" data-url="/admin/site_setting/index" class="nav">站点设置</a></dd>
						<dd><a href="javascript:;" data-url="/admin/sms_setting/index" class="nav">短信设置</a></dd>
						<dd><a href="javascript:;" data-url="/admin/email_setting/index" class="nav">邮箱设置</a></dd>
						<dd><a href="javascript:;" data-url="/admin/seo_setting/index" class="nav">SEO设置</a></dd>
						<dd><a href="javascript:;" data-url="/admin/agreement_mange/index" class="nav">协议管理</a></dd>
					</dl>
				</li>
				<li class="layui-nav-item">
					<a href="javascript:;">权限控制</a>
					<dl class="layui-nav-child">
						<dd><a href="javascript:;" data-url="/admin/manager_list/index" class="nav">管理员列表</a></dd>
						<dd><a href="javascript:;" data-url="/admin/role_manage/index" class="nav">角色管理</a></dd>
						<dd><a href="javascript:;" data-url="/admin/authority_allocation/index" class="nav">权限分配</a></dd>
					</dl>
				</li> -->
			</ul>
		</div>
		<div class="content">
			<div class="second-content">
				<iframe class="iframe" id="iframe" src="/admin/home/index" height="100%" width="100%"></iframe>
			</div>
		</div>
	</div>
</div>

		<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->

<script src="/static/admin/js/index.js"></script>
</body>
</html>