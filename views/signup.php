<?php
	require_once("views/libs/header.php");
 ?>
	<div class="w-128 mx-auto bg-white p-8 rounded shadow-lg my-2">
		<?php if (isset($data['success'])) { ?>
			<li class="error success">You account has been created. Please <a href="<?php echo APPROOT ?>/login">Login</a> </li>
		<?php } ?>
		<?php if(isset($data['error'])) { ?>
			<div> There were some errors.</div>
			<ul>
			<?php foreach ($data['errors'] as $error){ ?>
				<li class="error"><?=$error?></li>
			<?php } ?>
			</ul>
		<?php } else {?>

		<?php } ?>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>

		<h3 class="font-black text-gray-800 text-3xl text-center my-3">Create new account</h3>

		<form action="<?php echo APPROOT?>/signup/authenticate" method="post" >
			<div class="social_login">
				
				<div class="google shadow">
					<a href="<?php echo APPROOT ?>/glogin.php" 
						class="block p-2 text-center border border-indigo-600 rounded shadow-lg text-indigo-700">
						Signup using <b>Google</b>
					</a>
				</div>
				<div class="flex my-4">
					<p class="w-full border border-indigo-600 h-px self-center"></p>
					<p class="p-2 text-indigo-600 font-bold text-lg">or</p>
					<p class="w-full border border-indigo-600 h-px self-center"></p>
				</div>
			</div>


			<div class="form_group">
				<label for="first_name">
					First Name
				</label>
				<input type="text" name="first_name" placeholder="Enter Your First Name" value="<?php @print($data['firstname']) ?>"
				class="p-2 border border-gray-400 rounded" 
				>
			</div>


			<div class="form_group">
				<label for="first_name">
					Last Name
				</label>
				<input type="text" name="last_name" placeholder="Enter Your Last Name" value="<?php @print($data['lastname']) ?>"
				class="p-2 border border-gray-400 rounded" 
				>
			</div>


			<div class="form_group">
				<label for="first_name">
					username
				</label>
				<input type="text" name="username" placeholder="Enter a unique username" value="<?php @print($data['username']) ?>"
				class="p-2 border border-gray-400 rounded" 
				>
			</div>

			<div class="form_group">
				<label for="first_name">
					Email
				</label>
				<input type="text" name="email" placeholder="Enter Your Email Address" value="<?php @print($data['email']) ?>"
				class="p-2 border border-gray-400 rounded" >

			</div>


			<div class="form_group">
				<label for="first_name">
					Password
				</label>
				<input type="password" name="password" placeholder="Enter Your Password"
				class="p-2 border border-gray-400 rounded" 
				>
			</div>


			<div class="form_group">
				<label for="first_name">
					Gender
				</label>
				<select name = "gender" class="p-2 text-white bg-gray-500 rounded">
					<option value = "m" class="p-2">Male</option>
					<option value = "f">Female</option>
				</select>
			</div>


			<div class="form_group">
				<div class="g-recaptcha inline-block mx-auto" data-sitekey="6Lc6hqkUAAAAALEupdHrmpN3scSj1RakTIqKCmmm">
					
				</div>
			</div>



			<div class="form_group">
				<input type="submit" value="Register" name="reg"
				class="p-2 border bg-indigo-600 rounded text-white font-bold" 
				>
			</div>
			<div class="extra_links">
				<p>Already have an account? <a href="<?php echo APPROOT; ?>/login">Login</a>
				</p>
			</div>
		</form>
	</div>



	<?php
		require_once("views/libs/footer.php");
