<?php 
class Router
{
	protected $controller;
	protected $method;
	protected $args = [];
	
	public function __construct()
	{
		if(isset($_GET['url']))
		{
			$url 		= 	$_GET['url'];
			$this -> breakURL($url);

		}
		else 
		{

			$this -> controller 	= 'indexController';
			$this -> method 		= 'index';
			$this -> args 			= [];

		}
		$this -> init();
	}

	public function breakURL($url)
	{
		$url = rtrim($url, '/');
		
		$url = strtolower($url);

		$parts = explode('/', $url);

		$this -> controller 	= isset($parts[0]) ? $parts[0] : 'index';
		$this -> method 		= isset($parts[1]) ? $parts[1] : 'index';
		$this -> controller    .= 'Controller';

		unset($parts[0]);
		unset($parts[1]);
		$this -> args = $parts;

	}

	public function init()
	{
		if(file_exists("controllers/{$this->controller}.php"))
		{
			require_once("controllers/{$this->controller}.php");
			$controller = new $this->controller;
			
			if(method_exists($controller, $this -> method))
				$controller -> {$this -> method} ($this -> args);
			else 
				$controller -> index();
		
		}else echo 'error 404... page not found';
	}
}





	