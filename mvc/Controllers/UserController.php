<?php 
	class UserController extends BaseController
	{
		public function __construct(){
			parent::__construct();
		}
		public function sendAddFreRequest(){
			$to = $_POST["addFr_id"];
			$from = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;

			$options = array(
		    'cluster' => 'eu',
		    'useTLS' => true
		  );
		  $pusher = new Pusher\Pusher(
		    'ed3cf9bac608e3b56afa',
		    'aac2cefbec89dc1447e9',
		    '1088393',
		    $options
		  );
		  $data["from"] = (int)$from;
		  $data["to"] = (int)$to;
		  $data["action"] = "sendFrRequest";
 			parent::$userModel->sendFrRequest($from, $to);
 			$pusher->trigger('sendFriendRequest', 'FriendsRequestEvent', $data);
		}

		public function acceptAddFreRequest()
		{
			$from = $_POST["accept_id"];
			$to = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;

			parent::$userModel->acceptFriendRequest($from, $to);
		}
	}
	
 ?>