$(function(){
	layui.use(['layer', 'form'], function(){
		var layer = layui.layer,
			form = layui.form;

		// 测试邮箱配置
		form.on('submit(testEmail)', function(data){

			var field = data.field;

			var val = field.receive_email_address;

			if(val == ""){
				layer.msg("测试邮箱不能为空");
				return false;
			}

			var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
			if(!reg.test(val)){
				layer.msg("测试邮箱格式错误");
				return false;
			}

			$.post("/admin/email_setting/testEmail",field,function(res){
				if(res.code === 1){
					layer.msg(res.msg);
				}else{
					layer.msg(res.msg);
				}
			});
			return false;
		});

		form.on('submit(emailSetting)', function(data){

			var field = data.field;

			$.post("/admin/email_setting/saveEmailSetting",field,function(res){
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
