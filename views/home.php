<?php
	// add user validation and redirection
	// data array contains all the products to be shown on the homepage
	// print_r($data['best_selling']);
	require_once("views/libs/header.php");
	require_once("views/libs/categories_horizontal.php");
?>
	<!-- carousel -->
	<div class="carousel_wrapper px-8">
		<div class="carousel">
		    <div class="slide relative">
	    		<img class="block w-full h-full object-center" src="<?php echo APPROOT ?>/views/assets/carousel/1.jpg" >
		    	
		    	
		    </div>
		    <div class="slide">
		    	<img class="block w-full h-full object-center" src="<?php echo APPROOT ?>/views/assets/carousel/2.jpg" >
		    </div>
		    <div class="slide">
		    	<img class="block w-full h-full object-center" src="<?php echo APPROOT ?>/views/assets/carousel/3.jpg" >
		    </div>

		</div>
	</div>		


	<div class="container mx-auto">

		<!-- featured products -->
		

		<!-- for adding filters like things -->
		<div class="sidebar">

		</div>

		<!-- for newly and updated products -->
		<div class="products-wrapper">
			<div class="products updated_products">
				<?php foreach($data['products'] as $product){?>
					<div class="product p-6 rounded-lg bg-white shadow hover:shadow-lg">
						<a href="<?php echo APPROOT?>/products/product/<?php echo $product['id']?>">
							<div class="img">
								<img src="<?php echo $product['image'] ?>">
							</div>
						</a>
						<!-- product info -->
						<div class="py-2">
							<p class="text-gray-900 font-bold text-base capitalize block">
								<?php echo $product['title'] ?>		
							</p>
							<p class="text-gray-600 text-sm font-bold block">
								$<?php echo $product['price']?>
							</p>
							<button
							onclick="addToCart(<?php echo $product['id'] ?>);"
							class="block w-full text-center px-3 py-2 my-3 bg-indigo-600 hover:bg-gray-500 text-white cursor-pointer shadow-md rounded">
									Add to cart
							</button>
						</div>
						
						<div class="prod_extra_links">
							<ul>
								<li title="Add to wishlist">
									<svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="1em" width="1em" viewBox="0 0 512 512" class="_1UJnU _255P_" style="vertical-align: middle;">
										<title>Add to Favorites</title>
										<g>
											<path d="M256 475.8c-4.9 0-9.1-1.7-12.5-5.1l-176.7-170.5c-1.9-1.5-4.5-4-7.8-7.4-3.3-3.4-8.5-9.6-15.7-18.6-7.2-9-13.6-18.2-19.3-27.6-5.7-9.4-10.7-20.9-15.2-34.3-4.3-13.3-6.5-26.3-6.5-38.9 0-41.5 12-74 36-97.4 24-23.4 57.1-35.1 99.4-35.1 11.7 0 23.6 2 35.8 6.1 12.2 4.1 23.5 9.5 34 16.4 10.5 6.9 19.5 13.4 27 19.4 7.5 6 14.7 12.5 21.5 19.3 6.8-6.8 14-13.2 21.5-19.3 7.5-6 16.6-12.5 27-19.4 10.5-6.9 21.8-12.4 34-16.4 12.2-4.1 24.1-6.1 35.8-6.1 42.3 0 75.4 11.7 99.4 35.1 24 23.4 36 55.9 36 97.4 0 41.7-21.6 84.2-64.9 127.4l-176.3 169.9c-3.4 3.4-7.6 5.1-12.5 5.1z">
											</path>
										</g>
									</svg>
								</li>
								<li onclick="addToCart(<?php echo $product['id'] ?>);" title="Add to Cart">
									<svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="1em" width="1em" viewBox="0 0 16 16" style="vertical-align: middle;">
										<title>Add to Cart</title>
										<g>
											<path d="M 0.009 1.349 C 0.009 1.753 0.347 2.086 0.765 2.086 C 0.765 2.086 0.766 2.086 0.767 2.086 L 0.767 2.09 L 2.289 2.09 L 5.029 7.698 L 4.001 9.507 C 3.88 9.714 3.812 9.958 3.812 10.217 C 3.812 11.028 4.496 11.694 5.335 11.694 L 14.469 11.694 L 14.469 11.694 C 14.886 11.693 15.227 11.36 15.227 10.957 C 15.227 10.552 14.886 10.221 14.469 10.219 L 14.469 10.217 L 5.653 10.217 C 5.547 10.217 5.463 10.135 5.463 10.031 L 5.487 9.943 L 6.171 8.738 L 11.842 8.738 C 12.415 8.738 12.917 8.436 13.175 7.978 L 15.901 3.183 C 15.96 3.08 15.991 2.954 15.991 2.828 C 15.991 2.422 15.65 2.09 15.23 2.09 L 3.972 2.09 L 3.481 1.077 L 3.466 1.043 C 3.343 0.79 3.084 0.612 2.778 0.612 C 2.777 0.612 0.765 0.612 0.765 0.612 C 0.347 0.612 0.009 0.943 0.009 1.349 Z M 3.819 13.911 C 3.819 14.724 4.496 15.389 5.335 15.389 C 6.171 15.389 6.857 14.724 6.857 13.911 C 6.857 13.097 6.171 12.434 5.335 12.434 C 4.496 12.434 3.819 13.097 3.819 13.911 Z M 11.431 13.911 C 11.431 14.724 12.11 15.389 12.946 15.389 C 13.784 15.389 14.469 14.724 14.469 13.911 C 14.469 13.097 13.784 12.434 12.946 12.434 C 12.11 12.434 11.431 13.097 11.431 13.911 Z"></path>
										</g>
									</svg>
								</li>
							</ul>
						</div>

					</div>

				<?php } ?>
			</div>
		</div>

		<!-- pagination links -->
		<div class="pagination mb-4 text-center">
			<?php foreach($data['pagination_links'] as $link): ?>
				<a href="?<?php echo $link['link']; ?>" class="inline-block p-1 px-2 bg-white m-1 shadow text-lg">
					<?php echo $link['count'] ?>
				</a>
			<?php endforeach; ?>
		</div>
		<!-- features -->
		<section class="features">
			<div class="feature">
				<span class="icon">
					<svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" aria-labelledby="dolarIconTitle" stroke="#000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000"> <title id="dolarIconTitle">Dolar</title> <path d="M12 4L12 6M12 18L12 20M15.5 8C15.1666667 6.66666667 14 6 12 6 9 6 8.5 7.95652174 8.5 9 8.5 13.140327 15.5 10.9649412 15.5 15 15.5 16.0434783 15 18 12 18 10 18 8.83333333 17.3333333 8.5 16"/> </svg>
				</span>
				<h3>Money Back Gaurantee</h3>
				<p>Shop without any worries, If anything goes wrong we provide a 100% money back guarantee. </p>
			</div>

			<div class="feature">
				<span class="icon">
					<svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" aria-labelledby="bagIconTitle" stroke="#000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000"> <title id="bagIconTitle">Bag</title> <rect width="14" height="12" x="5" y="7"/> <path d="M8 7a4 4 0 1 1 8 0"/> </svg>
				</span>
				<h3>Free Shipping Countrywide</h3>
				<p>Shop without any worries, If anything goes wrong we provide a 100% money back guarantee. </p>
			</div>

			<div class="feature">
				<span class="icon">
					<svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" aria-labelledby="lockAltIconTitle" stroke="#000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000"> <title id="lockAltIconTitle">Lock</title> <rect width="14" height="10" x="5" y="11"/> <path d="M12,3 L12,3 C14.7614237,3 17,5.23857625 17,8 L17,11 L7,11 L7,8 C7,5.23857625 9.23857625,3 12,3 Z"/> <circle cx="12" cy="16" r="1"/> </svg>
				</span>
				<h3>Secure Payment Gateways</h3>
				<p>Shop without any worries, If anything goes wrong we provide a 100% money back guarantee. </p>
			</div>

			<div class="feature">
				<span class="icon">
					<svg width="48px" height="48px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="supportIconTitle" stroke="#000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000"> <title id="supportIconTitle">Support</title> <path d="M11 8L9.42229 7.21115C9.14458 7.07229 8.83835 7 8.52786 7H7.82843C7.29799 7 6.78929 7.21071 6.41421 7.58579L5.58579 8.41421C5.21071 8.78929 5 9.29799 5 9.82843L5 14.9296C5 15.5983 5.3342 16.2228 5.8906 16.5937L9.75746 19.1716C10.4944 19.663 11.4668 19.611 12.1472 19.044L17 15"/> <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4549 12.9142C13.8515 12.1062 12.741 11.8739 11.8643 12.3721L10.009 13.4266C9.41298 13.7653 8.66412 13.6641 8.17937 13.1794V13.1794C7.54605 12.546 7.59324 11.5056 8.2813 10.9323L12.4437 7.46356C12.8032 7.16403 13.2562 7 13.7241 7H14.5279C14.8384 7 15.1446 7.07229 15.4223 7.21115L17.8944 8.44721C18.572 8.786 19 9.47852 19 10.2361L19 12.9796C19 14.9037 16.5489 15.718 15.3976 14.1764L14.4549 12.9142Z"/> <path d="M1 17V8"/> <path d="M1 17V8"/> <path d="M23 17V8"/> </svg>
				</span>
				<h3>24/7 Customer Care Service</h3>
				<p>Shop without any worries, If anything goes wrong we provide a 100% money back guarantee. </p>
			</div>
		</section>
	</div>
		
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

	<script type="text/javascript" src="http://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>  

	<script type="text/javascript">
		$(document).ready(function(){
		  $('.carousel').slick({
		  	autoplay: true,
		  	autoplaySpeed: 3000
		  });
		});
	</script>	
	<?php require_once("views/libs/footer.php"); ?>
