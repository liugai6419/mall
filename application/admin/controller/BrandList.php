<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class BrandList extends Common
{
	public function index()
	{	
		// 获取显示数量
		$pageNum = Db::table("backstage_config")->find();

		// 获取品牌分类
		$brandClassify = Db::table("brand_classify")->order("order","desc")->field("id,name")->select();

		$datas = Db::table("brand_list")->order("order","desc")->paginate($pageNum['paging_num']);

		$page = $datas->render();

		// 将商品分类id换成名称
		$datas = $datas->items();
		foreach ($datas as $key => $data) {
			foreach ($brandClassify as $value) {
				if($data["classify"] == $value["id"]){
					$datas[$key]["classify"] = $value["name"];
				}
			}
		}

		$this->assign('brandClassify',$brandClassify);
		$this->assign('datas',$datas);
		$this->assign('page', $page);
		$this->assign('num',1);

		return $this->fetch();
	}

	public function search()
	{
		// 获取前端数据
		$conditon = Request::get();

		if($conditon["name"] == ""){

			$conditon["name"] = "%";
		}else{

			$conditon["name"] = "%".$conditon["name"]."%";
		}

		if($conditon["is_start"] == ""){

			$conditon["is_start"] = "not null";
		}

		if($conditon["classify"] == ""){

			$conditon["classify"] = "not null";
		}

		if($conditon["date"] == ""){

			$conditon["start"] = "1970-01-01";
			$conditon["end"] = date("Y-m-d",strtotime("+1 day"));
		}else{

			$arr = explode(" - ", $conditon["date"]);

			$conditon["start"] = $arr[0];
			$conditon["end"] = $arr[1];
		}

		$arg['query']['name'] = $conditon["name"];
		$arg['query']['is_start'] = $conditon["is_start"];
		$arg['query']['classify'] = $conditon["classify"];
		$arg['query']['date'] = $conditon["date"];

		// 获取显示数量
		$pageNum = Db::table("backstage_config")->find();

		// 获取品牌分类
		$brandClassify = Db::table("brand_classify")->where("is_start",1)->order("order","desc")->field("id,name")->select();
		
		// 获取管理员
		$datas = Db::table("brand_list")
				->where("name", "like", $conditon["name"])
				->where("is_start",$conditon["is_start"])
				->where("classify",$conditon["classify"])
				->where("create_time", "between time", [$conditon["start"], $conditon["end"]])
				->order("create_time", "desc")
				->paginate($pageNum['paging_num'],"",$arg);

		$page = $datas->render();

		// 将商品分类id换成名称
		$datas = $datas->items();
		foreach ($datas as $key => $data) {
			foreach ($brandClassify as $value) {
				if($data["classify"] == $value["id"]){
					$datas[$key]["classify"] = $value["name"];
				}
			}
		}

		$this->assign('brandClassify', $brandClassify);
		$this->assign('page', $page);
		$this->assign('datas',$datas);
		$this->assign('num', 1);

		return $this->fetch("index");
	}

	public function addBrand()
	{
		// 获取品牌分类
		$brandClassify = Db::table("brand_classify")->where("is_start",1)->order("order","desc")->field("id,name")->select();
		
		$getData = Request::get();

		// 获取角色	
		if(isset($getData["tab"])){
			$datas = Db::table("brand_list")->where("id",$getData["id"])->find();

			$this->assign('datas',$datas);
		}else{
			$this->assign('datas',null);
		}
		
		$this->assign("brandClassify",$brandClassify);

		return $this->fetch();
	}

	// 上传图片
	public function uploadImg()
	{
		// 获取图片
		$file = Request::file();

		$info = $file['logo_img']->move(__DIR__.'/../../../public/static/admin/uploads');

		// 验证图片格式
		$ext = $info->getExtension();

		if(!in_array($ext, array('jpg','png','gif'))){
			return json_encode(array("code"=>0, "msg"=>"请上传jpg、png、gif格式图片"));
		}
		
		// 限制图片大小
		$size = filesize(__DIR__.'/../../../public/static/admin/uploads/'.$info->getSaveName());
		if($size > 200*1024){
			return json_encode(array("code"=>0, "msg"=>"请上传小于200KB的图片"));
		}

		$img = "/static/admin/uploads/".$info->getSaveName();

		return json_encode(array("code"=>1, "msg"=>$img));
	}

	public function saveBrand()
	{	
		$data = Request::post();

		if(!isset($data["id"])){

			$data["create_time"] = time();
			$res = Db::table("brand_list")->insert($data);
			
		}else{

			$data["update_time"] = time();
			$res = Db::table("brand_list")->where("id",$data["id"])->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	
	}

	public function delBrand()
	{
		$data = Request::get("id");

		$res = Db::table('brand_list')->delete($data);

		if($res){
			return ["code"=>1,"msg"=>"删除成功"];
		}else{
			return ["code"=>0,"msg"=>"删除失败"];
		}
	}
}