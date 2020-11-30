<?php 
	class PhongTro extends DB
	{
		public function __construct(){
			parent::__construct();
		}
		public function ThemPhong($tenPhong,$tieuDe, $quan, $diaChi, $moTa, $gia, $img,$temp)
		{
			// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
			$data=$this->phongtroCollection->find([],['limit' => 1,'sort' => ['maphong' => -1],]);
			$maphong;
			foreach ($data as $row) {
				$maphong=$row->maphong;
			}
			$document = $this->phongtroCollection->insertOne([
				"maphong" =>  $maphong+1,
				"tenphong" =>  $tenPhong,
				"tieude" =>$tieuDe,
				"quan" => $quan,
				"diachi" => $diaChi,
				"mota" => $moTa,
				"gia" => $gia,
				"trangthai" => "Còn trống",
				"anh" => $img
			]);
			move_uploaded_file($temp,'public/img/'.$img);	
			?>
			<html><head>
			  <meta charset="UTF-8">
			</head>
			<body>
				<script type="text/javascript">
					alert("Thêm phòng thành công.");
					window.location="QuanLyPhongTro/ThemPhongTro";
				</script>
			</body>
			</html>
		<?php
		}
		public function XemDSPhong()
		{
			// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
			$data=$this->phongtroCollection->find([],['sort' => ['maphong' => 1],]);
			return $data;
		}
		public function XemDSPhong_Them()
		{
			// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
			$data=$this->phongtroCollection->find([],['sort' => ['tenphong' => 1],]);
			return $data;
		}
		public function XemDSPhong_Them_PhongTrong()
		{
			// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
			$data=parent::$phongtroCollection->find(['trangthai'=>'Còn trống'],['sort' => ['tenphong' => 1],]);
			return $data;
		}
		public function XemDSPhong_Them_DaThue()
		{
			// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
			$data=$this->phongtroCollection->find(['trangthai'=>'Đã thuê'],['sort' => ['tenphong' => 1],]);
			return $data;
		}
		public function XemChiTietPhong($maphong)
		{
			$maphong=(int)$maphong;
			// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
			$data=$this->phongtroCollection->find(['maphong'=>$maphong],['sort' => ['tenphong' => 1],]);
			return $data;
		}
		public function XoaPhong($maphong)
		{
			$maphong=(int)$maphong;
			// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
			$data=$this->phongtroCollection->deleteOne(['maphong'=>$maphong]);
			?>
			<html><head>
			  <meta charset="UTF-8">
			</head>
			<body>
				<script type="text/javascript">
					alert("Xóa phòng trọ thành công.");
					window.location="../../QuanLyPhongTro/XemDSPhong";
				</script>
			</body>
			</html>
		<?php
		}
		public function CapNhatTrangThai($maphong)
		{
			$maphong=(int)$maphong;
			// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
			$data=$this->phongtroCollection->updateOne(['maphong'=>$maphong],['$set' => ['trangthai' => 'Đã thuê']]);
			?>
			<html><head>
			  <meta charset="UTF-8">
			</head>
			<body>
				<script type="text/javascript">
					alert("Thêm phiếu thuê phòng thành công.");
					window.location="../QuanLyThuePhong/ThemPhieuThue";
				</script>
			</body>
			</html>
		<?php
		}
		public function CapNhatTrangThai_TP($maphong)
		{
			$maphong=(int)$maphong;
			// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
			$data=$this->phongtroCollection->updateOne(['maphong'=>$maphong],['$set' => ['trangthai' => 'Còn trống']]);
			?>
			<html><head>
			  <meta charset="UTF-8">
			</head>
			<body>
				<script type="text/javascript">
					alert("Thêm phiếu trả phòng thành công.");
					window.location="../QuanLyTraPhong/ThemPhieuTraPhong";
				</script>
			</body>
			</html>
		<?php
		}
		public function TimKiem($quan,$gia)
		{
			// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
			if($quan!="0" && $gia!="0")
			{
				switch ($gia) 
				{
					case '1':
						$data=$this->phongtroCollection->aggregate([
						['$match' =>[
							"quan" =>$quan,
							'gia' => ['$lt' => '500.000'],
							'trangthai'=>'Còn trống',
						]]
						]);
					break;
					case '2':
						$data=$this->phongtroCollection->aggregate([
						['$match' =>[
							"quan" =>$quan,
							'gia' => ['$gte' => '500.000'],
							'gia' => ['$lte' => '700.000'],
							'trangthai'=>'Còn trống',
							
						]]
					]);
					break;
					case '3':
						$data=$this->phongtroCollection->aggregate([
						['$match' =>[
							"quan" =>$quan,
							'gia' => ['$gt' => '700.000'],
							'trangthai'=>'Còn trống',
						]]
					]);
					break;
				}
					
			}
			elseif($quan=="0" && $gia!="0")
			{
					switch ($gia) 
					{
						case '1':
							$data=$this->phongtroCollection->aggregate([
							['$match' =>[
								'gia' => ['$lt' => '500.000'],
								'trangthai'=>'Còn trống',
							]]
							]);
						break;
						case '2':
							$data=$this->phongtroCollection->aggregate([
							['$match' =>[
								'gia' => ['$gte' => '500.000'],
								'gia' => ['$lte' => '700.000'],
								'trangthai'=>'Còn trống',
								
							]]
						]);
						break;
						case '3':
							$data=$this->phongtroCollection->aggregate([
							['$match' =>[
								'gia' => ['$gt' => '700.000'],
								'trangthai'=>'Còn trống',
							]]
						]);
						break;
					}
			}
			elseif($quan!="0" && $gia=="0") 
			{
					$data=$this->phongtroCollection->aggregate([
						['$match' =>[
							"quan" =>$quan,
							'trangthai'=>'Còn trống',
						]]
					]);
			}
			else
			{
				$data=$this->phongtroCollection->find(['trangthai'=>'Còn trống'],['sort' => ['tenphong' => 1],]);
			}
			return $data;

		}
		public function Count_phongtro()
			{
				// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
				$ops = [
						['$count' => 'dem']
						];
				
				$data = $this->phongtroCollection->aggregate($ops);
				return $data;	
			}
		public function Count_phongtro_thue()
			{
				// $this->phongtroCollection = (new MongoDB\Client)->phongtrodb->phongtro;
				$ops = [
						['$match' =>[
							'trangthai'=>'Đã thuê'
						]],
						['$count' => 'dem']
						];
				
				$data = $this->phongtroCollection->aggregate($ops);
				return $data;	
			}
	}
 ?>