
	<?php
	// add user validation and redirection

		require_once("views/libs/header.php");

	 ?>

	 <!-- slider on the home page -->
  
	<div class="slider" id="slider9">
		
		<div class="slide active" style="background-image: url(https://cdn.pixabay.com/photo/2015/11/26/00/14/fashion-1063100_960_720.jpg);">
			<div class="slide_inner">
				<div class="slide_body">
					<p class="title">
						Slide One
					</p>
					<p class="desc">
						
					</p>
					<div class="action">
						Action
					</div>
				</div>
			</div>
		</div>	
		
		<div class="slide" style="background-image: url(https://cdn.pixabay.com/photo/2016/11/20/12/03/brown-leather-shoes-1842606_960_720.jpg);" >
			<div class="slide_inner">
				<div class="slide_body">
					<p class="title">
						The second Slide with long title
					</p>
					<p class="desc">
						
					</p>
					<button class="action">
						Action
					</button>
				</div>
			</div>
		</div>
		
		<div class="slide" style="background-image: url(https://cdn.pixabay.com/photo/2016/03/09/09/39/shoes-1245920_960_720.jpg)">
			<div class="slide_inner">
				<div class="slide_body">
					<p class="title">
						Slide No 3
					</p>
					<p class="desc">
						
					</p>
					<button class="action">
						Action
					</button>
				</div>
			</div>
		</div>
		<div class="slide" style="background-image: url(https://cdn.pixabay.com/photo/2015/02/02/11/09/office-620822_960_720.jpg)">
			<div class="slide_inner">
				<div class="slide_body">
					<p class="title">
						This is fourth piece.
					</p>
					<p class="desc">
						
					</p>
					<button class="action">
						Action
					</button>
				</div>
			</div>
		</div>
		<div class="slide" style="background-image: url(https://cdn.pixabay.com/photo/2015/03/26/10/08/dj-690986_960_720.jpg)">
			<div class="slide_inner">
				<div class="slide_body">
					<p class="title">
						Last but not least.
					</p>
					<p class="desc">
						
					</p>
					<button class="action">
						Action
					</button>
				</div>
			</div>
		</div>
		
		
		<div class="left" id="slider_back">
			<svg role="img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="arrowLeftIconTitle">
	    <title id="arrowLeftIconTitle">Previous</title>    
	    <path d="M9 6l-6 6 6 6"/>
	    <path d="M21 12H4"/>
	    <path stroke-linecap="round" d="M3 12h1"/>
		</svg>
		</div>
		<div class="right" id="slider_next">
			<svg role="img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="arrowRightIconTitle">
	    	<title id="arrowRightIconTitle">Next</title>    
	    	<path d="M15 18l6-6-6-6"/>
	    	<path d="M3 12h17"/>
	    	<path stroke-linecap="round" d="M21 12h-1"/>
			</svg>
		</div>

	</div>
	  
	<?php require_once("views/libs/categories_horizontal.php"); ?>


	<div class="grad_bar"></div>
	<!-- products in a grid form container -->
	<div class="container">
		<div class="sidebar">

		</div>
		<div class="products-wrapper">


			<p>Newly and Updated</p>
			<div class="products">

				<?php foreach($data['products'] as $product){?>


					<div class="product">
						<a href="<?php echo APPROOT?>/products/product/<?php echo $product['id']?>">
							<div class="img">
								<img src="<?php echo $product['image'] ?>">
							</div>
							<p class="title"><?php echo $product['title'] ?></p>
							<p class="price">PKR <?php echo $product['price']?></p>
						</a>
						
						<div class="prod_extra_links">
							<ul>
								<li><svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="1em" width="1em" viewBox="0 0 512 512" class="_1UJnU _255P_" style="vertical-align: middle;"><title>Add to Favorites</title><g><path d="M256 475.8c-4.9 0-9.1-1.7-12.5-5.1l-176.7-170.5c-1.9-1.5-4.5-4-7.8-7.4-3.3-3.4-8.5-9.6-15.7-18.6-7.2-9-13.6-18.2-19.3-27.6-5.7-9.4-10.7-20.9-15.2-34.3-4.3-13.3-6.5-26.3-6.5-38.9 0-41.5 12-74 36-97.4 24-23.4 57.1-35.1 99.4-35.1 11.7 0 23.6 2 35.8 6.1 12.2 4.1 23.5 9.5 34 16.4 10.5 6.9 19.5 13.4 27 19.4 7.5 6 14.7 12.5 21.5 19.3 6.8-6.8 14-13.2 21.5-19.3 7.5-6 16.6-12.5 27-19.4 10.5-6.9 21.8-12.4 34-16.4 12.2-4.1 24.1-6.1 35.8-6.1 42.3 0 75.4 11.7 99.4 35.1 24 23.4 36 55.9 36 97.4 0 41.7-21.6 84.2-64.9 127.4l-176.3 169.9c-3.4 3.4-7.6 5.1-12.5 5.1z"></path></g></svg></li>
								<li><svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="1em" width="1em" viewBox="0 0 16 16" style="vertical-align: middle;"><title>Cart</title><g><path d="M 0.009 1.349 C 0.009 1.753 0.347 2.086 0.765 2.086 C 0.765 2.086 0.766 2.086 0.767 2.086 L 0.767 2.09 L 2.289 2.09 L 5.029 7.698 L 4.001 9.507 C 3.88 9.714 3.812 9.958 3.812 10.217 C 3.812 11.028 4.496 11.694 5.335 11.694 L 14.469 11.694 L 14.469 11.694 C 14.886 11.693 15.227 11.36 15.227 10.957 C 15.227 10.552 14.886 10.221 14.469 10.219 L 14.469 10.217 L 5.653 10.217 C 5.547 10.217 5.463 10.135 5.463 10.031 L 5.487 9.943 L 6.171 8.738 L 11.842 8.738 C 12.415 8.738 12.917 8.436 13.175 7.978 L 15.901 3.183 C 15.96 3.08 15.991 2.954 15.991 2.828 C 15.991 2.422 15.65 2.09 15.23 2.09 L 3.972 2.09 L 3.481 1.077 L 3.466 1.043 C 3.343 0.79 3.084 0.612 2.778 0.612 C 2.777 0.612 0.765 0.612 0.765 0.612 C 0.347 0.612 0.009 0.943 0.009 1.349 Z M 3.819 13.911 C 3.819 14.724 4.496 15.389 5.335 15.389 C 6.171 15.389 6.857 14.724 6.857 13.911 C 6.857 13.097 6.171 12.434 5.335 12.434 C 4.496 12.434 3.819 13.097 3.819 13.911 Z M 11.431 13.911 C 11.431 14.724 12.11 15.389 12.946 15.389 C 13.784 15.389 14.469 14.724 14.469 13.911 C 14.469 13.097 13.784 12.434 12.946 12.434 C 12.11 12.434 11.431 13.097 11.431 13.911 Z"></path></g></svg></li>
							</ul>
						</div>

					</div>

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
	
	<div class="notification_container" id="notification_container">
		<div class="notification" id="notification_test" style="display: none;">
			<span class="cross">X</span>
			<div class="notification_content">
						<p class="head"></p>
						<p class="body"></p>
			</div>
		</div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
	<script type="text/javascript" src="<?php echo APPROOT ?>/views/libs/jquery.js"></script>
	<script type="text/javascript" src="<?php echo APPROOT ?>/views/libs/script.js"></script>
	<script type="text/javascript" src="<?php echo APPROOT ?>/views/libs/slider/js/index.js"></script>

	
<?php
	require_once("views/libs/footer.php");
