<?php


	session_start();
	define( 'APPROOT', 'http://localhost/ecom' );
	
	require_once('core/Router.php');
	require_once("helpers/helper.php");
	require_once("helpers/general.php");
	require_once("vendor/autoload.php");

	new Router();



	
