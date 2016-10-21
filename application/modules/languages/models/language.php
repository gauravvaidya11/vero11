<?php
class Language extends MY_Model
{
	private $table = "languages";
 	function __construct(){
        parent::__construct();
    }

    /*
    * Insert information of language
    */
    function insert(){
    	$this->db->insert($this->table,$this);
    	return TRUE;
    }//END insert();

    public function save() {
    	//if($this->id) {
    		//return $this->update();
    	//}else{
            return $this->insert();
        //}
    }//END save();


    /*
    * This is the function to check the language name
    */
    function check_language_name($langName){
    	$this->db->select('id');
    	$this->db->from($this->table);
    	$this->db->where('lang_name',$langName);
    	$this->db->where('delete_status',0);
    	$query = $this->db->get();
    	if($query->num_rows() > 0)
    		return FALSE;
    	else
    		return TRUE;
    }//END check_language()


     /*
    * This is the function to check the language code
    */
    function check_language_code($langCode){
     	$this->db->select('id');
    	$this->db->from($this->table);
    	$this->db->where('lang_code',$langCode);
    	$this->db->where('delete_status',0);
    	$query = $this->db->get();
    	if($query->num_rows() > 0)
    		return FALSE;
    	else
    		return TRUE;
    }//END check_language()

    function get_language_list(){
    	$this->db->select('id,lang_name,lang_code,status,');
    	$this->db->from($this->table);
    	$this->db->where('status',1);
    	$this->db->where('delete_status',0);
    	$query = $this->db->get();
    	if($query->num_rows() > 0)
    		return $query->result_array();
    	else
    		return FALSE;
    }//END get_language_list();

    function get_language_detail(){
    	$this->db->select('id,lang_name,lang_code,lang_flag,status,');
    	$this->db->from($this->table);
    	$this->db->where('delete_status',0);
    	$query = $this->db->get();
    	if($query->num_rows() > 0)
    		return $query->result_array();
    	else
    		return FALSE;
    }//END get_language_list();

    function set_lang_status(){
    	$this->db->where("id",$this->id);
    	$this->db->update('languages',array('status'=>$this->status));
    	return TRUE;
    }//END set_lang_status()

}//END Language()