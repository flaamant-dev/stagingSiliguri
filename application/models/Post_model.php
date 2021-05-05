<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    //add product
    public function add_offer($data){
        $this->db->insert("offer_post",$data);
        return $this->db->insert_id();
    }
    
}