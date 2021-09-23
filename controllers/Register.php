<?php
require_once('models/User_model.php');
class Register extends Controller {
	
	public static function signup(){
		
		$err = array();

		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password_1 = $_POST['password_1'];
			$password_2 = $_POST['password_2'];

			if (empty($name)) {
				array_push($err, "Name is required!");
			}
			if (empty($email)) {
				array_push($err, "Email is required!");
			}
			if (empty($password_1)) {
				array_push($err, "Password is required!");
			}
			if ($password_1 != $password_2) {
				array_push($err, "The two passwords do not match!");
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				array_push($err, "Invalid email format!");
			}

			if (count($err) == 0) {
				$password = md5($password_1);

				$model = new User_model;
				$model->registerUser($name, $email, $password);
				header("Location: login");
			} else {
				self::CreateView('register');
			}
		}
	}
}