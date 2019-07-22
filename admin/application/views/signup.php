<div class="form_container p-16 m-4 mx-auto bg-white shadow-lg w-2/4 rounded-lg">
	

	<?php echo form_open("signup"); ?>

		<img src="<?php echo base_url() ?>assets/images/padlock.png" class="h-16 w-16 rounded-full border mx-auto mb-8">

		<input type="text" name="username" placeholder="First Name" class="p-2 border block mt-2 w-full rounded" >
		<input type="text" name="username" placeholder="Last Name" class="p-2 border block mt-2 w-full rounded" >
		<input type="text" name="username" placeholder="username" class="p-2 border block mt-2 w-full rounded" >
		<input type="text" name="username" placeholder="Email" class="p-2 border block mt-2 w-full rounded" >

		<input type="password" name="password" placeholder="password" class="p-2 border block mt-2 w-full rounded" >
		
		
		<input type="submit" name="login" value="signup" class="p-2 border block mt-2 w-full rounded bg-blue-500 text-white text-lg 
		font-bold mt-8 hover:bg-blue-300" >
		<p class="mt-2 text-right text-gray-500">Already have an account? <a href="<?php echo base_url(); ?>login.html" class="hover:text-gray-600">login</a></p>


		
	</form>

</div>