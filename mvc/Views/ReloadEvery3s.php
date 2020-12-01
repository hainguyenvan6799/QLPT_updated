<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$timestamp = strtotime(date("Y-m-d H:i:s"));
	$time = $timestamp - 5;
	$datetime = date("Y-m-d H:i:s", $time);
	$messageModel = $data["messageModel"];
    $userModel = $data['userModel'];
    $users = $userModel->getFriendsOfUser($_SESSION["user_id"]);

    $userCollection = $data["userCollection"];
 ?>
 