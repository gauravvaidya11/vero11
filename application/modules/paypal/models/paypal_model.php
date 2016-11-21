<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paypal_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    /* This function is use for save user payment information */
    public function save_user_payment($payment_data) {
        $this->db->insert('tbl_payment', $payment_data);
        return $this->db->insert_id();
    }//END save_user_payment()


    /* This function is use for update user payment account information */
    public function update_user_payment_account($payment_data, $user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_payment_account', $payment_data);
        $this->db->affected_rows();
    }//END update_user_payment_account()

    /*=====================================================
    *This function is use for change user paid status when payment is completed
    */
    public function update_paid_status($data, $user_id=false) {
        $this->db->where('id', $user_id);
        $this->db->update('tbl_users', $data);
        $this->db->affected_rows();
    }//END update_paid_status()

    /*=====================================================
    *This function is use for get order details from payment account table
    */
    public  function get_order_basic_details($user_id = false){
        $this->db->select('*');
        $this->db->from('tbl_payment_account');
        $this->db->where('user_id', $user_id);
        $this->db->where('delete_status', '0');
        $query = $this->db->get();
        $row = $query->row_array();
        return $row;
    }//END get_order_basic_details();

    /*====================================================
    *This function is use for gat payment list for admin 
    */
    public function get_payment_account($search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0) {

        $this->db->select("payment_ac.*, user.user_type,user.paid_status,
                          user_det.first_name,
                          user_det.last_name");
        $this->db->from('tbl_payment_account payment_ac');
        $this->db->join('tbl_users user', 'payment_ac.user_id=user.id', 'left');
        $this->db->join('user_details user_det', 'payment_ac.user_id=user_det.user_id', 'left');
        $this->db->where('user.delete_status', '0');
        if ($search) {
            if (!empty($search->id)) {
                $this->db->like('user.id', escapeString($search->id));
            }
          
            if (!empty($search->first_name)) {
                $this->db->like('user_det.first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('user_det.last_name', escapeString($search->last_name));
            }
            
           
        }


        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->result(); 

    }

    /*===============================================
    *This function is use for get payment count
    */
    public function get_payment_account_count($search = false) {
        $this->db->select("payment_ac.*, user.user_type,user.paid_status,
                           user_det.first_name,
                           user_det.last_name");
        $this->db->from('tbl_payment_account payment_ac');
        $this->db->join('tbl_users user', 'payment_ac.user_id=user.id', 'left');
        $this->db->join('tbl_user_details user_det', 'payment_ac.user_id=user_det.user_id', 'left');
        $this->db->where('user.delete_status', '0');
        
        if ($search) {
            
            if (!empty($search->first_name)) {
                $this->db->like('user_det.first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('user_det.last_name', escapeString($search->last_name));
            }
            
        }
        //echo $this->db->last_query();die;
        return $this->db->count_all_results();
    }

    /*===============================================
    *This function is use for get payment details
    */
    public function view_payment_details($id = false) {
        $this->db->select("payment_ac.*, user.user_type,user.paid_status,
                           user_det.first_name,
                           user_det.last_name");
        $this->db->from('tbl_payment_account payment_ac');
        $this->db->join('tbl_users user', 'payment_ac.user_id=user.id', 'left');
        $this->db->join('tbl_user_details user_det', 'payment_ac.user_id=user_det.user_id', 'left');
        $this->db->where('user.delete_status', '0');
        $this->db->where('payment_ac.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }//END view_payment_details();
    
    /*====================================================
    *This function is use for gat payment list for admin 
    */
    public function get_payments($user_id, $search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0) {

        $this->db->select("payment.*, user.user_type,user.paid_status, 
                          user_det.first_name,
                          user_det.last_name");
        $this->db->from('tbl_payment payment');
        $this->db->join('tbl_users user', 'payment.user_id=user.id', 'left');
        $this->db->join('tbl_user_details user_det', 'payment.user_id=user_det.user_id', 'left');
        $this->db->where('user.delete_status', '0');
        $this->db->where('payment.user_id', $user_id);
        if ($search) {
            if (!empty($search->id)) {
                $this->db->like('user.id', escapeString($search->id));
            }
          
            if (!empty($search->first_name)) {
                $this->db->like('user_det.first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('user_det.last_name', escapeString($search->last_name));
            }
            
           
        }


        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->result(); 

    }

    /*===============================================
    *This function is use for get payment count
    */
    public function get_payment_count($user_id, $search = false) {
        $this->db->select("payment.*, user.user_type,user.paid_status, 
                          user_det.first_name,
                          user_det.last_name");
        $this->db->from('tbl_payment payment');
        $this->db->join('tbl_users user', 'payment.user_id=user.id', 'left');
        $this->db->join('tbl_user_details user_det', 'payment.user_id=user_det.user_id', 'left');
        $this->db->where('user.delete_status', '0');
        $this->db->where('payment.user_id', $user_id);
        
        if ($search) {
            
            if (!empty($search->first_name)) {
                $this->db->like('user_det.first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('user_det.last_name', escapeString($search->last_name));
            }
            
        }
        //echo $this->db->last_query();die;
        return $this->db->count_all_results();
    }

    /*
     * This function is use for change common status and pas (id, status, table)
     */

    public function setstatus($id, $status, $table) {
        $this->db->set('order_status', $status);
        $this->db->where('id', $id);
        $this->db->update($table);
        if ($this->db->affected_rows()) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }


}// Close class here

?>