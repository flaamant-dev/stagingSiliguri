
<?php 
    $doc_id = $this->uri->segment(2);
    $user = $this->Status_model->show_user_professional_status($doc_id); 
    $professional_details = $this->User_model->show_professional_info($doc_id); 
    $all_clinic = $this->Business_model->show_all_clinic($doc_id); 
    //$this->load->view('all_modals');
    if(!$this->session->userdata('ulogged_in')) { 
        $user_id = 0;
    } else {
        $user_id = $this->session->userdata('user_id');
    }
?>       

        <div class="content">
            <div class="animated fadeIn">
                <!--========================================
                ============================================
                ==========================================-->
                

                <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">Stay safe stay healthy - Dr. <?php echo $professional_details['first_name'].' '.$professional_details['last_name']; ?>
                                <i class="fa fa-share-alt" data-toggle="modal" data-target="#smallmodal" aria-hidden="true" style="float: right; color: #007BFF; font-size: 25px"></i>
                                                    
                                <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="smallmodalLabel" style="float: left">Share with :</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="#" class="fa fa-facebook"></a>
                                                <a href="#" class="fa fa-twitter"></a>
                                                <a href="#" class="fa fa-google"></a>
                                                <a href="#" class="fa fa-linkedin"></a>
                                                <a href="#" class="fa fa-youtube"></a>
                                                <a href="#" class="fa fa-instagram"></a>
                                                <a href="#" class="fa fa-pinterest"></a>
                                                <a href="#" class="fa fa-snapchat-ghost"></a>
                                                <a href="#" class="fa fa-skype"></a>
                                                <a href="#" class="fa fa-android"></a>
                                                <a href="#" class="fa fa-dribbble"></a>
                                                <a href="#" class="fa fa-vimeo"></a>
                                                <a href="#" class="fa fa-tumblr"></a>
                                                <a href="#" class="fa fa-vine"></a>
                                                <a href="#" class="fa fa-foursquare"></a>
                                                <a href="#" class="fa fa-stumbleupon"></a>
                                                <a href="#" class="fa fa-flickr"></a>
                                                <a href="#" class="fa fa-yahoo"></a>
                                                <a href="#" class="fa fa-reddit"></a>
                                                <a href="#" class="fa fa-rss"></a>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </strong>    
                        </div>


                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 cs-col-padd">
                                    <div class="feed-box text-center">
                                        <section class="card">
                                            <div class="card-body">
                                                <div class="corner-ribon blue-ribon">
                                                    <i class="fa fa-twitter"></i>
                                                </div>
                                                <?php if($professional_details['profile_picture'] != NULL) {
                                                    $pro_img = $professional_details['profile_picture'];
                                                } else {
                                                    $pro_img = base_url().'images/doc_pro.jpg';
                                                } ?>
                                                <a href="#">
                                                    <img class="align-self-center rounded-circle mr-3" 
                                                        style="width:85px; height:85px;" alt="" 
                                                        src="<?php echo $pro_img; ?>">
                                                </a>
                                                <h2>
                                                    Dr. <?php echo $professional_details['first_name'].' '.$professional_details['last_name']; ?>
                                                    <img class="align-self-center rounded-circle mr-3" 
                                                        style="width:22px;" alt="Doctor" 
                                                        src="<?php echo base_url(); ?>images/badge2.png">
                                                </h2>
                                                <h4 style="padding: 10px 0 10px 0;"><?php echo $professional_details['cat_name']; ?></h4>
                                                <div class="weather-category twt-category">
                                                    <ul>
                                                        <li style="color: #000;">
                                                            <button class="btn btn-danger btn-sm like-portfolio" user-id="<?php echo $professional_details['user_id']; ?>">
                                                                <i class="fa fa-heart mr-2">&nbsp;&nbsp;<?php echo $professional_details['like_profile']; ?></i>
                                                            </button>
                                                        </li>
                                                        <li style="color: #000;">
                                                            <h5>265</h5>
                                                            Rating
                                                        </li>
                                                        <li style="border: 0; color: #000;">
                                                            <h5><i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </h5>
                                                            4.6/5
                                                        </li>
                                                    </ul>
                                                </div>
                                                <?php if($professional_details['cat_name']) { ?>
                                                    <img src="<?php echo base_url(); ?>images/check40.png" width="20px"> 
                                                    Medical Registration Verified
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>images/check40.png" width="20px"> 
                                                    Medical Registration Not verified yet
                                                <?php } ?>
                                            </div>
                                        </section>
                                    </div>
                                </div>


                                <div class="d-none d-sm-none d-md-block d-lg-block d-xl-block col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 cs-col-padd">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 style="margin: auto; padding: 10px; "><b>Book your
                                                    Appointment</b></h3>
                                            <div class="calender-cont widget-calender">
                                                <div id="calendar" doc-id="<?php echo $doc_id; ?>" user-id="<?php echo $user_id; ?>"></div>
                                            </div>
                                        </div>
                                    </div><!-- /.card -->
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 cs-col-padd order-2 order-sm-2 order-md-1 order-lg-1 order-xl-1">
                                    <div class="card">
                                        <div class="card-body" style="padding-bottom: 0;">
                                            <div class="card-body" style="padding-bottom: 0;">
                                                <div class="corner-ribon blue-ribon">
                                                    <i class="fa fa-twitter"></i>
                                                </div>
                                                <p>MBBS DM in Cardiolgy</p>
                                                <p>Services are heart surgery, bypass
                                                    surgery, halter monitoring, pulse expert
                                                    with 11 year experience</p>
                                                <p><a href="#1"><i class="fa fa-comments"></i> 381
                                                        Patient Stories</a></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Video Div-->
                                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 cs-col-padd order-1 order-sm-1 order-md-2 order-lg-2 order-xl-2">
                                    <div class="card">
                                        <iframe width="100%" height="257"
                                            src="https://www.youtube.com/embed/e5ZIrUQ_Gwc?autoplay=1&mute=1"
                                            frameborder="0" allow="accelerometer; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                                <!--Video Div-->
                            </div>
                            <!--tabs-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-12 col-lg-12 col-xl-12 cs-col-padd">
                                    <div class="card">

                                        <div class="card-body">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="doc-info-tab"
                                                        data-toggle="pill" href="#doc-info" role="tab"
                                                        aria-controls="doc-info" aria-selected="true">Info</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill"
                                                        href="#pills-review" role="tab"
                                                        aria-controls="pills-review"
                                                        aria-selected="false">Review</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                        href="#pills-contact" role="tab"
                                                        aria-controls="pills-contact"
                                                        aria-selected="false">Blogs</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="qna-tab" data-toggle="pill"
                                                        href="#qna" role="tab" aria-controls="qna"
                                                        aria-selected="false">Q & A</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <!--info tab-->
                                                <div class="tab-pane fade show active" id="doc-info"
                                                    role="tabpanel" aria-labelledby="doc-info-tab">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                            <div class="cu-info-bdr">
                                                                <?php if($all_clinic) { foreach($all_clinic as $cli) { ?>
                                                                <div>
                                                                    <div class="row">
                                                                        <div class="col-lg-2 col-md-2 mb-2">
                                                                            <div class="mx-auto d-block">
                                                                                <img class="mx-auto d-block" src="<?php echo base_url(); ?>images/Dental/dental-logo-1.jpg" alt="Clinic Image">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-7">
                                                                            <div class="mx-auto d-block">
                                                                                <strong>
                                                                                    <h4 class="mb-2 font-six" style="color: #14bef0;"><?php echo $cli['business_name']; ?>
                                                                                    </h4>
                                                                                </strong>
                                                                                <div class="mb-2 font-medium" style="line-height: 20px;">
                                                                                    <h5 class="font-six text-secondary"><?php echo $cli['business_address']; ?>, <?php echo $cli['business_city']; ?></h5>
                                                                                </div>

                                                                                <!-- <div class="mb-2" style="line-height: 20px;"><span class="font-medium">3
                                                                                        Dentists,&nbsp;1 Oral and MaxilloFacial Surgeon,&nbsp;1
                                                                                        Periodonist,&nbsp;2 Dental Surgeons,&nbsp;1 Pediatric
                                                                                        Dentist.</span>
                                                                                </div> -->
                                                                                
                                                                                <div class="row mb-2">
                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                                                                        <div class="badge-style">
                                                                                            <span class="extra-small">Service 1</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 d-none d-lg-block d-md-block mb-2">
                                                                                        <div class="badge-style">
                                                                                            <span class="extra-small">Service 2</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 d-none d-lg-block d-md-block mb-2">
                                                                                        <div class="badge-style">
                                                                                            <span class="extra-small">Service 3</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-2">
                                                                                        <div class="">
                                                                                            <span class="extra-small" style="vertical-align: sub;">View
                                                                                                all 55 others</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-3 col-lg-3 col-md-3 pl-md-2">
                                                                            <div>
                                                                                <div class="font-medium">
                                                                                    <i class="fa fa-star text-success"></i>
                                                                                    <i class="fa fa-star text-success"></i>
                                                                                    <i class="fa fa-star text-success"></i>
                                                                                    <i class="fa fa-star text-success"></i>
                                                                                    <i class="fa fa-star-half-o text-success"></i>
                                                                                    <span class="text-success font-six font-normal ml-1" style="vertical-align: top;">4.5</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-secondary font-medium mb-2 ">(100 Ratings)</div>
                                                                        
                                                                            <div class="mb-2 d-flex">
                                                                                <div><i class="fa fa-money"></i></div>
                                                                                <div class="ml-2"><span class="font-medium"><i class="fa fa-rupee"></i>&nbsp;250 - 350</span></div>
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <div class="d-flex">
                                                                                    <div><i class="fa fa-clock-o"></i></div>
                                                                                    <div class="ml-2"><span class="font-medium"
                                                                                            style="color: rgba(0, 0, 0, 0.8);"><strong>&nbsp;Mon-Sat</strong></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="extra-small" style="line-height: 20px;">10:00 AM - 01:30 PM
                                                                                    , 05:00 PM - 09:00 PM</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-2 inf-btn-des">
                                                                        <a href="tel:<?php echo $cli['business_phone']; ?>" class="text-dark font-medium font-six"><div class="text-center bg-light py-2"><i class="fa fa-phone"></i>&nbsp;Call Clinic</div></a>
                                                                        <a href="#" class="text-white font-medium font-six"><div class="text-center bg-success py-2"><i class="fa fa-calendar"></i>&nbsp;Book Appointment</div></a>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <?php } } else { echo '<h4>Not enrolled to any clinic yet.</h4>'; }?>
                                                                <!-- <div>
                                                                    <div class="row">
                                                                        <div class="col-lg-2 col-md-2 mb-2">
                                                                            <div class="mx-auto d-block">
                                                                                <img class="mx-auto d-block" src="<?php echo base_url(); ?>images/Dental/dental-logo-1.jpg" alt="Card image cap">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-7">
                                                                            <div class="mx-auto d-block">
                                                                                <strong>
                                                                                    <h4 class="mb-2 font-six" style="color: #14bef0;">Vignesh Dental Speciality
                                                                                    </h4>
                                                                                </strong>
                                                                                <div class="mb-2 font-medium" style="line-height: 20px;">
                                                                                    <h5 class="font-six text-secondary">Rajajinagar, Bangalore</h5>
                                                                                </div>

                                                                                <div class="mb-2" style="line-height: 20px;"><span class="font-medium">3
                                                                                        Dentists,&nbsp;1 Oral and MaxilloFacial Surgeon,&nbsp;1
                                                                                        Periodonist,&nbsp;2 Dental Surgeons,&nbsp;1 Pediatric
                                                                                        Dentist.</span>
                                                                                </div>
                                                                                
                                                                                <div class="row mb-2">
                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                                                                        <div class="badge-style">
                                                                                            <span class="extra-small">Service 1</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 d-none d-lg-block d-md-block mb-2">
                                                                                        <div class="badge-style">
                                                                                            <span class="extra-small">Service 2</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 d-none d-lg-block d-md-block mb-2">
                                                                                        <div class="badge-style">
                                                                                            <span class="extra-small">Service 3</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-2">
                                                                                        <div class="">
                                                                                            <span class="extra-small" style="vertical-align: sub;">View
                                                                                                all 55 others</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-3 col-lg-3 col-md-3 pl-md-2">
                                                                            <div>
                                                                                <div class="font-medium">
                                                                                    <i class="fa fa-star text-success"></i>
                                                                                    <i class="fa fa-star text-success"></i>
                                                                                    <i class="fa fa-star text-success"></i>
                                                                                    <i class="fa fa-star text-success"></i>
                                                                                    <i class="fa fa-star-half-o text-success"></i>
                                                                                    <span class="text-success font-six font-normal ml-1" style="vertical-align: top;">4.5</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-secondary font-medium mb-2 ">(100 Ratings)</div>
                                                                        
                                                                            <div class="mb-2 d-flex">
                                                                                <div><i class="fa fa-money"></i></div>
                                                                                <div class="ml-2"><span class="font-medium"><i class="fa fa-rupee"></i>&nbsp;250 - 350</span></div>
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <div class="d-flex">
                                                                                    <div><i class="fa fa-clock-o"></i></div>
                                                                                    <div class="ml-2"><span class="font-medium"
                                                                                            style="color: rgba(0, 0, 0, 0.8);"><strong>&nbsp;Mon-Sat</strong></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="extra-small" style="line-height: 20px;">10:00 AM - 01:30 PM
                                                                                    , 05:00 PM - 09:00 PM</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-2 inf-btn-des">
                                                                        <a href="#" class="text-dark font-medium font-six" style="width: calc(100% /2);"><div class="text-center bg-light py-2"><i class="fa fa-phone"></i>&nbsp;Call Clinic</div></a>
                                                                        <a href="#" class="text-white font-medium font-six" style="width: calc(100% /2);"><div class="text-center bg-success py-2"><i class="fa fa-calendar"></i>&nbsp;Book Appointment</div></a>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3 mt-sm-3 mt-lg-0 mt-md-0 mt-xl-0">
                                                            <div class="sticky-top cu-info-bdr">
                                                                <?php if($professional_details['about'] != NULL) { ?>
                                                                <div class="mb-2">
                                                                    <span class="font-medium text-dark">
                                                                        <i class="fa fa-info-circle text-primary" aria-hidden="true"></i> 
                                                                        <?php echo $professional_details['about']; ?>
                                                                    </span>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($professional_details['phone'] != NULL) { ?>
                                                                <div class="mb-2">
                                                                    <div class="font-normal">Contact No</div>
                                                                    <div class="font-medium"><a href="tel:<?php echo $professional_details['phone']; ?>" class="text-primary"><?php echo $professional_details['phone']; ?></a></div>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($professional_details['email'] != NULL) { ?>
                                                                <div class="mb-2">
                                                                    <div class="font-normal"><span>E-Mail</span></div>
                                                                    <div style="word-break: break-all;"><span><a href="mailto:<?php echo $professional_details['email']; ?>" class="text-primary"><?php echo $professional_details['email']; ?></a></span></div>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($professional_details['phone'] != NULL) { ?>
                                                                <div>
                                                                    <div><span class="font-normal">Link</span></div>
                                                                    <div style="word-break: break-all;"><span><a href="#" class="text-primary">Link of doctor</a></span></div>
                                                                </div>
                                                                <?php } ?>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>                                                        
                                                </div>
                                                <!--/info tab-->
                                                <!--Review Tab-->
                                                <div class="tab-pane fade" id="pills-review" role="tabpanel"
                                                    aria-labelledby="pills-review-tab">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 order-2 order-sm-2 order-md-1 order-lg-1 order-xl-1">
                                                            <div class="post-card-content">
                                                                <div class="p-3">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div>
                                                                            <div class="d-flex">
                                                                                <div><img src="<?php echo base_url(); ?>/images/avatar/2.jpg" class="align-self-center rounded-circle res-wid-img"></div>
                                                                                <div class="ml-2">
                                                                                    <h5 class="font-six text-dark">Amit Biswas</h5>
                                                                                    <div class="extra-small">
                                                                                        <i class="fa fa-star text-warning"></i>
                                                                                        <i class="fa fa-star text-warning"></i>
                                                                                        <i class="fa fa-star text-warning"></i>
                                                                                        <i class="fa fa-star text-warning"></i>
                                                                                        <i class="fa fa-star" style="color: rgb(206, 206, 206);"></i>
                                                                                        <span class="text-secondary extra-small font-six">&nbsp;19 weeks ago</span>
                                                                                    </div>
                                                                                    <i class="mt-1 font-medium text-secondary">The user didn't write a review, and has left just a rating. The user didn't write a review, and has left just a rating.</i>
                                                                                </div>
                                                                            </div>
                                                                        </div>                                                  
                                                                        <div class="text-center ell-btn" style="padding: 5px 16px;">
                                                                            <i class="fa fa-ellipsis-v font-large" style="vertical-align: sub;"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 ml-5">
                                                                        <div class="d-flex">
                                                                            <div><img src="<?php echo base_url(); ?>images/Icons/logo.png" class="align-self-center rounded-circle res-wid-img"></div>
                                                                            <div class="ml-2">
                                                                                <h5 class="font-six text-dark">Grandred Technology</h5>
                                                                                <div class="extra-small">                                                                
                                                                                    <span class="text-secondary extra-small font-six">&nbsp;18 weeks ago</span>
                                                                                </div>
                                                                                <i class="mt-1 font-medium text-secondary">Thanks for your contributions sir. Thanks for your contributions sir.</i>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="d-flex ml-5 mt-2 pl-5">
                                                                        <div>
                                                                            <button type="button" class="btn btn-sm btn-outline-primary font-six font-medium">Edit</button>
                                                                        </div>
                                                                        <div class="ml-2">
                                                                            <button type="button" class="btn btn-sm btn-outline-primary font-six font-medium">Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 order-1 order-sm-1 order-md-2 order-lg-2 order-xl-2">
                                                            <div class="post-card-content sticky-top">
                                                                <div class="p-3">
                                                                    <div class="mb-3">
                                                                        <h5 class="font-weight-bold">Latest reviews</h5>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-9 col-md-12 col-lg-12 col-xl-9 order-2 order-sm-1 order-md-2 order-lg-2 order-xl-1">
                                                                            

                                                                            <div class="row">
                                                                                <div class="col-3 col-sm-2 col-md-3 col-lg-3 pr-1 d-flex justify-content-around">                                                
                                                                                    <div class="font-medium font-six">5</div> 
                                                                                    <div class="extra-small"><i class="fa fa-star" style="vertical-align: bottom; color: rgb(161, 161, 161);"></i></div>                                                   
                                                                                </div>                                                                                   
                                                                                <div class="col-9 col-sm-10 col-md-9 col-lg-9 pl-1">                                        
                                                                                    <div class="progress" style="height: 7px; margin-top: 10px;">
                                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>                                                                            
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-3 col-sm-2 col-md-3 col-lg-3 pr-1 d-flex justify-content-around">                                                
                                                                                    <div class="font-medium font-six">4</div> 
                                                                                    <div class="extra-small"><i class="fa fa-star" style="vertical-align: bottom; color: rgb(161, 161, 161);"></i></div>                                                   
                                                                                </div>
                                                                                
                                                                                <div class="col-9 col-sm-10 col-md-9 col-lg-9 pl-1">                                        
                                                                                    <div class="progress" style="height: 7px; margin-top: 10px;">
                                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>                                                                            
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-3 col-sm-2 col-md-3 col-lg-3 pr-1 d-flex justify-content-around">                                                
                                                                                    <div class="font-medium font-six">3</div> 
                                                                                    <div class="extra-small"><i class="fa fa-star" style="vertical-align: bottom; color: rgb(161, 161, 161);"></i></div>                                                   
                                                                                </div>
                                                                                
                                                                                <div class="col-9 col-sm-10 col-md-9 col-lg-9 pl-1">                                        
                                                                                    <div class="progress" style="height: 7px; margin-top: 10px;">
                                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>                                                                             
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-3 col-sm-2 col-md-3 col-lg-3 pr-1 d-flex justify-content-around">                                                
                                                                                    <div class="font-medium font-six">2</div> 
                                                                                    <div class="extra-small"><i class="fa fa-star" style="vertical-align: bottom; color: rgb(161, 161, 161);"></i></div>                                                   
                                                                                </div>
                                                                                
                                                                                <div class="col-9 col-sm-10 col-md-9 col-lg-9 pl-1">                                        
                                                                                    <div class="progress" style="height: 7px; margin-top: 10px;">
                                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>                                                                             
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-3 col-sm-2 col-md-3 col-lg-3 pr-1 d-flex justify-content-around">                                                
                                                                                    <div class="font-medium font-six">1</div> 
                                                                                    <div class="extra-small"><i class="fa fa-star" style="vertical-align: bottom; color: rgb(161, 161, 161);"></i></div>                                                   
                                                                                </div>
                                                                                
                                                                                <div class="col-9 col-sm-10 col-md-9 col-lg-9 pl-1">                                        
                                                                                    <div class="progress" style="height: 7px; margin-top: 10px;">
                                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>                                                                            
                                                                                </div>
                                                                            </div>                                                                            
                                                                        </div>
                                                                        <div class="col-12 col-sm-3 col-md-12 col-lg-12 col-xl-3 pl-0 pl-lg-0 pl-xl-0 order-1 order-sm-2 order-md-1 order-lg-1 order-xl-2 pl-md-3 text-center mb-2 mt-sm-2 mb-md-2 mb-lg-2 mt-xl-2">
                                                                            <div class="mb-1"><span class="font-six" style="font-size: 25px;">4.3</span></div>
                                                                            <div class="mb-1 d-flex justify-content-center">
                                                                                <i class="fa fa-star font-medium text-warning"></i>
                                                                                <i class="fa fa-star font-medium text-warning ml-1"></i>
                                                                                <i class="fa fa-star font-medium text-warning ml-1"></i>
                                                                                <i class="fa fa-star font-medium text-warning ml-1"></i>
                                                                                <i class="fa fa-star font-medium text-warning ml-1"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h5 class="extra-small font-six">3 Reviews</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/Review Tab-->
                                                <!--Blogs Tab-->
                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                                    aria-labelledby="pills-contact-tab">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                            <div class="card selected-area">
                                                                <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                                    alt="Card image cap">
                                                                <div class="p-2">
                                                                    <h4 class="font-six mb-2" style="max-height: 85px; overflow-y: hidden;">Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing</h4>
                                                                    
                                                                    <a href="#">
                                                                        <div class="mt-2 text-center selected-area mx-auto" style="border-radius: 20px; width: fit-content;">
                                                                            <span class="text-center pl-2" style="vertical-align: middle;">View More</span>
                                                                            <img src="<?php echo base_url(); ?>images/Icons/send.png" style="width: 40px;">
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                            <div class="card selected-area">
                                                                <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                                    alt="Card image cap">
                                                                <div class="p-2">
                                                                    <h4 class="font-six mb-2" style="max-height: 85px; overflow-y: hidden;">Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing</h4>
                                                                    
                                                                    <a href="#">
                                                                        <div class="mt-2 text-center selected-area mx-auto" style="border-radius: 20px; width: fit-content;">
                                                                            <span class="text-center pl-2" style="vertical-align: middle;">View More</span>
                                                                            <img src="<?php echo base_url(); ?>images/Icons/send.png" style="width: 40px;">
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                            <div class="card selected-area">
                                                                <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                                    alt="Card image cap">
                                                                <div class="p-2">
                                                                    <h4 class="font-six mb-2" style="max-height: 85px; overflow-y: hidden;">Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing</h4>
                                                                    
                                                                    <a href="#">
                                                                        <div class="mt-2 text-center selected-area mx-auto" style="border-radius: 20px; width: fit-content;">
                                                                            <span class="text-center pl-2" style="vertical-align: middle;">View More</span>
                                                                            <img src="<?php echo base_url(); ?>images/Icons/send.png" style="width: 40px;">
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                            <div class="card selected-area">
                                                                <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                                    alt="Card image cap">
                                                                <div class="p-2">
                                                                    <h4 class="font-six mb-2" style="max-height: 85px; overflow-y: hidden;">Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing Blog Title Dummy text for printing</h4>
                                                                    
                                                                    <a href="#">
                                                                        <div class="mt-2 text-center selected-area mx-auto" style="border-radius: 20px; width: fit-content;">
                                                                            <span class="text-center pl-2" style="vertical-align: middle;">View More</span>
                                                                            <img src="<?php echo base_url(); ?>images/Icons/send.png" style="width: 40px;">
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Blogs Tab-->

                                                <div class="tab-pane fade" id="qna" role="tabpanel"
                                                    aria-labelledby="qna-tab">
                                                                                                            
                                                    <div class="mt-2">                                                        
                                                        <div class="Question d-flex">
                                                            <div style="margin-top: -10px;"><span class="text-danger" style="font-size: 25px;">Q</span></div>
                                                            <div><span class="mx-1">.</span></div>
                                                            <div>
                                                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit. Iste nobis, fugit pariatur minima! Dolorum
                                                                    modi pariatur aperiam quas odio nulla, illo
                                                                    necessitatibus dolor a.</span>
                                                            </div>
                                                        </div>                                                       
                                                    
                                                        <div class="Answer mt-1 d-flex">
                                                            <div style="margin-top: -10px;"><span class="text-success" style="font-size: 25px;">A</span></div>
                                                            <div><span class="mx-1">.</span></div>
                                                            <div>
                                                                <span class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit. Iste nobis, fugit pariatur minima! Dolorum
                                                                    modi pariatur aperiam quas odio nulla, illo
                                                                    necessitatibus dolor a.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div>                                                        
                                                        <div class="Question d-flex">
                                                            <div style="margin-top: -10px;"><span class="text-danger" style="font-size: 25px;">Q</span></div>
                                                            <div><span class="mx-1">.</span></div>
                                                            <div>
                                                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit. Iste nobis, fugit pariatur minima! Dolorum
                                                                    modi pariatur aperiam quas odio nulla, illo
                                                                    necessitatibus dolor a.</span>
                                                            </div>
                                                        </div>                                                       
                                                    
                                                        <div class="Answer mt-1 d-flex">
                                                            <div style="margin-top: -10px;"><span class="text-success" style="font-size: 25px;">A</span></div>
                                                            <div><span class="mx-1">.</span></div>
                                                            <div>
                                                                <span class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit. Iste nobis, fugit pariatur minima! Dolorum
                                                                    modi pariatur aperiam quas odio nulla, illo
                                                                    necessitatibus dolor a.</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--third card-->
                                <div class="col-12 col-sm-12 col-lg-12 col-lg-12 col-xl-12 cs-col-padd">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Service</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <?php if($professional_details['service'] != NULL) { ?>
                                                                <p class="card-text"><?php echo $professional_details['service']; ?></p>
                                                            <?php } else { ?>
                                                                <p class="card-text">No information found on Service</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Specializations</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <?php if($professional_details['specialization'] != NULL) { ?>
                                                                <p class="card-text"><?php echo $professional_details['specialization']; ?></p>
                                                            <?php } else { ?>
                                                                <p class="card-text">No information found on Specializations</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Award & Recognitions</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <?php if($professional_details['award'] != NULL) { ?>
                                                                <p class="card-text"><?php echo $professional_details['award']; ?></p>
                                                            <?php } else { ?>
                                                                <p class="card-text">No information found on Award & Recognitions</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Education & Qualifications</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <?php if($professional_details['education'] != NULL) { ?>
                                                                <p class="card-text"><?php echo $professional_details['education']; ?></p>
                                                            <?php } else { ?>
                                                                <p class="card-text">No information found on Education & Qualifications</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Experience</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <?php if($professional_details['experience'] != NULL) { ?>
                                                                <p class="card-text"><?php echo $professional_details['experience']; ?></p>
                                                            <?php } else { ?>
                                                                <p class="card-text">No information found on Experience</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card border border-success mb-md-0 mb-lg-0 mb-xl-0">
                                                        <div class="card-header">
                                                            <strong class="card-title">Membership</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <?php if($professional_details['membership'] != NULL) { ?>
                                                                <p class="card-text"><?php echo $professional_details['membership']; ?></p>
                                                            <?php } else { ?>
                                                                <p class="card-text">No information found on Membership</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card border border-success mb-0">
                                                        <div class="card-header">
                                                            <strong class="card-title">Registration</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">Some quick example
                                                                text to build on the card title and
                                                                make up the bulk of the card's
                                                                content.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ third card-->
                            </div>
                            <!-- /tabs-->
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="p-2 mb-3 font-weight-bold">More doctors in <?php echo $professional_details['cat_name']; ?></h4>
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-12 cs-col-padd">
                                    <section class="card">
                                        <div class="card-body mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" src="<?php echo base_url(); ?>images/doc_pro.jpg"
                                                alt="Card image cap" style="width: 90px;">
                                            <h5 class="text-center mt-2 mb-1 font-weight-bold">Dr. Mritunjay
                                                Bhattachrya</h5>
                                            <div class="text-center text-muted">Cardiologist . Surgeon</div>
                                            <div class="text-center" style="font-size: 14px;">
                                                <h6><i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half-o text-warning"
                                                        aria-hidden="true"></i></i>
                                                </h6>
                                                4.6/5&nbsp;(265)
                                            </div>
                                        </div>
                                        <div class="card-body" style="border-top: 1px solid rgba(0,0,0,.1);">
                                            <div class="d-flex justify-content-around">
                                                <div>
                                                    <button type="button" class="btn btn-danger btn-lg btn-padd"><i
                                                            class="fa fa-heart mr-2"></i>&nbsp;750</button>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-success btn-lg btn-padd"
                                                        style="font-size: 15px;">Visit Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>


                <!--========================================
                ============================================
                ==========================================-->

            </div>
        </div>

        <!-- <div class="content">
            <div class="animated fadeIn">

                <div class="ui-typography">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title" v-if="headerText">Stay safe stay healthy - Dr. <?php echo $professional_details['first_name'].' '.$professional_details['last_name']; ?>
                                        <i class="fa fa-share-alt" data-toggle="modal" data-target="#smallmodal" aria-hidden="true" style="float: right; color: #007BFF; font-size: 25px"></i>
                                                            
                                        <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="smallmodalLabel" style="float: left">Share with :</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="#" class="fa fa-facebook"></a>
                                                        <a href="#" class="fa fa-twitter"></a>
                                                        <a href="#" class="fa fa-google"></a>
                                                        <a href="#" class="fa fa-linkedin"></a>
                                                        <a href="#" class="fa fa-youtube"></a>
                                                        <a href="#" class="fa fa-instagram"></a>
                                                        <a href="#" class="fa fa-pinterest"></a>
                                                        <a href="#" class="fa fa-snapchat-ghost"></a>
                                                        <a href="#" class="fa fa-skype"></a>
                                                        <a href="#" class="fa fa-android"></a>
                                                        <a href="#" class="fa fa-dribbble"></a>
                                                        <a href="#" class="fa fa-vimeo"></a>
                                                        <a href="#" class="fa fa-tumblr"></a>
                                                        <a href="#" class="fa fa-vine"></a>
                                                        <a href="#" class="fa fa-foursquare"></a>
                                                        <a href="#" class="fa fa-stumbleupon"></a>
                                                        <a href="#" class="fa fa-flickr"></a>
                                                        <a href="#" class="fa fa-yahoo"></a>
                                                        <a href="#" class="fa fa-reddit"></a>
                                                        <a href="#" class="fa fa-rss"></a>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </strong>    
                                </div>
                             
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="feed-box text-center">
                                                <section class="card">
                                                    <div class="card-body">
                                                        <div class="corner-ribon blue-ribon">
                                                            <i class="fa fa-twitter"></i>
                                                        </div>
                                                        <?php if($professional_details['profile_picture'] != NULL) {
                                                            $pro_img = $professional_details['profile_picture'];
                                                        } else {
                                                            $pro_img = base_url().'images/doc_pro.jpg';
                                                        } ?>
                                                        <a href="#">
                                                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" 
                                                                    src="<?php echo $pro_img; ?>">
                                                        </a>
                                                        <h2>Dr. <?php echo $professional_details['first_name'].' '.$professional_details['last_name']; ?> 
                                                            <img class="align-self-center rounded-circle mr-3" 
                                                                    style="width:22px;" alt="Doctor" 
                                                                    src="<?php echo base_url(); ?>images/professional_profile/badge2.png">
                                                        </h2>
                                                        <h4 style="padding: 10px 0 10px 0;"><?php echo $professional_details['cat_name']; ?></h4>
                                                        <div class="weather-category twt-category">
                                                        <ul>
                                                            <li style="color: #000;">                                                                                                                
                                                                <button class="btn btn-danger btn-sm like-portfolio" user-id="<?php echo $professional_details['user_id']; ?>">
                                                                    <i class="fa fa-heart mr-2">&nbsp;&nbsp;<?php echo $professional_details['like_profile']; ?></i>
                                                                </button>
                                                            </li>
                                                            <li style="color: #000;">
                                                                <h5>265</h5>
                                                                Rating
                                                            </li>
                                                            <li style="border: 0; color: #000;">
                                                                <h5><i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i></h5>
                                                                4.6/5
                                                            </li>
                                                        </ul>
                                                    </div>                                  
                                                    <img src="<?php echo base_url(); ?>images/professional_profile/check40.png" width="20px"> Medical Registration Verified
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                                
                                
                                        <div class="col-md-7">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 style="margin: auto; padding: 10px; "><b>Book your Appointment</b></h4>
                                                    <div class="calender-cont widget-calender">
                                                        <div id="calendar" doc-id="<?php echo $doc_id; ?>" user-id="<?php echo $user_id; ?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>             
                                    </div>                   
                                </div>
                               
                            </div>
                           
                                        
                            <div class="content">
                                <div class="animated fadeIn">

                                    <div class="ui-typography">
                                        <div class="row">
                                            <div class="col-md-12">


                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong class="card-title" v-if="headerText">Stay safe stay healthy - Dr. <?php echo $professional_details['first_name'].' '.$professional_details['last_name']; ?> </strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <iframe width="100%" height="257" src="https://www.youtube.com/embed/e5ZIrUQ_Gwc?autoplay=1&mute=1" 
                                                                        frameborder="0" allow="accelerometer; gyroscope; picture-in-picture" 
                                                                        allowfullscreen>
                                                                </iframe>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <section class="card">
                                                                    <div class="card-body" style="padding-bottom: 0;">
                                                                        <div class="card-body" style="padding-bottom: 0;">
                                                                            <div class="corner-ribon blue-ribon">
                                                                                <i class="fa fa-twitter"></i>
                                                                            </div>
                                                                            <p>MBBS DM in Cardiolgy</p>
                                                                            <p >Services are heart surgery, bypass surgery, halter monitoring, pulse expert with 11 year experience</p>
                                                                            
                                                                        </div>
                                                                    </div>                                                    
                                                                </section>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="animated fadeIn">

                                    <div class="ui-typography">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                
                                                    <div class="card-body">
                                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Info</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Review</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Blogs</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="pills-qa-tab" data-toggle="pill" href="#pills-qa" role="tab" aria-controls="pills-qa" aria-selected="false">Q & A</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="pills-tabContent">
                                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                                <h3>Info</h3>
                                                                <?php if($professional_details['about'] != NULL) { ?>
                                                                    <div class="row" style="margin-bottom: 15px;">
                                                                        <div class="col-md-6">
                                                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                            <?php echo $professional_details['about']; ?>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <i class="fa fa-phone" aria-hidden="true"></i> 
                                                                            <a href="tel:<?php echo $professional_details['phone']; ?>"><?php echo $professional_details['phone']; ?></a>
                                                                            
                                                                            <br>
                                                                            <i class="fa fa-envelope" aria-hidden="true"></i> 
                                                                            <a href="mailto:<?php echo $professional_details['email']; ?>"><?php echo $professional_details['email']; ?></a>
                                                                            <br>
                                                                            <i class="fa fa-list-alt" aria-hidden="true"></i> <?php echo $professional_details['cat_name']; ?>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="row">
                                                                    <?php if($professional_details['service'] != NULL) { ?>
                                                                    <div class="col-md-4">
                                                                        <div class="card border border-success">
                                                                            <div class="card-header">
                                                                                <strong class="card-title">Service</strong>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <p class="card-text"><?php echo $professional_details['service']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if($professional_details['specialization'] != NULL) { ?>
                                                                    <div class="col-md-4">
                                                                        <div class="card border border-success">
                                                                            <div class="card-header">
                                                                                <strong class="card-title">Specializations</strong>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <p class="card-text"><?php echo $professional_details['specialization']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if($professional_details['award'] != NULL) { ?>
                                                                    <div class="col-md-4">
                                                                        <div class="card border border-success">
                                                                            <div class="card-header">
                                                                                <strong class="card-title">Award & Recognitions</strong>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <p class="card-text"><?php echo $professional_details['award']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if($professional_details['education'] != NULL) { ?>
                                                                    <div class="col-md-4">
                                                                        <div class="card border border-success">
                                                                            <div class="card-header">
                                                                                <strong class="card-title">Education & Qualifications</strong>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <p class="card-text"><?php echo $professional_details['education']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if($professional_details['experience'] != NULL) { ?>
                                                                    <div class="col-md-4">
                                                                        <div class="card border border-success">
                                                                            <div class="card-header">
                                                                                <strong class="card-title">Experience</strong>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <p class="card-text"><?php echo $professional_details['experience']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if($professional_details['membership'] != NULL) { ?>
                                                                    <div class="col-md-4">
                                                                        <div class="card border border-success">
                                                                            <div class="card-header">
                                                                                <strong class="card-title">Membership</strong>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <p class="card-text"><?php echo $professional_details['membership']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                                <h3>Review</h3>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nobis, fugit pariatur minima! Dolorum modi pariatur aperiam quas odio nulla, illo necessitatibus dolor a.
                                                                </p>
                                                            </div>
                                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                                <h3>Blogs</h3>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nobis, fugit pariatur minima! Dolorum modi pariatur aperiam quas odio nulla, illo necessitatibus dolor a.
                                                                </p>
                                                            </div>
                                                            <div class="tab-pane fade" id="pills-qa" role="tabpanel" aria-labelledby="pills-qa-tab">
                                                                <h3>Q & A</h3>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nobis, fugit pariatur minima! Dolorum modi pariatur aperiam quas odio nulla, illo necessitatibus dolor a.
                                                                </p>
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
        </div> -->
        <!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>
    



    <!-- Modal - Calendar - Book your Appointment -->
    <div class="modal fade none-border" id="appointment-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Book your Appointment</strong></h4>
                </div>
                <div class="modal-body appointment_modal_body"></div>
            </div>
        </div>
    </div>
    <!-- /#appointment-modal -->

</div><!-- /#right-panel -->