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
		dump(Session::get('admin'));
		$user_id = Session::get('admin')["id"];

		// 获取管理员
		$data = Db::table("manager_list")
				->where("user_id",$user_id)
				->order("create_time", "desc")
				->paginate(10);

		$page = $data->render();

		// 获取权限组
		$authorityData = Db::table("role_manage")
				->where("user_id",$user_id)
				->field('id,role_delimiter')
				->select();

		

		// 将data数组中的权限组id换成角色名称
		$num = 0;
		$data = $data->items();
		foreach ($data as $value) {

			foreach ($authorityData as $val) {
				if($value["sex"] === 1){
					$data[$num]["sex"] = '男性';
				}elseif($value["sex"] === 2){
					$data[$num]["sex"] = '女性';
				}else{
					$data[$num]["sex"] = '保密';
				}

				// 权限组
				if($value["authority_group"] === $val["id"]){
					$data[$num]["authority_group"] = $val["role_delimiter"];
				}elseif($value["authority_group"] === 0){
					$data[$num]["authority_group"] = '超级管理员';
				}
			}

			$num++;
		}

		$this->assign('authorityData', $authorityData);
		$this->assign('page', $page);
		$this->assign('data',$data);
		$this->assign('num', 1);

		return $this->fetch();
	}

	public function search()
	{
		// 获取前端数据
		$conditon = Request::get();

		if($conditon["name_phone"] == ""){

			$conditon["name_phone"] = "%";
		}else{

			$conditon["name_phone"] = "%".$conditon["name_phone"]."%";
		}

		if($conditon["authority_group"] == ""){

			$conditon["authority_group"] = "not null";
		}

		if($conditon["sex"] == ""){

			$conditon["sex"] = "not null";
		}

		if($conditon["date"] == ""){

			$conditon["start"] = "1970-01-01";
			$conditon["end"] = date("Y-m-d",strtotime("+1 day"));
		}else{

			$arr = explode(" - ", $conditon["date"]);

			$conditon["start"] = $arr[0];
			$conditon["end"] = $arr[1];
		}

		$user_id = Session::get('admin')["id"];

		$arg['query']['name_phone'] = $conditon["name_phone"];
		$arg['query']['authority_group'] = $conditon["authority_group"];
		$arg['query']['sex'] = $conditon["sex"];
		$arg['query']['date'] = $conditon["date"];

		// 获取管理员
		$data = Db::table("manager_list")
				->where("user_id",$user_id)
				->where("username|telephone", "like", $conditon["name_phone"])
				->where("authority_group",$conditon["authority_group"])
				->where("sex",$conditon["sex"])
				->where("create_time", "between time", [$conditon["start"], $conditon["end"]])
				->order("create_time", "desc")
				->paginate(10,"",$arg);

		$page = $data->render();

		// 获取权限组
		$authorityData = Db::table("role_manage")
				->where("user_id",$user_id)
				->field('id,role_delimiter')
				->select();

		// 将data数组中的权限组id换成角色名称
		$num = 0;
		$data = $data->items();
		foreach ($data as $value) {

			foreach ($authorityData as $val) {
				if($value["sex"] === 1){
					$data[$num]["sex"] = '男性';
				}elseif($value["sex"] === 2){
					$data[$num]["sex"] = '女性';
				}else{
					$data[$num]["sex"] = '保密';
				}

				// 权限组
				if($value["authority_group"] === $val["id"]){
					$data[$num]["authority_group"] = $val["role_delimiter"];
				}elseif($value["authority_group"] === 0){
					$data[$num]["authority_group"] = '超级管理员';
				}
			}

			$num++;
		}

		$this->assign('authorityData', $authorityData);
		$this->assign('page', $page);
		$this->assign('data',$data);
		$this->assign('num', 1);

		return $this->fetch("index");
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
		if(isset($getData["tab"])){
			$list = Db::table("manager_list")->where("id",$getData["id"])->find();
			$this->assign('list',$list);
		}else{
			$this->assign('list',null);
		}

		
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

			if($data['password'] === ''){
				unset($data['password']);
			}else{
				$data["password"] = md5($data["password"]);
			}
			

			$data["update_time"] = time();
			$res = Db::table("manager_list")->where("id",$id)->update($data);
		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	
	}

	public function delManager()
	{
		$data = Request::get("id");

		$res = Db::table('manager_list')->delete($data);

		if($res){
			return ["code"=>1,"msg"=>"删除成功"];
		}else{
			return ["code"=>0,"msg"=>"删除失败"];
		}
	}
}