<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends Front_Controller {
private $favorite_table = "tbl_favorities_player";

public function __construct() {
    parent::__construct();
    isLoggedIn();
    $this->load->model('search_model');
    $this->player_id = $this->session->userdata('player_id');
}


/*============================================
*This function is use for display about us info
*/
public function searchPlayers() {
    $obj = new search_model;
    $data['title'] = 'Search Players';
    $data['module'] = "search";

    $user_info = userLoggedInInfo();
    //pr($user_info);
    if(isset($_COOKIE['searchPlayerData']) && $_COOKIE['searchPlayerData']!='null'){
        $array_data = json_decode($_COOKIE['searchPlayerData']);
        foreach ($array_data as $value){
            $arrayname[] = $value->name;    
            $arrayvalue[] = $value->value;
        } 
        $search_data = array_combine($arrayname,$arrayvalue);
        
        $page_no_value = $search_data["page_no_value"];
        $data['setPageNo'] = $page_no_value;
        $limit  = 4;
        $offset = 0;
        if($page_no_value){
          $page_no_value = (int) $page_no_value;
          if($page_no_value > 1){
            $offset = (4 * ($page_no_value -1)) ; 
          }
        }

        $data['seach_result'] = $obj->search_players($search_data, $this->player_id,$offset,$limit);
        
        $data['search_count'] = $obj->search_player_count($search_data, $this->player_id);

    }else{
        $data['seach_result'] = "";
        $data['search_count'] = "";
        $data['setPageNo'] = "";
    }

    if($user_info){
        if($user_info['paid_status']==1 && $user_info['user_type']==2){ // here user type 2 is check for club user
            $this->session->set_flashdata('error_message', '<div class="alert alert-danger"><span class="ui-icon ui-icon-check" style="float:left"></span> '.lang("message_for_paid_or_free_club_you_are_as_a_free_club_member").'</div>');
            redirect(BASE_URL.'payment-option');
        }else if($user_info['user_type']==1){
            redirect(BASE_URL);
        }
    }
    
    $data['view_file'] = "front/search_players";
    $this->template->front($data);
}// END about_us()


/*========================================================
*This function is use for display favorite players of club
*/
public function favoritePlayers() {
    $user_info = userLoggedInInfo();
    if($user_info){
        if($user_info['user_type']==1){
            redirect(BASE_URL); // redirect home because this only club
        }
    }
    $obj = new search_model;
    $data['title'] = "Favorite Player List";
    $data['module'] = "search";
    $data['view_file'] = "front/favorite_player_list";
    $data['favorite_player'] = $obj->get_favorite_players($this->player_id);
    $this->template->front($data);
}// END favoritePlayers()


/*========================================================
*This function is use for display search player details of club
*/
public function playerDetails() {
    $user_info = userLoggedInInfo();
    if($user_info){
        if($user_info['user_type']==1){
            redirect(BASE_URL); // redirect home because this only club
        }
    }
    $decode_id = base64_decode($this->uri->segment(2));
    if(is_numeric($decode_id)){
        $player_id = substr($decode_id, 5);
    }else{
      redirect(BASE_URL);
    }

    $obj = new search_model;
    $data['title'] = "Player Details";
    $data['module'] = "search";
    $data['view_file'] = "front/player_details";
    $data['player_info'] = $obj->get_player_details($player_id);
    if(empty($data['player_info'])){
        redirect(BASE_URL.'search-players');   
    }
    $this->template->front($data);
}// END favoritePlayers()


/*==============================================================
*This functiuon is use for update player image
*/
public function searchPlayersInfo() {
    $user_info = userLoggedInInfo();
    if($user_info){
        if($user_info['user_type']==1){
            redirect(BASE_URL); // redirect home because this only club
        }
    }

    $obj = new search_model;

    if (!$this->input->is_ajax_request()) {
        die("No direct access allowed!");
    }

    
    if($this->input->post()){
        $page_no_value = $this->input->post("page_no_value");
        $limit  = 4;
        $offset = 0;
        if($page_no_value){
          $page_no_value = (int) $page_no_value;
          if($page_no_value > 1){
            $offset = (4 * ($page_no_value -1)) ; 
          }
        }


        if($this->input->post("height_m") && $this->input->post("height_cm")){
            $height = $this->input->post("height_m").".".$this->input->post("height_cm");
        }else{
            $height = "";
        }
        $search_data = array("player_name"=> $this->input->post("player_name"),
                             "search_age"=> $this->input->post("search_age"),
                             "search_country"=> $this->input->post("search_country"), 
                             "position_1"=> $this->input->post("position_1"),
                             "position_2"=> $this->input->post("position_2"),
                             "position_3"=> $this->input->post("position_3"),
                             "weight"=> $this->input->post("weight"), 
                             "height"=> $height
                        );

        $seach_result = $obj->search_players($search_data, $this->player_id, $offset, $limit);
        //pr($seach_result);
        $search_count = $obj->search_player_count($search_data, $this->player_id);

        $html = '';
        if($seach_result){
           foreach ($seach_result as $record) {
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
                $html .='<li>';
                    $html .='<div class="imgCnt">';
                            if($record['profile_image'] && $record['profile_image']!='null' && $record['profile_image']!=''){
                                $profileImage = BASE_URL.'public/uploads/profile_image/'.$record['profile_image'];    
                            }else{
                                $profileImage = BASE_URL.'public/front/assets/images/srchPlyr.jpg';    
                            }
                            $html .='<img src="'.TIMTHUMB.$profileImage.'&w=150&h=150" alt="Profile Image" />';

                            $radom_user_id = str_rand(5, 'numeric') . $record['user_id'];
                            
                            $html .='<a target="_blank" href="'.BASE_URL.'player-details/'.base64_encode($radom_user_id).'">'.lang("common_button_view_detail").'</a>';
                        $html .='</div>';
                        
                        $html .='<div class="pNameLike clearfix">';
                            if($record['first_name']){
                                $html .='<div class="plyrName"><a target="_blank" href="'.BASE_URL.'player-details/'.base64_encode($radom_user_id).'">'.ucfirst($record['first_name'].' '.$record['last_name']) .'</a></div>';
                            }else{
                                $html .='<div class="plyrName"><a target="_blank" href="'.BASE_URL.'player-details/'.base64_encode($radom_user_id).'">N/A</a></div>';
                            }
                            
                            $html .='<div class="likeIcn liked">';
                                        if($record['favorite_status']==0){
                                            $html .='<i id="like_status_'.$record['user_id'].'" class="fa fa-heart-o likeDislike" data-rel="'.$record['user_id'].'" aria-hidden="true"></i>';    
                                        }else{
                                            $html .='<i id="like_status_'.$record['user_id'].'" class="fa fa-heart likeDislike" data-rel="'.$record['user_id'].'" aria-hidden="true"></i>';
                                        }
                                        
                            $html .='</div>';

                            if($record['position_1']){ 
                                $html .='<div class="position">'.lang("common_heading_position").': '. ucfirst($positions[$record['position_1']]).'</div>';
                            }else{ 
                               $html .='<div class="position">N/A</div>';
                            } 

                            if($record['age']){ 
                                $html .='<div class="player_age">'. lang("common_age_placeholder").': '. $record['age'];
                            }else{ 
                                $html .='<div class="player_age">N/A</div>';
                            } 

                    $html .='</div>';
                $html .='</li>';
            } 
        }else{
            $html .= '<li class="no_record">'. lang("no_data_found").'</li>';
        }

       // echo "Count=>".$search_count;die;
        $player_count = $search_count;

        $result = array("html" => $html, "count" => $player_count);
        echo json_encode($result);   
        exit();
    }
}//END searchPlayersInfo()

/*=================================================
*This function is use for like dislike players
*/

public function likeDislikePlayer(){
    $obj = new search_model;
    if (!$this->input->is_ajax_request()) {
        exit('No direct script access allowed');
    }

    $player_id = $this->input->post("player_id");
    $like_dis_status = $this->input->post("like_dis_status");
    
    if ($player_id != "" && $like_dis_status != "") {

        $like_dislike_data = array("player_id"=> $player_id,
                                   "club_id"=> $this->player_id,
                                   "favorite_status"=> $like_dis_status,
                                   "created_at"=> getDateTime());

        $del_status = $obj->delete_like_data($player_id);
        if($del_status){
            $result = $obj->like_dislike_player($like_dislike_data);    
        }else{
            $result = $obj->like_dislike_player($like_dislike_data);    
        }
        
        if ($result) {
            echo json_encode(array('type' => 'success', 'msg' => lang("action_completed_successefully")));
        }
        else {
            echo json_encode(array('type' => 'error', 'msg' => lang("common_message_something_wrong_please_try_again")));
        }
    }        
}//END likeDislikePlayer()
    


/*=====================================================
*This function is use for get pagination records
*/
public function getPageData(){
    $obj = new search_model;

    if (!$this->input->is_ajax_request()) {
        exit('No direct script access allowed');
    }

    //pr($this->input->post('page'));


}// END getPageData();





} // END Close class here

?>
