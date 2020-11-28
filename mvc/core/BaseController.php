<?php 
	class BaseController
	{
		public $Model;
		public $Model1;
		public $userModel;
		public $messageModel;
		public $Model_phieuthu;
		public $Model_phongtro;
		public $Model_thietbi;
		public $Model_khachthue;
		public $Model_phieuthue;
		public $Model_phieutra;
		public function __construct(){
			$this->userModel = $this->model("User");
			$this->Model = $this->model("PhongTro");
			$this->Model1 = $this->model("ThietBi");
			$this->messageModel = $this->model("Message");
			$this->Model_phieuthu = $this->model("phieuthu");
			$this->Model_phongtro = $this->model("PhongTro");
			$this->Model_thietbi = $this->model("ThietBi");
			$this->Model_khachthue = $this->model("KhachThue");
			$this->Model_phieuthue = $this->model("PhieuThue");
			$this->Model_phieutra = $this->model("PhieuTra");
		}
		public function model($model)
		{
			require_once "./mvc/Models/".$model.".php";
			return new $model;
		}
		public function view($view, $data = [])
		{
			require_once "./mvc/Views/".$view.".php";
		}
	}
 ?>