<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class GoodsComment extends Common
{
	public function index()
	{
		return $this->fetch();
	}

	public function addGoods()
	{
		// 商品分类+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$res = Db::table("goods_classify")->order('order', 'desc')->field("id,user_id,classify,name,small_icon")->select();

		// 过滤一级分类
		$first = [];
		foreach ($res as $value) {
			if($value["classify"] == 1){
				$first[] = $value;
			}
		}

		// 过滤二级分类
		$second = [];
		foreach ($res as $value) {
			if($value["classify"] == 2){
				$second[] = $value;
			}
		}

		// 过滤三级分类
		$third = [];
		foreach ($res as $value) {
			if($value["classify"] == 3){
				$third[] = $value;
			}
		}

		// 将三级分类加入二级分类中
		foreach ($second as $key => $sec) {
			foreach ($third as $thi) {
				if($thi["user_id"] == $sec["id"]){
					$second[$key]["third"][] = $thi;
				}
			}

			if(!isset($second[$key]["third"])){
				$second[$key]["third"] = null;
			}
		}

		// 将二级分类加入一级分类中
		foreach ($first as $key => $fir) {
			foreach ($second as $sec) {
				if($sec["user_id"] == $fir["id"]){
					$first[$key]["second"][] = $sec;
				}
			}

			if(!isset($first[$key]["second"])){
				$first[$key]["second"] = null;
			}
		}

		$this->assign("goodsClassify", $first);


		// 品牌+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		
		// 获取品牌分类
		$brandClassifys = Db::table("brand_classify")->order("order","desc")->where("is_start", 1)->field("id,name")->select();

		// 获取品牌
		$brandLists = Db::table("brand_list")->order("order","desc")->where("is_start", 1)->field("id,name,classify")->select();
		
		foreach ($brandClassifys as $key => $classify) {
			foreach ($brandLists as $brand) {
				if($classify["id"] == $brand["classify"]){
					$brandClassifys[$key]["brandList"][] = $brand;
				}
			}

			if(!isset($brandClassifys[$key]["brandList"])){
				$brandClassifys[$key]["brandList"] = null;
			}
		}

		$this->assign("brandClassifys", $brandClassifys);

		// 生产地+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$area = Db::table("area")->where("parent_code", 0)->select();
		$this->assign("area", $area);



		// $getData = Request::param();
		// $this->assign('userId',$getData["userId"]);

		// if(isset($getData["classify"])){
		// 	$this->assign('classify',$getData["classify"]);
		// }else{
		// 	$this->assign('classify',null);
		// }

		// 获取权限内容		
		// if(isset($getData["tab"])){
		// 	$data = Db::table("goods_classify")->where("id",$getData["userId"])->find();

		// 	$this->assign('data',$data);
		// }else{
		// 	$this->assign('data',null);
		// }

		return $this->fetch();
	}

	// 上传图片
	public function uploadImg()
	{
		// 获取图片
		$file = Request::file();

		$info = null;

		if(isset($file['img'])){

			$info = $file['img']->move(__DIR__.'/../../../public/static/admin/uploads');

		}else{

			return json_encode(array("code"=>0, "msg"=>"没有上传文件"));

		}

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

	

	public function saveGoddsClassify()
	{
		$data = Request::post();

		if(!isset($data["id"])){

			$data["create_time"] = time();
			$res = Db::table("goods_classify")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("goods_classify")->where("id",$data["id"])->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	public function del()
	{
		$data = Request::param();

		if($data["classify"] == 3){

			$res = Db::table('goods_classify')->delete($data["id"]);

		}elseif($data["classify"] == 2){

			$res = Db::table('goods_classify')->where("user_id",$data["id"])->delete();
			$res = Db::table('goods_classify')->delete($data["id"]);

		}elseif($data["classify"] == 1){

			$result = Db::table('goods_classify')->where("user_id",$data["id"])->field("id")->select();
			foreach ($result as $value) {
				$res = Db::table('goods_classify')->where("user_id",$value["id"])->delete();
			}

			$res = Db::table('goods_classify')->where("user_id",$data["id"])->delete();

			$res = Db::table('goods_classify')->delete($data["id"]);

		}
		
		if($res){
			return ["code"=>1,"msg"=>"删除成功"];
		}else{
			return ["code"=>0,"msg"=>"删除失败"];
		}
	}
}