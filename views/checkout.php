<?php
  require("views/libs/header.php");
?>

<?php  if(isset($_SESSION['error'])): ?>
<div class="bg-red-200 p-4 container mx-auto shadow my-2">
	<p class="text-red-600">
		<?php echo m_get_flashdata("error"); ?>
	</p>
</div>
<?php endif; ?>

<div class="container mx-auto my-2 py-8 pt-16 bg-white flex justify-around">
	<div class="w-1/3">
		<form id="payment-form" method="post" action="<?php echo APPROOT . "/cart/placeorder" ?>"
			class="checkoutform"
			>
			<!-- Billing Details -->
			<div class="text-gray-700">
				<h2 class="text-lg font-bold mb-2">Shipping Details</h2>
				<div class="mt-2">
					<label class="text-gray-600">Phone Number</label>
					<input type="text" name="phone" class="rounded border-2 focus:border-blue-300" placeholder="XXXX-XXXXXXX" required
					value="<?php echo  m_get_form_values('phone') ?>">
				</div>

				<div class="mt-2">
					<label class="text-gray-600">Address</label>
					<input type="text" name="address1" class="rounded border-2 focus:border-blue-300" placeholder="Street" required
					value="<?php echo  m_get_form_values('street') ?>">
					<input type="text" name="address2" class="mt-2 rounded border-2 focus:border-blue-300" placeholder="Optional">
				</div>

				<div class="mt-2">
					<label class="text-gray-600">City</label>
					<input type="text" name="city" class="rounded border-2 focus:border-blue-300" placeholder="City" required
					value="<?php echo  m_get_form_values('city') ?>">
				</div>



				<div class="mt-2">
					<label class="text-gray-600">Country</label>
					<input type="text" name="country" class="rounded border-2 focus:border-blue-300" placeholder="Country" required
					value="<?php echo  m_get_form_values('country') ?>">
				</div>
				<div class="flex">
					<div class="mt-2 mr-2">
						<label class="text-gray-600">Postal Code</label>
						<input type="text" name="postal" class="rounded border-2 focus:border-blue-300" placeholder="Postal Code" required
						value="<?php echo  m_get_form_values('postal_code') ?>">
					</div>

					<div class="mt-2">
						<label class="text-gray-600">State</label>
						<input type="text" name="state" class="rounded border-2 focus:border-blue-300" placeholder="State" required
						value="<?php echo  m_get_flashdata('phone') ?>">
					</div>
				</div>
			</div>

			<!-- Payment Method -->
			<div class="mt-8 text-gray-700">
				<h2 class="text-lg font-bold my-2">Payment Method</h2>
				<div class="bg-gray-200 rounded p-3 mb-8 border-2 border-blue-400 flex">
					<input type="radio" name="" class="w-1 mr-2" checked="">
					<p class="font-bold ">Credit Card</p>
				</div>

				<div id="card-element" class="rounded border-2 focus:border-blue-300 mt-8 p-3">
			          <!-- A Stripe Element will be inserted here. -->
	            </div>  
	            <div id="card-errors" role="alert" class="text-red-400">
		             <!-- Used to display form errors. -->
	            </div>

				<input type="submit" name="" value="Place order" class="p-4 mt-8 bg-green-400 text-white text-lg font-bold border-0
				hover:bg-green-500 cursor-pointer shadow-lg rounded 
				">
			</div>
		</form>
	</div>

	<!-- cart summary -->
	<?php  if(isset($_SESSION['cart'])): ?>
	<div class="w-1/3 relative">
		<div class="border-2 border-gray-500 rounded p-8">
			<h2 class="font-bold text-lg text-gray-800">
				Order Summary
			</h2>
	      <?php foreach ($data['cart']['products']  as $item): ?>
	          <div class=" font-bold text-gray-700 mb-3">
	              <div class="flex justify-between py-3 border-b">
	              	<div>
		              	<?php echo $item['quantity'] ?> x <?php echo $item['title'] ?>		
	              	</div>
	              	<div class="inline-block ml-4">$ <?php echo $item['price'] ?></div>
	     
	              </div>
	          </div>
	      <?php endforeach; ?>
	          <div class="">
	              <p class="text-gray-600 font-bold">
	              	<span class="text-gray-700">Total</span>
	              	$ <?php echo $data['cart']['total'] ?>
	              </p>
	          </div>
	     </div>
	</div>
	<?php endif; ?>
</div>

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
                color: 'gray'
              }, 
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
<?php require("views/libs/footer.php") ?>  