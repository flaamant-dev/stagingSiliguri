<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_model extends CI_Model {    
    
	//register business seller
    public function business_register() {
        //user data array
        $data = array(
            'user_id'                   => $this->input->post('user_id'),
            'business_name'             => $this->input->post('business_name'),
            'business_type'             => $this->input->post('business_type'),
            'business_contact_person'   => $this->input->post('business_contact_person'),
            'business_email'            => $this->input->post('business_email'),
            'business_phone'            => $this->input->post('business_phone'),
            'business_about'            => $this->input->post('business_about'),
            'business_address'          => $this->input->post('business_address'),
            'business_city'             => 'Siliguri',
            'business_zip'              => $this->input->post('business_zip'),
            'business_gmap'             => $this->input->post('business_gmap')
            );
        //insert user
        $this->db->insert('business_registry',$data);
        return $this->db->insert_id();
    }
    
	//register business category
    public function category_reg($bis_regID,$cat_id) {
        //user data array
        $data = array(
            'cat_id'                => $cat_id,
            'business_registry_id'  => $bis_regID
            );
        //insert user
        return $this->db->insert('business_category',$data);
    }
    
	//update company logo
    public function update_comLOGO($file_name,$business_registry_id) {
        //user data array
        $data = array('logo'  => $file_name);
        //update business
        $this->db->where('business_registry_id',$business_registry_id);
        return $this->db->update('business_registry',$data);
    }
                
    //show businesses of a User
    public function show_user_business($user_id,$business_registry_id='') {
        if(!empty($business_registry_id)) {	
            $this->db->select('users.user_id, 
                        users.first_name, 
                        users.last_name, 
                        business_registry.business_name, 
                        business_registry.business_type,
                        business_registry.business_registry_id, 
                        business_registry.business_stat, 
                        business_registry.business_open, 
                        business_registry.offer_available, 
                        business_registry.approved');   
            $this->db->from('users'); 
            $this->db->join('business_registry','business_registry.user_id=users.user_id', 'INNER');
            $this->db->where('users.user_type', 'Saler');
            $this->db->where('business_registry.business_registry_id',$business_registry_id); 
            $this->db->where('users.user_id',$user_id);
            return $this->db->get()->row_array(); 
        } else {	
            $this->db->select('users.user_id, 
                        users.first_name, 
                        users.last_name, 
                        business_registry.business_name, 
                        business_registry.business_type,
                        business_registry.business_registry_id, 
                        business_registry.business_stat, 
                        business_registry.business_open, 
                        business_registry.offer_available, 
                        business_registry.approved');   
            $this->db->from('users'); 
            $this->db->join('business_registry','business_registry.user_id=users.user_id', 'INNER');
            $this->db->where('users.user_type', 'Saler');
            $this->db->where('users.user_id',$user_id);
            return $this->db->get()->result_array(); 
        }
    }  
                
    //show businesses details
    public function show_businessDetails($business_registry_id='') {
        $this->db->select('users.user_id, 
                    users.first_name, 
                    users.last_name, 
                    business_registry.business_name, 
                    business_registry.business_type,
                    business_registry.business_registry_id, 
                    business_registry.business_about, 
                    business_registry.business_address, 
                    business_registry.business_city, 
                    business_registry.business_zip, 
                    business_registry.business_gmap, 
                    business_registry.logo, 
                    business_registry.business_contact_person, 
                    business_registry.business_phone, 
                    business_registry.business_email, 
                    business_registry.business_stat, 
                    business_registry.premium, 
                    business_registry.business_stat, 
                    business_registry.business_open, 
                    business_registry.offer_available, 
                    business_registry.approved');   
        $this->db->from('business_registry'); 
        $this->db->join('users','users.user_id=business_registry.user_id', 'INNER');
        $this->db->where('users.user_type', 'Saler');
        $this->db->where('business_registry.business_registry_id',$business_registry_id); 
        return $this->db->get()->row_array();         
    }  
                
    //show businesses details
    public function insert_businessTiming($business_registry_id) {
        $data1 = array(
            'business_registry_id'  =>$business_registry_id,
            'day'                   => 'Sunday'
        );
        $this->db->insert('business_timing',$data1);
        //===========================================
        $data2 = array(
            'business_registry_id'  =>$business_registry_id,
            'day'                   => 'Monday'
        );
        $this->db->insert('business_timing',$data2);
        //===========================================
        $data3 = array(
            'business_registry_id'  =>$business_registry_id,
            'day'                   => 'Tuesday'
        );
        $this->db->insert('business_timing',$data3);
        //===========================================
        $data4 = array(
            'business_registry_id'  =>$business_registry_id,
            'day'                   => 'Wednesday'
        );
        $this->db->insert('business_timing',$data4);
        //===========================================
        $data5 = array(
            'business_registry_id'  =>$business_registry_id,
            'day'                   => 'Thrusday'
        );
        $this->db->insert('business_timing',$data5);
        //===========================================
        $data6 = array(
            'business_registry_id'  =>$business_registry_id,
            'day'                   => 'Friday'
        );
        $this->db->insert('business_timing',$data6);
        //===========================================
        $data7 = array(
            'business_registry_id'  =>$business_registry_id,
            'day'                   => 'Saturday'
        );
        $this->db->insert('business_timing',$data7);
        return true;
    }
                
    //show businesses details
    public function show_businessTiming($business_registry_id) {
        $this->db->select('business_registry.business_name, 
                    business_timing.bisTiming_id,
                    business_timing.day,
                    business_timing.start_time, 
                    business_timing.end_time, 
                    business_timing.status');   
        $this->db->from('business_timing'); 
        $this->db->join('business_registry','business_registry.business_registry_id=business_timing.business_registry_id', 'INNER');
        $this->db->where('business_registry.business_registry_id',$business_registry_id); 
        return $this->db->get()->result_array();         
    }  
    
	//add resources for a business
    public function add_employee() {
        
        if($this->input->post('resource_type') == 'doctor') {
            $user_id = $this->input->post('doctor_id');
            $role = $this->input->post('d_role');
        } else {
            $user_id = $this->input->post('resource_id');
            $role = $this->input->post('r_role');
        }

        //user data array
        $data = array(
            'user_id'               => $user_id,
            'business_registry_id'  => $this->input->post('business_registry_id'),
            'id_default'            => 1,
            'role'                  => $role,
            'status'                => 'ACTIVE'
            );
        //insert user
        $this->db->insert('enrolment',$data);
        return $this->db->insert_id();
    }
    
	//add resources for a business
    public function update_resource() {

        //user data array
        $data = array(
            'user_id'               => $this->input->post('user_id'),
            'business_registry_id'  => $this->input->post('business_registry_id'),
            'id_default'            => 1,
            'role'                  => $this->input->post('role'),
            'status'                => $this->input->post('status'),
            );
        //insert user
        $this->db->where('user_id',$this->input->post('user_id'));
        $this->db->where('business_registry_id',$this->input->post('business_registry_id'));
        return $this->db->update('enrolment',$data);
    }
                
    //show businesses of a User
    public function show_business_employee($business_registry_id) {
        $this->db->select('users.user_id, users.first_name, users.last_name, users.profile_picture, users.updated_at,
        enrolment.role, enrolment.status');   
        $this->db->from('enrolment'); 
        $this->db->join('users','users.user_id=enrolment.user_id', 'INNER');
        $this->db->join('business_registry','business_registry.business_registry_id=enrolment.business_registry_id', 'INNER');
        $this->db->where('enrolment.business_registry_id',$business_registry_id);
        return $this->db->get()->result_array(); 
    }
                
    //show all clinic
    public function show_all_clinic($doc_id) {
        $this->db->select('enrolment.enrol_id, 
                    business_registry.business_name,
                    business_registry.business_address,
                    business_registry.business_city,
                    business_registry.business_phone,
                    business_registry.business_address,
                    business_registry.business_address,
                    business_registry.business_address,
                    business_registry.business_registry_id');   
        $this->db->from('enrolment'); 
        $this->db->join('users','users.user_id=enrolment.user_id', 'INNER');
        $this->db->join('business_registry','business_registry.business_registry_id=enrolment.business_registry_id', 'INNER');
        $this->db->where('enrolment.role','DOCTOR');
        $this->db->where('enrolment.user_id',$doc_id);
        return $this->db->get()->result_array(); 
    }

    public function activate_business($business_registry_id){
        $businessDetails= $this->show_businessDetails($business_registry_id);
        if($businessDetails['business_open']==1){
            $data = array( 'business_open'      => 0 );

            $this->db->where('business_registry_id',$business_registry_id);
            $this->db->update('business_registry',$data);
            return true;
        } else {
            $data = array( 'business_open'      => 1  );

            $this->db->where('business_registry_id',$business_registry_id);
            $this->db->update('business_registry',$data);
            return true;
        }
    }

    public function offer_availability($business_registry_id){
        $businessDetails= $this->show_businessDetails($business_registry_id);
        if($businessDetails['offer_available']==1){
            $data = array( 'offer_available'      => 0 );

            $this->db->where('business_registry_id',$business_registry_id);
            $this->db->update('business_registry',$data);
            return true;
        } else {
            $data = array( 'offer_available'      => 1  );

            $this->db->where('business_registry_id',$business_registry_id);
            $this->db->update('business_registry',$data);
            return true;
        }
    }

}