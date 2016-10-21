<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "auths/auth/index";


$handle = opendir(APPPATH.'modules');
if ($handle){

	while ( false !== ($module = readdir($handle)) ){
	// make sure we don't map silly dirs like .svn, or . or ..

		if (substr($module, 0, 1) != "."){
			if ( file_exists(APPPATH.'modules/'.$module.'/config/'.'routes.php') ){

				include(APPPATH.'modules/'.$module.'/config/'.'routes.php');
			}

			if ( file_exists(APPPATH.'modules/'.$module.'/controllers/admin.php') ){
				$route['admin/'.$module] = $module.'/admin';
				$route['admin/'.$module.'/(.*)'] = $module.'/admin/$1';
			}
			
			if ( file_exists(APPPATH.'modules/'.$module.'/controllers/'.$module.'.php') ){
				$route[$module] = $module;
				$route[$module.'/(.*)'] = $module.'/$1';
			}
		}
	}
}



//==========Start Admin routes here==========
$route['admin-setting'] = "setting/admin/index";
$route['admin-dashboard'] = "dashboards/admin/index";

$route['404_override'] = '';



/* End of file routes.php */
/* Location: ./application/config/routes.php */