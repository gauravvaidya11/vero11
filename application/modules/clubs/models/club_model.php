<?php
class Club_Model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    


    /* This function is use for save users */
    public function save_users($login_data) {
        $this->db->insert('tbl_users', $login_data);
        return $this->db->insert_id();
    }//END save_users()

   
    public function insert_biography($data) {
        $this->db->insert('tbl_biography', $data);
        return $this->db->insert_id();
    }//END insert_biography()


    /* for inserting player personal info */
    public function insertPlayerDetails($data) {
        $this->db->insert('tbl_user_details', $data);
        return $this->db->insert_id();
    }// END insertPlayerDetails()


    /* for getting hash value for user verfication */
    public function get_hash_value($email) {
        $this->db->select('hash');
        $this->db->from('tbl_user_details');
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        }
    }//END get_hash_value()


    /*===================================================
    *This function is use for favorite players infromation
    */
    public function get_player_details_by_club_($player_id = false) {
        $this->db->select('user.user_type,
                           user.paid_status,
                           user_det.*
                        ');
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
        $this->db->where('user.user_type', 1); 
        $this->db->where('user.delete_status', 0);
        $this->db->where('user_det.user_id', $player_id); // this condition is veryfy for login club user with player details
        $this->db->where('user_det.club_id', $this->session->userdata('player_id'));

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



    /*===========================================
    * This function is use for get club info 
    */
    public function get_club_profile_info($id) {
        $this->db->select('user.id as user_id, tbl_user_details.*');
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details', 'user.id = tbl_user_details.user_id');
        $this->db->where('user.id',$id);
        $this->db->where('user.delete_status','0');
        $this->db->where('user.user_type',2);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->row();
    }// END get_club_info();

    /*===================================================
    *This function is use for check for unique username
    */
    public function check_unique_username($email) {

        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $this->db->where('delete_status', "0");
        $this->db->limit(1);
        $query = $this->db->get();
       
        if ($query->num_rows() == 0) {
            return TRUE;
        } else {
            return false;
        }
    }// END check_unique_username()

    /*====================================================
    *This function is use for gat club list for admin 
    */
    public function get_clubs($search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0) {

        $this->db->select("user.status, user.id as user_id, user.delete_status, user.paid_status, user_det.*");
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
        $this->db->where('user.delete_status', 0);
        $this->db->where('user.user_type', '2'); // this is club condition
        
        if ($search) {
            if (!empty($search->club_id)) {
                $this->db->like('user_det.user_id', escapeString($search->club_id));
            }
            if (!empty($search->club_name)) {
                $this->db->like('user_det.club_name', escapeString($search->club_name));
            }

            if (!empty($search->club_manager_name)) {
                $this->db->like('user_det.club_manager_name', escapeString($search->club_manager_name));
            }

            if (!empty($search->email)) {
                $this->db->like('user_det.email', escapeString($search->email));
            }
           
        }


        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }

        //echo $this->db->last_query();die;
        return $this->db->get()->result(); 
    }

    /*===============================================
    *This function is use for get club count
    */
    public function get_club_count($search = false) {
        $this->db->select("user.status,  user.id as user_id, user.delete_status, user.paid_status, user_det.*");
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
        $this->db->where('user.delete_status', '0');
        $this->db->where('user.user_type', '2'); // this is club condition

        if ($search) {
            
            if (!empty($search->club_id)) {
                $this->db->like('user_det.user_id', escapeString($search->club_id));
            }
            if (!empty($search->club_name)) {
                $this->db->like('user_det.club_name', escapeString($search->club_name));
            }

            if (!empty($search->club_manager_name)) {
                $this->db->like('user_det.club_manager_name', escapeString($search->club_manager_name));
            }

            if (!empty($search->email)) {
                $this->db->like('user_det.email', escapeString($search->email));
            }
            
        }

        return $this->db->count_all_results();
    }



    /*====================================================
    *This function is use for gat club list for admin 
    */
    public function get_players($search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0) {

        $this->db->select("user.status, user.id as user_id, user.delete_status, user.paid_status,  user_det.*");
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
        $this->db->where('user.delete_status', 0);
        $this->db->where('user_det.club_id', $this->session->userdata('player_id')); 
        $this->db->where('user.user_type', '1'); // this is club condition
        if ($search) {
            if (!empty($search->player_id)) {
                $this->db->like('user_det.user_id', escapeString($search->player_id));
            }
          
            if (!empty($search->first_name)) {
                $this->db->like('user_det.first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('user_det.last_name', escapeString($search->last_name));
            }
            if (!empty($search->email)) {
                $this->db->like('user_det.email', escapeString($search->email));
            }
           
        }


        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }

        //echo $this->db->last_query();die;
        return $this->db->get()->result(); 
    }//END get_players()


    /*===================================================
    *This function is use for get player details
    */
    public function get_player_info($id) {
        $this->db->select('user.id as user_id, tbl_user_details.*');
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details', 'user.id = tbl_user_details.user_id');
        $this->db->where('tbl_user_details.user_id',$id);
        $this->db->where('user.delete_status','0');
        $this->db->where('user.user_type',1);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->row();
    }//END get_player_info()


    /* =======================================================
    * This function is user for update player profile by club
    */ 
    public function update_player_profile($data, $playerId) {
        $this->db->where('user_id', $playerId);
        $this->db->update('tbl_user_details', $data);
        return $this->db->affected_rows();
    }//END update_player_profile()


    /*===============================================
    *This function is use for get player count
    */
     public function get_player_count($search = false) {
        $this->db->select("user.status, user.id as user_id, user.delete_status, user.paid_status,  user_det.*");
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
        $this->db->where('user.delete_status', '0');
        $this->db->where('user_det.club_id', $this->session->userdata('player_id')); 
        $this->db->where('user.user_type', '1'); // this is club condition

        if ($search) {
            if (!empty($search->player_id)) {
                $this->db->like('user_det.user_id', escapeString($search->player_id));
            }
            if (!empty($search->first_name)) {
                $this->db->like('user_det.first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('user_det.last_name', escapeString($search->last_name));
            }

            if (!empty($search->email)) {
                $this->db->like('user_det.email', escapeString($search->email));
            }
            
        }

        return $this->db->count_all_results();
    }//END get_players_count()


    public function get_video($rowid) {
        $this->db->select('*');
        $this->db->from('tbl_videos');
        $this->db->where('id', $rowid);
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $query = $this->db->get();
        $row = $query->row();
        return $row;  
    }

    /*========================================
    * This function is use for get image for remove when update profile image
    */
    public function get_profile_image_for_remove() {
        $this->db->select('tbl_user_details.id, tbl_user_details.profile_image');
        $this->db->from('tbl_user_details');
        $this->db->where('user_id',$this->session->userdata('player_id'));
        $query = $this->db->get();
        return $query->row_array();
    }//END get_profile_image_for_remove();


    /* =======================================================
    * This function is user for update profile
    */ 
    public function update_profile($data) {
        $this->db->where('user_id', $this->session->userdata('player_id'));
        $this->db->update('tbl_user_details', $data);
        return $this->db->affected_rows();
    }

    public function insert_club_image($data) {
        $this->db->insert('tbl_images', $data);
        return $this->db->insert_id();
    }

    public function get_club_image($img_id=false) {
        $this->db->select('id,title,filename');
        $this->db->from('tbl_images');
        if($img_id){
            $this->db->where('id',$img_id);    
        }
        
        $this->db->where('player_id',$this->session->userdata('player_id'));
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->row_array();
    }


    public function update_club_image($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_images', $data);
        return $id;
    }



    public function get_club_info($id) {
        $this->db->select('user.id, tbl_user_details.*');
        $this->db->from('tbl_user_details');
        $this->db->join('tbl_users user', 'user.id = tbl_user_details.user_id');
        $this->db->join('tbl_biography', 'tbl_user_details.id = tbl_biography.player_id');
        $this->db->where('user.delete_status','0');
        $this->db->where('tbl_user_details.id',$id);
        $this->db->where('user.user_type',2);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_club_biography($id) {
        $this->db->select('user.id, tbl_biography.*');
        $this->db->from('tbl_biography');
        $this->db->join('tbl_users user', 'user.id = tbl_biography.player_id');
        $this->db->where('tbl_biography.player_id', $id);
        $this->db->where('user.delete_status','0');
        $query = $this->db->get();
        return $query->row_array();
    }

    /*=====================================================
    *This function is use for get club image 
    */
    public function get_club_images($id) {
        $this->db->select('user.id, tbl_images.*');
        $this->db->from('tbl_images');
        $this->db->join('tbl_users user', 'user.id = tbl_images.player_id');
        $this->db->where('tbl_images.player_id', $id);
        $this->db->where('user.delete_status','0');
        $query = $this->db->get();
        $row = $query->result();
        return $row;   
    }

    /*=====================================================
    *This function is use for get club video 
    */
    public function get_club_videos($rowid) {
        $this->db->select('user.id,tbl_videos.*');
        $this->db->from('tbl_videos');
        $this->db->join('tbl_users user', 'user.id = tbl_videos.player_id');
        $this->db->where('tbl_videos.player_id', $rowid);
        $this->db->where('user.delete_status','0');
        $query = $this->db->get();
        $row = $query->result();
        return $row;  
    }


    /*=====================================================
    *This function is use for update video 
    */
    public function update_video_details($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_videos', $data);
        return $this->db->affected_rows();
    }

   
    /*=======================================================
    * This function is user for insert video 
    */
    public function insert_video_details($data) {
        $this->db->insert('tbl_videos', $data);
        return $this->db->insert_id();
    }


    /*==============================================
    *This function is use for get image
    */
    public function get_image($rowid) {
        $this->db->select('*');
        $this->db->from('tbl_images');
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $this->db->where('id', $rowid);
        $query = $this->db->get();
        $row = $query->row();
        return $row;  
    }//END get_image()


    /*==============================================
    *This function is use for get biography
    */
    public function get_biography($id) {
        $this->db->select('*');
        $this->db->from('tbl_biography');
        $this->db->where('player_id',$id);
        $query = $this->db->get();
        return $query->row();
        
    }//END get_biography()

    /*===========================================================
    *This function is user for update biography infor
    */
    public function updateBiograpyhy($biography) {
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $this->db->update('tbl_biography', $biography);   
        return $this->db->affected_rows();
    }


    /*============================================
    * This function is use for get image for delete image from folder
    */
    public function get_club_image_for_delete($img_id) {
        $this->db->select('id,filename');
        $this->db->from('tbl_images');
        $this->db->where('id', $img_id);
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $query = $this->db->get();
        $row = $query->row_array();
        return $row;  
    }//END get_club_image_for_delete()


    /*============================================
    * This function is use for get video for delete from folder
    */
    public function get_club_video_for_delete($img_id) {
        $this->db->select('id,player_id,filename, thumbnail_image,upload_video_type');
        $this->db->from('tbl_videos');
        $this->db->where('id', $img_id);
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $query = $this->db->get();
        $row = $query->row_array();
        return $row;  
    }//END get_player_video_for_delete()

    /*============================================
    * This function is use for get image for delete image from folder
    */
    public function delete_club_image($id) {
        $this->db->where('id', $id);
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $delete_res = $this->db->delete('tbl_images');
        return $delete_res;
    }

    /*============================================
    * This function is use for delete club video
    */
    public function delete_club_video($id) {
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $this->db->where('id', $id);
        $delete_res = $this->db->delete('tbl_videos');
        return $delete_res;
    }


}