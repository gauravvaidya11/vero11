<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Breadcrumb extends MX_Controller {
    
     function __construct() {
        parent::__construct();
        $this->load->module("breadcrumb");
     }
      
    function front($page = NULL){
      if(is_array($page)){
        $this->load->view('front',$page);
      }
    }//END index();

    function admin($page = NULL) {
      if(is_array($page)){
        $this->load->view('admin',$page);
      }
    }//END admin()
}