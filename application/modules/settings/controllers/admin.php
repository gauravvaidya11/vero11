<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Admin_Controller {

    function __construct() {
        parent::__construct();
        isAdminLoggedIn();
        $this->load->model("setting");
        $obj = new Setting();
    }

    /* =============================================
     * This function is use for get all paypal setting info.
     */
    function index($page = NULL) {
        add_admin_js(array('custom/settings_js/basic_setting.js'));
        $data['title'] = "Settings";
        $data['user_title'] = "Administrator";
        
        // $data['id'] = getBasicSetting('id')->setting_value;
        $data['plan_price'] = getBasicSetting('plan_price')->setting_value;
        $data['profile_image_max_size'] = getBasicSetting('profile_image_max_size')->setting_value;
        $data['profile_image_height'] = getBasicSetting('profile_image_height')->setting_value;
        $data['profile_image_width'] = getBasicSetting('profile_image_width')->setting_value;
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'Settings' => '');
        $data['module'] = "settings";
        $data['view_file'] = "admin/index";
        $this->template->admin($data);
    }

    /* =============================================
     * This function is use get basic setting page.
     */

    function saveBasicSetting($page = NULL) {
        if (!$this->input->is_ajax_request()) {
            die("No direct access allowed!");
        }
        $obj = new Setting();
        //if($this->input->post('required_field')=='required' && $this->input->post('setting_value')){
            $update_success = $obj->update($this->input->post('setting_name'), $this->input->post('setting_value'));
            if($update_success){
                echo json_encode(array('type'=>'success'));
                exit();
            }else{
                echo json_encode(array('type'=>'info'));
                exit();
            }    
        // }else{
        //     echo json_encode(array('type'=>'error'));
        //     exit();
        // }
        exit();
    }







}

// close class here