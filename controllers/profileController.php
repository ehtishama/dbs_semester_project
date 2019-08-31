<?php
require_once("core/Controller.php");

class ProfileController extends Controller
{
  public function __construct()
  {
    logUserIn();
    $this -> userId = $_SESSION['user']['id'];
    $this -> model = $this -> model("profileModel");
    $this -> data['title'] = "Profile Page - Ecom";
  }

  public function index()
  {
    
    $profile = $this -> model -> loadProfile();
    $this -> loadView("profile", $this -> data);
  }
  public function update_profile()
  {
    if(!m_empty_validation($_POST))
    {
      echo json_encode(["status" => "failed", "msg" => "It looks like some of fields are empty."]);echo "";
      return;
    }

    $firstname = m_post("firstname");
    $lastname = m_post("lastname");
    $email = m_post("email");

    $user_id = $_SESSION['user']['id'];
    $response = 
    $this -> model -> updateProfile($user_id, $firstname, $lastname, $email);
    if($response)
    {
      // update the session
      $_SESSION['user']['first_name'] = $firstname;
      $_SESSION['user']['last_name'] = $lastname;
      $_SESSION['user']['email'] = $email;
      echo json_encode(["status" => "success", "msg" => "The Profile has been updated"]);
    }else 
      echo json_encode(["status" => "failed", "msg" => "There was an error while updating your profile."]);
  }

  public function orders(){
    $this -> data['title'] = "My Orders - Ecom";
    $orderedProducts = $this -> model -> getOrders($this -> userId);
    if($orderedProducts!= 0)
        $this -> data['orders'] = $orderedProducts;
    $this -> loadView("my_orders_view", $this -> data);
  }

  public function order_details($data)
  {
    if(!isset($data[2]))
      m_redirect();
    $order_id = $data[2];
    $user_id = $_SESSION['user']['id'];
    
    $details = $this -> model -> getOrderDetails($user_id, $order_id);
    $this -> data['summary'] = $details['summary'];
    $this -> data['products'] = $details['products'];
    $this -> loadView("order_details_view", $this -> data);
  }

  public function inbox(){
    $user_id = $_SESSION['user']['id'];
    $this -> data['title'] = "Inbox - Ecom";
    $this -> data['messages'] = $this -> model -> getMessages($user_id);
    $this -> loadView("inbox_view", $this -> data);
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

  public function send_message()
  {
    $sender = $_SESSION['user']['id'] ;
    $receiver = 0;
    $msg = m_post("msg");
    if(empty($msg))
    {
      echo "false";
      return;
    }else $this -> model -> insertMessage($sender, $receiver, $msg);
  }
}

