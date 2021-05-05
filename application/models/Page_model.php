<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {
    
    //show Customer Care
    public function show_customercare($id = "") {
        if(!empty($id)) {	
            $this->db->from('customer_care'); 
            $this->db->where('care_id',$id);
            return $this->db->get()->row_array(); 
        } else {	
            $this->db->from('customer_care'); 
            return $this->db->get()->result_array();
        }
    }
    
	//is already siliguri user
    function Is_already_register($id) {
        $this->db->where('login_oauth_uid', $id);
        $query = $this->db->get('users');
        if($query->num_rows() > 0) 
            return $query->row_array(); 
        else 
            return false;
    }
    
	//update loggedin person
    function Update_user_data($data, $id) {
        $this->db->where('login_oauth_uid', $id);
        $query = $this->db->update('users', $data);
        if($query) 
            return true; 
        else 
            return false;
    }
    
	//insert new loggedin person
    function Insert_user_data($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

	//insert session data for dashboard user
    function insert_session($data) {
        $this->db->where('user_id', $data['user_id']);
        $query = $this->db->get('session');
        if($query->num_rows() > 0) {
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('session', $data);
            return $this->db->insert_id();
        } else {
            $this->db->insert('session', $data);
            return $this->db->insert_id();
        }


    }
    
	//search session data for node dashboard
    function search_user_session($id) {
        $this->db->where('user_id', $id);
        $this->db->from('session'); 
        $records = $this->db->get()->row_array();
        return $records;
    }
    
	//like portfolio of a person
    function like_portfolio() {  
        $p_id = $this->input->post('p_id'); 

        $this->db->set('like_profile', 'like_profile + 1', FALSE);
        $this->db->where('user_id', $p_id);
        $this->db->update('professional_info');

        $details = $this->Doctor_model->show_doctors($p_id);     

        return $details['like_profile'];
    }
    
}