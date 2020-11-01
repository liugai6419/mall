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
		$data = Db::table("backstage_config")->find();

		$this->assign("data",$data);

		return $this->fetch();
	}

	public function saveBackstageConfig()
	{
		$data = Request::post();

		if(!$data['paging_num']){
			return ["code"=>0,"msg"=>"分页数量不可小于0"];
		}

		// 搜索后台配置
		$res = Db::table("backstage_config")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("backstage_config")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("backstage_config")->where("id",1)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}
}