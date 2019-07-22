<?php
  require("views/libs/header.php");
  $total = 0;
 ?>
 <?php if(!isset($data['submitOrder'])) { ?>
   <div class="cart_page">

     <div class="cart">
       <div class="update_cart">
         <a href="#">Update Cart</a>
       </div>


       <table id = "cart_table">
         <tr>
           <th></th>
           <th>Image</th>
           <th>Id</th>
           <th>Title</th>
           <th>Quantity</th>
           <th>Price</th>
         </tr>

         <?php if (isset($data['products'])) ?>
         <?php foreach ($data['products'] as $product){ ?>
           <tr class="product_row">
              <td class="cross" onclick="removeProduct(<?php echo $product['id'] ?>, this, <?php echo $product['price']?>);">
                x
              </td>
             <td>
                <img src="<?php echo $product['image'] ?>" alt="">  
              </td>
              <td>
                <?php  echo $product['id'] ?>
              </td>
              <td>
                <?php  echo $product['title'] ?>
              </td>
              <td id="quantitiy_cell">
                <input id="quantitiy" type="number" name="quantity" value="<?php echo $product['quantity']?>" min="1" max="10">
              </td>
              <td id="price_cell">
                PKR 
                <span id="price">
                  <?php  echo $product['price']; $total += $product['price']; ?>    
                </span>
              </td>
           </tr>
         <?php } ?>


       </table>




       <div class="checkout">
         <div class="total" >
          Grand Total:  <span id="gTotal"> <?php echo $total; ?> </span>
         </div>

         <a href="<?php echo APPROOT ?>/cart/ordersummary">Checkout</a>
       </div>
     </div>


  </div>
<?php } else { ?>

<!-- confirm order view -->
  <div class="order_process">

      <div class="card invoice_card">
            
            
                
              
              <div class="card-header">
                  <h2>Order Summary</h2>
              </div>

              <div class="card-body">


                  <table class="invoice_table table">
                  <thead class="thead noline">
                      <td>Title</td>
                      <td>Quantity</td>
                      <td>Price</td>
                      <td>Totals</td>
                  </thead>
                  <?php foreach ($data['cart']['products']  as $item): ?>

                      <tr>
                          <td><?php echo $item['title'] ?></td>
                          <td><?php echo $item['quantity'] ?></td>
                          <td>PKR <?php echo $item['price'] ?></td>
                          <td>PKR <?php echo ($item['price'] * $item['quantity']) ?></td>
                      </tr>
                  <?php endforeach; ?>

                      <tr class="imp_row imp_row_one noline">
                          <td></td>
                          <td></td>
                          <td><strong>Sub Total</strong></td>
                          <td><?php echo $data['cart']['total'] ?></td>
                      </tr>
                      <tr class="imp_row noline">
                          <td></td>
                          <td></td>
                          <td><strong>Shipping</strong> </td>
                          <td>PKR 0.0</td>
                      </tr>
                      <tr class="imp_row noline">
                          <td></td>
                          <td></td>
                          <td><strong>Total</strong> </td>
                          <td>PKR <?php echo $data['cart']['total'] ?></td>
                      </tr>
                  </table>
              </div>
            
              <h2 class="lined">
                <b></b>
                Choose a payment method
                <b></b>
              </h2>
              
              <!-- credit card section -->
              <div class="tab">
                
                <form method="post" action="<?php echo APPROOT ?>/cart/placeorder" id="payment-form">
                      <div class="form-group mb-1">
                        <label>Personal Info</label>
                        <input type="text" name="name" placeholder="Full Name" required>
                      </div>

                      <!-- <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="name" placeholder="Street" class="mb-1" required>
                        <input type="text" name="name" placeholder="City" class="mb-1" required>
                        <input type="text" name="name" placeholder="Country" class="mb-1" required>
                        <input type="text" name="name" placeholder="Zip Code" class="mb-1" required>
                      </div> -->
                      <div class="form-group mb-1">
                        <label for="card-element">
                          Credit or debit card
                        </label>

                        <div id="card-element">
                          <!-- A Stripe Element will be inserted here. -->
                        </div>  
                      </div>
                      

                      <!-- Used to display form errors. -->
                      <div id="card-errors" role="alert"></div>
                    <input type="submit" name="placeorder" class="btn btn-primary" value="Confirm Order">
                <form>
              </div>

              <!-- cash on delivery section -->
              <div class="tab">
                
              </div>

              <!-- <a href="<?php echo APPROOT ?>/cart/placeorder" class="btn btn-lg btn-success">Confirm Order</a> -->
              

            
        </div>


        <!-- stripe credit card info tokenization -->
        <script type="text/javascript">

          // Create a Stripe client.
          var stripe = Stripe('pk_test_SgWDzFoPInasdlLXWVrfPc5N00BbxsZNJg');

          // Create an instance of Elements.
          var elements = stripe.elements();

          // Custom styling can be passed to options when creating an Element.
          // (Note that this demo uses a wider set of styles than the guide below.)
          var style = {
            base: {
              color: '#32325d',
              fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
              fontSmoothing: 'antialiased',
              fontSize: '16px',
              '::placeholder': {
                color: '#aab7c4'
              }, 
              border: "1px solid lightgray",
              borderRadius: "0px"
            },
            invalid: {
              color: '#fa755a',
              iconColor: '#fa755a'
            }
          };

          // Create an instance of the card Element.
          var card = elements.create('card', {style: style});

          // Add an instance of the card Element into the `card-element` <div>.
          card.mount('#card-element');

          // Handle real-time validation errors from the card Element.
          card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
              displayError.textContent = event.error.message;
            } else {
              displayError.textContent = '';
            }
          });

          // Handle form submission.
          var form = document.getElementById('payment-form');
          form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card)
            .then(function(result) {
              if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
              } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
              }
            });
          });

          // Submit the form with the token ID.
          function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
          } 

        </script>



    <?php } ?>
  </div>
  <?php
  	require_once("views/libs/footer.php");
