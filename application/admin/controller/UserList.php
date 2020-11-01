<?php

namespace app\admin\controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;

use app\admin\controller\Common;
use think\facade\Request;
use think\facade\Session;
use think\Db;

require '../vendor/autoload.php';

class UserList extends Common
{
	public function index()
	{
		// $spreadsheet = new Spreadsheet();
		// dump($spreadsheet);
		// 获取显示数量
		$pageNum = Db::table("backstage_config")->find();
		
		$data = Db::table("user")->order('create_time','desc')->paginate($pageNum['paging_num']);
		
		$page = $data->render();

		$this->assign('data',$data);
		$this->assign('page', $page);
		$this->assign('num',1);

		return $this->fetch();
	}

	public function found()
	{
		$getData = Request::get();

		// 获取角色	
		if(isset($getData["tab"])){
			$results = Db::table("user")->where("id",$getData["id"])->find();

			$this->assign('results',$results);
		}else{
			$this->assign('results',null);
		}

		return $this->fetch();
	}

	public function preview()
	{
		$getData = Request::get();
		$results = Db::table("user")->where("id",$getData["id"])->find();

		$this->assign("results",$results);
		return $this->fetch();
	}

	public function saveUser()
	{
		$data = Request::post();

		// 将出生日期转为时间戳
		if($data["birthday"] != ""){
			$data["birthday"] = strtotime($data["birthday"]);
		}

		if(!isset($data["id"])){
			
			$data["create_time"] = time();
			$res = Db::table("user")->insert($data);
			
		}else{
			$id = $data["id"];

			unset($data["id"]);

			if($data["password"] == ""){
				unset($data["password"]);
			}
			
			$data["update_time"] = time();
			$res = Db::table("user")->where("id",$id)->update($data);
		}

		if($res){
			return ["code"=>1,"msg"=>"保存成功"];
		}else{
			return ["code"=>0,"msg"=>"保存失败"];
		}
	}

	public function delUser()
	{
		$data = Request::get("id");

		$res = Db::table('user')->delete($data);

		if($res){
			return ["code"=>1,"msg"=>"删除成功"];
		}else{
			return ["code"=>0,"msg"=>"删除失败"];
		}
	}

	public function search()
	{
		// 获取前端数据
		$conditon = Request::get();

		if($conditon["npen"] == ""){

			$conditon["npen"] = "%";
		}else{

			$conditon["npen"] = "%".$conditon["npen"]."%";
		}

		if($conditon["sex"] == ""){

			$conditon["sex"] = "not null";
		}

		if($conditon["user_status"] == ""){

			$conditon["user_status"] = "not null";
		}

		if($conditon["date"] == ""){

			$conditon["start"] = "1970-01-01";
			$conditon["end"] = date("Y-m-d",strtotime("+1 day"));
		}else{

			$arr = explode(" - ", $conditon["date"]);

			$conditon["start"] = $arr[0];
			$conditon["end"] = $arr[1];
		}

		// 获取显示数量
		$pageNum = Db::table("backstage_config")->find();

		$arg['query']['npen'] = $conditon["npen"];
		$arg['query']['sex'] = $conditon["sex"];
		$arg['query']['user_status'] = $conditon["user_status"];
		$arg['query']['date'] = $conditon["date"];

		// 获取管理员
		$data = Db::table("user")
				->where("username|telephone|email|nickname", "like", $conditon["npen"])
				->where("sex",$conditon["sex"])
				->where("user_status",$conditon["user_status"])
				->where("create_time", "between time", [$conditon["start"], $conditon["end"]])
				->order("create_time", "desc")
				->paginate($pageNum['paging_num'],"",$arg);

		$page = $data->render();

		$this->assign('page', $page);
		$this->assign('data',$data);
		$this->assign('num', 1);

		return $this->fetch("index");
	}

	public function importExcel()
	{
		// 获取用户信息数据
		$res = Db::table("user")->select();

		// 调整用户信息数据
		$data = [];
		foreach ($res as $value) {
			// 除去数组中id和password字段
			unset($value["id"]);
			unset($value["password"]);

			// 将出生日期时间戳改为日期或空
			$value["birthday"] = $value["birthday"] == 0 ? "" : date("Y-m-d",$value["birthday"]);

			// 将1、2、3改为男性、女性、保密
			if($value["sex"] == 1){
				$value["sex"] = "男性";
			}elseif($value["sex"] == 2){
				$value["sex"] = "女性";
			}else{
				$value["sex"] = "保密";
			}

			// 将1、2、3、4改为正常、待审核、禁止发言、禁止登录
			if($value["user_status"] == 1){
				$value["user_status"] = "正常";
			}elseif($value["user_status"] == 2){
				$value["user_status"] = "待审核";
			}elseif($value["user_status"] == 3){
				$value["user_status"] = "禁止发言";
			}else{
				$value["user_status"] = "禁止登录";
			}

			// 将更新时间时间戳改为日期或未有更新
			$value["update_time"] = $value["update_time"] == 0 ? "" : date("Y-m-d",$value["update_time"]);

			// 将创建时间时间戳改为日期
			$value["create_time"] = date("Y-m-d",$value["create_time"]);

			$data[] = $value;
		}

		$spreadsheet = new Spreadsheet();

		// 设置表标题
		$sheet = $spreadsheet->getActiveSheet()->setTitle('用户信息');
 		
		// 设置表头标题
		$title = ["用户名","昵称","出生日期","性别","详细地址","手机号码","电子邮件","积分","用户状态","支付宝openid","微信openid","百度opendi","跟新时间","创建时间"];
		foreach ($title as $key => $value) {
			$sheet->setCellValueByColumnAndRow($key + 1, 1, $value);
		}
 
		// 插入用户信息数据
		$row = 2;
		foreach ($data as $item) {
			$column = 1;
			foreach ($item as $value) {
				$sheet->setCellValueByColumnAndRow($column, $row, $value);
				$column++;
			}
			$row++;
		}

		//设置表头样式 加粗
		$font = [
			'font' => [
				'bold' => true,
				'background' => "#cccccc"
			],
		];
		$sheet->getStyle('A1:N1')->applyFromArray($font);

		// 设置单元格宽度
		$sheetWidth = ["A" => 10, "B" => 20, "C" => 12, "D" => 10, "E" => 60, "F" => 14, "G" => 22, "H" => 10, "I" => 12, "J" => 30, "K" => 30, "L" => 30, "M" => 12, "N" => 12];
		foreach ($sheetWidth as $key => $value) {
			$sheet->getColumnDimension($key)->setWidth($value);
		}

		// 下载
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="用户信息.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
 
		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0
	
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
	}
}