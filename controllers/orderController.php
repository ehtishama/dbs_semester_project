<?php
    require_once("core/Controller.php");
    class OrderController extends Controller
    {
        public function __construct()
        {
            $this -> model = $this -> model("cartModel");
        }
        public function index()
        {
            


        }
    }
