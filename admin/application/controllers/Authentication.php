<?php
class Authentication extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();

												// third party library for authentication
		$this -> load -> library("Ion_auth");


		$this -> load -> helper("form"); 		// built in form helper
		$this -> load -> helper("url");			// built in url helper
		
	}
		
	public function index()
	{
		echo "This is Authentication Process";
	}	

	public function login()
	{
		
		$data['errors'] = array();

		if($this -> input -> post("login"))
		{
			$username = $this -> input -> post("email"); 
			$password=  $this -> input -> post("password");

			$authentication = $this -> ion_auth -> login($username, $password);
			if($authentication)
				redirect("");
			else $data['errors'][] = "incorrect email or password"; 

		}

		$title = "Login > Admin Panel";
		$data['title'] = $title;

		$this -> load -> view ("templates/header", $data);
		$this -> load -> view ("login");
		$this -> load -> view ("templates/footer");

	}

	public function signup()
	{
		$title = "Signup > Admin Panel";
		$data['title'] = $title;

		$this -> load -> view ("templates/header", $data);
		$this -> load -> view ("signup");
		$this -> load -> view ("templates/footer");


	}


	public function logout()
	{
		$this -> ion_auth -> logout();
		redirect("login");
	}

}