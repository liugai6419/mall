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
		$user_id = Session::get('admin')["id"];

		$data = Db::table("authority_allocation")
				->where("user_id",$user_id)
				->order('marshalling_sequence', 'desc')
				->field('id,parent_id,authority_name,is_show')
				->select();
		// dump($data);

		$lists = [];

		foreach ($data as $value) {
			if($value["parent_id"] == 0){
				foreach ($data as $val) {
					if($value["id"] == $val["parent_id"]){
						$value["second_authority"][] = $val;
					}
				}

				
				if(!isset($value["second_authority"])){
					$value["second_authority"] = [];
				}
				
				$lists[] = $value;
			}
		}

		$this->assign('lists',$lists);
		
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