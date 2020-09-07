$(function(){
	layui.use(['layer', 'form', 'element'], function(){
		var layer = layui.layer,
			form = layui.form,
			element = layui.element;

		$(".found").click(function(){
			layer.open({
				type: 2, 
				title: '新增权限',
				area: ['500px', '520px'],
				content: '/admin/authority_allocation/found'
			});
		});
		 
	});
});
