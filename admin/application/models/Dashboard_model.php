<?php 
	class Dashboard_model extends CI_Model
	{
		public function get_highlights()
		{
			$salesThisMonth = $this -> db -> query("
				SELECT sum(charges) AS sales from orders
				") -> result_array()[0]["sales"];
			


			$ordersThisMonth = $this -> db -> query("
				SELECT count(*) AS orders FROM orders
				") -> result_array()[0]["orders"];

			$customersThisMonth = $this -> db -> query("
				SELECT count(*) AS customers FROM customers
				") -> result_array()[0]["customers"];


			$this -> db -> select("orders.*, customers.first_name, customers.last_name")
										-> from("orders")
										-> join("customers", "orders.customer_id = customers.id")
										-> order_by("orders.id", "DESC")
										-> limit(10);
			$recentOrders = $this -> db -> get()-> result_array();

			$this -> db -> select("*") 
			-> from("products")
			-> order_by("products.id", "desc")
			-> limit(10);
			$top_selling_products = $this -> db -> get() -> result_array();

			$recent_activity = $this -> db -> get("activities") -> result_array();
			$highlights = array(
				"sales"  			=> $salesThisMonth,
				"orders" 			=> $ordersThisMonth,
				"customers" 		=> $customersThisMonth, 
				"recent_orders" 	=> $recentOrders,
				"top_products" 		=> $top_selling_products,
				"recent_activities" => $recent_activity

			);

			return $highlights;
			
			

			
		}
	}

 ?>