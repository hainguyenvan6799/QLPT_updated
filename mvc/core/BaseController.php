<?php 
	class BaseController
	{
		public static $Model;
		public static $Model1;
		public static $userModel;
		// public static $test;
		public static $messageModel;
		public static $Model_phieuthu;
		public static $Model_phongtro;
		public static $Model_thietbi;
		public static $Model_khachthue;
		public static $Model_phieuthue;
		public static $Model_phieutra;
		public static function __construct(){
			// self::$test = "testVar";
			self::$userModel = self::model("User");
			self::$Model = self::model("PhongTro");
			self::$Model1 = self::model("ThietBi");
			self::$messageModel = self::model("Message");
			self::$Model_phieuthu = self::model("phieuthu");
			self::$Model_phongtro = self::model("PhongTro");
			self::$Model_thietbi = self::model("ThietBi");
			self::$Model_khachthue = self::model("KhachThue");
			self::$Model_phieuthue = self::model("PhieuThue");
			self::$Model_phieutra = self::model("PhieuTra");
		}
		public static function model($model)
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