<?php 
	class BaseController
	{
		public $Model;
		public $Model1;
		public $userModel;
		public static $test;
		public $messageModel;
		public $Model_phieuthu;
		public $Model_phongtro;
		public $Model_thietbi;
		public $Model_khachthue;
		public $Model_phieuthue;
		public $Model_phieutra;
		public static function __construct(){
			$this->test = "testVar";
			// $this->userModel = $this->model("User");
			// $this->Model = $this->model("PhongTro");
			// $this->Model1 = $this->model("ThietBi");
			// $this->messageModel = $this->model("Message");
			// $this->Model_phieuthu = $this->model("phieuthu");
			// $this->Model_phongtro = $this->model("PhongTro");
			// $this->Model_thietbi = $this->model("ThietBi");
			// $this->Model_khachthue = $this->model("KhachThue");
			// $this->Model_phieuthue = $this->model("PhieuThue");
			// $this->Model_phieutra = $this->model("PhieuTra");
		}
		public function model($model)
		{
			require_once "mvc/Models/".$model.".php";
			return new $model;
		}
		public static function view($view, $data = [])
		{
			require_once "mvc/Views/".$view.".php";
		}
	}
 ?>