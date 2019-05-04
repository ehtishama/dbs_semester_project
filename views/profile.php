<?php
require_once("views/libs/header.php");
?>

<div class="profile_page_container">


<div class="sidebar">
  <div class="links">
    <ul>

      <li class="selected"> <a href="#">Profile</a> </li>
      <li> <a href="#">Payments Options</a> </li>
      <li> <a href="#">Address Info</a></li>
      <li> <a href="#">Orders</a></li>
      <li> <a href="#">Reviews</a> </li>

    </ul>
  </div>
</div>

  <div class="profile_page">
    <div class="main_area">

      <div class="personal_profile">
        <div class="profile_info">
          <p class="personal_profile_head">Personal Profile <span> <a href="#">Edit</a> </span> </p>
          <p class="name">Ehtisham</p>
          <p class="email">ehtishamhassan9@gmail.com</p>
        </div>
        <div class="profile_pic">
          <img src="views/assets/profile.jpg" alt="">
        </div>
      </div>

      <div class="Address">

      </div>

      <div class="recent_orders">

      </div>


    </div>
  </div>

  <div class="orders_page" style="display: none;">
    <p>These are orders.</p>
  </div>

  <div class="reviews_page" style="display: none;">
    <p>These are reviews.</p>
  </div>

</div>

<?php
    require_once("views/libs/footer.php");
