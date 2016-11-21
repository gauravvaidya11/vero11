<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Athlete extends Front_Controller {

public function __construct() {
    parent::__construct();
    isLoggedIn();
    $this->load->model('athlete_model');
    $this->player_id = $this->session->userdata('player_id');
}

/*============================================
*This function is use for display about us info
*/
public function about_us() {
    $data['title'] = 'About Us';
    $data['module'] = "athlete";
    $data['about_us_history'] = $this->athlete_model->get_about_us_history();
    $data['view_file'] = "front/about_us";
    $this->template->front($data);
}// END about_us()

/*==================================================
*This function is use for set navigation tab 
*/
public function setTab() {
    if ($this->input->is_ajax_request()) {
        $tabId = $this->input->post("tab_id");
        //$this->session->set_userdata(array("session_tab_id" => $this->input->post("tab_id")));
        $this->session->set_userdata("session_tab_id", $tabId);
        if($this->session->userdata("session_tab_id")){
            echo $this->session->userdata("session_tab_id");
            exit();
        }
        exit();
    }
}//END setTab()

/*==============================================================
*This functiuon is use for get total player for display profile page
*/
public function getTotalPlayers() {
    if ($this->input->is_ajax_request()) {
       $data = get_number_of_player();
       echo json_encode($data);
       exit();
    }
}//END getTotalPlayers()


/*==============================================================
*This functiuon is use for get player biography information
*/
public function get_player_biography() {
    if ($this->input->is_ajax_request()) {
       $data = $this->athlete_model->get_biography($this->player_id);
       echo json_encode($data);
       exit();
    }
}// END get_player_biography()

/*==============================================================
*This functiuon is use for get display player profile details include all player files 
*/
public function athleteProfile() {
    $data['title'] = 'Profile';
    $data['module'] = "athlete";
    $data['view_file'] = "front/index";
    $data['player_info'] = $this->athlete_model->get_player_info($this->player_id);
    //pr($data['player_info']);

    if(empty($data['player_info'])){
        redirect(BASE_URL);
    }
    $this->template->front($data);
        
}//END athleteProfile()


/*==============================================================
*This functiuon is use for update player information
*/
public function edit() {
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

            $first_name = escapeString($this->input->post('fname'));
            $nick_name = escapeString($this->input->post('nickname'));
            $last_name = escapeString($this->input->post('lname'));
            $age = escapeString($this->input->post('age'));
            $weight = escapeString($this->input->post('weight'));

            $height_m = escapeString($this->input->post('height_m'));
            $height_cm = escapeString($this->input->post('height_cm'));

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
            $result_profile = $this->athlete_model->update_profile($player_profile);
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
               $old_profile_imge = $this->athlete_model->get_profile_image_for_remove();
               if($old_profile_imge){
                    remove_image($uploadPath, $old_profile_imge['profile_image']); 
               }
               
               
               $upload = do_upload($fieldName, $uploadPath); 
               

               $playerProfile = $upload['file_name'];
                if($playerProfile){
                    chmod($uploadPath.$playerProfile,0777);
                    $profile_image_data = array('profile_image' => $playerProfile);
                    $profile = $this->athlete_model->update_profile($profile_image_data);
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
*This functiuon is use for upload player image
*/
public function upload_player_image() {
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
                $result = $this->athlete_model->insert_player_image($image_data);  
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
public function update_player_image() {
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
                        $player_image = $this->athlete_model->get_player_image($id);
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

            $result = $this->athlete_model->update_player_image($image_data, $id);    
            
            
        if($result){
            $player_result = $this->athlete_model->get_player_image($id);
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
public function upload_video() {
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

                if($url){
                   $video_data = array(
                    'player_id' => $this->player_id,
                    'title' => $this->input->post('video_title'),
                    'filename' => $url,
                    'orignal_video_url' => $orignal_video_url, 
                    'video_type' => $video_type,
                    'thumbnail_image' => $thumb_image,
                    'created_date' => date('Y-m-d H:i:s')
                    );

                    $last_id = $this->athlete_model->insert_video_details($video_data);
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
                    echo $url;die;
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
                
    }


/*==================================================
*This function is use for update player video
*/
public function update_player_video() {
    //if($this->input->post('submit')){

        $id = $this->input->post('videoid');
        $this->load->helper('videos_helper');
        
        if ($this->form_validation->run('video_validation') == FALSE) {
            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
            echo json_encode($mess);
            exit();
        }else{
            $video_url = $this->input->post('video_url');
            $video_id = get_vine_video_url($video_url);
            $orignal_video_url = $this->input->post('video_url'); // this url for use update time
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

                    $result = $this->athlete_model->update_video_details($video_data, $id);
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



	// public function upload_video() {
 //        if(!$this->input->is_ajax_request()) {
 //            die("No direct access allowed.");
 //        }

 //        $this->load->helper('videos_helper');
        
 //        $upload_video_type = $this->input->post('upload_videoType');
 //        if($upload_video_type=='2'){
 //        	if(!empty($_FILES['upload_video']['name'])){
 //      			if ($this->form_validation->run('add_video_validation') == FALSE) {
	// 	            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
	// 	            echo json_encode($mess);
	// 	            exit();
	// 	        }else{
 //                    if ($_FILES['upload_video']['error'] != UPLOAD_ERR_NO_FILE) { 
 //                        $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/vero/public/uploads/player_video/';
 //                        //echo $uploadPath;die;
 //                        $uploadThumbPath = $_SERVER['DOCUMENT_ROOT'].'/vero/public/uploads/video_thumb/';
 //                        $fieldName = 'upload_video';

 //                        $upload = do_upload_video($fieldName, $uploadPath); 
 //                        //pr($upload);
 //                    }
 //                    $playerVideo = $upload['file_name'];
 //                    if($playerVideo){

 //                        chmod($uploadPath.$playerVideo,0777);

 //                        // Video file name without extension(.mp4 etc)
 //                        $videoname  = $upload['raw_name'];
 //                        $video_path = $uploadPath . $playerVideo;
 //                        // FFmpeg Command to generate video thumbnail
    
 //                        //exec("ffmpeg -i ".$video_path." -ss 00:00:02 -vframes 1 ".$uploadThumbPath.$videoname.".jpg");

 //                        exec('ffmpeg  -itsoffset -4  -i '.$video_path.' -vcodec mjpeg -vframes 1 -an -f rawvideo -s 320x240 '.$uploadThumbPath.$videoname.".jpg");//make a video thumb
 //                        chmod($uploadThumbPath.$videoname.".jpg", 0777);


 //                        exec('ffmpeg -i '.$video_path.' -vcodec h264 -acodec aac -strict -2 '.$uploadPath.$videoname.".mp4");
 //                        chmod($uploadPath.$videoname.".mp4", 0777);

 //                    }
                    
 //                    $video_type = $upload['file_type'];
 //                    $thumb_image = $videoname.".jpg";
 //                    $url = $videoname.".mp4";
	//             }
 //        	} //close validation rules

 //            $video_data = array(
 //                'player_id' => $this->session->userdata('player_id'),
 //                'title' => $this->input->post('video_title'),
 //                'filename' => $url,
 //                'video_type' => $video_type,
 //                'thumbnail_image' => $thumb_image,
 //                'upload_video_type' => $upload_video_type,
 //                'created_date' => date('Y-m-d H:i:s')
 //            );
 //            //pr($video_data);

 //            $result = $this->athlete_model->insert_video_details($video_data);
 //            if($result){
 //                $result_video_data = array(
 //                        'type' => 'success',
 //                        'msg'=> lang('action_completed_successefully'), 
 //                        'player_id' => $this->session->userdata('player_id'),
 //                        'title' => $this->input->post('video_title'),
 //                        'filename' => $url,
 //                        'video_type' => $video_type,
 //                        'thumbnail_image' => $thumb_image,
 //                        'upload_video_type' => $upload_video_type,
 //                        'created_date' => date('Y-m-d H:i:s')
 //                    );

 //                echo json_encode($result_video_data);
 //                exit(); 
 //            }


        	
 //        }else{  
 //            if ($this->form_validation->run('add_video_url_validation') == FALSE) {
	//             $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
	//             echo json_encode($mess);
	//             exit();
	//         }else{
 //            	$video_url = $this->input->post('video_url');
	//             $video_id = get_vine_video_url($video_url);
	//             $video_type = $this->input->post('video_type');

 //                if($video_type != 'invalid') {
                       
 //                    if($video_type == 'vine') {
 //                        $video_id = basename($video_url);
 //                        $thumb_image = getVineVideoThumb($video_id);
 //                        $url = "https://vine.co/v/".$video_id."/embed/simple";
 //                    }

 //                    if($video_type == 'vimeo') {
 //                        $vimeo_video_data = getVimeoVideoFromUrl($video_url);
 //                        $thumb_image = $vimeo_video_data->thumbnail_url;
 //                        $video_id = $vimeo_video_data->video_id;
 //                        $url = 'https://player.vimeo.com/video/'.$video_id;
 //                    }   


 //                    if($video_type == 'youtube') {
 //                        $video_id = getYouTubeIdFromURL($video_url);
 //                        $url = 'https://www.youtube.com/embed/'.$video_id;
 //                        $thumb_image = getYouTubeVideoThumb($video_id);
 //                    }   
 //                }
                

	//         }

 //            $video_data = array(
 //                'player_id' => $this->session->userdata('player_id'),
 //                'title' => $this->input->post('video_title'),
 //                'filename' => $url,
 //                'video_type' => $video_type,
 //                'thumbnail_image' => $thumb_image,
 //                'upload_video_type' => $upload_video_type,
 //                'created_date' => date('Y-m-d H:i:s')
 //            );
 //            //pr($video_data);

 //            $result = $this->athlete_model->insert_video_details($video_data);
 //            if($result){
 //                $result_video_data = array(
 //                        'type' => 'success',
 //                        'msg'=> lang('action_completed_successefully'), 
 //                        'player_id' => $this->session->userdata('player_id'),
 //                        'title' => $this->input->post('video_title'),
 //                        'filename' => $url,
 //                        'video_type' => $video_type,
 //                        'thumbnail_image' => $thumb_image,
 //                        'upload_video_type' => $upload_video_type,
 //                        'created_date' => date('Y-m-d H:i:s')
 //                    );

 //                echo json_encode($result_video_data);
 //                exit(); 
 //            }

	//     }

            
            
 //        //}

 //    } //END upload_video()


/*==============================================
*This function is use for update video
*/
// public function update_player_video() {
//         if(!$this->input->is_ajax_request()) {
//             die("No direct access allowed.");
//         }

//     //if($this->input->post('submit')){

//         $id = $this->input->post('videoid');
//         $this->load->helper('videos_helper');
        
//             $upload_video_type = $this->input->post('upload_videoType');
//             if($upload_video_type=='2'){
                
//                 if(!empty($_FILES['upload_video']['name'])){
//                 	if ($this->form_validation->run('add_video_validation') == FALSE) {
// 			            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
// 			            echo json_encode($mess);
// 			            exit();
// 			        }else{
// 	                    if ($_FILES['upload_video']['error'] != UPLOAD_ERR_NO_FILE) {
// 	                        $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/vero/public/uploads/player_video/';
// 	                        //echo $uploadPath;die;
// 	                        $uploadThumbPath = $_SERVER['DOCUMENT_ROOT'].'/vero/public/uploads/video_thumb/';
// 	                        $fieldName = 'upload_video';

// 	                        $upload = do_upload_video($fieldName, $uploadPath); 
// 	                        //pr($upload);
// 	                        $player_image = $this->athlete_model->get_player_image($id);
// 	                        if($player_image){
// 	                            remove_image($uploadPath, $player_image['filename']);
// 	                        }
// 	                    }
// 	                    $playerVideo = $upload['file_name'];
// 	                    if($playerVideo){

// 	                        chmod($uploadPath.$playerVideo,0777);

// 	                        // Video file name without extension(.mp4 etc)
// 	                        $videoname  = $upload['raw_name'];
// 	                        $video_path = $uploadPath . $playerVideo;
// 	                        // FFmpeg Command to generate video thumbnail
	    
// 	                        //exec("ffmpeg -i ".$video_path." -ss 00:00:02 -vframes 1 ".$uploadThumbPath.$videoname.".jpg");

// 	                        exec('ffmpeg  -itsoffset -4  -i '.$video_path.' -vcodec mjpeg -vframes 1 -an -f rawvideo -s 320x240 '.$uploadThumbPath.$videoname.'.jpg');//make a video thumb
// 	                        chmod($uploadThumbPath.$videoname.'.jpg', 0777);

// 	                        exec('ffmpeg -i '.$video_path.' -vcodec h264 -acodec aac -strict -2 '.$uploadPath.$videoname.'.mp4');
//                         	chmod($uploadPath.$videoname.".mp4", 0777);

//                         	$uploaded_playerVideo = $videoname.'.mp4';
// 	                    }

// 	                    $video_type = $upload['file_type'];
// 	                    $thumb_image = $videoname.".jpg";
// 	                }
//                 }else{
//                     $thumb_image = $this->input->post('upload_hidden_thumb_image');;
//                     $video_type = $this->input->post('upload_hidden_video_type');
//                     $uploaded_playerVideo = $this->input->post('hidden_player_video');
//                 }

//                 $url = $uploaded_playerVideo;

//                  $video_data = array(
//                     'title' => $this->input->post('video_title'),
//                     'filename' => $url,
//                     'video_type' => $video_type,
//                     'thumbnail_image' => $thumb_image,
//                     'upload_video_type' => $upload_video_type,
//                     'created_date' => date('Y-m-d H:i:s')
//                 );

//                 $result = $this->athlete_model->update_video_details($video_data, $id);
//                 if($result){
//                     $updated['type'] = 'success';
//                     $updated['id'] = $id;
//                     $updated['title'] = $this->input->post('video_title');
//                     $updated['url'] = $url;
//                     $updated['thumbnail_image'] = $thumb_image;
//                     $updated['video_type'] = $video_type;
                    
//                     echo json_encode($updated);
//                     exit();  
//                 }


//             }else{
//             	if ($this->form_validation->run('add_video_url_validation') == FALSE) {
// 		            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
// 		            echo json_encode($mess);
// 		            exit();
// 		        }else{
// 	            	$video_url = $this->input->post('video_url');
// 	            	$video_id = get_vine_video_url($video_url);
// 	            	$video_type = $this->input->post('video_type');
// 	                if($video_type != 'invalid') {
	                       
// 	                    if($video_type == 'vine') {
// 	                        $video_id = basename($video_url);
// 	                        $thumb_image = getVineVideoThumb($video_id);
// 	                        $url = "https://vine.co/u/".$video_id."/embed/simple";
// 	                    }

// 	                    if($video_type == 'vimeo') {
// 	                        $vimeo_video_data = getVimeoVideoFromUrl($video_url);
// 	                        $thumb_image = $vimeo_video_data->thumbnail_url;
// 	                        $video_id = $vimeo_video_data->video_id;
// 	                        $url = 'https://player.vimeo.com/video/'.$video_id;
// 	                    }   


// 	                    if($video_type == 'youtube') {
// 	                        $video_id = getYouTubeIdFromURL($video_url);
// 	                        $url = 'https://www.youtube.com/embed/'.$video_id;
// 	                        $thumb_image = getYouTubeVideoThumb($video_id);
// 	                    }
	    
// 	                }
// 	            }

//                  $video_data = array(
//                     'title' => $this->input->post('video_title'),
//                     'filename' => $url,
//                     'video_type' => $video_type,
//                     'thumbnail_image' => $thumb_image,
//                     'upload_video_type' => $upload_video_type,
//                     'created_date' => date('Y-m-d H:i:s')
//                 );

//                 $result = $this->athlete_model->update_video_details($video_data, $id);
//                 if($result){
//                     $updated['type'] = 'success';
//                     $updated['id'] = $id;
//                     $updated['title'] = $this->input->post('video_title');
//                     $updated['url'] = $url;
//                     $updated['thumbnail_image'] = $thumb_image;
//                     $updated['video_type'] = $video_type;
                    
//                     echo json_encode($updated);
//                     exit();  
//                 }
//             }

               

// }





/*==============================================================
*This functiuon is use for delete player image
*/
public function deletePlayerImage() {
    if($this->input->is_ajax_request()){
        $image_id = $this->input->post('image_id');
        $delete_img = $this->athlete_model->get_player_image_for_delete($image_id);
        if($delete_img){
            $uploadPath = './public/uploads/player_image/';
            remove_image($uploadPath, $delete_img['filename']);
            $data = $this->athlete_model->delete_player_image($image_id);
            echo json_encode($data);
            exit();    
         }else{
            echo json_encode(FALSE);
            exit();
         }
        
    }  
}// END deletePlayerImage()


/*==============================================================
*This functiuon is use for upload player video
*/
public function deletePlayerVideo() {
    if($this->input->is_ajax_request()){
            $video_id = $this->input->post('video_id');
            $delete_vid = $this->athlete_model->get_player_video_for_delete($video_id);
	        if($delete_vid && $delete_vid['upload_video_type']=='2'){
	            $uploadPath = './public/uploads/player_video/';
	            $uploadThumbImgPath = './public/uploads/video_thumb/';
	            remove_image($uploadPath, $delete_vid['filename']);
	            remove_image($uploadThumbImgPath, $delete_vid['thumbnail_image']);
	            
	            echo json_encode($data);
	            exit();    
	        }else{
	         	$data = $this->athlete_model->delete_player_video($video_id);
	            echo json_encode($data);
	            exit();
	        }
    }  
}  // END deletePlayerVideo()


/* for change password functionality */
public function chnagePassword() {
    if(!$this->input->is_ajax_request()){
        die("No direct access allowed");
    }

    if ($this->input->post()) {
        $old_password = md5($this->input->post('old_password'));
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');
        if ($this->form_validation->run('changepassword') == FALSE) {
            $mess = array('type'=>'error', 'msg'=> $this->lang->line("please_enter_required_field"));
            echo json_encode($mess);
            exit();
        }else{
            $result = $this->athlete_model->get_old_password($old_password);
            if(empty($result)){
                $pass_message = array("type"=>"error", "msg"=>$this->lang->line("please_enter_currect_old_password"));
                echo json_encode($pass_message);
                exit();  
            }
            
            if($new_password==$confirm_password){
                $change = $this->athlete_model->update_password($confirm_password);
                if($change){
                    $pass_message = array("type"=>"success", "msg"=>$this->lang->line("pass_change_successefully"));
                    echo json_encode($pass_message);
                    exit();    
                }else{
                   $pass_message = array("type"=>"error", "msg"=>$this->lang->line("common_message_something_wrong_please_try_again"));
                   echo json_encode($pass_message);
                   exit();  
                }
            }else{
                $pass_message = array("type"=>"error", "msg"=>$this->lang->line("password_does_not_match"));
                echo json_encode($pass_message);
                exit();
            }
        }
    }
}


/* callback function for checking unique username */
public function username_check() {
    if ($this->input->is_ajax_request()) {
        $email = $this->input->post('email');
        $res = $this->player_model->check_unique_username($email);
        echo json_encode($res);
        exit();
    } else {
        $email = $this->input->post('email');
        $res = $this->player_model->check_unique_username($email);
        if ($res == TRUE) {
            return TRUE;
            exit();
        } else {
            $this->form_validation->set_message('username_check', 'Username already exists.');
            return FALSE;
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
*This function is use for get player information
*/
public function get_player_info() {
    if(!$this->input->is_ajax_request()){
        die("No direct access allowed");
    }
    $profile_data = $this->athlete_model->get_player_info($this->player_id);
    echo json_encode($profile_data);
    die();
}

/*=========================================================
*This function is use for get player bio information
*/
public function getPlayerBioInfo() {
    if(!$this->input->is_ajax_request()){
        die("No direct access allowed");
    }
    $bio_data = $this->athlete_model->get_biography($this->player_id);
    echo json_encode($bio_data);
    die();
}

/*=========================================================
*This function is use for get player image data
*/
public function getImageData() {
    $rowId = $this->input->post('image_id');
    $data = $this->athlete_model->get_image($rowId);
    echo json_encode($data);
    exit();
}

/*=========================================================
*This function is use for get all video data
*/
public function getAllVideoData() {
    $data = $this->athlete_model->get_video_info($this->player_id);
    echo json_encode($data);
    exit();
}


/*=========================================================
*This function is use for get all image data
*/
public function getAllImageData() {
    $data = $this->athlete_model->get_image_info($this->player_id);
    echo json_encode($data);
    exit();
}

/*=========================================================
*This function is use for get video data
*/
public function getVideoData() {
    $rowId = $this->input->post('video_id');
    $data = $this->athlete_model->get_video($rowId);
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


            $result = $this->athlete_model->updateBiograpyhy($biography);
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

/*=========================================================
*This function is use forcontact from front end contact form
*/
public function contact_me() {
    if($this->input->post('submit')){
        $data = array(
            'player_id' => $this->player_id,
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'facebook' => $this->input->post('facebook'),
            'instagram' => $this->input->post('instagram'),
            'twitter' => $this->input->post('twitter'),
        );
        $this->athlete_model->insert_contact_details($data);
    }
}
//close contact_me()    
 
    
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


// /*=========================================================
// *This function is use for add player by club
// */
// public function addPlayerByClub() {
//     $data['title'] = 'Club';
//     $data['module'] = "athlete";
//     $data['view_file'] = "front/add_player_by_club";
//     $this->template->front($data);
// }

    // public function changePassword() {

        
    //     $data['module'] = "";
    //     $data['view_file'] = "front/changePassword";
    //     if ($this->input->post('reset')) {
    //         $old_password = md5($this->input->post('old_password'));
    //         $email = $this->input->post('email');
    //         $new_password = md5($this->input->post('newpass'));
    //         $result = $this->user_model->get_old_password($email);

    //         if ($result == $old_password) {
    //             $this->user_model->reset_password($email, $new_password);
    //         } else {
    //             echo 'incorrect password';
    //             exit;
    //         }
    //     } else {
    //         $this->template->front($data);
    //     }
    // }





}

?>
