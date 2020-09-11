$(function(){
	// 新增
	$(".found").click(function(){
		location.href="/admin/role_manage/found";
	});
	// 编辑
	$(".edit").click(function(){
		var id = $(this).attr('data-id');
		
		location.href="/admin/role_manage/found?tab=1&id="+id;
	});

	layui.use('layer', function(){
		var layer = layui.layer;

		// 删除
		$('.delete').click(function(){
			var id = $(this).attr("data-id");
			layer.alert("确定删除此权限?",{
				title:false,
				yes: function(){
					$.get("/admin/role_manage/deleteRoleMange",{id:id},function(res){
						if(res.code === 1){
							layer.msg(res.msg);
							setTimeout(function(){
								location.reload();
							},2000);
						}else{
							layer.msg(res.msg);
						}
					});
				}
			});
		});

	});
});
