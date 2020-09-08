$(function(){
	layui.use(['layer', 'form', 'layer'], function(){
		var layer = layui.layer,
			form = layui.form,
			layer = layui.layer;
		
		form.on('submit(foundAuthority)', function(data){

			var field = data.field;
			// console.log(field);

			$.post("/admin/authority_allocation/addFoundAuthority",field,function(res){
				// console.log(res);
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
