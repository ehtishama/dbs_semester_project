	<?php 
		require_once("views/libs/header.php");
	 ?>
	

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

<div class="container">
	<div class="sidebar">
		
	</div>
	<div class="products">
		<?php for($i = 0; $i < 10; $i++){ ?>
		<div class="product">

			<div class="img">
				<img src="https://static-01.daraz.pk/p/97c35056441532d75bd76d924a2d67c1.jpg_340x340q80.jpg">
			</div>
			<p class="title">Samsung Galaxy J4 core 6.0 1GB 16GB</p>
			<p class="price">PKR 1200</p>
			<button class="add_to_cart">ADD To Cart</button>

		</div>
		<?php } ?>
	</div>
</div>
	<script type="text/javascript" src="views/libs/script.js"></script>
</body>
</html>