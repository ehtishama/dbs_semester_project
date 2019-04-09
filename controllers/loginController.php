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
			{
				// do some session work
				// redirect to other page

				echo "$username, logged in successfully";
			}
			else
			{
				// write some errors
				// show the login page again
				$data['error'] = true;
				$data['errors'] = ['invalid username or password'];
				$this -> loadView('login', $data);

			}

		}

	}


 ?>
