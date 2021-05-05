<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {
	//show product reviews to seller
	public function show_dealReview_seller($user_id,$dealReview_id='') {
        if(!empty($dealReview_id)) {	 
            $this->db->select('deals_rating_review.deals_rr_id,deals_rating_review.deals_id,
            deals_rating_review.reviewer_id,deals_rating_review.rating, deals_rating_review.review,
            deals_rating_review.deals_pic_review, deals_rating_review.deals_rating_review_stat,
            dealings_with.business_registry_id, business_registry.business_name,deals_rating_review.date,
			dealings_with.deals_name,  
			business_registry.approved, users.user_id, reviewer.first_name, reviewer. last_name ');    
            $this->db->from('deals_rating_review');
            $this->db->join('dealings_with','dealings_with.deals_id=deals_rating_review.deals_id', 'LEFT');
            $this->db->join('business_registry','business_registry.business_registry_id=dealings_with.business_registry_id', 'LEFT');
            $this->db->join('users','users.user_id=business_registry.user_id', 'LEFT');
            $this->db->join('users as reviewer','reviewer.user_id=deals_rating_review.reviewer_id', 'LEFT');
            $this->db->where('dealings_with.deals_id',$dealReview_id);
            $this->db->where('users.user_id',$user_id);
            return $this->db->get()->result_array(); 
        } else {        
            $this->db->select('deals_rating_review.deals_rr_id,deals_rating_review.deals_id,
            deals_rating_review.reviewer_id,deals_rating_review.rating, deals_rating_review.review,
            deals_rating_review.deals_pic_review, deals_rating_review.deals_rating_review_stat,
            dealings_with.business_registry_id, business_registry.business_name,deals_rating_review.date,
			dealings_with.deals_name,  
			business_registry.approved, users.user_id, reviewer.user_name');    
            $this->db->from('deals_rating_review');
            $this->db->join('dealings_with','dealings_with.deals_id=deals_rating_review.deals_id', 'LEFT');
            $this->db->join('business_registry','business_registry.business_registry_id=dealings_with.business_registry_id', 'LEFT');
            $this->db->join('users','users.user_id=business_registry.user_id', 'LEFT');
            $this->db->join('users as reviewer','reviewer.user_id=deals_rating_review.reviewer_id', 'LEFT');
            $this->db->where('users.user_id',$user_id);
            return $this->db->get()->result_array(); 
        }
    }

	//show seller reviews to seller
	public function show_sellerReview_seller($business_registry_id) {
        $this->db->select('seller_rating_review.business_registry_id,
        business_registry.business_name,
        business_registry.logo,
        seller_rating_review.reviewer_id,
        seller_rating_review.review_id,
        seller_rating_review.rating, 
        seller_rating_review.review,
        seller_rating_review.seller_review_stat, 
        seller_rating_review.date, 
        users.profile_picture, 
        users.first_name, 
        users.last_name');    
        $this->db->from('seller_rating_review');
        $this->db->join('users','users.user_id=seller_rating_review.reviewer_id', 'LEFT');
        $this->db->join('business_registry','business_registry.business_registry_id=seller_rating_review.business_registry_id', 'LEFT');
        $this->db->where('seller_rating_review.business_registry_id',$business_registry_id);
        return $this->db->get()->result_array(); 
    }

    // public function show_review0($business_registry_id){
    //     $this->db->select('seller_rating_review.business_registry_id,
    //     business_registry.business_name,
    //     business_registry.logo,
    //     seller_rating_review.reviewer_id,
    //     seller_rating_review.review_id,
    //     seller_rating_review.rating, 
    //     seller_rating_review.review,
    //     seller_rating_review.seller_review_stat, 
    //     seller_rating_review.date, 
    //     users.profile_picture, 
    //     users.first_name, 
    //     users.last_name');  
    //     $this->db->from('seller_rating_review');
    //     $this->db->join('users','users.user_id=seller_rating_review.reviewer_id', 'LEFT');
    //     $this->db->join('business_registry','business_registry.business_registry_id=seller_rating_review.business_registry_id', 'LEFT');
    //     $this->db->where('seller_rating_review.business_registry_id',$business_registry_id);
    //     $this->db->where('seller_rating_review.seller_review_stat',0);
    //     return $this->db->get()->result_array(); 
    // }

    // public function show_review1($business_registry_id){
    //     $this->db->select('seller_rating_review.business_registry_id,
    //     business_registry.business_name,
    //     business_registry.logo,
    //     seller_rating_review.reviewer_id,
    //     seller_rating_review.review_id,
    //     seller_rating_review.rating, 
    //     seller_rating_review.review,
    //     seller_rating_review.seller_review_stat, 
    //     seller_rating_review.date, 
    //     users.profile_picture, 
    //     users.first_name, 
    //     users.last_name');     
    //     $this->db->from('seller_rating_review');
    //     $this->db->join('users','users.user_id=seller_rating_review.reviewer_id', 'LEFT');
    //     $this->db->join('business_registry','business_registry.business_registry_id=seller_rating_review.business_registry_id', 'LEFT');
    //     $this->db->where('seller_rating_review.business_registry_id',$business_registry_id);
    //     $this->db->where('seller_rating_review.seller_review_stat',1);
    //     return $this->db->get()->result_array(); 

    // }

    //show reply
    public function show_reply($review_id){
        $this->db->where('review_id',$review_id);
        return $this->db->get('reply_seller_review')->row_array();
    }

    //add reply
    public function review_reply_add(){
        $data = array(
            'review_id' => $this->input->post('review_id'),
            'reply' => $this->input->post('review_reply')
        );
        
        return $this->db->insert('reply_seller_review',$data);
    }

    //update review status 1
    public function update_seller_review_status1(){  
        
        $this->db->set('seller_review_stat',1,FALSE);
        $this->db->where('review_id',$this->input->post('review_id'));
        return $this->db->update('seller_rating_review');
    }

    //update review status 0
    public function update_seller_review_status0(){  
        
        $this->db->set('seller_review_stat',0,FALSE);
        $this->db->where('review_id',$this->input->post('review_id'));
        return $this->db->update('seller_rating_review');
    }

    // edit reply
    public function review_reply_edit(){
        $id = $this->input->post('review_id');
        $data = array(
            'reply' => $this->input->post('review_reply')
            );
        $this->db->where('review_id',$id);
        return $this->db->update('reply_seller_review',$data);
    }

    // delete reply
    public function review_reply_delete() {
    
        $id = $this->input->post('review_id');
        
        $this->db->where('review_id',$id);
        return $this->db->delete('reply_seller_review');
    }

}