<?php 
	class PhieuTra extends DB
	{
		public function __construct(){
			parent::__construct();
		}
		public function ThemPhieuTra($maPhieuThue,$maPhong, $cMT, $ngayTra, $tienCoc, $ghiChu)
		{
			// $collection = (new MongoDB\Client)->phongtrodb->phieutraphong;
			$document = parent::$phieutraphongCollection->insertOne([
				"maphieutra" => $maPhieuThue,
				"maphong" =>  $maPhong,
				"cmt" => $cMT,
				"ngaytra" => $ngayTra,
				"tiencoc" => $tienCoc,
				"ghichu" => $ghiChu,
			]);
		}
	}
?>