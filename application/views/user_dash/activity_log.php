<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>
<?php $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); ?>

    <div class="content">
        <div class="animated fadeIn">

                <div class="row">                                    
                    <?php if($user['user_type'] == 'User') {   ?>

                    <?php } elseif($user['user_type'] == 'Saler') { ?>

                    <?php } ?>
                </div>
                
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php } ?>