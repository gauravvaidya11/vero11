<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//==========Start routes here==========

// $route['get-country-id'] = "home/getCountryId";
// $route['setLanguage']="home/setLanguage";
// $route['about-us']="home/about_us";
// $route['contact-us']="home/contact_us";


$route['admin-player-list']="players/player_list";
$route['admin-player-details/(:any)']="players/show_player_details/$1";
//==========End routes here==========
