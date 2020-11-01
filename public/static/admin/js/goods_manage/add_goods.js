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
