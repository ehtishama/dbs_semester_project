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
};
