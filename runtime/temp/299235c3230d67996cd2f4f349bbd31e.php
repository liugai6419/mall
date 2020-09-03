<?php /*a:3:{s:73:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\home\index.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
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

<!-- 热销商品和订单支付方式组合 -->
<ul class="group">
	<li class="home-part-container">
		<div class="big-title">
			<div class="icon"></div>
			<div class="text">近7日热销商品</div>
		</div>
		<div id="hot-goods">
			
		</div>
	</li>

	<li class="home-part-container">
		<div class="big-title">
			<div class="icon"></div>
			<div class="text">近7日订单支付方式</div>
		</div>
		<div id="ordering-pay-mode">
			
		</div>
	</li>
</ul>

<!-- 系统消息和开发团队组合 -->
<ul class="group">
	<li class="home-part-container">
		<div class="big-title">
			<div class="icon"></div>
			<div class="text">系统消息</div>
		</div>
		<div class="msgList">
			<div>
				<div class="title">软件版本</div>
				<div class="content">ShopXO v1.5.0</div>
			</div>
			<div>
				<div class="title">操作系统</div>
				<div class="content">WINNT</div>
			</div>
			<div>
				<div class="title">PHP版本</div>
				<div class="content">7.3.9</div>
			</div>
			<div>
				<div class="title">MySQL版本</div>
				<div class="content">5.7.26</div>
			</div>
			<div>
				<div class="title">服务器端信息</div>
				<div class="content">cgi-fcgi</div>
			</div>
			<div>
				<div class="title">当前域名</div>
				<div class="content">www.shopcity.io</div>
			</div>
		</div>
	</li>

	<li class="home-part-container">
		<div class="big-title">
			<div class="icon"></div>
			<div class="text">开发团队</div>
		</div>
		<div class="msgList devTeam">
			<div>
				<div class="title"><a href="">技术支持</a></div>
				<div class="content"><a href="">ShopXO企业级电商系统提供商</a></div>
			</div>
			<div>
				<div class="title"><a href="">研发成员</a></div>
				<div class="content"><a href="">龚哥哥</a></div>
			</div>
		</div>
	</li>
</ul>

		<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->

<script src="/static/admin/lib/layui/formSelects-v4.js"></script>
<script src="/static/admin/lib/echarts.js"></script>
<script src="/static/admin/js/home.js"></script>
</body>
</html>