<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServPro_model extends CI_Model {
    
    //show Saler
    public function show_saler_details($id) {
        $this->db->select('users.user_id, users.first_name, users.last_name,users.dob,users.phone,
        users.email,users.phone,business_registry.premium,users.user_stat,business_registry.business_name,
        business_registry.business_type,business_registry.business_about,business_registry.business_address,business_registry.logo,
        business_registry.business_city,business_registry.business_zip,business_registry.business_stat,business_registry.business_gmap,
        business_registry.business_contact_person,business_registry.business_phone,
        business_registry.business_email, business_registry.approved');   
        $this->db->from('users'); 
        $this->db->join('business_registry','business_registry.user_id=users.user_id', 'INNER');
        $this->db->where('users.user_type', 'Saler');
        $this->db->where('users.user_id',$id);
        return $this->db->get()->row_array(); 
    }
    
    //show Business Details
    public function show_business_details($id) {
        $this->db->select('users.user_id, users.first_name, users.last_name,users.dob,users.phone,
        users.email,users.phone,business_registry.premium,users.user_stat,business_registry.business_name,business_registry.logo,
        business_registry.business_type,business_registry.business_about,business_registry.business_address,
        business_registry.business_city,business_registry.business_zip,business_registry.business_stat,business_registry.business_gmap,
        business_registry.business_contact_person,business_registry.business_phone,
        business_registry.business_email, business_registry.approved');   
        $this->db->from('business_registry');
        $this->db->join('users','users.user_id=business_registry.user_id', 'INNER');
        $this->db->where('users.user_type', 'Saler');
        $this->db->where('business_registry.business_registry_id',$id);
        return $this->db->get()->row_array(); 
    }
    
    //show Saler
    public function show_provider($id = "") {
        if(!empty($id)) {	 
            $this->db->select('users.user_id, users.first_name, users.last_name,users.dob,users.phone,
            users.email,users.phone,business_registry.premium,users.user_stat,business_registry.business_name,
            business_registry.business_type,business_registry.business_about,business_registry.business_address,
            business_registry.business_city,business_registry.business_zip,business_registry.business_stat,business_registry.business_gmap,
            business_registry.business_contact_person,business_registry.business_phone,business_registry.logo,
            business_registry.business_email, business_registry.approved,business_registry.business_registry_id');    
            $this->db->from('users'); 
            $this->db->join('business_registry','business_registry.user_id=users.user_id', 'LEFT');
            $this->db->where('users.user_type', 'Saler');
            $this->db->where('business_registry.approved', 1);
            $this->db->where('users.user_id',$id);
            return $this->db->get()->result_array(); 
        } else {        
            $this->db->select('users.user_id, users.first_name, users.last_name,users.dob,users.phone,
            users.email,users.phone,business_registry.premium,users.user_stat,business_registry.business_name,
            business_registry.business_type,business_registry.business_about,business_registry.business_address,
            business_registry.business_city,business_registry.business_zip,business_registry.business_stat,business_registry.business_gmap,
            business_registry.business_contact_person,business_registry.business_phone,business_registry.logo,
            business_registry.business_email, business_registry.approved,business_registry.business_registry_id');  
            $this->db->from('users'); 
            $this->db->join('business_registry','business_registry.user_id=users.user_id', 'LEFT');
            $this->db->where('users.user_type', 'Saler');
            $this->db->where('business_registry.approved', 1);
            return $this->db->get()->result_array();
        }
    }
    


    /*public function get_businesses($cat_id = FALSE){
        if ($cat_id === FALSE){					
            $this->db->select('bc.business_registry_id, br.business_name "business_name", category_tree.sub_category_name');
            $this->db->from('(select TOP_LEVEL.cat_id, TOP_LEVEL.cat_name, MIDDLE_LEVEL.cat_id "sub_category_id", 
                MIDDLE_LEVEL.cat_name "sub_category_name" 
                from 
                (select C.cat_id, C.cat_name, C.sub_cat_id from categories C WHERE C.sub_cat_id=0) TOP_LEVEL
                inner join categories MIDDLE_LEVEL on TOP_LEVEL.cat_id = MIDDLE_LEVEL.sub_cat_id) category_tree');
            $this->db->join('business_category bc', 'bc.cat_id = category_tree.sub_category_id');
            $this->db->join('business_registry br', 'br.business_registry_id = bc.business_registry_id');
            $query1 = $this->db->get()->result_array();
            
            $this->db->select('bc.business_registry_id, br.business_name, category_tree1.sub_sub_category_name "sub_category_name"');
            $this->db->from('(select TOP_LEVEL.cat_id, TOP_LEVEL.cat_name, MIDDLE_LEVEL.cat_id "sub_category_id", 
                MIDDLE_LEVEL.cat_name "sub_category_name", LOW_LEVEL.cat_id "sub_sub_category_id",
                LOW_LEVEL.cat_name "sub_sub_category_name" 
                from 
                (select C.cat_id, C.cat_name, C.sub_cat_id from categories C WHERE C.sub_cat_id=0) TOP_LEVEL
                inner join categories MIDDLE_LEVEL on TOP_LEVEL.cat_id = MIDDLE_LEVEL.sub_cat_id
                left outer join categories LOW_LEVEL on MIDDLE_LEVEL.cat_id = LOW_LEVEL.sub_cat_id) category_tree1');
            $this->db->join('business_category bc', 'bc.cat_id = category_tree1.sub_sub_category_id');
            $this->db->join('business_registry br', 'br.business_registry_id = bc.business_registry_id');
            $query2 = $this->db->get()->result_array();

            // Merge both query results
            $query = array_merge($query1, $query2);
            return $query;
        }

        $this->db->get_where('news', array('cat_id' => $cat_id));
        return $query->row_array();
    }*/
    

    //show Categories json
    public function select_search($cat_name){
        $response = array();

        // Select record
        $this->db->select('business_registry.business_name');
        $this->db->from('categories'); 
        $this->db->join('business_category','business_category.cat_id=categories.cat_id', 'INNER');
        $this->db->join('business_registry','business_registry.business_registry_id = business_category.business_registry_id', 'INNER');
        $this->db->where('business_registry.business_stat',1);
        $this->db->where('categories.cat_name',$cat_name);
        return $this->db->get()->result_array();
    }
    
    //show Saler per category
    public function show_saler_category($cat_id) {
        $this->db->select('business_registry.business_name, business_registry.business_type,c3.cat_name,
        business_registry.business_about,business_registry.business_address, business_registry.business_city,
        business_registry.business_zip,business_registry.business_stat, business_registry.business_gmap,business_registry.logo,
        business_registry.approved, business_registry.business_registry_id');   
        $this->db->from('categories as c0');
        $this->db->join('categories as c1','c1.sub_cat_id=c0.cat_id','LEFT');
        $this->db->join('categories as c2','c2.sub_cat_id=c1.cat_id','LEFT');
        $this->db->join('business_category','business_category.cat_id=c1.cat_id OR business_category.cat_id=c2.cat_id', 'INNER');
        $this->db->join('categories as c3','c3.cat_id=business_category.cat_id','LEFT');
        $this->db->join('business_registry','business_registry.business_registry_id = business_category.business_registry_id', 'INNER');
        $this->db->where('c0.cat_id',$cat_id);
        return $this->db->get()->result_array(); 
    }
    
    //show enrolled seller
    public function show_enrlSer($id = "") {
        if(!empty($id)) {	          
            $this->db->select('users.user_id, users.first_name, users.last_name,users.dob,users.phone,business_registry.logo,
            users.email,users.phone,business_registry.premium,users.user_stat,business_registry.business_name,
            business_registry.business_type,business_registry.business_about,business_registry.business_address,
            business_registry.business_city,business_registry.business_zip,business_registry.business_stat,business_registry.business_gmap,
            business_registry.business_contact_person,business_registry.business_phone,business_registry.approved,
            business_registry.business_email,business_registry.business_registry_id');   
            $this->db->from('users'); 
            $this->db->join('business_registry','business_registry.user_id=users.user_id', 'INNER');
            $this->db->where('users.user_type', 'Saler');
            $this->db->where('business_registry.approved', 0);
            $this->db->where('users.user_id',$id);
            return $this->db->get()->row_array(); 
        } else {	          
            $this->db->select('users.user_id, users.first_name, users.last_name,users.dob,users.phone,business_registry.logo,
            users.email,users.phone,business_registry.premium,users.user_stat,business_registry.business_name,
            business_registry.business_type,business_registry.business_about,business_registry.business_address,
            business_registry.business_city,business_registry.business_zip,business_registry.business_stat,business_registry.business_gmap,
            business_registry.business_contact_person,business_registry.business_phone,business_registry.approved,
            business_registry.business_email,business_registry.business_registry_id');   
            $this->db->from('users'); 
            $this->db->join('business_registry','business_registry.user_id=users.user_id', 'INNER');
            $this->db->where('users.user_type', 'Saler');
            $this->db->where('business_registry.approved', 0);
            return $this->db->get()->result_array();
        }
    }
    
    //enable/disable category
    public function toggle_provider() {

        $user_id = $this->input->post('user_id');
        $cat_dtl = $this->ServPro_model->show_provider($user_id);
        
        if($cat_dtl['user_stat'] == '1') {
            
            $data = array('user_stat' => 0 );
            
            $this->db->where('user_id',$user_id);
            $this->db->update('users',$data);

            return 'The User is disabled';
        } else {
            
            $data = array('user_stat' => 1 );
            
            $this->db->where('user_id',$user_id);
            $this->db->update('users',$data);

            return 'The User is enabled';
        }
        
    }
    
}