<?php 
	class TrangChuController extends BaseController
	{
		public function __construct(){
			// parent::__construct();
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
			
			echo "nguyen van hai";
			// // $this->a->test();
			// echo parent::$test;

			// parent::$userModel->test();

			

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
