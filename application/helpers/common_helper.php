<?php

/* =====================================
 * This function is use for redirect if admin Login if session not set
 */
function checkedLoggedInUserInfo() {
    $CI = & get_instance();
    $CI->db->select('user.id, user.user_type, user_det.club_name, user_det.club_manager_name,user_det.first_name, user_det.last_name, user_det.user_id');
    $CI->db->from('tbl_users user');
    $CI->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
    $CI->db->where('user.status', '1');
    $CI->db->where('user.is_verified', '1');
    $CI->db->where('user.delete_status', '0');
    $CI->db->where('user.id', $CI->session->userdata('player_id'));
    $data = $CI->db->get();
    $result = $data->row_array();
    return $result;
}

/*=============================================
*This function is use for get active player count whose player can log in from front end.
*/
function get_number_of_player() {
        $CI = & get_instance();
        $CI->db->select('id');
        $CI->db->from('tbl_users');
        $CI->db->where('status', '1');
        $CI->db->where('is_verified', '1');
        $CI->db->where('delete_status', '0');
        $query = $CI->db->get();
        //echo $CI->db->last_query();die;
        return $query->num_rows();
}




function isLoggedIn($flag = TRUE) {
    $ci = &get_instance();
    $check_status = checkedLoggedInUserInfo();
    if(empty($check_status)){
        redirect(BASE_URL.'login'); 
        exit();
    }
    // if (!$ci->session->userdata('player_id')) {
    //     if ($ci->input->is_ajax_request()) {
    //             echo 'logout';
    //             exit();
    //     }else{
    //        redirect(BASE_URL.'login'); 
    //        exit();
    //     }        
    // }else {
    //     if($flag){
    //        $check_status = checkedLoggedInUserInfo();
    //        if(empty($check_status)){
    //         logout();
    //        }
    //     }
    //     if($flag == FALSE) {
    //         if (!$ci->input->is_ajax_request()) {
    //             redirect(BASE_URL."athlete-profile");
    //         }
    //     }
    // }
}

function isAdminLoggedIn() {
    $ci = &get_instance();
    if (!$ci->session->userdata('admin_id') && !$ci->session->userdata('admin_logged_in')) {
        if ($ci->input->is_ajax_request()) {
                echo 'logout';
                exit();
        }else{
           redirect(BASE_URL.'sadmin'); 
           exit();
        }        
    }
}


function logout() {
    $ci = &get_instance();
        $array_items = array(
            'player_id' => '',
            'user_type' => '',
            'profile_image' => ''
        );
        $ci->session->unset_userdata($array_items);
        $ci->session->set_flashdata('success_message', '<div class="alert alert-success hideauto">'.lang("user_logout_successfully").'</div>');
        redirect(BASE_URL);
    }


/* =====================================
 * This function is use for redirect if admin Loggedin
 */

function checkFrontUserLoggedIn($flag = TRUE) {
    $ci = &get_instance();
    if ($ci->session->userdata('player_id') && $ci->session->userdata('user_type')==1) {
        redirect(BASE_URL."athlete-profile");
    }else if($ci->session->userdata('player_id') && $ci->session->userdata('user_type')==2){
        redirect(BASE_URL."club-profile");
    }
}


/* =====================================
 * This function is use for redirect if admin Loggedin
 */

function checkAdmminLoggedIn() {
    $ci = &get_instance();
    if ($ci->session->userdata('admin_id') && $ci->session->userdata('admin_logged_in')==TRUE) {
        redirect(BASE_URL."admin-dashboard");
    }
}

//END checkAdmminLoggedIn();




/* =====================================
 * This function is use for get admin loggedin information
 */

function loggedInInformation() {
    $ci = &get_instance();
    $adminId = $ci->session->userdata('admin_id');
    $ci->db->select('*');    
    $ci->db->where('status', 1);
    $ci->db->where('id', $adminId);
    $query = $ci->db->get('tbl_admin');
    if ($query->num_rows() > 0) {
        return $query->row_array();
    }
    else {
        return false;
    }
}

