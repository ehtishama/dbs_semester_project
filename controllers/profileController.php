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
    $data = ["title" => "Ehtisham Hassan - Profile Page"];
    $userId = $_SESSION['user']['id'];

    // this function will load profile data from db
    $this -> model -> loadProfile();
    $orderedProducts = $this -> model -> getOrderedProducts($userId);
    $data['orders'] = $orderedProducts;
    // concat data from db with data[] array
    $this -> loadView("profile", $data);
  }


}
