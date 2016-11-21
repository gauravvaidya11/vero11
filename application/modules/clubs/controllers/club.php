<?php  

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Club extends Static_Controller {

	private $user_table = "tbl_users";
    function __construct() {
        parent::__construct();
        isLoggedIn();
        $this->load->model("club_model");
        $this->player_id = $this->session->userdata('player_id');
    }


    /*==============================================================
    *This functiuon is use for get display player profile details include all player files 
    */
    public function clubProfile() {
        $data['title'] = 'Club Profile';
        $data['module'] = "clubs";
        $data['view_file'] = "front/index";
        $data['club_info'] = $this->club_model->get_club_profile_info($this->player_id);
        //pr($data['club_info']);

        if(empty($data['club_info'])){
            redirect(BASE_URL);
        }
        $this->template->front($data);
            
    }//END athleteProfile()


    /*=========================================================
    *This function is use for get club profile information
    */
    public function getClubProfileInfo() {
        if(!$this->input->is_ajax_request()){
            die("No direct access allowed");
        }
        $profile_data = $this->club_model->get_club_info($this->player_id);
        echo json_encode($profile_data);
        die();
    }


/*=================================================
*This function is use for update player profile image
*/
public function updateProfileImage(){
    if(!$this->input->is_ajax_request()) {
        die("No direct access allowed.");
    }

    if(!empty($_FILES['user_profile']['name'])){
        if ($_FILES['user_profile']['error'] != UPLOAD_ERR_NO_FILE) { 
            $uploadPath = './public/uploads/profile_image/';
            $fieldName = 'user_profile';

            $tempFile =  $_FILES['user_profile']['tmp_name'];
            $imginfo_array = getimagesize($tempFile);
            if(empty($imginfo_array)){
              $mess = array('type'=>'error', 'msg'=> $this->lang->line("invalid_image_please_try_another_valid_image"));
              echo json_encode($mess);
              exit();
            }else{
               $old_profile_imge = $this->club_model->get_profile_image_for_remove();
               if($old_profile_imge){
                    remove_image($uploadPath, $old_profile_imge['profile_image']); 
               }
               
               
               $upload = do_upload($fieldName, $uploadPath); 
               

               $playerProfile = $upload['file_name'];
                if($playerProfile){
                    chmod($uploadPath.$playerProfile,0777);
                    $profile_image_data = array('profile_image' => $playerProfile);
                    $profile = $this->club_model->update_profile($profile_image_data);
                    if($profile){
                        $profile_message = array("type"=>"success", "msg"=>$this->lang->line("profile_update_successefully"));
                        echo json_encode($profile_message);
                        exit();    
                    }else{
                       $profile_message = array("type"=>"error", "msg"=>$this->lang->line("common_message_something_wrong_please_try_again"));
                       echo json_encode($profile_message);
                       exit();  
                    }   
                }
            }     
        }
    }
}//END updateProfileImage()


    /*==============================================================
*This functiuon is use for update club profile information
*/
public function editClubProfile() {
    if (!$this->input->is_ajax_request()) {
        die("No direct access allowed!");
    }
    //pr($_POST);
    if($this->input->post()){
        if ($this->form_validation->run('club_rofile') == FALSE) {
            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
            echo json_encode($mess);
            exit();
        } else {

            $club_manager_name = escapeString($this->input->post('club_manager_name'));
            $nick_name = escapeString($this->input->post('nickname'));
            $club_name = escapeString($this->input->post('club_name'));
            $age = escapeString($this->input->post('age'));
            
            // $weight = escapeString($this->input->post('weight'));

            // $height_m = escapeString($this->input->post('height_m'));
            // $height_cm = escapeString($this->input->post('height_cm'));

            // if(($height_m) && ($height_cm || $height_cm==0)){
            //     $height = $height_m.'.'.$height_cm;
            // }
            
            
            $birthday = $this->input->post('birthday');
            
            $country = $this->input->post('country');

            // $laterality = escapeString($this->input->post('laterality'));
            // $position_1 = escapeString($this->input->post('position_1'));
            // $position_2 = escapeString($this->input->post('position_2'));
            // $position_3 = escapeString($this->input->post('position_3'));
            // $player_type = $this->input->post('player_type');

            // if($player_type==1){
            //     $hire_club_name = escapeString($this->input->post('hire_club_name'));
            // }else{
            //     $hire_club_name = "";
            // }
            

            $user_profile = array(
                'club_name' => $club_name,
                'club_manager_name' => $club_manager_name,
                'nick_name' => $nick_name,
                'age' => $age,
                'birthday' => $birthday,
                'country' => $country,
                'mobile' => escapeString($this->input->post('mobile')),
                'facebook' => escapeString($this->input->post('facebook')),
                'instagram' => escapeString($this->input->post('instagram')),
                'twitter' => escapeString($this->input->post('twitter'))
            );

            //pr($user_profile);

            $profile = $this->club_model->update_profile($user_profile);

            //$this->athlete_model->update_contact_details($contact_data);

            if($profile){
                    $profile_message = array("type"=>"success", "msg"=>$this->lang->line("profile_update_successefully"));
                    echo json_encode($profile_message);
                    exit();    
                }else{
                   $profile_message = array("type"=>"error", "msg"=>$this->lang->line("common_message_something_wrong_please_try_again"));
                   echo json_encode($profile_message);
                   exit();  
                }    
            }
        }


} // END edit();


    /*==================================================
    * This function is use for dislay clublist for admin
    */
    public function club_list() {
        
        add_admin_plugin(array('bootbox/bootbox.min.js', 'data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        add_admin_js(array('core/datatable.js', 'custom/common_js/table-ajax.js', 'custom/club_js/club.js'));
        $data['title'] = "clubs";
        $data['module'] = "clubs";
        $data['view_file'] = "admin/index";
        $data['breadcrumb'] = array('Home' => "Home", 'Club Management' => 'Club Management', 'All Clubs' => 'All Clubs' );
        
        $players = $this->club_model->get_clubs();
        $data['club_list'] = $players; 

        $this->template->admin($data);
    }//DND club_list()


    /*========================================================
    *This function is use for display player list for front end that add by club
    */
    public function playerList() {
        $user_info = userLoggedInInfo();
        if($user_info){
            if($user_info['user_type']==1){
                redirect(BASE_URL); // redirect home because this only club
            }
        }
        $data['title'] = "Player List";
        $data['module'] = "clubs";
        $data['view_file'] = "front/player_list";
        $players = $this->club_model->get_clubs();
        $data['club_list'] = $players; 
        $this->template->front($data);
    }// END playerList()


    /*=========================================================
    *This function is use for get player information
    */
    public function get_player_info() {
        if(!$this->input->is_ajax_request()){
            die("No direct access allowed");
        }

        $playerId = $this->input->post('player_id');
        
        $profile_data = $this->club_model->get_player_info($playerId);
        echo json_encode($profile_data);
        die();
    }


    /*========================================================
    *This function is use for player details by club
    */
    public function playerDetailsByClub() {
        $user_info = userLoggedInInfo();
        if($user_info){
            if($user_info['user_type']==1){
                redirect(BASE_URL); // redirect home because this only club
            }
        }
        $decode_id = base64_decode($this->uri->segment(3));
        if(is_numeric($decode_id)){
            $player_id = substr($decode_id, 5);
        }else{
          redirect(BASE_URL);
        }

        $obj = new club_model;
        $data['title'] = "Player Details";
        $data['module'] = "clubs";
        $data['view_file'] = "front/player_details_by_club";
        $data['player_info'] = $obj->get_player_details_by_club_($player_id);
        if(empty($data['player_info'])){
            redirect(BASE_URL.'player-list');   
        }
        $this->template->front($data);
    }// END favoritePlayers()


    /*============================================
    *This function is use for get all player list who add by club
    */
    public function getAllPlayers() {
        $obj = new club_model;
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

        if (!empty($requestData['player_id'])) {
            $search['player_id'] = $requestData['player_id'];
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

        $records_count = $obj->get_player_count($search); 

        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $obj->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $obj->get_players($search, $obj->sort_by, $obj->sort_order, $obj->limit, $obj->offset);

        $sEcho = intval($_REQUEST['sEcho']);

        // INITIALISE RETURN JSONDATA
        $jsondata = array();
        $jsondata["aaData"] = array();

        $i = 1;
        //pr($records);
        foreach ($records as $record) {
            $html = '';

           
            if ($record->status == 1) {
                $html .='<div class="actnBtns"><a id="status_' . $record->user_id . '" class="set-status btn btn-sm green" rel="' . $record->user_id . '" title="Active" href="javascript:void(0)">
             <i class="fa fa-check-circle"></i>
             </a></div>';
            }

            else {
                $html .='<div class="actnBtns"><a id="status_' . $record->user_id . '" class="set-status btn btn-sm red" rel="' . $record->user_id . '" title="Deactive" href="javascript:;">
                           <i class="fa fa-check-circle"></i>
                        </a></div>';
            }

            $radom_user_id = str_rand(5, 'numeric') . $record->user_id;

            $html .='<div class="actnBtns"><a class="btn btn-sm yellow" rel="' . $record->user_id . '" title="View Details" href="'.BASE_URL.'club/player-details/'.base64_encode($radom_user_id).'">
                     <i class="fa fa-eye"></i> </a></div>';

            
            $html .='<div class="actnBtns"><a class="btn btn-sm blue editPlayerProfile" rel="' . $record->user_id . '" title="Edit" href="javascript:void(0)">
                     <i class="fa fa-pencil-square-o"></i> </a></div>';

            $html .='<div class="actnBtns"><a id="delete_status_' . $record->user_id . '" rel="' . $record->user_id . '" class="delete-status btn btn-sm red filter-cancel" title="Delete" href="javascript:void(0);">
                     <i class="fa fa-trash-o"></i> </a></div>';
             
            $positions = array("1"=>lang("goalkeeper"),
                             "2" =>lang("right_wing"),
                             "3" =>lang("center_back"),
                             "4" =>lang("left_back"),
                             "5" =>lang("left_wing"),
                             "6" =>lang("defensive_mid_fielder"),
                             "7" =>lang("right_mid_fielder"),
                             "8" =>lang("left_mid_fielder"),
                             "9" =>lang("right_forward"),
                             "10" =>lang("striker"),
                             "11" =>lang("left_forward")
                        );

            $jsondata["aaData"][] = array(
                $i,
                $record->first_name,
                $record->last_name,
                $record->email,
                $positions[$record->position_1],
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


    /* ==============================================
    * This function for add player by club form
    */
    public function addPlayerForm() {
        $user_info = userLoggedInInfo();
        if($user_info){
            if($user_info['user_type']==1){
                redirect(BASE_URL); // redirect home because this only club
            }
        }
        $data['module'] = "clubs";
        $data['view_file'] = "front/add_player";
        $this->template->front($data);
    }//END playerSignupForm();


    /*======================================
    *This function is use for save player info by club
    */
    public function savePlayerByClub(){
         if ($this->input->post()) {
            
            if ($this->form_validation->runcallback($this, 'athlete_registration') == FALSE) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("please_enter_required_field").'</div>');  
                redirect(BASE_URL."add-player");
            } else {
                
                if($this->input->post('age') >= CHECK_AGE){

                        $this->password = mt_rand(10000000, 99999999);

                        $login_data = array(
                            'email' => $this->input->post('email'),
                            'password' => md5($this->password),
                            'user_type' => 1, // for player user
                            'paid_status' => $this->input->post('paid_status'),
                        );
                        $user_id = $this->club_model->save_users($login_data);

                        $weight = escapeString($this->input->post('weight'));

                        $height_m = escapeString($this->input->post('height_m'));
                        $height_cm = escapeString($this->input->post('height_cm'));

                        if(($height_m) && ($height_cm || $height_cm==0)){
                            $height = $height_m.'.'.$height_cm;
                        }

                        $laterality = escapeString($this->input->post('laterality'));
                        $position_1 = escapeString($this->input->post('position_1'));
                        $position_2 = escapeString($this->input->post('position_2'));
                        $position_3 = escapeString($this->input->post('position_3'));
                        $player_type = $this->input->post('player_type');

                        if($player_type==1){
                            $hire_club_name = escapeString($this->input->post('hire_club_name'));
                        }else{
                            $hire_club_name = "";
                        }
                        $country = escapeString($this->input->post('country'));

                        if($user_id) {

                            $this->user_data = array(
                                'user_id' => $user_id,
                                'club_id' => $this->session->userdata('player_id'),
                                'first_name' => $this->input->post('fname'),
                                'last_name' => $this->input->post('lname'),
                                'email' => $this->input->post('email'),
                                'gender' => $this->input->post('gender'),
                                'birthday' => $this->input->post('birthday'),
                                'age' => $this->input->post('age'),
                                'cpf' => $this->input->post('cpf'),
                                'weight' => $weight,
                                'height' => $height,
                                'country' => $country,
                                'laterality' => $laterality,
                                'position_1' => $position_1,
                                'position_2' => $position_2,
                                'position_3' => $position_3,
                                'player_type' => $player_type,
                                'hire_club_name' => $hire_club_name,
                                'hash' => md5(rand(0, 1000))
                            );


                            $result = $this->club_model->insertPlayerDetails($this->user_data);
                            
                            $this->biography_data = array('player_id' => $user_id);

                            $this->club_model->insert_biography($this->biography_data);
                                if ($result) {
                                    $this->send_verification_mail(); // send verification email
                                    $this->session->set_flashdata('msg', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.$this->lang->line("registration_successfull").'</div>');
                                    redirect(BASE_URL."player-list");
                                }
                                else{
                                    $this->session->set_flashdata('msg', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_username_pass").'</div>');
                                    redirect(BASE_URL."add-player");
                                }
                        }
                }
                else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("age_less_than_18").'</div>');
                    redirect(BASE_URL.'add-player');
                }

                
            }
        }
    }// END savePlayerByClub()

    /*============================================
    *This function is use for send user registration verification mail
    */
    public function send_verification_mail() {
        $result = $this->club_model->get_hash_value($_POST['email']); //get the hash value which belongs to given email from database
        $this->load->helper('my_email');
        $subject = $this->lang->line("welcome_subject");
        $message =  $this->lang->line("hi") .' '. $_POST['fname'] .' <br>' .$this->lang->line("account_created").'
        <br>-------------------------------------------------<br>
        Email   : ' . $_POST['email'] . '<br>
        Password: ' . $this->password . '<br>
        -------------------------------------------------<br>
         <a href="'.BASE_URL.'verify?email='.$_POST['email'].'&hash='.$result['hash'].'">'.$this->lang->line("cpmmon_click_here").' </a>               
        '.$this->lang->line("activate_your_account");
        $to = $_POST['email'];
        $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
    }//END send_verification_mail()


    /*====================================================
    *This function is use for for checking unique username 
    */
    public function username_check() {
        if ($this->input->is_ajax_request()) {
            $email = $this->input->post('email');
            $res = $this->club_model->check_unique_username($email);
            echo json_encode($res);
            exit();
        } else {
            $email = $this->input->post('email');
            $res = $this->club_model->check_unique_username($email);
            if ($res == TRUE) {
                return TRUE;
            } else {
                $this->form_validation->set_message('username_check', $this->lang->line('username_already_exist_error_message'));
                return FALSE;
            }
        }
    }// END username_check()


    /*============================================
    *This function is use for get all club details for admin
    */
    public function getAllClubs() {
        $obj = new club_model;
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
       

        $requestData = $_REQUEST;
        $search = [];

        // sort by
        $columns = array(
            // datatable column index  => database column name
            0 => '',
            1 => 'id',
            2 => 'club_name',
            3 => 'club_manager_name',
            4 => 'email',
            5 => ''
        );

        if (!empty($requestData['club_id'])) {
            $search['club_id'] = $requestData['club_id'];
        }
        if (!empty($requestData['club_name'])) {
            $search['club_name'] = $requestData['club_name'];
        }
        // DEALER NAME FILTER
        if (!empty($requestData['club_manager_name'])) {
            $search['club_manager_name'] = $requestData['club_manager_name'];
        }

        if (!empty($requestData['email'])) {
            $search['email'] = $requestData['email'];
        }

        $search = (object) $search;

        $obj->sort_by = $columns[$requestData['iSortCol_0']];
        $obj->sort_order = $requestData['sSortDir_0'];

        // start

        $obj->offset = intval($requestData['iDisplayStart']);

        $records_count = $obj->get_club_count($search); 

        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $obj->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $obj->get_clubs($search, $obj->sort_by, $obj->sort_order, $obj->limit, $obj->offset);

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
                $html .='<li><a id="status_' . $record->user_id . '" class="set-status btn btn-sm green" rel="' . $record->user_id . '" title="Active" href="javascript:void(0)">
             <i class="fa fa-check-circle"></i>
             </a></li>';
            }

            else {
                $html .='<li><a id="status_' . $record->user_id . '" class="set-status btn btn-sm red" rel="' . $record->user_id . '" title="Deactive" href="javascript:;">
                           <i class="fa fa-check-circle"></i>
                        </a></li>';
            }

           
            $html .='<li><a class="btn btn-sm blue" rel="' . $record->user_id . '" title="Edit" href="' . BASE_URL . 'admin-club-details/' . $record->user_id . '">
                     <i class="fa fa-edit"></i> View Detail</a></li>';

            $html .='<li><a id="delete_status_' . $record->user_id . '" rel="' . $record->user_id . '" class="delete-status btn btn-sm red filter-cancel" title="Delete" href="javascript:void(0);">
                     <i class="fa fa-trash-o"></i> Delete</a></li>';

            $html .='</ul></div>';

             
            if($record->paid_status==2){
                $paid_status = "<span class='paid'>(Paid user)</span>";
            }else{
                $paid_status = "<span class='free'>(Free user)</span>";
            }

            $jsondata["aaData"][] = array(
                $i,
                $record->user_id,
                $record->club_name,
                $record->club_manager_name,
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


    /*=========================================================
    * This function is use for display club details 
    */
    public function show_club_details($id) {
        add_admin_js(array('custom/club_js/club.js'));
        $data['title'] = "Clubs";
        $data['module'] = "clubs";
        $data['view_file'] = "admin/club_details";
        $data['breadcrumb'] = array('Home' => "Home", 'Club Management' => 'Club Management', 'All Clubs' => 'All Clubs' );
        
        $data['club_info'] = $this->club_model->get_club_info($id);
        
        if(empty($data['club_info'])){
            redirect(BASE_URL.'admin-club-list');
        }
         
        $data['club_images'] = $this->club_model->get_club_images($id);
         
        $data['club_biography'] = $this->club_model->get_club_biography($id);
         
        $data['club_videos'] = $this->club_model->get_club_videos($id);
         
        $this->template->admin($data);
    }

    
    /* =======================================================================
    * This function is use for sat status fro admin and front also
    */
    public function setStatus() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        if ($id != "" && $status != "" && $this->user_table != "") {
            $result = setstatus($id, $status, $this->user_table);
            if ($result == "TRUE") {
                echo json_encode(array('type' => 'success', 'msg' => lang('action_completed_successefully')));
            }
            else {
                echo json_encode(array('type' => 'error', 'msg' => lang("common_message_something_wrong_please_try_again")));
            }
        }
        else {
            echo json_encode(array('type' => 'error', 'msg' => lang("common_message_something_wrong_please_try_again")));
        }
    }

//END setStatus();


    /*==================================================
     * This function is use for set delete status fro admin and front also
     */
    public function deleteStatus() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post("id");
        if ($id != "" && $this->user_table != "") {
            $result = delete_status($id, $this->user_table);
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





/*==============================================================
*This functiuon is use for upload club image
*/
public function upload_club_image() {
    if (!$this->input->is_ajax_request()) {
        die("No direct access allowed!");
    }
        
        if ($this->form_validation->run('upload_player_image_validation') == FALSE) {
            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
            echo json_encode($mess);
            exit();
        } else {
            if(!empty($_FILES['image']['name'])){
                if ($_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {
                    $uploadPath = './public/uploads/player_image/';
                    $fieldName = 'image';
                    $tempFile =  $_FILES['image']['tmp_name'];
                    $imginfo_array = getimagesize($tempFile);
                    if(empty($imginfo_array)){
                      $mess = array('type'=>'error', 'msg'=> $this->lang->line("invalid_image_please_try_another_valid_image"));
                      echo json_encode($mess);
                      exit();
                    }else{
                       $uploadplayer = do_upload($fieldName, $uploadPath); 
                    }
                    //$player_image = $this->athlete_model->get_player_image();
                }
                $playerImage = $uploadplayer['file_name'];
            }else{
                $playerImage = "";
            }
        
            if($uploadplayer){
                    $image_data = array(
                    'player_id' => $this->player_id,
                    'title' => $this->input->post('image_title'),
                    'filename' => $playerImage,
                    'created_date' => date('Y-m-d')
                );

                //pr($image_data);
                $result = $this->club_model->insert_club_image($image_data);  
            }

            if($result){
                $player_message = array("insert_id"=>$result, "type"=>"success", "msg"=>$this->lang->line("action_completed_successefully"));
                echo json_encode($player_message);
                exit();    
            }else{
               $player_message = array("insert_id"=>"", "type"=>"error", "msg"=>$this->lang->line("common_message_something_wrong_please_try_again"));
               echo json_encode($player_message);
               exit();  
            }
    }
}



/*==============================================================
*This functiuon is use for update player image
*/
public function update_club_image() {
    if (!$this->input->is_ajax_request()) {
        die("No direct access allowed!");
    }

    $id = $this->input->post('imageid');
    if ($this->form_validation->run('edit_upload_player_image_validation') == FALSE) {
            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
            echo json_encode($mess);
            exit();
        } else {
            if(!empty($_FILES['image']['name'])){
                if ($_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {
                    $uploadPath = './public/uploads/player_image/';
                    $fieldName = 'image';
                    $tempFile =  $_FILES['image']['tmp_name'];
                    $imginfo_array = getimagesize($tempFile);
                    if(empty($imginfo_array)){
                        $mess = array('type'=>'error', 'msg'=> $this->lang->line("invalid_image_please_try_another_valid_image"));
                        echo json_encode($mess);
                        exit();
                    }else{
                        $upload = do_upload($fieldName, $uploadPath); 
                        $player_image = $this->club_model->get_club_image($id);
                        if($player_image){
                            remove_image($uploadPath, $player_image['filename']);
                        }
                    }
                }
                $playerImage = $upload['file_name'];
            }else{
                $playerImage = $this->input->post('hidden_player_image');
            }

            $image_data = array(
                'title' => $this->input->post('image_title'),
                'filename' => $playerImage,
            );

            $result = $this->club_model->update_club_image($image_data, $id);    
            
            
        if($result){
            $player_result = $this->club_model->get_club_image($id);
            $player_message = array("id"=>$player_result['id'], "title"=>$player_result['title'], "filename"=>$player_result['filename'], "type"=>"success", "msg"=>$this->lang->line("action_completed_successefully"));
            echo json_encode($player_message);
            exit();    
        }else{
           $player_message = array("id"=>"", "type"=>"error", "msg"=>$this->lang->line("common_message_something_wrong_please_try_again"));
           echo json_encode($player_message);
           exit();  
        }
    }
}


/*==============================================================
*This functiuon is use for upload player video
*/
public function uploadVideo() {
    if (!$this->input->is_ajax_request()) {
        die("No direct access allowed!");
    }
        $url = '';
        $this->load->helper('videos_helper');
        if ($this->form_validation->run('video_validation') == FALSE) {
            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
            echo json_encode($mess);
            exit();
        }else{
            $vidocount = "";
            $vidocount = getTotalVideoCount();

            if($vidocount){
                if($vidocount > 3){
                   $mess = array('type'=>'error', 'msg'=> $this->lang->line("sorry_you_can_not_upload_more_then_three_video"));
                    echo json_encode($mess);
                    exit(); 
                }else{

                }
            }

            $video_url = $this->input->post('video_url');
            $orignal_video_url = $this->input->post('video_url'); // this url for use update time
            $video_id = get_vine_video_url($video_url);
            //echo "video ID=> ".$video_id;die;


            $video_type = $this->input->post('video_type');
            //pr($video_type);
            
            if($video_type != 'invalid') {
                   
                if($video_type == 'vine') {
                    $video_id = basename($video_url);
                    //echo $video_id;die;
                    $thumb_image = getVineVideoThumb($video_id);
                    //$thumb_image = get_vine_thumbnail($video_id);
                    $url = "https://vine.co/v/".$video_id."/embed/simple";
                }

                if($video_type == 'vimeo') {
                    $vimeo_video_data = getVimeoVideoFromUrl($video_url);
                    $thumb_image = $vimeo_video_data->thumbnail_url;
                    $video_id = $vimeo_video_data->video_id;
                    $url = 'https://player.vimeo.com/video/'.$video_id;
                }   


                if($video_type == 'youtube') {
                    $video_id = getYouTubeIdFromURL($video_url);
                    $url = 'https://www.youtube.com/embed/'.$video_id;
                    $thumb_image = getYouTubeVideoThumb($video_id);
                }
                //echo "url". $url;die;
                if($url && $this->input->post('video_title')){
                    $video_data = array(
                        'player_id' => $this->player_id,
                        'title' => $this->input->post('video_title'),
                        'filename' => $url,
                        'orignal_video_url' => $orignal_video_url, 
                        'video_type' => $video_type,
                        'thumbnail_image' => $thumb_image,
                        'created_date' => date('Y-m-d H:i:s')
                    );

                    $last_id = $this->club_model->insert_video_details($video_data);
                    if($last_id){
                        $return_video_data = array(
                            'id' => $last_id,
                            'player_id' => $this->player_id,
                            'title' => $this->input->post('video_title'),
                            'filename' => $url,
                            'orignal_video_url' => $orignal_video_url, 
                            'video_type' => $video_type,
                            'thumbnail_image' => $thumb_image,
                            'created_date' => date('Y-m-d H:i:s')
                        );

                        echo json_encode($return_video_data);
                        exit();  
                    }else{
                        $mess = array('type'=>'error', 'msg'=> $this->lang->line("common_message_something_wrong_please_try_again"));
                        echo json_encode($mess);
                        exit();
                    }
                    
                }else{

                    $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
                    echo json_encode($mess);
                    exit();
                }
                
            }else{
                $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
                echo json_encode($mess);
                exit();
            }
        }
                
    }//END upload_video()


/*==================================================
*This function is use for update club video
*/
public function updateClubVideo() {
    //if($this->input->post('submit')){
        if (!$this->input->is_ajax_request()) {
            die("No direct access allowed!");
        }
        $id = $this->input->post('videoid');
        $this->load->helper('videos_helper');
        
        if ($this->form_validation->run('video_validation') == FALSE) {
            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
            echo json_encode($mess);
            exit();
        }else{
            $video_url = $this->input->post('video_url');
            $orignal_video_url = $this->input->post('video_url'); // this url for use update time
            $video_id = get_vine_video_url($video_url);
            $video_type = $this->input->post('video_type');
            
            if($video_type != 'invalid') {
                   
                if($video_type == 'vine') {
                    $video_id = basename($video_url);
                    $thumb_image = getVineVideoThumb($video_id);
                    $url = "https://vine.co/v/".$video_id."/embed/simple";
                }

                if($video_type == 'vimeo') {
                    $vimeo_video_data = getVimeoVideoFromUrl($video_url);
                    $thumb_image = $vimeo_video_data->thumbnail_url;
                    $video_id = $vimeo_video_data->video_id;
                    $url = 'https://player.vimeo.com/video/'.$video_id;
                }   


                if($video_type == 'youtube') {
                    $video_id = getYouTubeIdFromURL($video_url);
                    $url = 'https://www.youtube.com/embed/'.$video_id;
                    $thumb_image = getYouTubeVideoThumb($video_id);
                }

                $video_data = array(
                    'title' => $this->input->post('video_title'),
                    'filename' => $url,
                    'orignal_video_url' => $orignal_video_url, 
                    'video_type' => $video_type,
                    'thumbnail_image' => $thumb_image,
                    'created_date' => date('Y-m-d H:i:s')
                    );

                    $result = $this->club_model->update_video_details($video_data, $id);
                    if($result){
                        $updated['id'] = $id;
                        $updated['title'] = $this->input->post('video_title');
                        $updated['url'] = $url;
                        $updated['orignal_video_url'] = $orignal_video_url; 
                        $updated['thumbnail_image'] = $thumb_image;
                        $updated['video_type'] = $video_type;
                        
                        echo json_encode($updated);
                        exit();  
                    }
                    
            }
        }    
}//END update_player_video()



/*==============================================================
*This functiuon is use for delete player image
*/
public function deleteClubImage() {
    if($this->input->is_ajax_request()){
        $image_id = $this->input->post('image_id');
        $delete_img = $this->club_model->get_club_image_for_delete($image_id);
        if($delete_img){
            $uploadPath = './public/uploads/player_image/';
            remove_image($uploadPath, $delete_img['filename']);
            $data = $this->club_model->delete_club_image($image_id);
            echo json_encode($data);
            exit();    
         }else{
            echo json_encode(FALSE);
            exit();
         }
        
    }  
}// END deleteClubImage()


/*==============================================================
*This functiuon is use for delete club video
*/
public function deleteClubVideo() {
    if($this->input->is_ajax_request()){
            $video_id = $this->input->post('video_id');
            $delete_vid = $this->club_model->get_club_video_for_delete($video_id);
            if($delete_vid && $delete_vid['upload_video_type']=='2'){
                $uploadPath = './public/uploads/player_video/';
                $uploadThumbImgPath = './public/uploads/video_thumb/';
                remove_image($uploadPath, $delete_vid['filename']);
                remove_image($uploadThumbImgPath, $delete_vid['thumbnail_image']);
                
                echo json_encode($data);
                exit();    
            }else{
                $data = $this->club_model->delete_club_video($video_id);
                echo json_encode($data);
                exit();
            }
    }  
}  // END deleteClubVideo()


/*=========================================================
*This function is use for get player bio information
*/
public function getPlayerBioInfo() {
    if(!$this->input->is_ajax_request()){
        die("No direct access allowed");
    }
    $bio_data = $this->club_model->get_biography($this->player_id);
    echo json_encode($bio_data);
    die();
}

/*=========================================================
*This function is use for get player image data
*/
public function getImageData() {
    $rowId = $this->input->post('image_id');
    $data = $this->club_model->get_image($rowId);
    echo json_encode($data);
    exit();
}

/*=========================================================
*This function is use for get all video data
*/
public function getAllVideoData() {
    $data = $this->club_model->get_video_info($this->player_id);
    echo json_encode($data);
    exit();
}


/*=========================================================
*This function is use for get all image data
*/
public function getAllImageData() {
    $data = $this->club_model->get_image_info($this->player_id);
    echo json_encode($data);
    exit();
}


/*==============================================================
*This functiuon is use for get club biography information
*/
public function get_club_biography() {
    if ($this->input->is_ajax_request()) {
       $data = $this->club_model->get_biography($this->player_id);
       echo json_encode($data);
       exit();
    }
}// END get_club_biography()


/*=========================================================
*This function is use for check video url when user upload player video
*/
public function url_check() {
   if ($this->input->is_ajax_request()) { 
        $video_url = $this->input->post('video_url');
        if(strpos($video_url, 'vimeo')) {
            echo json_encode(true);
            exit();
        }
        elseif(strpos($video_url, 'youtube')) {
            echo json_encode(true);
            exit();
        }
        if(strpos($video_url, 'vine')) {
            echo json_encode(true);
            exit();
        }
        else {
            echo json_encode(false);
            exit();
        }
    } 
}


/* callback function validating cpf field */
public function cpf_check() {
    if(!$this->input->is_ajax_request()) {
        die("No direct access allowed");
    }
    $cpf = $this->input->post('cpf_field');
    $cpf = sprintf('%011s', preg_replace('{\D}', '', $cpf));
        // Validate length and invalid numbers
    if ((strlen($cpf) != 11) || ($cpf == '00000000000') || ($cpf == '99999999999')) {
        echo json_encode(lang("please_enter_valid_cpf_no"));
        //$this->form_validation->set_message('cpf_check', lang("please_enter_valid_cpf_no"));
        exit();
        
    }else{
        echo json_encode("Valid CPF");
        exit();
        // Validate check digits using a modulus 11 algorithm
    }
    for ($t = 8; $t < 10;) {
        for ($d = 0, $p = 2, $c = $t; $c >= 0; $c--, $p++) {
            $d += $cpf[$c] * $p;
        }
        if ($cpf[++$t] != ($d = ((10 * $d) % 11) % 10)) {
            echo json_encode(lang("please_enter_valid_cpf_no"));
            exit();
            //$this->form_validation->set_message('cpf_check', lang("please_enter_valid_cpf_no"));
            //return false;
            
        }else{
            echo json_encode("Valid CPF");
            exit();
        }
    }
    //echo json_encode("Valid");
    //return true;
    //exit();
}



/*=========================================================
*This function is use for get video data
*/
public function getVideoData() {
    $video_id = $this->input->post('video_id');
    $data = $this->club_model->get_video($video_id);
    echo json_encode($data);
    exit();
}


/*=========================================================
*This function is use for player biography
*/
public function biography() {
    $data['title'] = 'Profile';
    $data['module'] = "profile";
    $data['view_file'] = "front/player_biography";
    $this->template->front($data);
}


/*=========================================================
*This function is use for save biography
*/
public function save_biography() {
    if(!$this->input->is_ajax_request()){
        die("No direct access allowed");
    }

        if ($this->form_validation->run('biography_validation') == FALSE) {
            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
            echo json_encode($mess);
            exit();
        }else{
            $biography = array(
                'title' => escapeString($this->input->post('bio_title')),
                'content' => escapeString($this->input->post('content')),
            );


            $result = $this->club_model->updateBiograpyhy($biography);
            if($result){
                $player_message = array("type"=>"success", "msg"=>$this->lang->line("action_completed_successefully"));
                echo json_encode($player_message);
                exit();    
            }else{
               $player_message = array("type"=>"error", "msg"=>$this->lang->line("common_message_something_wrong_please_try_again"));
               echo json_encode($player_message);
               exit();  
            }
        }
}



/*==============================================================
*This functiuon is use for update player information
*/
public function updatePlayerProfile() {
    if (!$this->input->is_ajax_request()) {
        die("No direct access allowed!");
    }
    //pr($_POST);
    if($this->input->post()){
        if ($this->form_validation->run('athlete_rofile') == FALSE) {
            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
            echo json_encode($mess);
            exit();
        } else {
            $playerId = escapeString($this->input->post('hidePlayerId'));

            $first_name = escapeString($this->input->post('fname'));
            $nick_name = escapeString($this->input->post('nickname'));
            $last_name = escapeString($this->input->post('lname'));
            $age = escapeString($this->input->post('age'));
            $weight = escapeString($this->input->post('weight'));

            $height_m = escapeString($this->input->post('height_m'));
            $height_cm = escapeString($this->input->post('heightCm'));

            if(($height_m) && ($height_cm || $height_cm==0)){
                $height = $height_m.'.'.$height_cm;
            }
            

            $cpf = $this->input->post('cpf');
            $birthday = escapeString($this->input->post('birthday'));
            $laterality = escapeString($this->input->post('laterality'));
            $country = $this->input->post('country');
            $position_1 = escapeString($this->input->post('position_1'));
            $position_2 = escapeString($this->input->post('position_2'));
            $position_3 = escapeString($this->input->post('position_3'));
            $player_type = $this->input->post('player_type');

            if($player_type==1){
                $club_name = escapeString($this->input->post('hire_club_name'));
            }else{
                $club_name = "";
            }
            

            $player_profile = array(
                'first_name' => $first_name,
                'nick_name' => $nick_name,
                'last_name' => $last_name,
                'age' => $age,
                'weight' => $weight,
                'height' => $height,
                'cpf' => $cpf,
                'birthday' => $birthday,
                'laterality' => $laterality,
                'country' => $country,
                'position_1' => $position_1,
                'position_2' => $position_2,
                'position_3' => $position_3,
                'player_type' => $player_type,
                'mobile' => escapeString($this->input->post('mobile')),
                'facebook' => escapeString($this->input->post('facebook')),
                'instagram' => escapeString($this->input->post('instagram')),
                'twitter' => escapeString($this->input->post('twitter')),
                'hire_club_name' => $club_name
            );


            //pr($user_profile);
            $result_profile = $this->club_model->update_player_profile($player_profile, $playerId);
            //$this->athlete_model->update_contact_details($contact_data);

            if($result_profile){
                    $profile_message = array("type"=>"success", "msg"=>$this->lang->line("profile_update_successefully"));
                    echo json_encode($profile_message);
                    exit();    
                }else{
                   $profile_message = array("type"=>"error", "msg"=>$this->lang->line("common_message_something_wrong_please_try_again"));
                   echo json_encode($profile_message);
                   exit();  
                }    
            }
        }


} // END edit();




}
