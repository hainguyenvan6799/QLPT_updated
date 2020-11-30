<?php 
	class KhachThue extends DB
	{
		public function __construct(){
			parent::__construct();
		}
		public function ThemKhachThue($cMT, $hoTen, $gioiTinh, $ngheNghiep, $sDT, $diaChi,$maPhong)
		{
			$data=$this->khachthueCollection->find([],['limit' => 1,'sort' => ['makhachthue' => -1],]);
			$makhachthue;
			foreach ($data as $row) {
				$makhachthue=$row->makhachthue;
			}
			$maPhong=(int)$maPhong;
			$document = $this->khachthueCollection->insertOne([
				"makhachthue" =>$makhachthue+1,
				"cmt" => $cMT,
				"hoten" =>  $hoTen,
				"gioitinh" => $gioiTinh,
				"nghenghiep" => $ngheNghiep,
				"sdt" => $sDT,
				"diachi" => $diaChi,
				"maphong" => $maPhong
			]);

		}
		public function XemDSKhachThue()
		{
			$ops = [
						[
							'$lookup' => [
								'from' => 'phieuthuephong',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'phieuthue_doc'
										]
						],
						[
							'$lookup' => [
								'from' => 'phieutraphong',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'phieutra_doc'
										]
						],
						['$sort' => ['makhachthue' => -1]]
		
					];
			$data = $this->khachthueCollection->aggregate($ops);
			return $data;

					
			}
			public function XemChiTiet($cmt)
		{
			$ops = [
						[
							'$lookup' => [
								'from' => 'phieuthuephong',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'phieuthue_doc'
										]
						],
						[
							'$lookup' => [
								'from' => 'phieutraphong',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'phieutra_doc'
										]
						],
						[
							'$lookup' => [
								'from' => 'phongtro',
								'localField' => 'maphong',
								'foreignField' => 'maphong',
								'as' => 'phongtro_doc'
										]
						],
						[
							'$match' => [
								'cmt' => $cmt
										]
						]
		
					];
			$data = $this->khachthueCollection->aggregate($ops);
			return $data;
			}
			public function Count_khachthue()
			{
				// $this->khachthueCollection = (new MongoDB\Client)->phongtrodb->khachthue;
				$ops = [
						['$count' => 'dem']
						];
				
				$data = $this->khachthueCollection->aggregate($ops);
				return $data;	
				// foreach ($data as $r ) {
				// 	echo '<hr>';
				// 	echo $r->dem;
				// }
			}	
		}

 ?>