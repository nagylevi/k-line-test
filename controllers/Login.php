<?php
require_once('models/User_model.php');
class Login extends Controller {
	
	public static function signin() {

		$err = array();

		if(isset($_POST['submit']))
		{
			$email = $_POST['email'];
			$password = $_POST['password'];

			if (empty($email)) {
				array_push($err, "Email is required!");
			}
			if (empty($password)) {
				array_push($err, "Password is required!");
			}

			if (count($err) == 0) {
				$password = md5($password);

				$model = new User_model;
				$stmp = $model->loginUser($email, $password);
				$user = $stmp->fetch();
				if (!empty($user)) {
					session_start();
					$_SESSION['name'] = $user['name'];
					$_SESSION['id'] = $user['user_id'];
					header("Location: ./");
				} else {
					self::CreateView('login');
				}

			} else {
				self::CreateView('login');
			}
		}
		
	}

	public static function logout() {
		unset($_SESSION['name']);
		header("Location: login");
	}
}