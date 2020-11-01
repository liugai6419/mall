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

		$data = Db::table('admin')->where('username|telephone',$account)->find();

		$md5Pwd = md5($password);

		if(!$data || $md5Pwd !== $data['password']){
			return ['code' => 0, 'msg' => '用户名称或密码错误!'];
		}

		if($data['id'] != 5){
			$roleState = Db::table('role_manage')->where('id', $data['authority_group'])->field('is_start')->find();
			if($roleState['is_start'] == 1){
				return ["code"=>0,"msg"=>"你所属角色组已被停用，请联系超级管理员"];
			}
		}

		Session::set('admin', $data);
		Db::table('admin')->where('id',$data['id'])->inc('login_total')->exp('login_time', time())->update();

		return ['code' => 1, 'msg' => '登录成功'];
	}
}