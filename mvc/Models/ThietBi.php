<?php 
	class ThietBi extends DB
	{
		public function ThemThietBi($tenThietBi, $maPhong, $tinhTrang, $soLuong)
		{
			// $this->thietbiCollection = (new MongoDB\Client)->phongtrodb->thietbi;
			$data=$this->thietbiCollection->find([],['limit' => 1,'sort' => ['mathietbi' => -1],]);
			$mathietbi;
			foreach ($data as $row) {
				$mathietbi=$row->mathietbi;
			}
			$document = $this->thietbiCollection->insertOne([
				"mathietbi" => $mathietbi+1,
				"tenthietbi" =>  $tenThietBi,
				"maphong" => $maPhong,
				"tinhtrang" => $tinhTrang,
				"soluong" => $soLuong,
			]);
			?>
			<html><head>
			  <meta charset="UTF-8">
			</head>
			<body>
				<script type="text/javascript">
					alert("Thêm thiết bị thành công.");
					window.location="../QuanLyThietBi/ThemThietBi";
				</script>
			</body>
			</html>
		<?php
		}

		public function XemDSThietBi()
		{
			// $this->thietbiCollection = (new MongoDB\Client)->phongtrodb->thietbi;
			$data=$this->thietbiCollection->find();
			return $data;
		}
		public function DSThietBi($maphong)
		{
			// $this->thietbiCollection = (new MongoDB\Client)->phongtrodb->thietbi;
			$data=$this->thietbiCollection->find(['maphong'=>$maphong],['sort' => ['tenthietbi' => 1],]);
			return $data;
		}
		public function XoaThietBi($mathietbi)
		{
			$mathietbi=(int)$mathietbi;
			// $this->thietbiCollection = (new MongoDB\Client)->phongtrodb->thietbi;
			$data=$this->thietbiCollection->deleteOne(['mathietbi'=>$mathietbi]);
			?>
			<html><head>
			  <meta charset="UTF-8">
			</head>
			<body>
				<script type="text/javascript">
					alert("Xóa thiết bị thành công.");
					window.location="../../QuanLyThietBi/XemDSThietBi";
				</script>
			</body>
			</html>
		<?php
		}
		public function Count_thietbi()
			{
				// $this->thietbiCollection = (new MongoDB\Client)->phongtrodb->thietbi;
				$ops = [
						['$count' => 'dem']
						];
				
				$data = $this->thietbiCollection->aggregate($ops);
				return $data;	
			}	
	}
 ?>