<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feed extends CI_Controller {
    
    public function add_newFeed() {    

        // $product_id=$this->input->post('select-category');
        // if (!is_dir('./'.$product_id)) {
        //     mkdir('./'.$product_id, 0777, TRUE);                    
        // }

        $config['upload_path']      = './images/feed_img';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 150000;

        $this->load->library('upload', $config);
        $count = count($_FILES['image']['name']);

        $file_name = NULL;
        for($i = 0; $i < $count; $i++){

            $_FILES['file']['name']       = $_FILES['image']['name'][$i];
            $_FILES['file']['type']       = $_FILES['image']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['image']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['image']['error'][$i];
            $_FILES['file']['size']       = $_FILES['image']['size'][$i];

                
    
            if( $this->upload->do_upload('file')) {                    
                $data = $this->upload->data();
                $file_name[$i] =  $data['file_name'];
            } 
        }

        $file=implode("^^",$file_name);

        $data_product= array(
            'business_registry_id' => $this->input->post('business_registry_id'),
            'title'                =>  $this->input->post('title'),
            'description'          =>  $this->input->post('description'),
            'image'                =>  $file ,
            'video'                =>  $this->input->post('video_link')
        );

        $eb_id=$this->Feed_model->add_feed($data_product);
        // redirect('users/post');
        $referer=$_SERVER['HTTP_REFERER'];
        header("Location:$referer");
    }
    

    
}