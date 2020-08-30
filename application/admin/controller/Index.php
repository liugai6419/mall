<?php
namespace app\admin\controller;

use app\admin\controller\Common;
use think\facade\Session;

class Index extends Common
{
	public function index()
	{
		$admin = Session::get('admin');
		// var_dump($admin);
		// Session::delete('admin');
		$this->assign('admin',$admin);

		return $this->fetch();
	}

	public function loginout()
	{
		Session::delete('admin');

		return redirect('/admin/login/index');
	}
}