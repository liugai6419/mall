<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class SeoSetting extends Common
{
	public function index()
	{

		$data = Db::table("seo_setting")->where("id",1)->find();

		$this->assign('data',$data);

		return $this->fetch();
	}

	public function saveSeoSetting()
	{
		$data = Request::post();

		$res = Db::table("seo_setting")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("seo_setting")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("seo_setting")->where("id",1)->update($data);

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

		$res = Db::table("message_template")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("message_template")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("message_template")->where("id",1)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}
}