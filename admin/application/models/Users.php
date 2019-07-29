<?php 
class Users extends CI_Model
{
    public function get_all()
    {
    	return $this -> db -> get("customers") -> result_array();
    }
}


