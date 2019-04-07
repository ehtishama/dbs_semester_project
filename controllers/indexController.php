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
			$this -> model = $this -> model('prodModel');
			$data = $this -> model -> getRecentProducts(10);

			// print_r($data);
			if(isset($data['products_success']))
			$args['products'] = $data;

			$this -> loadView('home', $args);
			
		}
	}


 ?>