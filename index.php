<?php
	// require_once "./mvc/Bridge.php";
	// session_start();
	// $app = new App();
	// $url = $_GET["url"];
	// $arr = explode("/", $url);
	// echo $arr[1];
require_once './mvc/core/vendor/autoload.php';
$client = new MongoDB\Client(
			    'mongodb+srv://hainguyenvan6799:Thu123456789@phongtro.ezstc.mongodb.net/phongtrodb?retryWrites=true&w=majority');

			print_r($client->phongtrodb->users);
?>