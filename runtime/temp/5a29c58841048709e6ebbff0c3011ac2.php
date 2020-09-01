<?php /*a:3:{s:64:"D:\phpstudy\WWW\mall\tp51\application\admin\view\home\index.html";i:1590848919;s:67:"D:\phpstudy\WWW\mall\tp51\application\admin\view\public\header.html";i:1591024403;s:67:"D:\phpstudy\WWW\mall\tp51\application\admin\view\public\footer.html";i:1590850212;}*/ ?>
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
	<link rel="stylesheet" href="/static/admin/css/home.css" />
</head>
<body>

<!-- 商城统计 -->
<div class="home-part-container">
	<div class="big-title">
		<div class="icon"></div>
		<div class="text">商城统计</div>
	</div>
	<div class="total-list">
		<div class="user-total">
			<div class="total">用户总量</div>
			<div class="num">1</div>
			<div class="yesterday-num">昨日 0</div>
			<div class="today-num">今日 0</div>
		</div>
		<div class="user-total">
			<div class="total">订单总量</div>
			<div class="num">1</div>
			<div class="yesterday-num">昨日 0</div>
			<div class="today-num">今日 0</div>
		</div>
		<div class="user-total">
			<div class="total">成交总量</div>
			<div class="num">1</div>
			<div class="yesterday-num">昨日 0</div>
			<div class="today-num">今日 0</div>
		</div>
		<div class="user-total">
			<div class="total">收入总计</div>
			<div class="num">2100.00</div>
			<div class="yesterday-num">昨日 0</div>
			<div class="today-num">今日 0</div>
		</div>
	</div>
</div>

<!-- 近7日订单交易走势 -->
<div class="home-part-container">
	<div class="big-title">
		<div class="icon"></div>
		<div class="text">近7日订单交易走势</div>
	</div>
	<div id="trading-trends">
		
	</div>
</div>

		<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<script src="/static/admin/lib/echarts.js"></script>
		<script src="/static/admin/js/home.js"></script>
	</body>
</html>