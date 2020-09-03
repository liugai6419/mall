<?php /*a:11:{s:81:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\site_setting\index.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\header.html";i:1599108235;s:88:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\site_setting\base_setting.html";i:1599108235;s:89:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\site_setting\user_register.html";i:1599108235;s:86:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\site_setting\user_login.html";i:1599108235;s:89:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\site_setting\password_find.html";i:1599108235;s:85:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\site_setting\accessory.html";i:1599108235;s:96:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\site_setting\pic_identifying_code.html";i:1599108235;s:92:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\site_setting\ordering_service.html";i:1599108235;s:82:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\site_setting\search.html";i:1599108235;s:76:"D:\phpstudy_pro\WWW\myproject\mall\application\admin\view\public\footer.html";i:1599108235;}*/ ?>
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

<?php switch($tab): case "2": ?>
		<link rel="stylesheet" href="/static/admin/lib/layui/css/formSelects-v4.css" />
	<?php break; case "3": ?>
		<link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" />
	<?php break; case "4": ?>
		<link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" />
	<?php break; case "6": ?>
		<link rel="stylesheet" href="/static/admin/lib/layui/css/formSelects-v4.css" />
	<?php break; case "8": ?>
		<link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" />
	<?php break; ?>

<?php endswitch; ?>
<link rel="stylesheet" href="/static/admin/css/system_setting/backstage_configure.css" />
<link rel="stylesheet" href="/static/admin/css/site_configure/site_setting.css" />
</head>
<body>

	<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
		<ul class="layui-tab-title">
			<a href="/admin/site_setting/index?tab=1"><li class="<?php echo $tab==1 ? 'layui-this'  :  ''; ?>">基础配置</li></a>
			<a href="/admin/site_setting/index?tab=2"><li class="<?php echo $tab==2 ? 'layui-this'  :  ''; ?>">用户注册</li></a>
			<a href="/admin/site_setting/index?tab=3"><li class="<?php echo $tab==3 ? 'layui-this'  :  ''; ?>">用户登录</li></a>
			<a href="/admin/site_setting/index?tab=4"><li class="<?php echo $tab==4 ? 'layui-this'  :  ''; ?>">密码找回</li></a>
			<a href="/admin/site_setting/index?tab=5"><li class="<?php echo $tab==5 ? 'layui-this'  :  ''; ?>">附件</li></a>
			<a href="/admin/site_setting/index?tab=6"><li class="<?php echo $tab==6 ? 'layui-this'  :  ''; ?>">图片验证码</li></a>
			<a href="/admin/site_setting/index?tab=7"><li class="<?php echo $tab==7 ? 'layui-this'  :  ''; ?>">订单售后</li></a>
			<a href="/admin/site_setting/index?tab=8"><li class="<?php echo $tab==8 ? 'layui-this'  :  ''; ?>">搜索</li></a>
		</ul>
		<div class="layui-tab-content">
			<div class="layui-tab-item layui-show">
				<?php switch($tab): case "1": ?>
						<form class="layui-form layui-form-pane" action="">
	<div class="layui-form-item">
    	<label class="layui-form-label">站点名称</label>
		<div class="layui-input-inline">
			<input type="text" name="site_name" value="<?php echo htmlentities($data['site_name']); ?>" lay-verify="required" placeholder="请填站点名称" autocomplete="off" class="layui-input">
		</div>
    	<div class="layui-form-mid layui-word-aux">必须填写</div>
	</div>

	<div class="layui-form-item image">
		<label class="layui-form-label">电脑端logo</label>
		<div class="layui-input-inline">
			<div class="layui-upload-drag" id="computer_logo">
				<div class="icon" style="display:<?php echo !empty($data['computer_logo']) ? 'none'  :  'block'; ?>">
					<i class="layui-icon"></i>
					<p>点击上传，或将文件拖拽到此处</p>
				</div>
				<div class="<?php echo !empty($data['computer_logo']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
					<img src="<?php echo htmlentities($data['computer_logo']); ?>" alt="上传成功后渲染" style="max-width: 196px">
				</div>
			</div>
		</div>
		<div class="layui-form-mid layui-word-aux">请上传jpg、png、gif格式图片</div>
	</div>

	<div class="layui-form-item image">
		<label class="layui-form-label">手机端logo</label>
		<div class="layui-input-inline">
			<div class="layui-upload-drag" id="phone_logo">
				<div class="icon" style="display:<?php echo !empty($data['phone_logo']) ? 'none'  :  'block'; ?>">
					<i class="layui-icon"></i>
					<p>点击上传，或将文件拖拽到此处</p>
				</div>
				<div class="<?php echo !empty($data['phone_logo']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
					<img src="<?php echo htmlentities($data['phone_logo']); ?>" alt="上传成功后渲染" style="max-width: 196px">
				</div>
			</div>
		</div>
		<div class="layui-form-mid layui-word-aux">请上传jpg、png、gif格式图片</div>
	</div>

	<div class="layui-form-item image">
		<label class="layui-form-label">桌面图标</label>
		<div class="layui-input-inline">
			<div class="layui-upload-drag" id="dest_icon">
				<div class="icon" style="display:<?php echo !empty($data['dest_icon']) ? 'none'  :  'block'; ?>">
					<i class="layui-icon"></i>
					<p>点击上传，或将文件拖拽到此处</p>
				</div>
				<div class="<?php echo !empty($data['dest_icon']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
					<img src="<?php echo htmlentities($data['dest_icon']); ?>" alt="上传成功后渲染" style="max-width: 196px">
				</div>
			</div>
		</div>
		<div class="layui-form-mid layui-word-aux">请上传jpg、png格式图片</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">默认时区</label>
		<div class="layui-input-inline">
			<select name="default_time_zone" lay-verify="required" lay-search>
				<option value="1" <?php echo $data['default_time_zone']==1 ? 'selected'  :  ''; ?>>(标准时-11:00) 中途岛、萨摩亚群岛</option>
				<option value="2" <?php echo $data['default_time_zone']==2 ? 'selected'  :  ''; ?>>(标准时-10:00) 夏威夷</option>
				<option value="3" <?php echo $data['default_time_zone']==3 ? 'selected'  :  ''; ?>>(标准时-9:00) 阿拉斯加</option>
				<option value="4" <?php echo $data['default_time_zone']==4 ? 'selected'  :  ''; ?>>(标准时-8:00) 太平洋时间(美国和加拿大)</option>
				<option value="5" <?php echo $data['default_time_zone']==5 ? 'selected'  :  ''; ?>>(标准时-7:00) 山地时间(美国和加拿大)</option>
				<option value="6" <?php echo $data['default_time_zone']==6 ? 'selected'  :  ''; ?>>(标准时-6:00) 中部时间(美国和加拿大)、墨西哥城</option>
				<option value="7" <?php echo $data['default_time_zone']==7 ? 'selected'  :  ''; ?>>(标准时-5:00) 东部时间(美国和加拿大)、波哥大</option>
				<option value="8" <?php echo $data['default_time_zone']==8 ? 'selected'  :  ''; ?>>(标准时-4:00) 大西洋时间(加拿大)、加拉加斯</option>
				<option value="9" <?php echo $data['default_time_zone']==9 ? 'selected'  :  ''; ?>>(标准时-3:00) 巴西、布宜诺斯艾利斯、乔治敦</option>
				<option value="10" <?php echo $data['default_time_zone']==10 ? 'selected'  :  ''; ?>>(标准时-2:00) 中大西洋</option>
				<option value="11" <?php echo $data['default_time_zone']==11 ? 'selected'  :  ''; ?>>(标准时-1:00) 亚速尔群岛、佛得角群岛</option>
				<option value="12" <?php echo $data['default_time_zone']==12 ? 'selected'  :  ''; ?>>(格林尼治标准时) 西欧时间、伦敦、卡萨布兰卡</option>
				<option value="13" <?php echo $data['default_time_zone']==13 ? 'selected'  :  ''; ?>>(标准时+1:00) 中欧时间、安哥拉、利比亚</option>
				<option value="14" <?php echo $data['default_time_zone']==14 ? 'selected'  :  ''; ?>>(标准时+2:00) 东欧时间、开罗，雅典</option>
				<option value="15" <?php echo $data['default_time_zone']==15 ? 'selected'  :  ''; ?>>(标准时+3:00) 巴格达、科威特、莫斯科</option>
				<option value="16" <?php echo $data['default_time_zone']==16 ? 'selected'  :  ''; ?>>(标准时+4:00) 阿布扎比、马斯喀特、巴库</option>
				<option value="17" <?php echo $data['default_time_zone']==17 ? 'selected'  :  ''; ?>>(标准时+5:00) 叶卡捷琳堡、伊斯兰堡、卡拉奇</option>
				<option value="18" <?php echo $data['default_time_zone']==18 ? 'selected'  :  ''; ?>>(标准时+6:00) 阿拉木图、 达卡、新亚伯利亚</option>
				<option value="19" <?php echo $data['default_time_zone']==19 ? 'selected'  :  ''; ?>>(标准时+7:00) 曼谷、河内、雅加达</option>
				<option value="20" <?php echo $data['default_time_zone']==20 ? 'selected'  :  ''; ?>>(标准时+8:00)北京、重庆、香港、新加坡</option>
				<option value="21" <?php echo $data['default_time_zone']==21 ? 'selected'  :  ''; ?>>(标准时+9:00) 东京、汉城、大阪、雅库茨克</option>
				<option value="22" <?php echo $data['default_time_zone']==22 ? 'selected'  :  ''; ?>>(标准时+10:00) 悉尼、关岛</option>
				<option value="23" <?php echo $data['default_time_zone']==23 ? 'selected'  :  ''; ?>>(标准时+11:00) 马加丹、索罗门群岛</option>
				<option value="24" <?php echo $data['default_time_zone']==24 ? 'selected'  :  ''; ?>>(标准时+12:00) 奥克兰、惠灵顿、堪察加半岛</option>
			</select>
		</div>
		<div class="layui-form-mid layui-word-aux">默认亚洲/上海[标准时+8]</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">站点状态</label>
		<div class="layui-input-inline">
			<select name="site_status" lay-verify="required" lay-search>
				<option value="1" <?php echo $data['site_status']==1 ? 'selected'  :  ''; ?>>关闭</option>
				<option value="2" <?php echo $data['site_status']==2 ? 'selected'  :  ''; ?>>开启</option>
			</select>
		</div>
    	<div class="layui-form-mid layui-word-aux">可暂时将站点关闭，其他人无法访问，但不影响管理员访问后台</div>
	</div>

	<div class="layui-form-item textarea">
		<label class="layui-form-label">关闭原因</label>
		<div class="layui-input-inline">
			<textarea name="closed_reason" placeholder="关闭原因" class="layui-textarea"><?php echo htmlentities($data['closed_reason']); ?></textarea>
		</div>
		<div class="layui-form-mid layui-word-aux">支持html，当网站处于关闭状态时，关闭原因将显示在前台</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">页面最大宽度</label>
		<div class="layui-input-inline">
			<input type="number" name="page_max_width" value="<?php echo htmlentities($data['page_max_width']); ?>" lay-verify="required" placeholder="请填站点名称" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">页面最大宽度，单位px，0则100%</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">css/js版本标记</label>
		<div class="layui-input-inline">
			<input type="text" name="version_mark" value="<?php echo htmlentities($data['version_mark']); ?>" placeholder="请填站点名称" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">用于css/js浏览器缓存版本识别</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">ICP证书号</label>
		<div class="layui-input-inline">
			<input type="text" name="icp_certificate" value="<?php echo htmlentities($data['icp_certificate']); ?>" placeholder="请填站点名称" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">ICP域名备案号</div>
	</div>

	<div class="layui-form-item textarea">
		<label class="layui-form-label">底部代码</label>
		<div class="layui-input-inline">
			<textarea name="bottom_code" placeholder="底部代码" class="layui-textarea"><?php echo htmlentities($data['bottom_code']); ?></textarea>
		</div>
		<div class="layui-form-mid layui-word-aux">支持html，可用于添加流量统计代码</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="baseSetting">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; case "2": ?>
						

