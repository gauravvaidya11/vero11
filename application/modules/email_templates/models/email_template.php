<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_Template extends MY_Model {

    private $table = 'tbl_admin_email_templates';

    function __construct() {
		parent::__construct();
    }
    
    /*==============  get email templates counts for email templates listing ========*/
    public function getEmailTempCount($search = false) {
      
        $this->db->select('main.name,main.id,main.status');
        $this->db->from($this->table.' AS main');
        if ($search) {
            if (!empty($search->name)) {
                $this->db->like('main.name', escapeString($search->name));
            }
        }
        return $this->db->count_all_results();
    }
    /*===============end=================*/

    /*==============  get all email templates ========*/
    public function getEmailTemplates($search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0) {
      
        $select = 'main.name,main.id,main.type,main.status';
        $this->db->select($select);
        $this->db->from($this->table.' AS main');
        
        if (!is_null($search)) {
            if ($search) {
				if (!empty($search->name)) {
                    $this->db->like('main.name', escapeString($search->name));
                }
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
    /*=================== end ==========================*/

     public function save() {
        if (isset($this->id)) {
            $this->db->update($this->table, $this, "id =$this->id");
            return $this->db->affected_rows();
        }
        else {
            $this->db->insert($this->table, $this);
            return $this->db->insert_id();
        }
    }

   
    public function getEmailTemplate($id) {
        $this->db->where('id', $id);
        return $categories = $this->db->get($this->table)->row_array();
    }
    /*==============  get all email templates ========*/
    public function getEmailTemplateContent($type) {
      
        $select = 'main.content';
        $this->db->select($select);
        $this->db->from($this->table.' AS main');
        $this->db->where(array("type" => $type,"status" => 1,"delete_status" => 0));

        return $this->db->get()->row();
		//echo $this->db->last_query();
    }
    /*=================== end ==========================*/


}
?>
