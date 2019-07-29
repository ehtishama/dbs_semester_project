
<h2 class="text-center font-bold text-gray-400 my-8">
	ECOM - version 0.1.0
</h2>
<div class="form_container p-16 m-4 mx-auto bg-white shadow-lg w-1/3 rounded-lg">	
	<?php echo form_open("login") ?>
		<img src="<?php echo base_url() ?>assets/images/padlock.png" class="h-16 w-16 rounded-full border mx-auto mb-8">

		<div class="form_errors">
			<p class="">
				<ul>
					<?php foreach ($errors as $error): ?>
						<li class="text-red-500 font-bold"><?php echo $error ?></li>
					<?php endforeach; ?>
				</ul>
			</p>
		</div>

		<input type="eamil" name="email" placeholder="email" class="p-2 border block mt-2 w-full rounded bg-gray-200" required="">
		<input type="password" name="password" placeholder="password" class="p-2 border block mt-2 w-full rounded bg-gray-200" >
		<p class="text-right text-gray-500 text-sm"><a href="#" class="hover:text-gray-600">Forget Password</a></p>
		
		<input type="submit" name="login" value="login" class="p-2 border block mt-2 w-full rounded bg-blue-500 text-white text-lg 
		font-bold mt-8 hover:bg-blue-300" >
		<p class="mt-2 text-right text-gray-500">don't have an account? <a href="<?php echo base_url() ?>signup.html" class="hover:text-gray-600">sign up now</a></p>


		
	</form>
</div>