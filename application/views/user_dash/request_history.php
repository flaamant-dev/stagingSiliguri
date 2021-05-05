<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>
<?php $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); ?>



    <div class="content">
        <div class="animated fadeIn">

            <div class="badges">
                <div class="row">
                
                                    
                    <?php if($user['user_type'] == 'User') {   ?>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo base_url(); ?>seller_profile_c">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" src="<?php echo base_url(); ?>assets/images/shop/shop1.gif" alt="" height="80px" width="80px">
                                            <h5 class="text-sm-center mt-2 mb-1">Asdf Bhjk</h5>
                                            <div class="location text-sm-center"><i class="fa fa-list-alt"></i> ========</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo base_url(); ?>seller_profile_c">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" src="<?php echo base_url(); ?>assets/images/shop/shop1.gif" alt="" height="80px" width="80px">
                                            <h5 class="text-sm-center mt-2 mb-1">Asdf Bhjk</h5>
                                            <div class="location text-sm-center"><i class="fa fa-list-alt"></i> ========</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo base_url(); ?>seller_profile_c">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" src="<?php echo base_url(); ?>assets/images/shop/shop1.gif" alt="" height="80px" width="80px">
                                            <h5 class="text-sm-center mt-2 mb-1">Asdf Bhjk</h5>
                                            <div class="location text-sm-center"><i class="fa fa-list-alt"></i> ========</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } elseif($user['user_type'] == 'Saler') { ?>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo base_url(); ?>seller_profile_c">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" src="<?php echo base_url(); ?>assets/images/shop/shop1.gif" alt="" height="80px" width="80px">
                                            <h5 class="text-sm-center mt-2 mb-1">Asdf Bhjk</h5>
                                            <div class="location text-sm-center"><i class="fa fa-list-alt"></i> ========</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo base_url(); ?>seller_profile_c">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" src="<?php echo base_url(); ?>assets/images/shop/shop1.gif" alt="" height="80px" width="80px">
                                            <h5 class="text-sm-center mt-2 mb-1">Asdf Bhjk</h5>
                                            <div class="location text-sm-center"><i class="fa fa-list-alt"></i> ========</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo base_url(); ?>seller_profile_c">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" src="<?php echo base_url(); ?>assets/images/shop/shop1.gif" alt="" height="80px" width="80px">
                                            <h5 class="text-sm-center mt-2 mb-1">Asdf Bhjk</h5>
                                            <div class="location text-sm-center"><i class="fa fa-list-alt"></i> ========</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo base_url(); ?>seller_profile_c">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" src="<?php echo base_url(); ?>assets/images/shop/shop1.gif" alt="" height="80px" width="80px">
                                            <h5 class="text-sm-center mt-2 mb-1">Asdf Bhjk</h5>
                                            <div class="location text-sm-center"><i class="fa fa-list-alt"></i> ========</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                                    
                </div>
            </div>
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php } ?>