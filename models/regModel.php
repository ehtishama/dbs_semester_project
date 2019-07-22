<?php
	require_once("core/Model.php");

	class RegModel extends model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function isUsernameAvailable($username)
		{
			$query = "SELECT * FROM customers WHERE username = '$username'";
			$result = $this -> db -> query($query);

			if($result -> num_rows > 0)
				return false;
			else return true;
		}

		public function emailExist($email)
		{
			$query = "SELECT * FROM customers WHERE email = '$email'";
			$result = $this -> db -> query($query);

			if($result -> num_rows > 0)
				return true;
			else return false;
		}

		public function addUser($data = [])
		{
			if(!$this -> isUsernameAvailable($data['username']))
			{
				return false;
			}
			else
			{

				$firstname = $data['firstName'];
				$lastname = $data['lastName'];
				$email = $data['email'];
				$password = $data['password'];
				$gender = $data['gender'];
				$username = $data['username'];


				$query = "INSERT INTO
				customers(username, first_name, last_name, email, password,gender)
				values	('$username', '$firstname', '$lastname', '$email', '$password', '$gender')  ";

				$result = false;
				if(isset($data['glogin']) && $data['glogin'] != 0)
				{
					// start transaction and insert into two tables
					$gid = $data['glogin'];

					$this -> db -> begin_transaction();

					$result = $this -> db -> query($query);
					echo $this -> db -> error;

					$userId = $this -> db -> insert_id; //get the last inserted id

					$result = $this -> db -> query("INSERT INTO glogin (id, user_id) VALUES ('$gid', $userId)");
					echo $this -> db -> error;

					$this -> db -> commit();

				}else $result = $this -> db -> query($query);


				if($result) return true;
				else return false;



			}

		}

		public function logUserIn($username, $password)
		{
			$query = "SELECT * FROM customers WHERE username = '{$username}' and password = '{$password}'";
			$result = $this -> db -> query($query);

			echo $this -> db -> error;
			if($result -> num_rows == 1)
				return $result;
			else return false;
		}
	}

 ?>
