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
		$(document).on("click", ".image", function(){
			elem = "#"+$(this).attr("id");
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

			var emptyHtml = '<tr><td><div class="layui-upload-drag shop-format image" id="shop-format'+num+'"><div class="icon"><i class="layui-icon"></i><p>点击上传</p></div><div class="layui-hide" id="uploadDemoView"><img src="" alt="上传成功后渲染" ></div></div></td><td><input type="number" name="price'+num+'" required  lay-verify="required" placeholder="请输入价格(元)" autocomplete="off" class="layui-input price"></td><td><input type="number" name="inventory'+num+'" required  lay-verify="required" placeholder="请输入库存" autocomplete="off" class="layui-input inventory"></td><td><span><input type="number" name="heft'+num+'" placeholder="请输入重量" autocomplete="off" class="layui-input heft"></span></td><td><span><input type="text" name="sc_code'+num+'" placeholder="请输入规格编码" autocomplete="off" class="layui-input sc_code"></span></td><td><input type="text" name="bar_code'+num+'" placeholder="请输入条形码" autocomplete="off" class="layui-input bar_code"></td><td><input type="number" name="origin_coset'+num+'" placeholder="请输入原价(元)" autocomplete="off" class="layui-input origin_coset"></td><td><button type="button" class="layui-btn layui-btn-xs preview">复制</button><button type="button" class="layui-btn layui-btn-xs layui-bg-red delete" style="margin:4px">移除</button></td></tr>';
			$(".shop-format-container").append(emptyHtml);

			dynamicPic("#shop-format"+num);
		});

		// 删除规格
		$(document).on("click", ".delete",function(){
			$(this).parents("tr").remove();
		});

		// 复制规格
		$(document).on("click", ".preview",function(){
			var num = parseInt($(".add-format").attr("data-num"))+1;
			$(".add-format").attr("data-num", num);

			var parent = $(this).parents("tr");
			var img = parent.find("img").attr("src");
			var price = parent.find(".price").val();
			var inventory = parent.find(".inventory").val();
			var heft = parent.find(".heft").val();
			var sc_code = parent.find(".sc_code").val();
			var bar_code = parent.find(".bar_code").val();
			var origin_coset = parent.find(".origin_coset").val();

			var has_img = "";
			var has_pic = "";
			if(img == ""){
				has_img = "block";
				has_pic = "layui-hide";
			}else{
				has_img = "none";
			}

			var emptyHtml = '<tr><td><div class="layui-upload-drag shop-format image" id="shop-format'+num+'"><div class="icon" style="display:'+has_img+';"><i class="layui-icon"></i><p>点击上传</p></div><div class="'+has_pic+'" id="uploadDemoView"><img src="'+img+'" alt="上传成功后渲染" ></div></div></td><td><input type="number" name="price'+num+'" value="'+price+'" required  lay-verify="required" placeholder="请输入价格(元)" autocomplete="off" class="layui-input price"></td><td><input type="number" name="inventory'+num+'" value="'+inventory+'" required  lay-verify="required" placeholder="请输入库存" autocomplete="off" class="layui-input inventory"></td><td><span><input type="number" name="heft'+num+'" value="'+heft+'" placeholder="请输入重量" autocomplete="off" class="layui-input heft"></span></td><td><span><input type="text" name="sc_code'+num+'" value="'+sc_code+'" placeholder="请输入规格编码" autocomplete="off" class="layui-input sc_code"></span></td><td><input type="text" name="bar_code'+num+'" value="'+bar_code+'" placeholder="请输入条形码" autocomplete="off" class="layui-input bar_code"></td><td><input type="number" name="origin_coset'+num+'" value="'+origin_coset+'" placeholder="请输入原价(元)" autocomplete="off" class="layui-input origin_coset"></td><td><button type="button" class="layui-btn layui-btn-xs preview">复制</button><button type="button" class="layui-btn layui-btn-xs layui-bg-red delete" style="margin:4px">移除</button></td></tr>';
			$(".shop-format-container").append(emptyHtml);

			dynamicPic("#shop-format"+num);
		});

		// 动态设置上传图片
		function dynamicPic(elem){
			upload.render({ 
				elem: elem,
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
		}

		// 上传商品视频
		upload.render({ 
			elem: '#goods-video',
			url: '/admin/goods_list/uploadVideo',
			field: 'video',
			accept:'video',
			acceptMime: 'video/*',
			size: 102400,
			exts: 'avi|wmv|mov|swf|flv|mp4',
			done: function(res){
				if(res.code == 1){
					if($("#goods-video .icon")){
						$("#goods-video .icon").remove();
					}
					layui.$("#goods-video").children('#uploadDemoView').removeClass('layui-hide');
					layui.$("#goods-video").children('#video').find('img').attr('src', res.msg);
				}else{
					layer.msg("图片上传失败，请重试");
				}
				
			}
		});
		
		form.on('submit(addGoods)', function(data){

			var field = data.field;

			// 获取首页推荐图片
			var homeImg = $(".home-img").find("img").attr("src");
			field.home_img = homeImg;

			// 获取商品视频
			var shopVideo = $(".shop-video").find("img").attr("src");
			field.shop_video = shopVideo;

			// 获取商品相册
			var shopAlbum = $(".shop-album").find("img");
			var len = shopAlbum.length;
			var videoList = "";
			for(var i = 0; i < len; i++){
				var video = $(shopAlbum[i]).attr("src")
				if(video != ""){
					videoList += video + ";";
				}
			}
			field.shop_album = videoList;

			// 获取商品相册
			// var shopFormat = $(".shop-format").find("img");
			// var count = shopFormat.length;
			// var formatList = "";
			// for(var i = 0; i < count; i++){
			// 	var format = $(shopFormat[i]).attr("src");
			// 	if(format != ""){
			// 		formatList += format + ";";
			// 	}
			// }
			// field.shop_format = formatList;
			

			var format = $(".shop-format-container").find("tr");
			var count = format.length;
			var formatList = [];
			for (var i = 0; i < count; i++) {
				var image = $(format[i]).find("td:nth-child(1)").find("img").attr("src");
				var price = $(format[i]).find("td:nth-child(2)").children().val();
				var inventory = $(format[i]).find("td:nth-child(3)").children().val();
				var heft = $(format[i]).find("td:nth-child(4)").children().children().val();
				var sc_code = $(format[i]).find("td:nth-child(5)").children().children().val();
				var bar_code = $(format[i]).find("td:nth-child(6)").children().val();
				var origin_coset = $(format[i]).find("td:nth-child(7)").children().val();

				var formatObj = {image:image, price:price, inventory:inventory, heft:heft, sc_code:sc_code, bar_code:bar_code, origin_coset:origin_coset};
				formatList[i] = formatObj;
			}
			field.shop_format = formatList;

			// console.log(formatList);
			

			// console.log(field);

			$.post("/admin/goods_list/saveGodds",field,function(res){
				// console.log(res);
				if(res.code === 1){
					layer.msg(res.msg);
					
				}else{
					layer.msg(res.msg);
				}
			});
			return false;
		});
	});
});
