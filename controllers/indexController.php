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
			$this -> model = $this -> model('prodModel');
			$data = $this -> model -> getRecentProducts(18);

			$trenGames = $this -> model -> getProdByCat(7);
			$trenBooks = $this -> model -> getProdByCat(5);

			// print_r($data);
			if(isset($data['products_success']))
				$args['products'] = $data['products'];


			if(isset($trenGames['products_success']))
					$args['tren1'] = $trenGames['tren'];

			if(isset($trenGames['products_success']))
					$args['tren2'] = $trenBooks['tren'];



			$args['title'] = 'Home';

			$this -> loadView('home', $args);

		}
	}


 ?>
