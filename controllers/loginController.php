<?php
	require_once('core/Controller.php');


	class LoginController extends Controller {

		public function __construct()
		{
			$this -> model = $this -> model('regModel');
		}

		private function redirect()
		{
			// helper function, returns true if SESSION['logged_in'] == true
			if(isUserLoggedIn())
			{
				header("Location: " . APPROOT);
			}
		}

		public function index($args = [])
		{
			// if already logged in, no need to come here
			$this -> redirect();
			$data['title'] = 'Login - Ecom';

			if(isset($args['query']))
				$data['query'] = $args['query'];
			
			$this -> loadView('login', $data);
		}

		public function auth($args = [])
		{
			// if form is not submitted
			if(!isset($_POST['login']))
				header("Location: " . APPROOT . "/login");

			// if already logged in, no need to come here
			$this -> redirect();

			$nextPage = "";
			// query string containing uri to visit after user logs in 
			if(isset($args['query']['nextPage']))
			{
				$nextPage = $args['query']['nextPage'];
			}

			$username = $_POST['username'];
			$password = $_POST['password'];

			$user = $this -> model -> logUserIn($username, $password);

			if($user)
			{
				// do some session work
				$_SESSION['logged_in'] = true;
				$_SESSION['user'] = $user -> fetch_assoc();

				// redirect to other page
				
				header("Location:" . APPROOT . "/"  . $nextPage);

			}
			else
			{
				// write some errors
				// show the login page again
				if(isset($args['query']))
					$data['query'] = $args['query'];
				$data['error'] = true;
				$data['errors'] = ['invalid username or password'];
				$this -> loadView('login', $data);

			}

		}



	}


 ?>
