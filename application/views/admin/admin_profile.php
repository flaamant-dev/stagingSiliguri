<?php if(!$this->session->userdata('blogged_in')) {
    redirect('home');
} else { ?>
<?php if($this->uri->segment(1) == "admin") {
        $this->load->view('all_modals'); 
        $admin_id = $this->uri->segment(3);
        $admins = $this->Backend_model->show_admin($admin_id);
?>


    <div class="content">
        <div class="animated fadeIn">
    
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="card shadow mb-4">
                    
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                        </div>
                        
                        <div class="card-body">

                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url(); ?>assets/images/user_profile/img.png">
                                </div>
                            </div>


                            <ul class="list-unstyled user_data">
                                <li>
                                <i class="fa fa-envelope"></i> <?php echo $this->session->userdata('email'); ?>
                                </li>

                                <li>
                                    <i class="fa fa-clock"></i> <?php echo date("d M, Y", strtotime($admins['admin_login'])); ?>
                                </li>
                            </ul>

                            <a class="btn btn-success btn-sm"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />

                            <h4>Skills</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                    <p>Web Applications</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>Website Design</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>Automation & Testing</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>UI / UX</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $admins['admin_name']; ?></h6>
                        </div>
                        
                        <div class="card-body">
                        </div>
                    </div>
                </div>

            </div>
                
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>


    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->



<?php }} ?>