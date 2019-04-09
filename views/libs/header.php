<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="https://fonts.googleapis.com/css?family=Anton|Varela+Round" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="<?php echo APPROOT ?>/views/libs/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

	<div class="header">
		<div class="header_upper">
			<div class="logo">
				<a href="<?php echo APPROOT ?>">

					<img class="logo_img" src="<?php echo APPROOT ?>/views/assets/logo.png">
				</a>
			</div>

			<div class="search_bar">
				<input type="text" name="search" placeholder="search">
				<input type="submit" value="search">
			</div>

			<div class="cart_logo">
				<i class="fas fa-shopping-cart"></i>
			</div>
			<div class="login">

					<a href="<?php echo APPROOT ?>/signup">Register </a>or
					<a href="<?php echo APPROOT ?>/login"> Login</a>

			</div>

		</div>

		<div class="header_lower">
			<ul>
				<li><a href="#">Shop By Department</a></li>
				<li><a href="#">Phones and Tablets</a></li>
				<li><a href="#">Cameras</a></li>
				<li><a href="#">TV and Video</a></li>
				<li><a href="#">Home Appliances</a></li>
				<li><a href="#">Shop By Department</a></li>
				<li><a href="#">Copmuters and Laptops</a></li>
				<li><a href="#">Daily Deals</a></li>
			</ul>
		</div>
	</div>
