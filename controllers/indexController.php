<?php

	require_once('core/Controller.php');

	class indexController extends Controller
	{
		public function __construct()
		{
			//echo "This is index Controller" ;

		}

		public function index($args = [])
		{
			$args['title'] = 'Ecom - Shop Online with ease.';
			if(isset($args['query']) && isset($args['query']['page']))
			{
				$pageNo = $args['query']['page'];

			}
			else $pageNo = 1;
			$perPage = 16;


			$this -> model = $this -> model('prodModel'); // initiating model property
			$data = $this -> model -> getRecentProducts($pageNo, $perPage);

			$trenGames = $this -> model -> getProdByCat(7);
			$trenBooks = $this -> model -> getProdByCat(5);

			// print_r($data);
			if(isset($data['products_success']))
				$args['products'] = $data['products'];


			if(isset($trenGames['products_success']))
					$args['tren1'] = $trenGames['tren'];

			if(isset($trenGames['products_success']))
					$args['tren2'] = $trenBooks['tren'];

			$args['best_selling'] = $this -> model -> fiveMostSoldProducts();
			$args['categories'] = $this -> model -> getCategoriesList();
			$args['pagination_links'] = $this -> model -> paginationLinks();




			$this -> loadView('home', $args);

		}
	}


 ?>
