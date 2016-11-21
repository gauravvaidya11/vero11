<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Admin_Controller {
    private $payment_table = 'tbl_payment';
    private $payment_ac_table = 'tbl_payment_account';
    function __construct() {
        parent::__construct();
        isAdminLoggedIn();
        $this->load->model('paypal_model');
    }

    /*==================================================
    * This function is use for dislay payment for admin
    */
    public function paymentList() {
        add_admin_plugin(array('bootbox/bootbox.min.js', 'data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        add_admin_js(array('core/datatable.js', 'custom/common_js/table-ajax.js', 'custom/payment_js/payment.js'));
        $data['title'] = "Paymemt";
        $data['module'] = "paypal";
        $data['view_file'] = "admin/index";
        $data['breadcrumb'] = array('Home' => "Home", 'Payment Management' => 'Payment Management', 'All Payment Account' => 'All Payment Account' );
        $this->template->admin($data);
    }//DND paymentList()


    /*============================================
    *This function is use for get all payment list for admin
    */
    public function getAllPaymentAccountList() {
        $obj = new paypal_model;
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
       

        $requestData = $_REQUEST;
        $search = [];

        // sort by
        $columns = array(
            // datatable column index  => database column name
            0 => '',
            1 => '',
            2 => 'first_name',
            3 => 'last_name',
            4 => '',
            5 => ''
        );

        if (!empty($requestData['id'])) {
            $search['id'] = $requestData['id'];
        }
        if (!empty($requestData['first_name'])) {
            $search['first_name'] = $requestData['first_name'];
        }
        // DEALER NAME FILTER
        if (!empty($requestData['last_name'])) {
            $search['last_name'] = $requestData['last_name'];
        }

        

        $search = (object) $search;

        $obj->sort_by = $columns[$requestData['iSortCol_0']];
        $obj->sort_order = $requestData['sSortDir_0'];

        // start

        $obj->offset = intval($requestData['iDisplayStart']);

        $records_count = $obj->get_payment_account_count($search); 

        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $obj->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $obj->get_payment_account($search, $obj->sort_by, $obj->sort_order, $obj->limit, $obj->offset);
        //pr($records);
        $sEcho = intval($_REQUEST['sEcho']);

        // INITIALISE RETURN JSONDATA
        $jsondata = array();
        $jsondata["aaData"] = array();

        $i = 1;
        foreach ($records as $record) {
            $html = '';
            $first_name;
            $last_name;
            // $html .='<div class="dropdown"><button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            //     <span class="username">Action</span>
            // <i class="fa fa-angle-down"></i></button>
            //             <ul class="dropdown-menu" aria-labelledby="dLabel">';
            
            // if ($record->order_status == 1) {
            //     $html .='<li><a id="status_' . $record->id . '" class="set-status btn btn-sm green" rel="' . $record->id . '" title="Paid" href="javascript:void(0)">
            //  <i class="fa fa-check-circle"></i>
            //  </a></li>';
            // }

            // else {
            //     $html .='<li><a id="status_' . $record->id . '" class="set-status btn btn-sm red" rel="' . $record->id . '" title="Pending" href="javascript:;">
            //                <i class="fa fa-check-circle"></i>
            //             </a></li>';
            // }

           
            $html .='<a class="btn btn-sm blue" rel="' . $record->id . '" title="View Detail" href="' . BASE_URL . 'admin-payment-details/' . $record->id . '">
                     <i class="fa fa-search"></i> </a>&nbsp;';

            $html .='<a id="delete_status_' . $record->id . '" rel="' . $record->id . '" class="delete-status btn btn-sm red filter-cancel" title="Delete Payment Account" href="javascript:void(0);">
                     <i class="fa fa-trash-o"></i> </a>';

            //$html .='</ul></div>';

            if($record->first_name){
                $first_name = $record->first_name; 
             }else{
                $first_name = "N/A";
            }

            if($record->last_name){
                $last_name = $record->last_name; 
            }else{
                $last_name = "N/A";
            }

            if($record->order_status==0){
                $order_status = "<span class='pending_status'>Pending</span>";
            }else{
                $order_status = "<span class='paid_status'>Paid</span>";
            }
            $jsondata["aaData"][] = array(
                $i,
                $record->id,
                $first_name,
                $last_name,
                $record->transaction_id,
                $record->amount." ". $record->currency,
                $record->payment_status,
                $order_status,
                display_date($record->payment_date,'5'),
                $html,
            );
            $i++;
        }



        if (isset($_REQUEST["sAction"]) && $_REQUEST["sAction"] == "group_action") {
            $jsondata["sStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
            $jsondata["sMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
        }

        $jsondata["sEcho"] = $sEcho;
        $jsondata["iTotalRecords"] = $iTotalRecords;
        $jsondata["iTotalDisplayRecords"] = $iTotalRecords;

        echo json_encode($jsondata); exit();
    } // END paypal_model()


    /*=====================================================
    *This function is use for payment account status
    */
    public function setPaymentAccountStatus() {
        $obj = new paypal_model;
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        if ($id != "" && $status != "" && $this->payment_ac_table != "") {
            $result = $obj->setstatus($id, $status, $this->payment_ac_table);
            if ($result == "TRUE") {
                echo json_encode(array('type' => 'success', 'msg' => 'Status updated successfully.'));
            }
            else {
                echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
            }
        }
        else {
            echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
        }
    }//END setPaymentAccountStatus();



    /*==================================================
     * This function is use for set payment account delete status
     */
    public function deletePaymentAccountStatus() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post("id");
        if ($id != "" && $this->payment_ac_table != "") {
            $result = delete_status($id, $this->payment_ac_table);
            if ($result == "TRUE") {
                echo json_encode(array('type' => 'success', 'msg' => lang("record_deleted_successfully_msg")));
            }
            else {
                echo json_encode(array('type' => 'error', 'msg' => lang("common_message_something_wrong_please_try_again")));
            }
        }
        else {
            echo json_encode(array('type' => 'error', 'msg' => lang("common_message_something_wrong_please_try_again")));
        }
    }


    /* =========================================
     * This function is use for display payment details
     */

    public function viewPaymentDetails() {
        add_admin_plugin(array('bootbox/bootbox.min.js', 'data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        add_admin_js(array('core/datatable.js', 'custom/common_js/table-ajax.js', 'custom/payment_js/payment.js'));
        add_admin_css(array('common_css/common.css'));

         $obj = new paypal_model;
        if ($this->uri->segment(2) && $this->uri->segment(2) > 0) {
            $id = $this->uri->segment(2);
        }
        $data['tag'] = "Payment Details";
        $data['payment_details'] = $obj->view_payment_details($id);
        if(empty($data['payment_details'])){
            redirect('admin-payment-list');
        }

        $data['title'] = "View Payment Details";
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'All Payment' => 'admin-payment-list', $data['tag'] => '');
        $data['module'] = "paypal";
        $data['view_file'] = "admin/payment_details";
        $this->template->admin($data);
    }//END viewPaymentDetails();


    /*============================================
    *This function is use for get all payment list for admin
    */
    public function getAllPaymentList($user_id) {
        $obj = new paypal_model;
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
       
        $requestData = $_REQUEST;
        $search = [];

        // sort by
        $columns = array(
            // datatable column index  => database column name
            0 => '',
            1 => '',
            2 => 'first_name',
            3 => 'last_name',
            4 => '',
            5 => ''
        );

        if (!empty($requestData['id'])) {
            $search['id'] = $requestData['id'];
        }
        if (!empty($requestData['first_name'])) {
            $search['first_name'] = $requestData['first_name'];
        }
        // DEALER NAME FILTER
        if (!empty($requestData['last_name'])) {
            $search['last_name'] = $requestData['last_name'];
        }

        

        $search = (object) $search;

        $obj->sort_by = $columns[$requestData['iSortCol_0']];
        $obj->sort_order = $requestData['sSortDir_0'];

        // start

        $obj->offset = intval($requestData['iDisplayStart']);

        $records_count = $obj->get_payment_count($user_id, $search); 

        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $obj->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $obj->get_payments($user_id, $search, $obj->sort_by, $obj->sort_order, $obj->limit, $obj->offset);
        //pr($records);
        $sEcho = intval($_REQUEST['sEcho']);

        // INITIALISE RETURN JSONDATA
        $jsondata = array();
        $jsondata["aaData"] = array();

        $i = 1;
        foreach ($records as $record) {
            $html = '';
            $first_name;
            $last_name;
            // $html .='<div class="dropdown"><button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            //     <span class="username">Action</span>
            // <i class="fa fa-angle-down"></i></button>
            //             <ul class="dropdown-menu" aria-labelledby="dLabel">';
            
            // if ($record->status == 1) {
            //     $html .='<li><a id="status_' . $record->user_id . '" class="set-status btn btn-sm green" rel="' . $record->user_id . '" title="Active" href="javascript:void(0)">
            //  <i class="fa fa-check-circle"></i>
            //  </a></li>';
            // }

            // else {
            //     $html .='<li><a id="status_' . $record->user_id . '" class="set-status btn btn-sm red" rel="' . $record->user_id . '" title="Deactive" href="javascript:;">
            //                <i class="fa fa-check-circle"></i>
            //             </a></li>';
            // }

           
            // $html .='<li><a class="btn btn-sm blue" rel="' . $record->id . '" title="Edit" href="' . BASE_URL . 'admin-payment-details/' . $record->id . '">
            //          <i class="fa fa-edit"></i> View Detail</a></li>';

            $html .='<a id="delete_status_' . $record->id . '" rel="' . $record->id . '" class="delete-status btn btn-sm red filter-cancel" title="Delete" href="javascript:void(0);">
                     <i class="fa fa-trash-o"></i> Delete</a>';

            //$html .='</ul></div>';

            if($record->first_name){
                $first_name = $record->first_name; 
             }else{
                $first_name = "N/A";
            }

            if($record->last_name){
                $last_name = $record->last_name; 
            }else{
                $last_name = "N/A";
            }

            if($record->order_status==0){
                $order_status = "<span class='pending_status'>Pending</span>";
            }else{
                $order_status = "<span class='paid_status'>Paid</span>";
            }

            $jsondata["aaData"][] = array(
                $i,
                $record->id,
                $first_name,
                $last_name,
                $record->transaction_id,
                $record->amount." ". $record->currency,
                $record->payment_status,
                $order_status,
                display_date($record->payment_date,'5'),
                $html,
            );
            $i++;
        }



        if (isset($_REQUEST["sAction"]) && $_REQUEST["sAction"] == "group_action") {
            $jsondata["sStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
            $jsondata["sMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
        }

        $jsondata["sEcho"] = $sEcho;
        $jsondata["iTotalRecords"] = $iTotalRecords;
        $jsondata["iTotalDisplayRecords"] = $iTotalRecords;

        echo json_encode($jsondata); exit();
    } // END paypal_model()

   
    public function setPaymentStatus() {
        $obj = new paypal_model;
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        if ($id != "" && $status != "" && $this->payment_table != "") {
            $result = $obj->setstatus($id, $status, $this->payment_table);
            if ($result == "TRUE") {
                echo json_encode(array('type' => 'success', 'msg' => 'Status updated successfully.'));
            }
            else {
                echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
            }
        }
        else {
            echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
        }
    }//END setPaymentStatus();



    /*==================================================
     * This function is use for set delete payment status
     */
    public function deletePaymentStatus() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post("id");
        if ($id != "" && $this->payment_table != "") {
            $result = delete_status($id, $this->payment_table);
            if ($result == "TRUE") {
                echo json_encode(array('type' => 'success', 'msg' => lang("record_deleted_successfully_msg")));
            }
            else {
                echo json_encode(array('type' => 'error', 'msg' => lang("common_message_something_wrong_please_try_again")));
            }
        }
        else {
            echo json_encode(array('type' => 'error', 'msg' => lang("common_message_something_wrong_please_try_again")));
        }
    }//END deletePaymentStatus()


}

// close class here