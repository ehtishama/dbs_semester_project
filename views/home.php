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
		<?php foreach($data['products']['products'] as $product){?>

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
	<script type="text/javascript" src="views/libs/script.js"></script>
</body>
</html>
