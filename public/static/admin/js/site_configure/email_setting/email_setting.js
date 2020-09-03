$(function(){
	layui.use(['layer', 'form'], function(){
		var layer = layui.layer,
			form = layui.form;

		$(".testBtn").click(function(){
			var val = $(this).prev().val();
			console.log(val);
		});

		// 邮箱设置
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
