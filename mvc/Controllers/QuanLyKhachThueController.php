<?php 
	class QuanLyKhachThueController extends BaseController
	{
		public function XemDSKhachThue(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyKhachThue/XemDSKhachThue",
				"data"=>$this->Model_khachthue->XemDSKhachThue()
			]);
			//$this->Model->XemDSKhachThue();
		}
		public function XemChiTiet($cmt){
			$this->view("Admin/Master1",[
				"page"=>"QuanLyKhachThue/XemChiTiet",
				"data"=>$this->Model_khachthue->XemChiTiet($cmt)
			]);
			//$this->Model->XemChiTiet($cmt);
		}

	}
 ?>