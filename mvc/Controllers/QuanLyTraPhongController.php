<?php 
	class QuanLyTraPhongController extends BaseController
	{
		public function __construct(){
			parent::__construct();
		}
		public function ThemPhieuTraPhong(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyTraPhong/ThemPhieuTra",
				"data"=>parent::$Model_phongtro->XemDSPhong_Them_DaThue()
			]);
		}

		public function getThemPhieuTra(){
			$maPhieuThue =($_POST["maphieuthue"]);
			$maPhong = ($_POST["maphong"]);
			$cMT = ($_POST["cmt"]);
			$ngayTra =($_POST["ngaytra"]);
			$tienCoc =($_POST["tiencoc"]);
			$ghiChu =($_POST["ghichu"]);
			parent::$Model_phieutra->ThemPhieuTra($maPhieuThue,$maPhong, $cMT, $ngayTra, $tienCoc, $ghiChu);
			parent::$Model_phongtro->CapNhatTrangThai_TP($maPhong);
		}
		public function ajax(){
			if(isset($_POST['get_option']))
			{
				parent::$Model_phieuthue->ajax($_POST["get_option"]);
			}
		}
	}
 ?>