<form class="layui-form layui-form-pane" action="">

		<div class="layui-form-item image">
		<label class="layui-form-label">用户注册背景图片</label>
		<div class="layui-input-inline">
			<div class="layui-upload-drag" id="register_bg">
				<div class="icon" style="display:<?php echo !empty($data['register_bg']) ? 'none'  :  'block'; ?>">
					<i class="layui-icon"></i>
					<p>点击上传，或将文件拖拽到此处</p>
				</div>
				<div class="<?php echo !empty($data['register_bg']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
					<img src="<?php echo htmlentities($data['register_bg']); ?>" alt="上传成功后渲染" style="max-width: 196px">
				</div>
			</div>
		</div>
		<div class="layui-form-mid layui-word-aux">可自定义背景图片，请上传jpg、png、gif格式图片；默认底灰色。</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">是否开启注册</label>
		<div class="layui-input-inline">
			<select name="is_open_register" xm-select="select1" multiple="" lay-search>
				<option value="1" <?php echo $data['is_open_register'] ? (in_array(1,$data['is_open_register']) ? 'selected' : '') : ''; ?>>短信</option>
				<option value="2" <?php echo $data['is_open_register'] ? (in_array(2,$data['is_open_register']) ? 'selected' : '') : ''; ?>>邮箱</option>
				<option value="3" <?php echo $data['is_open_register'] ? (in_array(3,$data['is_open_register']) ? 'selected' : '') : ''; ?>>用户名</option>
			</select>
		</div>
		<div class="layui-form-mid layui-word-aux">关闭注册后，前端站点将无法注册，可选择 [ 短信, 邮箱, 用户名 ]</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">用户注册图片验证码</label>
		<div class="layui-input-inline">
			<select name="img_proving" lay-verify="required" lay-search>
				<option value="1" <?php echo $data['img_proving']==1 ? 'selected'  :  ''; ?>>关闭</option>
				<option value="2" <?php echo $data['img_proving']==2 ? 'selected'  :  ''; ?>>开启</option>
			</select>
		</div>
    	<div class="layui-form-mid layui-word-aux">可以防止非法注册</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">用户注册开启审核</label>
		<div class="layui-input-inline">
			<select name="open_auditing" lay-verify="required" lay-search>
				<option value="1" <?php echo $data['open_auditing']==1 ? 'selected'  :  ''; ?>>否</option>
				<option value="2" <?php echo $data['open_auditing']==2 ? 'selected'  :  ''; ?>>是</option>
			</select>
		</div>
    	<div class="layui-form-mid layui-word-aux">开启后用户注册需要审核通过方可登录</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">用户注册协议</label>
		<div class="layui-input-inline">
			<select name="register_agreement" lay-verify="required" lay-search>
				<option value="1" <?php echo $data['register_agreement']==1 ? 'selected'  :  ''; ?>>关闭</option>
				<option value="2" <?php echo $data['register_agreement']==2 ? 'selected'  :  ''; ?>>开启</option>
			</select>
		</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="userRegister">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; case "3": ?>
						<div class="tip">左侧图片最多可上传3张图片、每次随机展示其中一张<i class="iconfont iconclose"></i></div>

