<?php 
	class TrangChuController extends BaseController
	{	
		public $a;
		public function __construct(){
			$this->a = $this->model("User");
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
		public function Home(){
			// $user_login = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 'hello';
			// $getFriends = parent::$userModel->getFriendsOfUser($user_login);
			// $getNoFriends = $this->userModel->getUserAreNotFriends($user_login);
			// $this->view("TrangChu",[
			// 	'getFriends' => $getFriends,
			// 	"page"=>"TrangChu/DSPT-TrangChu",
			// 	"data"=>$this->Model->XemDSPhong_Them_PhongTrong(),
			// 	'getNoFriends' => $getNoFriends
			// ]);

			// print_r($user_login);
			// print_r($getFriends);
			// print_r($getNoFriends);
			
			// echo "nguyen van hai";
			$this->a->test();

		}
		public function XemChiTiet($maphong){
					$this->view("TrangChu",[
				"page"=>"TrangChu/XemChiTiet",  
				"data"=>$this->Model->XemChiTietPhong($maphong),
				"data1"=>$this->Model1->DSThietBi($maphong)
			]);
				
			
		}

				public function TimKiem(){
			$quan =($_POST["quan"]);
			$gia =($_POST["gia"]);
			$this->view("TrangChu",[
				"page"=>"TrangChu/DSPT-TrangChu",
				"data"=>$this->Model->TimKiem($quan,$gia)
			]);
			
		}


	}
 ?>
