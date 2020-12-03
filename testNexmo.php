<?php
	require_once "./mvc/core/vendor/autoload.php";
	$basic  = new \Nexmo\Client\Credentials\Basic('fdcdea23', 'sZVUpf56shf5IqgK');
			$client = new \Nexmo\Client($basic);



			$message = $client->message()->send([
			    'to' => '84368945209',
			    'from' => 'NXSMS',
			    'text' => 'Hello'
			]);
?>