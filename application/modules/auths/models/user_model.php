<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /* for inserting player personal info */

    public function insertPlayerDetails($data) {
        $this->db->insert('tbl_user_details', $data);
        return $this->db->insert_id();
    }


    public function get_player_info($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details', 'user.id = tbl_user_details.user_id');
        $this->db->where('user.id',$user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row;
        }
    }

    public function get_number_of_player() {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $query = $this->db->get();
        return $query->num_rows();
    }


    /* for inserting login credentials of player */

    public function insertLoginDetails($login_data) {
        $this->db->insert('tbl_users', $login_data);
        return $this->db->insert_id();
    }

    public function insert_biography($data) {
        $this->db->insert('tbl_biography', $data);
        return $this->db->insert_id();
    }

    /* for checking registered email and password to continue login */

    public function login($data) {
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    /* check for unique username */

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
    }

    /* get player login information */

    function get_user($usr, $pwd) {
        $sql = "SELECT * FROM `tbl_users` WHERE `email` = '" . $usr . "' AND `password` = '" . md5($pwd)."' AND `status`='1' AND `delete_status`='0'";
        $query = $this->db->query($sql);
        //echo $this->db->last_query();die;
        return $query->row();
    }

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
    }

    

     public function get_user_email($email=false) {
        $this->db->select('id,email');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $this->db->where('status', "1");
        $this->db->where('delete_status', "0");
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->row_array();
    }

    /* for getting old password in change password functionality */

    public function get_old_password($email) {
        $this->db->select('password');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $this->db->where('status', "1");
        $this->db->where('delete_status', "0");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['password'];
        }
    }

    /* for getting all player postions */

    // public function get_player_positions() {
    //     $this->db->select('*');
    //     $this->db->from('tbl_positions');
    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         $row = $query->result_array();
    //         return $row;
    //     }
    // }

    /* to change verified status of player */

    function verify_user($email) {
        $data = array('is_verified' => 1);
        $this->db->where('email', $email);
        $this->db->update('tbl_users', $data);
    }

    /* for updating otp in forgot password functionality */

    function update_otp($email, $otp) {
        $data = array('otp' => $otp);
        $this->db->where('email', $email);
        
        $this->db->update('tbl_users', $data);
    }

    public function get_otp($email) {
        $this->db->select('id,otp');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $this->db->where('delete_status', "0");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['otp'];
        }
    }

    /* for password reset functionality */

    public function reset_password($email, $reset_pass_data) {
        $this->db->where('email', $email);
        $this->db->update('tbl_users', $reset_pass_data);
        return $this->db->affected_rows();
    }

}

?>