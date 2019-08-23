<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox_model extends CI_Model {

	public function get_customers()
	{
		$this -> db -> query("SET SESSION sql_mode = ''");
		$this -> db -> select("customers.*, messages.created_at")
		-> from("customers")
		-> join("messages", "customers.id = messages.sender OR customers.id = messages.receiver", "left")
		-> group_by("customers.username")
		-> order_by("created_at", "DESC")
		
		;

		
		return $this -> db -> get() -> result_array();
		// return $this -> db -> get("customers") -> result_array();
	}

	public function get_conversation($first_person, $second_person)
	{
		$this -> db -> select("*")
			-> from("messages")
			-> where("
				(sender = $first_person OR sender = $second_person)
				AND 
				(receiver = $first_person OR receiver = $second_person)
				");
		return $this -> db -> get() -> result_array();
	}

	public function insert_message($sender, $receiver, $msg)
	{
		$row = array("sender" => $sender, "receiver" => $receiver, 'msg' => $msg);
		$this -> db -> insert("messages", $row);
	}
}

/* End of file Inbox_model.php */
/* Location: ./application/models/Inbox_model.php */