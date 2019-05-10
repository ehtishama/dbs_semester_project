<?php
	require_once('core/Controller.php');


	class LoginController extends Controller {

		public function __construct()
		{
			$this -> model = $this -> model('regModel');
		}

		public function index($args = [])
		{

			$data['title'] = 'Login - Ecom';
			if(isset($args['query']))
				$data['query'] = $args['query'];
			$this -> loadView('login', $data);
		}

		public function auth($args = [])
		{
			$nextPage = "";

			$query = explode("=", $args[2]);

			if(count($query) == 2)
			{
				// write a function that converts a = b to an associative array of 'a' => 'b'
				if(strtolower($query[0]) == "nextpage")
					$nextPage = $query[1];

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
				$data['error'] = true;
				$data['errors'] = ['invalid username or password'];
				$this -> loadView('login', $data);

			}

		}

	}


 ?>
