<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
    
    //show Categories
    public function show_category($id = "") {
        if(!empty($id)) {	
            $this->db->from('categories'); 
            $this->db->where('sub_cat_id',0);
            $this->db->where('cat_id',$id);
            return $this->db->get()->row_array(); 
        } else {	
            $this->db->order_by('cat_name','ASC'); 
            $this->db->from('categories'); 
            $this->db->where('sub_cat_id',0);
            return $this->db->get()->result_array();
        }
    }
    
    //show SUB Categories
    public function show_sub_category($id) { 
        $this->db->order_by('cat_name','ASC');        
        $this->db->from('categories'); 
        $this->db->where('sub_cat_id',$id);
        return $this->db->get()->result_array();
    }
    
    //show user registered Categories
    public function show_userReg_category($user_id) {
        $this->db->select('categories.cat_id,categories.cat_name');   
        $this->db->from('categories'); 
        $this->db->join('business_category','business_category.cat_id=categories.cat_id', 'INNER');
        $this->db->join('business_registry','business_registry.business_registry_id=business_category.business_registry_id', 'LEFT');
        $this->db->where('sub_cat_id !=',0);
        $this->db->where('cat_stat',1);
        $this->db->where('business_registry.user_id',$user_id);
        return $this->db->get()->result_array();
    }
    
    //show Categories with doctor
    public function show_category_doctor() {
        $this->db->select('categories.cat_id,categories.cat_name');   
        $this->db->from('categories'); 
        //$this->db->join('business_category','business_category.cat_id=categories.cat_id', 'INNER');
        //$this->db->join('business_registry','business_registry.business_registry_id=business_category.business_registry_id', 'LEFT');
        $this->db->where('sub_cat_id =',324);
        $this->db->where('cat_stat',1);
        return $this->db->get()->result_array();
    }
    
    //show Categories with products
    public function show_category_product() {
        $this->db->select('categories.cat_id,categories.cat_name');   
        $this->db->from('categories'); 
        $this->db->join('business_category','business_category.cat_id=categories.cat_id', 'INNER');
        $this->db->join('business_registry','business_registry.business_registry_id=business_category.business_registry_id', 'LEFT');
        $this->db->where('sub_cat_id !=',0);
        $this->db->where('cat_stat',1);
        $where = "business_registry.business_type='product' OR business_registry.business_type='both'";
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    
    //show Categories with services
    public function show_category_service() {
        $this->db->select('categories.cat_id,categories.cat_name');   
        $this->db->from('categories'); 
        $this->db->join('business_category','business_category.cat_id=categories.cat_id', 'INNER');
        $this->db->join('business_registry','business_registry.business_registry_id=business_category.business_registry_id', 'LEFT');
        $this->db->where('sub_cat_id !=',0);
        $this->db->where('cat_stat',1);
        $where = "business_registry.business_type='service' OR business_registry.business_type='both'";
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    
    //show Categories for user
    public function show_category_user($id = "") {
        if(!empty($id)) {	
            $this->db->from('categories'); 
            $this->db->where('sub_cat_id !=',0);
            $this->db->where('cat_stat',1);
            $this->db->where('cat_id',$id);
            return $this->db->get()->row_array(); 
        } else {	
            $this->db->from('categories');
            $this->db->where('sub_cat_id !=',0);
            $this->db->where('cat_stat',1); 
            return $this->db->get()->result_array();
        }
    }
    
    //show Categories json
    public function cara_search_cat($search){
        $response = array();

        // Select record
        $this->db->select('*');
        $this->db->where('cat_stat',1);
        $this->db->where('sub_cat_id =',324);
        $this->db->group_start();
        $this->db->like('cat_name', $search);
        $this->db->or_like('sub_cat_id', $search); 
        $this->db->group_end();
        $this->db->from('categories'); 
        $records = $this->db->get()->result();

        foreach($records as $row ){
            $response[] = array(
                "value"=>$row->cat_id,
                "label"=>$row->cat_name,
                "sub"=>$row->sub_cat_id
            );
        }

        return $response;
    }

    //add Category
    public function add_category() {
        //user data array
        $data = array(
            'cat_name'      => $this->input->post('cat_name'),
            'sub_cat_id'    => 0,
            'cat_stat'      => 1
            );
        //insert category
        return $this->db->insert('categories',$data);
    }
    
    //add SUB Category
    public function add_subcategory() {
        //user data array
        $data = array(
            'cat_name'      => $this->input->post('cat_name'),
            'sub_cat_id'    => $this->input->post('sub_cat_id'),
            'keywords'      => $this->input->post('keywords'),
            'cat_stat'      => 1
            );
        //insert category
        return $this->db->insert('categories',$data);
    }
    
    //edit Category
    public function edit_category() {

        $id = $this->input->post('cat_id');
        //user data array
        $data = array( 
            'cat_name' => $this->input->post('cat_name'),
            'keywords' => $this->input->post('keywords') 
        );
        //update category
        $this->db->where('cat_id',$id);
        return $this->db->update('categories',$data);
    }
    
    //delete Category
    public function del_category() {

        $id = $this->input->post('cat_id');

        //delete sub category
        $this->db->where('sub_cat_id',$id);
        $this->db->delete('categories');
        
        //delete category
        $this->db->where('cat_id',$id);
        return $this->db->delete('categories');
    }
    
    //exchange Category
    public function exng_category() {

        $cat_id = $this->input->post('cat_id');
        $sub_id = $this->input->post('sub_id');

        //user data array
        $data = array( 'sub_cat_id' => $cat_id );
        //update category
        $this->db->where('cat_id',$sub_id);
        return $this->db->update('categories',$data);
    }
    
    //enable/disable category
    public function toggle_category() {

        $cat_id = $this->input->post('cat_id');
        $cat_dtl = $this->Category_model->show_category($cat_id);
        
        if($cat_dtl['cat_stat'] == '1') {
            
            $data = array('cat_stat' => 0 );
            
            $this->db->where('cat_id',$cat_id);
            $this->db->update('categories',$data);

            return 'The category is disabled';
        } else {
            
            $data = array('cat_stat' => 1 );
            
            $this->db->where('cat_id',$cat_id);
            $this->db->update('categories',$data);

            return 'The category is enabled';
        }
        
    }
        
}