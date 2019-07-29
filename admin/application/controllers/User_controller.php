<?php 
	class User_controller extends CI_Controller
	{
		private $data;
		public function __construct()
		{
			parent ::__construct();

			$this -> load -> helper("general");
			validate();

			$this -> load -> model("Users");
			$this -> data['sidebar_links'] = sidebar_links();
			$this -> data['title'] = "Users > Admin Panel";
		}

		public function index()
		{
			$this -> data["users"] = $this -> Users -> get_all();
			$this -> load -> view("users", $this -> data);
		}
	}


 ?>