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
		// $user_id = Session::get('admin')["id"];
		// $data = Db::table("agreement_mange")->where("user_id",$user_id)->find();

		// $this->assign('data',$data);

		return $this->fetch();
	}

	public function found()
	{
		$user_id = Session::get('admin')["id"];
		$data = Db::table("authority_allocation")
				->where("user_id",$user_id)
				->where("parent_id",0)
				->where("is_show",1)
				->order('marshalling_sequence', 'desc')
				->field('id,authority_name')
				->select();

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
}