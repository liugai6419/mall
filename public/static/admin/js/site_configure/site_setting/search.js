$(function(){
	layui.use(['layer', 'form'], function(){
		var layer = layui.layer,
			form = layui.form;

		$(document).on("click",".closeItem",function(){
			$(this).parent().remove();
		});

		$(".add-search-key").children("button").click(function(){

			var text = $(this).siblings(".search-key-input").text();

			if(text == ""){
				layer.msg("请输入搜索关键字");
				return false;
			}

			$(".search-key-input").text("");

			var mydata = $(".added-search-key").children(".search-key-item:last-child").children("input").attr("mydata");

			if(!mydata){
				mydata = 0;
			}

			mydata = parseInt(mydata) + 1;

			var html = "<div class='search-key-item'><span>"+text+"</span><input type='hidden' name='item"+mydata+"' mydata='"+mydata+"' value='"+text+"'><i class='iconfont iconclose1 closeItem'></i></div>"

			$(".added-search-key").append(html);
		});

		// 用户登录
		form.on('submit(search)', function(data){

			var field = data.field;

			var search_key = "";
			for(var obj in field){

				if(obj == "site_status"){
					continue;
				}

				search_key += field[obj] + ",";
			}
			search_key = search_key.substring(0,search_key.length-1)

			var myfield = {site_status: field["site_status"],search_key: search_key};

			$.post("/admin/site_setting/saveSearch",myfield,function(res){

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
