<?php 
	class PhieuThu extends DB
	{
		public function __Construct(){
			parent::__Construct();
		}
		public function ThemPhieuThu($maPhong, $cMT, $soDien, $giaDien, $soNuoc, $giaNuoc, $giaPhong, $tongTien, $ngayGhi, $ghiChu )
		{
			// $this->phieuthutienCollection = (new MongoDB\Client)->phongtrodb->phieuthutien;
			$data= parent::$phieuthutienCollection->find([],['limit' => 1,'sort' => ['maphieuthu' => -1],]);
			$maphieuthu;
			foreach ($data as $row) {
				$maphieuthu=$row->maphieuthu;
			}
			$maPhong=(int)$maPhong;
			$document = parent::$phieuthutienCollection->insertOne([
				"maphieuthu" => $maphieuthu+1,
				"maphong" =>  $maPhong,
				"cmt" => $cMT,
				"sodien" => $soDien,
				"giadien" => $giaDien,
				"sonuoc" => $soNuoc,
				"gianuoc" => $giaNuoc,
				"giaphong" => $giaPhong,
				"tongtien" => $tongTien,
				"ngayghi" => $ngayGhi,
				"ghichu" => $ghiChu
			]);
			$data1= parent::$khachthueCollection->find(['cmt'=>$cMT],['limit' => 1]);
			$sdt='';
			$hoten='';
			foreach ($data1 as $r) {
				 $hoten=$r->hoten;
				 $sdt=$r->sdt;
			}
			$Content="Chao Anh/Chi ".$hoten.". Thong bao thu tien ngay ".$ngayGhi.". So dien ".$soDien."kW, gia ".$giaDien." VND/kW, so nuoc ".$soNuoc."khoi, gia ".$giaNuoc." VND/khoi, gia phong ".$giaPhong." VND/thang. Tong tien: ".$tongTien."VND.";
			// require_once "./mvc/core/vendor/autoload.php";
			$basic  = new Nexmo\Client\Credentials\Basic('8815c793', 'ObpppFylQdD6h8Pz');
			$client = new Nexmo\Client($basic);

			$message = $client->message()->send([
			    'to' =>'84' . $sdt,
			    'from' => 'Vonage APIs',
			    'text' => "acb"
			]);


	

		    ?>
			<html><head>
			  <meta charset="UTF-8">
			</head>
			<body>
				<script type="text/javascript">
					alert("Thêm phiếu thu thành công.");
					window.location="QuanLyThuTien/ThemPhieuThu";
				</script>
			</body>
			</html>
		<?php
		}
		public function XemDsPhieuThu(){
			// $this->phieuthutienCollection = (new MongoDB\Client)->phongtrodb->phieuthutien;
			$ops = [
						[
							'$lookup' => [
								'from' => 'phongtro',
								'localField' => 'maphong',
								'foreignField' => 'maphong',
								'as' => 'phongtro_doc'
										]
						],
						['$sort' => ['maphieuthu' => -1]]
		
					];
			$data = parent::$phieuthutienCollection->aggregate($ops);
			
			return $data;
		}
		public function XemChiTiet($maphieuthu)
		{
			$maphieuthu=(int)$maphieuthu;
			// $this->phieuthutienCollection = (new MongoDB\Client)->phongtrodb->phieuthutien;
			$ops = [
						[
							'$lookup' => [
								'from' => 'phongtro',
								'localField' => 'maphong',
								'foreignField' => 'maphong',
								'as' => 'phongtro_doc'
										]
						],
						[
							'$lookup' => [
								'from' => 'khachthue',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'khachthue_doc'
										]
						],
						[
							'$match' => [
								'maphieuthu' => $maphieuthu
										]
						]
		
					];
			$data = parent::$phieuthutienCollection->aggregate($ops);
			return $data;
		}
		public function XemDsPhieuThu_Limit_5()
		{
			// $this->phieuthutienCollection = (new MongoDB\Client)->phongtrodb->phieuthutien;
			$ops = [
						[
							'$lookup' => [
								'from' => 'phongtro',
								'localField' => 'maphong',
								'foreignField' => 'maphong',
								'as' => 'phongtro_doc'
										]
						],
						[
							'$lookup' => [
								'from' => 'khachthue',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'khachthue_doc'
										]
						],
						['$sort' => ['maphieuthu' => -1]],
						['$limit' => 5],		
					];
			$data = parent::$phieuthutienCollection->aggregate($ops);
			return $data;
		}

	}
 ?>