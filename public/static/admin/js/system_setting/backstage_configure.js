$(function(){
	layui.use(['form','layer'], function(){
		var form = layui.form,
		    layer = layui.layer;
	  
		form.on('submit(submitConfig)', function(data){
			$.post("/admin/backstage_config/saveBackstageConfig",data.field,function(res){
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