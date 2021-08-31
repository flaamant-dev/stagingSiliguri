<?php if(!$this->session->userdata('blogged_in')) {
    redirect('home');
} else { ?>
<?php if($this->uri->segment(1) == "admin") {
        $this->load->view('all_modals'); 
        $admin_id = $this->uri->segment(3);
        $admins = $this->Backend_model->show_admin($admin_id);
?>


    <?php $this->load->view('page_footer'); ?>



<?php }} ?>