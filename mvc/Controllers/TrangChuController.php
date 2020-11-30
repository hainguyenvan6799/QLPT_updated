<?php 
	class TrangChuController extends BaseController
	{
		public function __construct(){
			parent::__construct();
		}
		public function Home(){
			$user_login = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : '';
			$getFriends = parent::$userModel->getFriendsOfUser($user_login);
			$getNoFriends = parent::$userModel->getUserAreNotFriends($user_login);
			$this->view("TrangChu",[
				'getFriends' => $getFriends,
				"page"=>"TrangChu/DSPT-TrangChu",
				"data"=> parent::$Model->XemDSPhong_Them_PhongTrong(),
				'getNoFriends' => $getNoFriends
			]);

			// Test data
			// parent::$userModel->test();
			// parent::$userModel->getFriendsOfUser(1);

			// foreach($getFriends as $f)
			// {
			// 	echo $f->name . '<br>';
			// }
		}
		public function XemChiTiet($maphong){
					$this->view("TrangChu",[
				"page"=>"TrangChu/XemChiTiet",  
				"data"=>parent::$Model->XemChiTietPhong($maphong),
				"data1"=>parent::$Model1->DSThietBi($maphong)
			]);
				
			
		}

				public function TimKiem(){
			$quan =($_POST["quan"]);
			$gia =($_POST["gia"]);
			$this->view("TrangChu",[
				"page"=>"TrangChu/DSPT-TrangChu",
				"data"=>parent::$Model->TimKiem($quan,$gia)
			]);
			
		}


	}
 ?>
