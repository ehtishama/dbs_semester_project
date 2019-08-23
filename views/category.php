<?php  
	require_once("views/libs/header.php");
	require_once("views/libs/categories_horizontal.php");

?>
	<title>Category -- Ecom, Shop Onine</title>
</head>
<body >
	
	<div class="body_wrapper">
		<?php foreach ($data['products'] as $product): ?>


		<section class="products_list">
			
				<div class="list_item">
					<img src="<?php echo $product['image'] ?>">
					<div class="item_info">
						<p class="title">
							<a href="<?php echo APPROOT ?>/products/product/<?php echo $product['id'] ?>">
								<?php echo $product['title'] ?>
							</a>			
						</p>
						<p class="">
							<?php echo $product['description']; ?>		
						</p>
						<p class="mt-4 font-bold text-gray-700">$<?php echo $product['price'] ?></p>
						<button
							onclick="addToCart(<?php echo $product['id'] ?>);"
							class="text-center px-3 py-2 my-3 bg-gray-600 hover:bg-gray-500 text-white cursor-pointer shadow-md rounded">
									Add to cart
						</button>
					</div>
				</div>
		</section>

		<?php endforeach; ?>
	</div>







<?php require_once("views/libs/footer.php"); ?>

</body>
</html>