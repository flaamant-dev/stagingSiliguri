<?php
    if($this->session->userdata('logged_in')) {
        if ((time() - $this->session->userdata('login_time')) > 3600) {
            redirect('users/logout');
            exit;
        } else {
            $user_dataaa = array( 'login_time'=> time() );
            $this->session->set_userdata($user_dataaa);		
        }
    }
?>