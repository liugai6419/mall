$(function(){
	layui.use(['layer', 'form'], function(){
		var layer = layui.layer,
			form = layui.form;
		
		form.on('submit(addClassify)', function(data){

			var field = data.field;

			$.post("/admin/brand_classify/saveClassify",field,function(res){
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
