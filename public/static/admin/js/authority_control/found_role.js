$(function(){
	layui.use(['layer', 'form', 'element'], function(){
		var layer = layui.layer,
			form = layui.form,
			element = layui.element;

		$('.return-page').click(function(){
			location.href="/admin/role_manage/index";
		});

		// form.on('checkbox(firstAuthority)', function(data).function(){
		// 	console.log(111);
		// });

		// 全选
		// $('.layui-colla-item > .layui-form-checkbox').click(function(){
			

		// 	var secondObj = $(this).next().find('.second-centent .layui-form-checkbox');

		// 	if(!$(this).hasClass('layui-form-checked')){
		// 		console.log('全选true');
		// 		secondObj.removeClass('layui-form-checked');
		// 	}else{
		// 		console.log('全选false');
		// 		secondObj.addClass('layui-form-checked');
		// 	}
			
		// });

		// 单选
		// $('.second-centent .layui-form-checkbox').click(function(){

		// 	var secondObjNum = $(this).parent().parent().children().children('.layui-form-checkbox');

		// 	for (var i = 0; i < secondObjNum.length; i++) {

		// 		if($(secondObjNum[i]).hasClass('layui-form-checked')){
		// 			console.log('单选');
		// 			$(this).parents('.layui-colla-content').prev().addClass('layui-form-checked');
		// 			break;
		// 		}

		// 		$(this).parents('.layui-colla-content').prev().removeClass('layui-form-checked');
		// 	}
		// });

		// $('.layui-form-checkbox').click(function(){
		// 	var obj = $(this).parent().next();
		// 	if(!obj.hasClass("layui-show")){
		// 		obj.removeClass("layui-show");
		// 	}
		// });
		
		form.on('submit(foundRole)', function(data){

			var field = data.field;
			console.log(field);

			// $.post("/admin/authority_allocation/addFoundAuthority",field,function(res){
			// 	// console.log(res);
			// 	if(res.code === 1){
			// 		layer.msg(res.msg);

			// 		// 关闭弹窗
			// 		setTimeout(function(){
			// 			var index = parent.layer.getFrameIndex(window.name);
			// 			parent.layer.close(index);
			// 			parent.location.reload();
			// 		},1000);
					
			// 	}else{
			// 		layer.msg(res.msg);
			// 	}
			// });
			return false;
		});
	});
});
