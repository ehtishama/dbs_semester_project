<?php 
	$this -> load -> view("templates/header");
	$this -> load -> view("templates/navbar");
 ?>

 <div class="body-wrapper flex mt-2">
 	<?php $this -> load -> view("templates/sidebar"); ?>
 	<div class="main-content mx-2 bg-white shadow border w-full p-4">
			<h2 class="font-bold w-full p-2 text-xl text-gray-700">Pending #</h1>

			<table class="">
				<thead class="ronded-full bg-gray-400">
					<th>#</th>
					<th>Id</th>
					<th>Customer</th>
					<th>Bill</th>
					<th>Payment</th>
					<th>Delivery</th>
				</thead>
				<tbody>
				<?php foreach($orders as $order): ?>
					<tr>
						<td class="">
							<div class="w-48 link text-gray-600">
								<a href="#" class="model-action mr-2  hover:text-black" 
								data-target="<?php echo $order['id'] ?>">
									Details
								</a>
								<a href="#" class="mr-2  hover:text-black">Update</a>
								<a href="#" class="mr-2 text-red-500">Cancel</a>
							</div>

							<div 
							class="modal bg-white shadow-2xl rounded border border-gray-500 p-16 w-3/4 mx-auto  m-2" 
							id="<?php echo $order['id'] ?>" style="display: none;">
								<a href="#">
									<span class="modal-cross block text-right text-gray-800 font-thin text-lg" 
									data-target="<?php echo $order['id'] ?>">x</span>
								</a>

								<div class="container text-gray-800" id="order-model">

									<p class="order-id text-lg font-bold">Order ID # 
										<span class="text-gray-700 text-sm font-normal">xyz1234</span>
									</p>
									<hr>
									<div class="flex mt-4">
										<div class="customer-info w-1/2">
											<p class="font-bold mb-2 text-gray-800">Customer Info</p>
											<p class="name"><span class="w-16 inline-block text-gray-600">name</span>	Ehtisham</p>
											<p class="email"><span class="w-16 inline-block text-gray-600">email</span>	ehtisham@email.com</p>
											<p class="payment"><span class="w-16 inline-block text-gray-600">paid</span>	$100</p>
										</div>
										<div class="customer-address w-1/2">
											<p class="font-bold mb-2 text-gray-800">Address Info</p>
											<p class="street"><span class="w-16 inline-block text-gray-600">street</span>	ome street in some country</p>
											<p class="city"><span class="w-16 inline-block text-gray-600">city</span>	Attock</p>
											<p class="state"><span class="w-16 inline-block text-gray-600">state</span>	Punjab</p>
											<p class="country"><span class="w-16 inline-block text-gray-600">country</span>	Pakistan</p>
										</div>
									</div>

									<div class="container text-gray-800 mt-4">
										<p class="font-bold mb-4 text-gray-800">Ordered Products</p>
										<table class="">
											<thead class="ronded-full bg-gray-400">
												<th>#</th>
												<th>Product Id</th>
												<th>Product Name</th>
												<th>Quantity</th>
												<th>sub Total</th>
												<th>Status</th>
												<th></th>
											</thead>
											<tbody>
												<tr>
													<td class="">1</td>
													<td>123</td>
													<td class="font-bold w-1/2">
														<img src="assets/avatar.jpeg" class="inline rounded h-10 w-10 mr-4">
														<span>some pretty product</span>
													</td>
													<td>20</td>
													<td>$12</td>
													<td><span class="text-red-600 font-bold">Not Delivered</span></td>
													<td><button class="bg-green-500 text-white inline-block p-2 rounded">Update</button></td>
												</tr>
											
											</tbody>
											

										</table>

										
									</div>
								</div>
							</div>

						</td>
						<td>
							<span class="font-bold"><?php echo $order['id'] ?></span>					
						</td>
						
						
						<td class="font-bold w-full">
							<img src="assets/avatar.jpeg" class="inline rounded h-10 w-10 mr-4">
							<span><?php echo $order['customer_id'] ?></span>
						</td>
						<td><?php echo $order['charges']; ?></td>
						<td>Paid</td>
						<td>Pending</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
				

			</table>
		
 	</div>
 </div>



 <?php $this -> load -> view("templates/footer"); ?>