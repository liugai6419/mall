$(function(){
	layui.use(['layer', 'form', 'upload', 'formSelects'], function(){
		var layer = layui.layer,
			form = layui.form,
			upload = layui.upload,
			formSelects = layui.formSelects;

		// 用户注册——用户注册背景图片
		upload.render({ 
			elem: '#register_bg',
			url: '/admin/site_setting/uploadImg',
			field: 'register_bg',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png',
			done: function(res){
				if($("#dest_icon .icon")){
					$("#register_bg .icon").remove();
				}
				layui.$('#register_bg').children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
			}
		});

		// 用户注册
		form.on('submit(userRegister)', function(data){

			var field = data.field;

			var register_bg = field.register_bg =  $('#register_bg').children('#uploadDemoView').find('img').attr('src');

			$.post("/admin/site_setting/saveUserRegister",data.field,function(res){
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
