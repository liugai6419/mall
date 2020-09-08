<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class AuthorityAllocation extends Common
{
	public function index()
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

	public function found()
	{	
		$getData = Request::get();

		$user_id = Session::get('admin')["id"];

		// 获取目录级别选项
		$data = Db::table("authority_allocation")
				->where("user_id",$user_id)
				->where("parent_id",0)
				->order('marshalling_sequence', 'desc')
				->field('id,authority_name')
				->select();

		// 获取权限内容		
		if(isset($getData["tab"])){
			$list = Db::table("authority_allocation")->where("id",$getData["id"])->find();
			$this->assign('list',$list);
		}else{
			$this->assign('list',null);
		}

		$this->assign('data',$data);
		return $this->fetch();
	}

	public function addFoundAuthority()
	{	
		$data = Request::post();

		// 获取用户id
		$user_id = Session::get('admin')["id"];

		$data["user_id"] = $user_id;
		$data["create_time"] = time();
		$res = Db::table("authority_allocation")->insert($data);

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