<?php /*a:3:{s:79:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\brand_list\index.html";i:1603464241;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/brand_manage/brand_list.css" />
</head>
<body>

	<!-- 搜索和新增 -->
	<div class="top">
		<form class="layui-form" action="/admin/brand_list/search" method="get">
			<div class="layui-form-item">
				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<input type="text" name="name" placeholder="名称" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<select name="is_start">
							<option value="">是否启用</option>
							<option value="1">启用</option>
							<option value="2">停用</option>
						</select>
					</div>
				</div>

				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<select name="classify">
							<option value="">品牌分类</option>
							<?php if(is_array($brandClassify) || $brandClassify instanceof \think\Collection || $brandClassify instanceof \think\Paginator): $i = 0; $__LIST__ = $brandClassify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['name']); ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>
	 
				<div class="layui-inline">
					<div class="layui-input-inline" style="width: 180px;">
						<input type="text" name="date" class="layui-input" id="date" placeholder="选择日期">
					</div>
				</div>

				 <div class="layui-inline">
					<div class="layui-input-inline" style="width: 66px;">
						<button class="layui-btn" lay-submit lay-filter="search">搜索</button>
					</div>
					<div class="layui-input-inline" style="width: 66px;">
						<button type="reset" class="layui-btn layui-btn-primary">清空</button>
					</div>
				</div>

			</div>
		</form>
		
		<span>
			<button type="button" class="layui-btn add"><i class="layui-icon">&#xe608;</i> 新增</button>
		</span>
	</div>

	<!-- 数据表格 -->
	<table>
		<thead>
			<tr>
				<th style="width:60px">序列</th>
				<th style="width:170px">名称</th>
				<th style="width:150px">LOGO</th>
				<th style="width:150px">品牌分类</th>
				<th style="width:300px">官网地址</th>
				<th style="width:100px">是否启用</th>
				<th style="width:200px">创建时间</th>
				<th style="width:200px">操作</th>
			</tr>
		</thead>

		<tbody>
			<?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
			<tr>
				<td><?php echo htmlentities($num++); ?></td>
				<td><?php echo htmlentities($data['name']); ?></td>
				<?php if($data['logo_img'] == ""): ?>
					<td class="no-has">无logo</td>
				<?php else: ?>
					<td class="logo"><img src="<?php echo htmlentities($data['logo_img']); ?>"></td>
				<?php endif; ?>
				<td><?php echo htmlentities($data['classify']); ?></td>
				<?php if($data['logo_img'] == ""): ?>
					<td class="no-has">无网站</td>
				<?php else: ?>
					<td><div class="website"><?php echo htmlentities($data['website']); ?></div></td>
				<?php endif; ?>
				
				<td><span class="<?php echo $data['is_start']==1 ? 'start'  :  'stop'; ?>"><?php echo $data['is_start']==1 ? '启用'  :  '停用'; ?></span></td>
				<td><?php echo date('Y-m-d H:i:s',$data['create_time']); ?></td>
				<td>
					<button type="button" data-id="<?php echo htmlentities($data['id']); ?>" class="layui-btn layui-btn-xs edit">编辑</button>
					<button type="button" data-id="<?php echo htmlentities($data['id']); ?>" class="layui-btn layui-btn-xs layui-btn-danger del">删除</button>
				</td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

		<tfoot>
			<tr>
				<td colspan="8">
					<?php echo $page; ?>
				</td>
			</tr>
		</tfoot>
	</table>
	
			<script src="/static/admin/lib/jquery-3.5.1.js"></script>
		<script src="/static/admin/lib/layui/layui.js"></script>
		<!-- <script src="/static/admin/lib/layui/formSelects-v4.js"></script> -->
		<!-- <script src="/static/admin/lib/echarts.js"></script> -->
		<!-- <script src="/static/admin/js/[my_js].js"></script> -->


	<script src="/static/admin/js/brand_manage/brand_list.js"></script>

</body>
</html>