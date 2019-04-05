<?php 
	require_once('core/Controller.php');


	class LoginController extends Controller {

		public function __construct()
		{
			$this -> model = $this -> model('regModel');
		}

		public function index()
		{
			$this -> loadView('login');
		}

		public function auth()
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			$isValidUser = $this -> model -> logUserIn($username, $password);
			if($isValidUser)
				echo 'valid user';
			else {
				echo "username or password incorrect";
				$this -> index();
			}

		}

	}


 ?>