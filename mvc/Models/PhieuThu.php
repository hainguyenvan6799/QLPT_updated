<?php 
class PhieuThu extends DB
{
	public function __Construct(){
		parent::__Construct();
	}
	public function ThemPhieuThu($maPhong, $cMT, $soDien, $giaDien, $soNuoc, $giaNuoc, $giaPhong, $tongTien, $ngayGhi, $ghiChu )
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
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

					// $basic  = new Nexmo\Client\Credentials\Basic('fdcdea23', 'sZVUpf56shf5IqgK');
					// $client = new Nexmo\Client($basic);



					// $message = $client->message()->send([
					//     'to' => '84368945209',
					//     'from' => 'NVH',
					//     'text' => 'Hello Xin Chao'
					// ]);
		// Gửi tin nhắn
		$curl = curl_init();
		$body = "Send%20from%20postman";
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.twilio.com/2010-04-01/Accounts/AC16542cbaf978c0c952c5bbe02d1d9214/Messages.json",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "To=%2B84379343794&Body=".$body."&MediaUrl=http%3A%2F%2F2.bp.blogspot.com%2F-tp4OYnOprzw%2FUOUu5_RWVdI%2FAAAAAAAAAao%2Fktf-2L5p5Jo%2Fs1600%2Fnhung-hinh-anh-dep-dong-vat.jpg&From=%2B19292978442",
			CURLOPT_HTTPHEADER => array(
				"authorization: Basic QUMxNjU0MmNiYWY5NzhjMGM5NTJjNWJiZTAyZDFkOTIxNDpmYTEyYjA2NjkwYjVlOWNkN2Q5N2QyMDA1MDUxZjE3Zg==",
				"cache-control: no-cache",
				"content-type: application/x-www-form-urlencoded",
				"postman-token: d4589b91-e368-9c9f-509c-25bcfbb00150"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
		//gửi tin nhắn

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