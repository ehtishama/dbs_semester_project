<?php


	session_start();
	define( 'APPROOT', 'http://localhost/ecom' );
	require('core/Router.php');
	require_once("helpers/helper.php");

	new Router();
