<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//==========Start Front Dashboard routes here==========
$route['business/dashboard'] = "dashboards/business/index";
$route['dealer/dashboard'] 	 = "dashboards/dealer/index";
$route['customer/dashboard'] = "dashboards/customer/index";
$route['coach/dashboard'] = "dashboards/coach/index";
$route['distributor/dashboard'] = "dashboards/distributor/index";
//==========End Front Dashboard routes here==========


//==========Start Admin routes here==========
$route['admin-user-dashboard'] = "dashboards/admin_user/index";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
