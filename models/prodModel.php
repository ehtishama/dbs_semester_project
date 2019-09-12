<?php
	require_once("core/Model.php");

	class ProdModel extends Model
	{
		public function __construct()
		{
			parent:: __construct();
		}

		private function select($query, $limit = 20)
		{
			$data = [];
			$result = $this -> db -> query($query . " LIMIT " . $limit);
			echo $this -> db -> error;
			if($result)
				while ($row = $result -> fetch_assoc()) {
					$data[] = $row;
				}

			return $data;				
		}
		public function getRecentProducts($pageNo  = 1, $perPage = 16)
		{
			$productsToSkip = ($pageNo - 1) * 15;

			$q = "SELECT * FROM products ORDER BY id DESC LIMIT $productsToSkip, $perPage";
			
			$result = $this -> db -> query($q);


			$data['products_success'] = true;
			$temp = [];
			while($row = $result -> fetch_assoc())
			{
				$image_path = $row['image'];
				if(!filter_var($image_path, FILTER_VALIDATE_URL))
					$row['image'] = APPROOT . "/admin/" . $image_path;

				$temp[] = $row;
			}
			$data['products'] = $temp;

			return $data;
		}

		public function getProdByCat($catID)
		{
			$query = "SELECT * FROM products WHERE category = $catID";
			$result = $this -> db -> query ($query);

			$data['products_success'] = true;
			$temp = [];
			while($row = $result -> fetch_assoc())
			{
				$temp[] = $row;
			}
			$data['tren'] = $temp;
			return $data;

		}



		public function getProductById($id)
		{
			$data = [];

			if (isset($id[2])) {
				$id = $id[2];
			}else $id = 0;

			$q = "SELECT * FROM products WHERE id = $id";
			$result = $this -> db -> query($q);

			if($result -> num_rows > 0)
			{
				$data['products_success'] = true;
				$data['product'] = $result -> fetch_assoc();
			}
			return $data;
		}

		public function fiveMostSoldProducts()
		{
			$data = [];

			$query = 
			"
				SELECT * FROM products WHERE id in(
				SELECT prod_id FROM(
				select count(*) as n, prod_id FROM ordered_products GROUP BY prod_id ORDER BY n DESC LIMIT 5
				)
			    AS T	    
				)
			";

			$result = $this -> db -> query($query);
			echo $this -> db -> error;

			if($result)
				while($row = $result -> fetch_assoc())
					$data[] = $row;
			return $data;
		}

		public function getCategoriesList()
		{
			$data = [];
			$query = "SELECT * FROM product_categories";
			$result = $this -> db -> query($query);

			if($result)
				while($row = $result -> fetch_assoc())
					$data[] = $row;

			return $data;

		}

		public function getProductsFromCategoryId($categoryId)
		{
			$data = [];
			$query = "SELECT * FROM products WHERE category = $categoryId";
			$result = $this -> db -> query($query);

			if($result)
				while($row = $result -> fetch_assoc())
					$data[] = $row;

			return $data;			
		}
		public function searchProducts($keyword)
		{
			return $this -> select("SELECT * FROM products WHERE `title` LIKE '%$keyword%'");
		}

		public function paginationLinks($productsPerPage = 15){
			$totalProducts = $this -> db -> query("SELECT count(*) as count from products")
			 -> fetch_assoc()['count'];
			 $links = [];
			 for($i = 1; $i < $totalProducts; $i++)
			 {
			 	$temp['count'] = $i;
			 	$temp['link'] = "page=" . $i;

			 	$links[] = $temp;
			 	$totalProducts -= $productsPerPage; 
			 }
			 return $links;
		}

	}

 ?>
