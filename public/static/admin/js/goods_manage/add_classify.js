$(function(){
	layui.use(['layer', 'form', 'upload', 'colorpicker'], function(){
		var layer = layui.layer,
			form = layui.form,
			upload = layui.upload,
			colorpicker = layui.colorpicker;

		var color1 = $("#bg-color").val();

		// 用户登录——背景色1
		colorpicker.render({
			elem: '#login_color_selector1',
			color: color1,
			done: function(color){
				$('#bg-color').val(color);
			}
		});

		// icon图标
		upload.render({ 
			elem: '#small-icon',
			url: '/admin/goods_classify/uploadImg',
			field: 'small_icon',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png|gif',
			done: function(res){
				if($("#small-icon .icon")){
					$("#small-icon .icon").remove();
				}
				layui.$('#small-icon').children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
			}
		});

		// 大图标
		upload.render({ 
			elem: '#big-img',
			url: '/admin/goods_classify/uploadImg',
			field: 'big_img',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png|gif',
			done: function(res){
				if($("#big-img .icon")){
					$("#big-img .icon").remove();
				}
				layui.$('#big-img').children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
			}
		});

		// 基础配置
		form.on('submit(addClassify)', function(data){

			var field = data.field;

			var small_icon = field.small_icon =  $('#small-icon').children('#uploadDemoView').find('img').attr('src'),
				big_img = field.big_img =  $('#big-img').children('#uploadDemoView').find('img').attr('src');

			$.post("/admin/goods_classify/saveGoddsClassify",data.field,function(res){
				if(res.code === 1){
					layer.msg(res.msg);

					// 关闭弹窗
					setTimeout(function(){
						var index = parent.layer.getFrameIndex(window.name);
						parent.layer.close(index);
						parent.location.reload();
					},1000);
				}else{
					layer.msg(res.msg);
				}
			});
			return false;
		});
	});
});
