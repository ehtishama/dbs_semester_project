<?php
	// print_r($data) ;
	require("views/libs/header.php");

	if(isset($data['products_success'])) {
		$product = $data['product'];

 ?>


 	<div class="product_page">
 		<div class="container">
 			<div class="img">
 				<img src="<?php echo $product['image'] ?>">
 			</div>
 			<div class="title">
 				<p><?php echo $product['title'] ?></p>
 			</div>
 			<div class="description">
 				<?php echo $product['description'] ?>
 			</div>
 			<div class="price">
 				<?php echo $product['price'] ?>
 				
 			</div>

 		</div>
 	</div>

<?php } else {?>

	<div class="error">
		Product not found
	</div>

<?php } ?>