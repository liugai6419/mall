$(function(){
	layui.use(['form','layer','upload','jquery'], function(){
		var form = layui.form,
		    layer = layui.layer,
		    upload = layui.upload,
		    $ = layui.jquery;

		// 验证手机号和邮箱
		form.verify({
			myphone: function(value, item){
				if(value != "" && !(/^1[3456789]\d{9}$/.test(value))){
					return '请填写正确的手机号';
				}
			},

			myemail: function(value, item){
				if(value != "" && !(/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/.test(value))){
					return '请填写正确的邮箱';
				}
			}
		});

		upload.render({ 
			elem: '#update_qrcode',
			url: '/admin/shop_message/uploadImg',
			field: 'qrcode_img',
			accept:'images',
			acceptMime: 'image/*',
			size: 200,
			exts: 'jpg|png|bmp|jpeg',
			done: function(res){
				if($("#update_qrcode .icon")){
					$("#update_qrcode .icon").remove();
				}
				layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
			}
		});
	  
		form.on('submit(submitConfig)', function(data){
			data.field.qrcode_img =  $('#uploadDemoView').find('img').attr('src');

			$.post("/admin/shop_message/saveShopMessage",data.field,function(res){
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