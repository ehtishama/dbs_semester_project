<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="views/libs/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

	<div class="header">
		<div class="header_upper">
			<div class="logo">
				<img class="logo_img" src="views/assets/logo.png">
			</div>	

			<div class="search_bar">
				<input type="text" name="search" placeholder="search">
				<input type="submit" value="search">
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

	

	<div class="slider" id="home_slider">
		<div class="slide slide1">
			<img src="views/assets/slide1.jpg">
		</div>
		<div class="slide slide2">
			<img src="views/assets/slide2.jpg">
		</div>
		<div class="slide slide3">
			<img src="views/assets/slide3.jpg">
		</div>
		<div class="slide slide4">
			<img src="views/assets/slide4.jpg">
		</div>
		<div class="next" onclick="nextSlide();">
			<i class="fas fa-angle-right"></i>
		</div>

		<div class="pre" onclick="prevSlide();">
			<i class="fas fa-angle-left"></i></div>
	</div>

	<script type="text/javascript" src="views/libs/script.js"></script>
</body>
</html>