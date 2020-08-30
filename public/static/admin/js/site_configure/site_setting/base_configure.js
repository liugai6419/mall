$(function(){
	layui.use(['layer', 'form', 'upload'], function(){
		var layer = layui.layer,
			form = layui.form,
			upload = layui.upload;

		// 基础配置——电脑端logo
		upload.render({ 
			elem: '#computer_logo',
			url: '/admin/site_setting/uploadImg',
			field: 'computer_logo',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png|gif',
			done: function(res){
				if($("#computer_logo .icon")){
					$("#computer_logo .icon").remove();
				}
				layui.$('#computer_logo').children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
			}
		});

		// 基础配置——手机端logo
		upload.render({ 
			elem: '#phone_logo',
			url: '/admin/site_setting/uploadImg',
			field: 'phone_logo',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png|gif',
			done: function(res){
				if($("#phone_logo .icon")){
					$("#phone_logo .icon").remove();
				}
				layui.$('#phone_logo').children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
			}
		});

		// 基础配置——桌面图标
		upload.render({ 
			elem: '#dest_icon',
			url: '/admin/site_setting/uploadImg',
			field: 'dest_icon',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png',
			done: function(res){
				if($("#dest_icon .icon")){
					$("#dest_icon .icon").remove();
				}
				layui.$('#dest_icon').children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
			}
		});

		// 基础配置
		form.on('submit(baseSetting)', function(data){

			var field = data.field;

			var computer_logo = field.computer_logo =  $('#computer_logo').children('#uploadDemoView').find('img').attr('src'),
			    phone_logo = field.phone_logo =  $('#phone_logo').children('#uploadDemoView').find('img').attr('src'),
			    dest_icon = field.dest_icon =  $('#dest_icon').children('#uploadDemoView').find('img').attr('src');

			if(!computer_logo){
				layer.msg("请上传电脑端logo");
				return false;
			}

			if(!phone_logo){
				layer.msg("请上传手机端logo");
				return false;
			}

			if(!dest_icon){
				layer.msg("请上传桌面图标");
				return false;
			}

			if(field.site_status == 1 && field.closed_reason == ''){
				layer.msg("当站点状态选择关闭时，请填写关闭原因");
				return false
			}

			$.post("/admin/site_setting/saveBaseConfigure",data.field,function(res){
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
