<?php 
	class RegisterController extends BaseController
	{
		public function getFormRegister(){
			$this->view("Register/registerForm");
		}
		public function postFormRegister(){
			$userName = $_POST["username"];
			$password = $_POST["password"];
			$this->userModel->createNewUser($userName, $password);
		}
	}
 ?>