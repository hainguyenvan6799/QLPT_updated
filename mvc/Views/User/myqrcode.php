<?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$time = strtotime(date('y-m-d H:i:s'));
	$text = $_SESSION["username"];
	$text .= $_SESSION["password"];
	echo $text;
	$user = $data['userCollection'];
	$user->updateMany(['user_id' => ['$ne' => null]],['$set' => ['qrcode_expire' => $time + 3600]]);
	$fileName = md5(uniqid()).'.png';
	$tempDir = 'client/imagesQR/';
	$filePath = $tempDir . $fileName;
	$a = QRCode::png($text, $filePath);
	print_r($a);
	if(file_exists($filePath))
	{
		echo "co hinh ";
		echo '<a href="'.$filePath.'" download="download qr code">';
			echo '<img src="'.$filePath.'" />';
		echo '</a>';
	}
 ?>