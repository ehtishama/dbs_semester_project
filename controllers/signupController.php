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
			$data['title'] = 'Signup';
			$this -> loadView('signup', $data);
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



			$data['firstname'] = $firstName;
			$data['lastname'] = $lastName;
			$data['email'] = $email;
			$data['gender'] = $gender;
			$data['username'] = $username;

			require_once('helpers/User.php');
			require_once('helpers/helper.php');


			$user = new User($firstName, $lastName, $username, $email, $password, $gender);
			$errors = validate_reg($user);

			if(count($errors) > 0)
			{
				$data['error']  = 'true';
				$data['errors'] = $errors;

				$this -> loadView('signup', $data);
				die();

			}else

			{
				// if email or username not exist add the user
				if($this -> model -> emailExist($email))
				{
					$data['error']  = 'true';
					$data['errors'][] = 'email already exists.';
				}else
				{
					$gid = 0;
					if(isset($_POST['gid']))
						$gid = $_POST['gid'];
					$isAdded = $this -> model -> addUser([

						'firstName' => $firstName,
						'lastName' => $lastName,
						'username' => $username,
						'email' => $email,
						'gender' => $gender,
						'password' => $password,
						'glogin' => $gid


					]);

					if($isAdded)
					{
						$data['success'] = true;

					}else
					{
						$data['error']  = 'true';
						$data['errors'][] = 'username already taken';
					}
				}


				$data['title'] = 'Signup';
				$this -> loadView('signup', $data);
			}

		}



	}

 ?>
