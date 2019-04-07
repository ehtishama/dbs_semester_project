<?php 
	require_once("views/libs/header.php");
 ?>
	<div class="sign_up_form">
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
				<input type="text" name="first_name" placeholder="Enter Your First Name">
			</div>
			

			<div class="form_group">
				<label for="first_name">
					Last Name
				</label>
				<input type="text" name="last_name" placeholder="Enter Your Last Name">
			</div>


			<div class="form_group">
				<label for="first_name">
					username
				</label>
				<input type="text" name="username" placeholder="Enter a unique username">
			</div>

			<div class="form_group">
				<label for="first_name">
					Email
				</label>
				<input type="text" name="email" placeholder="Enter Your Email Address">
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

		</form>
	</div>
</body>
</html>