<?php 
	class TrangChuController extends BaseController
	{
		public function __construct(){
			parent::__construct();
		}
		public function Home(){
			// $user_login = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 'hello';
			// $getFriends = parent::$userModel->getFriendsOfUser($user_login);
			// $getNoFriends = parent::$userModel->getUserAreNotFriends($user_login);
			// $this->view("TrangChu",[
			// 	'getFriends' => $getFriends,
			// 	"page"=>"TrangChu/DSPT-TrangChu",
			// 	"data"=> parent::$Model->XemDSPhong_Them_PhongTrong(),
			// 	'getNoFriends' => $getNoFriends
			// ]);
			parent::$userModel->test();
			echo 'Hello xin chòa';
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
