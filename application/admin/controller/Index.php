<?php
namespace app\admin\controller;

use app\admin\controller\Common;
use think\Db;
use think\facade\Session;

class Index extends Common
{
	public function index()
	{
		$admin = Session::get('admin');
		
		$authority = null;

		if($admin["id"] == 5){
			// 顶级超级管理员
			$authority = Db::table("authority_allocation")->order('marshalling_sequence', 'desc')->select();
		}else{
			// 获取此用户的角色组
			$roleAuthority = Db::table("role_manage")->where("id",$admin["authority_group"])->find();

			// 其他管理员
			$authority = Db::table("authority_allocation")->where("is_show",1)->where('id','in',$roleAuthority['authority'])->order('marshalling_sequence', 'desc')->select();

		}

		$lists = [];
		foreach ($authority as $value) {
			if($value["parent_id"] == 0){
				foreach ($authority as $val) {
					if($value["id"] == $val["parent_id"]){
						$value["second_authority"][] = $val;
					}
				}

				if(!isset($value["second_authority"])){
					$value["second_authority"] = [];
				}
				
				$lists[] = $value;
			}
		}
		
		$this->assign('admin',$admin);

		$this->assign('lists',$lists);

		return $this->fetch();
	}

	public function loginout()
	{
		Session::delete('admin');

		return redirect('/admin/login/index');
	}
}