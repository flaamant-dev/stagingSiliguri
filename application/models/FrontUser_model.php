<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontUser_model extends CI_Model {
    
    //==========
    //show Admin
    //==========
    public function show_frontUser($id = "") {
        if(!empty($id)) {	
            $this->db->where('user_type', 'User');
            $this->db->where('user_id',$id);
            $this->db->from('users'); 
            return $this->db->get()->row_array(); 
        } else {	
            $this->db->where('user_type', 'User');
            $this->db->from('users'); 
            return $this->db->get()->result_array();
        }
    }
}
        
        