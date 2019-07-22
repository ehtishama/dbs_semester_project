<?php 

	class Pages extends CI_Controller
	{
		public function index()
		{
			echo "Nothing here";
			
		}
		public function view($page = 'about')
		{
			if(!file_exists(APPPATH . "views/" . $page . ".php"))
				show_404();

			$data['author'] = "Ehtisham hassan";
			$data['title'] = "About US page";

			$this -> load -> view ("templates/header.php", $data);
			$this -> load -> view("$page", $data);
			$this -> load -> view ("templates/footer.php");

			


		}


		public function insert()
		{
			// loading 
			$this -> load -> model ("News_model");
			$this -> load -> helper('form');
    		$this -> load-> library('form_validation');

    		// set rules for validation, you can do that manyally as well
    		$this -> form_validation -> set_rules("title", "Title", "required");
    		$this -> form_validation -> set_rules("desc", "Description", "required");

    		if($this -> form_validation -> run() === FALSE) //run the rules
    		{
    			$this -> load -> view("insert.php");	
    		}
    		else
    		{
    			// data is valid, you can ask model to insert it
    			if($this -> News_model -> create())
    				echo "News has been added successfully.";
    			$this -> load -> view("insert.php");
    		}
    		
			
		}
	}

 ?>