<form class="layui-form layui-form-pane" action="">
	<div class="group">
		<div class="title">图片1</div>

		<div class="content">
			<div class="layui-form-item image">
				<label class="layui-form-label">图片</label>
				<div class="layui-input-inline">
					<div class="layui-upload-drag" id="login_pic1">
						<div class="icon" style="display:<?php echo !empty($data['login_pic1']) ? 'none'  :  'block'; ?>">
							<i class="layui-icon"></i>
							<p>点击上传，或将文件拖拽到此处</p>
						</div>
						<div class="<?php echo !empty($data['login_pic1']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
							<img src="<?php echo htmlentities($data['login_pic1']); ?>" alt="上传成功后渲染" style="max-width: 196px">
						</div>
					</div>
				</div>
				<div class="layui-form-mid layui-word-aux">图片1 [ 建议使用 450X350 像数 ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">url地址</label>
				<div class="layui-input-inline">
					<input type="text" name="login_url1" value="<?php echo htmlentities($data['login_url1']); ?>" placeholder="url地址" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux">地址1 [ 带http://或https:// ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">背景色</label>
				<div class="layui-input-inline" style="width: 60%;">
					<div class="layui-input-inline" style="width: 538px;">
						<input type="text" name="login_color1" value="<?php echo htmlentities($data['login_color1']); ?>" disabled placeholder="请选择颜色" class="layui-input color" id="login_color1">
					</div>
					<div class="layui-inline" style="left: -11px;">
						<div id="login_color_selector1"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="group">
		<div class="title">图片2</div>

		<div class="content">
			<div class="layui-form-item image">
				<label class="layui-form-label">图片</label>
				<div class="layui-input-inline">
					<div class="layui-upload-drag" id="login_pic2">
						<div class="icon" style="display:<?php echo !empty($data['login_pic2']) ? 'none'  :  'block'; ?>">
							<i class="layui-icon"></i>
							<p>点击上传，或将文件拖拽到此处</p>
						</div>
						<div class="<?php echo !empty($data['login_pic2']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
							<img src="<?php echo htmlentities($data['login_pic2']); ?>" alt="上传成功后渲染" style="max-width: 196px">
						</div>
					</div>
				</div>
				<div class="layui-form-mid layui-word-aux">图片2 [ 建议使用 450X350 像数 ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">url地址</label>
				<div class="layui-input-inline">
					<input type="text" name="login_url2" value="<?php echo htmlentities($data['login_url2']); ?>" placeholder="url地址" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux">地址2 [ 带http://或https:// ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">背景色</label>
				<div class="layui-input-inline" style="width: 60%;">
					<div class="layui-input-inline" style="width: 538px;">
						<input type="text" name="login_color2" value="<?php echo htmlentities($data['login_color2']); ?>" disabled placeholder="请选择颜色" class="layui-input color" id="login_color2">
					</div>
					<div class="layui-inline" style="left: -11px;">
						<div id="login_color_selector2"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="group">
		<div class="title">图片3</div>

		<div class="content">
			<div class="layui-form-item image">
				<label class="layui-form-label">图片</label>
				<div class="layui-input-inline">
					<div class="layui-upload-drag" id="login_pic3">
						<div class="icon" style="display:<?php echo !empty($data['login_pic3']) ? 'none'  :  'block'; ?>">
							<i class="layui-icon"></i>
							<p>点击上传，或将文件拖拽到此处</p>
						</div>
						<div class="<?php echo !empty($data['login_pic3']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
							<img src="<?php echo htmlentities($data['login_pic3']); ?>" alt="上传成功后渲染" style="max-width: 196px">
						</div>
					</div>
				</div>
				<div class="layui-form-mid layui-word-aux">图片3 [ 建议使用 450X350 像数 ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">url地址</label>
				<div class="layui-input-inline">
					<input type="text" name="login_url3" value="<?php echo htmlentities($data['login_url3']); ?>" placeholder="url地址" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux">地址3 [ 带http://或https:// ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">背景色</label>
				<div class="layui-input-inline" style="width: 60%;">
					<div class="layui-input-inline" style="width: 538px;">
						<input type="text" name="login_color3" value="<?php echo htmlentities($data['login_color3']); ?>" disabled placeholder="请选择颜色" class="layui-input color" id="login_color3">
					</div>
					<div class="layui-inline" style="left: -11px;">
						<div id="login_color_selector3"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">是否开启登录</label>
		<div class="layui-input-inline">
			<select name="is_open_login" lay-verify="required" lay-search>
				<option value="1" <?php echo $data['is_open_login']==1 ? 'selected'  :  ''; ?>>关闭</option>
				<option value="2" <?php echo $data['is_open_login']==2 ? 'selected'  :  ''; ?>>开启</option>
			</select>
		</div>
		<div class="layui-form-mid layui-word-aux">关闭后，前端站点将无法登录</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">登录图片验证码</label>
		<div class="layui-input-inline">
			<select name="login_pic_code" lay-verify="required" lay-search>
				<option value="1" <?php echo $data['login_pic_code']==1 ? 'selected'  :  ''; ?>>关闭</option>
				<option value="2" {data.login_pic_code == 2 ? 'selected' : ''}>开启</option>
			</select>
		</div>
		<div class="layui-form-mid layui-word-aux">可以防止非法登录</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="userLogin">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; case "4": ?>
						<div class="tip">左侧图片最多可上传3张图片、每次随机展示其中一张<i class="iconfont iconclose"></i></div>

<form class="layui-form layui-form-pane" action="">
	<div class="group">
		<div class="title">图片1</div>

		<div class="content">
			<div class="layui-form-item image">
				<label class="layui-form-label">图片</label>
				<div class="layui-input-inline">
					<div class="layui-upload-drag" id="login_pic1">
						<div class="icon" style="display:<?php echo !empty($data['login_pic1']) ? 'none'  :  'block'; ?>">
							<i class="layui-icon"></i>
							<p>点击上传，或将文件拖拽到此处</p>
						</div>
						<div class="<?php echo !empty($data['login_pic1']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
							<img src="<?php echo htmlentities($data['login_pic1']); ?>" alt="上传成功后渲染" style="max-width: 196px">
						</div>
					</div>
				</div>
				<div class="layui-form-mid layui-word-aux">图片1 [ 建议使用 450X350 像数 ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">url地址</label>
				<div class="layui-input-inline">
					<input type="text" name="login_url1" value="<?php echo htmlentities($data['login_url1']); ?>" placeholder="url地址" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux">地址1 [ 带http://或https:// ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">背景色</label>
				<div class="layui-input-inline" style="width: 60%;">
					<div class="layui-input-inline" style="width: 538px;">
						<input type="text" name="login_color1" value="<?php echo htmlentities($data['login_color1']); ?>" disabled placeholder="请选择颜色" class="layui-input color" id="login_color1">
					</div>
					<div class="layui-inline" style="left: -11px;">
						<div id="login_color_selector1"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="group">
		<div class="title">图片2</div>

		<div class="content">
			<div class="layui-form-item image">
				<label class="layui-form-label">图片</label>
				<div class="layui-input-inline">
					<div class="layui-upload-drag" id="login_pic2">
						<div class="icon" style="display:<?php echo !empty($data['login_pic2']) ? 'none'  :  'block'; ?>">
							<i class="layui-icon"></i>
							<p>点击上传，或将文件拖拽到此处</p>
						</div>
						<div class="<?php echo !empty($data['login_pic2']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
							<img src="<?php echo htmlentities($data['login_pic2']); ?>" alt="上传成功后渲染" style="max-width: 196px">
						</div>
					</div>
				</div>
				<div class="layui-form-mid layui-word-aux">图片2 [ 建议使用 450X350 像数 ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">url地址</label>
				<div class="layui-input-inline">
					<input type="text" name="login_url2" value="<?php echo htmlentities($data['login_url2']); ?>" placeholder="url地址" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux">地址2 [ 带http://或https:// ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">背景色</label>
				<div class="layui-input-inline" style="width: 60%;">
					<div class="layui-input-inline" style="width: 538px;">
						<input type="text" name="login_color2" value="<?php echo htmlentities($data['login_color2']); ?>" disabled placeholder="请选择颜色" class="layui-input color" id="login_color2">
					</div>
					<div class="layui-inline" style="left: -11px;">
						<div id="login_color_selector2"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="group">
		<div class="title">图片3</div>

		<div class="content">
			<div class="layui-form-item image">
				<label class="layui-form-label">图片</label>
				<div class="layui-input-inline">
					<div class="layui-upload-drag" id="login_pic3">
						<div class="icon" style="display:<?php echo !empty($data['login_pic3']) ? 'none'  :  'block'; ?>">
							<i class="layui-icon"></i>
							<p>点击上传，或将文件拖拽到此处</p>
						</div>
						<div class="<?php echo !empty($data['login_pic3']) ? ''  :  'layui-hide'; ?>" id="uploadDemoView">
							<img src="<?php echo htmlentities($data['login_pic3']); ?>" alt="上传成功后渲染" style="max-width: 196px">
						</div>
					</div>
				</div>
				<div class="layui-form-mid layui-word-aux">图片3 [ 建议使用 450X350 像数 ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">url地址</label>
				<div class="layui-input-inline">
					<input type="text" name="login_url3" value="<?php echo htmlentities($data['login_url3']); ?>" placeholder="url地址" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux">地址3 [ 带http://或https:// ]</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">背景色</label>
				<div class="layui-input-inline" style="width: 60%;">
					<div class="layui-input-inline" style="width: 538px;">
						<input type="text" name="login_color3" value="<?php echo htmlentities($data['login_color3']); ?>" disabled placeholder="请选择颜色" class="layui-input color" id="login_color3">
					</div>
					<div class="layui-inline" style="left: -11px;">
						<div id="login_color_selector3"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="passwordFind">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; case "5": ?>
						<form class="layui-form layui-form-pane" action="">
	<div class="layui-form-item">
		<label class="layui-form-label">图片最大限制</label>
		<div class="layui-input-inline">
			<input type="number" name="pic_max_limit" value="<?php echo htmlentities($data['pic_max_limit']); ?>" lay-verify="required" placeholder="请填图片最大限制" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">单位B [上传图片还受到服务器空间PHP配置最大上传 20M 限制]</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">文件最大限制</label>
		<div class="layui-input-inline">
			<input type="number" name="file_max_limit" value="<?php echo htmlentities($data['file_max_limit']); ?>" lay-verify="required" placeholder="请填文件最大限制" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">单位B [上传文件还受到服务器空间PHP配置最大上传 20M 限制]</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">视频最大限制</label>
		<div class="layui-input-inline">
			<input type="number" name="video_max_limit" value="<?php echo htmlentities($data['video_max_limit']); ?>" lay-verify="required" placeholder="请填视频最大限制" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">单位B [上传视频还受到服务器空间PHP配置最大上传 20M 限制]</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="accessory">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; case "6": ?>
						<form class="layui-form layui-form-pane" action="">
	<div class="layui-form-item">
		<label class="layui-form-label">验证码有效时间</label>
		<div class="layui-input-inline">
			<input type="number" name="code_valid_time" value="<?php echo htmlentities($data['code_valid_time']); ?>" lay-verify="required" placeholder="请填验证码有效时间" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">验证码过期时间，一般10分钟左右，单位 [秒]</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">获取验证码时间间隔</label>
		<div class="layui-input-inline">
			<input type="number" name="achieve_time_spacing" value="<?php echo htmlentities($data['achieve_time_spacing']); ?>" lay-verify="required" placeholder="请填获取验证码时间间隔" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">防止频繁获取验证码，一般在 30~120 秒之间，单位 [秒]</div>
	</div>

	<div class="layui-form-item">
    	<label class="layui-form-label">获取验证码-开启图片验证码</label>
		<div class="layui-input-inline">
			<select name="is_open_pic_identify" lay-verify="required" lay-search>
				<option value="1" <?php echo $data['is_open_pic_identify']==1 ? 'selected'  :  ''; ?>>关闭</option>
				<option value="2" <?php echo $data['is_open_pic_identify']==2 ? 'selected'  :  ''; ?>>开启</option>
			</select>
		</div>
    	<div class="layui-form-mid layui-word-aux">防止短信轰炸</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">图片验证码规则</label>
		<div class="layui-input-inline">
			<select name="pic_code_regulation" xm-select="select1" multiple="" lay-search>
				<option value="1" <?php echo $data['pic_code_regulation'] ? (in_array(1,$data['pic_code_regulation']) ? 'selected' : '') : ''; ?>>彩色背景</option>
				<option value="2" <?php echo $data['pic_code_regulation'] ? (in_array(2,$data['pic_code_regulation']) ? 'selected' : '') : ''; ?>>彩色文字</option>
				<option value="3" <?php echo $data['pic_code_regulation'] ? (in_array(3,$data['pic_code_regulation']) ? 'selected' : '') : ''; ?>>干扰点</option>
				<option value="4" <?php echo $data['pic_code_regulation'] ? (in_array(4,$data['pic_code_regulation']) ? 'selected' : '') : ''; ?>>干扰线</option>
			</select>
		</div>
		<div class="layui-form-mid layui-word-aux">默认白底黑字，可根据需求i加大验证码识别难度</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="picIdentifyingCode">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; case "7": ?>
						<form class="layui-form layui-form-pane" action="">
	
	<div class="layui-form-item textarea">
		<label class="layui-form-label">仅退款原因</label>
		<div class="layui-input-inline">
			<textarea name="only_refundment_reason" placeholder="填写仅退款原因" class="layui-textarea"><?php echo htmlentities($data['only_refundment_reason']); ?></textarea>
		</div>
		<div class="layui-form-mid layui-word-aux">可换行，一行一个</div>
	</div>

	<div class="layui-form-item textarea">
		<label class="layui-form-label">退货退款原因</label>
		<div class="layui-input-inline">
			<textarea name="refundment_returngoods_reason" placeholder="填写退货退款原因" class="layui-textarea"><?php echo htmlentities($data['refundment_returngoods_reason']); ?></textarea>
		</div>
		<div class="layui-form-mid layui-word-aux">可换行，一行一个</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">退货地址</label>
		<div class="layui-input-inline">
			<input type="text" name="returngoods_address" value="<?php echo htmlentities($data['returngoods_address']); ?>" placeholder="填写退货地址" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">用户退货货物收货地址</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="orderingService">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; case "8": ?>
						<form class="layui-form layui-form-pane" action="">

	<div class="layui-form-item">
		<label class="layui-form-label">站点状态</label>
		<div class="layui-input-inline">
			<select name="site_status" lay-verify="required" lay-search>
				<option value="1" <?php echo $data['site_status']==1 ? 'selected'  :  ''; ?>>关闭</option>
				<option value="2" <?php echo $data['site_status']==2 ? 'selected'  :  ''; ?>>自动</option>
				<option value="3" <?php echo $data['site_status']==3 ? 'selected'  :  ''; ?>>自定义</option>
			</select>
		</div>
		<div class="layui-form-mid layui-word-aux">可暂时将站点关闭，其他人无法访问，但不影响管理员访问后台</div>
	</div>

	<div class="layui-form-item">
		<label class="layui-form-label">搜索关键字</label>
		<div class="layui-input-inline">
			<div class="add-search-key">
				<div class="search-key-input" contenteditable="true"></div>
				<button type="button">添加</button>
			</div>
			<div class="added-search-key">
				<?php if(is_array($data['search_key']) || $data['search_key'] instanceof \think\Collection || $data['search_key'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['search_key'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<div class='search-key-item'>
					<span><?php echo htmlentities($vo); ?></span>
					<input type='hidden' name='item<?php echo htmlentities($i); ?>' mydata='<?php echo htmlentities($i); ?>' value='<?php echo htmlentities($vo); ?>'>
					<i class='iconfont iconclose1 closeItem'></i>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="layui-form-mid layui-word-aux">搜索框下热门关键字（输入回车）</div>
	</div>

	<div class="layui-form-item">
	    <div class="layui-input-block">
	    	<button class="layui-btn" lay-submit lay-filter="search">立即提交</button>
	    </div>
	</div>
</form>
					<?php break; ?>
				<?php endswitch; ?>
			</div>
		</div>
	</div>

		<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


<?php switch($tab): case "1": ?>
		<script src="/static/admin/js/site_configure/site_setting/base_configure.js"></script>
	<?php break; case "2": ?>
		<script src="/static/admin/lib/layui/formSelects-v4.js"></script>
		<script src="/static/admin/js/site_configure/site_setting/user_register.js"></script>
	<?php break; case "3": ?>
		<script src="/static/admin/js/site_configure/site_setting/user_login.js"></script>
	<?php break; case "4": ?>
		<script src="/static/admin/js/site_configure/site_setting/password_find.js"></script>
	<?php break; case "5": ?>
		<script src="/static/admin/js/site_configure/site_setting/accessory.js"></script>
	<?php break; case "6": ?>
		<script src="/static/admin/lib/layui/formSelects-v4.js"></script>
		<script src="/static/admin/js/site_configure/site_setting/pic_identifying_code.js"></script>
	<?php break; case "7": ?>
		<script src="/static/admin/js/site_configure/site_setting/ordering_service.js"></script>
	<?php break; case "8": ?>
		<script src="/static/admin/js/site_configure/site_setting/search.js"></script>
	<?php break; ?>
<?php endswitch; ?>
</body>
</html>