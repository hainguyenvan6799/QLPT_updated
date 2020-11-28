<?php 
	class QuanLyTraPhongController extends BaseController
	{
		public function ThemPhieuTraPhong(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyTraPhong/ThemPhieuTra",
				"data"=>$this->Model_phongtro->XemDSPhong_Them_DaThue()
			]);
		}

		public function getThemPhieuTra(){
			$maPhieuThue =($_POST["maphieuthue"]);
			$maPhong = ($_POST["maphong"]);
			$cMT = ($_POST["cmt"]);
			$ngayTra =($_POST["ngaytra"]);
			$tienCoc =($_POST["tiencoc"]);
			$ghiChu =($_POST["ghichu"]);
			$this->Model_phieutra->ThemPhieuTra($maPhieuThue,$maPhong, $cMT, $ngayTra, $tienCoc, $ghiChu);
			$this->Model_phongtro->CapNhatTrangThai_TP($maPhong);
		}
		public function ajax(){
			if(isset($_POST['get_option']))
			{
				$this->Model_phieuthue->ajax($_POST["get_option"]);
			}
		}
	}
 ?>