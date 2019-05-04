<?php
  require_once("core/Controller.php");
  class CartController extends Controller
  {

    public function __consturct()
    {

    }
    public function index()
    {
      $this -> model = $this -> model('cartModel');

      if(isset($_SESSION['cart']))
        $data = $this -> model -> getCartData($_SESSION['cart']);
      else $data = [];
      $this -> loadView('cart', $data);
    }

    public function add_cart($data)
    {


      $id = 0;
      $quantity = 1;

      if(isset($data[2]))
        $id = $data[2];

      if(isset($data[3]))
        $quantity = $data[3];

      // search if cart does not have this item already
      // if it has update it
      // else add it
      if($this -> search_cart($id) === false)
      {
        $prod['id'] = $id;
        $prod['quantity'] = $quantity;
        $_SESSION['cart'][] = $prod;

        $msg = "Product is added to the cart";
        echo json_encode($msg);
      }else echo json_encode("Already added");

    }




    public function remove_cart($data)
    {

      if(isset($_SESSION['cart']))
      {
          $cart = $_SESSION['cart'];
          $id = 0;
          if(isset($data[2]))
            $id = $data[2];

          $key = $this -> search_cart($id);
          if($key !== false)
          {
            unset($_SESSION['cart'][$key]);
            // reindxing
            array_values($_SESSION['cart']);
            echo json_encode("removed");
          }else echo json_encode("product not found in cart");



      }else echo json_encode("cart is empty");


    }





    private function search_cart($prodId)
    {
      if(isset($_SESSION['cart']))
      {
        $cart = $_SESSION['cart'];
        foreach ($cart as $key => $prod) {
          if($prod['id'] == $prodId)
            return $key;
        }

      }
      return false;
    }



  }

 ?>
