<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
            
    //login for User
    public function user_login($username,$password) {
        $this->db->where('email',$username);
        $this->db->where('user_pswd',$password);            
        $result = $this->db->get('users');
        
        return $result->row_array();
    }
    
    //add User
    public function add_user($enc_password) {
        //user data array
        $data = array(
            'user_name'     => $this->input->post('user_name'),
            'dob'           => $this->input->post('dob'),
            'phone'         => $this->input->post('phone'),
            'user_addr'     => $this->input->post('user_addr'),
            'email'         => $this->input->post('email'),
            'user_pswd'     => $enc_password,
            'user_type'     => $this->input->post('user_type'),
            'user_stat'     => 1
            );
        //insert user
        return $this->db->insert('users',$data);
    }
    
    //show User
    public function show_user($id = "") {
        if(!empty($id)) {	
            $this->db->from('users'); 
            $this->db->where('user_id',$id);
            return $this->db->get()->row_array(); 
        } else {	
            $this->db->from('users'); 
            return $this->db->get()->result_array();
        }
    }
    
    //show only user name
    public function show_user_name() {
        $this->db->select('users.user_id, users.first_name, users.last_name');   
        $this->db->from('users'); 
        return $this->db->get()->result_array();
    }
    
    //show User
    public function show_declined_saler($id) {
        $this->db->select('users.user_id, users.first_name, users.last_name,users.dob,users.email,
        users.phone,users.gender,users.locale,users.profile_picture,users.user_stat,users.user_type,
        users.premium,
        business_registry.premium,business_registry.business_name,
        business_registry.business_type,business_registry.business_about,business_registry.business_address,
        business_registry.business_city,business_registry.business_zip,business_registry.business_stat,business_registry.business_gmap,
        business_registry.business_contact_person,business_registry.business_phone,
        business_registry.business_email, business_registry.approved');   
        $this->db->from('users'); 
        $this->db->join('business_registry','business_registry.user_id=users.user_id', 'INNER');
        $this->db->where('users.user_type', 'User');
        $this->db->where('business_registry.approved', 0);
        $this->db->where('users.user_id',$id);
        return $this->db->get()->row_array(); 
    }
    
    //edit User
    public function edit_user() {

        $id = $this->input->post('user_id');
        //user data array
        $data = array(
            'user_name'         => $this->input->post('user_name'),
            'dob'               => $this->input->post('dob'),
            'phone'             => $this->input->post('user_phn'),
            'user_addr'         => $this->input->post('user_addr'),
            'email'             => $this->input->post('user_email'),
            'user_pswd'         => $enc_password,
            'user_type'		    => $this->input->post('user_type')
            );
        //update user
        $this->db->where('user_id',$id);
        return $this->db->update('users',$data);
    }
    
    //delete User
    public function del_user() {

        $id = $this->input->post('user_id');
        
        //delete user
        $this->db->where('user_id',$id);
        return $this->db->delete('users');
    }
    
    //change user type
    public function change_user_type($user_id) {

        //user data array
        $data = array( 'user_type' => 'Saler' );
        //update user
        $this->db->where('user_id',$user_id);
        return $this->db->update('users',$data);
    }
    
    //update User login time
    public function update_loginTime($user_id) {

        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        //user data array
        $data = array( 'login_time' => $date );
        //update user
        $this->db->where('user_id',$user_id);
        return $this->db->update('users',$data);
    }
    
	//register business url
    public function business_url_reg($id,$type,$url) {
        //user data array
        $data = array(
            'business_registry_id'  => $id,
            'link_type'             => $type,
            'link'                  => $url
            );
        //insert user
        return $this->db->insert('business_sociallink',$data);
    }
    
	// //enroll a doctor in system
    // public function doctor_enroll_form($fileName) {
    //     //user data array
    //     $data = array(
    //         'user_id'               => $this->input->post('user_id'),
    //         'user_type'             => $this->input->post('user_type'),
    //         'experience'            => $this->input->post('experience'),
    //         'doc_cat'               => $this->input->post('doc_cat'),
    //         'license_no'            => $this->input->post('license_no'),
    //         'license_doc'           => $fileName,
    //         'about'                 => $this->input->post('about'),
    //         'service'               => $this->input->post('service'),
    //         'specialization'        => $this->input->post('specialization'),
    //         'award'                 => $this->input->post('award'),
    //         'education'             => $this->input->post('education'),
    //         'membership'            => $this->input->post('membership'),
    //         'registration'          => $this->input->post('registration')
    //         );
    //     //insert doctor
    //     $this->db->insert('professional_info',$data);
    //     return $this->db->insert_id();
    // }
    
    //update user/seller
    public function approve_saler() {

        $id = $this->input->post('user_id');
        $business_registry_id = $this->input->post('business_registry_id');
        //update business registry
        $data = array( 
            'business_stat' => 1,
            'approved'      => 1
        );     
        $this->db->where('business_registry_id',$business_registry_id);
        return $this->db->update('business_registry',$data);
    }
    
    //update user/seller
    public function update_userseller($flag) {

        $id = $this->input->post('user_id');
        //update user
        if($flag == 1) { 
            $data = array( 'user_type' => "Saler" );
        } elseif($flag == 2) {
            $data = array( 'user_type' => "User" );
        }        
        $this->db->where('user_id',$id);
        return $this->db->update('users',$data);
    }
    
    //show User
    public function show_professional_info($id) {
        $this->db->select('users.user_id, users.first_name, users.last_name,users.dob,users.email,
        users.phone, users.gender, users.locale, users.profile_picture,users.user_stat, professional_info.user_type,
        professional_info.experience, categories.cat_name, professional_info.doc_cat, professional_info.license_no,
        professional_info.about, professional_info.service, professional_info.specialization, professional_info.award, 
        professional_info.education, professional_info.membership,professional_info.registration,
        professional_info.like_profile,professional_info.verified');   
        $this->db->from('users'); 
        $this->db->join('professional_info','professional_info.user_id=users.user_id', 'INNER');
        $this->db->join('categories','categories.cat_id=professional_info.doc_cat', 'INNER');
        $this->db->where('users.user_id',$id);
        return $this->db->get()->row_array(); 

    }


}