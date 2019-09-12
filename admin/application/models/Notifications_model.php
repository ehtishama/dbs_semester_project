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
	public function insert_notification($notification_text){
		$row = array("user_id" => 0, "notification_text" => $notification_text);
		$this -> db -> insert("notifications", $row);
	}
	public function view_notification($notification_id){
		$this -> db -> set("is_viewed", 0)
		-> where("id = $notification_id");
		$this -> db -> update();
	}
	public function view_all_notifications(){
		$this -> db -> set("is_viewed", 1);
		$this -> db -> update("notifications");
	}
	

}

/* End of file Notifications_model.php */
/* Location: ./application/models/Notifications_model.php */