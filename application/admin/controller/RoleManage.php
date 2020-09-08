<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class RoleManage extends Common
{
	public function index()
	{
		// $user_id = Session::get('admin')["id"];
		// $data = Db::table("seo_setting")->where("user_id",$user_id)->find();

		// $this->assign('data',$data);

		return $this->fetch();
	}

	public function found()
	{
		return $this->fetch();
	}

	public function saveSeoSetting()
	{
		$data = Request::post();

		// 获取用户id
		$user_id = Session::get('admin')["id"];

		$res = Db::table("seo_setting")->where("user_id",$user_id)->find();

		if(!$res){

			$data["user_id"] = $user_id;
			$data["create_time"] = time();
			$res = Db::table("seo_setting")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("seo_setting")->where("user_id",$user_id)->update($data);

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