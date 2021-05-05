<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_model extends CI_Model {
        
	//========================
	//register business seller
	//========================
    public function doctor_enroll_form($fileName) {
        //user data array
        $data = array(
            'user_id'               => $this->input->post('user_id'),
            'user_type'             => $this->input->post('user_type'),
            'doc_cat'               => implode(" ",$this->input->post('doc_cat')),
            'license_no'            => $this->input->post('license_no'),
            'license_doc'           => $fileName,
            'about'                 => $this->input->post('about'),
            'experience'            => $this->input->post('experience'),
            'service'               => $this->input->post('service'),
            //'specialization'        => $this->input->post('specialization'),
            'award'                 => $this->input->post('award'),
            'education'             => $this->input->post('education'),
            'membership'            => $this->input->post('membership')
            );
        //insert doctor
        $this->db->insert('professional_info',$data);
        return $this->db->insert_id();
    }
    
    //======================
    //show available doctors
    //======================
    public function show_doctors($id = "") {
        if(!empty($id)) {	
            $this->db->select('users.user_id, users.profile_picture, users.first_name, users.last_name, 
            professional_info.like_profile, categories.cat_name');   
            $this->db->join('professional_info','professional_info.user_id=users.user_id', 'INNER');
            $this->db->join('categories','categories.cat_id=professional_info.doc_cat', 'INNER');
            $this->db->from('users'); 
            $this->db->where('users.user_id',$id);
            $this->db->where('professional_info.user_type', 'DOCTOR');
            return $this->db->get()->row_array();
        } else {
            $this->db->select('users.user_id, users.profile_picture, users.first_name, users.last_name, 
            professional_info.like_profile, categories.cat_name');   
            $this->db->join('professional_info','professional_info.user_id=users.user_id', 'INNER');
            $this->db->join('categories','categories.cat_id=professional_info.doc_cat', 'INNER');
            $this->db->from('users'); 
            $this->db->where('professional_info.user_type', 'DOCTOR');
            return $this->db->get()->result_array();
        }
    }
    
    //=======================
    //show specialist doctors
    //=======================
    public function show_specialist() {
        $this->db->select('users.user_id, users.first_name, users.last_name'); 
        $this->db->from('users');   
        $this->db->join('professional_info','professional_info.user_id=users.user_id', 'INNER');
        $this->db->where('professional_info.user_type', 'DOCTOR');
        return $this->db->get()->result_array();
    }
    
    //=======================
    //show specialist doctors
    //=======================
    public function doctor_availability() {
        $enrolment_id = $this->input->post('enrolment_id');
        $day = $this->input->post('day');

        $this->db->select('start_time, end_time, selected_days');   
        $this->db->from('availability'); 
        $this->db->where('enrol_id', $enrolment_id);
        return $this->db->get()->result_array();
    }
        
	//========================
	//register business seller
	//========================
    public function appointment_form() {
        //user data array
        $data = array(
            'customer_id'               => $this->input->post('customer_id'),
            'enrolment_id'              => $this->input->post('enrolment_id'),
            'appointment_date'          => $this->input->post('appointment_date'),
            'appointment_start_time'    => $this->input->post('appointment_start_time'),
            'status'                    => 'PENDING'
            );
        //insert doctor
        $this->db->insert('appointment',$data);
        return $this->db->insert_id();
    }
}