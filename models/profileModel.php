<?php

require_once("core/Model.php");

class ProfileModel extends Model
{
  public function __construct()
  {
    parent:: __construct();
  }

  public function loadProfile()
  {
    echo "Loading profile";
  }

};
