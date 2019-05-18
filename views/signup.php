<?php
	require_once("views/libs/header.php");
 ?>
	<div class="sign_up_form">
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
		<h3 class="heading">Create Your Account</h3>
		<form action="<?php echo APPROOT?>/signup/authenticate" method="post">

			<div class="form_group">
				<label for="first_name">
					First Name
				</label>
				<input type="text" name="first_name" placeholder="Enter Your First Name" value="<?php @print($data['firstname']) ?>">
			</div>


			<div class="form_group">
				<label for="first_name">
					Last Name
				</label>
				<input type="text" name="last_name" placeholder="Enter Your Last Name" value="<?php @print($data['lastname']) ?>">
			</div>


			<div class="form_group">
				<label for="first_name">
					username
				</label>
				<input type="text" name="username" placeholder="Enter a unique username" value="<?php @print($data['username']) ?>">
			</div>

			<div class="form_group">
				<label for="first_name">
					Email
				</label>
				<input type="text" name="email" placeholder="Enter Your Email Address" value="<?php @print($data['email']) ?>">
			</div>


			<div class="form_group">
				<label for="first_name">
					Password
				</label>
				<input type="password" name="password" placeholder="Enter Your Password">
			</div>


			<div class="form_group">
				<label for="first_name">
					Gender
				</label>
				<select name = "gender">
					<option value = "m">Male</option>
					<option value = "f">Female</option>
				</select>
			</div>


			<div class="form_group">
				<input type="submit" value="Sign UP" name="reg">
			</div>

			<div class="social_login">
				<p>or</p>
				<div class="google">
					<a href="<?php echo APPROOT ?>/glogin.php">
						<img src="<?php echo APPROOT ?>/views/assets/glogin.png" alt="">
					</a>
				</div>

			</div>

			<div class="extra_links">
				<p>Already have an account? <a href="<?php echo APPROOT; ?>/login">Login</a>
				</p>
			</div>


		</form>
	</div>



	<?php
		require_once("views/libs/footer.php");
