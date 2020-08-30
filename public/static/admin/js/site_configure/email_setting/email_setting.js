$(function(){
	layui.use(['layer', 'form'], function(){
		var layer = layui.layer,
			form = layui.form;

		$("button").click(function(){
			var val = $(this).prev().val();
			console.log(val);
		});

		// 邮箱设置
		form.on('submit(emailSetting)', function(data){

			var field = data.field;

			console.log(field);

			// $.post("/admin/email_setting/saveMessageTemplate",field,function(res){
			// 	// console.log(res);
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
