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
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin';
$route['login'] = 'admin/login';
$route['logout'] = 'admin/logout';

$route['add-citizen'] = 'citizen/add_citizen';
$route['edit-citizen/(:num)'] = 'citizen/edit_citizen/$1';
$route['view-citizen'] = 'citizen/view_citizen';
$route['search-citizen'] = 'citizen/search_citizen';

$route['add-offence'] = 'offence/add_offence';
$route['edit-offence/(:num)'] = 'offence/edit_offence/$1';
$route['view-offence'] = 'offence/view_offence';

$route['validate-offender'] = 'offender/validate_offender';
$route['profile-offender/(:num)'] = 'offender/profile_offender/$1';
$route['clear-offender'] = 'offender/clear_offender';
$route['clear-charge/(:num)'] = 'offender/clear_charge/$1';

$route['reports'] = 'report/index';
$route['view-citizen-offences'] = 'report/view_offences';
$route['view-uncleared-offences'] = 'report/view_uncleared_offences';

