<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Admin_Controller {

    private $table = 'users';
    private $pool_table = 'affiliation_pool';
    private $affil_rela_table = 'affiliate_relations';

    public function __construct() {
        parent::__construct();
        isLoggedIn();
        $this->load->model("customer");
    }

    /* =============================================
     * This function is use for display user list
     */

    public function userList() {
        $obj = new Customer();
        add_admin_plugin(array('bootbox/bootbox.min.js', 'data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        add_admin_js(array('core/datatable.js', 'custom/common_js/table-ajax.js'));
        $data['title'] = "Customer Lists";
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'Customers' => '');
        $data['module'] = "customers";
        $data['view_file'] = "admin/admin_user_list";
        $data['filter_dealers'] = $obj->get_filter_dealers();
        $this->tamplate->admin($data);
    }
    //END userList()


    /* =========================================
     * This function is use for display users details
     */

    public function viewUsersDetails() {
        add_admin_plugin(array('bootbox/bootbox.min.js'));
        add_admin_js(array('custom/customers_js/customer.js', 'custom/map_js/show_map.js'));
        add_admin_css(array('common_css/common.css'));

        $obj = new Customer();
        if ($this->uri->segment(2) && $this->uri->segment(2) > 0) {
            $id = $this->uri->segment(2);
        }
        $data['tag'] = "Customer Details";
        $data['users_details'] = $obj->view_users_details($id);
        $data['cat'] = $obj->get_bussiness_cat();
        if (empty($data['users_details'])) {
            redirect(BASE_URL.'admin-user-list');
        }
        $data['title'] = "View Customer Details";
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'All Users' => 'admin-user-list', $data['tag'] => '');
        $data['module'] = "customers";
        $data['view_file'] = "admin/user_details";
        $this->tamplate->admin($data);
    }

    // END viewDealerDetails();


    /* =========================================
     * This function is use get all Customer list
     */

    public function getAllUsers() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $obj = new Customer();

        $requestData = $_REQUEST;
        $search = [];

        // sort by
        $columns = array(
            // datatable column index  => database column name
            1 => 'life_id',
            2 => 'username',
            3 => 'first_name',
            4 => 'last_name',
            5 => 'email'
        );

        if (!empty($requestData['life_id'])) {
            $search['life_id'] = $requestData['life_id'];
        }
        if (!empty($requestData['username'])) {
            $search['username'] = $requestData['username'];
        }
        // DEALER NAME FILTER
        if (!empty($requestData['first_name'])) {
            $search['first_name'] = $requestData['first_name'];
        }

        if (!empty($requestData['last_name'])) {
            $search['last_name'] = $requestData['last_name'];
        }

        if (!empty($requestData['roll_type'])) {
            $search['roll_type'] = $requestData['roll_type'];
        }

        if (!empty($requestData['dealer_id'])) {
            $search['dealer_id'] = $requestData['dealer_id'];
        }


        $search = (object) $search;

        $obj->sort_by = $columns[$requestData['iSortCol_0']];
        $obj->sort_order = $requestData['sSortDir_0'];

        // start

        $obj->offset = intval($requestData['iDisplayStart']);

        // limit 
        $records_count = $obj->get_users_count($search);

        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $obj->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $obj->get_users($search, $obj->sort_by, $obj->sort_order, $obj->limit, $obj->offset);

        $sEcho = intval($_REQUEST['sEcho']);

        // INITIALISE RETURN JSONDATA
        $jsondata = array();
        $jsondata["aaData"] = array();


        $i = 1;
        foreach ($records as $record) {
            $html = '';
            $get_last_login = "";

            $html .='<div class="dropdown"><button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="">Action</span>
                 <i class="fa fa-angle-down"></i></button>
                 <ul class="dropdown-menu" aria-labelledby="dLabel">';

            if ($record->status == 1) {
                $html .='<li><a id="status_' . $record->id . '" class="set-status btn btn-sm green" rel="' . $record->id . '" title="Active" href="javascript:void(0);">
             <i class="fa fa-check-circle"></i>
             </a></li>';
            } else {
                $html .='<li><a id="status_' . $record->id . '" class="set-status btn btn-sm red" rel="' . $record->id . '" title="Deactive" href="javascript:void(0);"><i class="fa fa-check-circle"></i>
                        </a></li>';
            }

            $html .='<li><a data-toggle="modal" class="view_details btn btn-sm yellow" rel="' . $record->id . '" title="View" href="' . BASE_URL . 'admin-user-details/' . $record->id . '">
                     <i class="fa fa-eye"></i> View</a></li>';
            
            $html .='<li><a data-toggle="modal" class="view_details btn btn-sm blue" rel="' . $record->id . '" title="Edit" href="' . BASE_URL . 'admin-edit-customer/' . $record->id . '">
                     <i class="fa fa-edit"></i> Edit</a></li>';
            
            $html .='<li><a data-toggle="modal" id="copy_url" class="btn btn-sm purple"  rel="' . $record->id . '" href="javascript:void(0)">
              <i class="fa fa-files-o"></i> Copy Link</a></li>';

            $html .='<li><a id="delete_status_' . $record->id . '" rel="' . $record->id . '" class="delete-status btn btn-sm red filter-cancel" title="Delete" href="javascript:void(0);">
                     <i class="fa fa-trash-o"></i> Delete</a></li>';
            $html .='</ul></div>';
            if ($record->last_login != "0000-00-00 00:00:00" && !empty($record->last_login)) {
                $get_login_time = getAgoDateTime($record->last_login);
                foreach ($get_login_time as $key => $value) {
                    $get_last_login .= $get_login_time[$key];
                }
            } else {
                $get_last_login .= '<span style="color:#BB2413;">Not loggedin yet</span>';
            }

            $jsondata["aaData"][] = array(
                $i,
                $record->life_id,
                $record->username,
                $record->first_name,
                $record->last_name,
                $record->email,
                $get_last_login,
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
    }

    //END getAllUsers(); 


    /*
     * This function is use for set status
     */

    public function setStatus() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        if ($id != "" && $status != "" && $this->table != "") {
            $result = setstatus($id, $status, $this->table);
            if ($result == "TRUE") {
                echo json_encode(array('type' => 'success', 'msg' => 'Status updated successfully.'));
            } else {
                echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
            }
        } else {
            echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
        }
        exit();
    }

    //END setStatus();


    /*
     * This function is use for set delete status
     */

    public function deleteUsers() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post("id");
        if ($id != "" && $this->table != "") {
            $result = delete_status($id, $this->table);
            if ($result == "TRUE") {
                echo json_encode(array('type' => 'success', 'msg' => 'Record deleted successfully.'));
            } else {
                echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
            }
        } else {
            echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
        }
        exit();
    }

    //END deleteUsers();


    /* =============================================
     * This function is use for display all users list who add under dealer
     */

    public function viewDealerUsers() {
        $obj = new Customer();
        add_admin_plugin(array('data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        add_admin_js(array('core/datatable.js', 'custom/common_js/table-ajax.js'));
        $data['title'] = "Dealer Users";
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'Dealer Users' => '');
        $data['module'] = "customers";
        $data['view_file'] = "admin/admin_dealer_users";
        $this->tamplate->admin($data);
    }

    //END userList()

    /* =========================================
     * This function is use get all users who work under dealer
     */

    public function getDealerUsers($dealer_id) {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $obj = new Customer();

        $requestData = $_REQUEST;
        $search = [];

        // sort by
        $columns = array(
            // datatable column index  => database column name
            1 => 'id',
            2 => 'username',
            3 => 'first_name',
            4 => 'last_name',
            5 => 'email'
        );

        // DEALER NAME FILTER
        if (!empty($requestData['username'])) {
            $search['username'] = $requestData['username'];
        }
        if (!empty($requestData['first_name'])) {
            $search['first_name'] = $requestData['first_name'];
        }
        // DEALER NAME FILTER
        if (!empty($requestData['last_name'])) {
            $search['last_name'] = $requestData['last_name'];
        }
        if (!empty($requestData['email'])) {
            $search['email'] = $requestData['email'];
        }
        if (!empty($requestData['dealer_id'])) {
            $search['dealer_id'] = $requestData['dealer_id'];
        }
        $search = (object) $search;

        $obj->sort_by = $columns[$requestData['iSortCol_0']];
        $obj->sort_order = $requestData['sSortDir_0'];

        // start
        $obj->offset = intval($requestData['iDisplayStart']);

        // limit 
        $records_count = $obj->get_dealer_users_count($dealer_id, $search);

        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $obj->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $obj->get_dealer_users($dealer_id, $search, $obj->sort_by, $obj->sort_order, $obj->limit, $obj->offset);
        $sEcho = intval($_REQUEST['sEcho']);

        // INITIALISE RETURN JSONDATA
        $jsondata = array();
        $jsondata["aaData"] = array();
        $i = 1;
        foreach ($records as $record) {
            $html = '';
            $get_last_login = "";
            if ($record->status == 1) {
                $html .='<a id="status_' . $record->id . '" class="set-status btn btn-sm green" rel="' . $record->id . '" title="Active" href="javascript:void(0);">
             <i class="fa fa-check-circle"></i>
             </a>';
            } else {
                $html .='<a id="status_' . $record->id . '" class="set-status btn btn-sm red" rel="' . $record->id . '" title="Deactive" href="javascript:void(0);">
                           <i class="fa fa-check-circle"></i>
                        </a>';
            }

            $html .='&nbsp;<a data-toggle="modal" class="view_details btn btn-sm yellow" rel="' . $record->id . '" title="View" href="' . BASE_URL . 'admin-dealer-user-details/' . $record->id . '">
                     <i class="fa fa-eye"></i> View</a>';

            $html .='&nbsp;<a data-toggle="modal" class="view_details btn btn-sm yellow" rel="' . $record->id . '" title="View user contact" href="' . BASE_URL . 'admin-contract-list/' . $record->id . '">
                     <i class="fa fa-eye"></i> View contract</a>';

            $html .='&nbsp;<a id="delete_status_' . $record->id . '" rel="' . $record->id . '" class="delete-status btn btn-sm red filter-cancel" title="Delete" href="javascript:void(0);">
                     <i class="fa fa-trash-o"></i> Delete</a>';

            if ($record->last_login != "0000-00-00 00:00:00" && $record->last_login != "NULL") {
                $get_login_time = getAgoDateTime($record->last_login);
                foreach ($get_login_time as $key => $value) {
                    $get_last_login .= $get_login_time[$key];
                }
            } else {
                $get_last_login .= '<span style="color:#BB2413;">Not loggedin yet</span>';
            }

            $jsondata["aaData"][] = array(
                $i,
                $record->username,
                $record->first_name,
                $record->last_name,
                $record->email,
                $record->phone,
                $get_last_login,
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
    }

//END getDealerUsers(); 


    /*
     * This function is use for change user roll type like customer to dealer
     */

    public function createDealer() {
        $this->load->helper('my_email');
        $obj = new Customer();
        $id = $this->input->post('id');
        $result = $obj->create_dealer($id);
        if ($result == "TRUE") {
            $user_info = $obj->get_user_info_by_id($id);
            sendCreatedDealerInfo($user_info); // this email sent creade dealer notification to dealer by admin
            echo json_encode(array('type' => 'success', 'msg' => 'Action perform successfully.'));
        } else {
            echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
        }
        exit();
    }

    //END createDealer();

    /* This function is used for send customer suggestion to business user for dealership.
     *  create- 773
     */
    public function sendCustomerSuggestion() {

        add_admin_plugin(array('bootbox/bootbox.min.js'));
        add_admin_plugin(array('jquery-validation/dist/jquery.validate.min.js', 'bootstrap-fileinput/bootstrap-fileinput.js'));
        add_admin_js(array('custom/customers_js/customer.js'));
        add_admin_css(array('common_css/common.css'));

        $obj = new Customer();
        if ($this->uri->segment(2) && $this->uri->segment(2) > 0) {
            $id = $this->uri->segment(2);
        }
        $data['tag'] = "User Details";
        $data['users_details'] = $obj->view_users_details($id);
        if (empty($data['users_details'])) {
            redirect(BASE_URL.'admin-user-list'); exit();
        }

        if ($this->input->post()) {

            if ($this->form_validation->run('suggest_customer') == TRUE) {
                $cid = escapeString($this->input->post('customer_id'));
                $business_user_id = escapeString($this->input->post('business_id'));

                if ($obj->check_customer_available($cid) === FALSE) {
                    $this->session->set_flashdata('info', 'User is already in progess for dealership.');
                    redirect(BASE_URL.'admin-user-list');
                    exit();
                }

                if ($obj->check_already_suggest($cid, $business_user_id) === FALSE) {
                    $this->session->set_flashdata('info', 'User is already suggested.');
                    redirect(BASE_URL.'admin-user-list');
                    exit();
                }

                $this->load->model('dealers/dealer');
                $obj_dealer = new Dealer();

                $cat_id = escapeString($this->input->post('business_cat_id'));
                if (!count($obj_dealer->check_business_exist($cat_id))) {
                    redirect(BASE_URL.'admin-user-list');
                    exit();
                }
                $obj->customer_id = $cid;
                $obj->business_user_id = $business_user_id;
                $obj->business_cat_id = $cat_id;
                $obj->note = escapeString($this->input->post('note'));

                $obj->admin_user_id = $this->session->userdata('admin_id');
                $obj->status = 0;
                $obj->created_at = getDateTime();

                $run = $obj->save_suggestion();
                if ($run) {
                    $this->load->helper('my_email');
                    adminSuggestInvitationInfo($data['users_details']);
                    $this->session->set_flashdata('success', 'Action successfully completed.');
                    redirect(BASE_URL.'admin-user-list');
                    exit();
                } else {
                    $this->session->set_flashdata('error', 'Action not completed.');
                    redirect(BASE_URL.'admin-user-list');
                    exit();
                }
            } else {
                $this->session->set_flashdata('error', validation_errors());
                redirect(BASE_URL.'admin-suggest-customer/' . $obj->id);
                exit();
            }
        }

        $data['business_users'] = $obj->getAllBusinessUsers();
        
        //$data['display_suggest_customer'] = (empty($obj->get_parent_ids($id,3)) && empty($obj->get_parent_ids($id,6))) ? false : true ;
        if(count($obj->get_parent_ids($id,3)) == 0 && count($obj->get_parent_ids($id,6)) == 0){
            $data['display_suggest_customer'] = false;
        }
        else{
            $data['display_suggest_customer'] = true;
        }
        $data['title'] = "View User Details";
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'All Customer' => 'admin-user-list', $data['tag'] => '');
        $data['module'] = "customers";
        $data['view_file'] = "admin/suggest_for_dealership";
        $this->tamplate->admin($data);
    }

    /*
     * create - 773
     */

    public function getBusinessCategory() {
        $this->load->model('dealers/dealer');
        $obj_dealer = new Dealer();
        $id = escapeString($this->input->get('id'));
        $roll_type = getRollType($id);
        if($roll_type == 6){
            $data = $obj_dealer->get_business_by_id($id);
            $html = '<option value="">select</option>';

            if (is_array($data) and count($data)) {
                foreach ($data as $key => $value) {
                    $html .= '<option value="' . $value['id'] . '">' . $value['business_name'] . ' [' . $value['country_name'] . ']</option>';
                }
            }
            echo $html;
        }
        else if($roll_type == 3){
            $row_id = $obj_dealer->get_distributor_cat_by_id($id);
            $data = $obj_dealer->get_cat_by_row_id($row_id);
            $html = '<option value="">select</option>';

            if (is_array($data) and count($data)) {
                foreach ($data as $key => $value) {
                    $html .= '<option value="' . $value['id'] . '">' . $value['business_name'] . ' [' . $value['country_name'] . ']</option>';
                }
            }
            echo $html;
        }
        exit();
    }

    // END getBusinessCategory

    /* This function is used for changing customer to dealer by admin .
     *  create- 808
     */

    public function changeUserToDealer() {

        $obj = new Customer;
        $user_id = null;
        $cat_id = null;
        
        if ($this->input->post() && $this->input->post("id")  && $this->input->post("cat_id")) {
            $user_id = $this->input->post("id");
            $cat_id = $this->input->post("cat_id");
        } else {
            $this->session->set_flashdata('error', lang("common_message_error"));
            redirect(BASE_URL.'admin-user-list');
            exit;
        }

        $user_data = getUserDetails($user_id);
        $cat_id_test = $obj->get_bussiness_cat($cat_id);    
        if (!count($user_data) || $user_data['roll_type'] != '4' || !count($cat_id_test)) {
            $this->session->set_flashdata('error', lang("common_message_error"));
            redirect(BASE_URL.'admin-user-list');
            exit;
        }


        if (count($obj->get_dealer_relation_exist($user_id)) > 0) {
            $this->session->set_flashdata('error', lang("common_message_dealer_exist"));
            redirect(BASE_URL.'admin-user-list');
            exit;
        }

        // set customer as dealer
        $relation_data = array('parent_user_id' => 0, 'user_id' => $user_id, 'business_cat_id' => $cat_id, 'status' => 1, 'created_at' => getDateTime());
        $obj->save_relation_data($relation_data);
        $obj->roll_type = '2';
        $level_roll = getDefaultRollLevel($obj->roll_type);

        $obj->id = $user_id; // customer id
        $obj->roll_level = $level_roll->id;
        // Reset contract when customer roll type change to dealer
        $obj->contract_id = 0;
        $obj->contract_status = 0;
        $obj->working_range = getSetting('default_working_range')->setting_value;
        $obj->save();

        $obj->change_downline_register_type($user_id);

        $obj->saveCompanyDetails($user_id);
        /*
          $data = array('business_user_id' => 0,
          'user_id' => $user_id,
          'business_cat_id' => 0,
          'type' => 0,
          'count' => 0,
          'status' => 0,
          'created_at' => getDateTime());
          $obj->save_request($data);
         */
        $this->session->set_flashdata('success', "Account successfully changed to dealer.");
        redirect(BASE_URL.'admin-dealer-list'); exit();
    }

    //END changeUserToDealer()

    public function getParentIds(){
        $obj = new Customer();
        $id = $this->input->post('id');
        $roll_type = $this->input->post('roll');
        if($roll_type){
            $ids = $obj->get_parent_ids($id,$roll_type);
            echo json_encode($ids);
        }
        exit();
    }

    public function getParentUser(){
        $id = $this->input->post('id');
        $user = getUserDetails($id);
        echo json_encode($user);
        exit();
    }
    
    /*
     * This function is used to load the template for editing customer's details
     * @created by : 808
     */
    public function editCustomer($user_id){
        add_admin_plugin(array('bootbox/bootbox.min.js', 'jquery-validation/dist/jquery.validate.min.js'));
        add_admin_js(array('custom/customers_js/edit_customer.js'));
        add_common_footer_js(array("js/map.js"));
       
        $obj = new Customer();
        $data['customer_info'] = $obj->view_users_details($user_id);
        $data['title'] = "Customer Details";
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'All Customers' => 'admin-user-list', 'Customer Details' => '');
        $data['module'] = "customers";
        $data['view_file'] = "admin/edit_customer";
        $this->tamplate->admin($data);

    }
    //END editCustomer()
    
    /*
     * This function is use for check email exist from client side
     * create-773 ( Copied - 808 )
     */

    public function checkEmailExist() {

        $obj = new Customer();
        $email = $this->input->post('email');
        $id = $this->input->post('customer_id');
        $flag = check_unique_email($email, $id);
        echo json_encode($flag);
        exit();
    }

    //END checkEmailExist();
    
    /* =======================================
     * This function is use for change life account
     */

    public function changeLifeAccount() {
        $user_id = $this->input->post('dealer_id');
        $country_id = $this->input->post('country_id');
        $life_account = createLifeAccount($user_id, $country_id);
        $show = 0;
        if($user_id) $show = 1;

        if ($life_account) {
            echo json_encode(array('type' => 'success', 'msg' => 'This is your new life Account: ' . $life_account,'show'=>$show));
        } else {
            echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
        }
        exit();
    }

    //END changeLifeId();
    
    
    /*
     * This function is used to save the edited details of customer
     * @return : None
     * @created by : 808
     */
    public function saveCustomer(){
        $this->load->helper('my_email');
        $obj = new Customer();
        //pr($this->input->post());
        if($this->form_validation->run('edit_customer') == TRUE){
            
            if(!$this->input->post() && empty($this->input->post()) && count($this->input->post()) <=0 ){
                $this->session->set_flashdata('error','No data to submit');
                redirect(BASE_URL.'admin-user-list'); exit();
            }
            $obj->id = escapeString($this->input->post('customer_id'));
            
            $data['customer_info'] = $obj->view_users_details($obj->id);
            if ($data['customer_info'] === FALSE) {
                redirect(BASE_URL.'admin-user-list');  exit();
            }
            
            $email_address = escapeString(trim($this->input->post('email')));
            if (!checkEmailDomain($email_address)) {
                $this->session->set_flashdata('error','The email domain is blocked in our system.');
                redirect(BASE_URL.'admin-user-list'); exit();
            }
            
            $country_info = getCountryById(escapeString($this->input->post('country')));
            $zone_info = getZoneById(escapeString($this->input->post('state')), escapeString($this->input->post('country')));
            $dialing_info = getCountryById(escapeString($this->input->post('country_dailing_code')));
            if (!count($country_info) || !count($zone_info) || !count($dialing_info)) {
                $this->session->set_flashdata('error','Country information is not correct.');
                redirect(BASE_URL.'admin-user-list'); exit();
            }
            //=========== Check for gender ===============//

            $gender = escapeString($this->input->post('gender'));
            if(!in_array($gender, array('m','f'))){
                $this->session->set_flashdata('error','Gender should be Male or Female.');
                redirect(BASE_URL.'admin-user-list'); exit();
            }
            //=========== End gender check ==================//

            // check for valid area selection
            $area_id = $this->input->post('area');
            $area_info = array('area' => '', 'area_id' => '');
            if ($area_id != '') {
                $area_data = getAreaById($area_id, escapeString($this->input->post('state')));
                if (!count($area_data)) {
                    $this->session->set_flashdat('error','Error in Area info.');
                    redirect(BASE_URL.'admin-user-list'); exit();
                }
                $area_info = array('area' => $area_data->code, 'area_id' => $area_data->id);
            }
            
            $obj->id = escapeString($this->input->post('customer_id'));
            $obj->email = escapeString(trim($this->input->post('email')));
            $obj->first_name = escapeString($this->input->post('first_name'));
            $obj->last_name = escapeString($this->input->post('last_name'));
            $obj->street_number = escapeString($this->input->post('street_number'));
            $obj->street_address = escapeString($this->input->post('street_address'));
            $obj->gender = escapeString($this->input->post('gender'));
            $obj->post_code = escapeString($this->input->post('post_code'));
            $obj->country_id = escapeString($this->input->post('country'));
            $obj->city = escapeString($this->input->post('city'));
            $obj->country_dailing_code = escapeString($this->input->post('country_dailing_code'));
            $obj->mobile = escapeString($this->input->post('mobile'));
            $obj->zone_id = escapeString($this->input->post('state'));
            $obj->latitude = escapeString($this->input->post('latitude'));
            $obj->longitude = escapeString($this->input->post('longitude'));
            
            $id = $obj->update_customer();
            if($id){
                $customer_add = array(
                    'customer_id' => $id,
                    'country' => $country_info->name,
                    'country_code' => $country_info->iso_code_2,
                    'company' => 'Primary',
                    'country_id' => $obj->country_id,
                    'firstname' => $obj->first_name,
                    'lastname' => $obj->last_name,
                    'email' => $obj->email,
                    'phone' => $obj->mobile,
                    'zone_id' => $obj->zone_id,
                    'zone' => $zone_info->name,
                    'city' => $obj->city,
                    'zip' => $obj->post_code,
                    'address_type' => 1,
                    'street_address' => $obj->street_address,
                    'street_number' => $obj->street_number, 
                    'area_id' => $area_info['area_id'],
                    'area' => $area_info['area']);
                
                $address_updated = $obj->update_customer_address($customer_add, $id);
                
                $send_email_on_update = false;
                $user_info = $obj->get_user_info_by_email($email_address);
                
                if ($data['customer_info']['email'] != $email_address) {
                    $send_email_on_update = true;
                    $emailtoken = md5(str_rand(6, 'alphanum'));
                    $obj->email_token = $emailtoken;
                    $obj->set_email_status($id);
                    $verificatiolink = base64_encode($emailtoken . "/" . $email_address);
                    $obj->delete_temp_email($obj->email);
                    $obj->delete_aff_pool_email($obj->email);
                    $success_email = sendReEmailVerification($verificatiolink, $email_address);
                }
                
                if(!$send_email_on_update && $address_updated){
                    $success_email = sendEmailUpdateUserProfile($user_info, $obj->email);
                }
                
                $this->session->set_flashdata('success','Action Successfully Done');
                redirect(BASE_URL.'admin-user-list'); exit();
            }
            else{
                $this->session->set_flashdata('error','Some error occured');
                redirect(BASE_URL.'admin-user-list'); exit();
            }
        }
        else{
            $this->session->set_flashdata('error','Some validation error occured');
            redirect(BASE_URL.'admin-user-list'); exit();
        }
    }
    //END saveCustomer()
}

// Close class here