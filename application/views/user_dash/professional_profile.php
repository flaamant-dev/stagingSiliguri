<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>
<?php 
    $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
    $professional_details =  $this->User_model->show_professional_info($this->session->userdata('user_id')); 
    $session_data =  $this->Page_model->search_user_session($this->session->userdata('user_id'));

    // $this->load->view('templates/header');
    // $this->load->view('templates/nav');
    // $this->load->view('templates/top'); 
?>


        <div class="content">
            <div class="animated fadeIn">
                            
                <div class="row col-12">

                    <div class="card" style="width:100%">
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
                                                    $pro_img = base_url().'images/professional_profile/doc_pro.jpg';
                                                } ?>
                                                <a href="#">
                                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" 
                                                            src="<?php echo $pro_img; ?>">
                                                </a>
                                                <h2>Dr. <?php echo $professional_details['first_name'].' '.$professional_details['last_name']; ?> 
                                                    <img class="align-self-center rounded-circle mr-3" 
                                                            style="width:22px;" alt="Doctor" 
                                                            src="<?php echo base_url(); ?>images/badge2.png">
                                                </h2>
                                                <h4 style="padding: 10px 0 10px 0;"><?php echo $professional_details['cat_name']; ?></h4>
                                                <div class="weather-category twt-category">
                                                <ul>
                                                    <li style="color: #000;">
                                                        <h5> <img class="align-self-center rounded-circle mr-3" style="width:22px;" alt="" src="<?php echo base_url(); ?>images/love.png">750</h5>
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
                                            <img src="<?php echo base_url(); ?>images/check40.png" width="20px"> Medical Registration Verified
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                        
                        
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 style="margin: auto; padding: 10px; "><b>Visit my Appointment page</b></h4>
                                            <div class="calender-cont widget-calender">
                                                <a href="<?php echo base_url(); ?>doctors/dashboard" class="btn btn-lg btn-warning">Click me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>              
                            </div>                   
                        </div>
                        
                    </div>
                </div>
                
            
                <div class="row col-12">
                    <div class="card" style="width:100%">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">Stay safe stay healthy - Dr. <?php echo $professional_details['first_name'].' '.$professional_details['last_name']; ?> </strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <!-- <iframe width="100%" height="257" src="https://www.youtube.com/embed/e5ZIrUQ_Gwc?autoplay=1&mute=1" 
                                            frameborder="0" allow="accelerometer; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                    </iframe> -->
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
                                                <!-- <p><a href="#1"><i class="fa fa-comments"></i> 381 Patient Stories</a></p> -->
                                            
                                            </div>
                                        </div>                                                    
                                    </section>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                
            
                <div class="row col-12">
                    <div class="card" style="width:100%">
                    
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

                <script>
                    jQuery(document).ready(function(){
                        localStorage.setItem('token', '<?php //echo $session_data['token']; ?>');
                        localStorage.setItem('device-id', '<?php //echo $session_data['device_id']; ?>');
                        localStorage.setItem('device-type', '<?php //echo $session_data['device_type']; ?>');
                        localStorage.setItem('user-type', '<?php //echo $session_data['user_type']; ?>');        
                    });
                </script> 
            </div>
        </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>
    <script>
		jQuery(document).ready(function() {
			get_session_data(<?php echo $this->session->userdata('user_id'); ?>);
		});
    </script>

</div><!-- /#right-panel -->

<?php } ?>