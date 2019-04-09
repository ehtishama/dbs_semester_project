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

		public function addUser($data = [])
		{
			if(!$this -> isUsernameAvailable($data['username']))
			{
				return false;
			}
			else
			{
				$query = "INSERT INTO customers values(NULL, '" . $data['username'] .
				"', '" .$data['firstName'] . "', '" . $data['lastName'] . "', '" . $data['password'] ."')";

				$result = $this -> db -> query($query);
				echo $this -> db -> error;
				return true;

			}

		}

		public function logUserIn($username, $password)
		{
			$query = "SELECT * FROM customers WHERE username = '{$username}' and password = '{$password}'";
			$result = $this -> db -> query($query);

			echo $this -> db -> error;
			if($result -> num_rows == 1)
				return true;
			else return false;
		}
	}

 ?>
