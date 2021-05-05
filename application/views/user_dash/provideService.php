<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>
<?php 
    //$user = $this->User_model->show_user($this->session->userdata('user_id')); 
    $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
    //$professional_details =  $this->User_model->show_professional_info($this->session->userdata('user_id')); 
?>

    <div class="content">
        <div class="animated fadeIn">

            <div class="badges">
                <div class="row">                                    
                    <?php if($user['user_type'] == 'User') {   ?>

                        <?php if($user['profession'] === NULL) { ?>

                            <div class="col-sm-6 col-lg-3">
                                <div class="card text-white bg-flat-color-1">
                                    <div class="card-body">
                                        <a href="<?php echo base_url(); ?>users/doctor_enroll">
                                            <div class="card-left pt-1 float-left">
                                                <p class="text-light mt-1 m-0">Enroll as a Doctor</p>
                                            </div><!-- /.card-left -->

                                            <div class="card-right float-right text-right">
                                                <i class="icon fade-5 icon-lg pe-7s-add-user"></i>
                                            </div><!-- /.card-right -->
                                        </a>
                                    </div>

                                </div>
                            </div>

                        <?php } else { ?>
                            <?php if($user['profession'] == 'DOCTOR') { ?>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-white bg-flat-color-1">
                                        <div class="card-body">
                                            <a href="<?php echo base_url(); ?>users/professional_profile">
                                                <p class="text-light mt-1 m-0">You are already enrolled as a Doctor. Click to check profile.</p>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>


                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-flat-color-3">
                                <div class="card-body">
                                    <a href="<?php echo base_url(); ?>users/becomeSeller">
                                        <div class="card-left pt-1 float-left">
                                            <p class="text-light mt-1 m-0">Enroll your Business</p>
                                        </div><!-- /.card-left -->

                                        <div class="card-right float-right text-right">
                                            <i class="icon fade-5 icon-lg pe-7s-culture"></i>
                                        </div><!-- /.card-right -->
                                    </a>
                                </div>

                            </div>
                        </div>
                        
                    <?php } elseif($user['user_type'] == 'Saler') { ?>


                        <?php if($user['profession'] === NULL) { ?>

                            <div class="col-sm-6 col-lg-3">
                                <div class="card text-white bg-flat-color-1">
                                    <div class="card-body">
                                        <a href="<?php echo base_url(); ?>users/doctor_enroll">
                                            <div class="card-left pt-1 float-left">
                                                <p class="text-light mt-1 m-0">Enroll as a Doctor</p>
                                            </div><!-- /.card-left -->

                                            <div class="card-right float-right text-right">
                                                <i class="icon fade-5 icon-lg pe-7s-add-user"></i>
                                            </div><!-- /.card-right -->
                                        </a>
                                    </div>

                                </div>
                            </div>

                        <?php } else { ?>
                            <?php if($user['profession'] == 'DOCTOR') { ?>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-white bg-flat-color-1">
                                        <div class="card-body">
                                            <a href="<?php echo base_url(); ?>users/professional_profile">
                                                <p class="text-light mt-1 m-0">You are already enrolled as a Doctor. Click to check profile.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-flat-color-3">
                                <div class="card-body">
                                    <a href="<?php echo base_url(); ?>users/becomeSeller">
                                        <p class="text-light mt-1 m-0">Click to enroll your other business</p>
                                    </a>
                                </div>

                            </div>
                        </div>

                    <?php } ?>
                </div> <!-- .badges -->

            </div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php } ?>