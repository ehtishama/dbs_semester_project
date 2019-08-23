<?php 
	$this -> load -> view("templates/header");
	$this -> load -> view("templates/navbar");
 ?>


<div class=" mt-1 wrapper flex">
	<?php $this -> load -> view("templates/sidebar"); ?>
	<div class="main-body w-full bg-white mx-2 rounded shadow p-8">
		<?php $this -> load -> view("templates/successbar") ?>



		<section class="profile mb-8">
			<img src="<?php echo base_url() ?>assets/avatar.jpeg" class="w-32 h-32 rounded-full block mb-8 mx-auto">
			<div class="flex">
				<div class="basic-info w-1/2">
					
					<p class="font-bold mb-2 text-gray-800"># Customer Info</p>
							
							<p class="name">
								<span class="w-24 inline-block text-gray-600">
									name
								</span>	
								<?php echo $profile['first_name'] . ' ' . $profile['last_name']; ?>
							</p>
							
							<p class="email">
								<span class="w-24 inline-block text-gray-600">email</span>	
								<?php echo $profile['email'] ?>
							</p>
							<p class="payment">
								<span class="w-24 inline-block text-gray-600">
								username
								</span>	
								<?php echo $profile['username'] ?>
							</div>
				<div class="address flex-grow">
					<p class="font-bold mb-2 text-gray-800"># Customer Address</p>
							<p class="street">
								<span class="w-16 inline-block text-gray-600">
									street
								</span>
								<?php echo $profile['street'] ?>
							</p>
							<p class="city"><span class="w-16 inline-block text-gray-600">city</span>	<?php echo $profile['city'] ?>
							</p>
							<p class="state"><span class="w-16 inline-block text-gray-600">postal</span>	<?php echo $profile['postal_code'] ?></p>
							<p class="country"><span class="w-16 inline-block text-gray-600">country</span>	<?php echo $profile['country'] ?>
						</p>
				</div>
			</div>

			<div class="send_message mt-8">
				<h2 class="text-lg font-bold mb-2">
					Send message
				</h2>
				<?php echo form_open('users/send-mail/' . $profile['id']); ?>
					<textarea class="bg-gray-300 w-full rounded border block mb-2 h-64 p-4" name="msg"></textarea>
					<p class="text-gray-500 text-sm mb-2">
						An email, containing your message, will also be sent to the customer.
					</p>
					<input type="submit" name="message" value="send" 
					class="bock w-full bg-blue-500 p-2 text-white rounded hover:bg-blue-400"
					>
					<input type="hidden" name="email" value="<?php echo $profile['email'] ?>">
				</form>
			</div>
		</section>

		<div>
			<div class="accordian text-gray-800 border">
				<h2 class="border-b text-lg font-bold p-4">Orders by this cutomer</h2>
				<table class="">
					<thead class="ronded-full bg-gray-100">
						
						<th></th>
						<th>Order Id</th>
						<th>Charges</th>
						<th>Status</th>

					</thead>
					<tbody>
					<?php foreach($orders as $order): ?>
						
						<tr class="hover:bg-gray-300 rounded">
							<td class="">
								<div class="w-48 link text-gray-600">
									<a href="<?php echo base_url() . "orders/" . $order['id']; ?>" class="mr-2 font-bold text-white hover:text-gray-200">
										<button class="p-1 bg-green-300 hover:bg-green-500">
											Details
										</button>
									</a>
									<a href="#" class="mr-2 text-white hover:text-gray-200">
										<button class="p-1 bg-blue-300 hover:bg-blue-500">
											Update	
										</button>
										
									</a>
									<a href="#" class="mr-2 text-white hover:text-gray-200">
										<button class="p-1 bg-red-300 hover:bg-red-500">
											Cancel
										</button>
										
									</a>
								</div>
							</td>
							<td>
								<span class="font-bold"><?php echo $order['id'] ?></span>					
							</td>
							
							
							
							<td>$<?php echo $order['charges']; ?></td>
							
							<td class="font-bold text-yellow-600 <?php echo $order['status'] ?>">
								<?php echo $order['status'] ?>		
							</td>
						</tr>
					
					<?php endforeach; ?>
					</tbody>
				

				</table>
			</div>
		</div>
	</div>
</div>


 <?php $this -> load -> view("templates/footer"); ?>