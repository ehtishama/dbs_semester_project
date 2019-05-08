<?php
	require_once('core/Controller.php');


	class LoginController extends Controller {

		public function __construct()
		{
			$this -> model = $this -> model('regModel');
		}

		public function index()
		{

			$data['title'] = 'Login';
			$this -> loadView('login', $data);
		}

		public function auth()
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			$user = $this -> model -> logUserIn($username, $password);
			
			if($user)
			{
				// do some session work
				$_SESSION['logged_in'] = true;
				$_SESSION['user'] = $user -> fetch_assoc();

				// redirect to other page
				header("Location:" . APPROOT);

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
