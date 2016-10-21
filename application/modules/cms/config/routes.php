<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//==========Start Admin routes here==========
$route['admin-about-us-list']   = "cms/admin/aboutUsHistory";
$route['admin-contact-us-list']   = "cms/admin/contactUS";
$route['admin-faq']   = "cms/admin/manageFAQ";
$route['admin-add-about-us']   = "cms/admin/addAboutUshistory";
$route['admin-edit-aboutus/(:any)']   = "cms/admin/addAboutUshistory/$1";
$route['admin-contact-reply']   = "cms/admin/contactReply";
$route['admin-contact-details/(:any)']   = "cms/admin/contactDetails/$1";



/* End of file routes.php */
/* Location: ./application/config/routes.php */
