<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox_controller extends CI_Controller {
	private $data;
	public function __construct()
	{
		parent::__construct();
		validate();
		$this -> load -> model("inbox_model");
		$this -> data['title'] = "Inbox > Admin Panel";
		$this -> data['sidebar_links'] = sidebar_links();
		$this -> data['customers'] = $this -> inbox_model -> get_customers();
		$this -> data['customer_id'] = 0;
		$this -> data['messages'] = array();
	}
	public function index()
	{
		$this -> load -> view("inbox", $this -> data);
	}
	public function user($id)
	{
		$this -> data['messages'] = 
		$this -> inbox_model -> get_conversation(0, $id);
		$this -> data['customer_id'] = $id;
		$this -> load -> view("inbox", $this -> data);
	}
	public function send_message()
	{
		$msg = $this -> input -> post("msg");
		$receiver =  $this -> input -> post("receiver");
		$sender = 0;
		if(!($msg && $receiver))
		{
			echo "could not sent msg";
			return;
		}
		
		// insert the msg in db
		$this -> inbox_model -> insert_message($sender, $receiver, $msg);
		// return the json response
		echo "success";
	}

}

/* End of file Inbox_controller.php */
/* Location: ./application/controllers/Inbox_controller.php */