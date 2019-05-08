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

    // this function will load profile data from db
    $this -> model -> loadProfile();

    // concat data from db with data[] array
    $this -> loadView("profile", $data);
  }


}
