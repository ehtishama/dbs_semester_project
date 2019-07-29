<?php 
	/**
	* 
	*/
	class Shipment_model extends CI_Model
	{
		
		public function add_new($row)
		{
			return $this -> db -> insert("shipment_providers", $row);
		}

		public function get_all()
		{
			
			
			return $this -> db 	-> get("shipment_providers")
								-> result_array();
		}
	}

 ?>