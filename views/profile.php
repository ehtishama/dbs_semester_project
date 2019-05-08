<?php
require_once("views/libs/header.php");
?>

<div class="profile_page_container">


    <div class="sidebar">
      <div class="links">
        <ul>
          <li onclick="profilePageMenu(this, 'profile');" class="selected"> <a href="#">Profile</a> </li>
          <li onclick="profilePageMenu(this, 'payments');"> <a href="#">Payments Options</a> </li>
          <li onclick="profilePageMenu(this, 'address');"> <a href="#">Address Info</a></li>
          <li onclick="profilePageMenu(this, 'orders');"> <a href="#" >Orders</a></li>
          <li onclick="profilePageMenu(this, 'reviews');"> <a href="#">Reviews</a> </li>

        </ul>
      </div>
    </div>

    <div class="tab profile_page" id = "profile">
        <div class="main_area">
            <div class="personal_profile">
                <div class="profile_info">
                    <p class="personal_profile_head">Personal Profile <span> <a href="#">Edit</a> </span> </p>
                    <p class="name">Mr, <?php echo $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?></p>
                    <p class="email">@<?php echo $_SESSION['user']['username'] ?></p>
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

    <div class="tab orders_page" id="orders" style="display: none;">
        <div class="main_area">
            <p>These are orders.</p>
        </div>

    </div>

    <div class="tab reviews_page" id="reviews" style="display: none;">
        <div class="main_area">
            <p>These are reviews.</p>
        </div>

    </div>

    <div class="tab reviews_page" id="payments" style="display: none;">
        <div class="main_area">
            <p>These are payment options.</p>
        </div>
    </div>

    <div class="tab reviews_page" id="address" style="display: none;">
        <div class="main_area">
            <p>This is your address info.</p>
        </div>
    </div>

</div>

<?php
    require_once("views/libs/footer.php");
