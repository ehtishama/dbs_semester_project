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


		private function verifyreCaptcha($token)
		{
			//
			// A very simple PHP example that sends a HTTP POST to a remote site
			//

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,
			            "secret=6Lc6hqkUAAAAACyPKa3qL_LaZGFTNGxTp923oPXh&response=$token");

			
			// curl_setopt($ch, CURLOPT_POSTFIELDS, 
			//          http_build_query(array('postvar1' => 'value1')));

			// Receive server response ...
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close ($ch);

			
			$response = json_decode($response, true);
			
			

			if($response['success'] == true)
				return true;
			else return false;
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
			$recaptcha 	= $_POST['g-recaptcha-response'];


			$data['firstname'] = $firstName;
			$data['lastname'] = $lastName;
			$data['email'] = $email;
			$data['gender'] = $gender;
			$data['username'] = $username;

			require_once('helpers/User.php');
			require_once('helpers/helper.php');


			$user = new User($firstName, $lastName, $username, $email, $password, $gender);

			$errors = validate_reg($user);
			if(empty($recaptcha) || !($this -> verifyreCaptcha($recaptcha)))
				$errors[] = "Are you Robot? Complete the captcha then.";

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
