<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['customer-dashboard'] = "customers/index";
$route['admin-user-list'] = "customers/admin/userList";
$route['admin-dealer-users/(:any)'] = "customers/admin/viewDealerUsers/$1";
$route['admin-user-details/(:any)'] = "customers/admin/viewUsersDetails/$1";
$route['admin-dealer-user-details/(:any)'] = "customers/admin/viewUsersDetails/$1";

$route['admin-suggest-customer/(:num)'] = "customers/admin/sendCustomerSuggestion/$1";
$route['admin-make-dealer'] = "customers/admin/changeUserToDealer";

$route['admin-edit-customer/(:num)'] = "customers/admin/editCustomer/$1";
$route['admin-save-customer'] = "customers/admin/saveCustomer";

/* Customer order details*/
$route['admin-customer-order/(:any)'] = "orders/admin/CustomerOrderList/$1";
$route['admin-customer-order-detail/(:any)'] = "customers/admin/CustomerOrderDetails/$1";
//==========Start Admin routes here==========

/* Common route for add customer */

$route['add-customer'] = "customers/customers/addCustomer";
$route['save-new-customer'] = "customers/customers/saveNewCustomer";


/* End of file routes.php */
/* Location: ./application/config/routes.php */
