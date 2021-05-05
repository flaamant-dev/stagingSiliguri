<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?> 
    <?php //$user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); ?>
    <?php //if($user['user_type'] == 'User') {   ?>

    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?php echo base_url(); ?>users/profile">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-id"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">Profile Page<!--span class="count"></span--></div>
                                        <div class="stat-heading">Profile Page</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?php echo base_url(); ?>users/visited_doctor">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-add-user"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">Visited Doctors</div>
                                        <div class="stat-heading"><span class="count">5</span></div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?php echo base_url(); ?>users/request_history">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-more"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">Request History</div>
                                        <div class="stat-heading">Request History</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?php echo base_url(); ?>users/purchase_history">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-add-user"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">Purchase History</div>
                                        <div class="stat-heading">Purchase History</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?php echo base_url(); ?>users/contacted_dealer">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">Contacted Dealer</div>
                                        <div class="stat-heading">Contacted Dealer</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- /.content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>

    <?php //} elseif($user['user_type'] == 'Saler') { ?>





    <?php //} ?>

<?php } ?>