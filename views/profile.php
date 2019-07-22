<?php
require_once("views/libs/header.php");

?>

<div class="profile_page_container">


    <div class="sidebar">
      <div class="links">
        <ul>
          <li onclick="profilePageMenu(this, 'profile');" class="selected"> <a href="#profile"> <i class="fa fa-address-card"></i> Profile</a> </li>
          <li onclick="profilePageMenu(this, 'payments');"> <a href="#payments"> <i class="fas fa-money-bill-alt"></i> Payments Options</a> </li>
          <li onclick="profilePageMenu(this, 'address');"> <a href="#address"> <i class="fa fa-address-card"></i> Address Info</a></li>
          <li onclick="profilePageMenu(this, 'orders');"> <a href="#orders" > <i class="fas fa-shopping-basket"></i> Orders</a></li>
          <li onclick="profilePageMenu(this, 'reviews');"> <a href="#reviews"> <i class="far fa-comment-dots"></i> Reviews</a> </li>

        </ul>
      </div>
    </div>

    <div class="tab profile_page" id="profile">
        <div class="main_area">
            <div class="personal_profile">
                <div class="profile_info">
                    <h3 class="personal_profile_head">Personal Profile <span> <a href="#">Edit</a> </span> </h3>

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

    <div class="tab orders_page"  id="orders" style="display: none;">
        <div class="main_area">
            <?php if(isset($data['orders'])) { ?>
            <table class="table table-border">
                <thead class="thead thead-dark">
                    <th>Order Id</th>
                    <th>Product Id</th>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Created At</th>
                    <th>Status</th>
                </thead>

                <?php foreach ($data['orders'] as $order){ ?>
                <tr>
                    <td><?php echo $order['order_id'] ?></td>
                    <td><?php echo $order['prod_id'] ?></td>
                    <td><?php echo $order['title'] ?></td>
                    <td><?php echo $order['quantity'] ?></td>
                    <td><?php echo $order['price'] ?></td>
                    <td><?php echo $order['created_at'] ?></td>
                    <td>Pending</td>

                </tr>
                <?php } ?>
            </table>

        <?php } else { ?>
            <div class="alert aler-danger">
                You have not purchased anything from us, please do.
            </div>
        <?php } ?>

        </div>

    </div>

    <div class="tab reviews_page" id="reviews" style="display: none;">
        <div class="main_area">
            <p>These are reviews.</p>
        </div>

    </div>

    <div class="tab reviews_page" id="payments" style="display: none;">

        <div class="main_area">
            <div class="card">
					<div class="card_img">

					</div>

					 <div class="card_text">
                         <div class="card_heading">
                             Cash On Delivery
     					</div>
                        <div class="card_body">
                            <p>
                                Worried about the privacy while paying online? Well, you can pay cash once the product is delivered to your doorstep. 
                                Cash on Delivery allows you to shop whatever you want and pay only when it is delivered to you. 
                            </p>
                        </div>

					</div>
			</div>
            
            <div class="card">
                    <div class="card_img" style="background-image: url(<?php echo APPROOT ?>/views/assets/credit_card.png);">

                    </div>

                     <div class="card_text">
                         <div class="card_heading">
                             Credit Card Payments
                        </div>
                        <div class="card_body">
                                <p>
                                    We accept all kinds of credit card payments through Stripe Payment Processor. Please note that we do not 
                                    store your credit card information in our databases. The information you type here transmitted to the stripe
                                    servers through encryption and they do all the processing stuff. <br>
                                    By using this method you agree to out <b>Terms and Services Policy.</b>

                                </p>
                        </div>

                    </div>
            </div>
            
        </div>
    </div>

    <div class="tab reviews_page" id="address" style="display: none;">
        <div class="main_area">
            <div class="adress_info" id="address_info_div">
                <?php if(!isset($data['address'])){ ?>
                    <h2 class="alert alert-danger">You have not provided any Address</h2>
                <?php } else { $address = $data['address'];?>
                <h3>Billing Address <span><a href="#" id="edit_address">Edit</span> </h3></a>
                <p class="street"><span>street</span> <?php echo $address['street'] ?></p>
                <p class="city"><span>city</span> <?php echo $address['city'] ?></p>
                <p class="country"><span>country</span> <?php echo $address['country'] ?></p>
                <p class="phone"><span>phone</span> <?php echo $address['phone_no'] ?></p>
                <p class="phone"><span>postal</span> <?php echo $address['postal_code'] ?></p>
                <?php } ?>
            </div>
            <?php if(!isset($data['address'])){ ?>
            <form class="form" action="<?php echo APPROOT ?>/profile/update" method="post" id="edit_address_form" >
                <h3>Update your Address Info</h3>
                <input type="text" name="street" placeholder="Street">
                <input type="text" name="city" placeholder="City">
                <input type="text" name="country" placeholder="Country">
                <input type="text" name="postal" value="" placeholder="Postal Code">
                <input type="text" name="phone" placeholder="Phone">
                <input type="submit" name="updateAddress" value="Update Address">
            </form>
        <?php } else { $address = $data['address']; ?>
            <form class="form" action="<?php echo APPROOT ?>/profile/update" method="post" id="edit_address_form" style="display: none">
                <h3>Update your Address Info</h3>
                <label for="street">Street #</label>
                <input type="text" name="street" placeholder="Street" value="<?php echo $address['street'] ?>">
                <label for="street">City</label>
                <input type="text" name="city" placeholder="City" value="<?php echo $address['city'] ?>">
                <label for="street">Country</label>
                <input type="text" name="country" placeholder="Country" value="<?php echo $address['country'] ?>">
                <label for="street">Postal Code</label>
                <input type="text" name="postal" placeholder="Postal Code" value=" <?php echo $address['postal_code'] ?> ">
                <label for="street">Phone #</label>
                <input type="text" name="phone" placeholder="Phone" value="<?php echo $address['phone_no'] ?>">

                <input type="submit" name="updateAddress" value="Update Address" >
            </form>
        <?php } ?>

        </div>
    </div>

</div>

<script type="text/javascript">

    var editAddressBtn = document.getElementById("edit_address");
    var editAddressForm = document.getElementById("edit_address_form");
    var addressInfoDiv = document.getElementById("address_info_div");

    editAddressBtn.onclick = function () {
        // console.log(editAddress);
        // hide the address div and show the edit form
        addressInfoDiv.style.display = "none";
        editAddressForm.style.display = "block";
    }
</script>

<?php
    require_once("views/libs/footer.php");
?>
