<?php
class Setting extends MY_Model
{
    function __construct(){
        parent::__construct();
    }

/*
* This function is use to get basic setting.
*/
public function getSetting($tag){
    $this->db->select('setting_value');
    $this->db->where('setting_name',$tag);
    $this->db->where('status',1);
    $setting = $this->db->get('tbl_options')->row_array();
    if(!empty($setting)){
        return $setting['setting_value'];
    }return false;
}
/*
* This function is use to update basic setting.
*/
public function update($tag, $value){ 
    $this->db->where('setting_name',$tag);
    $data = array('setting_value'=>$value);
    $this->db->update('tbl_options', $data);
    return $this->db->affected_rows();
}


// Setting class close here     
}
