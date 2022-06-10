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

# API ROUTES
$route['api/home']                      = 'api/pages/home';
$route['api/about-us']                  = 'api/pages/about_us';
$route['api/terms-and-conditions']      = 'api/pages/terms_and_conditions';
$route['api/privacy-policy']            = 'api/pages/privacy_policy';
$route['api/disclaimer']                = 'api/pages/disclaimer';
$route['api/save-contact-message']      = 'api/pages/save_contact_message';