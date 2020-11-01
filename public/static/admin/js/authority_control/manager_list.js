$(function(){


	layui.use(['layer', 'form', 'laydate', 'element'], function(){
		var layer = layui.layer,
			form = layui.form,
			laydate = layui.laydate,
			element = layui.element;

		laydate.render({
			elem: '#date',
			range: true
		});

		// 新增管理员
		$(".save-manager").click(function(){
			layer.open({
				type: 2, 
				title: '新增管理员',
				area: ['500px', '410px'],
				content: '/admin/manager_list/saveManager'
			});
		});

		// 编辑管理员
		$(".edit").click(function(){
			var id = $(this).attr("data-id");

			layer.open({
				type: 2, 
				title: '编辑管理员',
				area: ['500px', '410px'],
				content: '/admin/manager_list/saveManager?tab=1&id='+id
			});
		});

		// 删除管理员
		$(".delete").click(function(){
			var selfObj = $(this)
			var parentObj = selfObj.parent().parent().parent();

			layer.alert("确定删除此权限?",{
				title:false,
				yes: function(){
					var id = selfObj.attr("data-id");

					$.get("/admin/manager_list/delManager",{id:id},function(res){
						if(res.code === 1){
							parentObj.remove();
							layer.msg(res.msg);
						}else{
							layer.msg(res.msg);
						}
					});
				}
			});
		});

	});
});
