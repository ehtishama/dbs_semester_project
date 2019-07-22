<?php 
class Orders_model extends CI_Model
{
    public function get_all()
    {
    	return $this -> db -> get("orders") -> result_array();
    }
}