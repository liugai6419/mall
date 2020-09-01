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
		$username = trim(Request::post('username'));
		$password = trim(Request::post('password'));

		// 用户名称不能为空
		if($username === ''){
			return ['code' => 0, 'msg' => '用户名称不能为空!'];
		}

		if($password === ''){
			return ['code' => 0, 'msg' => '密码不能为空!'];
		}

		$data = Db::table('admin')->where('username',$username)->find();
		$md5Pwd = md5($password);

		if(!$data || $md5Pwd !== $data['password']){
			return ['code' => 0, 'msg' => '用户名称或密码错误!'];
		}

		Session::set('admin', $data);

		return ['code' => 1, 'msg' => '登录成功'];
	}
}