//END loggedInInformation()

/* ========================================
 * This function is use for get users loggedin info
 */

function userLoggedInInfo() {
    $ci = &get_instance();
    $session_user_id = $ci->session->userdata('player_id');
    $ci->db->select('users.id,'
            . 'users.user_type,'
            . 'users.paid_status,'
            . 'user_det.club_name,'
            . 'user_det.nick_name,'
            . 'user_det.club_manager_name,'
            . 'user_det.first_name,'
            . 'user_det.last_name,'
            . 'user_det.email,'
            . 'user_det.age,'
            . 'user_det.country,'
            . 'user_det.gender,'
            . 'user_det.profile_image,'
            . 'user_det.user_id,'
            . 'user_det.mobile'
    );
    $ci->db->from('tbl_users as users');
    $ci->db->join('tbl_user_details as user_det', 'users.id=user_det.user_id');
    $ci->db->where('users.status', '1');
    $ci->db->where('users.delete_status','0');
    $ci->db->where('users.id', $session_user_id);
    $query = $ci->db->get();
    return $query->row_array();
}//END userLoggedInInfo();


//filter function for return true string
function escapeString($val) {
    $db = get_instance()->db->conn_id;
    $val = mysqli_real_escape_string($db, $val);
//    $val = mysql_real_escape_string($val);
    return $val;
}

/**
 * @ Function Name		: pr
 * @ Function Params	: $data {mixed}, $kill {boolean}
 * @ Function Purpose 	: formatted display of value of varaible
 * @ Function Returns	: foramtted string
 * stop the exicution after the function call
 */
function pr($data, $kill = true) {
    $str = "";
    if ($data != '') {
        $str .= str_repeat("=", 25) . " " . ucfirst(gettype($data)) . " " . str_repeat("=", 25);
        $str .= "<pre>";
        if (is_array($data)) {
            $str .= print_r($data, true);
        }
        if (is_object($data)) {
            $str .= print_r($data, true);
        }
        if (is_string($data)) {
            $str .= $data;
        }
        if (is_integer($data)) {
            $str .= $data;
        }
        $str .= "</pre>";
    }
    else {
        $str .= str_repeat("=", 22) . " Empty Data " . str_repeat("=", 22);
    }

    if ($kill) {
        die($str .= str_repeat("=", 55));
    }
    echo $str;
}

/*
 * function is to print the array in formate with continue to other script
 * 
 */

function pre($data, $kill = true) {
    $str = "";
    if ($data != '') {
        $str .= str_repeat("=", 25) . " " . ucfirst(gettype($data)) . " " . str_repeat("=", 25);
        $str .= "<pre>";
        if (is_array($data)) {
            $str .= print_r($data, true);
        }
        if (is_object($data)) {
            $str .= print_r($data, true);
        }
        if (is_string($data)) {
            $str .= $data;
        }
        if (is_integer($data)) {
            $str .= $data;
        }
        $str .= "</pre>";
    }
    else {
        $str .= str_repeat("=", 22) . " Empty Data " . str_repeat("=", 22);
    }

    if ($kill) {
        echo $str .= str_repeat("=", 55);
    }
    else {
        echo $str;
    }
}

/*
 * function is to generate the randome unique string
 * 
 */

function str_rand($length = 8, $seeds = 'alphanum') {
// Possible seeds
    $seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
    $seedings['numeric'] = '0123456789';
    $seedings['alphanum'] = 'abcdefghijklmnopqrstuvwqyz0123456789';
    $seedings['hexidec'] = '0123456789abcdef';

// Choose seed
    if (isset($seedings[$seeds])) {
        $seeds = $seedings[$seeds];
    }

// Seed generator
    list($usec, $sec) = explode(' ', microtime());
    $seed = (float) $sec + ((float) $usec * 100000);
    mt_srand($seed);

// Generate
    $str = '';
    $seeds_count = strlen($seeds);

    for ($i = 0; $length > $i; $i++) {
        $str .= $seeds{mt_rand(0, $seeds_count - 1)};
    }

    return strtoupper($str);
}

