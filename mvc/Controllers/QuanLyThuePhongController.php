<?php 
	class QuanLyThuePhongController extends BaseController
	{
		public function __construct(){
			parent::__construct();
		}
		public function ThemPhieuThue(){
			//$this->Model->ajax();
			$this->view("Admin/Master",[
				"page"=>"QuanLyThuePhong/ThemPhieuThue",
				"data"=>parent::$Model_phongtro->XemDSPhong_Them_PhongTrong()
			]);
		}

		public function getThemPhieuThue(){
			$maPhong =($_POST["maphong"]);
			$ngayThue = ($_POST["ngaythue"]);
			$tienCoc = ($_POST["tiencoc"]);
			$ghiChu =($_POST["ghichu"]);
			$hoTen =($_POST["hoten"]);
			$cMT =($_POST["cmt"]);
			$gioiTinh =($_POST["gioitinh"]);
			$ngheNghiep =($_POST["nghenghiep"]);
			$sDT =($_POST["sdt"]);
			$diaChi =($_POST["diachi"]);
			parent::$Model_khachthue->ThemKhachThue($cMT, $hoTen, $gioiTinh, $ngheNghiep, $sDT, $diaChi,$maPhong);
			parent::$Model_phieuthue->ThemPhieuThue($maPhong, $cMT, $ngayThue, $tienCoc, $ghiChu);
			parent::$Model_phongtro->CapNhatTrangThai($maPhong);
		}
		
	}
 ?>