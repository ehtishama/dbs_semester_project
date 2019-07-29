<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';

$route['login'] = 'authentication/login';
$route['logout'] = 'authentication/logout';
$route['signup'] = 'authentication/signup';

$route['insert-product'] = 'products/insert';
$route['all-products'] = 'products/view_all_products';
$route['update-product/(:num)'] = "products/edit_product/$1";

$route['product-categories'] = 'categories_controller';
$route['categories/update'] = 'categories_controller/update';
$route['categories/insert'] = 'categories_controller/insert';
$route['categories/remove/(:num)'] = 'categories_controller/remove/$1';

$route['orders/(:num)'] = "orders/single_order/$1";
$route['orders/update-status/(:num)'] = "orders/update_status/$1";

$route['users'] = "user_controller";

$route['shipping'] = "shipping_controller/add_new_carrier";
$route['shipping/add-new-carrier'] = "shipping_controller/add_new_carrier";

$route['payments'] = "payment_controller";
$route['payments/update'] = "payment_controller/update";


$route['pages'] = 'pages/view';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
