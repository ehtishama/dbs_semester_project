<?php 

	$this -> load -> view("templates/header");
	$this -> load -> view("templates/navbar");

 ?>

<div class="wrapper bg-gray-300 flex mt-2">
	<?php $this -> load -> view("templates/sidebar") ?>
	<div class="main-body w-full shadow border bg-white mx-2">
		<div class="bg-white rounded px-8 mx-auto  mt-4">
			<a href="javascript:history.back()">
				<img src="<?php echo base_url() ?>/assets/images/back.png" class="block mb-4 h-8 w-8 rounded-full border hover:border-gray-500">
			</a>


			<?php if(isset($success)): ?>
					<div class="p-8 bg-green-200 text-green-600 text-center my-2">
						<?php echo $success; ?>
					</div>
				<?php endif; ?>
			<div class="mb-16 flex">
					<button class="inline-block px-8 p-2 bg-pink-600 text-white rounded hover:bg-pink-300">
						Cancel Order
					</button>
					<button class="inline-block px-8 p-2 bg-blue-600 text-white ml-auto rounded hover:bg-blue-300">
						Refund
					</button>

				</div>

			<div class="container text-gray-800" id="order-model">
				
				<p class="order-id text-lg font-bold mb-2"># Order ID  
					<span class="text-gray-700 text-sm font-normal">
						<?php echo $order['order_id'] ?>							
					</span>
				</p>

				<div class="flex mb-4">
					<div class="update-order-staus p-4 mb-4 mr-2 border bg-gray-200 rounded">
						<h2 class="text-lg font-bold text-gray-800 mb-4">Order Status</h2>
						<?php echo form_open("orders/update-status/" . $order['order_id']) ?>
							<select class="bg-white block text-lg p-2 mb-4 w-full" name="status">
								
								<option value="<?php echo $order['status'] ?>" selected>
									<?php echo $order['status'] ?>		
								</option>

								<option value="pending">Pending</option>
								<option value="proccessing">Processing</option>
								<option value="delivered">Delivered</option>
								<option value="completed">Completed</option>
								<option value="accepted">Accepted</option>
							</select>

							<button type="submit" name="update-order" class="inline-block px-8 py-2 bg-green-600 text-white rounded w-full hover:bg-green-500" value="Update order status">
								Update order status
							</button>
						</form>
					</div>

					<div class="update-order-staus p-4 mb-4 border bg-gray-200 rounded flex-grow">
						<h2 class="text-lg font-bold text-gray-800 mb-4">Shipping Details</h2>
						
					<?php if(isset($shipments) && count($shipments)  > 0): ?>
						<table class="border border-gray-500 mb-8">
							<thead class="border border-gray-500">
								<th>Carrier Name</th>
								<th>Logo</th>
								<th>Shipped Date</th>
								<th>Tracking #</th>
								<th></th>
							</thead>
							<tbody>
							<?php foreach($shipments as $shipment): ?>
								<tr>
									<td><?php echo $shipment['company_name'] ?></td>
									<td><img src="<?php echo base_url() ?>/assets/avatar.jpeg" class="h-8 w-8 rounded"></td>
									<td><?php echo $shipment['shipped_date'] ?></td>
									<td><?php echo $shipment['tracking_id'] ?></td>
									<td>
										<a href="#" class="text-blue-600 text-underline">Edit</a>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					<?php else: ?>
						<div class="bg-red-200 p-4 m-4">
							<p class="text-red-800">
								You have not added any shippment details yet. <br>
								Add the shipment details below so that the order can be processed.
							</p>
						</div>
					<?php endif; ?>

						<!-- form for adding shipping details -->
						<?php echo form_open("orders/add_shipping/" . $order['order_id'], array("style" => "display:none;", "id" => "add-shipping-carrier")) ?>


							<select name="carrier" class="bg-white p-2 mb-2 rounded block w-full">
								<?php foreach ($shipment_providers as $provider): ?>
									<option value="<?php echo $provider['id'] ?>">
										<?php echo $provider['company_name'] ?>		
									</option>	
								<?php endforeach; ?>
								
							</select>


							<input type="date" name="date" class="bg-white p-2 mb-2 rounded block w-full" required>

							<input type="text" name="tracking_id" placeholder="Tracking Id" class="bg-white p-2 mb-2 rounded block w-full" required>

							<input type="hidden" name="add-shipping-carrier" value="1">
							<button type="submit" class="p-2 bg-green-600 hover:bg-green-500 text-white mb-4 inline-block rounded w-full">
								Submit
							</button>
						</form>

						<button class="inline-block p-2 px-4 bg-green-200 rounded hover:bg-green-500 text-black border border-gray-800 m-4"
						data-action="toggle-display" 
						data-target="add-shipping-carrier"
						>
							+
						</button>
					</div>
				</div>


				<hr>

				<div class="flex mb-4">
					<div class="customer-info w-1/2">
						<p class="font-bold mb-2 text-gray-800"># Customer Info</p>
						
						<p class="name">
							<span class="w-16 inline-block text-gray-600">
								name
							</span>	
							<?php echo $order['first_name'] . ' ' . $order['last_name']; ?>
						</p>
						
						<p class="email"><span class="w-16 inline-block text-gray-600">email</span>	<?php echo $order['email'] ?></p>
						<p class="payment"><span class="w-16 inline-block text-gray-600">paid</span>	$<?php echo $order['charges'] ?></p>
					</div>

					<div class="customer-address w-1/2">
						<p class="font-bold mb-2 text-gray-800"># Shipping Address</p>
						<p class="street">
							<span class="w-16 inline-block text-gray-600">
								street
							</span>
							<?php echo $address['street'] ?>
						</p>
						<p class="city"><span class="w-16 inline-block text-gray-600">city</span>	<?php echo $address['city'] ?>
						</p>
						<p class="state"><span class="w-16 inline-block text-gray-600">postal</span>	<?php echo $address['postal_code'] ?></p>
						<p class="country"><span class="w-16 inline-block text-gray-600">country</span>	<?php echo $address['country'] ?></p>
					</div>
				</div>

				<div class="container text-gray-800 mb-8">
					<p class="font-bold mb-4 text-gray-800"># Invoice Slip</p>
					<table class="border">
						<thead class="">
							<th>#</th>
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>sub Total</th>
							
							
						</thead>
						<tbody>

							<?php foreach ($ordered_products as $ordered_product) :?>	
							
							<tr class="border">
								<td class="">1</td>
								<td><?php echo $ordered_product['id'] ?></td>
								<td class="font-bold w-1/2">
									<img src="<?php echo base_url(); ?>assets/avatar.jpeg" class="inline rounded h-10 w-10 mr-4">
									<span><?php print($ordered_product['title']) ?></span>
								</td>
								<td class="font-bold">
									<?php print($ordered_product['quantity']) ?>		
								</td>
								<td class="font-bold">$<?php echo $ordered_product['charges'] ?></td>
								
						
							<?php endforeach; ?>
							</tr>
							<tr >
								<td></td>
								<td></td>
								<td></td>
								<td class="font-bold  pt-8">Sub Total</td>
								<td class="font-bold  pt-8">$<?php echo $order['charges'] ?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td class="font-bold">Shipment Charges</td>
								<td>0</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td class="font-bold">Total</td>
								<td class="font-bold">$<?php echo $order['charges'] ?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td class="font-bold pt-8">Payment Method</td>
								<td class="font-bold pt-8"></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td class="font-bold">Transaction Id</td>
								<td class="font-bold"></td>
							</tr>
							<tr></tr>

						</tbody>
					</table>
				</div>

				

				
				
			</div>
		</div>
	</div>

</div>


<?php 

	$this -> load -> view("templates/footer");

?>