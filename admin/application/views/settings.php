<?php 
$this -> load -> view("templates/header");
$this -> load -> view("templates/navbar");
 ?>

 <div class="wrapper flex mt-2">
 	<?php $this -> load -> view("templates/sidebar") ?>
 	<div class="main-body bg-white mx-2 rounded shadow-lg w-full">
 		<?php echo form_open('', array("class" => "pt-12 px-8")); ?>
 		<h2 class="text-2xl font-bold text-gray-800">
 			Site Logo
 		</h2>
 		<!-- TODO:: SITE LOGO -->
		<div class="mt-4">	
			
			<img src="" class="h-48 w-48 bg-gray-300 border block" >
			<label for="site_logo" class="inline-block px-4 py-2 my-3 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white rounded"> Change </label>
			<input type="file" name="" class="invisible" id="site_logo">
			
		</div>

 		</form>
 		<?php echo form_open('', array("class" => "pt-12 px-8")); ?>
 			<h2 class="text-2xl font-bold text-gray-800 py-8">General Settings</h2>
 			<div>	
 				<label class="font-thin w-64 inline-block text-gray-700">Site Title</label>
 				<input type="" name="title" class="bg-gray-100 text-gray-700 border rounded px-2 py-2 shadow w-1/2 text-lg  "
 				value="<?php echo $prefrences['site_title'] ?>">
 			</div>

 			

 			<div class="mt-4">	
 				<label class="font-thin w-64 inline-block text-gray-700">Tag Line</label>
 				<input type="" name="tagline" class="bg-gray-100  text-gray-700 border rounded px-2 py-2 shadow  w-1/2 text-lg"  
 				value="<?php echo $prefrences['site_tagline'] ?>">
 			</div>
 			<div class="mt-4">	
 				<label class="font-thin w-64 inline-block text-gray-700">Site Description</label>
 				<input type="" name="description" class="bg-gray-100 text-gray-700 border rounded px-2 py-2 shadow w-1/2 text-lg  "
 				value="<?php echo $prefrences['site_description'] ?>">
 			</div>
 			<div class="mt-4">	
 				<label class="font-thin w-64 inline-block text-gray-700">E-mail</label>
 				<input type="" name="email" class="bg-gray-100 text-gray-700 border rounded px-2 py-2 shadow w-1/2 text-lg  "
 				value="<?php echo $prefrences['site_email'] ?>">
 			</div>
 			<input type="submit" name="update_config" value="Save Changes" 
 			class="inline-block bg-blue-500 text-white px-4 py-2 my-12 rounded cursor-pointer hover:bg-blue-600">
 		</form>	

 		
 	</div>
 </div>

 <?php $this -> load -> view("templates/footer") ?>