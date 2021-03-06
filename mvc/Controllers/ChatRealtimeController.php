<?php 
	// require_once "mvc/core/vendor/autoload.php";
	class ChatRealtimeController extends BaseController
	{
		public function __construct(){
			parent::__construct();
		}
		public function getChatView(){
			$users = parent::$userModel->getAllUserWithoutUserLogin();
			$messageModel = parent::$messageModel;

			// $this->view('ChatRealtime/getChat',
			// 	[
			// 		"users" => $users
			// 	]
				//		);
			$this->view("Admin/Master",[
				"page"=>"ChatRealtime/getChat",
				"messageModel"=>$messageModel,
				"users"=>parent::$userModel->getAllUserWithoutUserLogin()
			]);

		}
		public function chatWith($user_id)
		{
			$message = parent::$messageModel->getMessageFromMeToUser($user_id);
			$this->view('ChatRealtime/contentChat', [
				"message" => $message
			]);
		}
		public function sendMessage(){
			$from = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : '';
			$to = isset($_POST["received_id"]) ? $_POST["received_id"] : '';
			$message = isset($_POST["message"]) ? $_POST["message"] : '';
			$name_user_login = isset($_SESSION["name"]) ? $_SESSION['name'] : '';
			$is_read = 0;

			parent::$messageModel->createMessage($from, $to, $message, $is_read);

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

		$data['from'] = $from;
		$data['to'] = (int)$to;
		$data['message'] = $message;
		$data['is_read'] = $is_read;
		$data['name'] = $name_user_login;
  		$pusher->trigger('my-channel', 'my-event', $data);
  		echo $message;
		}

		public function getAddFriends($userlogin_id){
			$userlogin_id = (int)$userlogin_id;
			// $userAreNotFriends = $this->userModel->getUserAreNotFriends($userlogin_id);
			$this->view("User/addFriends");
		}

		public function sendFrRequest(){
			// session_start();
			$from_id = isset($_POST["from_id"]) ? $_POST["from_id"] : '';
			$action = isset($_POST["action"]) ? $_POST["action"] : '';
			$friend_id = isset($_POST["friend_id"]) ? $_POST["friend_id"] : '';
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
		  $data['action'] = $action;
		  $data['friend_id'] = $friend_id;
		  $data["from_id"] = $from_id;

		  $a = parent::$userModel->sendFrRequest($from_id, $friend_id, $action);
		  $pusher->trigger('my-channel', 'my-event', $data);

		}

		public function acceptFrRequest($from, $to){
			parent::$userModel->acceptFrRequest($from, $to);

		}

		public function getChatBox(){
			$user_login = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : '';
			$getFriends = parent::$userModel->getFriendsOfUser($user_login);
			$this->view('ChatRealtime/chatbox', [
				'getFriends' => $getFriends,
				'page' => "TrangChu/TrangChu",
				'data' => parent::$Model->XemDSPhong_Them_PhongTrong()
			]);
		}

		public function test3s(){
			$user_login = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : '';
			$userModel = parent::$userModel;
			$messageModel = parent::$messageModel;
			$userCollection = parent::$userModel->getUserCollection();

			return $this->view("ReloadEvery3s",[
				'userModel' => $userModel,
				'messageModel' => $messageModel,
				'userCollection' => $userCollection
			]);
			// return $this->view("ReloadEvery3s", []);
		}

		public function checkStatus($chatWith_id){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$user = parent::$userModel->showUser($chatWith_id);
			parent::$userModel->updateActivateUser($chatWith_id);
			$timestamp = strtotime(date('Y-m-d H:i:s'));
			$time = strtotime(date('Y-m-d H:i:s')) - 5;
			$user_last_login = strtotime($user->last_login);
			echo $user->last_login;
			// if($user_last_login > $time)
			// {
			// 	echo "Online";
			// }
			// else
			// {
			// 	$delta = parent::$messageModel->time_elapsed_B($user_last_login - $timestamp);
			// 	echo "Offline " . $delta;
			// }
		}

		public function countMessageToAdmin(){
			$count = parent::$messageModel->countMessageToAdmin();
			echo $count;
		}
	}
 ?>