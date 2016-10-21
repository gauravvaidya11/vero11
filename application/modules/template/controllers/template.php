<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    /*
      |function admin()
      |param
      |return
      |used for admin theme
     */

    public function admin($data) {
        $this->load->view("admin/template", $data);
    }
    
    /*
      |function admin_user()
      |param
      |return
      |used for admin theme
     */

    public function admin_user($data) {
        $this->load->view("admin_user/template", $data);
    }

    /*
      |function front()
      |param
      |return
      |used for front theme
     */

    public function front($data) {

      //  $this->load->helper('category');        
        $this->load->view("front/template", $data);
    }

    /*
      |function business user ()
      |param
      |return
      |used for front business type theme
     */

    public function business_template($data) {
        $this->load->view("business/template", $data);
    }

// END business_dashboard()



    /*
      |function dealer ()
      |param
      |return
      |used for front dealer theme
     */

    public function dealer_template($data) {
        $this->load->view("dealer/template", $data);
    }

// END business_dashboard()


    /*
      |function user_dashboard()
      |param
      |return
      |used for front user dashboard theme
     */

    public function customer_template($data) {
        $this->load->view("customer/template", $data);
    }
    public function coach_template($data) {
        $this->load->view("coach/template", $data);
    }
    public function distributor_template($data) {
        $this->load->view("distributor/template", $data);
    }
   // END user_dashboard()

    /* This function is used for common template loading 
     * m-773
    */
    public function common_template($data) {
        $roll_type = $this->session->userdata('roll_type');
        switch ($roll_type) {
            case 2:                
                $this->load->view("dealer/template", $data);
                break;
            case 3: 
                $this->load->view("distributor/template", $data);
                break; 
            case 4: 
                $this->load->view("customer/template", $data);
                break;
            case 6: 
                $this->load->view("business/template", $data);
                break; 
            case 7: 
                $this->load->view("coach/template", $data);
                break; 
        }
    }//END common_template
    
    /*
     * This function is used to load the view for term and conditions page
     * @created by : 808
     */
    public function user_contract($data){
        $this->load->view("user_contract/template", $data);
    }
    //END common_user()


}

// Close class here