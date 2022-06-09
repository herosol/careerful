<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

# ADMIN
$route['admin/login']                   = 'admin/index/login';
$route['admin/logout']                  = 'admin/index/logout';
$route['admin/meta-info']               = 'admin/Meta_info/index';
$route['admin/meta-info/manage']        = 'admin/Meta_info/manage';
$route['admin/meta-info/manage/(:any)'] = 'admin/Meta_info/manage/$1';
$route['admin/meta-info/delete/(:any)'] = 'admin/Meta_info/delete/$1';

# SITE PAGES
$route['about-us']             = 'pages/about';
$route['services']             = 'pages/services';
$route['opportunities']        = 'pages/opportunities';
$route['contact-us']           = 'pages/contact';
$route['newsletter']           = 'index/newsletter';

#PAYPAL
$route['pay-now/(:num)'] = 'paypal/pay_now/$1';
$route['donation-successful'] = 'pages/success';
$route['donation-canceled']   = 'pages/cancel';
$route['order-notify']   = 'paypal/order_notify';
$route['paypal/(:any)']  =  'Pages/paypal/$1';
$route['paypal-amended-invoice/(:any)'] =  'Pages/paypal_amended_invoice/$1';