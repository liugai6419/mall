<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class BackstageConfig extends Common
{
	public function index()
	{
		$user_id = Session::get('admin')["id"];

		$data = Db::table("backstage_config")->where("user_id",$user_id)->find();

		$this->assign("data",$data);

		return $this->fetch();
	}

	public function saveBackstageConfig()
	{
		$data = Request::post();

		if(!$data['paging_num']){
			return ["code"=>0,"msg"=>"分页数量不可小于0"];
		}

		// 获取用户id
		$user_id = Session::get('admin')["id"];

		// 查询用户是否存在用户注册
		$res = Db::table("backstage_config")->where("user_id",$user_id)->find();

		if(!$res){

			$data["user_id"] = $user_id;
			$data["create_time"] = time();
			$res = Db::table("backstage_config")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("backstage_config")->where("user_id",$user_id)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}
}