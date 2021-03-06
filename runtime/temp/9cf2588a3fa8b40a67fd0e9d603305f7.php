<?php /*a:3:{s:65:"D:\phpstudy\WWW\mall\tp51\application\admin\view\index\index.html";i:1591109998;s:67:"D:\phpstudy\WWW\mall\tp51\application\admin\view\public\header.html";i:1591024403;s:67:"D:\phpstudy\WWW\mall\tp51\application\admin\view\public\footer.html";i:1590850212;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo config('mall.default_charset'); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="/static/admin/images/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1" />
	<title>运营后台</title>
	
	<link rel="stylesheet" href="/static/admin/lib/layui/css/layui.css" />
	<link rel="stylesheet" href="/static/admin/common/fonts/iconfont.css" />
	<link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" />
	<link rel="stylesheet" href="/static/admin/common/css/reset.css" />
	<link rel="stylesheet" href="/static/admin/common/css/style.css" />
	<link rel="stylesheet" href="/static/admin/css/index.css" />
</head>
<body>

<div class="container">
	<div class="top-nav">
		<div class="company-name"><a href="javascript:;" data-url="/admin/home/index" class="nav">ShopXO</a></div>
		<div class="my">
			<div class="username"><?php echo htmlentities($admin['username']); ?></div>
			<div class="setting-back">
				<a href="javascript:;" data-url="/admin/home/index" class="nav"><span class="iconfont iconsetting"></span>设置</a>
				<a href="/admin/index/loginout"><span class="iconfont iconback""></span>退出</a>
			</div>
		</div>
	</div>
	
	<div class="bottom">
		<div class="left-nav">
			<ul class="layui-nav layui-nav-tree layui-nav-side" lay-shrink="all">
				<li class="layui-nav-item">
					<a href="javascript:;" data-url="/admin/home/index" class="nav">首页</a>
				</li>
				<li class="layui-nav-item">
			    	<a href="javascript:;">系统设置</a>
			    	<dl class="layui-nav-child">
			    		<dd><a href="javascript:;" data-url="/admin/index/houtai" class="nav">后台配置</a></dd>
			    		<dd><a href="javascript:;" data-url="/admin/index/shangdian" class="nav">商店信息</a></dd>
			    	</dl>
				</li>
				<li class="layui-nav-item">
			    	<a href="javascript:;">站点配置</a>
					<dl class="layui-nav-child">
						<dd><a href="javascript:;" data-url="/admin/index/zhandian" class="nav">站点设置</a></dd>
						<dd><a href="javascript:;" data-url="/admin/index/duanxin" class="nav">短信设置</a></dd>
						<dd><a href="javascript:;" data-url="/admin/index/youxiang" class="nav">邮箱设置</a></dd>
						<dd><a href="javascript:;" data-url="/admin/index/seo" class="nav">SEO设置</a></dd>
						<dd><a href="javascript:;" data-url="/admin/index/xieyi" class="nav">协议管理</a></dd>
				    </dl>
				</li>
			</ul>
		</div>
		<div class="content">
			<div class="second-content">
				<iframe class="iframe" src="/admin/home/index" height="100%" width="100%"></iframe>
			</div>
		</div>
	</div>
</div>

		<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<script src="/static/admin/lib/echarts.js"></script>
		<script src="/static/admin/js/index.js"></script>
	</body>
</html>