<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feed_model extends CI_Model {

    //add feed
    public function add_feed($data){
        $this->db->insert("feed",$data);
        return $this->db->insert_id();
    }
    
}