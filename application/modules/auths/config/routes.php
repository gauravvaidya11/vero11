<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//==========Start Admin routes here==========

$route['admin-login'] = "auths/admin/checkAdminLogin";
$route['sadmin'] = "auths/admin";
$route['adminlogin'] = "auths/admin/checkAdminLogin";
$route['admin-logout'] = "auths/admin/logout";

//==========End Admin routes here==========


//==========Stary Front routes here==========

$route['signup'] = "auths/auth/register";
$route['login'] = "auths/auth/login";
$route['verify?'] = "auths/auth/verify";
$route['reset-password'] = "auths/auth/resetPasswordFrom";
$route['send-reset-password'] = "auths/auth/resetPassword";
$route['forgot-password'] = "auths/auth/forgotPassword";
$route['send-forgot-password'] = "auths/auth/checkAndSendForgotPassword";

$route['change-password'] = "auths/auth/changePassword";
$route['logout'] = "auths/auth/logout";


//==========End front routes here==========







/* End of file routes.php */
/* Location: ./application/config/routes.php */
