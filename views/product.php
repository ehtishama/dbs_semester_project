<?php

	require("views/libs/header.php");

	if(isset($data['products_success'])) {
		$product = $data['product'];

 ?>
 	<div class=" container product-page bg-white mx-auto p-4 mt-4" > 
		<div class="flex justify-center">
			<div class="product_img mr-8">
				<img src="<?php echo m_create_img_url($product['image']) ?>">
			</div>
			<div>
				<div class="product_info">
				    <div class="product_title">
				    	<?php echo $product['title'] ?>
				    </div>

					<div class="product_price">
						$<?php echo $product['price'] ?>
					</div>
				    <div class="product_model">SKU: 21354654</div>

					<form action="<?php echo APPROOT ?>/cart/add_cart/<?php echo $product['id'] ?>" method="post">
						<div class="product_quantity">Quantity:<br>
					     	<input type="number" value="1" name="quantity" min="1" max="10">
					    </div>
					    <!-- add logic so that quantity can also be added with the product -->
						<div onclick="addToCart(<?php echo $product['id'] ?>);" class="bg-black text-white font-bold p-2 text-center">
								Add to Cart
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="product_descr w-full mt-8 text-gray-800 text-base"> 
			<h2 class="text-2xl font-bold">Description</h2>
			<p>
				<?php echo $product['description'] ?> 
			</p>
		</div>
	</div>

<?php } else {?>

	<div class="error">
		Product not found
	</div>

<?php } ?>



	<!-- notification container -->
	<div class="notification_container" id="notification_container">
		<div class="notification" id="notification_test" style="display: none;">
			<span class="cross">X</span>
			<div class="notification_content">
						<p class="head"></p>
						<p class="body"></p>
			</div>
		</div>
	</div>
<?php
	require_once("views/libs/footer.php");
