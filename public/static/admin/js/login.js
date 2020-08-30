$(function(){
	layui.use(['layer', 'form'], function(){
		var layer = layui.layer,
		    form = layui.form;

	    // 忘记密码
	    $('.forget-password').hover(function(){
	    	$('.forget-password-tip').css('display','inline');
	    }, function(){
	    	$('.forget-password-tip').css('display','none');
	    });

	    // 提交登录
	    form.on('submit(login)', function(data){
	    	var username = $('.username').val();
	    	var password = $('.password').val();

	    	if(username == ''){
	    		layer.msg('用户名称不能为空!');
	    		return false;
	    	}

	    	if(password == ''){
	    		layer.msg('密码不能为空!');
	    		return false;
	    	}

	    	$.post("/admin/login/login", {
	    		username: username,
	    		password: password
	    	}, function(result, data){
	    		if(result.code === 1){
	    			layer.msg(result.msg);
		            window.location.href="/admin/index/index";
	    		}else{
	    			layer.msg(result.msg);
	    		}
	    	});

	    	return false;
	    });
	});
});
