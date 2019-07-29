<?php 
	
	$this -> load -> view("templates/header");
	$this -> load -> view("templates/navbar");

?>

<div class="flex mt-2">
	<?php $this -> load -> view("templates/sidebar"); ?>

	<div class="main_area shadow border bg-white w-full flex p-4 mx-2">

		
		<section class="services-table mt-8 mr-4 w-full">
			<h2 class="text-lg font-bold text-gray-800">
				Shipment Carriers:
			</h2>
			<table class=" mt-4 bg-gray-800">
	 			<thead class="border text-gray-100">
	 				<th class="px-3">#</th>
	 				<th class="px-3">Service Name</th>
	 				<th class="px-3">Logo</th>
	 				<td></td>
	 				
	 				
	 			</thead>

	 			<tbody class="bg-gray-400">
	 				<?php foreach ($shipment_services as $service): ?>
	 					
	 					<tr class="ml-2 border hover:bg-gray-200">
	 						<td class="p-3">1</td>
		 					<td class="p-3 text-blue-700 font-bold">
		 						<?php echo $service['company_name'] ?>
		 					</td>
		 					<td class="p-3">
		 						<img src="<?php echo base_url() . $service['logo'] ?>" 
		 						class="w-8 h-8 rounded-full"
		 						>
		 					</td>
		 					<td><a href="#" class="text-blue-700 underline">Edit</a></td>
		 						
	 					</tr>
	 				<?php endforeach;  ?>
	 			</tbody>

	 		</table>
		</section>

		<section class="add-new-carrier p-8 border bg-gray-200 w-1/3">
			<div>
				<?php echo validation_errors(); ?>
			</div>

			<?php if(isset($error)): ?>
				<div class="bg-red-200 text-center p-4 mx-2">
					<p><?php echo $error ?></p>
				</div>
			<?php elseif(isset($success)): ?>
				<div class="bg-green-200 text-center p-3 mx-2">
					<p><?php echo $success ?></p>
				</div>
			<?php endif;?>
			<h2 class="text-lg font-bold mb-4 text-gray-800">Add new shipment service</h2>
			<?php echo form_open_multipart("shipping/add-new-carrier") ?>
				<div class="form-group mb-4">
					<label class="text-gray-800">Service Name</label>
					<input type="text" name="service_name" 
					class="bg-gray-300 p-2 block rounded"  placeholder="Service Name" required>	
				</div>
				
				<div class="form-group mb-4">
					<label class="text-gray-800" 
					>Service Logo</label>
					<input type="file" name="service_logo" 
					class="p-2 block" placeholder="Logo" required>
					
				</div>

				<input type="submit" name="add-service" value="Add Service"
					class="inline-block p-2 bg-gray-300 rounded hover:bg-blue-400">

			</form>
		</section>
		
		

	</div>
</div>

 <?php $this -> load -> view("templates/footer"); ?>
