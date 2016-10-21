<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
  |--------------------------------------------------------------------------
  | Application Constants
  |--------------------------------------------------------------------------
  | These constants we will use through out the system
  |
  |
 */
$root = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . preg_replace('@/+$@', '', dirname($_SERVER['SCRIPT_NAME'])) . '/';

define('BASE_URL', $root);
define('FRONT_THEME_ASSETS', BASE_URL . 'public/front/assets/');
define('ADMIN_THEME_ASSETS', BASE_URL . 'public/admin/assets/');
define('ADMIN_THEME_CSS', BASE_URL . 'public/admin/assets/css/');
define('FRONT_THEME_CSS', BASE_URL . 'public/front/assets/css/');
define('ADMIN_THEME_JS', BASE_URL . 'public/admin/assets/scripts/');
define('ADMIN_THEME_PLUGINS', BASE_URL . 'public/admin/assets/plugins/');
define('FRONT_THEME_PLUGINS', BASE_URL . 'public/front/assets/plugins/');
define('FRONT_THEME_JS', BASE_URL . 'public/front/assets/js/');
define('ADMIN_THEME_IMG', BASE_URL . 'public/admin/assets/img/');
define('FRONT_THEME_IMG', BASE_URL . 'public/front/assets/images/');

define('AVATAR_IMAGE', BASE_URL . 'public/front/assets/images/avatar.jpg');
define('PLAYER_PLAY_IMAGE', BASE_URL . 'public/front/assets/images/placeholder.png');

define('PROFILE_IMAGE', 'public/uploads/profile_image/');
define('PLAYER_IMAGE', 'public/uploads/player_image/');



define('COMMON_JS_CSS', BASE_URL . 'public/common/');
define('COMMON_JS', BASE_URL . 'public/common/');

define('ADMIN_IMAGE_UPLOAD_PATH', BASE_URL . 'public/admin/assets/uploads/');
define('FRONT_IMAGE_UPLOAD_PATH', BASE_URL . 'public/front/assets/uploads/');
define('AVATAR_PATH', BASE_URL . 'public/uploads/avatar/');

//================== User Dashboard==================================

define('USER_DASHBOARD_THEME_CSS', BASE_URL . 'public/user_dashboard/assets/css/');

define('USER_DASHBOARD_THEME_JS', BASE_URL . 'public/user_dashboard/assets/js/');

define('USER_DASHBOARD_THEME_PLUGINS', BASE_URL . 'public/user_dashboard/assets/plugins/');

define('USER_DASHBOARD_THEME_IMG', BASE_URL . 'public/user_dashboard/assets/images/');

//================== User Dashboard==================================

define('NO_IMAGE', FRONT_THEME_IMG . 'default/not_found.jpg');

//================== Company Details ========================//
define('COMPANY_LOGO_PATH',  'public/uploads/company_details/company_logo/');
define('COMPANY_DOC_PATH',   'public/uploads/company_details/company_document/');
define('COMPANY_DEFAULT_LOGO_PATH',  'public/uploads/company_details/company_logo/default.png');


if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . preg_replace('@/+$@', '', dirname($_SERVER['SCRIPT_NAME'])) . '/');
} else {
    define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
}

define('SITE_NAME', 'Vero11'); //default SITE NAME

define('DEFAULT_COUNTRY', 81); //default germany

//====================== Validation Rules Start===========================

define('firstname_min', '3');
define('firstname_max', '30');
define('lastname_max', '30');
define('lastname_min', '3');
define('address_max', '100');
define('email_id_max', '50');
define('mobile_no_min', '10');
define('mobile_no_max', '15');
define('password_min', '6');
define('password_max', '16');

//====================== Validation Rules End===========================





/* End of file constants.php */
/* Location: ./application/config/constants.php */