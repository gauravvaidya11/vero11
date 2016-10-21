<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('login');
    }

    /* =====================================
     * This function is use for Admin Login
     */

    public function index() {
        checkAdmminLoggedIn();
        $data['module'] = "auths";
        $data['view_file'] = "admin/index";
        $this->load->view("admin/index", $data);
    }

    /* ==========================================
     * This function is use for check admin Login
     */

    public function checkAdminLogin() {
        $data['title'] = 'Admin Login- Monofood Administrator';
        $this->load->library('form_validation');
        if ($this->form_validation->run('login') === TRUE) {
            $login = $this->login->logged_in();

            if (count($login) > 0 && !empty($login)) {
                $newdata = array(
                    'admin_id' => $login['id'],
                    'login_name' => $login['firstname'] . " " . $login['lastname'],
                    'admin_logged_in' => TRUE
                 );
                $this->session->set_userdata($newdata);
                redirect("admin-dashboard");
            }
            else {
                $this->session->set_userdata('loginerror', 'Sorry invalid username/password.');
                redirect("sadmin");
            }
        }
        else {
            $this->index();
        }
    }

    /* =====================================
     * This function is use for redirect if admin Login
     */

    public function isLoggedIn() {
        if ($this->session->userdata('admin_logged_in') === TRUE) {
            redirect("sadmin");
        }
    }

    /* =====================================
     * This function is use for Logout
     */

    public function logout() {
        $newdata = array(
            'admin_id' => '',
            'login_name' => '',
            'admin_logged_in' => FALSE
        );
        $this->session->unset_userdata($newdata);
        redirect("sadmin");
    }

    /* =========================================
     * This function is use for get state by country id
     */

    public function getStateByCountryId() {
        $countryid = $this->input->post('countryid');
        $state = getStateById($countryid, $flag = "");
       // pre($state);
        $flag = true;
        $html = '';
        if (!empty($state)) {
            $html .= '<option value="">--Select State--</option>';
            foreach ($state as $result) {
               
                    $html .= '<option data-ref="' . $result['code'] . '" value="' . $result['id'] . '">' . $result['name'];
                    $html .= '</option>';
                
            }
        }
        $check = 0;
        if ($flag) {
            $check = 1;
        }

        $data = array('html' => $html, 'flag' => $check, 'country_dialing_code' => $countryid);
        echo json_encode($data);
        die;
    }

    /* ===================================================================================================
     * End function
     */

    /* ====================================================================================================
     * This function is use for get state by country id and
     */

    public function getStateByCountryIdStateCode() {
        $countryid = $this->input->post('countryid');
        $state_code = $this->input->post('state_code');
        $state = getStateByIdStateCode($countryid);
        $country_dailing_code = getCountryDialingCode($countryid);
        $html = '';
        $flag = true;
        if (!empty($state)) {
            $html .= '<option value="">--Select State--</option>';
            foreach ($state as $result) {
                if ($result['code'] == $state_code) {
                    $flag = false;
                    $html .= '<option data-ref="' . $result['code'] . '" value="' . $result['id'] . '" selected>' . $result['name'];
                    $html .= '</option>';
                } else {
                    $html .= '<option data-ref="' . $result['code'] . '" value="' . $result['id'] . '">' . $result['name'];
                    $html .= '</option>';
                }
            }
        }
        $check = 0;
        if ($flag) {
            $check = 1;
        }

        $data = array('html' => $html, 'flag' => $check, 'country_dialing_code' => $countryid);
        echo json_encode($data);
        die;
    }

    /* ===================================================================================================
     * End function
     */

    public function getAreaByZoneId() {
        $zone = $this->input->post('zone_id');
        $state = getCityById($zone, $flag = "active");

        $html = '';
        $html .= '<option value="">--Select Area--</option>';
        if (!empty($state)) {

            foreach ($state as $result) {
                $html .= '<option value="' . $result['id'] . '">' . $result['code'];
                $html .= '</option>';
            }
        }
        $data = array('html' => $html);
        echo json_encode($data);
        die;
    }

    /* ===================================================================================================
     * End function
     */

    public function getUrlData(){
        $id = $this->input->get('uid');
        if($id > 0){
            $data =  getUserDetails($id);
            if($data != false){
                $url = get_refer_url($id);
                echo json_encode(array('fullname'=>$data['first_name'].' '.$data['last_name'],'life_id'=>$data['life_id'],'refer_url'=>$url));
            }
        }
       
    }

}

// close class here
