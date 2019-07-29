<?php 
	
	$this -> load -> view('templates/header');
	$this -> load -> view('templates/navbar');
 ?>


<div class="wrapper mt-2 flex">
	<?php $this -> load -> view('templates/sidebar'); ?>

	<div class="main-body bg-white w-full mx-2 shadow rounded">
		<?php 
			if (isset($_SESSION['success'])){
				$this -> load -> view("templates/successbar");
			} 
		?>


		<?php foreach($processors as $processor): ?>
			<div class="processor p-4">
				<h2 class="text-lg font-bold mb-4 text-gray-700">
					<?php echo $processor['name'] ?>

				</h2>

				<div class="properties">
					<?php echo form_open('payments/update'); ?>
						<?php foreach ($processor['properties'] as $property): ?>
							<label class="text-gray-700">
								<?php echo $property['property'] ?>
							</label>

							<input type="text" 
							name="property[<?php echo $property['property'] ?>]"
							class="bg-gray-200 p-2 block rounded mb-2 text-gray-600"
							value="<?php echo $property['value']?>" 
							>		
							
						<?php endforeach ?>

						<input type="hidden" name="proc_id" value="<?php echo $processor['proc_id'] ?>">
						<input type="submit" name="update-payment-processor" 
						class="block px-4 p-2 bg-green-400 text-white" value="update">
					</form>


				</div>
			</div>
		<?php endforeach; ?>



	</div>



</div>

 <?php $this -> load -> view('templates/footer'); ?>