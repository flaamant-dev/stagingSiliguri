<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	//add reply modal
	public function review_reply(){
        $result = $this->Review_model->review_reply_add();  
        if($result) {
            $this->Review_model->update_seller_review_status1(); 
        } 

        echo 'xxxxxxxxx';
    }

    // edit reply
    public function edit_review_reply(){
        $result = $this->Review_model->review_reply_edit();  

    }
    public function del_review_reply() {
        
        $result = $this->Review_model->review_reply_delete();
        if($result) {
            $this->Review_model->update_seller_review_status0(); 
        } 

    }
}