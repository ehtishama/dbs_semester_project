<?php 
	
	require_once('core/Controller.php');

	class ProductsController extends Controller
	{
		public function __construct()
		{
			$this -> model = $this -> model('prodModel');
		}

		public function index()
		{
			echo 'next time come with a product id';
		}

		public function product($id)
		{
			$data = $this -> model -> getProductById($id);

			$this -> loadView('product', $data);
		}
	}

 ?>