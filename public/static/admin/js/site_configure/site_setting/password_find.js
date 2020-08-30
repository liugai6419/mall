$(function(){
	layui.use(['layer', 'form', 'upload', 'colorpicker'], function(){
		var layer = layui.layer,
			form = layui.form,
			upload = layui.upload,
			colorpicker = layui.colorpicker;

		var color1 = $("#login_color1").val(),
			color2 = $("#login_color2").val(),
			color3 = $("#login_color3").val();

		// 用户登录——背景色1
		colorpicker.render({
			elem: '#login_color_selector1',
			color: color1,
			done: function(color){
				$('#login_color1').val(color);
			}
		});

		// 用户登录——背景色2
		colorpicker.render({
			elem: '#login_color_selector2',
			color: color2,
			done: function(color){
				$('#login_color2').val(color);
			}
		});

		// 用户登录——背景色3
		colorpicker.render({
			elem: '#login_color_selector3',
			color: color3,
			done: function(color){
				$('#login_color3').val(color);
			}
		});

		// 图片1
		upload.render({ 
			elem: '#login_pic1',
			url: '/admin/site_setting/uploadImg',
			field: 'login_pic1',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png',
			done: function(res){
				if($("#login_pic1 .icon")){
					$("#login_pic1 .icon").remove();
				}
				layui.$('#login_pic1').children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
			}
		});

		// 图片2
		upload.render({ 
			elem: '#login_pic2',
			url: '/admin/site_setting/uploadImg',
			field: 'login_pic2',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png|gif',
			done: function(res){
				if($("#login_pic2 .icon")){
					$("#login_pic2 .icon").remove();
				}
				layui.$('#login_pic2').children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
			}
		});

		// 图片3
		upload.render({ 
			elem: '#login_pic3',
			url: '/admin/site_setting/uploadImg',
			field: 'login_pic3',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png',
			done: function(res){
				if($("#login_pic3 .icon")){
					$("#login_pic3 .icon").remove();
				}
				layui.$('#login_pic3').children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
			}
		});

		

		// 密码找回
		form.on('submit(passwordFind)', function(data){

			var field = data.field;

			var login_pic1 = field.login_pic1 =  $('#login_pic1').children('#uploadDemoView').find('img').attr('src'),
				login_pic2 = field.login_pic2 =  $('#login_pic2').children('#uploadDemoView').find('img').attr('src'),
				login_pic3 = field.login_pic3 =  $('#login_pic3').children('#uploadDemoView').find('img').attr('src');

			$.post("/admin/site_setting/savePasswordFind",field,function(res){

				if(res.code === 1){
					layer.msg(res.msg);
				}else{
					layer.msg(res.msg);
				}
			});
			return false;
		});

	});

	$("div.tip").children("i").click(function(){
		$(this).parent().hide();
	});
});
