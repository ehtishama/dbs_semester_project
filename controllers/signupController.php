<?php
	require_once('core/Controller.php');


class SignupController extends Controller
	{
		public $model;
		public function __construct()
		{
			$this -> model = $this -> model('regModel');
		}

		public function index()
		{
			$this -> loadView('signup');
		}

		public function authenticate()
		{
			if(!isset($_POST['reg']))
			{

				$this -> index();
				die();
			}


			$firstName 	= $_POST['first_name'];
			$username 	= $_POST['username'];
			$lastName 	= $_POST['last_name'];
			$email 		= $_POST['email'];
			$gender 	= $_POST['gender'];
			$password 	= $_POST['password'];

			require_once('helpers/User.php');
			require_once('helpers/helper.php');


			$user = new User($firstName, $lastName, $username, $email, $password, $gender);
			$errors = validate_reg($user);

			if(count($errors) > 0)
			{
				$data['error']  = 'true';
				$data['errors'] = $errors;

				$this -> loadView('signup', $data);


			}else

			{
				$isAdded = $this -> model -> addUser([

					'firstName' => $firstName,
					'lastName' => $lastName,
					'username' => $username,
					'email' => $email,
					'gender' => $gender,
					'password' => $password


			]);
			if($isAdded)
			{
				$data['success'] = true;

			}
			else
			{
				$data['error']  = 'true';
				$data['errors'] = [];
				$data['errors'][] = 'username already taken';
			}
			$this -> loadView('signup', $data);
		}

		}
	}

 ?>
