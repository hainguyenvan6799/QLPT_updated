<?php 
	class QuanLyThietBiController extends BaseController
	{
		public function __construct(){
			parent::construct();
		}
		public function ThemThietBi(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyThietBi/ThemThietBi",
				"data"=>parent::$Model_phongtro->XemDSPhong_Them()
			]);
		}


		public function getThemThietBi(){
			$tenThietBi =($_POST["tenthietbi"]);
			$maPhong = ($_POST["maphong"]);
			$tinhTrang = ($_POST["tinhtrang"]);
			$soLuong =($_POST["soluong"]);
			parent::$Model_thietbi->ThemThietBi($tenThietBi, $maPhong, $tinhTrang, $soLuong);
		}
		public function XemDSThietBi(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyThietBi/XemDSThietBi",
				"data"=>parent::$Model_thietbi->XemDSThietBi()
			]);

		}
		public function XoaThietBi($mathietbi){
			parent::$Model_thietbi->XoaThietBi($mathietbi);
		}

	}
 ?>