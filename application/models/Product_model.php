<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    
	//add Product
	public function add_product($files) {    
        //user data array
        $data = array(
            'business_registry_id'  => $this->input->post('business_registry_id'),
            'cat_id'                => $this->input->post('cat_id'),
            'deal_type'             => $this->input->post('deal_type'),
            'deals_name'            => $this->input->post('deals_name'),
            'deals_descrption'      => $this->input->post('deals_descrption'),
            'deals_keyword'         => $this->input->post('deals_keyword'),
            'deals_price'           => $this->input->post('deals_price'),
            'deals_pic'             => $files,
            'deals_stat'            => 1
            );
        //insert category
        return $this->db->insert('dealings_with',$data);
    }
    
    //show Product to saler
    public function show_product_saler($user_id, $product_id = "") {
        if(!empty($product_id)) {	 
            $this->db->select('dealings_with.business_registry_id, dealings_with.cat_id,
            dealings_with.deal_type, dealings_with.deals_name, dealings_with.deals_descrption,
            dealings_with.deals_keyword, dealings_with.deals_price, dealings_with.deals_pic,
            dealings_with.deals_stat, dealings_with.deals_id,
            business_registry.business_name, business_registry.business_address,business_registry.logo,
            business_registry.business_city, business_registry.business_zip, business_registry.business_contact_person,
            business_registry.business_phone, business_registry.business_email, business_registry.approved,
            users.user_id, users.first_name, users.last_name, categories.cat_name');    
            $this->db->from('dealings_with'); 
            $this->db->join('business_registry','business_registry.business_registry_id=dealings_with.business_registry_id', 'LEFT');
            $this->db->join('categories','categories.cat_id=dealings_with.cat_id', 'LEFT');
            $this->db->join('users','users.user_id=business_registry.user_id', 'LEFT');
            $this->db->where('business_registry.approved', 1);
            $this->db->where('dealings_with.deals_id',$product_id);
            $this->db->where('users.user_id',$user_id);
            return $this->db->get()->row_array(); 
        } else {        
            $this->db->select('dealings_with.business_registry_id, dealings_with.cat_id,
            dealings_with.deal_type, dealings_with.deals_name, dealings_with.deals_descrption,
            dealings_with.deals_keyword, dealings_with.deals_price, dealings_with.deals_pic,
            dealings_with.deals_stat, dealings_with.deals_id,
            business_registry.business_name, business_registry.business_address,business_registry.logo,
            business_registry.business_city, business_registry.business_zip, business_registry.business_contact_person,
            business_registry.business_phone, business_registry.business_email, business_registry.approved,
            users.user_id, users.first_name, users.last_name, categories.cat_name');    
            $this->db->from('dealings_with'); 
            $this->db->join('business_registry','business_registry.business_registry_id=dealings_with.business_registry_id', 'LEFT');
            $this->db->join('categories','categories.cat_id=dealings_with.cat_id', 'LEFT');
            $this->db->join('users','users.user_id=business_registry.user_id', 'LEFT');
            $this->db->where('business_registry.approved', 1);
            $this->db->where('users.user_id',$user_id);
            return $this->db->get()->result_array(); 
        }
    }
    
    //show Product to user
    public function show_product_user($product_id = "") {
        if(!empty($product_id)) {	 
            $this->db->select('dealings_with.business_registry_id, dealings_with.cat_id,
            dealings_with.deal_type, dealings_with.deals_name, dealings_with.deals_descrption,
            dealings_with.deals_keyword, dealings_with.deals_price, dealings_with.deals_pic,
            dealings_with.deals_stat, dealings_with.deals_id,
            business_registry.business_name, business_registry.business_address,business_registry.logo,
            business_registry.business_city, business_registry.business_zip, business_registry.business_contact_person,
            business_registry.business_phone, business_registry.business_email, business_registry.approved,
            users.user_id, users.first_name, users.last_name, categories.cat_name');    
            $this->db->from('dealings_with'); 
            $this->db->join('business_registry','business_registry.business_registry_id=dealings_with.business_registry_id', 'LEFT');
            $this->db->join('categories','categories.cat_id=dealings_with.cat_id', 'LEFT');
            $this->db->join('users','users.user_id=business_registry.user_id', 'LEFT');
            $this->db->where('business_registry.approved', 1);
            $this->db->where('dealings_with.deals_id',$product_id);
            return $this->db->get()->result_array(); 
        } else {        
            $this->db->select('dealings_with.business_registry_id, dealings_with.cat_id,
            dealings_with.deal_type, dealings_with.deals_name, dealings_with.deals_descrption,
            dealings_with.deals_keyword, dealings_with.deals_price, dealings_with.deals_pic,
            dealings_with.deals_stat, dealings_with.deals_id,
            business_registry.business_name, business_registry.business_address,business_registry.logo,
            business_registry.business_city, business_registry.business_zip, business_registry.business_contact_person,
            business_registry.business_phone, business_registry.business_email, business_registry.approved,
            users.user_id, users.first_name, users.last_name, categories.cat_name');    
            $this->db->from('dealings_with'); 
            $this->db->join('business_registry','business_registry.business_registry_id=dealings_with.business_registry_id', 'LEFT');
            $this->db->join('categories','categories.cat_id=dealings_with.cat_id', 'LEFT');
            $this->db->join('users','users.user_id=business_registry.user_id', 'LEFT');
            $this->db->where('business_registry.approved', 1);
            return $this->db->get()->result_array(); 
        }
    }

    //show Product to user
    public function show_product_category($cat_id,$product_id = "") {
        if(!empty($product_id)) {	 
            $this->db->select('dealings_with.business_registry_id, dealings_with.cat_id,
            dealings_with.deal_type, dealings_with.deals_name, dealings_with.deals_descrption,
            dealings_with.deals_keyword, dealings_with.deals_price, dealings_with.deals_pic,
            dealings_with.deals_stat, dealings_with.deals_id,
            business_registry.business_name, business_registry.business_address,business_registry.logo,
            business_registry.business_city, business_registry.business_zip, business_registry.business_contact_person,
            business_registry.business_phone, business_registry.business_email, business_registry.approved,
            users.user_id, users.first_name, users.last_name, categories.cat_name');    
            $this->db->from('dealings_with'); 
            $this->db->join('business_registry','business_registry.business_registry_id=dealings_with.business_registry_id', 'LEFT');
            $this->db->join('categories','categories.cat_id=dealings_with.cat_id', 'LEFT');
            $this->db->join('users','users.user_id=business_registry.user_id', 'LEFT');
            $this->db->where('business_registry.approved', 1);
            $this->db->where('dealings_with.deals_id',$product_id);
            $this->db->where('categories.cat_id',$cat_id);
            return $this->db->get()->result_array(); 
        } else {        
            $this->db->select('dealings_with.business_registry_id, dealings_with.cat_id,
            dealings_with.deal_type, dealings_with.deals_name, dealings_with.deals_descrption,
            dealings_with.deals_keyword, dealings_with.deals_price, dealings_with.deals_pic,
            dealings_with.deals_stat, dealings_with.deals_id,
            business_registry.business_name, business_registry.business_address,business_registry.logo,
            business_registry.business_city, business_registry.business_zip, business_registry.business_contact_person,
            business_registry.business_phone, business_registry.business_email, business_registry.approved,
            users.user_id, users.first_name, users.last_name, categories.cat_name');    
            $this->db->from('dealings_with'); 
            $this->db->join('business_registry','business_registry.business_registry_id=dealings_with.business_registry_id', 'LEFT');
            $this->db->join('categories','categories.cat_id=dealings_with.cat_id', 'LEFT');
            $this->db->join('users','users.user_id=business_registry.user_id', 'LEFT');
            $this->db->where('business_registry.approved', 1);
            $this->db->where('categories.cat_id',$cat_id);
            return $this->db->get()->result_array(); 
        }
    }
    
    //show Product to user
    public function show_seller_category($cat_id,$seller_id = "") {
        if(!empty($seller_id)) {	 
            $this->db->select('business_registry.business_name, business_registry.business_address,business_registry.logo,
            business_registry.business_city, business_registry.business_zip, business_registry.business_contact_person,
            business_registry.business_phone, business_registry.business_email, business_registry.approved,
            dealings_with.business_registry_id, categories.cat_id, categories.cat_name,
            dealings_with.deal_type, dealings_with.deals_name, dealings_with.deals_descrption,
            dealings_with.deals_keyword, dealings_with.deals_price, dealings_with.deals_pic,
            dealings_with.deals_stat, dealings_with.deals_id,');    
            $this->db->from('business_registry');
            $this->db->join('dealings_with','dealings_with.business_registry_id=business_registry.business_registry_id', 'LEFT');
            $this->db->join('categories','categories.cat_id=dealings_with.cat_id', 'LEFT');
            $this->db->where('business_registry.approved', 1);
            $this->db->where('business_registry.business_registry_id',$seller_id);
            $this->db->where('categories.cat_id',$cat_id);
            return $this->db->get()->result_array(); 
        } else {        
            $this->db->select('dealings_with.business_registry_id, dealings_with.cat_id,
            dealings_with.deal_type, dealings_with.deals_name, dealings_with.deals_descrption,
            dealings_with.deals_keyword, dealings_with.deals_price, dealings_with.deals_pic,
            dealings_with.deals_stat, dealings_with.deals_id,
            business_registry.business_name, business_registry.business_address,business_registry.logo,
            business_registry.business_city, business_registry.business_zip, business_registry.business_contact_person,
            business_registry.business_phone, business_registry.business_email, business_registry.approved,
            users.user_id, users.first_name, users.last_name, categories.cat_name');    
            $this->db->from('dealings_with'); 
            $this->db->join('business_registry','business_registry.business_registry_id=dealings_with.business_registry_id', 'LEFT');
            $this->db->join('categories','categories.cat_id=dealings_with.cat_id', 'LEFT');
            $this->db->join('users','users.user_id=business_registry.user_id', 'LEFT');
            $this->db->where('business_registry.approved', 1);
            $this->db->where('categories.cat_id',$cat_id);
            return $this->db->get()->result_array(); 
        }
    }
    
}