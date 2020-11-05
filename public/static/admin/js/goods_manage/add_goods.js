$(function(){

	// 返回上一级
	$('.return-page').click(function(){
		location.href="/admin/goods_list/index";
	});

	layui.use(['layer', 'form', 'upload'], function(){
		var layer = layui.layer,
			form = layui.form,
			upload = layui.upload;


		// 上传图片
		var elem = "";
		$(".image").click(function(){
			elem = "#"+$(this).attr("id");
			console.log(elem);
		});

		upload.render({ 
			elem: '.image',
			url: '/admin/goods_list/uploadImg',
			field: 'img',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png|gif',
			done: function(res){
				if(res.code == 1){
					if($(elem+" .icon")){
						$(elem+" .icon").remove();
					}
					layui.$(elem).children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
				}else{
					layer.msg("图片上传失败，请重试");
				}
				
			}
		});

		// 添加规格
		$(".add-format").click(function(){
			var num = parseInt($(this).attr("data-num"))+1;
			$(this).attr("data-num", num);

			var emptyHtml = '<tr><td><div class="layui-upload-drag shop-format image" id="shop-format1"><div class="icon"><i class="layui-icon"></i><p>点击上传</p></div><div class="layui-hide" id="uploadDemoView"><img src="" alt="上传成功后渲染" ></div></div></td><td><input type="number" name="price" required  lay-verify="required" placeholder="请输入价格(元)" autocomplete="off" class="layui-input"></td><td><input type="number" name="inventory" required  lay-verify="required" placeholder="请输入库存" autocomplete="off" class="layui-input"></td><td><span><input type="number" name="heft" placeholder="请输入重量" autocomplete="off" class="layui-input"></span></td><td><span><input type="text" name="sc_code" placeholder="请输入规格编码" autocomplete="off" class="layui-input"></span></td><td><input type="number" name="bar_code" placeholder="请输入条形码" autocomplete="off" class="layui-input"></td><td><input type="text" name="origin_coset" placeholder="请输入原价(元)" autocomplete="off" class="layui-input"></td><td><button type="button" class="layui-btn layui-btn-xs preview">复制</button><button type="button" class="layui-btn layui-btn-xs layui-bg-red edit" style="margin:4px">移除</button></td></tr>';
			$("tbody").append(emptyHtml);
		});
		
		form.on('submit(foundUser)', function(data){

			var field = data.field;

			console.log(field);

			// $.post("/admin/user_list/saveUser",field,function(res){
			// 	if(res.code === 1){
			// 		layer.msg(res.msg);
					
			// 	}else{
			// 		layer.msg(res.msg);
			// 	}
			// });
			return false;
		});
	});
});
