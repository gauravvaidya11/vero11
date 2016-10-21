<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customers extends Front_Controller {

    function __construct() {
        parent::__construct();
        isUserLoggedIn();
        $this->load->model('profiles/profile');
        $this->load->model('customers/customer');
    }

    /* =====================================
     * This function is use for redirect if user Loggedin
     */

    public function checkFrontLoggedIn() {

        if ($this->session->userdata('user_id')) {
            redirect("dashboard");
        }
    }

    //END checkFrontLoggedIn();

    /*
     * This function is used to add customer
     * 808
     */

    public function addCustomer() {
        isUserLoggedIn();
        dashboard_add_plugin_js(array('bootbox/bootbox.min.js','jquery.form.js', 'jquery-validation/dist/jquery.validate.min.js', 'bootstrap-datepicker/js/bootstrap-datepicker-new.js'));
        dashboard_add_plugin_css(array('bootstrap-datepicker/css/datepicker-new.css'));

        dashboard_add_footer_js(array('custom/customer_js/customer.js'));
        add_common_footer_js(array("js/map.js"));

        $roll_type = $this->session->userdata('roll_type');
        switch ($roll_type) {
            case 2:
                $slug = "dealer";
                break;
            case 3:
                $slug = "distributor";
                break;
            case 6:
                $slug = "business";
                break;
            case 7:
                $slug = "coach";
                break;
            default:
                redirect('login');
                exit();
        }
        $data['dialing_code'] = get_country_dialing_code();
        $data['tag'] = lang("common_add_customer");
        $data['title'] = lang("common_add_customer");
        $data['module'] = "customers";
        $data['view_file'] = "front/add_customer";
        $data['breadcrumb'] = array('Home' => "$slug/dashboard", $data['tag'] => '');

        $this->tamplate->common_template($data);
    }

    // END addCustomer

    /*
     * This function is used submit form of new customer
     * 808
     */
    public function saveNewCustomer() {
        //checkUserIfLogin('true');

        $obj = new Customer();

        $email_id = $this->input->post('email');
        $parent_id = $this->session->userdata('user_id');
        $if_email_exist = get_unique_user_by_email($email_id);
        if ($if_email_exist !== FALSE) {
            $this->session->set_flashdata('error', lang("common_message_session_expried"));
            redirect('add-customer'); //if email id is in main table
            exit();
        }

        $this->load->helper('my_email');

        if ($this->form_validation->runcollback($this, 'add_customer') === TRUE) {
            $country_info = getCountryById($this->input->post('country'));
            $zone_info = getZoneById($this->input->post('state'), $this->input->post('country'));
            $check_dialing_code = getCountryById($this->input->post('country_dailing_code'));

            if (!count($country_info) || !count($zone_info) || !count($check_dialing_code)) {
                $this->session->set_flashdata('error', lang("user_second_step_validation_msg"));
                redirect('add-customer');
                exit();
            }




            if (!get_unique_username(false, $this->input->post('username'))) {
                $this->session->set_flashdata('error', lang("common_message_session_expried"));
                redirect('add-customer');
                exit();
            }


            $owner_roll_type = getRollType($parent_id);
            $old_owner_id = $parent_id;

            if ($owner_roll_type == 7) {
                $result_coach = $obj->get_coach_relation(false, $parent_id);
                if ($result_coach && count($result_coach)) {
                    $parent_id = $result_coach->parent_id;
                }
            }



            $user_register_type = $this->getRegisterTypeReffer($parent_id);

            $email_token = md5(str_rand(6, 'alphanum'));


            $userdata['user_info'] = array(
                'username' => $this->input->post('username'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'country_dailing_code' => $this->input->post('country_dailing_code'),
                'gender' => $this->input->post('gender'),
                'mobile' => $this->input->post('mobile'),
                'email' => $email_id,
                'email_token' => $email_token,
                //'address' => $this->input->post('address'),
                'street_address' => $this->input->post('street_address'),
                'street_number' => $this->input->post('street_number'),
                'city' => $this->input->post('city'),
                'zone_id' => $this->input->post('state'),
                'post_code' => $this->input->post('post_code'),
                'country_id' => $this->input->post('country'),
                'roll_type' => 4,
                'register_type' => $user_register_type,
                'initial_registration_type' => $user_register_type,
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'last_login' => '0000-00-00 00:00:00',
                'created_at' => getDateTime(),
                'status' => 1,
                'roll_level' => getDefaultRollLevel(4) ? getDefaultRollLevel(4)->id : 0,
                'extra_register_type' => 1//1 for customers which are created by account
            );



            // check for valid dialing code
            $dialing_info = getCountryById($this->input->post('country_dailing_code'));
            if (!count($dialing_info)) {
                $this->session->set_flashdata('error', lang('common_message_address_error'));
                redirect('add-customer');
                exit();
            }

            // check for valid area selection
            $area_id = $this->input->post('area');
            $area_info = array('area' => '', 'area_id' => '');

            if ($area_id != '') {
                $area_data = getAreaById($area_id, $obj->zone_id);
                if (!count($area_data)) {
                    $this->session->set_flashdata('error', 'Some error on add account');
                    redirect('admin-business-user-list');
                    exit();
                }
                $area_info = array('area' => $area_data->code, 'area_id' => $area_data->id);
            }





            $customer_add = array(
                'country' => $country_info->name,
                'country_code' => $country_info->iso_code_2,
                'company' => 'Primary',
                'country_id' => $this->input->post('country'),
                'firstname' => $this->input->post('first_name'),
                'lastname' => $this->input->post('last_name'),
                'email' => $email_id,
                'phone' => $this->input->post('mobile'),
//                'address1' => $this->input->post('address'),
                'zone_id' => $this->input->post('state'),
                'zone' => $zone_info->name,
                'city' => $this->input->post('city'),
                'zip' => $this->input->post('post_code'),
                'address_type' => 1,
                'area_id' => $area_info['area_id'],
                'area' => $area_info['area'],
                'street_address' => $this->input->post('street_address'),
                'street_number' => $this->input->post('street_number')
            );

            $other_detail = array(
                "birth_day" => $this->input->post('birth_day'),
                "current_weight" => $this->input->post('current_weight'),
                "target_weight" => $this->input->post('target_weight'),
                "height" => $this->input->post('height'),
                "activity_level" => $this->input->post('activity_level'),
                "current_weight_unit" => $this->input->post('current_weight_unit'),
                "target_weight_unit" => $this->input->post('target_weight_unit'),
                "created_at" => getDateTime()
            );

            // Checking Birth-date for correct format and is valid or not
            $birthdate = $other_detail['birth_day'];
            $format = $this->config->item('birth_day_format_php');
            $date = DateTime::createFromFormat($format, $birthdate);
            if (!$date || !($date->format($format) === $birthdate)) {
                $this->session->set_flashdata('error', lang("user_second_step_validation_msg"));
                redirect('add-customer');
                exit();
            }
            $date_to_save = DateTime::createFromFormat("d/m/Y", $birthdate);
            $date_now = DateTime::createFromFormat("d/m/Y", date("d/m/Y"));
            if ($date_now < $date_to_save) {
                $this->session->set_flashdata('error', lang("user_second_step_validation_msg"));
                redirect('add-customer');
                exit();
            }
            $other_detail['birth_day'] = $date_to_save->format("d/m/Y");
            //End


            $userdata['user_other_info'] = $other_detail;

            $userdata['customer_address'] = $customer_add;

            $id = $obj->save_new_customer($userdata);


            if ($id) {

                $user_info = $obj->get_user_info_by_email($email_id);
                $verificationlink = base64_encode($email_token . "/" . $email_id);
                $sender_info = getUserDetails($this->session->userdata('user_id'));
                $success_email = sendEmailVerificationByUser($verificationlink, $email_id, $user_info, $sender_info);
                if(!$success_email){
                     $this->session->set_flashdata('error', "Some error while sending email");
                     exit();
                }

                $this->createContact($id, $owner_roll_type, $parent_id, $old_owner_id);

                $affiliate_rela_data = array("parent_id" => $parent_id,
                    "child_id" => $id,
                    "status" => 1,
                    "created_at" => getDateTime()
                );

                $obj->save_affiliated_relation_info($affiliate_rela_data);
                $obj->update_pool_info($customer_add['email']);
                $obj->delete_temp_user_info($customer_add['email']);
                $this->session->set_flashdata('success', lang("common_message_customer_created"));
                redirect('add-customer');
                exit();
            }
        }
    }

    //END saveNewCustomer()

    /*
     * This function is use for check email exist from client side
     * create-773
     */

    public function checkEmailExist() {

        $obj = new Customer();
        $email = $this->input->post('email');
        $flag = check_unique_email($email);
        echo json_encode($flag);
        exit();
    }

    //END checkEmailExist();

    /* =========================================================================================================
     * This function is use for check unique username
     */

    public function checkUniqueUsername() {
        if (!$this->input->is_ajax_request()) {
            die("Can't access directly!!");
        }
        $username = $this->input->post('username');
        $flag = get_unique_username(false, $username);
        echo json_encode($flag);
        exit();
    }

    public function username_valid($str) {

        if (preg_match("/[^a-zA-Z0-9\_\.\-]/", $str)) {
            return FALSE;
        } else if (!preg_match("/[a-zA-Z]/", $str)) {
            return FALSE;
        } else if (strlen($str) > 50) {
            return FALSE;
        }
        return TRUE;
    }

    /* ===================================================================================================
     * End function
     */

    public function checkEmailAvailable() {
        $obj = new Customer();
        $email = $this->input->post('email');
        $flag = check_unique_email($email);
        if ($flag === FALSE) {
            $this->form_validation->set_message('checkEmailAvailable', 'Email already exist.');
        }
        return $flag;
        exit();
    }

    /* ============================================================================================================
     * This function is to get create a contact relation 
     * 720
     */

    private function createContact($user_id, $owner_roll_type, $owner_id, $contact_owner_id = FALSE) {

        $obj = new Customer();

        switch ($owner_roll_type) {
            case "7":

                $obj->save_contact(array(
                    "user_id" => $user_id,
                    "main_id" => $owner_id,
                    "contact_person_id" => $contact_owner_id,
                    "status" => 1,
                    "created_at" => getDateTime()
                ));
                break;
            case "6":

                $obj->save_contact(array(
                    "user_id" => $user_id,
                    "main_id" => $owner_id,
                    "contact_person_id" => $owner_id,
                    "status" => 1,
                    "created_at" => getDateTime()
                ));
                break;
            case "2":

                $obj->save_contact(array(
                    "user_id" => $user_id,
                    "main_id" => $owner_id,
                    "contact_person_id" => $owner_id,
                    "status" => 1,
                    "created_at" => getDateTime()
                ));
                break;

            default:
                break;
        }
    }

    /*
     * End function
     * ==================================================================================================== */

    private function getRegisterTypeReffer($owner_id) {
        $user_register_type = 0;
        $new_owner_roll_type = getRollType($owner_id);



        if ($new_owner_roll_type == 2) {
            $user_register_type = 1;
        } else if ($new_owner_roll_type == 6) {
            $user_register_type = 6;
        } else if ($new_owner_roll_type == 3) {
            $user_register_type = 12;
        } else if ($new_owner_roll_type == 4) {
            $user_info = userLoggedInInfo($owner_id);
            if ($user_info && count($user_info)) {
                if ($user_info["register_type"] == "1" || $user_info["register_type"] == "2" || $user_info["register_type"] == "5") {
                    $user_register_type = 5;
                } elseif ($user_info["register_type"] == "3" || $user_info["register_type"] == "10") {
                    $user_register_type = 10;
                } elseif ($user_info["register_type"] == "4" || $user_info["register_type"] == "15") {
                    $user_register_type = 15;
                } elseif ($user_info["register_type"] == "6" || $user_info["register_type"] == "7" || $user_info["register_type"] == "8") {
                    $user_register_type = 8;
                } elseif ($user_info["register_type"] == "12" || $user_info["register_type"] == "13" || $user_info["register_type"] == "14") {
                    $user_register_type = 13;
                }
            }
        }
        return $user_register_type;
    }

}

// Close class here