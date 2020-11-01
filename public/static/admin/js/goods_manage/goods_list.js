$(function(){

	// 新增
	$(".found").click(function(){
		location.href="/admin/goods_list/addGoods";
	});

	// 编辑
	$(".edit").click(function(){
		var id = $(this).attr('data-id');
		location.href="/admin/user_list/found?tab=1&id="+id;
	});

	// 新增
	$(".import-excel").click(function(){
		// console.log(2222);
		location.href="/admin/user_list/importExcel";
	});

	

	layui.use(['layer', 'form', 'laydate', 'element'], function(){
		var layer = layui.layer,
			form = layui.form,
			laydate = layui.laydate,
			element = layui.element;

		laydate.render({
			elem: '#date',
			range: true
		});
		
		// 查看
		$(".preview").click(function(){
			var id = $(this).attr("data-id");
			layer.open({
				type: 2, 
				title: '查看用户信息',
				area: ['500px', '500px'],
				content: '/admin/user_list/preview?id='+id
			});
		});

		// 删除用户
		$(".delete").click(function(){
			var selfObj = $(this)
			var parentObj = selfObj.parent().parent();

			layer.alert("确定删除此权限?",{
				title:false,
				yes: function(){
					var id = selfObj.attr("data-id");

					$.get("/admin/user_list/delUser",{id:id},function(res){
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
