<?php

namespace app\admin\controller;

use PHPMailer\PHPMailer\PHPMailer;
use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

require '../vendor/autoload.php';

// use phpmailer\PHPMailer;

class EmailSetting extends Common
{
	public function index()
	{
		$tab = Request::param('tab');

		$user_id = Session::get('admin')["id"];

		if(!$tab){
			$tab = 1;
		}

		$data = null;
		if($tab == 1){

			$data = Db::table("eamil_setting")->where("user_id",$user_id)->find();
			
		}elseif($tab == 2){

			$mail = new PHPMailer(true);                     // Passing `true` enables exceptions
			// try {
			//     //服务器配置
			//     $mail->CharSet ="UTF-8";                     //设定邮件编码
			//     $mail->SMTPDebug = 0;                        // 调试模式输出
			//     $mail->isSMTP();                             // 使用SMTP
			//     $mail->Host = 'smtp.qq.com';                // SMTP服务器
			//     $mail->SMTPAuth = true;                      // 允许 SMTP 认证
			//     $mail->Username = '盖';              // SMTP 用户名  即邮箱的用户名
			//     $mail->Password = 'coikgnflnamlbbif';          // SMTP 密码  部分邮箱是授权码(例如163邮箱)
			//     $mail->SMTPSecure = 'ssl';                   // 允许 TLS 或者ssl协议
			//     $mail->Port = 465;                           // 服务器端口 25 或者465 具体要看邮箱服务器支持

			//     $mail->setFrom('768190260@qq.com', '盖');  //发件人
			//     $mail->addAddress('1105956107@qq.com', '盖');  // 收件人
			//     //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
			//     $mail->addReplyTo('768190260@qq.com', '盖'); //回复的时候回复给哪个邮箱 建议和发件人一致
			//     //$mail->addCC('cc@example.com');                    //抄送
			//     //$mail->addBCC('bcc@example.com');                    //密送

			//     //发送附件
			//     // $mail->addAttachment('../xy.zip');         // 添加附件
			//     // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

			//     //Content
			//     $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
			//     $mail->Subject = '这里是邮件标题' . time();
			//     $mail->Body    = '<h1>这里是邮件内容</h1>' . date('Y-m-d H:i:s');
			//     $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

			//     $mail->send();
			//     echo '邮件发送成功';
			// } catch (Exception $e) {
			//     echo '邮件发送失败: ', $mail->ErrorInfo;
			// }

			// $data = Db::table("message_template")->where("user_id",$user_id)->find();

		}

		$this->assign('tab',$tab);
		$this->assign('data',$data);

		return $this->fetch();
	}

	public function saveEmailSetting()
	{
		$data = Request::post();

		// 获取用户id
		$user_id = Session::get('admin')["id"];

		$res = Db::table("eamil_setting")->where("user_id",$user_id)->find();

		if(!$res){

			$data["user_id"] = $user_id;
			$data["create_time"] = time();
			$res = Db::table("eamil_setting")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("eamil_setting")->where("user_id",$user_id)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	public function saveMessageTemplate()
	{
		$data = Request::post();

		// 获取用户id
		$user_id = Session::get('admin')["id"];

		$res = Db::table("message_template")->where("user_id",$user_id)->find();

		if(!$res){

			$data["user_id"] = $user_id;
			$data["create_time"] = time();
			$res = Db::table("message_template")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("message_template")->where("user_id",$user_id)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}
}