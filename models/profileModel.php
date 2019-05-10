<?php

require_once("core/Model.php");

class ProfileModel extends Model
{
  public function __construct()
  {
    parent:: __construct();

  }

  // Load profile data and return;
  public function loadProfile()
  {
  }

  public function getOrderedProducts($userId)
  {
      $query = "SELECT * FROM orders
      INNER JOIN ordered_products
      ON orders.id = ordered_products.order_id
      INNER JOIN products
      ON ordered_products.prod_id = products.id
      WHERE orders.customer_id = $userId
      
      ";
      $table = array();
      $result = $this -> db -> query($query);
      echo $this -> db -> error;


      while($row = $result -> fetch_assoc())
        $table[] = $row;

    return $table;
  }

};
