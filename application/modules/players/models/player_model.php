<?php
class Player_Model extends MY_Model {

    private $countries = "tbl_countries";
    private $contact_tbl = "tbl_contact_admin";

    public function __construct() {
        parent::__construct();
    }
    
    public function get_players($search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0) {

        $this->db->select("user.status, user.delete_status, user_det.*");
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
        $this->db->where('user.delete_status', 0);
        
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
            if (!empty($search->email)) {
                $this->db->like('user_det.email', escapeString($search->email));
            }
           
        }


        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }

        //echo $this->db->last_query();die;
        return $this->db->get()->result();

        
    }

    public function get_players_count($search = false) {
        $this->db->select("user.status, user.delete_status, user_det.*");
        $this->db->from('tbl_users user');
        $this->db->join('tbl_user_details user_det', 'user.id=user_det.user_id');
        $this->db->where('user.delete_status', '0');

        if ($search) {
            
            if (!empty($search->first_name)) {
                $this->db->like('user_det.first_name', escapeString($search->first_name));
            }
            if (!empty($search->last_name)) {
                $this->db->like('user_det.last_name', escapeString($search->last_name));
            }

            if (!empty($search->email)) {
                $this->db->like('user_det.email', escapeString($search->email));
            }
            
        }

        return $this->db->count_all_results();
    }


    public function get_player_info($id) {
        $this->db->select('user.id, tbl_user_details.*');
        $this->db->from('tbl_user_details');
        $this->db->join('tbl_users user', 'user.id = tbl_user_details.user_id');
        $this->db->join('tbl_biography', 'tbl_user_details.id = tbl_biography.player_id');
        $this->db->where('user.delete_status','0');
        $this->db->where('tbl_user_details.id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_player_biography($id) {
        $this->db->select('user.id, tbl_biography.*');
        $this->db->from('tbl_biography');
        $this->db->join('tbl_users user', 'user.id = tbl_biography.player_id');
        $this->db->where('tbl_biography.player_id', $id);
        $this->db->where('user.delete_status','0');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_player_images($id) {
        $this->db->select('user.id, tbl_images.*');
        $this->db->from('tbl_images');
        $this->db->join('tbl_users user', 'user.id = tbl_images.player_id');
        $this->db->where('tbl_images.player_id', $id);
        $this->db->where('user.delete_status','0');
        $query = $this->db->get();
        $row = $query->result();
        return $row;   
    }

    public function get_player_videos($rowid) {
        $this->db->select('user.id,tbl_videos.*');
        $this->db->from('tbl_videos');
        $this->db->join('tbl_users user', 'user.id = tbl_videos.player_id');
        $this->db->where('tbl_videos.player_id', $rowid);
        $this->db->where('user.delete_status','0');
        $query = $this->db->get();
        $row = $query->result();
        return $row;  
    }

}