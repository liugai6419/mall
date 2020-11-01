$(function(){
	layui.use(['layer', 'form', 'element'], function(){
		var layer = layui.layer,
			form = layui.form,
			element = layui.element;

		$(".add").click(function(){
			layer.open({
				type: 2, 
				title: '新增品牌分类',
				area: ['500px', '400px'],
				content: '/admin/brand_classify/addClassify'
			});
		});

		$(".edit").click(function(){
			var id = $(this).attr('data-id');

			layer.open({
				type: 2, 
				title: '编辑权限',
				area: ['500px', '400px'],
				content: '/admin/brand_classify/addClassify?tab=1&id='+id
			});
		});

		// 删除二级权限
		$(".del").click(function(){
			var id = $(this).attr("data-id")

			layer.alert("确定删除此品牌分类吗",{
				title:false,
				yes: function(){

					$.get("/admin/brand_classify/delClassify",{id:id},function(res){
						// console.log(res);
						if(res.code === 1){
							
							layer.msg(res.msg);

							setTimeout(function(){
								location.reload();
							},1000);
						}else{
							layer.msg(res.msg);
						}
					});
				}
			});
		});

	});
});