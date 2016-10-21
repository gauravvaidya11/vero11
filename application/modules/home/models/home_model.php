<?php
class Home_Model extends MY_Model {

    private $countries = "tbl_countries";
    private $contact_tbl = "tbl_contact_admin";

    public function __construct() {
        parent::__construct();
    }
    
    public function get_country_id($country){
        $this->db->select("id");
        $this->db->from($this->countries);
        $this->db->where(array("iso_code_2" => strtoupper($country)));
        return $this->db->get()->row();
    }

    public function insert_contact_details($data){
        $this->db->insert($this->contact_tbl, $data);
        return $this->db->insert_id();        
    }

    /*====================================================
    * This function is use for get all about us history
    */
    public function get_about_us_history(){
        $this->db->select("*");
        $this->db->from("tbl_about_us_history");
        $this->db->where("status", '1');
        $this->db->where("delete_status", '0');
        $this->db->order_by("play_date", 'DESC');
        $this->db->limit('6', '0');
        $query = $this->db->get();
        return $query->result_array();
    }// END get_about_us_history()

    

}// END Class