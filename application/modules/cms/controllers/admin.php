<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Admin_Controller {
    private $about_table = "tbl_about_us_history";
    private $contact_table = "tbl_contact_admin";
    
    function __construct() {
        parent::__construct();
        isAdminLoggedIn();
        $this->load->model("cms_model");
        $obj = new Cms_model();
    }

    /* =============================================
     * This function is use for manage about us history
     */
    function aboutUsHistory() {
        add_admin_plugin(array('bootbox/bootbox.min.js', 'data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        add_admin_js(array('core/datatable.js', 'custom/common_js/table-ajax.js', 'custom/player_js/players.js'));
        //add_admin_js(array('custom/cms_js/privacy_policy.js'));
        //$this->load->model("languages/language");
        //$lang = new Language();
        $data['title'] = "Administrator";
        $data['breadcrumb'] = array('Home' => 'dashboard', 'CMS' => '');
        $data['module'] = "cms";
        $data['view_file'] = "admin/index";
        $this->template->admin($data);
    }// END aboutUsHistory()


    function contactUS() {
        add_admin_plugin(array('bootbox/bootbox.min.js', 'jquery-validation/dist/jquery.validate.min.js','data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        add_admin_js(array('core/datatable.js', 'custom/common_js/table-ajax.js', 'custom/player_js/players.js','custom/cms_js/cms.js'));
        //$this->load->model("languages/language");
        //$lang = new Language();
        $data['title'] = "Administrator";
        $data['breadcrumb'] = array('Home' => 'dashboard', 'CMS' => '');
        $data['module'] = "cms";
        $data['view_file'] = "admin/contact_us";
        $this->template->admin($data);
    }


    

    function getAboutUsHistory() {
        if (!$this->input->is_ajax_request()) {
          exit('No direct script access allowed');
        }
        $obj = new Cms_model();

        $requestData = $_REQUEST;
        $search = [];
        // sort by
        $columns = array(
            0 => '',
            1 => 'about_us_heading',
            2 => 'play_date',
            3 => '',
            4 => 'created_at',
            5 => ''
        );

        // DEALER NAME FILTER
        if (!empty($requestData['heading'])) {
            $search['heading'] = $requestData['heading'];
        }
        if (!empty($requestData['play_date'])) {
            $search['play_date'] = $requestData['play_date'];
        }
        
        $search = (object) $search;

        $obj->sort_by = $columns[$requestData['iSortCol_0']];
        $obj->sort_order = $requestData['sSortDir_0'];
        // start
        $obj->offset = intval($requestData['iDisplayStart']);
        // limit 
        $records_count = $obj->get_about_us_count($search);

        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $obj->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $obj->get_about_us_history($search, $obj->sort_by, $obj->sort_order, $obj->limit, $obj->offset);

        $sEcho = intval($_REQUEST['sEcho']);

        // INITIALISE RETURN JSONDATA
        $jsondata = array();
        $jsondata["aaData"] = array();


        $i = 1;
        foreach ($records as $record) {
            $html = '';
            $about_us_content = '';
            $date = $record->created_at;

            $play_date = $record->play_date;

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

            // $html .='<li><a data-toggle="modal" class="view_details btn btn-sm yellow" rel="' . $record->id . '" title="View" href="' . BASE_URL . 'admin-aboutus-detail/' . $record->id . '">
            //          <i class="fa fa-eye"></i> View Details</a></li>';

           
            $html .='<li><a class="btn btn-sm blue" rel="' . $record->id . '" title="Edit" href="' . BASE_URL . 'admin-edit-aboutus/' . $record->id . '">
                     <i class="fa fa-edit"></i> View/Edit</a></li>';

            $html .='<li><a id="delete_status_' . $record->id . '" rel="' . $record->id . '" class="delete-status btn btn-sm red filter-cancel" title="Delete" href="javascript:void(0);">
                     <i class="fa fa-trash-o"></i> Delete</a></li>';

            $html .='</ul></div>';
            // if($record->image_video_type=='1'){
            // 	$play_video_img .= '<img width="100px" src="'.BASE_URL.'public/uploads/about_us_image/'.$record->player_image.'">';
            // }else{
            // 	$play_video_img .= '<img width="100px" src="'.BASE_URL.'public/uploads/about_us_image/'.$record->player_image.'">';
            // }

            if($record->about_us_content){
            	$about_us_content .= substr($record->about_us_content, '150');
            }
            
            $jsondata["aaData"][] = array(
                $i,
                $record->about_us_heading,
                //$record->club_name,
                $play_date,
               // $about_us_content,
                $date,
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

    public function check_video_url(){
        $this->load->helper('videos_helper');
        if (!$this->input->is_ajax_request()) {
            die("No direct access allowed!");
        }

        $video_url = $this->input->post('video_url');
        
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
                echo json_encode(true);
                exit();
            }else{
                echo json_encode(false);
                exit();
            }
    }
    
     /*==========================================
     * Add about us history
     */
    function addAboutUshistory() {
        $this->load->helper('videos_helper');
        add_admin_plugin(array('bootbox/bootbox.min.js', 'jquery-validation/dist/jquery.validate.min.js','bootstrap-datepicker/js/bootstrap-datepicker.js'));
        add_admin_js(array('custom/cms_js/cms.js'));
       
        $obj = new Cms_model();
        if ($this->input->post()) {
            $id = intval(escapeString($this->input->post('id')));
            
            if ($id > 0) {
                $obj->id = $id;
                $valid = $this->form_validation->run('edit_aboutus');
            }
            else {
                $obj->created_at = getDates();
                $valid = $this->form_validation->run('add_about_us');
            }


            if ($valid == TRUE) {
                $obj->image_video_type = escapeString($this->input->post('image_video_type'));

                if($obj->image_video_type=='1'){
                	if ($_FILES['player_image']['name']) {
	                    $fieldName = 'player_image';
	                    $uploadPath = './public/uploads/about_us_image/';
	                    $upload = do_upload($fieldName, $uploadPath);
	                    $remove_image = $obj->get_remove_image($id);

	                    if($remove_image){
	                    	remove_image($uploadPath, $remove_image['player_image']);	
	                    }
	                    $lang->player_image = $upload['file_name'];
	                }else{
	                	$obj->player_image = escapeString($this->input->post('player_image'));	
	                }

                }else{
                    //$obj->player_video_url = escapeString($this->input->post('video_url'));

                    $video_url = $this->input->post('video_url');
                    $video_id = get_vine_video_url($video_url);
                    $video_type = $this->input->post('video_type');

                    if($video_type != 'invalid') {
                    	//pr($video_type);
                        if($video_id){
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

                            $obj->player_video_url = $url;
                            $obj->video_type = $video_type;
                            $obj->thumbnail_image = $thumb_image;

                        }else{
                            $obj->player_video_url = "";
                            $obj->video_type = "";
                            $obj->thumbnail_image = "";
                        }
               
                        
                    }

                	$obj->player_image = "";
                }
                


                $obj->about_us_heading = $this->input->post('about_us_heading');
                $obj->about_us_content = $this->input->post('about_content');
                $obj->play_date = escapeString($this->input->post('play_date'));
                $obj->facebook_url = escapeString($this->input->post('facebook_url'));
                $obj->twitter_url = escapeString($this->input->post('twitter_url'));
                $obj->google_url = escapeString($this->input->post('google_plus_url'));
                $obj->club_name = escapeString($this->input->post('club_name'));
               
                //pr($_POST);
                $about_us_id = $obj->save_about_us();

                if ($about_us_id) {

                    if ($about_us_id) {
                        $msg = 'Action successfuly completed.';
                        $this->session->set_flashdata('success', $msg);
                        redirect(BASE_URL.'admin-about-us-list');
                        exit();
                    }
                    else {
                        $error_msg = 'Something wrong please try again.';
                        $this->session->set_flashdata('error', $error_msg);
                        redirect(BASE_URL.'admin-about-us-list');
                        exit();
                    }
                }else{
                	$error_msg = 'Nothing to update!';
                    $this->session->set_flashdata('info', $error_msg);
                    redirect(BASE_URL.'admin-about-us-list');
                    exit();
                }
            }
        }

        $data['edit'] = FALSE;
        $data['tag'] = 'Save';
        if ($this->uri->segment(2) && $this->uri->segment(2) > 0) {
            $data['edit'] = TRUE;
            $id = escapeString($this->uri->segment(2));
            $data['about_us_info'] = $obj->get_about_us($id);
            $data['tag'] = 'Save';
        }
        $data['title'] = "CMS";
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', $data['tag'] => '');
        $data['module'] = "cms";
        $data['view_file'] = "admin/add_about_us";
        $this->template->admin($data);
    }

//END addAboutUshistory();


    function getContactUsHistory() {
        if (!$this->input->is_ajax_request()) {
          exit('No direct script access allowed');
        }
        $obj = new Cms_model();

        $requestData = $_REQUEST;
        $search = [];
        // sort by
        $columns = array(
            0 => '',
            1 => 'name',
            2 => 'email',
            3 => '',
            4 => '',
            5 => '',
            6 => ''
        );

        // DEALER NAME FILTER
        if (!empty($requestData['name'])) {
            $search['name'] = $requestData['name'];
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
        $records_count = $obj->get_contact_us_count($search);
        //echo $records_count;die;
        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $obj->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $obj->get_contact_us_history($search, $obj->sort_by, $obj->sort_order, $obj->limit, $obj->offset);

        //pr($records);

        $sEcho = intval($_REQUEST['sEcho']);

        // INITIALISE RETURN JSONDATA
        $jsondata = array();
        $jsondata["aaData"] = array();


        $i = 1;
        foreach ($records as $record) {
            $html = '';
            //$check_box_html = '';
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

            $html .='<li><a data-toggle="modal" class="reply_mail btn btn-sm yellow" rel="' . $record->id . '" title="View" href="javascript:void(0)">
                     <i class="fa fa-reply"></i> Reply</a></li>';

           
            $html .='<li><a class="btn btn-sm blue" rel="' . $record->id . '" title="View Email" href="'.BASE_URL.'admin-contact-details/'.$record->id.'">
                     <i class="fa fa-edit"></i> View</a></li>';

            $html .='<li><a id="delete_status_' . $record->id . '" rel="' . $record->id . '" class="delete-status btn btn-sm red filter-cancel" title="Delete" href="javascript:void(0);">
                     <i class="fa fa-trash-o"></i> Delete</a></li>';

            $html .='</ul></div>';

            // if($record->image_video_type=='1'){
            //  $play_video_img .= '<img width="100px" src="'.BASE_URL.'public/uploads/about_us_image/'.$record->player_image.'">';
            // }else{
            //  $play_video_img .= '<img width="100px" src="'.BASE_URL.'public/uploads/about_us_image/'.$record->player_image.'">';
            // }
            //$check_box_html .= '<input type="checkbox" name="checkall[]" id="check_'.$record->id.'" class="checkallReply">';
          
            $jsondata["aaData"][] = array(
                //$check_box_html,
                $i,
                $record->name,
                $record->email,
                $record->phone,
                $record->message,
                $record->created_at,
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


    

    /*
     * This function is use for get reply email info
     */

    public function getReplyEmailInfo() {
        if (!$this->input->is_ajax_request()) {
          exit('No direct script access allowed');
        }
        $obj = new Cms_model();

        $id = $this->input->post("id");
        $email_info = $obj->get_reply_email_info($id);
        echo json_encode($email_info);
        exit();
    }

    /*
     * This function is use for get contact email info
     */

    public function getEmailInfo() {
        if (!$this->input->is_ajax_request()) {
          exit('No direct script access allowed');
        }
        $obj = new Cms_model();

        $id = $this->input->post("id");
        $email_info = $obj->get_reply_email_info($id);
        echo json_encode($email_info);
        exit();
    }//END getEmailInfo()

    /*==================================================
    *This function is use for contact reply from admin
    */
    public function contactReply(){
        $obj = new Cms_model();
        $this->load->helper('my_email');
        if($this->form_validation->run('send_reply_validation')==FALSE)
        {
            $this->session->set_flashdata('error', '<div class="alert alert-danger"><span class="ui-icon ui-icon-alert" style="float:left"></span> Please enter require fieds.</div>');
            redirect(BASE_URL."admin-contact-us-list");
        }else{

            $obj->name = $this->input->post('name');
            $obj->email = $this->input->post('email');
            $obj->reply_message = $this->input->post('message');
            $obj->reply_id = $this->input->post('reply_id');
            $obj->sender_id = $this->session->userdata('admin_id');
            $obj->created_at = date('Y-m-d H:i:s');

            $obj->save_reply_mail();

            $subject = $this->input->post("subject");
            $message =  'Hi' .' '. $this->input->post('name') .' <br> '.
            $this->input->post("message") . '<br><br>

            Thanks,<br>'.SITE_NAME;
            $to = $this->input->post('email');

            $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
            if($res){
               $this->session->set_flashdata('success', 'Email sent successfully.');
               redirect(BASE_URL."admin-contact-us-list"); 
            }else{
               $this->session->set_flashdata('error', '<span class="ui-icon ui-icon-alert" style="float:left"></span> Email not sent please try again.');
               redirect(BASE_URL."admin-contact-us-list"); 
            }
        }
    }// END contactReply()

    public function contactDetails($id) {
        add_admin_plugin(array('bootbox/bootbox.min.js', 'jquery-validation/dist/jquery.validate.min.js','bootstrap-datepicker/js/bootstrap-datepicker.js'));
        add_admin_js(array('custom/cms_js/cms.js'));
        $obj = new Cms_model();
        $data['title'] = "Contact Details";
        $data['module'] = "cms";
        $data['view_file'] = "admin/contact_details";
        $data['breadcrumb'] = array('Home' => "Home", 'Contact Details' => 'Contact Details');
        
        $data['contact_info'] = $obj->get_contact_info($id);

        if(empty($data['contact_info'])){
            redirect(BASE_URL.'admin-player-list');
        }
         
        $data['reply_contact_info'] = $obj->get_contact_reply_info($id);
        

        $this->template->admin($data);
    }


    /*========================================
     * This function is use for set status
     */
    public function setStatus() {
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        if ($id != "" && $status != "" && $this->about_table != "") {
            $result = setstatus($id, $status, $this->about_table);
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


    /*
     * This function is use for set delete status
     */

    public function deleteStatus() {
        $id = $this->input->post("id");
        if ($id != "" && $this->about_table != "") {
            $result = delete_status($id, $this->about_table);
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




    /*
     * This function is use for set status
     */

    public function setContactStatus() {
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        if ($id != "" && $status != "" && $this->contact_table != "") {
            $result = setstatus($id, $status, $this->contact_table);
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


    /*
     * This function is use for set delete status
     */

    public function deleteContactStatus() {
        $id = $this->input->post("id");
        if ($id != "" && $this->contact_table != "") {
            $result = delete_status($id, $this->contact_table);
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

//END deleteDealer();

}

// close class here