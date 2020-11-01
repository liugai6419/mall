<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class AgreementMange extends Common
{
	public function index()
	{
		$data = Db::table("agreement_mange")->where("id",1)->find();

		$this->assign('data',$data);

		return $this->fetch();
	}

	public function saveAgreementMange()
	{
		$data = Request::post();

		$res = Db::table("agreement_mange")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("agreement_mange")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("agreement_mange")->where("id",1)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}
}