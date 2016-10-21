<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends Static_Controller {

    function __construct() {
        parent::__construct();
        $this->session->set_userdata("set_home_page", "set");
        $this->load->model("home_model");
    }

    public function index() {
        $data['module'] = "home";
        $data['view_file'] = "home";
        $this->template->front($data);
    }

    public function about_us() { 
        $data['title'] = "About Us";
        $data['module'] = "home";
        $data['about_us_history'] = $this->home_model->get_about_us_history();
        $data['view_file'] = "about_us";
        $this->template->front($data);
    }

    public function contact_us() { 
        $data['title'] = "Contact";
        $data['module'] = "home";
        $data['view_file'] = "contact_us";

        if ($this->input->post()) {  
            if ($this->form_validation->run('contact_us_validation') == FALSE) {
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto">'.$this->lang->line("please_enter_required_field").'</div>');    
                redirect(BASE_URL."home/contact_us");
            }else{
                $contact_data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'message' => $this->input->post('message'),
                    'reply_id' => '0',
                    'contact_by' => 'front',
                    'created_at' => date('Y-m-d H:i:s')
                );
                $result = $this->home_model->insert_contact_details($contact_data);                              
                if($result){
                    $this->sendMailToAdmin($contact_data);
                    $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto">'.$this->lang->line("mail_sent_successfully").'</div>');    
                    redirect(BASE_URL."home/contact_us");
                }
            }            
                
        } else {
           $this->template->front($data);
        }
    }

     public function sendMailToAdmin($data) {

        $this->load->helper('my_email');
        $subject = 'Contact';
        $message = 'Hi, '.''.$data['name'].'<br><br><br><br><br><br>'.'Thanks for Contact me:<br><br>'.' '.$data['message'];
        $to = 'shifali@mailinator.com';
        $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
    }

    public function getCountryId() {
        if (!$this->input->is_ajax_request()) {
            die("No direct script access allowed");
        }
        $country = array("id" => 81);
        if ($this->input->post("country")) {
            $country = $this->input->post("country");
            $obj = new Home_Model();
            $result = $obj->get_country_id($country);
            if ($result && count($result)) {
                $country = array("id" => $result->id);
            }
        }
        echo json_encode($country);
        exit();
    }

    public function setLanguage() {
        if (!$this->input->is_ajax_request()) {
            die("No direct script access allowed");
        }
        $flag = 0;
        if ($this->input->post('language')) {
            $language_id = intval($this->input->post('language'));
            $lang_table = $this->db->dbprefix('languages');
            $lang = $this->db->query('select id,lang_name from ' . $lang_table . ' where id=' . $language_id)->row_array();

            if ($lang) {
                $cookie = array(
                    'name' => 'my_language',
                    'value' => $language_id,
                    'expire' => '86500'
                );

                $this->input->set_cookie($cookie);
                $flag = 1;
            }
        }
        echo json_encode($flag);
        exit();
    }

}
