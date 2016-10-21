<?php

class Profile extends MY_Model {

    private $admin_table = "tbl_admin";
    private $users_table = "tbl_users";

    function __construct() {
        parent::__construct();
    }

    /* ===========================================
     * This function is use for get login user info
     */

    public function get_login_users($id) {
        $result = $this->db->get_where('users', array('id' => $id));
        return $result->row_array();
    }

//END get_login_users($id)

    /* =================================================
     * 	This function is use for get admin profile info
     */

    public function getAdminProfile() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_admin');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    /* =================================================
     * 	This function is use for save and insert
     */

    public function insert() {
        
    }

    public function update() {
        $this->db->update($this->admin_table, $this, array('id' => $this->id));
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    

//END update_customer_address()

    /* =================================================
     *  This function is use for Admin save data
     */

    public function save() {
        if ($this->id) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

// END save()




    public function users_update() {
        $this->db->update($this->users_table, $this, array('id' => $this->id));
        //echo $this->db->last_query();die;
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* =================================================
     *  This function is use for Front save data
     */

    public function users_save() {
        if ($this->id) {
            return $this->users_update();
        } else {
            return $this->users_insert();
        }
    }

// END front_save()


   
    public function select() {
        $this->db->select('password');
        $this->db->from($this->admin_table);
        $this->db->where('id', $this->id);
        $result = $this->db->get();
        return $result->row();
    }

// END select()


    /* =================================================
     *  This function is use for front end check current password is currect or not
     */

    public function users_select() {
        $this->db->select('password');
        $this->db->from($this->users_table);
        $this->db->where('id', $this->id);
        $this->db->where('delete_status', 0);
        $result = $this->db->get();
        return $result->row();
    }

// END front_select()


    /* =================================================
     *  This function is use for get admin avatar by id
     */

    public function get_avatar($id = "") {
        $this->db->select('id,avatar');
        $this->db->from($this->admin_table);
        $this->db->where('id', $id);
        $result = $this->db->get();
        return $result->row_array();
    }


    public function save_user_settings($setting_data = "", $user_id = "") {
        return $this->db->update($this->users_table, $setting_data, array('id' => $user_id));
    }

//END save_user_settings($setting_data ="", $user_id = "")

    
    
}

// close class here
