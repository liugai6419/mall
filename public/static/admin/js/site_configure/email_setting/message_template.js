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
			var generalTemplate = UE.getEditor('general-template',{
				toolbars: toolbars,
				initialFrameHeight: 150,
				autoHeightEnabled: false
			});

			generalTemplate.ready(function() {
				var html = htmlRestore('{$data.general_template}');
				generalTemplate.setContent(html);
			});
			

			// 用户注册-邮件模板
			var userRegisterTemplate = UE.getEditor('user-register-template',{
				toolbars: toolbars,
				initialFrameHeight: 150,
				autoHeightEnabled: false
			});

			userRegisterTemplate.ready(function() {
				var html = htmlRestore('{$data.user_register_template}');
				userRegisterTemplate.setContent(html);
			});

			// 密码找回-邮件模板
			var findPasswordTemplate = UE.getEditor('find-password-template',{
				toolbars: toolbars,
				initialFrameHeight: 150,
				autoHeightEnabled: false
			});

			findPasswordTemplate.ready(function() {
				var html = htmlRestore('{$data.find_password_template}');
				findPasswordTemplate.setContent(html);
			});

			// 邮箱绑定-邮件模板
			var emailBindTemplate = UE.getEditor('email-bind-template',{
				toolbars: toolbars,
				initialFrameHeight: 150,
				autoHeightEnabled: false
			});

			emailBindTemplate.ready(function() {
				var html = htmlRestore('{$data.email_bind_template}');
				emailBindTemplate.setContent(html);
			});


			layui.use(['layer', 'form'], function(){
				var layer = layui.layer,
					form = layui.form;

				form.on('submit(messageTemplate)', function(data){

					var field = data.field;

					$.post("/admin/email_setting/saveEmailMessageTemplate",field,function(res){

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