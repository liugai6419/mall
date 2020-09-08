$(function(){
	layui.use(['layer', 'form', 'element'], function(){
		var layer = layui.layer,
			form = layui.form,
			element = layui.element;

		$('.return-page').click(function(){
			location.href="/admin/role_manage/index";
		});
		
		// form.on('submit(foundAuthority)', function(data){

		// 	var field = data.field;
		// 	// console.log(field);

		// 	$.post("/admin/authority_allocation/addFoundAuthority",field,function(res){
		// 		// console.log(res);
		// 		if(res.code === 1){
		// 			layer.msg(res.msg);

		// 			// 关闭弹窗
		// 			setTimeout(function(){
		// 				var index = parent.layer.getFrameIndex(window.name);
		// 				parent.layer.close(index);
		// 				parent.location.reload();
		// 			},1000);
					
		// 		}else{
		// 			layer.msg(res.msg);
		// 		}
		// 	});
		// 	return false;
		// });
	});
});
