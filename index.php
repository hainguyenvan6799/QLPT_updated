<?php
	// require_once "./mvc/Bridge.php";
	// session_start();
	// $app = new App();
	// $url = $_GET["url"];
	// $arr = explode("/", $url);
	// echo $arr[1];
require_once './mvc/core/vendor/autoload.php';
$client = new MongoDB\Client(
    'mongodb+srv://hai:X2L3zGTavujQkwLW@cluster0.kyvzw.mongodb.net/phongtrodb?retryWrites=true&w=majority');

$db = $client->test;
?>