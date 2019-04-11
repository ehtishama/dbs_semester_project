<?php
  require('core/Model.php');

  class CartModel extends Model
  {

    public function __construct()
    {
      parent:: __construct();
    }

    public function getCartData($ids)
    {
      $query = 'select * from products where id in (';
      foreach ($ids as  $id) {
        $query .= $id . ',';
      }
      $query = substr($query, 0, strlen($query) - 1);
      $query .= ')';

      // echo $query;
      $result = $this -> db -> query($query);

      $data = [];
      while($row = $result -> fetch_assoc())
        $data[] = $row;

        return $data;
    }
  }


 ?>
