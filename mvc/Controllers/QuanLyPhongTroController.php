<?php 
	class QuanLyPhongTroController extends BaseController
	{
		public function __construct(){
			parent::__construct();
		}
		public function ThemPhongTro(){
			$this->view("Admin/Master",["page"=>"QuanLyPhongTro/ThemPhongTro"]);
		}


		public function getThemPhongTro(){
			$tenPhong =($_POST["tenPhong"]);
			$tieuDe =($_POST["tieude"]);
			$quan = ($_POST["quan"]);
			$diaChi = ($_POST["diaChi"]);
			$moTa =($_POST["moTa"]);
			$gia = ($_POST["gia"]);
			$img= $_FILES['img']['name'];
			$temp= $_FILES['img']['tmp_name'];
			parent::$Model_phongtro->ThemPhong($tenPhong,$tieuDe, $quan, $diaChi, $moTa, $gia, $img, $temp);
		}
		public function XemDSPhong(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyPhongTro/XemDSPhong",
				"data"=>parent::$Model_phongtro->XemDSPhong()
			]);
		}
		public function XemChiTiet($maphong){
			$this->view("Admin/Master1",[
				"page"=>"QuanLyPhongTro/XemChiTiet",
				"data"=>parent::$Model_phongtro->XemChiTietPhong($maphong),
				"data1"=>parent::$Model_thietbi->DSThietBi($maphong)

			]);
		}
		public function XoaPhong($maphong){
			parent::$Model_phongtro->XoaPhong($maphong);
		}

	}
 ?>