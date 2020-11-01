<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class BrandClassify extends Common
{
	public function index()
	{	
		// 获取显示数量
		$pageNum = Db::table("backstage_config")->find();

		$datas = Db::table("brand_classify")->order("order","desc")->paginate($pageNum['paging_num']);

		$page = $datas->render();

		$this->assign('datas',$datas);
		$this->assign('page', $page);
		$this->assign('num',1);

		return $this->fetch();
	}

	public function addClassify()
	{
		$getData = Request::get();

		// 获取角色	
		if(isset($getData["tab"])){
			$results = Db::table("brand_classify")->where("id",$getData["id"])->find();

			$this->assign('results',$results);
		}else{
			$this->assign('results',null);
		}

		return $this->fetch();
	}

	public function saveClassify()
	{	
		$data = Request::post();

		if(!isset($data["id"])){

			$data["create_time"] = time();
			$res = Db::table("brand_classify")->insert($data);
			
		}else{

			$data["update_time"] = time();
			$res = Db::table("brand_classify")->where("id",$data["id"])->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	
	}

	public function delClassify()
	{
		$data = Request::get("id");

		$res = Db::table('brand_classify')->delete($data);

		if($res){
			return ["code"=>1,"msg"=>"删除成功"];
		}else{
			return ["code"=>0,"msg"=>"删除失败"];
		}
	}
}