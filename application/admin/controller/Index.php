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
		if($admin["role"] == 1){
			$authority = Db::table("authority_allocation")->where("user_id", $admin["id"])->select();
		}else{
			$authority = Db::table("authority_allocation")->where("user_id", $admin["user_id"])->where("is_show",1)->select();
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

		// dump($lists);
		
		$this->assign('admin',$admin);

		return $this->fetch();
	}

	public function loginout()
	{
		Session::delete('admin');

		return redirect('/admin/login/index');
	}
}