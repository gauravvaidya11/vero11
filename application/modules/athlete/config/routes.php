<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//==========Start Admin routes here==========
$route['admin-profile'] = "athlete/admin/index";
$route['admin-update-avatar'] = "athlete/admin/updateAvatar";
$route['admin-update-personal-info'] = "athlete/admin/updatePersonalInfo";
//==========End Admin routes here============
$route['athlete-profile'] = "athlete/athleteProfile";



//$route['personalProfile'] = "profile/profile/personal_info";
$route['biography'] = "athlete/biography";



//==========End Front routes here============

/* End of file routes.php */
/* Location: ./application/config/routes.php */