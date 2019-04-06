<?php 
	require_once("core/model.php");

	class ProdModel extends Model
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function selectRecentProducts($n)
		{
			$q = "SELECT * FROM products ORDER BY id DESC LIMIT $n";
			$result = $this -> db -> query($q);
			echo $this -> db -> error;

			return $result;
		}
	}

 ?>