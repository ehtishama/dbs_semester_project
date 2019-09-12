<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this -> load -> model('notifications_model');

	}

	public function index()
	{
		
	}

	public function view_all_notifications(){
		$this -> notifications_model -> view_all_notifications();
		echo json_encode(
			array("status" => "success", "msg" => "All notifications has been seen.")
			, true);
	}

	

}

/* End of file Notifications_controller.php */
/* Location: ./application/controllers/Notifications_controller.php */