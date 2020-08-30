$(function(){

	// 根据导航加载显示内容
	layui.use(['layer','element'],function(){
	var layer = layui.layer,
	    ele = layui.element;

	    $('.nav').click(function(){
	    	var dataUrl = $(this).attr('data-url');
	    	$('.iframe').attr('src',dataUrl);
	    });
	});

	// 开启/关闭全屏
	var boo = true;
	$('.enlarg-shrink').click(function(){

		if(boo){
			FullScreenOpen();
		}else if(!boo){
			FullscreenExit();
		}
	});

	var count = 0;
	// Esc关闭全屏
	document.addEventListener("fullscreenchange", function(e) {
		FullscreenEscEvent();
	});
	document.addEventListener("mozfullscreenchange", function(e) {
	    FullscreenEscEvent();
	});
	document.addEventListener("webkitfullscreenchange", function(e) {
	    FullscreenEscEvent();
	});
	document.addEventListener("msfullscreenchange", function(e) {
	    FullscreenEscEvent();
	});

	// 开启全屏函数
	function FullScreenOpen(){
		var ele = document.body;
		if(ele.webkitRequestFullScreen){
			ele.webkitRequestFullScreen();
		}else if(ele.mozRequestFullScreen){
			ele.mozRequestFullScreen();
		}else if(ele.requestFullScreen){
			ele.requestFullScreen();
		}else{
			layer.msg("浏览器不支持全屏API或已被禁用");
			return false;
		}

		return true;
	}

	// 退出全屏函数
	function FullscreenExit(){
		var ele = document;
		if(ele.webkitCancelFullScreen){
			ele.webkitCancelFullScreen();
		}else if(ele.mozCancelFullScreen){
			ele.mozCancelFullScreen();
		}else if(ele.cancelFullScreen){
			ele.cancelFullScreen();
		}else if(ele.exitFullscreen){
			ele.exitFullscreen();
		}else{
			layer.msg("浏览器不支持全屏API或已被禁用");
			return false;
		}

		return true;
	}

	// Esc推出全屏
	function FullscreenEscEvent(){
		if(boo){
			$('.enlarg-shrink i').attr('class','iconfont iconshrink');
			$('.enlarg-shrink span').text("退出全屏");
			boo = false;
		}else{
			$('.enlarg-shrink i').attr('class','iconfont iconenlarge');
			$('.enlarg-shrink span').text("开启全屏");
			boo = true;
		}
	}
});
