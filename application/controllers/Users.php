<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function view($page = '' ){
		
		if ( !file_exists('application/views/user_dash/'.$page.'.php')) {
			show_404();		
		}	

		$data['customercare'] = $this->Page_model->show_customercare(); 
		$login_button = '';
		$data['login_button'] = $login_button;

		// if(empty($this->session->flashdata('ipaddress'))) {
		// 	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
		// 		$ip = $_SERVER['HTTP_CLIENT_IP'];
		// 	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
		// 		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		// 	} else {
		// 		$ip = $_SERVER['REMOTE_ADDR'];
		// 	}
		// 	$this->session->set_flashdata('ipaddress',$ip);
		// 	$this->Backend_model->store_ip($ip);
		// }
		$data['keywords'] = 'This is Siliguri.City';

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav');
		$this->load->view('templates/top');
		$this->load->view('user_dash/'.$page,$data);
		$this->load->view('templates/footer',$data);
		
    }

	//logout Admin
	public function logout() {
	    $this->session->unset_userdata('user_id');
	    $this->session->unset_userdata('type');
	    $this->session->unset_userdata('logged_in');
	    $this->session->unset_userdata('google_access_token');
	    	
        // $referer = $_SERVER['HTTP_REFERER'];
        // header("Location: $referer");
		redirect('home');
	}

	//add User
	public function add_user() {  
		
		$this->form_validation->set_rules('user_email', 'Email','required');
		$this->form_validation->set_rules('user_pswd', 'Password','required');
		
		if($this->form_validation->run() === FALSE) {		
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
		} else {
            $enc_password = $this->input->post('user_pswd');
			$user = $this->User_model->add_user($enc_password);
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
    }

	//edit User
	public function edit_user() {        
        $result = $this->User_model->edit_user();        
        redirect('users');		
    }

	//delete User
	public function del_user() {        
        $result = $this->User_model->del_user();        
        redirect('users');		
    }

	//register business seller
	public function business_register() {  
		
		$bis_regID = $this->Business_model->business_register();   
		
		if($bis_regID) {
			$cat_ids = $this->input->post('business_cat');
			foreach($cat_ids as $cid)
				$this->Business_model->category_reg($bis_regID,$cid);        

			$this->User_model->update_userseller(1);
			$this->Business_model->insert_businessTiming($bis_regID);
		}

		if($_FILES["company_logo"]) {
			
			$file_name = $_FILES['company_logo']['name'];
			$file_size =$_FILES['company_logo']['size'];
			$file_tmp =$_FILES['company_logo']['tmp_name'];
			$file_type=$_FILES['company_logo']['type'];
			
			if(!is_dir('images/stores/'.$bis_regID)) {
				mkdir('images/stores/'.$bis_regID,0777,TRUE);
			}
			if(!is_dir('images/stores/'.$bis_regID.'/logo')) {
				mkdir('images/stores/'.$bis_regID.'/logo',0777,TRUE);
			}

			$config['upload_path'] 		= './images/stores/'.$bis_regID.'/logo';
			$config['allowed_types']	= 'gif|jpg|jpeg|png';
			$config['max_size'] 		= 20971520;
			$config['max_width'] 		= 2000;
			$config['max_height'] 		= 2000;

			$this->load->library('upload',$config);

			if( $this->upload->do_upload('company_logo')) {
				$data = $this->upload->data();
				$file_name = $data['file_name'];
				$company_logo = $this->Business_model->update_comLOGO($file_name,$bis_regID);
			}
		}
        redirect('users/dashboard');		
    }

	//company logo update
	public function company_logo_update() {
		$bis_regID = $this->input->post('business_registry_id');
		if($_FILES["company_logo"]) {
			
			$file_name = $_FILES['company_logo']['name'];
			$file_size =$_FILES['company_logo']['size'];
			$file_tmp =$_FILES['company_logo']['tmp_name'];
			$file_type=$_FILES['company_logo']['type'];
			
			if(!is_dir('images/stores/'.$bis_regID)) {
				mkdir('images/stores/'.$bis_regID,0777,TRUE);
			}
			if(!is_dir('images/stores/'.$bis_regID.'/logo')) {
				mkdir('images/stores/'.$bis_regID.'/logo',0777,TRUE);
			}

			$config['upload_path'] 		= './images/stores/'.$bis_regID.'/logo';
			$config['allowed_types']	= 'gif|jpg|jpeg|png';
			$config['max_size'] 		= 20971520;
			$config['max_width'] 		= 2000;
			$config['max_height'] 		= 2000;

			$this->load->library('upload',$config);

			if( $this->upload->do_upload('company_logo')) {
				$data = $this->upload->data();
				$file_name = $data['file_name'];
				$company_logo = $this->Business_model->update_comLOGO($file_name,$bis_regID);
			}
		}
        redirect('users/photos');	
	}

	//company logo update
	public function coverPic_update() {
		$bis_regID = $this->input->post('business_registry_id');
		if($_FILES["cover_photo"]) {
			
			$file_name = $_FILES['cover_photo']['name'];
			$file_size =$_FILES['cover_photo']['size'];
			$file_tmp =$_FILES['cover_photo']['tmp_name'];
			$file_type=$_FILES['cover_photo']['type'];
			
			if(!is_dir('images/stores/'.$bis_regID)) {
				mkdir('images/stores/'.$bis_regID,0777,TRUE);
			}
			if(!is_dir('images/stores/'.$bis_regID.'/cover')) {
				mkdir('images/stores/'.$bis_regID.'/cover',0777,TRUE);
			}

			$config['upload_path'] 		= './images/stores/'.$bis_regID.'/cover';
			$config['allowed_types']	= 'gif|jpg|jpeg|png';
			$config['max_size'] 		= 20971520;
			$config['max_width'] 		= 2000;
			$config['max_height'] 		= 2000;

			$this->load->library('upload',$config);

			if( $this->upload->do_upload('cover_photo')) {
				$data = $this->upload->data();
				$file_name = $data['file_name'];
				$cover_photo = $this->Business_model->update_cover($file_name,$bis_regID);
			}
		}
        redirect('users/photos');	
	}

	//enroll as a doctor
	public function doctor_enroll_form() {        
        
		//if($_FILES["licence_pic"]) {
			
			$file_name = $_FILES['licence_pic']['name'];
			$file_size =$_FILES['licence_pic']['size'];
			$file_tmp =$_FILES['licence_pic']['tmp_name'];
			$file_type=$_FILES['licence_pic']['type'];

			$user_id = $this->session->userdata('user_id');
			
			if(!is_dir('images/doctors/'.$user_id)) {
				mkdir('images/doctors/'.$user_id,0777,TRUE);
			}
			if(!is_dir('images/doctors/'.$user_id.'/licence')) {
				mkdir('images/doctors/'.$user_id.'/licence',0777,TRUE);
			}

			$config['upload_path'] 		= './images/doctors/'.$user_id.'/licence';
			$config['allowed_types']	= 'gif|jpg|jpeg|png';
			$config['max_size'] 		= 20971520;
			$config['max_width'] 		= 2000;
			$config['max_height'] 		= 2000;

			$this->load->library('upload',$config);

			if( $this->upload->do_upload('licence_pic')) {
				$data = $this->upload->data();
				$file_name = $data['file_name'];
				$doctor_enroll = $this->Doctor_model->doctor_enroll_form($file_name);
			} else {
				$file_name = NULL;
				$doctor_enroll = $this->Doctor_model->doctor_enroll_form($file_name);
			}
		//}		

        redirect('users/dashboard');	
    }

	//approve as a seller
	public function approve_saler() {        
        $result = $this->User_model->approve_saler();        
        redirect('admin/enrolled_provider');		
    }

	//decline as a seller
	public function decline_saler() {        
        $result = $this->User_model->update_userseller(2);        
        redirect('admin/enrolled_provider');		
    }

	//apply again as a seller
	public function apply_saler_again() {        
        $result = $this->User_model->update_userseller(1);        
        redirect('users/dashboard');		
    }

	//add resources for a company
	public function add_employee() {        
        $result = $this->Business_model->add_employee();        
        redirect('users/store');		
    }

	//action on resources
	public function resource_action() {    
		$reg_id = $this->input->post('reg_id');  
		$user_id = $this->input->post('user_id');
		$data = '';
		
		$data .= '<form class="form-wrapper" method="post" action="users/resource_action_form">';
		$data .= '<input type="hidden" name="business_registry_id" value="'.$reg_id.'">';
		$data .= '<input type="hidden" name="user_id" value="'.$user_id.'">';
	
		$data .= '<div class="form-group">';
		$data .= '<small><label class="control-label mb-1"><b>Change Role</b></label></small>';
		$data .= '<select name="role" class="form-control-sm form-control">';
		$data .= '<option value="ACCOUNTANT">Accountant</option>';
		$data .= '<option value="HELP DESK">Help desk</option>';
		$data .= '<option value="MANAGER">Manager</option>';
		$data .= '</select>';
		$data .= '</div>';
	
		$data .= '<div class="form-group">';
		$data .= '<small><label class="control-label mb-1"><b>Status</b></label></small>';
		$data .= '<select name="status" class="form-control-sm form-control">';
		$data .= '<option value="VERIFICATION_PENDING">Verification Pending</option>';
		$data .= '<option value="ACTIVE">Active</option>';
		$data .= '<option value="INACTIVE">Inactive</option>';
		$data .= '<option value="DELETED">Relese</option>';
		$data .= '</select>';
		$data .= '</div>';
		$data .= '</form>';
		
		echo $data;
    }

	//resources action form submit
	public function resource_action_form() {        
        $result = $this->Business_model->update_resource();        
        redirect('users/store');		
    }

	//update user information
	public function update_user_profile() {
		
		$oth =  $this->input->post('oth');

		//update data
		$user_data = array(
			'address'  			=> $this->input->post('address'),
			'pincode'  			=> $this->input->post('pincode'),
			'dob'  				=> $this->input->post('dob'),
			'phone'  			=> $this->input->post('phone'),
			'email' 			=> $this->input->post('email'),
			'gender' 			=> $this->input->post('gender'),
			'occupation' 		=> $this->input->post('occupation'),
			'education'			=> $this->input->post('education')
		);

		$qwe = $this->Page_model->Update_user_data($user_data, $oth);      
		
        redirect('users/profile');		
    }

	//book appointment form
	public function book_appointment() {    
		date_default_timezone_set('Asia/Kolkata');
		$date = $this->input->post('date'); 
		$date = substr($date, 0, strpos($date, '('));
		$ap_date = date("Y-m-d",strtotime($date));
		$doc_id = $this->input->post('doc_id'); 
		$all_clinic = $this->Business_model->show_all_clinic($doc_id); 
		$timestamp = strtotime($ap_date);
		$day = date('l', $timestamp);

		$data = '<p class="text-left"><b>Appointment date: '.$day.', '.date("M d, Y",strtotime($ap_date)).'</p>';
		$data .= '<form class="form-wrapper" method="post" action="users/book_appointment_form">';
		$data .= '<input type="hidden" name="customer_id" value="'.$this->session->userdata('user_id').'">';
		$data .= '<input type="hidden" name="doc_id" value="'.$doc_id.'">';
		$data .= '<input type="hidden" name="appointment_date" value="'.$ap_date.'">';
	
		$data .= '<div class="form-group">';
		$data .= '<small><label class="control-label mb-1"><b>Choose Location</b></label></small>';
		$data .= '<select name="enrolment_id" id="enrolment_id" class="form-control-sm form-control" onchange="avail_time(\''.$day.'\');">';
		$data .= '<option disabled selected>Choose a Clinic</option>';
				if($all_clinic != NULL) { foreach($all_clinic as $clinic) {
					$data .= '<option value="'.$clinic['enrol_id'].'">'.$clinic['business_name'].'</option>';
				} }				
		$data .= '</select>';
		$data .= '</div>';	
		$data .= '<div class="show_clinic_time"></div>';	
		
		$data .= '<div class="form-group">';
		$data .= '<button type="button" class="col-6 btn btn-sm btn-danger waves-effect" data-dismiss="modal" aria-hidden="true">Cancel</button>';
		$data .= '<button type="submit" class="col-6 btn btn-sm btn-success waves-effect">Submit</button>';
		$data .= '</div>';
		$data .= '</form>';
		
		echo $data;
    }

	//appointment form submit
	public function book_appointment_form() {    
		$doc_id = $this->input->post('doc_id'); 
		$qwe = $this->Doctor_model->appointment_form();      
		
		redirect('doctor_details/'.$doc_id);
	}	

	//check availability of a doctor
	public function check_availability() {  
		
		$day = $this->input->post('day');
		$qwe = $this->Doctor_model->doctor_availability();  
		
		$output = '';
		
		$output .='<div class="form-group">';
		if(count($qwe) == 0) {
		 	$output .='The doctor is not available ';
		} elseif(count($qwe) == 1) {
			$count = 0;
			if (strpos( $qwe[0]['selected_days'], $day ) !== false) {
				$output .='<input type="radio" name="appointment_start_time" value="'.date("h:I:s a",strtotime($qwe[0]['start_time'])).'" checked>  '.date("h:I:s a",strtotime($qwe[0]['start_time'])).' to '.date("h:I:s a",strtotime($qwe[0]['end_time']));
			} 
		} else {
			$count = 0;
		 	foreach($qwe as $q) {
				if (strpos( $q['selected_days'], $day ) !== false) {
					$output .='<input type="radio" name="appointment_start_time" value="'.$q['start_time'].'">  '.date("h:I:s a",strtotime($q['start_time'])).' to '.date("h:I:s a",strtotime($q['end_time'])).'<br>';
				} 
			}
		}
		$output .='</div>';
		echo $output;
	}

	//appointment form submit
	public function search_user_session_asd() {    
		$doc_id = $this->input->post('id'); 
		$data = $this->Page_model->search_user_session($doc_id);    
		
        echo json_encode($data);
	}	
}