//upload the image
function do_upload($fieldName, $uploadPath) {
    $CI = & get_instance();
    $config['upload_path'] = $uploadPath;
    $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
    $config['max_size'] = 80000;
    $config['max_width'] = 102400;
    $config['max_height'] = 99900;
    $config['encrypt_name'] = TRUE;
    $CI->load->library('upload', $config);
    $CI->upload->do_upload($fieldName);
    return $CI->upload->data();
}


//upload the video
function do_upload_video($fieldName, $uploadPath) {
    $CI = & get_instance();
    $config['upload_path'] = $uploadPath;
    $config['allowed_types'] = 'mp4|avi|mov|3gp|mpeg|MP4|AVI|MOV|3GP|MPEG';
    $config['max_size'] = '';
    $config['encrypt_name'] = TRUE;
    $config['remove_spaces'] = TRUE;
    $video_name = str_rand('alphanum', 10);
    $config['file_name'] = $video_name;

    $CI->load->library('upload', $config);
    $CI->upload->do_upload($fieldName);
    return $CI->upload->data();
}

/* =================================================================================================================
 * This function upload file ,$file_name and  $config["upload_path"] is must, Second parameter is to 
 * provide config setting. This function returns array,Result is the key in array which show success and error.
 * For success ,file :uploaded file name,data:array return by CI
 * For Error , msg:Error msg   
 * 720
 */



/*
 * END FUNCTION
 * ===========================================================================================
 */

function resize_image($image, $width = FALSE, $height = FALSE, $path = FALSE) {
    if (!$width) {
        return FALSE;
    }
    $CI = & get_instance();
    $resize['image_library'] = 'gd2';
    $resize['source_image'] = $image;
    if ($path) {
        $resize['new_image'] = $path;
    }
//$resize['create_thumb'] = TRUE;
    $resize['maintain_ratio'] = TRUE;
    $resize['width'] = $width;
    $resize['height'] = $height;
    $CI->load->library('image_lib', $resize);
//$CI->image_lib->initialize($resize);
    return $CI->image_lib->resize();
}

//function is for get the thumbnail name of image

function get_thumb_name($path, $image) {
    if (file_exists($path . $image)) {
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = pathinfo($image, PATHINFO_FILENAME);
        if (file_exists($path . $filename . '_thumb.' . $ext)) {
            return $filename . '_thumb.' . $ext;
        }
    }
}

/*
 * function to unlink the file
 */

function remove_image($path, $image) {
    if ($image != '') {
        if (file_exists($path . $image)) {
            unlink($path . $image);
        }
    }
}


/* =============================================
 * This function is use for check uniqe email by email id
 */

function get_unique_user_by_email($email) {
    $ci = &get_instance();
    $ci->db->select('id,verify_email_status,status,password,roll_type');
    $ci->db->from('tbl_users');
    $ci->db->where('email', $email);
    $ci->db->where('delete_status', 0);
    $query = $ci->db->get();
//echo $ci->db->last_query();die;
    if ($query->num_rows() > 0)
        return $query->row_array(); //Already exist 
    else
        return FALSE; // Unique user
}

/* =============================================
 * This function is use for check uniqe username
 */

function get_unique_username($user_id = false, $username = "") {
    $ci = &get_instance();
    $ci->db->select('id');
    $ci->db->from('tbl_users');
    $ci->db->where('username', $username);
    if ($user_id) {
        $ci->db->where_not_in('id', $user_id);
    }
    $ci->db->where('delete_status', 0);
    $query = $ci->db->get();
//echo $ci->db->last_query();die;
    if ($query->num_rows() > 0)
        return FALSE; //Already exist 
    else
        return TRUE; // Unique user
}

/* =============================================
 * This function is use for check uniqe username
 */



/*
 * This function is use for change common status and pas (id, status, table)
 */

