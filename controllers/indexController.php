<?php 
	
	require_once('core/Controller.php');

	class indexController extends Controller
	{
		public function __construct()
		{
			//echo "This is index Controller" ;
		}

		public function index($args = [])
		{
			$this -> loadView('home', $args);
			
		}
	}


 ?>