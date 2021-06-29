<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feed_model extends CI_Model {

    //add feed
    public function add_feed($data){
        $this->db->insert("feed",$data);
        return $this->db->insert_id();
    }
    
    //show feed
    public function show_feed($id = "") {
        if(!empty($id)) {	 
            $this->db->select('feed.feed_id, feed.title, feed.description,feed.image,feed.video,
            feed.timestamp,feed.business_registry_id,business_registry.business_name, business_registry.business_address,business_registry.logo,
            business_registry.business_city, business_registry.business_zip, business_registry.business_contact_person,
            business_registry.business_phone, business_registry.business_email, business_registry.approved');    
            $this->db->from('feed'); 
            $this->db->join('business_registry','business_registry.business_registry_id=feed.business_registry_id', 'LEFT');
            $this->db->where('feed.business_registry_id',$id);
            return $this->db->get()->result_array(); 
        } else {        

        $this->db->select('feed.feed_id, feed.title, feed.description,feed.image,feed.video,
        feed.timestamp,feed.business_registry_id,business_registry.business_name, business_registry.business_address,business_registry.logo,
        business_registry.business_city, business_registry.business_zip, business_registry.business_contact_person,
        business_registry.business_phone, business_registry.business_email, business_registry.approved');   
        $this->db->from('feed'); 
        $this->db->join('business_registry','business_registry.business_registry_id=feed.business_registry_id', 'LEFT');
        $this->db->order_by("feed_id","desc");
        return $this->db->get()->result_array();
        }
    }
}