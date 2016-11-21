<?php

class Login extends MY_Model {

    private $table = 'tbl_users';
    private $user_details = 'tbl_user_details';

    function __construct() {
        parent::__construct();
    }

    /* ===========================================
     * This function is use for check admin login
     */

    public function logged_in() {
        $admin_username = escapeString($this->input->post('admin_username'));
        $admin_password = md5(escapeString($this->input->post('admin_password')));
        $this->db->select('*');
        $this->db->where('username', $admin_username);
        $this->db->where('password', $admin_password);
        //$this->db->where('access', '1');
        $this->db->where('status', '1');
        $query = $this->db->get('tbl_admin');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }



    /* =================================================
     *   This function is use for users save and insert
     */

    public function save_users() {
        $this->db->insert($this->table, $this);
        return $this->db->insert_id();
    }

// END users_insert()


}// close class here
