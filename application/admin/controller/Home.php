<?php

namespace app\admin\controller;

use app\admin\controller\Common;

class Home extends Common
{
	public function index()
	{
		return $this->fetch();
	}
}