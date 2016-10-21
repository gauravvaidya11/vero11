<?php  

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Players extends Static_Controller {

	private $user_table = "tbl_users";
    function __construct() {
        parent::__construct();
        $this->load->model("player_model");
        
    }

    public function index() {
        $data['module'] = "players";
        $data['view_file'] = "player_management";
        $this->template->front($data);
    }

    public function player_list() {
        add_admin_plugin(array('bootbox/bootbox.min.js', 'data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        add_admin_js(array('core/datatable.js', 'custom/common_js/table-ajax.js', 'custom/player_js/players.js'));
        $data['title'] = "Players";
        $data['module'] = "players";
        $data['view_file'] = "player_management";
        $data['breadcrumb'] = array('Home' => "Home", 'Player Management' => 'Player Management', 'All PLayers' => 'All PLayers' );
        
        $players = $this->player_model->get_players();
        $data['player_list'] = $players; 

        $this->template->admin($data);
    }

    public function getAllPlayers() {
        $obj = new player_model;
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
            4 => 'email',
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

        if (!empty($requestData['email'])) {
            $search['email'] = $requestData['email'];
        }

        $search = (object) $search;

        $obj->sort_by = $columns[$requestData['iSortCol_0']];
        $obj->sort_order = $requestData['sSortDir_0'];

        // start

        $obj->offset = intval($requestData['iDisplayStart']);

        $records_count = $obj->get_players_count($search); 

        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $obj->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $obj->get_players($search, $obj->sort_by, $obj->sort_order, $obj->limit, $obj->offset);

        $sEcho = intval($_REQUEST['sEcho']);

        // INITIALISE RETURN JSONDATA
        $jsondata = array();
        $jsondata["aaData"] = array();

        $i = 1;
        foreach ($records as $record) {
            $html = '';

            $html .='<div class="dropdown"><button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="username">Action</span>
            <i class="fa fa-angle-down"></i></button>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">';
            
            if ($record->status == 1) {
                $html .='<li><a id="status_' . $record->id . '" class="set-status btn btn-sm green" rel="' . $record->id . '" title="Active" href="javascript:void(0)">
             <i class="fa fa-check-circle"></i>
             </a></li>';
            }

            else {
                $html .='<li><a id="status_' . $record->id . '" class="set-status btn btn-sm red" rel="' . $record->id . '" title="Deactive" href="javascript:;">
                           <i class="fa fa-check-circle"></i>
                        </a></li>';
            }

           
            $html .='<li><a class="btn btn-sm blue" rel="' . $record->id . '" title="Edit" href="' . BASE_URL . 'admin-player-details/' . $record->id . '">
                     <i class="fa fa-edit"></i> View Detail</a></li>';

            $html .='<li><a id="delete_status_' . $record->id . '" rel="' . $record->id . '" class="delete-status btn btn-sm red filter-cancel" title="Delete" href="javascript:void(0);">
                     <i class="fa fa-trash-o"></i> Delete</a></li>';

            $html .='</ul></div>';

             
            

            $jsondata["aaData"][] = array(
                $i,
                $record->id,
                $record->first_name,
                $record->last_name,
                $record->email,
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

    public function show_player_details($id) {
        // print_r($id);
        // exit();
        //add_admin_plugin(array('bootbox/bootbox.min.js', 'data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        add_admin_js(array('custom/player_js/players.js'));
        $data['title'] = "Players";
        $data['module'] = "players";
        $data['view_file'] = "player_details";
        $data['breadcrumb'] = array('Home' => "Home", 'Player Management' => 'Player Management', 'All PLayers' => 'All PLayers' );
        
        $data['player_info'] = $this->player_model->get_player_info($id);
        
        if(empty($data['player_info'])){
            redirect(BASE_URL.'admin-player-list');
        }
         
        $data['player_images'] = $this->player_model->get_player_images($id);
         
        $data['player_biography'] = $this->player_model->get_player_biography($id);
         
        $data['player_videos'] = $this->player_model->get_player_videos($id);
         
        $this->template->admin($data);
    }

    // public function get_player_detail() {

    //     $player_id = $this->input->post('player_id');
    //     $data = $this->player_model->get_player_info($player_id);
    //     echo json_encode($data);
    // }


    public function setStatus() {
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        if ($id != "" && $status != "" && $this->user_table != "") {
            $result = setstatus($id, $status, $this->user_table);
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
    }

//END setStatus();


    /*==================================================
     * This function is use for set delete status
     */
    public function deleteStatus() {
        $id = $this->input->post("id");
        if ($id != "" && $this->user_table != "") {
            $result = delete_status($id, $this->user_table);
            if ($result == "TRUE") {
                echo json_encode(array('type' => 'success', 'msg' => 'Record deleted successfully.'));
            }
            else {
                echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
            }
        }
        else {
            echo json_encode(array('type' => 'error', 'msg' => 'Somthing wrong please try again.'));
        }
    }


}
