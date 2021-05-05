<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model {
    
    //show User Status
    public function show_user_status($id) {
        $this->db->select('users.user_type'); 
        $this->db->from('users'); 
        $this->db->where('user_id',$id);
        return $this->db->get()->row_array(); 
    }

    //show User professional Status
    public function show_user_professional_status($id) {
        $this->db->select('users.user_type, professional_info.user_type as profession'); 
        $this->db->from('users'); 
        $this->db->join('professional_info','professional_info.user_id=users.user_id', 'LEFT');
        $this->db->where('users.user_id',$id);
        return $this->db->get()->row_array(); 
    }

}