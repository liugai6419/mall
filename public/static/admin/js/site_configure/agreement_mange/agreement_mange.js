$(function(){
			var toolbars = [[
				'fullscreen', 'source', '|', 'undo', 'redo', '|',
				'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
				'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
				'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
				'directionalityltr', 'directionalityrtl', 'indent', '|',
				'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|', 'link', 'unlink', 'anchor', '|',
				'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
				'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
				'print', 'preview', 'searchreplace', 'drafts', 'help'
			]];

			function htmlRestore(str) {
				var s = "";
				if (str.length === 0) {
					return "";
				}
				s = str.replace(/&amp;/g, "&");
				s = s.replace(/&lt;/g, "<");
				s = s.replace(/&gt;/g, ">");
				s = s.replace(/&nbsp;/g, " ");
				s = s.replace(/&#39;/g, "\'");
				s = s.replace(/&quot;/g, "\"");
				return s;
			}

			// 通用-邮件模板
			var agreementMange = UE.getEditor('general-template',{
				toolbars: toolbars,
				initialFrameHeight: 150,
				autoHeightEnabled: false
			});

			agreementMange.ready(function() {
				var html = htmlRestore('{$data.general_template}');
				agreementMange.setContent(html);
			});


			// layui.use(['layer', 'form'], function(){
			// 	var layer = layui.layer,
			// 		form = layui.form;

			// 	form.on('submit(messageTemplate)', function(data){

			// 		var field = data.field;

			// 		$.post("/admin/email_setting/saveEmailMessageTemplate",field,function(res){

			// 			if(res.code === 1){
			// 				layer.msg(res.msg);
			// 			}else{
			// 				layer.msg(res.msg);
			// 			}
			// 		});
			// 		return false;
			// 	});
			// });
		});