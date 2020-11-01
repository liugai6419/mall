$(function(){
	layui.use(['layer', 'form', 'element'], function(){
		var layer = layui.layer,
			form = layui.form,
			element = layui.element;

		$(".add").click(function(){
			var userId = $(this).attr('data-userId');
			var classify = $(this).attr('classify');

			layer.open({
				type: 2, 
				title: '新增一级商品分类',
				area: ['500px', '520px'],
				content: '/admin/goods_classify/add?userId='+userId+"&classify="+classify
			});
		});

		$(".edit").click(function(){
			var id = $(this).attr('data-id');
			var userId = $(this).attr('data-userId');

			layer.open({
				type: 2, 
				title: '编辑权限',
				area: ['500px', '520px'],
				content: '/admin/goods_classify/add?tab=1&userId='+userId+'&id='+id
			});
		});

		// 删除二级权限
		$(".del").click(function(){
			var selfObj = $(this)

			var classify = selfObj.attr("classify");
			var txt = "";
			if(classify != 3){
				txt = "其子级也会被删除，确定删除此商品分类吗";
			}else{
				txt = "确定删除此商品分类吗"
			}

			layer.alert(txt,{
				title:false,
				yes: function(){
					var id = selfObj.attr("data-id");

					$.get("/admin/goods_classify/del",{id:id,classify:classify},function(res){
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