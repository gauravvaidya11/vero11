<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//==========Start routes here==========

// $route['get-country-id'] = "home/getCountryId";
// $route['setLanguage']="home/setLanguage";
// $route['about-us']="home/about_us";
// $route['contact-us']="home/contact_us";


$route['admin-club-list']="clubs/club/club_list";

$route['admin-club-details/(:any)']="clubs/club/show_club_details/$1";

$route['add-player']="clubs/club/addPlayerForm";
$route['save-player']="clubs/club/savePlayerByClub";

$route['player-list']="clubs/club/PlayerList";
$route['club-profile'] = "clubs/club/clubProfile";
$route['get_club_info'] = "clubs/club/getClubProfileInfo";
$route['club/update_club_video'] = "clubs/club/updateClubVideo";
$route['club/upload_video'] = "clubs/club/uploadVideo";
$route['club/player-details/(:any)'] = "clubs/club/playerDetailsByClub/$1";



//==========End routes here==========
