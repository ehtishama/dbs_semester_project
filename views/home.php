
	<?php
	// add user validation and redirection

		require_once("views/libs/header.php");

	 ?>

	 <!-- slider on the home page -->
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

	<!-- products in a grid form container -->
	<div class="container">
		<div class="sidebar">

		</div>
		<div class="products-wrapper">


			<p>Newly and Updated</p>
			<div class="products">

				<?php foreach($data['products'] as $product){?>

				<a href="<?php echo APPROOT?>/products/product/<?php echo $product['id']?>">
					<div class="product">

					<div class="img">
						<img src="<?php echo $product['image'] ?>">
					</div>
					<p class="title"><?php echo $product['title'] ?></p>
					<p class="price">PKR <?php echo $product['price']?></p>



					</div>
				</a>
				<?php } ?>
			</div>

		</div>
		<div class="products-wrapper">


			<p>Trending Video Games</p>
			<div class="products tren">

				<?php foreach($data['tren1'] as $product){?>

				<a href="<?php echo APPROOT?>/products/product/<?php echo $product['id']?>">
					<div class="product">

					<div class="img">
						<img src="<?php echo $product['image'] ?>">
					</div>
					<p class="title"><?php echo $product['title'] ?></p>
					<p class="price">PKR <?php echo $product['price']?></p>



					</div>
				</a>
				<?php } ?>
			</div>

		</div>


		<div class="products-wrapper">


			<p>Trending in Books</p>
			<div class="products tren">

				<?php foreach($data['tren2'] as $product){?>

				<a href="<?php echo APPROOT?>/products/product/<?php echo $product['id']?>">
					<div class="product">
						<div class="img">
							<img src="<?php echo $product['image'] ?>">
						</div>
						<p class="title"><?php echo $product['title'] ?></p>
						<p class="price">PKR <?php echo $product['price']?></p>
					</div>
				</a>
				<?php } ?>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="views/libs/script.js"></script>

	<!-- footer -->
	<div class="footer">
		<div class="footer-wrapper">
			<div class="section logo">
				<img src="" alt="LOGO">
			</div>
			<div class="section links">

				<ul>
					<li> <a href="#">Home</a> </li>
					<li> <a href="#">About Us</a> </li>
					<li> <a href="#">Contact</a> </li>
					<li> <a href="#">Disclaimer</a> </li>
				</ul>
			</div>
			<div class="section links">
				<ul>
					<li> <a href="#">Shop</a> </li>
					<li> <a href="#">Our Partners</a> </li>
					<li> <a href="#">Location</a> </li>
					<li> <a href="#">Terms and Conditions</a> </li>
				</ul>
			</div>
			<div class="section social-links ">

			</div>

		</div>
		<p>&copy; <?php echo date("Y") ?>. All rights reserved.</p>

	</div>
</body>
</html>
