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
    $this -> model -> loadProfile();
  }


}
