<?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$timestamp = strtotime(date("Y-m-d H:i:s"));
	$time = $timestamp - 5;
	$datetime = date("Y-m-d H:i:s", $time);

	$message = new Message;
    $usermodel = new User;
    // $users = $usermodel->getFriendsOfUser($_SESSION["user_id"]);

    // $userCollection = (new MongoDB\Client)->phongtrodb->users;
 ?>
  