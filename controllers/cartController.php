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
      print_r($data);

      $id = 0;
      if(isset($data[2]))
        $id = $data[2];
        $_SESSION['cart'][] = $id;
        echo '<pre>';
        print_r($_SESSION['cart']);
        echo '</pre>';
    }

  }

 ?>
