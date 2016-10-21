<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Athlete_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /* for inserting player personal info */

    public function insertPersonalInfo($data) {
        $this->db->select('email');
        $this->db->where('email', $data['email']);
        $query = $this->db->get('tbl_user_details');
        if ($query->num_rows() !== 1) {
            $this->db->insert('tbl_user_details', $data);
            return $this->db->insert_id();
        }
        return FALSE;
    }
    
    public function insert_player_image($data) {
        $this->db->insert('tbl_images', $data);
        return $this->db->insert_id();
    }

    public function get_number_of_player() {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('status', '1');
        $this->db->where('delete_status', '0');
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function get_image_info($id) {
        $this->db->select('*');
        $this->db->from('tbl_images');
        $this->db->where('player_id', $id);
        $query = $this->db->get();
        $row = $query->result();
        return $row;  
    }


     public function get_about_us_history() {
        $this->db->select('*');
        $this->db->from('tbl_about_us_history');
        $this->db->where('delete_status', '0');
        $this->db->where('status', '1');
        $this->db->where('delete_status', '0');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_video_info($id) {
        $this->db->select('*');
        $this->db->from('tbl_videos');
        $this->db->where('player_id', $id);
        $query = $this->db->get();
        $row = $query->result();
        return $row; 
    }


    public function get_image($rowid) {
        $this->db->select('*');
        $this->db->from('tbl_images');
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $this->db->where('id', $rowid);
        $query = $this->db->get();
        $row = $query->row();
        return $row;  
    }

    /*============================================
    * This function is use for get image for delete image from folder
    */
    public function get_player_image_for_delete($img_id) {
        $this->db->select('id,filename');
        $this->db->from('tbl_images');
        $this->db->where('id', $img_id);
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $query = $this->db->get();
        $row = $query->row_array();
        return $row;  
    }//END get_player_image_for_delete()


    

    public function get_video($rowid) {
        $this->db->select('*');
        $this->db->from('tbl_videos');
        $this->db->where('id', $rowid);
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $query = $this->db->get();
        $row = $query->row();
        return $row;  
    }

    public function delete_player_image($id) {
        $this->db->where('id', $id);
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $delete_res = $this->db->delete('tbl_images');
        return $delete_res;
    }

    public function delete_player_video($id) {
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $this->db->where('id', $id);
        $delete_res = $this->db->delete('tbl_videos');
        return $delete_res;
    }
    //CLOSE delete_player_image()
    /* check for unique username */

    public function check_unique_username($email) {

        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $this->db->where('delete_status', '0');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return TRUE;
        } else {
            return false;
        } 
    }


    public function get_profile_image() {
        $this->db->select('tbl_user_details.id,tbl_user_details.profile_image, tbl_users.id');
        $this->db->from('tbl_user_details');
        $this->db->join("tbl_users", 'tbl_user_details.user_id=tbl_users.id');
        $this->db->where('tbl_users.id',$this->session->userdata('player_id'));
        $this->db->where('tbl_users.delete_status', '0');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_player_image($img_id=false) {
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

    /* for getting old password in change password functionality */

    public function get_old_password($old_password = false) {
        $this->db->select('password');
        $this->db->from('tbl_users');
        $this->db->where('password', $old_password);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_password($confirm_password = false) {
        $data = array('password'=> md5($confirm_password));
        $this->db->where('id', $this->session->userdata('player_id'));
        $this->db->update('tbl_users', $data);
        return $this->db->affected_rows();
    }

    // public function get_contact_details($id) {
    //     $this->db->select('*');
    //     $this->db->from('tbl_contact');
    //     $this->db->where('player_id', $id);
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }
    
    public function get_player_info($id) {
        $this->db->select('tbl_user_details.*, user.id');
        $this->db->from('tbl_user_details');
        $this->db->join('tbl_users user', 'user.id = tbl_user_details.user_id');
        $this->db->where('tbl_user_details.user_id',$id);
        $this->db->where('user.delete_status','0');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->row();
    }



    public function get_biography($id) {
        $this->db->select('*');
        $this->db->from('tbl_biography');
        $this->db->where('player_id',$id);
        $query = $this->db->get();
        return $query->row();
        
    }

    /* for getting all player postions */

    // public function get_player_positions() {
    //     $this->db->select('*');
    //     $this->db->from('tbl_positions');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    public function update_profile($data) {
        $this->db->where('id', $this->session->userdata('player_id'));
        $this->db->update('tbl_user_details', $data);
        return $this->db->affected_rows();
    }

   
    public function update_player_image($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_images', $data);
        return $id;
    }

    public function update_video_details($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_videos', $data);
        return $this->db->affected_rows();
    }

   
    public function insert_video_details($data) {
        $this->db->insert('tbl_videos', $data);
        return $this->db->insert_id();
    }


    public function updateBiograpyhy($biography) {
        $this->db->where('player_id', $this->session->userdata('player_id'));
        $this->db->update('tbl_biography', $biography);   
        return $this->db->affected_rows();
    }


}// Close Class here

?>