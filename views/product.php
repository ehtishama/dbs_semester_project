<?php

	require("views/libs/header.php");

	if(isset($data['products_success'])) {
		$product = $data['product'];

 ?>
	<div class="product_page">
		<div class="container">


	  <div class="product_img">
	    <img src="<?php echo $product['image'] ?>" alt="">
	  </div>
	  <div class="product_info">

	    <div class="product_title"><?php echo $product['title'] ?></div>
			<div class="product_price">$<?php echo $product['price'] ?></div>
	    <div class="product_model">SKU: 21354654</div>

	    <div class="product_descr"> <?php echo $product['description'] ?> </div>

			<form action="<?php echo APPROOT ?>/cart/add_cart/<?php echo $product['id'] ?>" method="post">
				<div class="product_quantity">Quantity:<br>
		      <input type="number" value="1" name="quantity">
		    </div>

				<div onclick="addToCart(<?php echo $product['id'] ?>);" class="add_to_cart">
					Add to Cart
				</div>
			</form>

	  </div>
  </div>
	</div>

<?php } else {?>

	<div class="error">
		Product not found
	</div>

<?php } ?>



<?php
	require_once("views/libs/footer.php");
