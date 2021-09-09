<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


	public function view( $page = 'home'){
		
		if ( !file_exists('application/views/pages/'.$page.'.php')) {
			show_404();		
		}	
		
		
		//========================================================================
		//========================google login details============================
		//========================================================================
		include_once APPPATH."libraries/google_vendor/autoload.php"; 
		// include_once APPPATH."libraries/fb_vendor/autoload.php"; 

		$google_client = new Google_Client();
		
		$google_client->setClientId('264582324569-hut6bidobhol01s5hb2oa7mt4el715c8.apps.googleusercontent.com'); //Define your ClientID

        $google_client->setClientSecret('JsY-aphl2wHbBEhljaEWFMPP');
		$google_client->setRedirectUri('https://staging.siliguri.city/home');
		// $google_client->setRedirectUri('http://localhost/stagingSiliguri/');

        $google_client->addScope('email');

        $google_client->addScope('profile');
        if(isset($_GET["code"])) {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

            if(!isset($token["error"])) {
                $google_client->setAccessToken($token['access_token']);

                $this->session->set_userdata('google_access_token', $token['access_token']);

                $google_service = new Google_Service_Oauth2($google_client);

				$data = $google_service->userinfo->get();
				
				date_default_timezone_set('Asia/Kolkata');
                $current_datetime = date('Y-m-d H:i:s');

				$user = $this->Page_model->Is_already_register($data['id']);

                if($user) {
					
                    //update data
					$user_data = array(
						'user_id'   		=> $user['user_id'],
						'login_oauth_uid' 	=> $data['id'],
						'oauth_provider'   	=> $user['oauth_provider'],
						'first_name' 		=> $data['given_name'],
						'last_name'  		=> $data['family_name'],
						'dob'  				=> $data['dob'],
						'phone'  			=> $data['phone'],
						'email' 			=> $data['email'],
						'gender' 			=> $data['gender'],
						'locale' 			=> $data['locale'],
						'profile_picture'	=> $data['picture'],
						'user_type'   		=> $user['user_type'],
						'premium'   		=> $user['user_type'],
						'user_stat' 		=> 1,
						//'created_at'		=> $current_datetime
						'updated_at' 		=> $current_datetime
					);
            
					$qwe = $this->Page_model->Update_user_data($user_data, $data['id']);
					$is_doc = $this->Status_model->show_user_professional_status($user['user_id']);
					if($is_doc['profession'] == 'DOCTOR') {
						$this->load->library('uuid');
						//insert data
						$user_data = array(
							'user_id'   		=> $user['user_id'],
							'user_type' 		=> 'DOCTOR',
							'token' 			=> rand(1000000000,9999999999),
							'device_id'  		=> $this->uuid->v4(),
							'device_type'  		=> 'Web',
							'expired_time'  	=> date("Y-m-d H:i:s", strtotime('+24 hours'))
						);
						$user_id = $this->Page_model->insert_session($user_data);	
					}
					$this->session->set_userdata('ulogged_in', 1);
					$this->session->set_userdata('user_id', $user['user_id']);
					$this->session->set_userdata('type', $user['user_type']);
					$this->session->set_userdata('login_time', time());
                } else {

					//insert data
					$user_data = array(
						//'user_id'   		=> $user['user_id'],
						'oauth_provider'   	=> 'google',
						'login_oauth_uid' 	=> $data['id'],
						'first_name' 		=> $data['given_name'],
						'last_name'  		=> $data['family_name'],
						'dob'  				=> $data['birthday'],
						'phone'  			=> $data['phone'],
						//'address'  			=> $data['address'],
						'email' 			=> $data['email'],
						'gender' 			=> $data['gender'],
						'locale' 			=> $data['locale'],
						'profile_picture'	=> $data['picture'],
						'user_type'   		=> 'User',
						//'premium'   		=> 1,
						'user_stat' 		=> 1,
						'created_at' 		=> $current_datetime,
						'updated_at' 		=> $current_datetime
					);
                
					$user_id = $this->Page_model->Insert_user_data($user_data);		
					
					$this->session->set_userdata('ulogged_in', 1);
					$this->session->set_userdata('user_id', $user_id);
					$this->session->set_userdata('type', 'User');
					$this->session->set_userdata('login_time', time());
                }
            }
		}
		//========================================================================
		//========================google login details============================
		//========================================================================

        $login_button = '';
		if(! $this->session->userdata('google_access_token') ) {
            $login_button .= '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'assets/images/google_signin.png"></a>';
            //$login_button .= '<br><a href="'.$loginUrl.'"><h4>Login with Facebook</h4></a>';
            $data['login_button'] = $login_button;
			$data['filter_data'] = NULL;
		
			$data['customercare'] = $this->Page_model->show_customercare(); 
			$data['keywords'] = 'This is Siliguri.City';
	
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav');
			$this->load->view('templates/top');
			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/footer',$data);

        } else {
			
			$data['customercare'] = $this->Page_model->show_customercare(); 
            $data['login_button'] = $login_button;
            $data['filter_data'] = NULL;
			$data['keywords'] = 'This is Siliguri.City';
	
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav');
			$this->load->view('templates/top');
			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/footer',$data);

        }
    }

    //search result form
	public function search_form() {

        $data['cara_search_cat'] = $this->input->post('cara_search_cat');
        $data['cara_search_cat_id'] = $this->input->post('cara_search_cat_id');
    
        // Get data
        redirect('search_result',$data);
	}

	//book appointment form
	public function book_appointment_home() {    
		date_default_timezone_set('Asia/Kolkata');
		$date = $this->input->post('date'); 
		$date = substr($date, 0, strpos($date, '('));
		$ap_date = date("Y-m-d",strtotime($date));
		$doc_id = 7; 
		$doctor_cat = $this->Category_model->show_category_doctor();
		$all_clinic = $this->Business_model->show_all_clinic($doc_id); 
		$timestamp = strtotime($ap_date);
		$day = date('l', $timestamp);

		$data = '<p class="text-left"><b>Appointment date: '.$day.', '.date("M d, Y",strtotime($ap_date)).'</p>';
		$data .= '<form class="form-wrapper" method="post" action="users/book_apt_home_form">';
		$data .= '<input type="hidden" name="appointment_date" value="'.$ap_date.'">';
	
		$data .= '<div class="form-group">';
		$data .= '<small><label class="control-label mb-1"><b>Choose a Category</b></label></small>';
		$data .= '<select name="doctor_cat" id="doctor_cat" class="form-control-sm form-control" onfocus="this.size=6;" onblur="this.size=1;" onchange="this.size=1; this.blur(); choose_doc_home(\''.$day.'\');">';
		$data .= '<option disabled selected>Choose a Clinic</option>';
				if($doctor_cat != NULL) { foreach($doctor_cat as $cat) {
					$data .= '<option value="'.$cat['cat_id'].'">'.$cat['cat_name'].'</option>';
				} }				
		$data .= '</select>';
		$data .= '</div>';	
	
		$data .= '<div class="form-group">';
		$data .= '<small><label class="control-label mb-1"><b>Choose Doctor</b></label></small>';
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
	public function book_apt_home_form() {    
		$doc_id = $this->input->post('doc_id'); 
		$qwe = $this->Doctor_model->appointment_form();      
		
		redirect('home');
	}	

	//like portfolio of a person
	public function like_portfolio() {    
		$p_id = $this->input->post('p_id'); 
		$qwe = $this->Page_model->like_portfolio();      
		
		echo $qwe;
	}	

}