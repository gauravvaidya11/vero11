<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coach extends Front_Controller {
    
     function __construct() {
        parent::__construct();
        isUserLoggedIn();
        //0 hide ; 1 show;
        $dev_mode = getSetting('default_development_mode')->setting_value;
        if ($dev_mode == 0) {
            checkUserIfLogin(TRUE);
        }
        if($this->session->userdata['roll_type'] != '7') // check if coach login
            checkUserIfLogin();
        $this->load->model('customer');
     }

     /* This function is used to get all customers of particular coach.
    * create -808
    */
    public function myCustomers(){
        $obj = new Customer();        
           
        dashboard_add_plugin_js(array('bootbox/bootbox.min.js',  'bootstrap-fileinput/bootstrap-fileinput.js', 'data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        
        dashboard_add_footer_js(array('custom/common_js/table-ajax.js', 'custom/common_js/datatable.js', 'custom/common_js/app.js'));
        dashboard_add_plugin_css(array('bootstrap-fileinput/bootstrap-fileinput.css', 'data-tables/DT_bootstrap.css', 'bootstrap/css/bootstrap.min.css'));
        dashboard_add_css(array('common/common.css', 'plugins.css', 'style-metronic.css'));

        $data['title'] = lang("account_menu_my_customers");
        $data['tag']   = lang("account_menu_my_customers");
        $data['module'] = "customers";
        $data['breadcrumb'] = array('Home' => 'coach/dashboard', $data['tag'] => '');
        $data['view_file'] = "coach/my_customers";
        $this->tamplate->coach_template($data);

    }//END myCoaches

    /* This function is used to get all customer of particular coach
    * create -808
    */
    public function getMyCustomers() {    
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }   

        $obj = new Customer();
        $coach_uid = $this->session->userdata('user_id');
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
        if (!empty($requestData['life_id'])) {
            $search['life_id'] = $requestData['life_id'];
        }
        if (!empty($requestData['first_name'])) {
            $search['first_name'] = $requestData['first_name'];
        }
        if (!empty($requestData['last_name'])) {
            $search['last_name'] = $requestData['last_name'];
        }
        if (!empty($requestData['email'])) {
            $search['email'] = $requestData['email'];
        }
        $search = (object) $search;

        $obj->sort_by = $columns[$requestData['iSortCol_0']];
        $obj->sort_order = $requestData['sSortDir_0'];

        // start
        $obj->offset = intval($requestData['iDisplayStart']);

        // limit 
        $records_count = $obj->get_my_customers_count($coach_uid, $search);

        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $obj->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $obj->get_my_customers($coach_uid, $search, $obj->sort_by, $obj->sort_order, $obj->limit, $obj->offset);

        $sEcho = intval($_REQUEST['sEcho']);

        // INITIALISE RETURN JSONDATA
        $jsondata = array();
        $jsondata["aaData"] = array();

        $i = 1;
        foreach ($records as $record) {
            $html = '';
            $get_last_login = "";

            $html .='&nbsp;<a data-toggle="modal" class="view_details btn btn-sm btn-warning" rel="' . $record->id . '" title="View" href="' . base_url() . 'coach/customer-details/' . $record->id . '">
                     <i class="fa fa-eye"></i> '.lang("common_view").'</a>';
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
                $record->life_id,
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

        echo json_encode($jsondata);
    }

    /* This function is used for show coach details
    *  create - 808
    */
    public function viewCustomerDetails(){              
        $obj = new Customer();
        
        dashboard_add_plugin_js(array('bootbox/bootbox.min.js','jquery.form.js','bootstrap-fileinput/bootstrap-fileinput.js','jquery-validation/dist/jquery.validate.min.js'));
       
        dashboard_add_footer_js(array('custom/dealer_js/coach_processing.js','custom/dealer_js/show_map.js'));
        dashboard_add_plugin_css(array('bootstrap-fileinput/bootstrap-fileinput.css'));
        dashboard_add_css(array('common/common.css')); 

        if ($this->uri->segment(3) && $this->uri->segment(3) > 0) {
            $req_id = $this->uri->segment(3);
            $data['dedata'] = $obj->view_customer_details($req_id);
            //$data['cpdata'] = $obj->distributor_company_details($req_id);
        }else{
            redirect('coach/customer-list');
        }
        
        
        $data['title'] = lang("account_menu_my_customers");
        $data['tag']   = lang("account_menu_my_customers");
        $data['module'] = "customers";
        $data['breadcrumb']  = array('Home'=>'coach/dashboard',$data['tag']=>'');
        $data['view_file'] = "coach/view_customer";
        
        $this->tamplate->coach_template($data);  
    }
    //END viewCustomer

//End of Coach
 }