function setstatus($id, $status, $table) {
    $CI = & get_instance();
    $CI->db->set('status', $status);
    $CI->db->where('id', $id);
    $CI->db->update($table);
    if ($CI->db->affected_rows()) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

/*
 * This function is use for delete common status and pas (id, delete_status, table)
 */

function delete_status($id, $table) {
    $CI = & get_instance();
    $CI->db->set('delete_status', 1);
    $CI->db->where('id', $id);
    $CI->db->update($table);
    if ($CI->db->affected_rows()) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}


function isValidEmail($email) {
    $pattern = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-z]{2,12})$/";
    if (preg_match($pattern, $email)) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

/*
 * function to check & get image is exist or not
 */

function getFile($arr) {
    $image = '';

    if (is_array($arr)) {
        asort($arr);
        foreach ($arr as $k => $value) {
            if (file_exists($value)) {
                $image = $value;
            }
        }
    }
    return $image;
}

/*
 * function to show 404 error at front
 */

function pageNotFound() {
    $CI = &get_instance();
    $data['title'] = "404 Page Not Found";
    $data['module'] = "tamplate";
    $data['view_file'] = "404";
    $CI->tamplate->front($data);
}

/* =================== Get roll type of user ===============
  @Return  'string'
 */

function getRollTypeSlug() {
    $ci = &get_instance();
    if ($ci->session->userdata('is_login') != "") {
        $id = $ci->session->userdata('roll_type');
        $ci->db->select('slug');
        $ci->db->from('tbl_user_roll');
        $ci->db->where('id', $id);
        $query = $ci->db->get();
        $data = $query->result_object();
        return $data[0]->slug;
    }
    else
        return false;
}

//END getRollType() 


/* =================== Get roll type of user ===============
  @Return  'int'
 */

function getRollType($user_id) {
    $ci = &get_instance();
    $ci->db->select('roll_type');
    $ci->db->from('tbl_users');
    $ci->db->where('id', $user_id);
    $ci->db->where('delete_status', 0);
    $query = $ci->db->get();
    $data = $query->row();
    if ($query->num_rows() > 0) {
        return $data->roll_type;
    }
    else {
        return false;
    }
}

//END getRollType() 



/* =================================================
 * This function is use for get country list
 */

function getCountry() {
    $ci = &get_instance();
    $ci->db->select('country_id,country_name,country_3_code,country_2_code');
    $ci->db->from('tbl_country');
    $ci->db->where('published', '1');
    $query = $ci->db->get();
    return $query->result_array();
}


/* =================================================
 * This function is use for get country name by country id
 */

function getCountryByCountryId($country_id) {
    $ci = &get_instance();
    $ci->db->select('country_id,country_name,country_3_code,country_2_code');
    $ci->db->from('tbl_country');
    $ci->db->where('country_id', $country_id);
    $ci->db->where('published', '1');
    $query = $ci->db->get();
    return $query->row_array();
}

//END getCountry() 


//END getCountryDialingCode() 




/* =================================================
 * This function is use for get state by country id and state code
 */

function getStateByIdStateCode($country_id = false) {
    $ci = &get_instance();
    $ci->db->select('id,code,name');
    $ci->db->from('tbl_country_zones');
    if ($country_id) {
        $ci->db->where('country_id', $country_id);
    }

// if ($state_code) {
//     $ci->db->where('code', $state_code);    
// }  
    $query = $ci->db->get();
//echo $ci->db->last_query();die;
    return $query->result_array();
}

//END getStateByIdStateCode()




/* =================================================
 * This function is use for get state by id $flag = "active" then get active city
 */

function getState() {
    $ci = &get_instance();
    $ci->db->select('id,code,name');
    $ci->db->from('tbl_country_zones');
    $query = $ci->db->get();
//echo $ci->db->last_query();die;
    return $query->result_array();
}


/* =========================================
 * function to get the setting
 */
function getBasicSetting($param, $code = FALSE) {
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->from('tbl_options');
    $ci->db->where('setting_name', $param);
    if ($code) {
        $ci->db->where('setting_code', $code);
    }
    $query = $ci->db->get();
    return $query->row();
}



/* =========================================
 * function to create order number
 */

