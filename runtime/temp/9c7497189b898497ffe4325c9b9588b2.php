<?php /*a:3:{s:83:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\goods_list\add_goods.html";i:1603980796;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\header.html";i:1596722374;s:76:"D:\soft\phpstudy_pro\WWW\mall\tp51\application\admin\view\public\footer.html";i:1596723097;}*/ ?>
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


<link rel="stylesheet" href="/static/admin/lib/layui/css/formSelects-v4.css" />
<link rel="stylesheet" href="/static/admin/common/fonts/fonts-lib/iconfont.css" />
<link rel="stylesheet" href="/static/admin/css/goods_manage/goods_list.css" />
</head>
<body>
	<div class="found-top">
		<div class="return-page"><i class="iconfont iconreturn"></i><span>返回</span></div>
		<div class="title">新增商品</div>
	</div>

	<div class="layer-container">
		<form class="layui-form layui-form-pane" action="">
			<!-- 用户id -->
			
			<input type="hidden" name="id" value="">
			
			
			<div class="second-container">
				<div class="title">基础信息</div>
				<div class="layui-form-item">
					<label class="layui-form-label">标题名称</label>
					<div class="layui-input-inline">
						<input type="text" name="name" value="" lay-verify="required" placeholder="填写标题名称" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">商品简述</label>
					<div class="layui-input-inline">
						<input type="text" name="summary" value="" placeholder="填写商品简述" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">商品型号</label>
					<div class="layui-input-inline">
						<input type="text" name="model" value="" placeholder="填写商品型号" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">商品分类</label>
					<div class="layui-input-inline">
						<select name="classify" xm-select="select1" multiple="" lay-search="">
							<?php if(is_array($goodsClassify) || $goodsClassify instanceof \think\Collection || $goodsClassify instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsClassify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$first): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo htmlentities($first['id']); ?>" ><?php echo htmlentities($first['name']); ?></option>
								<?php if(is_array($first['second']) || $first['second'] instanceof \think\Collection || $first['second'] instanceof \think\Paginator): $i = 0; $__LIST__ = $first['second'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$second): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo htmlentities($second['id']); ?>" ><?php echo htmlentities($first['name']); ?>-<?php echo htmlentities($second['name']); ?></option>
									<?php if(is_array($second['third']) || $second['third'] instanceof \think\Collection || $second['third'] instanceof \think\Paginator): $i = 0; $__LIST__ = $second['third'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$third): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo htmlentities($third['id']); ?>" ><?php echo htmlentities($first['name']); ?>-<?php echo htmlentities($second['name']); ?>-<?php echo htmlentities($third['name']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">品牌</label>
					<div class="layui-input-inline">
						<select name="brand" lay-search>
							<option value="">请选择品牌</option>
							<?php if(is_array($brandClassifys) || $brandClassifys instanceof \think\Collection || $brandClassifys instanceof \think\Paginator): $i = 0; $__LIST__ = $brandClassifys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$classify): $mod = ($i % 2 );++$i;?>
							<optgroup label="<?php echo htmlentities($classify['name']); ?>">
								<?php if(is_array($classify['brandList']) || $classify['brandList'] instanceof \think\Collection || $classify['brandList'] instanceof \think\Paginator): $i = 0; $__LIST__ = $classify['brandList'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?>
								<option value="<?php echo htmlentities($brand['id']); ?>"><?php echo htmlentities($brand['name']); ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</optgroup>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">生产地</label>
					<div class="layui-input-inline">
						<select name="yieldly" lay-search>
							<option value="">请选择生产地</option>
							<?php if(is_array($area) || $area instanceof \think\Collection || $area instanceof \think\Paginator): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['name']); ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>  
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">库存单位</label>
					<div class="layui-input-inline">
						<input type="text" name="repertory_unit" value="" lay-verify="required" placeholder="填写库存单位" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">购买赠送积分</label>
					<div class="layui-input-inline">
						<input type="number" name="point" value="0" placeholder="填写购买赠送积分" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">最低起购数量</label>
					<div class="layui-input-inline">
						<input type="number" name="min_buy_num" value="1" placeholder="默认数值 1" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">最大购买数量</label>
					<div class="layui-input-inline">
						<input type="number" name="max_buy_num" value="" placeholder="填写单次最大购买数量" autocomplete="off" class="layui-input">
					</div>
				</div>
				
				<div class="radio">
					<div class="layui-form-item" pane>
						<label class="layui-form-label">扣减库存</label>
						<div class="layui-input-inline">
							<input type="radio" name="reduce_repertory" value="1" title="扣减" >
							<input type="radio" name="reduce_repertory" value="2" title="不变" >
						</div>
					</div>

					<div class="layui-form-item" pane>
						<label class="layui-form-label">上下架</label>
						<div class="layui-input-inline">
							<input type="radio" name="is_sell" value="1" title="上架" >
							<input type="radio" name="is_sell" value="2" title="下架" >
						</div>
					</div>

					<div class="layui-form-item" pane>
						<label class="layui-form-label">首页推荐</label>
						<div class="layui-input-inline">
							<input type="radio" name="is_recommend" value="1" title="推荐" >
							<input type="radio" name="is_recommend" value="2" title="默认" >
						</div>
					</div>
				</div>

				<div class="layui-form-item home-img">
					<label class="layui-form-label">首页推荐图片</label>
					<div class="layui-input-inline">
						<div class="layui-upload-drag image" id="home-img">
							<div class="icon" style="display:">
								<i class="layui-icon"></i>
								<p>点击上传</p>
							</div>
							<div class="layui-hide" id="uploadDemoView">
								<img src="" alt="上传成功后渲染" >
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="second-container">
				<div class="title">商品规格</div>
				<table>
					<thead>
						<tr>
							<th>图片</th>
							<th>价格(元)</th>
							<th>库存</th>
							<th>重量(kg)</th>
							<th>规格编码</th>
							<th>条形码</th>
							<th>原价(元)</th>
							<th>操作</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>
								<div class="layui-upload-drag shop-format image" id="shop-format">
									<div class="icon" style="display:">
										<i class="layui-icon"></i>
										<p>点击上传</p>
									</div>
									<div class="layui-hide" id="uploadDemoView">
										<img src="" alt="上传成功后渲染" >
									</div>
								</div>
							</td>

							<td>
								<input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
							</td>

							<td>
								<input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
							</td>

							<td>
								<span><input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input"></span>
							</td>

							<td>
								<span><input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input"></span>
							</td>

							<td>
								<input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
							</td>

							<td>
								<input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
							</td>
							<td>
								<button type="button" data-id="" class="layui-btn layui-btn-xs preview">复制</button>
								<button type="button" data-id="" class="layui-btn layui-btn-xs layui-bg-red edit" style="margin:0">移除</button>
							</td>
						</tr>

					</tbody>

					<tfoot>
						<tr>
							<td colspan="8">
								<span>添加一行</span>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>

			<div class="second-container">
				<div class="title">商品相册</div>
				<div class="layui-form-item shop-album">
 
					<div class="layui-inline">
						<div class="layui-input-inline">
							<div class="layui-upload-drag  image" id="goods-album1">
								<div class="icon" style="display:">
									<i class="layui-icon"></i>
									<p>点击上传</p>
								</div>
								<div class="layui-hide" id="uploadDemoView">
									<img src="" alt="上传成功后渲染" >
								</div>
							</div>
						</div>
					</div>
				  
					<div class="layui-inline">
						<div class="layui-input-inline">
							<div class="layui-upload-drag image" id="goods-album2">
								<div class="icon" style="display:">
									<i class="layui-icon"></i>
									<p>点击上传</p>
								</div>
								<div class="layui-hide" id="uploadDemoView">
									<img src="" alt="上传成功后渲染" >
								</div>
							</div>
						</div>
					</div>

					<div class="layui-inline">
						<div class="layui-input-inline">
							<div class="layui-upload-drag image" id="goods-album3">
								<div class="icon" style="display:">
									<i class="layui-icon"></i>
									<p>点击上传</p>
								</div>
								<div class="layui-hide" id="uploadDemoView">
									<img src="" alt="上传成功后渲染" >
								</div>
							</div>
						</div>
					</div>

					<div class="layui-inline">
						<div class="layui-input-inline">
							<div class="layui-upload-drag image" id="goods-album4">
								<div class="icon" style="display:">
									<i class="layui-icon"></i>
									<p>点击上传</p>
								</div>
								<div class="layui-hide" id="uploadDemoView">
									<img src="" alt="上传成功后渲染" >
								</div>
							</div>
						</div>
					</div>

					<div class="layui-inline">
						<div class="layui-input-inline">
							<div class="layui-upload-drag image" id="goods-album5">
								<div class="icon" style="display:">
									<i class="layui-icon"></i>
									<p>点击上传</p>
								</div>
								<div class="layui-hide" id="uploadDemoView">
									<img src="" alt="上传成功后渲染" >
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="second-container">
				<div class="title">商品视频</div>
				<div class="layui-upload-drag shop-video" id="goods-video">
					<div class="icon" style="display:">
						<i class="layui-icon"></i>
						<p>点击上传</p>
					</div>
					<div class="layui-hide" id="uploadDemoView">
						<img src="" alt="上传成功后渲染" >
					</div>
				</div>
			</div>

			<div class="second-container shop-detail">
				<div class="title">商品详情</div>
				<script id="agreement-mange" name="agreement_mange" type="text/plain"></script>
			</div>

			<div class="second-container">
				<div class="title">SEO基础信息</div>
				<div class="layui-form-item">
					<label class="layui-form-label">SEO标题</label>
					<div class="layui-input-inline">
						<input type="text" name="name" value="" lay-verify="required" placeholder="填写SEO标题" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">SEO关键字</label>
					<div class="layui-input-inline">
						<input type="text" name="summary" value="" lay-verify="required" placeholder="填写SEO关键字" autocomplete="off" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item textarea">
					<label class="layui-form-label">SEO描述</label>
					<div class="layui-input-inline">
						<textarea name="seo_describe" placeholder="一般不超过200个字符" class="layui-textarea"></textarea>
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

	
	<script src="/static/admin/lib/layui/formSelects-v4.js"></script>
	<script type="text/javascript" charset="gbk" src="/static/admin/lib/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="gbk" src="/static/admin/lib/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript" charset="gbk" src="/static/admin/lib/ueditor/lang/zh-cn/zh-cn.js"></script>
	<script src="/static/admin/js/goods_manage/add_goods.js"></script>

	<script type="text/javascript">

		$(function(){

			// function htmlRestore(str) {
			// 	var s = "";
			// 	if (str.length === 0) {
			// 		return "";
			// 	}
			// 	s = str.replace(/&amp;/g, "&");
			// 	s = s.replace(/&lt;/g, "<");
			// 	s = s.replace(/&gt;/g, ">");
			// 	s = s.replace(/&nbsp;/g, " ");
			// 	s = s.replace(/&#39;/g, "\'");
			// 	s = s.replace(/&quot;/g, "\"");
			// 	return s;
			// }

			// 通用-邮件模板
			var agreementMange = UE.getEditor('agreement-mange',{
				initialFrameHeight: 500,
				autoHeightEnabled: false
			});

			// agreementMange.ready(function() {
			// 	var html = htmlRestore('');
			// 	agreementMange.setContent(html);
			// });


			// layui.use(['layer', 'form'], function(){
			// 	var layer = layui.layer,
			// 		form = layui.form;

			// 	form.on('submit(agreementMange)', function(data){

			// 		var field = data.field;

			// 		console.log(field);

			// 		$.post("/admin/agreement_mange/saveAgreementMange",field,function(res){

			// 			if(res.code === 1){
			// 				layer.msg(res.msg);
			// 			}else{
			// 				layer.msg(res.msg);
			// 			}
			// 		});
			// 		return false;
			// 	});
			// });
		});

	</script>
</body>
</html>