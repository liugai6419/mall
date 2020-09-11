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
		$user_id = Session::get('admin')["id"];
		$data = Db::table("role_manage")->where("user_id",$user_id)->order('create_time','desc')->paginate(10);
		
		$page = $data->render();

		$this->assign('page', $page);
		$this->assign('data',$data);
		$this->assign('num',1);

		return $this->fetch();
	}

	public function found()
	{
		$user_id = Session::get('admin')["id"];

		// 获取权限名称
		$data = Db::table("authority_allocation")
				->where("user_id",$user_id)
				->order('marshalling_sequence', 'desc')
				->field('id,parent_id,authority_name,is_show')
				->select();

		// 将二级权限归入到一级权限数组中
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


		$getData = Request::get();

		// 获取角色	
		if(isset($getData["tab"])){
			$results = Db::table("role_manage")->where("id",$getData["id"])->find();

			// 将字符串转为数组
			$results['authority'] = explode(',', $results['authority']);
			
			$this->assign('results',$results);
		}else{
			$this->assign('results',null);
		}

		
		return $this->fetch();
	}

	public function saveRoleManage()
	{
		$data = Request::post();

		
		$roleDelimiter = $data['role_delimiter'];
		$isStart = $data['is_start'];

		// 限制角色名称的字数
		$length = mb_strlen($roleDelimiter);
		if($length < 2 || $length > 6){
			return ["code"=>0,"msg"=>"角色名称请填写2~6个字符"];
		}

		// 移除数组中的role_delimiter值
		unset($data['role_delimiter']);
		unset($data['is_start']);

		// 将数组转为字符串
		$authority = implode(',',$data);

		$newData = [];
		$newData['role_delimiter'] = $roleDelimiter;
		$newData['is_start'] = $isStart;
		$newData['authority'] = $authority;

		if(!isset($data["id"])){
			// 获取用户id
			$user_id = Session::get('admin')["id"];

			$newData["user_id"] = $user_id;
			$newData["create_time"] = time();
			$res = Db::table("role_manage")->insert($newData);
			
		}else{
			$id = $data["id"];

			unset($data["id"]);

			$newData["update_time"] = time();
			$res = Db::table("role_manage")->where("id",$id)->update($newData);
		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	public function deleteRoleMange()
	{
		$data = Request::get("id");

		$res = Db::table('role_manage')->delete($data);

		if($res){
			return ["code"=>1,"msg"=>"删除成功"];
		}else{
			return ["code"=>0,"msg"=>"删除失败"];
		}
	}
}