function createOrderNumber($id) {
    return 10000 + intval($id);
}


/*
 * function to get the current datetime
 */

function getDateTime() {
    return date('Y-m-d H:i:s');
}

/*
 * function to limit charectors 
 */

function limitChar($str, $len = 0) {
    $str = str_replace(array("\n", "\r", "<br>"), ' ', $str);
    if (strlen($str) > $len) {
        $str = wordwrap($str, $len);
        $str = explode("\n", $str);
        $str = $str[0] . ' ...';
    }
    return $str;
}

/*
 * function to limit string  
 */

function limitString($str, $end, $start = 0) {
    $str = str_replace(array("\n", "\r", "<br>"), ' ', $str);
    $str = mb_strimwidth($str, $start, $end, "...");
    return $str;
}

/*
 * function to get language
 */

function getLanguages() {
    $ci = &get_instance();
    $ci->db->select('id,lang_name,lang_code,lang_flag,status,default');
    $ci->db->from('languages');
    $ci->db->where('delete_status', 0);
    $ci->db->where('status', 1);
    return $ci->db->get()->result_array();
}

/*
 * get the language text
 */

function lang($param) {
    $ci = &get_instance();
    $word = $ci->lang->line($param);
    if ($word) {
        return $word;
    }return $param;
}

//get the country details from ip address
function getIpToCountry($ip) {
    $ch = curl_init();
    $url = 'http://api.ipinfodb.com/v3/ip-city/?key=772a0a62a94077a18ac49f84dc6a65244b3da089d527e56b0bb85f5100c0d245&ip=' . $ip . '&format=json';
// set url
    curl_setopt($ch, CURLOPT_URL, $url);

//return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
    $output = curl_exec($ch);

// close curl resource to free up system resources
    curl_close($ch);
    $json = json_decode($output, true);
    return $json;
}

/* ================================================
 * This function is use for get like 1 days 2 hours 3 min ago time
 */

function getAgoDateTime($db_date) {
    date_default_timezone_get();
    $current_date = date('Y-m-d H:i:s');

    $rem = strtotime($current_date) - strtotime($db_date);
    $day = floor($rem / 86400);
    $hr = floor(($rem % 86400) / 3600);
    $min = floor(($rem % 3600) / 60);
    $sec = floor(($rem % 60));

    $time_ago = array();

    if ($min <= 0) {
        $time_ago['sec'] = "Just now";
    }
    elseif ($day == 1) {
        $time_ago['yest'] = "Yestarday";
    }
    elseif ($day > 1) {
        $time_ago['days'] = $day . " Days ago";
    }
    else {
        if ($day)
            $time_ago['days'] = "$day Days ";
        if ($hr)
            $time_ago['hrs'] = "$hr Hrs ";
        if ($min)
            $time_ago['min'] = "$min Min ago";
    }

    return $time_ago;
}

// END getAgoDateTime($db_date);



//END checkIBAN($iban)
// This function is used to formate a price 2 decimal digits//
function formatePrice($price) {
    return sprintf('%0.2f', $price); //   return sprintf('%0.2f', round($price, 2));
}

// End //

/*
 * This function is used to encode all the applicable characters to HTML entities except '<' and '>'
 */
function my_htmlentities($string) {
    $list = get_html_translation_table(HTML_ENTITIES);
    unset($list['<']);
    unset($list['>']);
    $search = array_keys($list);
    $values = array_values($list);
    $search = array_map('utf8_encode', $search);
    $string = str_replace($search, $values, $string);
    return $string;
}

/* ======= This function is used to display formated date */

function display_date($date, $choise = 'default') {
    if (!empty($date)) {

        switch ($choise) {
            case 1:
                $val = date("F j, Y, g:i A", strtotime($date));
                break;
            case 2:
                $val = date("D M j G:i:s", strtotime($date));
                break;
            case 3:
                $val = date("F j, Y", strtotime($date));
                break; 
            case 4:
                $val = date("Y", strtotime($date));
                break;  
            case 5:
                $val = date("M j, Y", strtotime($date));
                break;    
            default:
                $val = date("d-m-Y", strtotime($date));
        }
        return $val;
    }
}

