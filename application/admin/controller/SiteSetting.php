<?php

namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class SiteSetting extends Common
{
	public function index()
	{
		$tab = Request::param('tab');

		if(!$tab){
			$tab = 1;
		}

		$data = null;
		if($tab == 1){
			// 站点配置——站点设置——基础配置
			$data = Db::table("base_configure")->where("id",1)->find();
			
		}elseif($tab == 2){
			// 站点配置——站点设置——用户注册
			$data = Db::table("user_register")->where("id",1)->find();

			if($data){
				// 将is_open_register字符串转化为数组
				$data["is_open_register"] = explode(",",$data["is_open_register"]);
			}
			

		}elseif($tab == 3){
			// 站点配置——站点设置——用户登录
			$data = Db::table("user_login")->where("id",1)->find();

		}elseif($tab == 4){
			// 站点配置——站点设置——密码找回
			$data = Db::table("password_find")->where("id",1)->find();

		}elseif($tab == 5){
			// 站点配置——站点设置——附件
			$data = Db::table("accessory")->where("id",1)->find();

		}elseif($tab == 6){
			// 站点配置——站点设置——图片验证码
			$data = Db::table("pic_identifying_code")->where("id",1)->find();

			if($data){
				// 将is_open_register字符串转化为数组
				$data["pic_code_regulation"] = explode(",",$data["pic_code_regulation"]);
			}
			
		}elseif($tab == 7){
			// 站点配置——站点设置——订单售后
			$data = Db::table("ordering_service")->where("id",1)->find();

		}elseif($tab == 8){
			// 站点配置——站点设置——搜索
			$data = Db::table("search")->where("id",1)->find();

			if($data){
				
				$data["search_key"] = explode(",",$data["search_key"]);

			}

		}

		$this->assign('tab',$tab);
		$this->assign('data',$data);

		return $this->fetch();
	}

	// 上传图片
	public function uploadImg()
	{
		// 获取图片
		$file = Request::file();

		$info = null;
		$field = null;

		if(isset($file['computer_logo'])){

			$info = $file['computer_logo']->move(__DIR__.'/../../../public/static/admin/uploads');
			$field = 1;

		}elseif(isset($file['phone_logo'])){

			$info = $file['phone_logo']->move(__DIR__.'/../../../public/static/admin/uploads');
			$field = 2;

		}elseif(isset($file['dest_icon'])){

			$info = $file['dest_icon']->move(__DIR__.'/../../../public/static/admin/uploads');
			$field = 3;

		}elseif(isset($file['register_bg'])){

			$info = $file['register_bg']->move(__DIR__.'/../../../public/static/admin/uploads');
			$field = 4;

		}elseif(isset($file['login_pic1'])){

			$info = $file['login_pic1']->move(__DIR__.'/../../../public/static/admin/uploads');
			$field = 5;

		}elseif(isset($file['login_pic2'])){

			$info = $file['login_pic2']->move(__DIR__.'/../../../public/static/admin/uploads');
			$field = 6;

		}elseif(isset($file['login_pic3'])){

			$info = $file['login_pic3']->move(__DIR__.'/../../../public/static/admin/uploads');
			$field = 7;

		}else{

			return json_encode(array("code"=>0, "msg"=>"没有上传文件"));

		}

		// 验证图片格式
		$ext = $info->getExtension();

		if($field == 1){

			if(!in_array($ext, array('jpg','png','gif'))){
				return json_encode(array("code"=>0, "msg"=>"请上传jpg、png、gif格式图片"));
			}

		}elseif($field == 2){

			if(!in_array($ext, array('jpg','png','gif'))){
				return json_encode(array("code"=>0, "msg"=>"请上传jpg、png、gif格式图片"));
			}

		}elseif(in_array($field,array(3,4,5,6,7))){

			if(!in_array($ext, array('jpg','png'))){
				return json_encode(array("code"=>0, "msg"=>"请上传jpg、png格式图片"));
			}

		}
		

		// 限制图片大小
		$size = filesize(__DIR__.'/../../../public/static/admin/uploads/'.$info->getSaveName());
		if($size > 200*1024){
			return json_encode(array("code"=>0, "msg"=>"请上传小于200KB的图片"));
		}

		$img = "/static/admin/uploads/".$info->getSaveName();

		return json_encode(array("code"=>1, "msg"=>$img, "field"=>$field));
	}

	// 保存基础配置
	public function saveBaseConfigure()
	{
		$data = Request::post();

		if(!$data['site_name']){
			return ['code'=>0, 'msg'=>'请填写站点名称'];
		}

		if(!$data['computer_logo']){
			return ['code'=>0, 'msg'=>'请上传电脑端logo'];
		}

		if(!$data['phone_logo']){
			return ['code'=>0, 'msg'=>'请上传手机端logo'];
		}

		if(!$data['dest_icon']){
			return ['code'=>0, 'msg'=>'请上传桌面图标'];
		}

		if($data['site_status'] == 1 && $data['closed_reason'] == ''){
			return ['code'=>0, 'msg'=>'当站点状态选择关闭时，请填写关闭原因'];
		}

		if(!$data['page_max_width']){
			return ['code'=>0, 'msg'=>'请填写页面最大宽度'];
		}

		// 查询用户是否存在基础配置
		$res = Db::table("base_configure")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("base_configure")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("base_configure")->where("id",1)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	// 保存用户注册
	public function saveUserRegister()
	{
		$data = Request::post();

		// 查询用户是否存在用户注册
		$res = Db::table("user_register")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("user_register")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("user_register")->where("id",1)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	// 保存用户登录
	public function saveUserLogin()
	{
		$data = Request::post();

		// 查询用户是否存在用户登录
		$res = Db::table("user_login")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("user_login")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("user_login")->where("id",1)->update($data);

		}
		

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	// 保存找回密码
	public function savePasswordFind()
	{
		$data = Request::post();

		// 查询用户是否存在用户登录
		$res = Db::table("password_find")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("password_find")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("password_find")->where("id",1)->update($data);

		}
		

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	// 保存附件
	public function saveAccessory()
	{
		$data = Request::post();

		if(!$data['pic_max_limit']){
			return ['code'=>0, 'msg'=>'请填写图片最大限制'];
		}

		if(!$data['file_max_limit']){
			return ['code'=>0, 'msg'=>'请填写文件最大限制'];
		}

		if(!$data['video_max_limit']){
			return ['code'=>0, 'msg'=>'请填写视频最大限制'];
		}

		// 查询用户是否存在基础配置
		$res = Db::table("accessory")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("accessory")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("accessory")->where("id",1)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	// 保存找回密码
	public function savePicIdentifyingCode()
	{
		$data = Request::post();


		// 查询用户是否存在用户注册
		$res = Db::table("pic_identifying_code")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("pic_identifying_code")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("pic_identifying_code")->where("id",1)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	// 保存订单售后
	public function saveOrderingService()
	{
		$data = Request::post();


		// 查询用户是否存在用户注册
		$res = Db::table("ordering_service")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("ordering_service")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("ordering_service")->where("id",1)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	// 保存搜索
	public function saveSearch()
	{
		$data = Request::post();


		// 查询用户是否存在用户注册
		$res = Db::table("search")->where("id",1)->find();

		if(!$res){

			$data["create_time"] = time();
			$res = Db::table("search")->insert($data);

		}else{

			$data["update_time"] = time();
			$res = Db::table("search")->where("id",1)->update($data);

		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}
}