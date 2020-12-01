<?php 
	class BaseController
	{
		public static $Model;
		// public static $Model1;
		public static $userModel;
		// public static $messageModel;
		// public static $Model_phieuthu;
		// public static $Model_phongtro;
		// public static $Model_thietbi;
		// public static $Model_khachthue;
		// public static $Model_phieuthue;
		// public static $Model_phieutra;
		public function __construct(){
			self::$Model = $this->model('PhongTro');
			self::$userModel = $this->model('User');
			// self::$Model1 = $this->model("ThietBi");
			// self::$messageModel = $this->model("Message");
			// self::$Model_phieuthu = $this->model("phieuthu");
			// self::$Model_phongtro = $this->model("PhongTro");
			// self::$Model_thietbi = $this->model("ThietBi");
			// self::$Model_khachthue = $this->model("KhachThue");
			// self::$Model_phieuthue = $this->model("PhieuThue");
			// self::$Model_phieutra = $this->model("PhieuTra");
		}
		public function model($model)
		{
			require_once "mvc/Models/".$model.".php";
			return new $model;
		}
		public function view($view, $data = [])
		{
			require_once "mvc/Views/".$view.".php";
		}
	}
 ?>