/* ============ End display_date====================== */



/* =============================================
 * This function is use for check uniqe email id 
 */

function check_unique_email($email, $id = false) {

    $ci = &get_instance();
    $user_id = false;

    if ($id) {
        $user_id = $id;
    }
    $ci->db->select('id');
    $ci->db->from('tbl_users');
    if ($user_id) {
        $ci->db->where_not_in('id', $user_id);
    }
    $ci->db->where('email', $email);
    $ci->db->where('delete_status', 0);
    $query = $ci->db->get();
//echo $ci->db->last_query();die;
    if ($query->num_rows() > 0)
        return FALSE; //Already exist 
    else
        return TRUE; // Unique user
}

/* =============================================
 * End check_unique_email
 */


/* =============================================
 * This function is use to get the primary address
 * 
 */

function getPrimaryAddress($user_id) {
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->from('tbl_customers_address_bank');
    $ci->db->where('customer_id', $user_id);
    $ci->db->where('address_type', 1);
    $ci->db->where('deleted', 0);
    $query = $ci->db->get();
    return $query->row_array();
}



/* =============================================
 * End getProductDetails
 */

/* =============================================
 * This function is use to get the price of user level for product
 * 
 */

function getProductLevelPrice($product_id, $country_id, $level_id) {
    $ci = &get_instance();
    $fields = 'pp.*,pct.tax_amount';
    $ci->db->select($fields);
    $ci->db->from('product_price as pp');
    $ci->db->join('product_country_taxes as pct', 'pp.tax_id=pct.id', 'inner');
    $ci->db->where('pct.country_id', $country_id);
    $ci->db->where('pct.product_id', $product_id);
    $ci->db->where('pct.status', 1);
    $ci->db->where('pp.product_id', $product_id);
    $ci->db->where('pp.level_id', $level_id);
    $ci->db->where('pp.status', 1);
    $query = $ci->db->get();
    return $query->row_array();
}


//__________________________________________________
/* =============================================
 * This function is used to unset user session (front). 
 * 720
 */

function unsetLoginUserSession() {
    $ci = &get_instance();
    $newdata = array(
        'user_id' => '',
        'is_login' => FALSE,
        'roll_type' => ''
    );
    $ci->session->unset_userdata($newdata);
}

/* =============================================
 * End isDealerHasUID
 */



/* =================================================================
 * This function is to check if email domain is blocked or not
 * 720
 */

function checkEmailDomain($email_id) {
    if (!isValidEmail($email_id)) {
        return FALSE;
    }
    $email_part = explode("@", $email_id);
    if (!isset($email_part)) {
        return FALSE;
    }
    $ci = &get_instance();
    $ci->db->select("name");
    $ci->db->from("tbl_blocked_email_domain");
    $ci->db->where(array('name' => $email_part[1], "status" => "1"));
    $query = $ci->db->count_all_results();
    if ($query) {
        return FALSE;
    }
    return TRUE;
}


/* ==========================================================================================================
 * This function is to get the default roll level of given roll type
 * 530
 */

function getUserRoll($roll_type) {

    $ci = &get_instance();
    $ci->db->select("slug");
    $ci->db->from("tbl_user_roll");
    $ci->db->where(array("id" => $roll_type));
    $result = $ci->db->get()->row_array();
    return $result;
}


/* ===================================================================================================
 * This function is used to upload avatar
 * 720
 */

