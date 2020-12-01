<?php 
	class QuanLyThuTienController extends BaseController
	{
		public function __construct(){
			parent::__construct();
		}
		public function ThemPhieuThu(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyThuTien/ThemPhieuThu",
				"data"=>parent::$Model_phongtro->XemDSPhong_Them_DaThue()
			]);
		}

		public function getThemPhieuThu(){
			$maPhong = ($_POST["maphong"]);
			$cMT = ($_POST["cmt"]);
			$soDien =($_POST["sodien"]);
			$giaDien =($_POST["giadien"]);
			$soNuoc =($_POST["sonuoc"]);
			$giaNuoc =($_POST["gianuoc"]);
			$giaPhong =($_POST["giaphong"]);
			$tongTien =($_POST["tongtien"]);
			$ngayGhi =($_POST["ngayghi"]);
			$ghiChu =($_POST["ghichu"]);
			parent::$Model_phieuthu->ThemPhieuThu($maPhong, $cMT, $soDien, $giaDien, $soNuoc, $giaNuoc, $giaPhong, $tongTien, $ngayGhi, $ghiChu );
		}
		public function ajax(){
			if(isset($_POST['get_option']))
			{
				parent::$Model_phieuthue->ajax($_POST["get_option"]);
			}
		}
		public function XemDSPhieuThu(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyThuTien/XemDSPhieuThu",
				"data"=>parent::$Model_phieuthu->XemDSPhieuThu()
			]);
			//$this->Model->XemDSPhieuThu();
		}
		public function XemChiTiet($maphieuthu){
			$this->view("Admin/Master1",[
				"page"=>"QuanLyThuTien/XemChiTiet",
				"data"=>parent::$Model_phieuthu->XemChiTiet($maphieuthu)
			]);
			//$this->Model->XemChiTiet($maphieuthu);
		}

	}
 ?>