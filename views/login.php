<?php
	require_once("views/libs/header.php");
 ?>

	<div class="p-8 m-2 bg-white shadow-lg w-med mx-auto rounded-lg">
		<form method="post" action="<?php echo APPROOT ?>/login/auth/<?=@$data['query']?>" 
			class=" mx-auto"
			>
			<div class="logo">
				<div class="w-32 mx-auto">
					<a href="<?php echo APPROOT ?>">
						<img src="<?php echo APPROOT ?>/views/assets/logo_black.png">
					</a>
				</div>
			</div>
			<div class="error">
				<?php if(isset($data['error'])){ ?>
					<p><?php echo $data['errors'][0] ?></p>
				<?php } ?>
			</div>
	
		

			<div class="form_group">
				<input type="text" name="username" placeholder="username" required="required"
				class="p-4 border border-gray-400 rounded" 
				>
			</div>

			<div class="form_group">
				<input type="password" name="password" placeholder="password" required="required"
				class="p-4 border border-gray-400 rounded"
				>
			</div>

			<div class="form_group">
				<input type="checkbox" name="remember_me" class="inline w-4" id="remember_me">
				<span class="ml-1 inline-block text-gray-600 font-semibold cursor-pointer">
					<label for="remember_me">remember me</label>
				</span>
			</div>
			<div class="form_group">
				<input type="submit" value="Login" name="login" 
				class="block bg-indigo-600 rounded shadow-md text-white font-bold p-4 
				cursor-pointer hover:bg-indigo-700">
			</div>

			
			<div class="">
				<p class="text-right text-sm text-gray-600">Don't have an account? 
					<a href="<?php echo APPROOT; ?>/signup"
						class = "inline-block bg-gray-600 text-white text-center rounded-full px-2 shadow-md"
						>Register Now
					</a>
				</p>
			</div>
		</form>
		<div class="social_login">
			<p class="text-center font-black text-gray-600 my-6">OR</p>
			<div class="google shadow-lg">
					<a href="<?php echo APPROOT ?>/glogin.php" 
						class="block p-4 text-center w-full rounded shadow-lg border border-indigo-700 text-indigo-700 hover:bg-gray-300"
					>
						Login using <b>Google</b>
					</a>
			</div>		
		</div>
	</div>

	<?php
		require_once("views/libs/footer.php");
