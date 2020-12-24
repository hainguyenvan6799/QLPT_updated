<?php 
	class LoginController extends BaseController
	{
		// protected $userModel;
		// public function __construct(){
		// 	$this->userModel = $this->model("User");
		// }
		public function __construct(){
			parent::__construct();
		}
		public function loginQrCode(){
			$contentQRCode = isset($_POST["content"]) ? $_POST["content"] : null;
			$a = parent::$userModel->loginQrCode($contentQRCode);
			
		}
		public function getFormLogin(){
			$this->view("Login/loginForm");
		}
		public function postFormLogin(){
			$username = $_POST["username"];
			$password = $_POST["password"];
			parent::$userModel->checkForLogin($username, $password);
		}
		public function logout(){
			if(isset($_SESSION["user_id"]) or isset($_SESSION["admin"]))
			{
				session_destroy();
				echo '<script>window.location.href="Login/getFormLogin";</script>';
			}
		}
		
	}
 ?>