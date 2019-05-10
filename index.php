<?php
	

	session_start();
	define( 'APPROOT', 'http://localhost/ecom' );
	require('core/Router.php');

	new Router();
