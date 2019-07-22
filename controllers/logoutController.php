<?php
  require_once("core/Controller.php");

  class LogoutController extends Controller
  {
    public function __construct()
    {

    }

    public function index()
    {
      session_destroy();
      header("Location: ".APPROOT );
    }

  }


 ?>
