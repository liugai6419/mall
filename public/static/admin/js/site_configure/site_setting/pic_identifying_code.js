$(function(){
	layui.use(['layer', 'form', 'formSelects'], function(){
		var layer = layui.layer,
			form = layui.form,
			formSelects = layui.formSelects;

		// 用户登录
		form.on('submit(picIdentifyingCode)', function(data){

			var field = data.field;

			$.post("/admin/site_setting/savePicIdentifyingCode",field,function(res){

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
