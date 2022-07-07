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
$route['api/signin']                    = 'api/pages/signin';
$route['api/signup']                    = 'api/pages/signup';
$route['api/about-us']                  = 'api/pages/about_us';
$route['api/terms-and-conditions']      = 'api/pages/terms_and_conditions';
$route['api/privacy-policy']            = 'api/pages/privacy_policy';
$route['api/disclaimer']                = 'api/pages/disclaimer';
$route['api/faq']                       = 'api/pages/faq';
$route['api/work-with-us']              = 'api/pages/work_with_us';
$route['api/partner-with-us']           = 'api/pages/partner_with_us';
$route['api/careers']                   = 'api/pages/careers';
$route['api/job-profile']               = 'api/pages/job_profile';
$route['api/jobs']                      = 'api/pages/jobs';
$route['api/fetch-jobs-data']           = 'api/pages/fetch_jobs_data';
$route['api/events']                    = 'api/pages/events';
$route['api/event-detail']              = 'api/pages/event_detail';
$route['api/fetch-events-data']         = 'api/pages/fetch_events_data';
$route['api/save-contact-message']      = 'api/pages/save_contact_message';
$route['api/save-interview-video']      = 'api/pages/save_interview_video';
$route['api/save-interview']            = 'api/pages/save_interview';
$route['api/save-job']                  = 'api/pages/save_job';

//AUTH ROUTES
$route['api/auth/create-account']       = 'api/auth/sign_up';
$route['api/auth/signin']               = 'api/auth/sign_in';

//DASHBOARD
$route['api/user/dashboard']            = 'api/user/dashboard';
$route['api/user/save-job-stat']        = 'api/user/save_job_stat';
$route['api/user/profile-settings']     = 'api/user/profile_settings';
$route['api/user/save-profile-settings']= 'api/user/save_profile_settings';
$route['api/user/change-password']      = 'api/user/change_password';