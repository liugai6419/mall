$(function(){

	// 返回上一级
	$('.return-page').click(function(){
		location.href="/admin/role_manage/index";
	});

	// 全选
	$('.first-input').click(function(){
		// 获取二级权限input父级对象
		var secondParentObj = $(this).parent().next();

		// 获取二级权限input对象
		var secondObj = secondParentObj.find('input');

		// 获取二级权限input总数量
		var secondAllNum = secondObj.length;

		// 获取二级权限input被选中的数量
		var secondCheckedNum = secondParentObj.find('input:checked').length;

		if(secondAllNum !== secondCheckedNum){
			secondObj.prop('checked', true);
			$(this).prop('checked', true);
		}else{
			secondObj.prop('checked', false);
			$(this).prop('checked', false);
		}
	});

	// 单选
	$('.second-input').click(function(){
		// 获取二级权限input父级对象
		var secondParentObj = $(this).parents('.layui-colla-content');

		// 获取二级权限input被选中的数量
		var secondCheckedNum = secondParentObj.find('input:checked').length;

		// 获取一级权限input对象
		var secondObj = secondParentObj.prev().children('input');

		if(secondCheckedNum === 0){
			secondObj.prop('checked', false);
		}else{
			secondObj.prop('checked', true);
		}
	});

	layui.use(['layer', 'form', 'element'], function(){
		var layer = layui.layer,
			form = layui.form,
			element = layui.element;

		form.on('submit(foundRole)', function(data){ 

			var field = data.field;

			// 限制角色名称的字数
			var length = field.role_delimiter.length;
			if(length < 2 || length > 6){
				layer.msg('角色名称请填写2~6个字符');
				return false;
			}

			$.post("/admin/role_manage/saveRoleManage",field,function(res){
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
