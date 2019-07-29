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
					
					<tr class="hover:bg-gray-300 rounded">
						<td class="">
							<div class="w-48 link text-gray-600">
								<a href="<?php echo base_url() . "orders/" . $order['order_id']; ?>" class="mr-2 font-bold text-green-400 hover:text-black">
									Details
								</a>
								<a href="#" class="mr-2  hover:text-black">Update</a>
								<a href="#" class="mr-2 text-red-500">Cancel</a>
							</div>
						</td>
						<td>
							<span class="font-bold"><?php echo $order['order_id'] ?></span>					
						</td>
						
						
						<td class="font-bold w-full">
							<img src="assets/avatar.jpeg" class="inline rounded h-10 w-10 mr-4">
							<span><?php echo $order['first_name'] . " " . $order['last_name'] ?></span>
						</td>
						<td>$<?php echo $order['charges']; ?></td>
						<td>Paid</td>
						<td class="font-bold text-yellow-600 <?php echo $order['status'] ?>">
							<?php echo $order['status'] ?>		
						</td>
					</tr>
				
				<?php endforeach; ?>
				</tbody>
				

			</table>
		
 	</div>
 </div>



 <?php $this -> load -> view("templates/footer"); ?>