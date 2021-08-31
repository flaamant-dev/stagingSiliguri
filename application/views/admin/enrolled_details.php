<?php if(!$this->session->userdata('blogged_in')) {
    redirect('home');
} else { ?>
<?php if($this->uri->segment(1) == "admin") {
        $this->load->view('all_modals'); 

        $business_registry_id = $this->uri->segment(3);
        $seller_detail = $this->ServPro_model->show_business_details($business_registry_id);
    ?>

    <?php $this->load->view('page_footer'); ?>


<?php } }?>