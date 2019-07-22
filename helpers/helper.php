<?php

	function validate_reg($user)
	{
		$errors = [];
		if(isset($_POST['reg']))
		{
			if(empty($user -> getFirstname()))
				$errors[] = "First Name can't be empty";
			if(empty($user -> getLastname()))
				$errors[] = "Last Name can't be empty.";
			if(empty($user -> getEmail()))
				$errors[] = "You must provide an email address";
			if(empty($user -> getGender()))
				$errors[] = "We don't allow Robots.";
			if(empty($user -> getPassword()))
				$errors[] = "You must enter a password";
			else if(strlen($user -> getPassword()) < 8)
				{
					$errors[] = "Length of the password must be greater than 8 characters.";
				}

		}

		return $errors;
	}
	function logUserIn()
	{
		if(! (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true ))
        {
            header("Location: " . APPROOT . "/login");
            die();
        }
	}
	function isUserLoggedIn()
	{
		if( (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true ))
        {
            return true;
        }else return false;
	}

 ?>
