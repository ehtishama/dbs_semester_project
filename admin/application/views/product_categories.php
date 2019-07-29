<?php 
	$this -> load -> view("templates/header");
	$this -> load -> view("templates/navbar");
 ?>


<div class="wrapper flex mt-2">
	<?php $this -> load -> view("templates/sidebar") ?>

	<div class="main-body mx-2 p-4 bg-white border shadow w-full">

		<?php if(isset($_SESSION['success'])): ?>
		<div class="success p-4 bg-green-200 text-green-500 text-center rounded  ">
			<p>
				<?php echo $this->session->flashdata('success'); ?>
			</p>	
		</div>
		<?php endif; ?>


		<?php if(isset($_SESSION['error'])): ?>
		<div class="error p-4 bg-red-200 text-red-500 text-center rounded ">
			<p>
				<?php echo $this->session->flashdata('error'); ?>
			</p>
		</div>
		<?php endif; ?>



		<div class="add-category bg-gray-100 p-4 m-4 mx-auto border rounded w-2/3 ">
			<h2 class="text-lg font-bold text-gray-700 mb-2">Add new category</h2>
			<?php echo form_open('categories/insert', array("class" => "flex justify-between")); ?>
			
				<input type="text" name="cat-name" placeholder="Category Name" class="bg-gray-200 p-2 rounded">
				<select name="cat-parent" class="bg-gray-200 p-2 rounded">
					<option value="NULL">Parent, select if applies</option>
					<?php foreach($categories as $category): ?>
					<option value="<?php echo $category['category_id'] ?>" 

					><?php echo $category['category'] ?></option>
					<?php endforeach; ?>
				</select>
				<input type="hidden" name="insert-category" value="1">
				<button type="submit" class="inline-block p-2 px-8 font-thin bg-green-400 text-white rounded">Add</button>
			</form>
		</div>
			
		<div class="categories-table">
			<table>
				<thead class="bg-gray-700 text-white">
					<th class="text-lg font-bold">#</th>	
					<th class="text-lg font-bold">Category Name</th>	
					<th class="text-lg font-bold">Parent Category</th>	
					<th class="text-lg font-bold"><a></a></th>
					<th></th>	
						
				</thead>

				<tbody>
					<?php 
						$count = 1;
						foreach($categories as $category): ?>

					<tr class="bg-gray-100 hover:bg-gray-200">
						<?php echo form_open('categories/update'); ?>
	 					<td class="text-lg text-gray-700"><?php echo $count ?></td>	
	 					<td class="text-lg text-gray-700">

	 						<input type="text" name="cat-name" 
	 						value="<?php echo $category['category'] ?>" 
	 						class="bg-white p-2 rounded border block">

	 						<input type="hidden" name="cat-id" 
	 						value="<?php echo $category['category_id'] ?>">
	 						<input type="hidden" name="update-category" value="update">
	 					</td>
	 					<td class="text-lg text-gray-700"><?php echo $category['parent_category'] ?></td>
	 					<td class="text-lg text-gray-700">
	 						<button type="submit" class="text-blue-400">
	 							Update  
	 						</button>
	 						
	 					</td>
	 					<td>
	 						<a href="
	 						<?php 
	 						echo base_url() . "categories/remove/" . $category['category_id'];
	 						?>"
	 						class="text-red-500 text-lg">Remove</a>
	 					</td>
						</form>
					</tr>

					<?php
						$count ++; 
						endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

 <?php $this -> load -> view("templates/footer") ?>