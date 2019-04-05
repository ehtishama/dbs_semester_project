<?php

class Controller
{
	
	public function __construct()
	{

	}

	public function model($model)
	{
		require_once("models/$model.php");
		return new $model;
	}
	public function loadView($view, $data = [])
	{
		// extract($data);
		
		if(file_exists("views/$view.php"))
			require_once("views/$view.php");
		else die("could not find view");
	}
}