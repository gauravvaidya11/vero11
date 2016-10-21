<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends MY_Model {

    private $table = 'users';
    private $table_roll = 'user_roll';
    private $affil_rela_table = 'affiliate_relations';
    private $business_dealer_request = 'tbl_business_dealer_request';
    private $contact_relation = 'tbl_contact_relation';
    private $coach_relation = 'tbl_dealer_coach_relations';
    private $affi_pool_table = 'tbl_affiliation_pool';
    private $temp_table = 'tbl_temp_signup';
    private $ids = array();

    function __construct() {

        parent::__construct();
    }

    public function get_address_list($id) {
        return $this->db->where('deleted', 0)->
                        order_by('address_type', 'DESC')->
                        order_by('country', 'ASC')->
                        order_by('zone', 'ASC')->
                        order_by('city', 'ASC')->
                        order_by('street_address', 'ASC')->
                        order_by('street_number', 'ASC')->
                        order_by('company', 'ASC')->
                        order_by('firstname', 'ASC')->
                        order_by('lastname', 'ASC')->
                        where('customer_id', $id)->
                        get('customers_address_bank')->result_array();
    }

    public function count_addresses($id) {
        return $this->db->where('deleted', 0)->where('customer_id', $id)->from('customers_address_bank')->count_all_results();
    }

    public function get_customer($id) {
        $result = $this->db->get_where('users', array('id' => $id, 'delete_status' => 0));
        return $result->row();
    }

    public function get_address($address_id) {
        return $this->db->where(array('id' => $address_id, 'deleted' => 0))->get('customers_address_bank')->row_array();
    }

    public function get_company_address($address_id) {
        return $this->db->where(array('id' => $address_id))->get('company_profiles')->row_array();
    }

    /*
     * function to save the address at checkout page
     * 
     */

    public function save_address($data) {
        if (!empty($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->where('address_type', 0);
            $this->db->where('customer_id', $data['customer_id']);
            $this->db->update('customers_address_bank', $data);
            return $data['id'];
        }
        else {
            unset($data['id']);
            $this->db->insert('customers_address_bank', $data);
            return $this->db->insert_id();
        }
    }

    /*
     * function to delete the customer address
     */

    public function delete_address($id, $customer_id) {
        $this->db->where(array('id' => $id, 'customer_id' => $customer_id, 'address_type' => 0))->update('customers_address_bank', ['deleted' => 1]);
        return $id;
    }

    /* =============================================
     * This function is use for Users count when filter
     */

    public function get_users_count($search = false) {
        $this->db->select("id,life_id,username,first_name,last_name,email,roll_type");
        $this->db->from($this->table);
        $this->db->where('delete_status', 0);
        $this->db->where('roll_type', 4);

        if ($search) {
            if (!empty($search->life_id)) {
                $this->db->like('life_id', escapeString($search->life_id));
            }
            if (!empty($search->username)) {
                $this->db->like('username', escapeString($search->username));
            }

            if (!empty($search->first_name)) {
                $this->db->like('first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('last_name', escapeString($search->last_name));
            }
            if (!empty($search->email)) {
                $this->db->like('email', escapeString($search->email));
            }

            if (!empty($search->roll_type)) {
                $this->db->like('roll_type', escapeString($search->roll_type));
            }
        }
        return $this->db->count_all_results();
    }

//END get_users_count()

    /* =============================================
     * This function is use for Get all users
     */

    public function get_users($search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0) {

        $this->db->select("user.id,
                           user.username,
                           user.life_id,
                           user.first_name,
                           user.last_name,
                           user.email,
                           user.phone,
                           user.mobile,
                           user.address,
                           user.last_login,
                           user.life_account,
                           user.status,
                           user.roll_type,
                           user.refer_url
                           ");
        $this->db->from('tbl_users user');
        $this->db->where('user.delete_status', 0);
        $this->db->where('user.roll_type', '4');

        if ($search) {
            if (!empty($search->life_id)) {
                $this->db->like('user.life_id', escapeString($search->life_id));
            }
            if (!empty($search->username)) {
                $this->db->like('user.username', escapeString($search->username));
            }
            if (!empty($search->first_name)) {
                $this->db->like('user.first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('user.last_name', escapeString($search->last_name));
            }
            if (!empty($search->email)) {
                $this->db->like('user.email', escapeString($search->email));
            }
            if (!empty($search->roll_type)) {
                $this->db->like('user.roll_type', escapeString($search->roll_type));
            }
        }


        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }


        return $this->db->get()->result();

        //echo $this->db->last_query();
    }

//END get_dealers()

    /* ============================================
     * This function is use for get dealer for filter users who worked under dealers
     */

    public function get_filter_dealers() {
        $this->db->select("id,username,first_name,last_name,roll_type");
        $this->db->from('tbl_users');
        $this->db->where('roll_type', 2);
        $this->db->where('delete_status', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

// END get_filter_dealers()


    /* ===============================================
     * This function is use for display users details
     */

    public function view_users_details($id) {
        $this->db->select('user.id,
                           user.first_name,
                           user.last_name,
                           user.username,
                           user.mobile,
                           user.country_dailing_code,
                           user.gender,
                           user.working_range,
                           user.roll_type,
                           user.life_id,
                           user.life_account,
                           user.last_login,
                           user.email,
                           user.country_dailing_code_phone,
                           user.phone,
                           user.avatar,
                           user.address,
                           user.post_code,
                           user.register_type,
                           user.latitude,
                           user.longitude,
                           user.created_at,
                           user.status,
                           cust_address.city,
                           cust_address.country_id,
                           cust_address.area_id,
                           cust_address.zone_id,
                           cust_address.street_number,
                           cust_address.street_address,
                           cust_address.zip');

        $this->db->from($this->table . ' user');
        $this->db->JOIN('customers_address_bank cust_address', 'user.id=cust_address.customer_id');
        $this->db->where('user.id', $id);
        $this->db->where('user.delete_status', 0);
        $this->db->where_not_in('user.roll_type', 1);
        $this->db->where_not_in('user.roll_type', 2);
        $this->db->where_not_in('user.roll_type', 5);

        $query = $this->db->get();
        //  echo $this->db->last_query();die;
        $result = $query->row_array();
        if ($result) {
            return $result;
        }
        else {
            return false;
        }
    }

//END view_users_details();

    /* =============================================
     * This function is use for under dealer users count when filter
     */

    public function get_dealer_users_count($dealer_id = "", $search = false) {
        $this->db->select("user.id,user.username,user.mobile,user.first_name,user.last_name,user.email,user.life_id,user.life_account,user.last_login,user.roll_type,affili_rel.parent_id");
        $this->db->from($this->table . ' user');
        $this->db->join('tbl_affiliate_relations affili_rel', 'user.id=affili_rel.child_id');
        $this->db->where('affili_rel.parent_id', $dealer_id);
        $this->db->where('user.delete_status', 0);

        if ($search) {
            if (!empty($search->id)) {
                $this->db->like('user.id', escapeString($search->id));
            }
            if (!empty($search->username)) {
                $this->db->like('user.username', escapeString($search->username));
            }
            if (!empty($search->first_name)) {
                $this->db->like('user.first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('user.last_name', escapeString($search->last_name));
            }
            if (!empty($search->email)) {
                $this->db->like('user.email', escapeString($search->email));
            }
        }
        return $this->db->count_all_results();
    }

//END get_users_count()

    /* =============================================
     * This function is use for Get all users
     */

    public function get_dealer_users($dealer_id = "", $search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0) {

        $this->db->select("user.id,
                           user.username, 
                           user.first_name,
                           user.last_name,
                           user.email,
                           user.phone,
                           user.mobile,
                           user.address,
                           user.life_account,
                           user.last_login,
                           user.status,
                           affili_rel.parent_id
                           ");
        $this->db->from('tbl_users user');
        $this->db->join('tbl_affiliate_relations affili_rel', 'user.id=affili_rel.child_id');

        $this->db->where('affili_rel.parent_id', $dealer_id);
        $this->db->where('user.delete_status', 0);
        if ($search) {
            if (!empty($search->id)) {
                $this->db->like('user.id', escapeString($search->id));
            }
            if (!empty($search->username)) {
                $this->db->like('user.username', escapeString($search->username));
            }
            if (!empty($search->first_name)) {
                $this->db->like('user.first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('user.last_name', escapeString($search->last_name));
            }
            if (!empty($search->email)) {
                $this->db->like('user.email', escapeString($search->email));
            }
        }


        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }


        return $this->db->get()->result();
        //echo $this->db->last_query();die;
    }

//END get_dealer_users()

    /* ========================================================
     * This function is use for change user roll type like customer to dealer
     */

    public function create_dealer($id = "") {
        $this->db->set('roll_type', 2);
        $this->db->where('id', $id);
        $this->db->update('users');
        if ($this->db->affected_rows()) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

//END create_dealer($id="");

    /* ======================================================
     * This function is use for get register info by user id
     */

    public function get_user_info_by_id($user_id) {
        $this->db->select("id,first_name,life_id,last_name,username,email");
        $this->db->from($this->table);
        $this->db->where('id', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return FALSE;
    }

    //END get_user_info_by_id($user_id);

    /* This function is used get all business users
     *  create-773
     */
    public function getAllBusinessUsers() {
        $this->db->select("id,first_name,life_id,last_name");
        $this->db->from($this->table);
        $this->db->where('roll_type', '6');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }

    /* This function is used save suggestion for business user
     *  create-773
     */

    public function save_suggestion() {
        if (isset($this->id)) {
            $this->db->update('tbl_business_dealer_admin_suggestion', $this, array('id' => $this->id));
            return $this->id;
        }
        else {
            $this->db->insert('tbl_business_dealer_admin_suggestion', $this);
            return $this->db->insert_id();
        }
    }

    /* This function is used to check if customer in request table.
     *  create-773
     */

    public function check_customer_available($customer) {

        $this->db->select("id");
        $this->db->from($this->business_dealer_request);
        $this->db->where('user_id', $customer);
        $this->db->where_in('status', array(0, 1, 2, 4)); //only 3-> cancel customer request is avilabe
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE; // not available
        }
        else {
            return TRUE; // customer available
        }
    }

//END check_customer_available

    /* This function is used to check if customer in admin suggection table.
     *  create-773
     */

    public function check_already_suggest($c_uid, $b_uid) {

        $this->db->select("id");
        $this->db->from('tbl_business_dealer_admin_suggestion');
        $this->db->where('business_user_id', $b_uid);
        $this->db->where('customer_id', $c_uid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE; // not available
        }
        else {
            return TRUE; // customer available
        }
    }

//END check_already_suggest


    /* =============================================
     * This function is use for save relations data 
     */

    public function save_relation_data($data) {
        $this->db->insert('tbl_business_dealer_relations', $data);
        return $this->db->insert_id();
    }

    //END save_relation_data

    /* =============================================
     * This function is use for save
     */

    public function save() {
        if (isset($this->id)) {
            $this->db->update($this->table, $this, array('id' => $this->id));
            if ($this->db->affected_rows()) {
                return $this->id;
            }
            else {
                return FALSE;
            }
        }
        else {
            $this->db->insert($this->table, $this);
            return $this->db->insert_id();
        }
    }

    /* =========================================================================================================== 
     * This function is used to get change all downline register type
     */

    function change_downline_register_type($user_id) {

        $downline_customers = get_user_customer($user_id, array(), TRUE, 10000, array(4, 7)); //upper bound

        if ($downline_customers && count($downline_customers)) {
            foreach ($downline_customers as $value) {
                if ($value->downline_level == 1) {
                    $this->update_register_type($value->id, 1); // Direct Customer
                }
                else {
                    $this->update_register_type($value->id, 5); // Free Customer
                }
            }
        }
    }

    /*
     * END
     * ============================================================================================================ */


    /*
     * This function is used to save user company details
     */

    public function saveCompanyDetails($userid) {
        if ($userid != NULL && $userid != "") {
            $this->db->set('user_id', $userid);
            $this->db->insert('tbl_company_profiles');
            return $this->db->insert_id();
        }
    }

    public function get_dealer_relation_exist($uid) {
        $this->db->select('*');
        $this->db->from('tbl_business_dealer_relations');
        $this->db->where('user_id', $uid);
        $result = $this->db->get();
        return $result->row_array();
    }

    /* This function is use save request for become dealer
      create - 773
     */

    /* public function save_request($data) {
      if (isset($data['id'])) {
      $this->db->update($this->business_dealer_request, $data, array('id' => $this->id));
      if ($this->db->affected_rows()) {
      return $this->id;
      } else {
      return FALSE;
      }
      } else {
      $this->db->insert($this->business_dealer_request, $data);
      return $this->db->insert_id();
      }
      } */

//END save_request()

    /* =========================================================================================================== 
     * This function is to update the register_type 
     */

    private function update_register_type($child_id, $resiter_type) {
        $this->db->where(array("id" => $child_id, "delete_status" => 0));
        $this->db->update($this->table, array("register_type" => $resiter_type));
    }

    /* =========================================================================================================== 
     * 
     * 720
     */

    public function get_bussiness_cat($id = false) {
        $this->db->select("id,business_name");
        $this->db->from("tbl_business_categories");
        $this->db->where(array("delete_status" => 0, "status" => 1));
        if ($id) {
            $this->db->where(array("id" => $id));
        }
        return $this->db->get()->result();
    }

    /*
     * This function is used to get all business and distributor ids of given customer
     * 808
     */

    public function get_parent_ids($child_id, $roll_type = false) {
        $query = $this->db->query("select parent_id from  `tbl_affiliate_relations` where child_id=" . $child_id);
        foreach ($query->result() as $row) {
            if ($row->parent_id != 0 && $row->parent_id != '') {
                $roll = getRollType($row->parent_id);
                if ($roll == $roll_type) {
                    $this->ids["id"] = $row->parent_id;
                    $this->ids["type"] = $roll_type;
                }
                $this->get_parent_ids($row->parent_id, $roll_type);
            }
        }
        return $this->ids;
    }

    /*
     * This function is used to save new customer
     */

    public function save_new_customer($data) {
        if (is_array($data)) {
            if (count($data)) {
                $this->db->insert('tbl_users', $data['user_info']);
                $user_id = $this->db->insert_id();
                if ($user_id) {
                    createLifeAccount($user_id);
                    createLifeId($user_id);
                    $data['user_other_info']['user_id'] = $user_id;
                    $data['customer_address']['customer_id'] = $user_id;
                    $this->db->insert('tbl_user_details', $data['user_other_info']);
                    $this->db->insert('tbl_customers_address_bank', $data['customer_address']);
                    $id = $this->db->insert_id();
                    if ($id) {
                        return $user_id;
                    }
                    /* echo "<pre>";
                      print_r($data);die; */
                }
            }
        }
    }

    //END save_new_customer()


    /* =========================================================================================================================================
     * This function is used to get coach haldler Ex dealer or business user(If included)
     * 720
     * ======================================================================================================================================== */

    function save_contact($data) {
        $this->db->insert($this->contact_relation, $data);
    }

    /* =========================================================================================================================================
     * FUNCTION END 
     * ======================================================================================================================================== */

    /* =============================================
     * This function is use for save affiliated relation information
     */

    public function save_affiliated_relation_info($affiliate_rela_data = "") {
        $this->db->insert($this->affil_rela_table, $affiliate_rela_data);
        return $this->db->insert_id();
    }

//END save_affiliated_relation_info()


    /* =============================================
     * This function is use for delete pool information
     */

    public function update_pool_info($email = "") {
        return $this->db->delete($this->affi_pool_table, array('pool_email' => $email));
    }

//END update_pool_info()


    /* =================================================
     * This function is use for delete temp table info
     */

    public function delete_temp_user_info($email) {
        return $this->db->delete($this->temp_table, array('email' => $email));
    }

//END delete_temp_user_info()


    /* =========================================================================================================================================
     * This function is used to get coach haldler Ex dealer or business user(If included)
     * 720
     * ======================================================================================================================================== */

    function get_coach_relation($id = FALSE, $child_id = FALSE) {
        $this->db->select("parent_id,child_id");
        $this->db->from($this->coach_relation);
        if ($id) {
            $this->db->where(array("id" => $id));
        }
        if ($child_id) {
            $this->db->where(array("child_id" => $child_id, "delete_status" => 0));
        }
        return $this->db->get()->row();
    }

    /* =========================================================================================================================================
     * FUNCTION END 
     * ======================================================================================================================================== */


    /* ======================================================
     * This function is use for get register info by email id
     */

    public function get_user_info_by_email($email, $delete_status = FALSE) {
        $this->db->select("id,first_name,last_name,username,email,roll_type,life_id");
        $this->db->from($this->table);
        $this->db->where('email', $email);
        if ($delete_status) {
            $this->db->where('delete_status', 0);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return FALSE; // Unique user
    }

    //END get_user_info_by_email($email);
    
    public function update_customer(){
        $this->db->where('id', $this->id);
        $this->db->update('users',$this);
        return $this->id;
    }
    
    public function update_customer_address($customer_add, $customer_id){
        $this->db->update('customers_address_bank', $customer_add, array('customer_id' => $customer_id,'address_type'=>1));
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function set_email_status($user_id){
        $this->db->set('verify_email_status', 0);
        $this->db->set('email_token', $this->email_token);
        $this->db->where('id', $user_id);
        $this->db->update('users');
        return $user_id;
    }
    
    /* =============================================
     * This function is used for delete entry from tbl_signup
     */

    function delete_temp_email($email) {
        return $this->db->delete('tbl_temp_signup', array('email' => $email));
    }

    //END delete_temp_email

    /* =============================================
     * This function is used for delete entry from tbl_affiliation_pool
     */

    function delete_aff_pool_email($email) {
        return $this->db->delete('tbl_affiliation_pool', array('pool_email' => $email));
    }

    //END delete_temp_email
}

//close class here
