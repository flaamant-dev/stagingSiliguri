<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller {

	//business activate/deactivate
	public function activate_business_open(){	
		$act=$this->Business_model->activate_business($this->input->post('business_registry_id'));
		return $act;
	}

	//business activate/deactivate
	public function offer_availability(){	
		$act=$this->Business_model->offer_availability($this->input->post('business_registry_id'));
		return $act;
	}
}
      