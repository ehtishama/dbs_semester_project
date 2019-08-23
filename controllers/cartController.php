<?php
  require_once("core/Controller.php");

  class CartController extends Controller
  {

    public function __construct()
    {
        $this -> model = $this -> model('cartModel');
        $this -> data['title'] = "Cart";
    }
    public function index()
    {

      if(isset($_SESSION['cart']))
        $data = $this -> model -> getCartData($_SESSION['cart']);
      else $data['products'] = [];

      // $data["title" => "Cart Page - Ecom shop online"];
      $data["title"] = "Card Page -- Ecom shop online";

      $this -> loadView('cart', $data);
    }

    /**
     * function Add To Cart
     *  add_cart($data)
     *    $data contains product id, and quantity at array indexes 1 and 2
     *    if product id or quantity is undefined, default values will be taken
     */
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
    
    /**
     * Function search_cart($data)
     *  searches through the cart for a specific product
     *  returns product index if found else returns false
     *  parameters
     *    productID => id of product to be searched
     *  return
     *    index if product found
     *    false otherwise
     */
    private function search_cart($prodId)
    {
      if(!isset($_SESSION['cart']))
        return false;

      $cart = $_SESSION['cart'];

      foreach ($cart as $key => $prod) {
        if($prod['id'] == $prodId)
          return $key;
      }
      return false;
    }

    /**
     * Function update_quantity()
     *  updates quantity of a product inside cart
     *  parameters => $data[]
    *     which contains the product id at index 1
    *     new quantity at index 2
     */
    public function update_quantity($data)
    {

      $error = json_encode(array("status" => "error"), true);
      $success = json_encode(array("status" => "success"), true);
      if(!isset($data[2]) || !isset($data[3]) || !isset($_SESSION['cart']))
      {
        echo $error;
        return;
      }


      $id = $data[2];
      $quantity = $data[3];
      $cart = $_SESSION['cart'];

      $indexInCart = $this -> search_cart($id);
      
      if($indexInCart === false)
      {
        echo $error ;
        return;
      }

      $_SESSION['cart'][$indexInCart]['quantity'] = $quantity; 

      echo $success; return; 
    }
    /**
     * returns the checkout view
     */
    public function checkout()
    {
      // authenticate user
      m_authenticate_and_redirect("login?nextPage=cart/checkout");
      $this -> data['title'] = "Checkout";
      if(isset($_SESSION['cart']))
              $this -> data['cart'] = $this -> model -> getCartData($_SESSION['cart']);

      $this -> loadView("checkout", $this -> data);

    }
  
    /**
    *  gets form data and validates it.. 
    * if any error redirects to the checkout page with proper errors
    */
    private function get_and_validate_shipment_address(){
       // get shipment address address 
        $form_data = array(
          "street" => m_post("address1"),
          "city" => m_post("city"),
          "country" => m_post("country"),
          "postal_code" => m_post("postal"), 
          "phone_no"    => m_post("phone")
        );

        // validate address and write errors if any
        $is_error = false;
        $errors = [];

        foreach ($form_data as $key => $value) {
          if(empty($value) || $value == NULL){
            $is_error = true;
            $errors[] = "$key field can not be empty.";
          }
        }
        if($is_error)
        {
          m_set_flashdata("error", join("<br>", $errors));
          m_set_form_values($form_data);
          m_redirect("cart/checkout/");
        }else return $form_data;
    }

    
    /**
      * mega function
      *  getting payment, and placing order into database
      */
    public function placeOrder()
    {
        // if user not authenticated, redirect to login page
        m_authenticate_and_redirect();

        // gets and validates shipment address, if not valid will redirect to the checkout page
        $form_data = $this -> get_and_validate_shipment_address();
        
        //stripe processing and order data saving
        if(! m_post_isset(['stripeToken']) || !isset($_SESSION['cart']))
        {
          echo "it seems your cart is empty. please go back and add someitemes to your cart.";
          exit();
          // TODO:: proper erroe messages
        }

        // process cart, take payment, add to database
        $totalAmount = ($this -> model -> getCartData($_SESSION['cart']))['total'];
        $stripeToken = $_POST['stripeToken']; // acquired from stripe.js

        // get stripe secret key from db
        \Stripe\Stripe :: setApiKey("sk_test_DjydLfQsRUxDObO5QeShusFt00bIeoTbpK");
        try {
            // start transaction, insert everything to db
            // make payment, if successfull commit transaction
            // else just roll back
            $mysqli_driver = new mysqli_driver();
            $mysqli_driver -> report_mode = (MYSQLI_REPORT_ALL); // throw exception if any query fails

            $this -> model -> db -> begin_transaction();

            // insert shipment address to the database
            $this -> model -> db-> query(m_insert_builder("address", $form_data));
            $address_id = $this -> model -> db -> insert_id;

            // order details
            $products = $this -> model -> getCartData($_SESSION['cart']);
            $customerId = $_SESSION['user']['id'];
            $total = $totalAmount;

            // insert order details to the orders_table
            $orderQuery = "INSERT INTO
            orders (id,   customer_id, charges, created_at, updated_at, shipment_address)
            VALUES (NULL, $customerId, $total, NULL, NULL, $address_id)";
            $this -> model -> db -> query($orderQuery);
            $lastInsertId = $this -> model -> db -> insert_id;

            // put all the products to the ordered_products table
            foreach ($products['products'] as $product) 
            {
                $orderId = $lastInsertId;
                $prodId = $product['id'];
                $quantity = $product['quantity'];
                $discount = 0;
                $charges = $product['price'] * $quantity;
                $orderedProductQuery = "INSERT INTO
                ordered_products (id, order_id, prod_id, quantity, charges, discount)
                values          (NULL, $orderId, $prodId, $quantity, $charges, $discount)";
                $this -> model -> db -> query($orderedProductQuery);
                echo $this -> model -> db -> error;
            }


            $response = \Stripe\Charge :: create([
              "amount" => $totalAmount * 100,
              "currency" => "usd",
              "source" => "$stripeToken", // obtained with Stripe.js
              "description" => "Your order on ecom." // write useful description
            ]);

            // payment has been made successfully
            // save payment information
            $orderId = $lastInsertId;
            $paymentId = $response -> id;
            $total;
            $processor = 1; 
            /**
             * later if your add more payment processors change this hard code value to the payment
             * processor id stored in payment_processors table
             * */

            $this -> model -> db 
            -> query("
            INSERT INTO payments(processor, transaction_number, amount) 
            VALUES($processor, '$paymentId', $total)
            ");
            // commit the transaction
            $this -> model -> db -> commit();


            // clear the current cart
            $_SESSION['cart'] = array();

            header("Location: " . APPROOT . "/profile");
            
        }catch (mysqli_sql_exception $e) {
            echo "put the following error to the database, and show something helpful to the user <br>";
            echo $e -> getMessage();
            exit();
        } catch (Exception $e) {
          echo "Something went wrong... Please try again...";
          echo $e -> getMessage();
          exit();
        } 
    }


  } //end of controller

 ?>
