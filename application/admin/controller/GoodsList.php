<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class GoodsList extends Common
{
	public function index()
	{
		// 获取显示数量
		$pageNum = Db::table("backstage_config")->find();

		// 获取商品列表
		$data = Db::table("goods_list")
				->field("id,name,model,brand,is_sell,is_recommend,repertory_unit,home_img")
				->paginate($pageNum['paging_num']);

		$page = $data->render();
		
		// 获取品牌列表
		$brand = Db::table("brand_list")->select();

		// 将品牌id换成品牌名称
		$data = $data->items();
		foreach ($data as $key => $vo) {

			$data[$key]["max_price"] = 0;
			$data[$key]["min_price"] = 0;
			$data[$key]["max_origin_coset"] = null;
			$data[$key]["min_origin_coset"] = null;
			$data[$key]["inventory_total"] = null;

			foreach ($brand as $value) {
				if($vo["brand"] == $value["id"]){
					$data[$key]["brand"] = $value["name"];
				}
			}
		}

		// 获取商品的价格、原价和库存
		$goodsFormat = Db::table("goods_format")->field("id,parent_id,price,origin_coset,inventory")->select();

		// 售价区域、原价区域、总库存
		foreach ($data as $key => $vo) {
			foreach ($goodsFormat as $value) {
				if($vo["id"] == $value["parent_id"]) {

					if($value["price"] > $data[$key]["max_price"]) {
						$data[$key]["max_price"] = $value["price"];
					}elseif ($data[$key]["min_price"] == 0) {
						$data[$key]["min_price"] = $value["price"];
					}elseif ($value["price"] < $data[$key]["min_price"]) {
						$data[$key]["min_price"] = $value["price"];
					}

					if($value["origin_coset"] != null && $value["origin_coset"] > $data[$key]["max_origin_coset"]){
						$data[$key]["max_origin_coset"] = $value["origin_coset"];
					}elseif ($value["origin_coset"] != null && $data[$key]["min_origin_coset"] == 0) {
						$data[$key]["min_origin_coset"] = $value["origin_coset"];
					}elseif ($value["origin_coset"] != null && $value["origin_coset"] < $data[$key]["min_origin_coset"]) {
						$data[$key]["min_origin_coset"] = $value["origin_coset"];
					}


					if($value["inventory"] != null){
						$data[$key]["inventory_total"] += $value["inventory"];
					}
				}
			}
		}

		$this->assign('page', $page);
		$this->assign("data",$data);
		$this->assign('num', 1);

		return $this->fetch();
	}

	public function search()
	{
		// 获取前端数据
		$conditon = Request::get();

		if($conditon["nm"] == ""){

			$conditon["nm"] = "%";
		}else{

			$conditon["nm"] = "%".$conditon["nm"]."%";
		}

		if($conditon["is_sell"] == ""){

			$conditon["is_sell"] = "not null";
		}

		if($conditon["is_recommend"] == ""){

			$conditon["is_recommend"] = "not null";
		}

		if($conditon["date"] == ""){

			$conditon["start"] = "1970-01-01";
			$conditon["end"] = date("Y-m-d",strtotime("+1 day"));
		}else{

			$arr = explode(" - ", $conditon["date"]);

			$conditon["start"] = $arr[0];
			$conditon["end"] = $arr[1];
		}

		// 获取显示数量
		$pageNum = Db::table("backstage_config")->find();

		$arg['query']['nm'] = $conditon["nm"];
		$arg['query']['is_sell'] = $conditon["is_sell"];
		$arg['query']['is_recommend'] = $conditon["is_recommend"];
		$arg['query']['date'] = $conditon["date"];

		// 获取管理员
		$data = Db::table("goods_list")
				->where("name|model", "like", $conditon["nm"])
				->where("is_sell",$conditon["is_sell"])
				->where("is_recommend",$conditon["is_recommend"])
				->where("create_time", "between time", [$conditon["start"], $conditon["end"]])
				->order("create_time", "desc")
				->field("id,name,model,brand,is_sell,is_recommend,repertory_unit,home_img")
				->paginate($pageNum['paging_num'],"",$arg);

		$page = $data->render();

		// 获取品牌列表
		$brand = Db::table("brand_list")->select();

		// 将品牌id换成品牌名称
		$data = $data->items();
		foreach ($data as $key => $vo) {

			$data[$key]["max_price"] = 0;
			$data[$key]["min_price"] = 0;
			$data[$key]["max_origin_coset"] = null;
			$data[$key]["min_origin_coset"] = null;
			$data[$key]["inventory_total"] = null;

			foreach ($brand as $value) {
				if($vo["brand"] == $value["id"]){
					$data[$key]["brand"] = $value["name"];
				}
			}
		}

		// 获取商品的价格、原价和库存
		$goodsFormat = Db::table("goods_format")->field("id,parent_id,price,origin_coset,inventory")->select();

		// 售价区域、原价区域、总库存
		foreach ($data as $key => $vo) {
			foreach ($goodsFormat as $value) {
				if($vo["id"] == $value["parent_id"]) {

					if($value["price"] > $data[$key]["max_price"]) {
						$data[$key]["max_price"] = $value["price"];
					}elseif ($data[$key]["min_price"] == 0) {
						$data[$key]["min_price"] = $value["price"];
					}elseif ($value["price"] < $data[$key]["min_price"]) {
						$data[$key]["min_price"] = $value["price"];
					}

					if($value["origin_coset"] != null && $value["origin_coset"] > $data[$key]["max_origin_coset"]){
						$data[$key]["max_origin_coset"] = $value["origin_coset"];
					}elseif ($value["origin_coset"] != null && $data[$key]["min_origin_coset"] == 0) {
						$data[$key]["min_origin_coset"] = $value["origin_coset"];
					}elseif ($value["origin_coset"] != null && $value["origin_coset"] < $data[$key]["min_origin_coset"]) {
						$data[$key]["min_origin_coset"] = $value["origin_coset"];
					}


					if($value["inventory"] != null){
						$data[$key]["inventory_total"] += $value["inventory"];
					}
				}
			}
		}

		$this->assign('page', $page);
		$this->assign("data",$data);
		$this->assign('num', 1);

		return $this->fetch("index");
	}

	public function preview()
	{
		$getData = Request::get();
		$results = Db::table("goods_list")->where("id",$getData["id"])->find();

		// 将商品分类替换为商品名称
		$classify = Db::table("goods_classify")->field("name")->where("id","in",$results["classify"])->select();
		$classifyStr = [];
		foreach ($classify as $value) {
			$classifyStr[] = $value["name"];
		}
		$results["classify"] = implode(",",$classifyStr);

		// 将品牌id换成为品牌名称
		$brand = Db::table("brand_list")->field("name")->where("id",$results["brand"])->find();
		$results["brand"] = $brand["name"];

		// 将生产地id换成为生产地名称
		$yieldly = Db::table("area")->field("name")->where("id",$results["yieldly"])->find();
		$results["yieldly"] = $yieldly["name"];

		// 获取商品的价格、原价和库存
		$goodsFormat = Db::table("goods_format")->field("price,origin_coset,inventory")->where("parent_id",$getData["id"])->select();
		
		$results["max_price"] = 0;
		$results["min_price"] = 0;
		$results["max_origin_coset"] = null;
		$results["min_origin_coset"] = null;
		$results["inventory_total"] = null;

		foreach ($goodsFormat as $value) {

				if($value["price"] > $results["max_price"]) {
					$results["max_price"] = $value["price"];
				}elseif ($results["min_price"] == 0) {
					$results["min_price"] = $value["price"];
				}elseif ($value["price"] < $results["min_price"]) {
					$results["min_price"] = $value["price"];
				}

				if($value["origin_coset"] != null && $value["origin_coset"] > $results["max_origin_coset"]){
					$results["max_origin_coset"] = $value["origin_coset"];
				}elseif ($value["origin_coset"] != null && $results["min_origin_coset"] == 0) {
					$results["min_origin_coset"] = $value["origin_coset"];
				}elseif ($value["origin_coset"] != null && $value["origin_coset"] < $results["min_origin_coset"]) {
					$results["min_origin_coset"] = $value["origin_coset"];
				}


				if($value["inventory"] != null){
					$results["inventory_total"] += $value["inventory"];
				}
				
			}

		// dump($results);

		$this->assign("results",$results);
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

	// 上传视频
	public function uploadVideo()
	{
		// 获取图片
		$file = Request::file();

		$info = null;

		if(isset($file['video'])){

			$info = $file['video']->move(__DIR__.'/../../../public/static/admin/uploads');

		}else{

			return json_encode(array("code"=>0, "msg"=>"没有上传文件"));

		}

		// 验证图片格式
		$ext = $info->getExtension();

		if(!in_array($ext, array('avi','wmv','mov','swf','flv','mp4'))){
			return json_encode(array("code"=>0, "msg"=>"请上传avi、wmv、mov、swf、flv、mp4格式图片"));
		}		

		// 限制图片大小
		$size = filesize(__DIR__.'/../../../public/static/admin/uploads/'.$info->getSaveName());
		if($size > 100*1024*1024){
			return json_encode(array("code"=>0, "msg"=>"请上传小于100MB的视频"));
		}

		$img = "/static/admin/uploads/".$info->getSaveName();

		return json_encode(array("code"=>1, "msg"=>$img));
	}

	public function saveGodds()
	{
		$data = Request::post();

		// 获取商品规格
		$shopFormat = $data["shop_format"];
		unset($data["shop_format"]);

		// 删除数组中的杂项
		unset($data["img"]);
		unset($data["video"]);

		foreach ($data as $key => $value) {
			if(strstr($key, "price") != false){
				unset($data[$key]);
			}elseif (strstr($key, "inventory") != false) {
				unset($data[$key]);
			}elseif (strstr($key, "heft") != false) {
				unset($data[$key]);
			}elseif (strstr($key, "sc_code") != false) {
				unset($data[$key]);
			}elseif (strstr($key, "bar_code") != false) {
				unset($data[$key]);
			}elseif (strstr($key, "origin_coset") != false) {
				unset($data[$key]);
			}
		}

		if(!isset($data["id"])){

			$data["create_time"] = time();
			$shopId = Db::table("goods_list")->insertGetId($data);

			for($i=0; $i<count($shopFormat); $i++){
				$shopFormat[$i]["parent_id"] = $shopId;
				$shopFormat[$i]["create_time"] = time();
			}

			$res = Db::table("goods_format")->insertAll($shopFormat);

		}else{

			// $data["update_time"] = time();
			// $res = Db::table("goods_classify")->where("id",$data["id"])->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	public function delGoods()
	{
		$id = Request::get("id");

		$res = Db::table('goods_format')->where("parent_id",$id)->delete();
		$res = Db::table('goods_list')->delete($id);

		if($res){
			return ["code"=>1,"msg"=>"删除成功"];
		}else{
			return ["code"=>0,"msg"=>"删除失败"];
		}
	}
}