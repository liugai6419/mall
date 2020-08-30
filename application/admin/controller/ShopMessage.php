<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class ShopMessage extends Common
{
	public function index()
	{
		$user_id = Session::get('admin')["id"];

		$data = Db::table("shop_message")->where("user_id",$user_id)->find();

		$this->assign("data",$data);

		return $this->fetch();
	}

	public function uploadImg()
	{
		// 获取图片
		$file = Request::file('qrcode_img');
		if(!$file){
			return json_encode(array("code"=>0, "msg"=>"没有上传文件"));
		}

		// 将图片保存在/public/static/admin/uploads文件中
		$info = $file->move(__DIR__.'/../../../public/static/admin/uploads');

		// 验证图片格式
		$ext = $info->getExtension();
		if(!in_array($ext, array('jpg','png','bmp','jpeg'))){
			return json_encode(array("code"=>0, "msg"=>"请上传jpg、png、bmp、jpeg格式图片"));
		}

		// 限制图片大小
		$size = filesize(__DIR__.'/../../../public/static/admin/uploads/'.$info->getSaveName());
		if($size > 200*1024){
			return json_encode(array("code"=>0, "msg"=>"请上传小于200KB的图片"));
		}

		$img = "/static/admin/uploads/".$info->getSaveName();

		return json_encode(array("code"=>1, "msg"=>$img));
	}

	public function saveShopMessage()
	{
		$data = Request::post();

		// 获取用户id
		$user_id = Session::get('admin')["id"];

		// 查询用户是否存在用户注册
		$res = Db::table("shop_message")->where("user_id",$user_id)->find();

		if(!$res){

			$data["user_id"] = $user_id;
			$data["create_time"] = time();
			$res = Db::table("shop_message")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("shop_message")->where("user_id",$user_id)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}
}