<?php  
	/**
	* 
	*/
	class Payment_controller extends CI_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			validate();


			$this -> data['title'] = "Payment Processors > Admin Panel";
			$this -> data['sidebar_links'] = sidebar_links();

			$this -> load -> helper("form");
			$this -> load -> model("payment_model");
		}

		function index()
		{
			
			$processors = $this -> payment_model -> processors();
			for ($i=0; $i < count($processors); $i++) { 
			 	$processors[$i]['properties'] 
				= $this -> payment_model -> properties($processors[$i]['proc_id']);
			}


			$this -> data['processors'] = $processors;
			$this -> load -> view("payment", $this -> data);


		}
		public function update()
		{
			if(!$this -> input -> post("update-payment-processor"))
				redirect("payments");
			$proc_id = $this -> input -> post("proc_id");
			foreach ($this -> input -> post("property") as $property => $value) {
					$row = array("value" => $value);
					$this -> db -> set($row) 
					-> from("payment_processor_properties")
					-> where("property = '$property' AND proc_id = $proc_id");
					$this -> db -> update();
			}
			
			$this->session->set_flashdata('success', 'fields updated successfully.');
			redirect("payments");
		}


	}


?>