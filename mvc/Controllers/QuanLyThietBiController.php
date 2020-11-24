<?php 
	class QuanLyThietBiController extends BaseController
	{
		// public $Model;
		// public $Model_pt;
		public function __construct(){
			// $this->Model = $this->model("thietbi");
			// $this->Model_pt = $this->model("phongtro");
		}
		public function ThemThietBi(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyThietBi/ThemThietBi",
				"data"=>$this->Model_phongtro->XemDSPhong_Them()
			]);
		}


		public function getThemThietBi(){
			$tenThietBi =($_POST["tenthietbi"]);
			$maPhong = ($_POST["maphong"]);
			$tinhTrang = ($_POST["tinhtrang"]);
			$soLuong =($_POST["soluong"]);
			$this->Model_thietbi->ThemThietBi($tenThietBi, $maPhong, $tinhTrang, $soLuong);
		}
		public function XemDSThietBi(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyThietBi/XemDSThietBi",
				"data"=>$this->Model_thietbi->XemDSThietBi()
			]);

		}
		public function XoaThietBi($mathietbi){
			$this->Model_thietbi->XoaThietBi($mathietbi);
		}

	}
 ?>