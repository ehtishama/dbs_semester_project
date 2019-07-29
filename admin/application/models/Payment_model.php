<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

	public function processors()
	{
		return $this -> db -> get("payment_processors") -> result_array();
	}

	public function properties($id)
	{
		$this -> db -> select("property, value")
					-> from("payment_processor_properties")
					-> where("proc_id = $id");
		return $this -> db -> get() -> result_array();
	}


	public function update()
	{
		
	}

}

/* End of file Payment_model.php */
/* Location: ./application/models/Payment_model.php */