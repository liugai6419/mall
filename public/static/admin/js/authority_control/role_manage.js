$(function(){
	layui.use(['layer', 'form', 'table'], function(){
		var layer = layui.layer,
			form = layui.form,
			table = layui.table;

		$(".found").click(function(){
			location.href="/admin/role_manage/found";
		});

		// table.render({
		// 	elem: '#demo',
		// 	height: 315,
		// 	url: '/admin/role_manage/index',
		// 	cols: [[
		// 		{field: 'id', title: '序列'},
		// 		{field: 'authority', title: '角色名称'},
		// 		{field: 'crate_time', title: '创建时间'}
		// 	]]
		// });

	});
});
