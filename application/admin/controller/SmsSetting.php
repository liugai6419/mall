<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class SmsSetting extends Common
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

			$data = Db::table("sms_setting")->where("user_id",$user_id)->find();
			
		}elseif($tab == 2){

			$data = Db::table("message_template")->where("user_id",$user_id)->find();

		}

		$this->assign('tab',$tab);
		$this->assign('data',$data);

		return $this->fetch();
	}

	public function saveSmsSetting()
	{
		$data = Request::post();

		// 获取用户id
		$user_id = Session::get('admin')["id"];

		$res = Db::table("sms_setting")->where("user_id",$user_id)->find();

		if(!$res){

			$data["user_id"] = $user_id;
			$data["create_time"] = time();
			$res = Db::table("sms_setting")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("sms_setting")->where("user_id",$user_id)->update($data);

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