function uploadAvatar() {
    $CI = get_instance();

// You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('profile'); //need to check which profile model will be called

    $user_id = $CI->session->userdata('user_id');
    $response_array = Array("result" => "error");

    if (!$user_id) {
        echo json_encode($response_array);
        die;
    }

    $upload_path = './public/uploads/avatar/';
    $CI->profile->id = $user_id;
    $data = $CI->profile->get_users_avatar($CI->profile->id);
    if ($data['avatar'] && $data['avatar'] != "user-placeholder.jpg") {
        remove_image($upload_path, $data['avatar']);
    }

    if (!$_FILES['avtar_image']['name']) {
        echo json_encode($response_array);
        die;
    }

    $image_info = @getimagesize($_FILES["avtar_image"]["tmp_name"]);
    if ($image_info && isset($image_info[0]) && isset($image_info[1]) && $image_info[0] == 250 && $image_info[1] == 250) {

        $field_name = 'avtar_image';
        $upload = uploadFile($field_name, array("upload_path" => $upload_path));
        if ($upload["result"] === "success") {
            $CI->profile->avatar = $upload["file"];
            if ($CI->profile->users_save()) {
                $response_array["result"] = "success";
                echo json_encode($response_array);
                die;
            }
            else {
                remove_image($upload_path, $upload["file"]);
                echo json_encode($response_array);
                die;
            }
        }
        else {
            echo json_encode($response_array);
            die;
        }
    }
    else {
        echo json_encode($response_array);
        die;
    }
}

/* ==========================================================================================
 * END
 */


/* ===============================================
 * This function is use for display user details with address without delete status
 */




/* ==================== End VAT validation ===================== */

function update_refer_url($users_id) {
    $refer_url = get_refer_url($users_id);
    $ci = &get_instance();
    $ci->db->where(array("id" => $users_id, "delete_status" => 0));
    $ci->db->update('tbl_users', array("refer_url" => $refer_url));
}

/*
 * END FUNCTION
 * ======================================================================================================================================= */


/* =======================================================================================================================================
 * 
 * 720
 */

function get_refer_url($users_id, $decode = FALSE) {
    if (!$decode) {
        $refer_url = base_url() . "referral-signup/" . base64_encode($users_id * 10000);
        return $refer_url;
    }
    else {
        $id = base64_decode($users_id);
        if ($id && is_numeric($id)) {
            return (int) ($id / 10000);
        }
        else {
            return FALSE;
        }
    }
}

/*
 * END FUNCTION
 * ======================================================================================================================================= */

function _handle(&$item, $k, $data) {
    $item->downline_level = $data["a"];
}





/*
 * This function is used to format the price to two decimal places.
 * Alternative to formatePrice() including the functionality for operation like 0.6 => 0.60
 * @params $price : value to formatted
 * @return String
 * created by :- 808
 */

function formatMoney($price) {
    return money_format("%i", $price);
}

//END formatMoney()

/*
 * This function is use for redirect if admin user Login if session not set
 * @created by : 808
 */

function isAdminUserLoggedIn() {
    $ci = &get_instance();
    if (!$ci->session->userdata('admin_user_id') || !$ci->session->userdata('admin_user_logged_in')) {
        if ($ci->input->is_ajax_request()) {
            if (function_exists('apache_request_headers')) {

                $request_type = explode(',', apache_request_headers()['Accept'])[0];
                if ($request_type == 'application/json') {
                    echo json_encode('logout');
                }
                else {
                    echo 'logout';
                }
            }
            else {
                echo 'logout';
            }

            exit();
        }
        redirect("uadmin");
    }
}

/* =====================================
 * This function is use for redirect if admin user Loggedin
 * @created by : 808
 */

function checkAdminUserLoggedIn() {
    $ci = &get_instance();
    if ($ci->session->userdata('admin_user_id') && $ci->session->userdata('admin_user_logged_in')) {
        redirect("admin-user-dashboard");
    }
}

//END checkAdmminLoggedIn();



/*============================== This function is used for check vat of company =================================*/

