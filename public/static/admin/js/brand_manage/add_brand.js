$(function(){
	layui.use(['layer', 'form', 'upload'], function(){
		var layer = layui.layer,
			form = layui.form,
			upload = layui.upload;

			// 基础配置——电脑端logo
			upload.render({ 
				elem: '#logo-img',
				url: '/admin/brand_list/uploadImg',
				field: 'logo_img',
				accept:'images',
				acceptMime: 'image/*',
				size: 200,
				exts: 'jpg|png|gif',
				done: function(res){
					if($("#logo-img .icon")){
						$("#logo-img .icon").remove();
					}
					$('#logo-img').children('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.msg);
				}
			});

		
		form.on('submit(saveBrand)', function(data){

			var field = data.field;

			// 将图片加入数据
			field.logo_img =  $('#logo-img').children('#uploadDemoView').find('img').attr('src');

			$.post("/admin/brand_list/saveBrand",field,function(res){
				// console.log(res);
				if(res.code === 1){
					layer.msg(res.msg);

					// 关闭弹窗
					setTimeout(function(){
						var index = parent.layer.getFrameIndex(window.name);
						parent.layer.close(index);
						parent.location.reload();
					},1000);
					
				}else{
					layer.msg(res.msg);
				}
			});
			return false;
		});
	});
});
