<?php
require_once("core/Controller.php");

class ProfileController extends Controller
{
  public function __construct()
  {

    $this -> model = $this -> model("profileModel");
  }

  public function index()
  {
      // helper function to make sure user is logged in
      // otherwise user will be redirected to the login page
    logUserIn();
    $data = ["title" => "Ehtisham Hassan - Profile Page"];
    $userId = $_SESSION['user']['id'];

    // this function will load profile data from db
    $profile            = $this -> model -> loadProfile();
    $orderedProducts    = $this -> model -> getOrderedProducts($userId);
    $address            = $this -> model -> getAddress($userId);


    if($orderedProducts!= 0)
        $data['orders'] = $orderedProducts;

    if($address != 0)
        $data['address'] = $address;

    // concat data from db with data[] array
    $this -> loadView("profile", $data);
  }

  public function update()
  {
      if(isset($_POST['updateAddress']))
      {
          $street  = $_POST['street'];
          $city    = $_POST['city'];
          $country = $_POST['country'];
          $phone   = $_POST['phone'];
          $postal  = $_POST['postal'];

          $address = array(
            "user_id" => $_SESSION['user']['id'],
            "street"  => $street,
            "city"    => $city,
            "country" => $country,
            "phone"   => $phone,
            "postal"  => $postal
          );

          $this -> model -> insertAddress($address);
      }
  }

}
