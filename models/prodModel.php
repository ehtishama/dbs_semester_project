<?php
	require_once("core/Model.php");

	class ProdModel extends Model
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function getRecentProducts($n)
		{
			$q = "SELECT * FROM products ORDER BY id DESC LIMIT $n";
			$result = $this -> db -> query($q);


			$data['products_success'] = true;

			while($row = $result -> fetch_assoc())
			{
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


	}

 ?>
