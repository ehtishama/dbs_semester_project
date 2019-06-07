<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($data['title'])? $data['title'] : 'home' ?></title>
	<link rel="shortcut icon" type="image/ico" href="views/assets/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Anton|Varela+Round" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo APPROOT ?>/views/libs/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo APPROOT ?>/views/libs/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo APPROOT ?>/views/libs/slider/css/style.css">

</head>
<body>

	<div class="header">
		<div class="header_upper">
			<div class="logo">
				<a href="<?php echo APPROOT ?>">
					ecom
				</a>
			</div>

			<div class="search_bar">
												
				<input type="text" name="search" placeholder="search">
				<svg role="img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="searchIconTitle">
    				<title id="searchIconTitle">Search</title>    
    				<path d="M14.4121122,14.4121122 L20,20"/>
    				<circle cx="10" cy="10" r="6"/>
				</svg>
				
			</div>

			<div class="cart_logo">
				<a href="<?php echo APPROOT ?>/cart">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="cartAddIconTitle" stroke="black" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="black"> <title id="cartAddIconTitle">Add do cart</title> 
						<path d="M21.2922 6L19.9463 14.1627C19.8666 14.6457 19.4491 15 18.9596 15H7.04304C6.55355 15 6.136 14.6457 6.05636 14.1627L4.84851 6.83731C4.76887 6.35434 4.35133 6 3.86183 6H2"/> <path d="M8 20C8.55228 20 9 19.5523 9 19C9 18.4477 8.55228 18 8 18C7.44772 18 7 18.4477 7 19C7 19.5523 7.44772 20 8 20Z"/> <path d="M18 20C18.5523 20 19 19.5523 19 19C19 18.4477 18.5523 18 18 18C17.4477 18 17 18.4477 17 19C17 19.5523 17.4477 20 18 20Z"/>
						<path d="M16 8H10"/>
						 <path d="M13 5V11"/>
					</svg>
				</a>
			</div>

			<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){ ?>
			
				<div class="username">
					<a href="<?php echo APPROOT ?>/profile" >
						<svg role="img" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" aria-labelledby="userIconTitle" stroke="black" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="black"> <title id="userIconTitle">User</title>
						 	
						 	<circle cx="12" cy="12" r="10"/>
						 	<path stroke-linecap="round" d="M5.5,19.5 C7.83333333,18.5 9.33333333,17.6666667 10,17 C11,16 8,16 8,11 C8,7.66666667 9.33333333,6 12,6 C14.6666667,6 16,7.66666667 16,11 C16,16 13,16 14,17 C14.6666667,17.6666667 16.1666667,18.5 18.5,19.5"/>
						  	
						 </svg>
					</a>					
					<ul class="dropdown">
					<li>
						<i class="fa fa-address-card"></i>
						<a href="<?php echo APPROOT ?>/profile">Profile</a>
					</li>
					<li>
						<i class="fas fa-door-open"></i>
						<a href="<?php echo APPROOT ?>/logout">Logout</a>
					</li>
					</ul>
				</div>

			<?php }else { ?>


			<div class="login">

					
					<a class="btn btn-grad" href="<?php echo APPROOT ?>/login"> Login</a>

			</div>
			
			
			
			

		<?php } ?>
		
			

		</div>

		
	</div>
