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
      //                          [product] => [name, id, price, etc],
      //                        }
        $total = 0.0;
        $data['products'] = array();
        $data['total'] = 0.0;
        
        foreach ($prods as  $prod) {
          $id = $prod['id'];
          $query = "select * from products where id = {$id}";
          $result = $this -> db -> query($query);
          echo $this -> db -> error;

          if($result -> num_rows > 0)
          {
              $temp = $result -> fetch_assoc();
              $temp['quantity'] = $prod['quantity'];

              $total += ($temp['price'] * $temp['quantity']);

              $data['products'][] = $temp;
          }




      }
      $data['total'] = $total;
      return $data;
    }



  }


 ?>
