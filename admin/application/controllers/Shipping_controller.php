<?php 
	
	class Shipping_controller extends CI_Controller
	{

		private $data;
		public function __construct()
		{
			parent:: __construct();

			$this -> load -> helper("general");
			$this -> load -> helper("form");

			validate();

			$this -> load -> model("Shipment_model");

			$this -> data['shipment_services'] = $this -> Shipment_model -> get_all();
			$this -> data['title'] = "Shipment > Admin Panel";
			$this -> data['sidebar_links'] = sidebar_links();



		}

		public function index()
		{

			$this -> load -> view("shipment", $this -> data);
		}

		public function add_new_carrier()
		{
			if($this -> input -> post('add-service')):
				$error = false;

				$this -> load -> library("form_validation");
				$this -> load -> library("upload");


				$this -> form_validation -> 
				set_rules("service_name", "Service Name", "required");
				
				if(empty($_FILES['service_logo']['name']))
					$this -> form_validation 
					-> set_rules("service_logo", "Service Logo", "required");

				if($this -> form_validation -> run()):

					// upload logo
					$logo = "service_logo"; // name attribute of input element
					$uploaded_path = m_upload_image($logo);

					if($uploaded_path != false){
						
						$row = array(
						'company_name' => $this -> input 
												-> post('service_name'),
						'logo' => $uploaded_path
						);

						
						if(! $this -> Shipment_model -> add_new($row))
							$error = true;
					}
					else{
						$error = true;
					}
	
				endif;

				if($error)
					$this -> data['error'] = "There was some error.";
				else $this -> data['success'] = "New carrier added successfully.";
			endif;

			$this -> data['shipment_services'] =
			$this -> Shipment_model -> get_all();
			
			$this -> load -> view("shipment", $this -> data);


		}
	}

 ?>