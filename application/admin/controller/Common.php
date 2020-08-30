<?php

namespace app\admin\controller;

use think\Controller;
use think\facade\Session;

class Common extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$admin = Session::get('admin');
		if(!$admin){
			header('Location:/admin/login/index');
			exit();
		}
	}
}