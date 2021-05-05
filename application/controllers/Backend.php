<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	public function view($page = '' ){
		
		if ( !file_exists('application/views/admin/'.$page.'.php')) {
			show_404();		
		}	
		
		$data['customercare'] = $this->Page_model->show_customercare(); 

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
		}
		
		$this->Backend_model->store_ip($ip);
		$data['keywords'] = 'This is Siliguri.City';

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav');
		$this->load->view('templates/top');
		$this->load->view('admin/'.$page,$data);
		$this->load->view('templates/footer',$data);
		
    }

	//login Admin
	public function backSignedin() {
		
		$this->form_validation->set_rules('input_email', 'Email','required');
		$this->form_validation->set_rules('input_pswd', 'Password','required');
		
		if($this->form_validation->run() === FALSE) {		
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
		} else {
			$username = $this->input->post('input_email');
			$password = md5($this->input->post('input_pswd'));
			
			$user_id = $this->Backend_model->backend_login($username,$password);
			$login_time = $this->Backend_model->update_loginTime($user_id['admin_id']);
			
			if($user_id) {
			    $user_dataaa = array(
					'user_id'   	=> $user_id['admin_id'],
					'name'  		=> $user_id['admin_name'],
					'email'  		=> $username,
					'type'      	=> $user_id['admin_type'],
					'logged_in' => true
			    );
			    
	    		$this->session->set_flashdata('backend_loggedin','You are now logged in.');
			    $this->session->set_userdata($user_dataaa);			    
			    redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('login_failed','Invalid username or password.');		
				$referer = $_SERVER['HTTP_REFERER'];
				header("Location: $referer");
			} 
			
		}
		
	}
	
	//add Admin
	public function add_admin() {
		
		$this->form_validation->set_rules('admin_name', 'Name','required');
		$this->form_validation->set_rules('admin_email', 'Email','required');
		$this->form_validation->set_rules('admin_pswd', 'Password','required');
		$this->form_validation->set_rules('admin_pswd2', 'Confirm Password','matches[admin_pswd]');
		
		if($this->form_validation->run() === FALSE) {		
			redirect('admin/users');			
		} else {
			$enc_password = md5($this->input->post('admin_pswd'));
			$this->Backend_model->add_admin($enc_password);
			$this->session->set_flashdata('admin_registered','You are now registered.');
			redirect('admin/users');
		}
		
    }

	//edit Admin form
	public function edit_admin() {
		
		$admin_id = $this->input->post('admin_id');
		$result = $this->Backend_model->show_admin($admin_id);
		
		$texxxxt ='';

		$texxxxt .= '<div class="x_panel">';
		$texxxxt .= '<div class="x_content">';
	
		$texxxxt .= '<form class="form-horizontal form-label-left" method="post" action="backend/edit_admin123">';
		$texxxxt .= '<input type="hidden" class="form-control" name="admin_id" value="'.$result['admin_id'].'">';
		$texxxxt .= '<div class="form-group">';
		$texxxxt .= '<label class="control-label col-md-3 col-sm-3 col-xs-12">User Name</label>';
		$texxxxt .= '<div class="col-md-9 col-sm-9 col-xs-12">';
		$texxxxt .= '<input type="text" class="form-control" name="admin_name" value="'.$result['admin_name'].'">';
		$texxxxt .= '</div>';
		$texxxxt .= '</div>';
		$texxxxt .= '<div class="form-group">';
		$texxxxt .= '<label class="control-label col-md-3 col-sm-3 col-xs-12">User Email</label>';
		$texxxxt .= '<div class="col-md-9 col-sm-9 col-xs-12">';
		$texxxxt .= '<input type="text" class="form-control" name="admin_email" value="'.$result['admin_email'].'">';
		$texxxxt .= '</div>';
		$texxxxt .= '</div>';
		$texxxxt .= '<div class="form-group">';
		$texxxxt .= '<label class="control-label col-md-3 col-sm-3 col-xs-12">User Type</label>';
		$texxxxt .= '<div class="col-md-9 col-sm-9 col-xs-12">';
		$texxxxt .= '<select class="form-control" name="admin_type"><option disabled>Select User-type</option><option value="Admin"';
		if($result['admin_type'] == "Admin") { "selected"; }
		$texxxxt .= '>Admin</option><option value="User"';
		if($result['admin_type'] == "User") { "selected"; }
		$texxxxt .= '>User</option><option value="Accounts"';
		if($result['admin_type'] == "Accounts") { "selected"; }
		$texxxxt .= '>Accounts</option></select>';
		$texxxxt .= '</div>';
		$texxxxt .= '</div>';
		$texxxxt .= '<div class="ln_solid"></div>';
		$texxxxt .= '<div class="form-group">';
		$texxxxt .= '<button type="button" data-dismiss="modal" class="btn btn-primary">Cancel</button>';
		$texxxxt .= '<button type="submit" class="btn btn-success">Submit</button>';
		$texxxxt .= '</div>';
		$texxxxt .= '</form>';
		
		$texxxxt .= '</div>';
		$texxxxt .= '</div>';

        
        echo $texxxxt;
		
    }

	//edit Admin
	public function edit_admin123() {        
        $result = $this->Backend_model->edit_admin();        
        redirect('users');		
    }

	//delete Admin
	public function del_admin() {        
        $result = $this->Backend_model->del_admin();        
        redirect('users');		
    }

	//enable/disable backend User
	public function toggle_backendUser() {        
        $result = $this->Backend_model->toggle_backendUser();        
        echo $result;		
    }
}