$(function(){
	layui.use(['layer', 'form'], function(){
		var layer = layui.layer,
			form = layui.form;


		// 用户登录
		form.on('submit(seoSetting)', function(data){

			var field = data.field;

			$.post("/admin/seo_setting/saveSeoSetting",field,function(res){
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
