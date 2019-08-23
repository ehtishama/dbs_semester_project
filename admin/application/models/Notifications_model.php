<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications_model extends CI_Model {
	public function fetch_admin_notifications()
	{
		$this -> db -> select("*")
		-> from("notifications")
		-> where("user_id = 0")
		-> order_by("created_on", "desc");

		return $this -> db -> get()-> result_array();
	}
	

}

/* End of file Notifications_model.php */
/* Location: ./application/models/Notifications_model.php */