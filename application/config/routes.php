<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main/home';


$route['payment-successful'] = 'pay/payment_successful';
$route['payment-failed'] = 'pay/payment_failed';
$route['pay/check/(:any)'] = 'pay/check/$1';
$route['pay/page/(:any)'] = 'pay/page/$1';
$route['pay/create/(:any)'] = 'pay/create/$1';
$route['pay/complete/(:any)'] = 'pay/complete/$1';


$route['login'] = 'main/login';
$route['forgot'] = 'main/forgot';
$route['register'] = 'main/register';
$route['register/(:any)'] = 'main/register/$1';
$route['logout'] = 'main/logout';


$route['account'] = 'main/account';
$route['cart'] = 'main/cart';
$route['orders'] = 'main/orders';
$route['tutorial'] = 'main/tutorial';
$route['products'] = 'main/products';
$route['purchase/(:any)'] = 'main/purchase/$1';
$route['privacy-policy'] = 'main/privacy_policy';
$route['terms-conditions'] = 'main/terms_conditions';
$route['404_override'] = 'main/not_found';


$route['api/login'] = 'app_api/login';
$route['api/profile-edit'] = 'app_api/profile_edit';
$route['api/hwid-reset'] = 'app_api/hwid_reset';
$route['api/use-cuopon'] = 'app_api/use_cuopon';
$route['api/register'] = 'app_api/register';
$route['api/newsletter'] = 'app_api/newsletter';
$route['api/add-cart/(:any)'] = 'app_api/add_cart/$1';

$route['loader-api/login'] = 'loader_api/login';
$route['loader-api/check-hwid'] = 'loader_api/check_hwid';
$route['loader-api/get-products'] = 'loader_api/get_products';
$route['loader-api/get-license'] = 'loader_api/get_license';
$route['loader-api/get-token'] = 'loader_api/get_token';

$route['translate_uri_dashes'] = FALSE;
