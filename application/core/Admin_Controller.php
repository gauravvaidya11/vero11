<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
|Base Model
*/

class Admin_Controller extends MX_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->module("template");
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}

	/* This function is used for check vat of company
    *  773
    */
    public function checkVatValidation($server=FALSE){

        if($this->input->post()){
          $vat = escapeString(trim($this->input->post('uid')));
          $code = escapeString(trim(strtoupper($this->input->post('vat_code'))));
          $codes = $this->config->item('vat_code');
          if(!in_array($code, array_keys($codes))){
            if($server){
              return FALSE;
            }else{
              echo json_encode(array('error_status'=>1,'msg'=>lang("common_message_invalid_uid_data")));
            }
          }

          if(strlen($vat) <= 0){
            if($server){
              return FALSE;
            }else{
              echo json_encode(array('error_status'=>1,'msg'=>lang("common_message_invalid_uid_data")));
            }
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
            
            if($server){
            	return $check_arr;
            }else{
              echo json_encode($check_arr);
            }

          }else{

            if($server){
              return FALSE;
            }else{
              echo  json_encode(array('error_status'=>1,'msg'=>lang("common_message_invalid_uid_data")));
            }
        }
      }else{   
          if($server){  return FALSE;  }else{  echo json_encode(array('error_status'=>1,'msg'=>lang("common_message_company_id_data_required")));
          }
        }
    }//END vatValidation
 
}