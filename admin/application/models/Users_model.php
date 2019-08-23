<?php 
class Users_model extends CI_Model
{
    public function get_all()
    {
    	return $this -> db -> get("customers") -> result_array();
    }
    public function get_profile($id)
    {
    	$this -> db -> select("*")
			-> from("customers")
			-> where("id = $id")
			-> join("address", "address.user_id = customers.id", "left")
			-> limit(1);
		return ( $this -> db -> get() -> row_array());
    }
}


