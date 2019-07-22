<?php 

	require_once("core/Controller.php");
	class CategoryController extends Controller 
	{
		public function __construct()
		{
			$this -> model = $this -> model("prodModel");
		}
		public function index($args = [])
		{
			echo "Hmm.. it looks like you did not provided info we needed.";
		}
		public function search($args = [])
		{
			if(isset($args['query']))
			{
				$query = $args['query'];
				$query = (explode("=", $query));
				$keyword = $query[1];

				$products = $this -> model -> searchProducts($keyword);
				$data['products'] = $products;
				$data['categories'] = $this -> model -> getCategoriesList();
				$this -> loadView("category", $data);

			}
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