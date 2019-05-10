<?php
	require_once("views/libs/header.php");
 ?>

	<div class="sign_up_form">
		<h3 class="heading">Login to your Account</h3>

		<form method="post" action="<?php echo APPROOT ?>/login/auth/<?=@$data['query']?>">
			<div class="error">
				<?php if(isset($data['error'])){ ?>
					<p><?php echo $data['errors'][0] ?></p>
				<?php } ?>
			</div>
			<div class="form_group">
				<input type="text" name="username" placeholder="username">
			</div>

			<div class="form_group">
				<input type="password" name="password" placeholder="password">
			</div>


			<div class="form_group">
				<input type="submit" value="Login">
			</div>

			<div class="extra_links">
				<p>Don't have an account? <a href="<?php echo APPROOT; ?>/signup">Register</a>
				</p>
			</div>

		</form>
	</div>

	<?php
		require_once("views/libs/footer.php");
