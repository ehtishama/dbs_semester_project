<?php 
	class User_controller extends CI_Controller
	{
		private $data;
 		public function __construct()
		{
			parent ::__construct();

			$this -> load -> helper("general");
			validate();

			$this -> load -> model("users_model");
			$this -> load -> helper("form");
			$this -> data['sidebar_links'] = sidebar_links();
			$this -> data['title'] = "Users > Admin Panel";
		}

		public function index()
		{
			$this -> data["users"] = $this -> users_model -> get_all();
			$this -> load -> view("users", $this -> data);
		}

		/**
		 * $id = unique id that identifies a user
		 * return users info and address
		 */
		public function profile($id)
		{
			$this -> user_id = $id;
			$this -> data['profile'] = $this -> users_model -> get_profile($id);
			$this -> load -> model("orders_model");

			$this -> data['orders'] = 
			$this -> orders_model -> orders_by_customer($id);
			
			$this -> load -> view("user_profile", $this -> data);
		}

		public function send_mail($id)
		{
			if(!$this -> input -> post("message"))
				redirect("users/profile/$id");
				
			$to = $this -> input -> post("email");
			$msg_body = $this -> input -> post("msg");

			$this->load->library('phpmailer');
			$status = $this -> phpmailer -> send_mail($to, $msg_body);
			if($status  === true)
				$this->session->set_flashdata('success', "An e-mail has been sent a mail to <b>$to</b> containting text you just typed.");
			else $this->session->set_flashdata('error', $status);
			redirect("users/profile/$id");
			 

			
		}
	}


 ?>