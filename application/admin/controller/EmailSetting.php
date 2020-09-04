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
			
			// $data = Db::table("message_template")->where("user_id",$user_id)->find();

		}

		$this->assign('tab',$tab);
		$this->assign('data',$data);

		return $this->fetch();
	}

	public function testEmail()
	{
		$data = Request::post();

		$mail = new PHPMailer(true);
			try {
			    $mail->CharSet ="UTF-8";
			    $mail->SMTPDebug = 0;

			    $mail->isSMTP();
			    $mail->Host = $data['smtp_server'];

			    $mail->SMTPAuth = true;
			    $mail->Username = $data['smtp_proving_username'];
			    $mail->Password = $data['smtp_proving_password'];
			    $mail->SMTPSecure = 'ssl';
			    $mail->Port = $data['smtp_port'];

			    $mail->setFrom($data['sender_email_address'],$data['sender_show_name']);
			    $mail->addAddress($data['receive_email_address']);

			    $mail->isHTML(true);
			    $mail->Subject = 'shopXO邮箱验证';
			    $mail->Body = "您好，".$data['receive_email_address']."，".$data['sender_show_name']."(".$data['sender_email_address'].")用户正在使用您的邮箱进行验证";

			    $mail->send();
			    
			    return ["code"=>1,"msg"=>"邮箱发送成功"];
			} catch (Exception $e) {
			    return ["code"=>0,"msg"=>"邮箱发送失败"];
			}

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