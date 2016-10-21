<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alert_Message extends MX_Controller {
    
     function __construct() {
        parent::__construct();
     }
     
    function front() {
        $this->load->view('index');
    }//END index()

    function admin() {
        $this->load->view('admin');
    }//EDN admin()
}