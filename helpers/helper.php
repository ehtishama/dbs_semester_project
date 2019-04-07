<?php 
	
	function validate_reg($user)
	{
		$errors = [];
		if(isset($_POST['reg']))
		{
			if(empty($user -> firstname))
				$errors[] = "First Name can't be empty";
			if(empty($user -> lastname))
				$errors[] = "Last Name can't be empty.";
			if(empty($user -> email))
				$errors[] = "You must provide an email address";
			if(empty($user -> gender))
				$errors[] = "We don't allow Robots.";
			if(empty($user -> password))
				$errors[] = "You must enter a password";
			else if(strlen($user -> password) < 8)
				$errors[] = "Length of the password must be greater than 8 characters.";

		}
		
		return $errors;
	}
	
 ?>