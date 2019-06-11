<?php 

	require_once("core/Controller.php");
	class CategoryController extends Controller 
	{
		public function __construct()
		{
			$this -> model = $this -> model("prodModel");
		}
		public function index()
		{
			echo "hello world";
		}
		public function cat_id($args = [])
		{
			if(isset($args[2]))
				$categoryId = $args[2];
			else $categoryId = 1;

			$products = $this -> model -> getProductsFromCategoryId($categoryId);
			$data['products'] = $products;
			$data['categories'] = $this -> model -> getCategoriesList();
			$this -> loadView("category", $data);



		}
	}


 ?>