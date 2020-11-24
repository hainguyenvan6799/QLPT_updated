<?php
require_once "./mvc/core/vendor/autoload.php";
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
	$messageCollection = (new MongoDB\Client)->phongtrodb->message;
	$servername = "mongodb://localhost:27017";
	$mongoConnection = new MongoDB\Driver\Manager($servername);
		$options = [];
		$my_id = $_SESSION['user_id'];
		$user_id = 2;
			$filter =['$or' => [
				[ '$and' => [ ['from'=>$my_id], ['to'=>(int)$user_id] ] ],
				 ['$and' => [ ['from'=>(int)$user_id], ['to' => $my_id] ]]
			] ];
			$query = new MongoDB\Driver\Query($filter, $options);
			$message = $mongoConnection->executeQuery("phongtrodb.message", $query);
			foreach($message as $m)
			{
				echo $m->message . '<br>';
			}
			echo '---------------------';
			$messages = $messageCollection->find($filter);
			foreach($messages as $ms)
			{
				echo $ms->message . '<br>';
			}
			$time = date("Y-m-d H:i:s");
			$messageCollection->updateMany(
				['_id'=> ['$ne' => null]],
			    ['$set' => ['time' => $time]],
			    ['multi' => true, 'upsert' => false]
			);
			

?>