<?php

class Model
{
	public $db;

	public $host;
	public $username;
	public $password;
	public $db_name;

	public function __construct()
	{
		$this -> host = "localhost";
		$this -> username = "root";
		$this -> password = "Ahsankhan142!";
		$this -> db_name = "ecom";

		$this -> db = new mysqli($this -> host, $this -> username, $this -> password, $this -> db_name);

		if($this -> db -> connect_errno)
			echo $this -> db -> connect_error;
		 
	}


}