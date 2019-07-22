<?php 
	class User
	{
		private $firstname;
		private $lastname;
		private $username;
		private $email;
		private $password;
		private $gender;


		public function __construct($firstname, $lastname, $username, $email, $password, $gender)
		{
			$this -> username = $username;
			$this -> firstname = $firstname;
			$this -> lastname = $lastname;
			$this -> email = $email;
			$this -> password = $password;
			$this -> gender = $gender;
		}

		public function getUsername()
		{
			return $this -> username;
		}
		public function getFirstname()
		{
			return $this -> firstname;
		}
		public function getLastname()
		{
			return $this -> lastname;
		}
		public function getEmail()
		{
			return $this -> email;
		}
		public function getPassword()
		{
			return $this -> password;
		}
		public function getGender()
		{
			return $this -> gender;
		}

	}
	
 ?>