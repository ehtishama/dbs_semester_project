<?php 
	$this -> load -> view("templates/header");
	$this -> load -> view("templates/navbar");
?>

<div class="body-wrapper mt-2 flex">
 	<?php $this -> load -> view("templates/sidebar"); ?>

 	<div class="main-content w-full bg-white shadow border mx-2">
 		<table class="">
 			<thead class="border">
 				<th class="p-4 px-6"><input type="checkbox" name=""></th>
 				<th class="px-6">Title</th>
 				<th class="px-6">Category</th>
 				<th class="px-6">Price</th>
 				<th class="px-6">Tags</th>
 			</thead>

 			<tbody class="bg-gray-100">
 				<?php foreach ($products as $product): ?>
 					<tr class="ml-2 border hover:bg-gray-200">
 						<td><input type="checkbox" name=""></td>
	 					<td class="p-6 text-blue-700  w-full">
	 						
	 						<div class="title font-bold text-base">
	 						<?php echo $product['title']; ?>
	 						</div>
	 						<div class="actions mt-1">
	 							<span class="font-200 mr-1">
	 								<a href="
	 								<?php echo base_url() . "update-product/" . $product["id"]; ?>">
	 									Edit
	 								</a>
	 							</span>
	 							<span class="font-200 mr-1"><a href="#">View</a></span>
	 							<span class="font-200 text-red-800"><a href="#">Trash</a></span>
	 						</div>
	 					</td>
	 					<td class="p-6"><?php echo $product['category']; ?></td>
	 					<td class="p-6 font-bold">$<?php echo $product['price']; ?> </td>
	 					<td class="p-6"><?php echo $product['tags']; ?> -- </td>	
 					</tr>
 					
 				<?php endforeach; ?>	
 			</tbody>

 		</table>
 	</div>
 </div>
<?php $this -> load -> view("templates/footer") ?>