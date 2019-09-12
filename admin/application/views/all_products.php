<?php 
	$this -> load -> view("templates/header");
	$this -> load -> view("templates/navbar");
?>

<div class="body-wrapper mt-2 flex">
 	<?php $this -> load -> view("templates/sidebar"); ?>

 	<div class="main-content w-full bg-white shadow border mx-2">
 		<table class="">
 			<thead class="border">
 				<th class="p-6"><input type="checkbox" name=""></th>
 				
 				<th class="p-6">Title</th>
 				<th class="p-6">Category</th>
 				<th class="p-6">Price</th>
 				<th class="p-6">Status</th>
 			</thead>

 			<tbody class="bg-gray-100">
 				


 				<?php foreach ($products as $product): ?>
 					

 					<tr class="ml-2 border hover:bg-gray-300">
 						<td class="p-6"><input type="checkbox" name=""></td>
	 					<td class="p-6 text-blue-700  w-2/3">
	 						
	 						<div class="title font-bold text-base">
	 							<img src="<?php echo $product['image']; ?>" class="h-8 w-8 mx-auto">
	 							<?php echo $product['title']; ?>
	 						
	 						</div>
	 						<div class="actions mt-1">
	 							<span class="font-200 mr-1">
	 								<a href="
	 								<?php echo base_url() . "update-product/" . $product["id"]; ?>">
	 									Edit
	 								</a>
	 							</span>
	 							<span class="font-200 mr-1">
	 								<a href="
	 								<?php  echo m_URL . "/products/product/" . $product["id"] ?>
	 								" target="blank">
	 									View
	 								</a>
	 							</span>
	 							<span class="font-200 text-red-800">
	 								<a href="#"
	 								 	data-p_id = "<?php echo $product['id'] ?>" 
	 									data-target="product-trash-modal-<?php echo $product['id']?>" data-action="modal">
	 										Trash
	 								</a>
	 							</span>
	 						</div>
	 					</td>
	 					<td class="p-6 w-1/3"><?php echo $product['category']; ?></td>
	 					<td class="p-6 font-bold">$<?php echo $product['price']; ?> </td>
	 					<td class="p-6 font-bold capitalize"><?php echo $product['status']; ?> </td>
	 					
 					</tr>
 					
 					<!-- modal -->
 				<div class="modal modal_hide" id="product-trash-modal-<?php echo $product['id'] ?>">
					<div class="modal_dialog rounded-lg">
						<p class="modal_top font-bold text-gray-800">
							Please Cofirm
						</p>
						<div class="modal_body p-4">
							<p class="moal_content pb-2">Are you sure, this product will be deleted?</p>
							<div class="action_button self-end">
								<a href="#"
								class="inline-block p-2 px-4 bg-gray-600 text-white rounded shadow" data-close="modal">Cancel</a>
								<a 
								class="inline-block p-2 px-4 bg-red-600 text-white rounded shadow" 
								id="product_modal_delete_btn"
								href="<?php echo base_url() . 'delete-product/'.$product['id'] ?>"
								>
									Delete
								</a>
							</div>
						</div>
					</div>
				</div> <!-- modal ends -->
 				<?php endforeach; ?>	
 			</tbody>

 		</table>
 	</div>
 </div>
 <script type="text/javascript">
 	window.onload=function()
 	{
 		let productDeleteBtns = document.querySelectorAll(".productDeleteButton")
	 	productDeleteBtns.forEach(btn => {
	 		btn.addEventListener("click", event => {
	 			let p_id = event.target.dataset.p_id
	 			p_deleteModal = document.getElementById("product-trash-modal")
		 		console.log(p_id)
		 		
		 		document.getElementById("product_modal_delete_btn").innerHTML = p_id
		 		displayModal("product-trash-modal")
	 		})
	 		
	 	})


 	}
 	
 </script>
<?php $this -> load -> view("templates/footer") ?>