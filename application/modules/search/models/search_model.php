<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    /*===================================================
    *This function is use for search players infromation
    */
    public function search_players($search_data = false, $player_id = false, $offset, $limit) {
        $this->db->select('su.user_type,
                           su.paid_status,
                           sud.*,
                           favoritie.favorite_status');
        $this->db->from('tbl_users su');
        $this->db->join('tbl_user_details sud', 'su.id=sud.user_id');
        $this->db->join('tbl_favorities_player favoritie', 'favoritie.player_id=sud.user_id','left');
        $this->db->where('su.status', 1);
        $this->db->where('su.user_type', 1); 
        $this->db->where('su.is_verified', 1);
        $this->db->where('su.delete_status', 0);
        //$this->db->where_not_in('sud.user_id', $player_id); // this condition is veryfy for login user not search with player
        //pr($search_data);

        if($search_data){

            if(!empty($search_data['player_name']) || !empty($search_data['search_age']) || !empty($search_data['search_country']) || !empty($search_data['position_1']) || !empty($search_data['position_2']) || !empty($search_data['position_3']) || !empty($search_data['weight']) || !empty($search_data['height'])){
                if(!empty($search_data['player_name'])){
                    $this->db->like('sud.first_name', $search_data['player_name']);
                    $this->db->or_like('sud.last_name', $search_data['player_name']);
                } 

                if(isset($search_data['search_age']) && !empty($search_data['search_age'])){
                    $explode_age = explode("-", $search_data['search_age']);
                    $where = "sud.age BETWEEN '" . $explode_age[0] . "' AND '" . $explode_age[1] . "'";
                    $this->db->where($where);
                }

                if(!empty($search_data['search_country'])){
                    $this->db->where('sud.country', $search_data['search_country']);
                }

                if(!empty($search_data['position_1'])){
                    $this->db->where('sud.position_1', $search_data['position_1']);
                }

                if(!empty($search_data['position_2'])){
                    $this->db->where('sud.position_2', $search_data['position_2']);
                }

                if(!empty($search_data['position_3'])){
                    $this->db->where('sud.position_3', $search_data['position_3']);
                }

                if(!empty($search_data['weight'])){
                    $this->db->or_like('sud.weight', $search_data['weight']);
                }

                if(!empty($search_data['height'])){
                    $this->db->or_like('sud.height', $search_data['height']);
                } 

                $this->db->limit($limit,$offset);   
                $query = $this->db->get();
                //echo $this->db->last_query();die;
                return $query->result_array();
            }
        }
    }



    /*===================================================
    *This function is use for search players count
    */
    public function search_player_count($search_data = false, $player_id = false) {
        $this->db->select('suc.user_type,
                           suc.paid_status,
                           suser_det.*,
                           favorities.favorite_status');
        $this->db->from('tbl_users suc');
        $this->db->join('tbl_user_details suser_det', 'suc.id=suser_det.user_id');
        $this->db->join('tbl_favorities_player favorities', 'favorities.player_id=suser_det.user_id','left');
        $this->db->where('suc.status', 1);
        $this->db->where('suc.user_type', 1); 
        $this->db->where('suc.is_verified', 1);
        $this->db->where('suc.delete_status', 0);
        //$this->db->where_not_in('suser_det.user_id', $player_id); // this condition is veryfy for login user not search with player
        
        if($search_data){
            if(!empty($search_data['player_name']) || !empty($search_data['search_age']) || !empty($search_data['search_country']) || !empty($search_data['position_1']) || !empty($search_data['position_2']) || !empty($search_data['position_3']) || !empty($search_data['weight']) || !empty($search_data['height'])){
                if(!empty($search_data['player_name'])){
                    $this->db->like('suser_det.first_name', $search_data['player_name']);
                    $this->db->or_like('suser_det.last_name', $search_data['player_name']);
                } 

                // if(isset($search_data['search_age']) && !empty($search_data['search_age'])){
                //     $this->db->where('suser_det.age', $search_data['search_age']);
                // }

                if(isset($search_data['search_age']) && !empty($search_data['search_age'])){
                    $explode_age = explode("-", $search_data['search_age']);
                    $where = "suser_det.age BETWEEN '" . $explode_age[0] . "' AND '" . $explode_age[1] . "'";
                    $this->db->where($where);
                }

                if(!empty($search_data['search_country'])){
                    $this->db->where('suser_det.country', $search_data['search_country']);
                }

                if(!empty($search_data['position_1'])){
                    $this->db->where('suser_det.position_1', $search_data['position_1']);
                }

                if(!empty($search_data['position_2'])){
                    $this->db->where('suser_det.position_2', $search_data['position_2']);
                }

                if(!empty($search_data['position_3'])){
                    $this->db->where('suser_det.position_3', $search_data['position_3']);
                }

                if(!empty($search_data['weight'])){
                    $this->db->or_like('suser_det.weight', $search_data['weight']);
                }

                if(!empty($search_data['height'])){
                    $this->db->or_like('suser_det.height', $search_data['height']);
                }

                $query = $this->db->get();
                //echo $this->db->last_query();die;
                return $query->num_rows();
            }   
        }
        
    }// END search_player_count();


    /*===================================================
    *This function is use for favorite players infromation
    */
    public function get_favorite_players($player_id = false) {
        $this->db->select('user.user_type,
                           user.paid_status,
                           user_det.*,
                           favorities.favorite_status');
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
        $this->db->join('tbl_favorities_player favorities', 'user_det.user_id=favorities.player_id');
        $this->db->where('user.status', 1);
        $this->db->where('user.user_type', 1); 
        $this->db->where('user.is_verified', 1);
        $this->db->where('user.delete_status', 0);
        $this->db->where('favorities.favorite_status', 1);
        $this->db->where('favorities.club_id', $player_id); // this condition is veryfy for login user not search with player
        $this->db->order_by("user_det.position_1", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->result_array();
    }


    /*===================================================
    *This function is use for favorite players infromation
    */
    public function get_favorite_player_for_search($player_id = false) {
        $this->db->select('*');
        $this->db->from('tbl_favorities_player');
        $this->db->where('club_id', $player_id); // this condition is veryfy for login user not search with player
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->row_array();
    }


    /*===================================================
    *This function is use for favorite players infromation
    */
    public function get_player_details($player_id = false) {
        $this->db->select('user.user_type,
                           user.paid_status,
                           user_det.*
                        ');
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
        // $this->db->join('tbl_videos video', 'user_det.user_id=video.player_id');
        // $this->db->join('tbl_images image', 'user_det.user_id=image.player_id');
        $this->db->where('user.status', 1);
        $this->db->where('user.user_type', 1); 
        $this->db->where('user.is_verified', 1);
        $this->db->where('user.delete_status', 0);
        $this->db->where('user_det.user_id', $player_id); // this condition is veryfy for login user not search with player

        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->row();
    }

    /*===================================================
    *This function is use for get video information by player id
    */
    public function get_video_info($player_id) {
        $this->db->select('*');
        $this->db->from('tbl_videos');
        $this->db->where('player_id', $player_id);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row; 
    }//END get_video_info()


    /*===================================================
    *This function is use for get image information by player id
    */
    public function get_image_info($player_id) {
        $this->db->select('*');
        $this->db->from('tbl_images');
        $this->db->where('player_id', $player_id);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;  
    }//END get_image_info();


    /*=====================================================
    *This function is use for like dislike search player by club
    */
    public function like_dislike_player($favorite_data, $player_id=false) {
        $this->db->insert('tbl_favorities_player', $favorite_data);
        return $this->db->insert_id();
    }// END like_dislike_player()           

    /*=====================================================
    *This function is use for like dislike search player by club
    */
    public function delete_like_data($player_id=false) {
        if($player_id){
            $this ->db->where('player_id', $player_id);
            $this ->db->delete('tbl_favorities_player');
            return $this->db->affected_rows();
        }
    }// END like_dislike_player()           


}// Close Class here

?>