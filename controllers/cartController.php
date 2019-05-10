<?php
  require_once("core/Controller.php");
  class CartController extends Controller
  {

    public function __construct()
    {
        $this -> model = $this -> model('cartModel');
    }
    public function index()
    {



      if(isset($_SESSION['cart']))
        $data = $this -> model -> getCartData($_SESSION['cart']);
      else $data['products'] = [];

      //  $data["title" => "Cart Page - Ecom shop online"];

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



    public function orderSummary()
    {

        $data['submitOrder'] = true;

        // is user logged in
        // if not, log user in and comeback here
        if(! (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true ))
        {
            header("Location: " . APPROOT . "/login?nextpage=cart");
            die();
        }


        // show order summary
        // list of products from the session
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
        {
            if(isset($_SESSION['cart']))
              $data['cart'] = $this -> model -> getCartData($_SESSION['cart']);

        }
        $this -> loadView("cart", $data);




        // confirm order or edit order
        // choose a payment option
        // process payment

        // if successfull, place order to db

    }

    public function placeOrder()
    {
        if(! (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true ))
        {
            header("Location: " . APPROOT . "/login?nextpage=cart");
            die();
        }

        // put order into the database
        if(isset($_SESSION['cart']))
            {// put data into orders table
            $products = $this -> model -> getCartData($_SESSION['cart']);
            $this -> model -> db -> begin_transaction();
            $customerId = $_SESSION['user']['id'];
            $total = $products['total'];
            $orderQuery = "Insert into
            orders (id,   customer_id, charges, created_at, updated_at)
            values (NULL, $customerId, $total, NULL, NULL)";

            $this -> model -> db -> query($orderQuery);
            echo $this -> model -> db -> error;
            $lastInsertId = $this -> model -> db -> insert_id;

            // put data into ordered products table
            foreach ($products['products'] as $product) {
                $orderId = $lastInsertId;
                $prodId = $product['id'];
                $quantity = $product['quantity'];
                $discount = 0;
                $orderedProductQuery = "INSERT INTO
                ordered_products(id, order_id, prod_id, quantity, discount)
                values          (NULL, $orderId, $prodId, $quantity, $discount)";
                $this -> model -> db -> query($orderedProductQuery);
                echo $this -> model -> db -> error;

            }
            $this -> model -> db -> commit();
            // clear the current cart
            $_SESSION['cart'] = array();

            // redirect
            header("Location: " . APPROOT . "/profile");



        }



    }

  }

 ?>
