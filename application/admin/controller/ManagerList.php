<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class ManagerList extends Common
{
	public function index()
	{
		$user_id = Session::get('admin')["id"];

		$data = Db::table("manager_list")
				->where("user_id",$user_id)
				->order('create_time', 'desc')
				->select();

		// $lists = [];

		// foreach ($data as $value) {
		// 	if($value["parent_id"] == 0){
		// 		foreach ($data as $val) {
		// 			if($value["id"] == $val["parent_id"]){
		// 				$value["second_authority"][] = $val;
		// 			}
		// 		}

				
		// 		if(!isset($value["second_authority"])){
		// 			$value["second_authority"] = [];
		// 		}
				
		// 		$lists[] = $value;
		// 	}
		// }

		$this->assign('data',$data);
		$this->assign('num', 1);

		return $this->fetch();
	}

	public function saveManager()
	{	
		$getData = Request::get();

		$user_id = Session::get('admin')["id"];

		// 获取权限组
		$data = Db::table("role_manage")
				->where("user_id",$user_id)
				->field('id,role_delimiter')
				->select();

		$this->assign('data',$data);

		// 获取权限内容		
		// if(isset($getData["tab"])){
		// 	$list = Db::table("authority_allocation")->where("id",$getData["id"])->find();
		// 	$this->assign('list',$list);
		// }else{
		// 	$this->assign('list',null);
		// }

		
		return $this->fetch();
	}

	public function addManager()
	{	
		$data = Request::post();

		if(!isset($data["id"])){
			// 获取用户id
			$user_id = Session::get('admin')["id"];

			$username = Db::table("manager_list")->where('username', $data['username'])->find();

			if($username){
				return ["code"=>0,"msg"=>"用户名称已存在"];
			}else{
				$data["user_id"] = $user_id;
				$data["create_time"] = time();
				$data["password"] = md5($data["password"]);

				$res = Db::table("manager_list")->insert($data);
			}
			
		}else{
			$id = $data["id"];

			$data["update_time"] = time();
			$res = Db::table("manager_list")->where("id",$id)->update($data);
		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	
	}

	public function delAuthority()
	{
		$data = Request::get("id");

		$res = Db::table('authority_allocation')->delete($data);

		if($res){
			return ["code"=>1,"msg"=>"删除成功"];
		}else{
			return ["code"=>0,"msg"=>"删除失败"];
		}
	}
}