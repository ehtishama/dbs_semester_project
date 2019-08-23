<?php
	require_once("views/libs/header.php");
 ?>

	<div class="sign_up_form flex">
		<form method="post" action="<?php echo APPROOT ?>/login/auth/<?=@$data['query']?>" class="w-1/2">
			<div class="error">
				<?php if(isset($data['error'])){ ?>
					<p><?php echo $data['errors'][0] ?></p>
				<?php } ?>
			</div>
	
		

			<div class="form_group">
				<input type="text" name="username" placeholder="username" required="required">
			</div>

			<div class="form_group">
				<input type="password" name="password" placeholder="password" required="required">
			</div>


			<div class="form_group">
				<input type="submit" value="Login" name="login" 
				class="block bg-gray-600 rounded shadow-md text-white font-bold py-2 px-4 cursor-pointer">
			</div>

			
			<div class="mt-16">
				<p>Don't have an account? 
					<a href="<?php echo APPROOT; ?>/signup"
						class = "block px-4 py-2 bg-gray-600 text-white text-center font-bold rounded shadow-md"
						>Register Now
					</a>
				</p>
			</div>
		</form>
		<div class="verticleline w-px mx-4 border"></div>
		<div class="social_login w-1/2 mt-4">
		
			<div class="google">
					<a href="<?php echo APPROOT ?>/glogin.php" 
						class="bg-blue-600 block px-4 py-2 text-white text-center w-full rounded shadow-md hover:bg-blue-700"
					>
						Login using <b>Google</b>
					</a>
			</div>		
		</div>
	</div>

	<?php
		require_once("views/libs/footer.php");
