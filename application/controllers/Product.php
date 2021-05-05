<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	//add Product
	public function add_product() {  

		$business_registry_id = $this->input->post('business_registry_id');
		$deals_name = $this->input->post('deals_name');

		if (!is_dir('assets/images/shop/'.$business_registry_id)) {
			mkdir('assets/images/shop/'.$business_registry_id, 0777, TRUE);                    
		}
		$deals_name = str_replace(' ', '', $deals_name);
		$dir_name = substr($deals_name, 0, 4);
		$dir_name = strtolower($dir_name);

		if (!is_dir('assets/images/shop/'.$business_registry_id.'/'.$dir_name)) {
			mkdir('assets/images/shop/'.$business_registry_id.'/'.$dir_name, 0777, TRUE); 
		}
		$upload_images = array();
		$upload_dir = 'assets/images/shop/'.$business_registry_id.'/'.$dir_name;

		$files = '';

		$total = count($_FILES['images_upload']['name']);
		for( $f=0 ; $f < $total ; $f++ ) {			
			$FilePath = $_FILES['images_upload']['tmp_name'][$f];
			$file_name = NULL;
			if ($FilePath != "") {
				$_FILES['file']['name']       = $_FILES['images_upload']['name'][$f];
				$_FILES['file']['type']       = $_FILES['images_upload']['type'][$f];
				$_FILES['file']['tmp_name']   = $_FILES['images_upload']['tmp_name'][$f];
				$_FILES['file']['error']      = $_FILES['images_upload']['error'][$f];
				$_FILES['file']['size']       = $_FILES['images_upload']['size'][$f];
			
				$config['upload_path']      = $upload_dir;
				$config['allowed_types']    = 'gif|jpg|jpeg|png';
				$config['maintain_ratio'] = TRUE;
				//$config['width']    = 250;
				//$config['height']   = 400;
				$config['max_size']         = 4000;
				$config['overwrite']      	=1;

				$this->load->library('image_lib', $config); 
				$this->image_lib->resize();

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('file')){
					$imageData = $this->upload->data();
					$files .= $imageData['file_name'].',';
				}
			}			
		}


		$files = rtrim($files, ",");
        $result = $this->Product_model->add_product($files);  
        redirect('users/products');	
    }
}