<?php
  require('core/Model.php');

  class CartModel extends Model
  {

    public function __construct()
    {
      parent:: __construct();
    }

    public function getCartData($prods)
    {
      // return data as [0] => {
      //                          [quantity] => 12,
      //                          [product] => [name, id, id],
      //                        }
      $data = array();

      foreach ($prods as  $prod) {
        $id = $prod['id'];
        $query = "select * from products where id = {$id}";
        $result = $this -> db -> query($query);
        echo $this -> db -> error;

        if($result -> num_rows > 0)
        {
          $temp['product'] = $result -> fetch_assoc();
          $temp['product']['quantity'] = $prod['quantity'];

          $data[] = $temp;
        }


      }

      return $data;
    }
  }


 ?>