function companyUidCheck($uid){
    $ci = &get_instance();
    $code = substr($uid, 0,2);
    $vat =  substr($uid, 2);
    
    $codes = $ci->config->item('vat_code');
    if(!in_array($code, array_keys($codes))){
        return json_encode(array('error_status'=>1,'msg'=>lang("common_message_invalid_uid_data")));
    }

    $check_arr = viesCheckVAT($code,$vat); // return array

    if(is_array($check_arr) and count($check_arr)>0){
   
        if($check_arr['valid'] == 'true'){
          $check_arr['valid'] = 1;
        }else{
          $check_arr['valid'] = 0;
        }
        if($check_arr['name'] == '---'){
          $check_arr['name'] = lang('common_n/a');
        }
        if($check_arr['address'] == '---'){
          $check_arr['address'] = lang('common_n/a');
        }
        $check_arr['error_status'] = 0;
        return json_encode($check_arr);
    }else{
        return json_encode(array('error_status'=>1,'msg'=>lang("common_message_invalid_uid_data")));
    }
  
}//END vatValidation

/*======================================================================
* This function is used to get total register player
* 773
*/
 
 /*=============================================
*This function is use for get active player whose player can log in from front end.
*/
function getTotalActivePlayer() {
        $ci = &get_instance();
        $ci->db->select("id");
        $ci->db->from('tbl_users');
        $ci->db->where('delete_status', '0');
        $ci->db->where('status', '1');
        $ci->db->where('is_verified', '1');
        $query = $ci->db->get();
        //echo $CI->db->last_query();die;
        return $query->result_array();
}

function getTotalPlayersCount() {
    $ci = &get_instance();
    $ci->db->select("id");
    $ci->db->from('tbl_users');
    $ci->db->where('delete_status', '0');
    $ci->db->where('status', '1');
    $query = $ci->db->get();
    return $query->result_array();
}// END getPlayersCount()

/*======================================================================
* This function is used to get total contact user
*/
function getContactCount() {
    $ci = &get_instance();
    $ci->db->select("id");
    $ci->db->from('tbl_contact_admin');
    $ci->db->where('delete_status', '0');
    $ci->db->where('contact_by', 'front');
    $ci->db->group_by('email');
    $query = $ci->db->get();
    //echo $ci->db->last_query();die;
    return $query->result_array();
}

function cardTypeName($number) {
    $number = preg_replace('/[^\d]/', '', $number);
    if (preg_match('/^3[47][0-9]{13}$/', $number)) {
        return 'American Express';
    }
    elseif (preg_match('/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/', $number)) {
        return 'Discover';
    }
    elseif (preg_match('/^6(?:011|5[0-9][0-9])[0-9]{12}$/', $number)) {
        return 'Discover';
    }
    elseif (preg_match('/^(?:2131|1800|35\d{3})\d{11}$/', $number)) {
        return 'JCB';
    }
    elseif (preg_match('/^5[1-5][0-9]{14}$/', $number)) {
        return 'MasterCard';
    }
    elseif (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $number)) {
        return 'Visa';
    }
    else {
        return 'Unknown';
    }
}



/* =====================================
 * This function is use for get user infor by id
 */
function getUserInfoById($user_id) {
    $CI = & get_instance();
    $CI->db->select('user.id, user.email, user_det.first_name, user_det.last_name, user_det.user_id');
    $CI->db->from('tbl_users user');
    $CI->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
    $CI->db->where('user.status', '1');
    $CI->db->where('user.delete_status', '0');
    $CI->db->where('user.id', $user_id);
    $data = $CI->db->get();
    $result = $data->row_array();
    return $result;
}


/* =====================================
 * This function is use for get image count
 */
function getImageCount() {
    $CI = & get_instance();
    $CI->db->select('id as image_count, filename');
    $CI->db->from('tbl_images');
    $CI->db->where('player_id', $CI->session->userdata('player_id'));
    $CI->db->where('user.delete_status', '0');
    $CI->db->where('user.id', $user_id);
    $data = $CI->db->get();
    $result = $data->num_rows();
    return $result;
}//END getTotalImageCount()


/* =====================================
 * This function is use for get video count
 */
function getTotalVideoCount() {
    $CI = & get_instance();
    $CI->db->select('id as video_count, filename');
    $CI->db->from('tbl_videos');
    $CI->db->where('player_id', $CI->session->userdata('player_id'));
    $data = $CI->db->get();
    $result = $data->num_rows();
    return $result;
}//END getTotalVideoCount()



 /*===========================================================================*/