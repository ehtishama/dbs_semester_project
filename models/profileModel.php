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
      $query = "
        SELECT o.id as order_id, o.status, o.created_at, op.quantity, op.charges, p.title, p.price 
        FROM orders as o
        INNER JOIN ordered_products as op
        ON o.id = op.order_id
        INNER JOIN products as p
        ON op.prod_id = p.id
        WHERE o.customer_id = $userId
        ORDER BY order_id DESC

      ";
      $table = array();
      $result = $this -> db -> query($query);
      echo $this -> db -> error;

    if($result -> num_rows > 0)
    {
        while($row = $result -> fetch_assoc())
        $table[] = $row;
    }else $table = 0;


    return $table;
  }

  public function getOrders($userId)
  {
    $result = $this -> db -> query("
      SELECT * FROM orders
      WHERE customer_id = $userId
      ORDER BY created_at DESC
      ");
    $orders = [];
    while($row = $result -> fetch_assoc())
      $orders[] = $row;
    return $orders;
  }

  public function getOrderDetails($userId, $orderId)
  {
    // return two thing
    // order summary and products in that order
    $summary_query = 
    "SELECT * FROM orders as o
     WHERE o.customer_id = '$userId' AND o.id = $orderId
     LIMIT 1";

     $summary_result = $this -> db -> query($summary_query);
     $summary = $summary_result -> fetch_assoc();

      $products_query = 
      "SELECT * FROM orders as o
      JOIN ordered_products as op
        ON op.order_id = o.id
      JOIN products as p 
        ON p.id = op.prod_id
      WHERE o.customer_id = '$userId' AND o.id = $orderId ";

      $result = $this -> db -> query($products_query);
      $products = [];
      while ($row = $result -> fetch_assoc()) {
        $products[] = $row;
      }
      return array("summary" => $summary, "products" => $products);
  }

  // will get the rows from address table where id = givenId
  public function getAddress($userId)
  {
      $query = "SELECT * FROM address WHERE user_id = $userId";
      $result = $this -> db -> query($query);
      if($result -> num_rows >= 1)
        $result = $result -> fetch_assoc();
      else
        $result = 0;

    return $result;
  }


  public function insertAddress($address)
  {
    $street  = $address['street'];
    $city    = $address['city'];
    $country = $address['country'];
    $phone   = $address['phone'];
    $postal  = $address['postal'];
    $userId = $address['user_id'];


    $query =
    "INSERT INTO
    address   (user_id, street,    city,    country,     phone_no, postal_code)
    values    ($userId, '$street', '$city', '$country', '$phone', '$postal')
    ON DUPLICATE KEY UPDATE
    street = '$street',
    city = '$city',
    country = '$country',
    phone_no = '$phone',
    postal_code = '$postal'
    ";

    $result = $this -> db -> query($query);
    echo $this -> db -> error;
    if($result)
      header("Location: " . APPROOT . "/profile#orders");
    else echo "There happens to be some errors while updating your address. Please try again later.";
  }

  public function getMessages($userId)
  {
    $messages_query = 
      "
      SELECT * FROM messages
      WHERE sender = $userId OR receiver = $userId 
      ORDER BY created_at 
      asc;
      ";

      $messages_query_result = $this -> db -> query($messages_query);

      $messages = [];
      while($row = $messages_query_result -> fetch_assoc()) {
        $messages[] = $row;
      }
      return $messages;

  }

  public function insertMessage($sender, $receiver, $msg)
  {
    $message_query = 
    "INSERT INTO messages (sender, receiver, msg)
    VALUES($sender, $receiver, '$msg')";
    $this -> db -> query($message_query);
    echo $this -> db -> error;
    if($this -> db -> errno)
      echo "Failed";
    else echo "Success";

  }
  public function updateProfile($id, $firstname, $lastname, $email)
  {
    $update_query = 
    "UPDATE customers SET first_name = '$firstname', last_name = '$lastname', email='$email'
    WHERE id = $id
    ";

     $this -> db -> query($update_query);
     echo $this -> db -> error;
     if($this -> db -> errno)
      return false;
    else return true;
  }

};
