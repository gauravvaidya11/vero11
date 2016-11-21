<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//==========Start Admin routes here==========
$route['search-players'] = "search/searchPlayers";
$route['search-players-info'] = "search/searchPlayersInfo";
$route['favorite-list'] = "search/favoritePlayers";

$route['player-details/(:any)'] = "search/playerDetails/$1";


//==========End Front routes here============

/* End of file routes.php */
/* Location: ./application/config/routes.php */