<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
    
    //login for Admin
    public function backend_login($username,$password) {
        $this->db->where('admin_email',$username);
        $this->db->where('admin_password',$password);            
        $result = $this->db->get('admin');
        
        return $result->row_array();
    }
    
    //=========
    //add Admin
    //=========
    public function add_admin($enc_password) {
        //user data array
        $data = array(
            'admin_name'        => $this->input->post('admin_name'),
            'admin_email'       => $this->input->post('admin_email'),
            'admin_password'    => $enc_password,
            'admin_type'		=> $this->input->post('admin_type'),
            'admin_stat'		=> 1
            );
        //insert admin
        return $this->db->insert('admin',$data);
    }
    
    //==========
    //show Admin
    //==========
    public function show_admin($id = "") {
        if(!empty($id)) {	
            $this->db->from('admin'); 
            $this->db->where('admin_id',$id);
            return $this->db->get()->row_array(); 
        } else {	
            $this->db->from('admin'); 
            return $this->db->get()->result_array();
        }
    }
    
    //=======================
    //update Admin login time
    //=======================
    public function update_loginTime($admin_id) {

        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        //user data array
        $data = array( 'admin_login' => $date );
        //update user
        $this->db->where('admin_id',$admin_id);
        return $this->db->update('admin',$data);
    }
    
    //==========
    //edit Admin
    //==========
    public function edit_admin() {

        $id = $this->input->post('admin_id');
        //user data array
        $data = array(
            'admin_name'        => $this->input->post('admin_name'),
            'admin_email'       => $this->input->post('admin_email'),
            'admin_type'		=> $this->input->post('admin_type')
            );
        //update user
        $this->db->where('admin_id',$id);
        return $this->db->update('admin',$data);
    }
    
    //============
    //delete Admin
    //============
    public function del_admin() {

        $id = $this->input->post('id');
        
        //delete user
        $this->db->where('admin_id',$id);
        return $this->db->delete('admin');
    }
        
    //===========================
    //enable/disable backend User
    //===========================
    public function toggle_backendUser() {

        $admin_id = $this->input->post('admin_id');
        $admin_dtl = $this->Backend_model->show_admin($admin_id);
        
        if($admin_dtl['admin_stat'] == '1') {
            
            $data = array('admin_stat' => 0 );
            
            $this->db->where('admin_id',$admin_id);
            $this->db->update('admin',$data);

            return 'This Backend User is disabled';
        } else {
            
            $data = array('admin_stat' => 1 );
            
            $this->db->where('admin_id',$admin_id);
            $this->db->update('admin',$data);

            return 'The Backend User is enabled';
        }
        
    }
        
    //=============
    //store lgin IP
    //=============
    public function store_ip($ip_addr) {
        
        $this->db->where('ip_address',$ip_addr);         
        $result = $this->db->get('stored_ip');
        
        if($result) {
            return false;
        } else {
            $data = array( 'ip_address' => $ip_addr );
            return $this->db->insert('stored_ip',$data);
        }
        
    }
    
}