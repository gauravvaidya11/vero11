<?php

class Cms_model extends MY_Model {
    private $tbl_contact_admin = "tbl_contact_admin";
    function __construct() {
        parent::__construct();
    }

    /*=========================================
    * This function is use for add about us history
    */
    public function save_about_us(){
    	if (isset($this->id)) {
            $this->db->update('tbl_about_us_history', $this, array('id' => $this->id));
            if ($this->db->affected_rows()) {
                return $this->id;
            }
            else {
                return FALSE;
            }
        }
        else {
    		$this->db->insert('tbl_about_us_history', $this);
        	return $this->db->insert_id();
        }
    }// END save_about_us()


    /* =============================================
    * This function is use for check uniqe coupon code
    */
    public function get_about_us($id = "") {
        $this->db->select('*');
        $this->db->from('tbl_about_us_history');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();  
    }//END get_about_us();


    /* =============================================
    * This function is use for get reply email info
    */
    public function get_reply_email_info($id = "") {
        $this->db->select('*');
        $this->db->from('tbl_contact_admin');
        $this->db->where('id', $id);
        $this->db->where('status', '1');
        $this->db->where('delete_status', "0");
        return $this->db->get()->row_array();  
    }//END get_about_us();

    public function save_reply_mail(){
        $this->db->insert($this->tbl_contact_admin, $this);
        return $this->db->insert_id();        
    }

    /* =============================================
    * This function is use for get contact details info
    */
    public function get_contact_info($id = "") {
        $this->db->select('*');
        $this->db->from('tbl_contact_admin');
        $this->db->where('id', $id);
        $this->db->where('contact_by', 'front');
        $this->db->where('delete_status', "0");        
        return $this->db->get()->row();  
    }//END get_about_us();
    

    /* =============================================
    * This function is use for get contact details info
    */
    public function get_contact_reply_info($id = "") {
        $this->db->select('*');
        $this->db->from('tbl_contact_admin');
        $this->db->where('reply_id', $id);
        $this->db->where('sender_id', '1');
        $this->db->where('delete_status', "0");
        $query = $this->db->get();
        //echo $this->db->last_query();die; 
        return $query->result();         
    }//END get_about_us();
    
    

    /* =============================================
    * This function is use for get remove image
    */
    public function get_remove_image($id = "") {
        $this->db->select('id, player_image');
        $this->db->from('tbl_about_us_history');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();  
    }//END get_remove_image();

    /*================================================
    * This function is used for get about us history
    */
    public function get_about_us_history($search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0) {
        $this->db->select('*');
        $this->db->where('delete_status', '0');

        if (!is_null($search)) {
            if (!empty($search->heading)) {
                $this->db->like('about_us_heading', $search->heading);
            }
            if (!empty($search->play_date)) {                
                $this->db->like('play_date', $search->play_date);
            }
        }

        // apply limit in query
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        // apply sort by in query
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }

        return  $this->db->get('tbl_about_us_history')->result();
        //echo $this->db->last_query();
    }


    public function get_about_us_count($search = false) {
        $this->db->select("id,about_us_heading,play_date");
        if ($search) {
            
            if (!empty($search->heading)) {
                $this->db->like('about_us_heading', escapeString($search->heading));
            }
            if (!empty($search->play_date)) {
                $this->db->like('play_date', escapeString($search->play_date));
            }
            
        }
        return $this->db->count_all_results('tbl_about_us_history');
    }


    /*================================================
    * This function is used for get about us history
    */
    public function get_contact_us_history($search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0) {
        $this->db->select('*');
        $this->db->where('delete_status', '0');
        $this->db->where('contact_by', 'front');

        if (!is_null($search)) {
            if (!empty($search->name)) {
                $this->db->like('name', $search->name);
            }
            if (!empty($search->email)) {                
                $this->db->like('email', $search->email);
            }
        }

        // apply limit in query
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        // apply sort by in query
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }

        $this->db->group_by("email");
        return  $this->db->get('tbl_contact_admin')->result();
        //echo $this->db->last_query();
    }


    public function get_contact_us_count($search = false) { 
        $this->db->select("id,name,email, phone, message");
        $this->db->where('delete_status', '0');
        $this->db->where('contact_by', 'front');
        if ($search) {
            
            if (!empty($search->name)) {
                $this->db->like('name', escapeString($search->name));
            }
            if (!empty($search->email)) {
                $this->db->like('email', escapeString($search->email));
            }
            
        }
        $this->db->group_by("email");
        return $this->db->count_all_results('tbl_contact_admin');
    }


    /*
     * This function is use to get paypal setting.
     */

    
}
