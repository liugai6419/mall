<?php
namespace app\admin\controller;

use think\Controller;
use think\facade\Request;
use think\facade\Session;
use think\Db;

class Login extends Controller
{
	public function index()
	{
		return $this->fetch();
	}

	public function login()
	{
		$account = trim(Request::post('account'));
		$password = trim(Request::post('password'));

		// 用户名称不能为空
		if($account === ''){
			return ['code' => 0, 'msg' => '账号不能为空!'];
		}

		if($password === ''){
			return ['code' => 0, 'msg' => '密码不能为空!'];
		}

		// 判断是注册者还是管理员
		$data = null;
		if(preg_match("/^1[34578]{1}\d{9}$/", $account)){
			$data = Db::table('admin')->where('telephone',$account)->find();
			$data["role"] = 1;
		}else{
			$data = Db::table('manager_list')->where('username',$account)->find();
			$data["role"] = 2;
		}


		$md5Pwd = md5($password);

		if(!$data || $md5Pwd !== $data['password']){
			return ['code' => 0, 'msg' => '用户名称或密码错误!'];
		}

		Session::set('admin', $data);

		return ['code' => 1, 'msg' => '登录成功'];
	}
}