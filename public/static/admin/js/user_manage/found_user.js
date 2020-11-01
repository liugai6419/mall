$(function(){

	// 返回上一级
	$('.return-page').click(function(){
		location.href="/admin/user_list/index";
	});

	layui.use(['layer', 'form', 'laydate'], function(){
		var layer = layui.layer,
			form = layui.form,
			laydate = layui.laydate;

		laydate.render({
			elem: '#date'
		});

		// 验证邮箱
		form.verify({
			myemail: function(value, item){
				if(value != "" && !(/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/.test(value))){
					return '请填写正确的邮箱';
				}
			}
		});
		
		form.on('submit(foundUser)', function(data){

			var field = data.field;

			$.post("/admin/user_list/saveUser",field,function(res){
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
