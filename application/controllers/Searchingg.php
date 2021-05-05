<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchingg extends CI_Controller {

    //show dropdown list
	public function cara_search_cat() {

        $search = $this->input->post('search');
    
        // Get data
        $data = $this->Category_model->cara_search_cat($search);
        echo json_encode($data);
    }

    //select from dropdown
	public function select_search() {

        $cat_name = $this->input->post('label');
        $cat_id = $this->input->post('value');
    
        $data = $this->ServPro_model->select_search($cat_name,$cat_id);
        //echo $data;
        echo json_encode($data);
    }
}