<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {
    
     function __construct() {
        isAdminLoggedIn();
        parent::__construct();
        $this->load->model('dashboard');
        
     }

    /*=======================================
    * This function is use for dashboard
    */
    function index() {
       $dashboard_obj  = new Dashboard();

       $data['title'] = "Dashboard";
       $data['breadcrumb']  = array('Home'=>'admin-dashboard');
       add_common_footer_js(array('js/image_crop.js'));
       add_common_css(array('plugin/crop/css/cropper.css'));
       
       $data['module'] = "dashboards";
       $data['view_file'] = "admin/index";
       $this->template->admin($data); 
    }


}// close class here 