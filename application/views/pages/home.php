<?php
	$Categories = $this->Category_model->show_category();
?>


    <div class="content">
        <div class="animated fadeIn">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <img src="<?php echo base_url(); ?>images/doc_bnr.png">
                        <div class="centered">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <h4 class="text-center">You must all pay attention to your health first.</h4>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="font-weight-bold mb-0 text-center" style="padding-bottom: 10px">
                                        <h5># Search Your Doctor</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 search">
                                    <form class="example" action="#1">
                                        <input type="text" name="top_search" placeholder="Search whatever you need" class="form-control" style="padding: 20px 0px 20px 10px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" style="padding: 8px;">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="d-flex">
                                        <p><a href="#" class="text-dark">Trending topics:</a></p>
                                        <p><a href="#" class="text-dark">Covid-19</a></p>
                                        <p><a href="#" class="text-dark">Dengue Fever</a></p>
                                        <p><a href="#" class="text-dark">Asthama</a></p>
                                        <p><a href="#" class="text-dark">Infertility</a></p>
                                        <p><a href="#" class="text-dark">Diabetes</a></p>                                    
                                    </div>
                                </div>
                            </div>
                        </div>      
                        
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">                        
                        <div class="centered">
                        Steps for book appointment
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="orders">
                <div class="row" style="position: relative;">
                    <?php $doctor_cat = $this->Category_model->show_category_doctor(); ?>
                    <?php if($doctor_cat != NULL) { for($i=0;$i<4;$i++) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="card text-white bg-flat-color-3" style="word-wrap: unset">
                                <div class="card-body">
                                    <a href="<?php echo base_url(); ?>search_result" style="text-decoration:none;">
                                        <div class="card-left pt-1 float-left">
                                            <h4 style="font-size: 20px">
                                            <?php echo $doctor_cat[$i]['cat_name']; ?>
                                            </h4>
                                            <p class="text-light mt-1 m-0">Doctors</p>
                                        </div>

                                        <div class="card-right float-right text-right">
                                            <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> 
                    <?php } } ?>              
                
                </div>
                <div class="text-center mt-2 mb-4">
                    <a href="<?php echo base_url(); ?>search_result" class="btn btn-sm btn-primary text-white">View others <i class="fa fa-arrow-down"></i></a>                    
                </div>
                
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <!--<h4 class="card-title box-title">To Do List</h4>-->
                                <div class="card-content">
                                    <img src="<?php echo base_url(); ?>images/doc_bg.png" >
                                    <div class="doc">
                                        <h3><b>Are You a Doctor?</b></h3>
                                    </div>
                                    <div class="doc-join">
                                        <?php 
                                            if($this->session->userdata('logged_in')) { 
                                                $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id'));
                                                if($user['profession'] == 'DOCTOR') {
                                        ?>
                                            <h5><b><a href="<?php echo base_url(); ?>users/professional_profile" style="text-decoration:none;">View Page</a></b></h5>
                                            <?php } else { ?>
                                            <h5><b><a href="<?php echo base_url(); ?>users/doctor_enroll" style="text-decoration:none;">Join now</a></b></h5>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <h5><b><a data-toggle="modal" data-target="#loginModal">Join now</a></b></h5>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div> <!-- /.card-body -->
                        </div><!-- /.card -->
                    </div>

                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <img src="<?php echo base_url(); ?>images/e_doc.png" >
                                    <div class="feature-centered">
                                        <h3><b>Be a Digital Doctor</b></h3>
                                        <h5>Continue your Research</h5>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
                
                <div class="row">
            
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 style="margin: auto; padding: 10px; "><b>Search your doctor & Book your Appointment</b></h3>
                                <div class="calender-cont widget-calender">
                                    <div id="all_doc_booking"></div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                
                </div>
                
                <div class="modal fade none-border" id="home-appointment-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Check availability of a Doctor</strong></h4>
                            </div>
                            <div class="modal-body home-appointment_modal_body"></div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h3 class="p-2 mb-3 font-weight-bold">Top Doctors</h3>
                        <div class="row">
                            <?php $all_doctors =  $this->Doctor_model->show_doctors(); ?>
                            <?php if($all_doctors != NULL) { foreach($all_doctors as $docs) { ?>
                                <div class="col-md-3 col-sm-4 col-xs-12 col-12">
                                    <section class="card">       
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="card-body mx-auto d-block">
                                                    <a href="<?php echo base_url(); ?>doctor_details/<?php echo $docs['user_id']; ?>">
                                                    <img class="rounded-circle mx-auto d-block" src="<?php echo $docs['profile_picture']; ?>" alt="Top doctors" style="width: 90px;">
                                                    <h5 class="text-center mt-2 mb-1 font-weight-bold">Dr. <?php echo $docs['first_name'].' '.$docs['last_name']; ?></h5>
                                                    <div class="text-center text-muted"><?php echo $docs['cat_name']; ?></div>
                                                    <div class="text-center" style="font-size: 14px;">
                                                        <h6><i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                            <i class="fa fa-star-half-o text-warning" aria-hidden="true"></i></i></h6>
                                                            4.6/5&nbsp;(265)
                                                    </div>
                                                    </a>
                                                </div>                                        
                                                <div class="card-body" style="border-top: 1px solid rgba(0,0,0,.1);">
                                                    <div class="d-flex justify-content-around">
                                                        <div>                                                    
                                                            <button class="btn btn-danger btn-sm like-portfolio" user-id="<?php echo $docs['user_id']; ?>">
                                                                <i class="fa fa-heart mr-2">&nbsp;&nbsp;<?php echo $docs['like_profile']; ?></i>
                                                            </button>                                                   
                                                        </div>
                                                        <div>
                                                            <a href="<?php echo base_url(); ?>doctor_details/<?php echo $docs['user_id']; ?>" class="btn btn-success btn-sm">Visit Profile</a>
                                                        </div>                                       
                                                    </div>    
                                                                                            
                                                </div>
                                            </div>
                                        </div>                         
                                    </section>
                                </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h3 class="p-2 mb-2 font-weight-bold">User Reviews</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-header" style="height: 130px;">
                                            <div class="d-flex justify-content-around">
                                                <div>
                                                    <img src="./images/avatar/2.jpg" class="align-self-center rounded-circle" style="width: 50px;">
                                                </div>
                                                <div class="media-body ml-2 mt-2">
                                                    <h5 class="mb-1">Linnea Garcia</h5>
                                                    <div style="font-size: 14px;">
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <span class="ml-1 text-muted" style="font-size: 12px;">a hour ago</span>
                                                    </div>
                                                    <div>
                                                        <p style="font-size: 14px; line-height: 20px;">It is totally worth the money you spent!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-header" style="height: 130px;">
                                            <div class="d-flex justify-content-around">
                                                <div>
                                                    <img src="./images/avatar/6.jpg" class="align-self-center rounded-circle" style="width: 50px;">
                                                </div>
                                                <div class="media-body ml-2 mt-2">
                                                    <h5 class="mb-1">Amara Johnson</h5>
                                                    <div style="font-size: 14px;">
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star-half-o text-warning"></i>
                                                        <span class="ml-1 text-muted" style="font-size: 12px;">2 days ago</span>
                                                    </div>
                                                    <div>
                                                        <p style="font-size: 14px; line-height: 20px;">Excellent solution that I've been looking for!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-header" style="height: 130px;">
                                            <div class="d-flex justify-content-around">
                                                <div>
                                                    <img src="./images/avatar/64-1.jpg" class="align-self-center rounded-circle" style="width: 50px;">
                                                </div>
                                                <div class="media-body ml-2 mt-2">
                                                    <h5 class="mb-1">Chandler</h5>
                                                    <div style="font-size: 14px;">
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <span class="ml-1 text-muted" style="font-size: 12px;">1 month ago</span>
                                                    </div>
                                                    <div>
                                                        <p style="font-size: 14px; line-height: 20px;">I've never seen such a powerful and intuitive tablets!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>

</div><!-- /#right-panel -->