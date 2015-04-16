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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['course'] = "Course_controller/overview";
$route['course/(:any)'] = "Course_controller/$1";
$route['course/detail/(:num)'] = "Course_controller/detail/$1";
$route['admin'] = "Admin_controller/registrations";
$route['admin/accept/(:num)'] = "Admin_controller/accept/$1";
$route['admin/accepted/(:num)'] = "Admin_controller/accepted/$1";
$route['user/(:any)'] = "User_controller/$1";
//$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'Course_controller/overview'; // Course_controller/overview
//$route['user/login'] = "login";
$route['admin/acceptuser/(:num)'] = "Admin_controller/acceptuser/$1";
$route['admin/accepteduser/(:num)'] = "Admin_controller/accepteduser/$1";
$route['admin/acceptcourse/(:num)'] = "Admin_controller/acceptcourse/$1";
$route['admin/acceptedcourse/(:num)'] = "Admin_controller/acceptedcourse/$1";
$route['default_controller'] = 'Course_controller/overview';
