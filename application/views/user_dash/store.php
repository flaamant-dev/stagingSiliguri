<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    
    $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
    if($user['user_type'] == 'Saler') { 
        $this->load->view('all_modals'); 
        $businesses =  $this->Business_model->show_user_business($this->session->userdata('user_id'));
        //$seller = $this->ServPro_model->show_saler_details($this->session->userdata('user_id'));
        $Categories = $this->Category_model->show_sub_category(324);
        $user_name = $this->User_model->show_user_name();
        $doctors = $this->Doctor_model->show_doctors();
        if($this->uri->segment(3) == NULL) {
            $business_registry_id = $businesses[0]['business_registry_id'];
        } else {
            $business_registry_id = $this->uri->segment(3);
        }
        $businessDetails = $this->Business_model->show_businessDetails($business_registry_id);
        $businessReview=$this->Review_model->show_sellerReview_seller($business_registry_id);
        $product =  $this->Product_model->show_product_saler($this->session->userdata('user_id'));

	
?>

        <div class="content">                           
            <div class="animated fadeIn">                               
                <?php if(!$businessDetails['approved']) { ?>
            
                    <div class="row">    
                        <div class="row" style="
                            top:40%;
                            margin: auto auto;
                            width: 100%;
                            height:200px;">
                            <div class="text-center col-md-4 col-sm-3 col-xs-1">&nbsp;</div>
                            <div class="text-center col-md-4 col-sm-6 col-xs-10"
                                style="background-color: #ed4928; border-radius: 16px; color:white; padding:10px;">
                                <h4>Be patient. We are processing your request.</h4>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>

                    <!--Choose Business-->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div style="position: relative;">
                                                <a class="navbar-toggler pl-0 pr-0 pb-0" data-toggle="collapse" data-target="#company-name" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                    <button type="button" class="text-dark" style="background-color: #fff; padding-left: 0; margin-left: -2; border: 0;">
                                                        <div class="d-flex">
                                                            <h4 class="mb-0 pr-3"><strong>Company Name</strong></h4>
                                                            <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                style="color: grey; font-size: small; margin-top: 4px;"></i>
                                                        </div>
                                                    </button>
                                                </a>
                                                <div class="collapse comp-name-nav-dpdown" id="company-name" style="max-height: 345px;">
                                                <?php if($businesses != NULL) { foreach($businesses as $bis) { ?>
                                                    <div class="drop-style">
                                                        <label class="mb-0"><?php echo $bis['business_name']; ?></label>
                                                    </div>
                                                    <?php } } ?>
                                                </div>
                                            </div>

                                            <div style="line-height: 14px;">
                                            <?php if($bis['approved']) { ?>
                                                    <span class="extra-small text-success">Verified</span>
                                                    <i class="fa fa-check text-success extra-small"></i>
                                                <?php } else { ?>
                                                    <span class="extra-small text-danger">Not Verified</span>
                                                    <i class="fa fa-exclamation text-danger extra-small"></i>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div style="position: relative; width: 30px;">
                                            <a href="#">
                                                <i class="fa fa-bell bell-style"></i>
                                                <div class="bell-button">3</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Choose Business-->

                    <!--instant-feed, photos, create adds-->
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">                     
                            <div class="card" data-toggle="modal" data-target="#postfeed" style="cursor: pointer;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <div style="width: 25px;" class="mr-2"><img
                                                src="<?php echo base_url(); ?>images/Icons/feed.png" class="img-fluid">
                                        </div>
                                        <div class="font-six text-dark">Instant Feed</div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">                      
                            <div class="card" style="cursor: pointer;">
                                <a href="<?php echo base_url(); ?>users/photos">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <div style="width: 25px;" class="mr-2">
                                            <img src="<?php echo base_url(); ?>images/Icons/photos.png" class="img-fluid">
                                        </div>
                                        <div class="font-six text-dark">Photos</div>
                                    </div>
                                </div>
                                </a>
                            </div>                        
                        </div>

                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                            <div class="card" style="cursor: pointer;">
                                <a href="<?php echo base_url(); ?>users/photos">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <div style="width: 25px;" class="mr-2"><img src="<?php echo base_url(); ?>images/Icons/videos.png" class="img-fluid">
                                        </div>
                                        <div class="font-six text-dark">Videos</div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                            <div class="card" style="cursor: pointer;">
                                <a href="<?php echo base_url(); ?>users/photos">

                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <div style="width: 25px;" class="mr-2"><img src="<?php echo base_url(); ?>images/Icons/create_ad.png" class="img-fluid">
                                        </div>
                                        <div class="font-six text-dark">Create Ad</div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--/instant-feed, photos, create adds-->




                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <!--Stay updated-->
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h5 class="font-weight-bold">Stay Updated</h5>
                                    </div>
                                    <div style="border-bottom: 1px solid rgb(226, 226, 226);" class="pb-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                                <i class="fa fa-calendar mr-2"></i>
                                                <h6 class="font-medium text-primary font-six pb-2" style="cursor: pointer;" data-toggle="modal" data-target="#update-service">Update Service Availability</h6>
                                            </div>
                                            <div style="cursor: pointer;">
                                                <h6 class="font-medium"><a data-toggle="modal" data-target="#update-service" class="text-primary new-btn">New</a>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="update-service" tabindex="-1" role="dialog" aria-labelledby="update-serviceLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document" style="text-align: -webkit-center !important;">
                                                <div class="modal-content" style="width: 60%;">
                                                    <div class="modal-header d-flex">
                                                        <h5 class="modal-title" id="scrollmodalLabel">Update Service Availability</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left mb-2">
                                                        <div>
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <h6 class="text-dark font-medium font-six mb-2">Is your Business open ?
                                                                    </h6>
                                                                    <p class="text-secondary mb-0 font-medium" style="line-height: 20px;">
                                                                        Your business is operating in some way — even if you're only taking phone calls</p>
                                                                </div>
                                                                <div class="ml-3">
                                                                    <label class="switch">
                                                                        <input type="checkbox" onclick="activate_business_open(<?php echo $business_registry_id; ?>);"
                                                                            <?php if($businessDetails['business_open']) { echo 'checked'; } ?>>
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <div>
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <h6 class="text-dark font-medium font-six mb-2">Any offer Available ?
                                                                    </h6>
                                                                    <p class="text-secondary mb-0 font-medium" style="line-height: 20px;">
                                                                        Your business is operating in some way — even if you're only taking phone calls</p>
                                                                </div>
                                                                <div class="ml-3">
                                                                    <label class="switch">
                                                                        <input type="checkbox" onclick="offer_availability(<?php echo $business_registry_id; ?>);"
                                                                        <?php if($businessDetails['offer_available']) { echo 'checked'; } ?>>
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Done</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div style="border-bottom: 1px solid rgb(226, 226, 226);" class="pb-2 pt-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                                <i class="fa fa-clock-o mr-2"></i>
                                                <h6 class="font-medium text-primary font-six pb-2" style="cursor: pointer;" data-toggle="modal" data-target="#update-timming">Update Your Timming</h6>

                                            </div>
                                            <!--New button-->
                                            <!--<div>
                                                <h6 class="font-medium"><a href="#" class="text-primary new-btn">New</a></h6>
                                            </div>-->
                                            <!--/New button-->
                                            <div class="modal fade" id="update-timming" tabindex="-1" role="dialog" aria-labelledby="update-timmingLabel" aria-hidden="true">
                                            <?php $businessTiming = $this->Business_model->show_businessTiming($business_registry_id); ?>

                                                <div class="modal-dialog modal-lg" role="document" style="text-align: -webkit-center !important;">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex">
                                                            <h5 class="modal-title" id="scrollmodalLabel">Update timming</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left mb-2">
                                                            <!-- <?php //if($businessTiming) { foreach($businessTiming as $bisTime) { ?>
                                                            <div>
                                                                <div class="d-flex">
                                                                    <div style="width:11%;">
                                                                        <span class="font-six font-medium"><?php //echo $bisTime['day']; ?></span>
                                                                    </div>
                                                                    <div class="ml-3">
                                                                        <label class="switch mb-0" style="vertical-align: middle;">
                                                                            <input type="checkbox" onchange="business_timingEntry(<?php //echo $bisTime['bisTiming_id']; ?>);" id="business-open-slide-<?php echo $bisTime['bisTiming_id']; ?>" <?php if($bisTime['status'] == 1) { echo ' value="1" checked'; } else { echo ' value="0"'; } ?>>
                                                                            <span class="slider round"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div style="width: 9%;">
                                                                        <span class="font-medium ml-3" id="business-day-status-<?php //echo $bisTime['bisTiming_id']; ?>">
                                                                            <?php// if($bisTime['status'] == 1) {
                                                                                    // echo 'Open';
                                                                                    //} else {
                                                                                        //echo 'Closed';
                                                                                    //} ?>

                                                                        </span>
                                                                    </div>
                                                                    <?php //if($bisTime['status'] == 1) { ?>

                                                                    <input type="time" value="09:00" class="inp-des text-dark show-time-class-<?php// echo $bisTime['bisTiming_id']; ?>">

                                                                    <div class="ml-3 show-time-class-<?php// echo $bisTime['bisTiming_id']; ?>">
                                                                        <div
                                                                            style="background-color: rgb(112, 112, 112); width: 15px; height: 2px; margin-top: 12px;">
                                                                        </div>
                                                                    </div>

                                                                    <input type="time" value="17:00" class="inp-des text-dark ml-3 show-time-class-<?php //echo $bisTime['bisTiming_id']; ?>">
                                                                    <?php //} else {?>

                                                                    <input type="time" value="09:00" class="inp-des text-dark show-time-class-<?php //echo $bisTime['bisTiming_id']; ?>" style="display:none">

                                                                    <div class="ml-3 show-time-class-<?php //echo $bisTime['bisTiming_id']; ?>" style="display:none">
                                                                        <div
                                                                            style="background-color: rgb(112, 112, 112); width: 15px; height: 2px; margin-top: 12px;">
                                                                        </div>
                                                                    </div>

                                                                    <input type="time" value="17:00" class="inp-des text-dark ml-3 show-time-class-<?php //echo $bisTime['bisTiming_id']; ?>" style="display:none">
                                                                    <?php //} ?>

                                                                    </div>
                                                                    </div>
                                                                    <?php //} } else { echo 'No timing found'; } ?>


                                                                </div>
                                                            </div> -->
                                                            <?php if($businessTiming) { foreach($businessTiming as $bisTime) { ?>

                                                            <div class="mt-4">
                                                                <div class="d-flex">
                                                                    <div style="width:11%;">
                                                                        <span class="font-six font-medium"><?php echo $bisTime['day']; ?></span>
                                                                    </div>
                                                                    <div class="ml-3">
                                                                        <label class="switch mb-0" style="vertical-align: middle;">
                                                                            <input type="checkbox" onchange="business_timingEntry(<?php echo $bisTime['bisTiming_id']; ?>);" id="business-open-slide-<?php echo $bisTime['bisTiming_id']; ?>" <?php if($bisTime['status'] == 1) { echo ' value="1" checked'; } else { echo ' value="0"'; } ?>>
                                                                            <span class="slider round"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div style="width: 9%;">
                                                                    <?php if($bisTime['status'] == 1) {
                                                                                        echo 'Open';
                                                                                    } else {
                                                                                        echo 'Closed';
                                                                                    } ?>
                                                                    </div>
                                                                    <?php if($bisTime['status'] == 1) { ?>

                                                                    <input type="time" value="09:00" class="inp-des text-dark show-time-class-<?php echo $bisTime['bisTiming_id']; ?>">

                                                                    <div class="ml-3 show-time-class-<?php echo $bisTime['bisTiming_id']; ?>">
                                                                        <div
                                                                            style="background-color: rgb(112, 112, 112); width: 15px; height: 2px; margin-top: 12px;">
                                                                        </div>
                                                                    </div>

                                                                    <input type="time" value="17:00" class="inp-des text-dark ml-3 show-time-class-<?php echo $bisTime['bisTiming_id']; ?>">
                                                                    <?php } else {?>

                                                                    <input type="time" value="09:00" class="inp-des text-dark show-time-class-<?php echo $bisTime['bisTiming_id']; ?>" style="display:none">

                                                                    <div class="ml-3 show-time-class-<?php echo $bisTime['bisTiming_id']; ?>" style="display:none">
                                                                        <div
                                                                            style="background-color: rgb(112, 112, 112); width: 15px; height: 2px; margin-top: 12px;">
                                                                        </div>
                                                                    </div>

                                                                    <input type="time" value="17:00" class="inp-des text-dark ml-3 show-time-class-<?php echo $bisTime['bisTiming_id']; ?>" style="display:none">
                                                                    <?php } ?>

                                                                    </div>
                                                                    </div>
                                                                    <?php } } else { echo 'No timing found'; } ?>

                                                                    <!--<input type="text" placeholder="09:00 AM" class="inp-des text-dark">

                                                                    <div class="ml-3">
                                                                        <div style="background-color: rgb(112, 112, 112); width: 15px; height: 2px; margin-top: 12px;">
                                                                        </div>
                                                                    </div>

                                                                    <input type="text" placeholder="05:00 PM" class="inp-des text-dark ml-3">

                                                                    <div class="ml-3">
                                                                        <a href="#" class="text-primary font-medium font-six">Add Hours</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="d-flex">
                                                                    <div style="width:11%;">
                                                                        <span class="font-six font-medium">Tuesday</span>
                                                                    </div>
                                                                    <div class="ml-3">
                                                                        <label class="switch mb-0" style="vertical-align: middle;">
                                                                            <input type="checkbox" checked>
                                                                            <span class="slider round"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div style="width: 9%;">
                                                                        <span class="font-medium ml-3">Open</span>
                                                                    </div>

                                                                    <input type="text" placeholder="09:00 AM" class="inp-des text-dark">

                                                                    <div class="ml-3">
                                                                        <div style="background-color: rgb(112, 112, 112); width: 15px; height: 2px; margin-top: 12px;">
                                                                        </div>
                                                                    </div>

                                                                    <input type="text" placeholder="05:00 PM" class="inp-des text-dark ml-3">

                                                                    <div class="ml-3">
                                                                        <a href="#" class="text-primary font-medium font-six">Add Hours</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="d-flex">
                                                                    <div style="width:11%;">
                                                                        <span class="font-six font-medium">Wednesday</span>
                                                                    </div>
                                                                    <div class="ml-3">
                                                                        <label class="switch mb-0" style="vertical-align: middle;">
                                                                            <input type="checkbox" checked>
                                                                            <span class="slider round"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div style="width: 9%;">
                                                                        <span class="font-medium ml-3">Open</span>
                                                                    </div>

                                                                    <input type="text" placeholder="09:00 AM" class="inp-des text-dark">

                                                                    <div class="ml-3">
                                                                        <div style="background-color: rgb(112, 112, 112); width: 15px; height: 2px; margin-top: 12px;">
                                                                        </div>
                                                                    </div>

                                                                    <input type="text" placeholder="05:00 PM" class="inp-des text-dark ml-3">

                                                                    <div class="ml-3">
                                                                        <a href="#" class="text-primary font-medium font-six">Add Hours</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="d-flex">
                                                                    <div style="width:11%;">
                                                                        <span class="font-six font-medium">Thursday</span>
                                                                    </div>
                                                                    <div class="ml-3">
                                                                        <label class="switch mb-0" style="vertical-align: middle;">
                                                                            <input type="checkbox" checked>
                                                                            <span class="slider round"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div style="width: 9%;">
                                                                        <span class="font-medium ml-3">Open</span>
                                                                    </div>

                                                                    <input type="text" placeholder="09:00 AM" class="inp-des text-dark">

                                                                    <div class="ml-3">
                                                                        <div style="background-color: rgb(112, 112, 112); width: 15px; height: 2px; margin-top: 12px;">
                                                                        </div>
                                                                    </div>

                                                                    <input type="text" placeholder="05:00 PM" class="inp-des text-dark ml-3">

                                                                    <div class="ml-3">
                                                                        <a href="#" class="text-primary font-medium font-six">Add Hours</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="d-flex">
                                                                    <div style="width:11%;">
                                                                        <span class="font-six font-medium">Friday</span>
                                                                    </div>
                                                                    <div class="ml-3">
                                                                        <label class="switch mb-0" style="vertical-align: middle;">
                                                                            <input type="checkbox" checked>
                                                                            <span class="slider round"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div style="width: 9%;">
                                                                        <span class="font-medium ml-3">Open</span>
                                                                    </div>

                                                                    <input type="text" placeholder="09:00 AM" class="inp-des text-dark">

                                                                    <div class="ml-3">
                                                                        <div style="background-color: rgb(112, 112, 112); width: 15px; height: 2px; margin-top: 12px;">
                                                                        </div>
                                                                    </div>

                                                                    <input type="text" placeholder="05:00 PM" class="inp-des text-dark ml-3">

                                                                    <div class="ml-3">
                                                                        <a href="#" class="text-primary font-medium font-six">Add Hours</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="d-flex">
                                                                    <div style="width:11%;">
                                                                        <span class="font-six font-medium">Saturday</span>
                                                                    </div>
                                                                    <div class="ml-3">
                                                                        <label class="switch mb-0" style="vertical-align: middle;">
                                                                            <input type="checkbox" checked>
                                                                            <span class="slider round"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div style="width: 9%;">
                                                                        <span class="font-medium ml-3">Open</span>
                                                                    </div>

                                                                    <input type="text" placeholder="09:00 AM" class="inp-des text-dark">

                                                                    <div class="ml-3">
                                                                        <div style="background-color: rgb(112, 112, 112); width: 15px; height: 2px; margin-top: 12px;">
                                                                        </div>
                                                                    </div>

                                                                    <input type="text" placeholder="05:00 PM" class="inp-des text-dark ml-3">

                                                                    <div class="ml-3">
                                                                        <a href="#" class="text-primary font-medium font-six">Add Hours</a>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="text-right">
                                                                <!-- <a href="#" class="text-secondary font-medium">Cancel</a> -->
                                                                <button type="button" class="btn btn-primary font-medium" data-dismiss="modal">Close</button>

                                                                <a href="#" class="text-primary font-medium ml-4 mr-3">Apply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                                <div style="width: 16px;" class="mr-2"><img src="<?php echo base_url(); ?>images/Icons/percent.png" style="vertical-align: super;"></div>
                                                <a class="pb-2">
                                                    <h6 class="font-medium text-primary font-six" style="cursor: pointer;" data-toggle="modal" data-target="#special-offer">Special Offer</h6>
                                                </a>
                                            </div>
                                            <!--New button-->
                                            <!--<div>
                                                                        <h6 class="font-medium"><a href="#" class="text-primary new-btn">New</a></h6>
                                                                    </div>-->
                                            <!--/New button-->
                                            <div class="modal fade" id="special-offer" tabindex="-1" role="dialog" aria-labelledby="special-offerLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document" style="text-align: -webkit-center !important;">
                                                    <div class="modal-content" style="width: 80%;">
                                                        <div class="modal-header d-flex">
                                                            <h5 class="modal-title" id="scrollmodalLabel">Add offer</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="add_newPost" method="post" enctype="multipart/form-data">

                                                            <div class="modal-body text-left mb-2">

                                                                <!--Drag and drop image-->
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="card">
                                                                            <div class="card-body text-center" style="background-color: rgb(235, 245, 253); border: 2px dotted rgb(0, 0, 0); height: 300px;">
                                                                                <div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%);">
                                                                                <label>Select Images: </label>
                                                                                        <input type="file" name="image[]" class="form-control" multiple>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /Drag and drop image-->

                                                                <div class="row">
                                                                    <div class="col-md-12 mb-4">
                                                                        <!-- <label for="select-category" class="label">Select a category</label> -->
                                                                        <select name="select_product" class="style">
                                                                                <option selected disabled>Select a product</option>

                                                                                <?php foreach ($product as $pro){ ?>                                                                                            
                                                                                    <option value="<?php  echo $pro['deals_id'];?>"><?php  echo $pro['deals_name'];?></option>
                                                                                <?php } ?>

                                                                            </select>
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <div class="set-ck-sty">
                                                                            <textarea name="offer_name" id="title-pd" placeholder="Offer Title"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">

                                                                        <div class="row">
                                                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                                                <div class="d-flex">
                                                                                    <div style="width: 100%;">
                                                                                        <!-- <label for="start-date" class="label">Start
                                                                                            Date</label> -->
                                                                                        <input type="date" name="start_date" class="style">
                                                                                    </div>
                                                                                    <div class="ml-1">
                                                                                    <input type="time" name="start_time" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-4 mt-lg-0 mt-md-0 mt-xl-0">
                                                                                <div class="d-flex">
                                                                                    <div style="width: 100%;">
                                                                                        <!-- <label for="end-date" class="label">End Date</label> -->
                                                                                        <input type="date" name="end_date" class="style">
                                                                                    </div>
                                                                                    <div class="ml-1">
                                                                                    <input type="time" name="end_time" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <div class="set-ck-sty">
                                                                            <textarea id="off-detail" name="offerdetails" placeholder="Offer Detail"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <div>
                                                                            <label for="coupon-code" class="label">Coupon code</label>
                                                                            <input type="text" name="coupon_code" class="style">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <div>
                                                                            <label for="reedem" class="label">Link to reedem</label>
                                                                            <input type="text" name="reedem" class="style">
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="col-md-12">
                                                                        <div class="set-ck-sty">
                                                                            <textarea id="term-c" name="t-c" placeholder="Terms & Conditions"></textarea>
                                                                        </div>
                                                                    </div> -->
                                                                </div>

                                                            </div>
                                                            <!-- </div>                 -->
                                                            <!-- </div> -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary font-medium">Done</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Stay updated-->

                            <!--Get more Reviews-->
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h5 class="font-weight-bold">Get more reviews</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 col-sm-8 col-md-8">
                                            <span class="font-medium">Share Profit & get new Reviews</span>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 text-center">
                                            <img src="<?php echo base_url(); ?>images/Icons/reviews.png" class="img-fluid" style="width: 70px;">
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-outline-primary mb-1 mt-2 font-medium font-six" data-toggle="modal" data-target="#review">Share
                                        review form</button>


                                    <div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="reviewLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document" style="text-align: -webkit-center !important;">
                                            <div class="modal-content" style="width: 80%;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left mb-2">
                                                    <h3 class="text-center font-large font-six mb-2">Request Reviews</h3>
                                                    <h5 class="text-center font-medium text-secondary">Keep your customers engage for better rich
                                                    </h5>

                                                    <div class="card mb-0" style="-webkit-box-shadow: none; box-shadow: none;">
                                                        <div class="card-body">
                                                            <div class="custom-tab">

                                                                <nav>
                                                                    <div class="nav nav-tabs text-center" id="nav-tab" role="tablist">
                                                                        <a class="nav-item nav-link active" id="custom-nav-consumer-tab" data-toggle="tab" href="#custom-nav-consumer" role="tab" aria-controls="custom-nav-consumer" aria-selected="true" style="width: calc(100% /2); font-size: 16px;">to your
                                                                            consumers</a>
                                                                        <a class="nav-item nav-link" id="custom-nav-new-feed-tab" data-toggle="tab" href="#custom-nav-new-feed" role="tab" aria-controls="custom-nav-new-feed" aria-selected="false" style="width: calc(100% /2); font-size: 16px;">share</a>
                                                                    </div>
                                                                </nav>
                                                                <div class="tab-content pt-3" id="nav-tabContent">
                                                                    <div class="tab-pane fade show active" id="custom-nav-consumer" role="tabpanel" aria-labelledby="custom-nav-consumer-tab">
                                                                        <span class="text-center font-large font-six">Send your consumers a
                                                                            notification</span>
                                                                        <button class="btn btn-sm btn-success">Send</button>
                                                                    </div>

                                                                    <div class="tab-pane fade" id="custom-nav-new-feed" role="tabpanel" aria-labelledby="custom-nav-new-feed-tab">
                                                                        <form method="post">
                                                                            <div class="row">
                                                                                <div class="col-12 mb-3">
                                                                                    <div style="position: relative;">
                                                                                        <label for="video-link" class="cs-vdo-link text-primary">Share
                                                                                            link</label>
                                                                                        <input type="text" name="video-link" id="copy-link" class="cu-text-vdo-link" value="https://youtu.be/neV3EPgvZ3g" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="d-flex social-container" style="cursor: pointer;">
                                                                                <div><img src="<?php echo base_url(); ?>images/facebook.png" class="social-img">
                                                                                </div>
                                                                                <div class="font-medium font-six ml-1">Facebook</div>
                                                                            </div>
                                                                            <div class="d-flex social-container ml-3" style="cursor: pointer;">
                                                                                <div><img src="<?php echo base_url(); ?>images/whatsapp.png" class="social-img">
                                                                                </div>
                                                                                <div class="font-medium font-six ml-1">Whatsapp</div>
                                                                            </div>
                                                                            <div class="d-flex social-container ml-3" style="cursor: pointer;" onclick="copyLink()">
                                                                                <div><i class="fa fa-clone"></i></div>
                                                                                <div class="font-medium font-six ml-1">Copy link</div>
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
                            <!-- /Get more Reviews-->

                            <!--complete profile-->
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h5 class="font-weight-bold">Complete your Business Profile</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                                            <h5 class="font-medium font-six" style="line-height: 20px; color: rgb(61, 61, 61);">Improve your local search ranking and help your customers with a complete profile</h5>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-center">
                                            <div>
                                                <canvas id="doughutChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /complete profile-->

                        </div>


                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">

                            <!--Performance-->
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h5 class="font-weight-bold">Performance</h5>
                                    </div>
                                    <div>
                                        <div class="custom-tab">

                                            <nav>
                                                <div class="nav nav-tabs d-flex justify-content-between" id="nav-tab" role="tablist">

                                                    <a class="nav-item nav-link text-center active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true" style="width: calc(100% /3);">
                                                        <div>views</div>
                                                        <div style="font-size: 18px;">75</div>
                                                    </a>
                                                    <a class="nav-item nav-link text-center" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false" style="width: calc(100% /3);">
                                                        <div>Searches</div>
                                                        <div style="font-size: 18px;">50</div>
                                                    </a>
                                                    <a class="nav-item nav-link text-center" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false" style="width: calc(100% /3);">
                                                        <div>Activity</div>
                                                        <div style="font-size: 18px;">62</div>
                                                    </a>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                    <div class="d-flex justify-content-between pb-3 pt-3" style="border-bottom: 1px solid rgb(226, 226, 226);">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">Search
                                                                Views</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">75</span>
                                                                <!--<span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span><i class="fa fa-caret-down text-danger mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span class="text-success" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                                <span class="text-danger" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between pt-3 pb-3">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">Ad
                                                                Views</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">60</span>
                                                                <span><i class="fa fa-caret-up text-success mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span><i class="fa fa-caret-down text-danger mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span class="text-success" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                                <!--<span class="text-danger" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                    <div class="d-flex justify-content-between pb-3 pt-3" style="border-bottom: 1px solid rgb(226, 226, 226);">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">Direct
                                                                Search</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">50</span>
                                                                <!--<span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span><i class="fa fa-caret-down text-danger mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span class="text-success" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                                <span class="text-danger" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between pt-3 pb-3">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">Feed</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">42</span>
                                                                <span><i class="fa fa-caret-up text-success mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span><i class="fa fa-caret-down text-danger mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span class="text-success" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                                <!--<span class="text-danger" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab" style="max-height: 116px; overflow-y: scroll;">
                                                    <div class="d-flex justify-content-between pb-3 pt-3" style="border-bottom: 1px solid rgb(226, 226, 226);">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">Website
                                                                Click</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">75</span>
                                                                <!--<span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span><i class="fa fa-caret-down text-danger mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span class="text-success" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                                <span class="text-danger" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between pt-3 pb-3" style="border-bottom: 1px solid rgb(226, 226, 226);">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">Calls</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">60</span>
                                                                <span><i class="fa fa-caret-up text-success mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span><i class="fa fa-caret-down text-danger mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span class="text-success" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                                <!--<span class="text-danger" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between pb-3 pt-3" style="border-bottom: 1px solid rgb(226, 226, 226);">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">Photo
                                                                Views</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">75</span>
                                                                <!--<span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span><i class="fa fa-caret-down text-danger mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span class="text-success" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                                <span class="text-danger" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between pt-3 pb-3" style="border-bottom: 1px solid rgb(226, 226, 226);">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">Orders</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">60</span>
                                                                <span><i class="fa fa-caret-up text-success mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span><i class="fa fa-caret-down text-danger mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span class="text-success" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                                <!--<span class="text-danger" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between pb-3 pt-3" style="border-bottom: 1px solid rgb(226, 226, 226);">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">Request</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">75</span>
                                                                <!--<span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span><i class="fa fa-caret-down text-danger mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span class="text-success" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                                <span class="text-danger" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between pt-3 pb-3" style="border-bottom: 1px solid rgb(226, 226, 226);">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">Enquiry</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">60</span>
                                                                <span><i class="fa fa-caret-up text-success mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span><i class="fa fa-caret-down text-danger mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span class="text-success" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                                <!--<span class="text-danger" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between pb-3 pt-3">
                                                        <div>
                                                            <span class="font-six font-medium" style="color: rgb(61, 61, 61);">App</span>
                                                        </div>
                                                        <div style="margin-top: -4px;">
                                                            <p class="mb-0">
                                                                <span class="mr-1" style="font-size: 22px; vertical-align: middle;">75</span>
                                                                <!--<span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: -webkit-baseline-middle;"></i></span>-->
                                                                <span><i class="fa fa-caret-down text-danger mr-1"
                                                                        style="vertical-align: -webkit-baseline-middle;"></i></span>
                                                                <!--<span class="text-success" style="font-size: 14px; vertical-align: sub;">( 21&#37; )</span>-->
                                                                <span class="text-danger" style="font-size: 14px; vertical-align: sub;">(
                                                                    21&#37;
                                                                    )</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                            over the past 28 days</span>
                                    </div>
                                    <a href="<?php echo base_url(); ?>users/insight" class="btn btn-primary btn-sm mt-3 font-medium font-six">See more</a>
                                </div>
                            </div>
                            <!-- /Performance-->

                            <!--Latest reviews-->
                            <?php
                                $r5=$r4=$r3=$r2=$r1=$count=$rating_sum=0;
                                foreach($businessReview as $review) {
                                    switch ($review['rating']) {
                                        case 5:
                                            $r5++;
                                            $rating_sum += 5;
                                            break;
                                        case 4:
                                            $r4++;
                                            $rating_sum += 4;
                                            break;
                                        case 3:
                                            $r3++;
                                            $rating_sum += 3;
                                            break;
                                        case 2:
                                            $r2++;
                                            $rating_sum += 2;
                                            break;
                                        case 1:
                                            $r1++;
                                            $rating_sum += 1;
                                            break;
                                    }
                                    $count++;
                                }
                                $avg_rating = $rating_sum / $count;
                            ?>

                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <a href="<?php echo base_url(); ?>users/review">
                                        <h5 class="font-weight-bold">Latest reviews</h5></a>
                                    </div>
                                    <div class="row">
                                        <div class="col-9 col-sm-9 col-md-9 col-lg-9 pr-0">
                                            <div class="row">
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 pr-0">
                                                    <div class="font-medium font-six">5</div>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 pl-0 pr-0 mar-le-star">
                                                    <div class="extra-small"><i class="fa fa-star" style="vertical-align: bottom; color: rgb(161, 161, 161);"></i></div>
                                                </div>
                                                <div class="col-10 col-sm-10 col-md-10 col-lg-10 pl-0 pr-2 mar-le-bar">
                                                    <div class="progress" style="height: 7px; margin-top: 10px;">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo(round(($r5*100/$count),2)); ?>%;" aria-valuenow="<?php echo(round(($r5*100/$count),2)); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 pr-0">
                                                    <div class="font-medium font-six">4</div>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 pl-0 pr-0 mar-le-star">
                                                    <div class="extra-small"><i class="fa fa-star" style="vertical-align: bottom; color: rgb(161, 161, 161);"></i></div>
                                                </div>
                                                <div class="col-10 col-sm-10 col-md-10 col-lg-10 pl-0 pr-2 mar-le-bar">
                                                    <div class="progress" style="height: 7px; margin-top: 10px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo(round(($r4*100/$count),2)); ?>%;" aria-valuenow="<?php echo(round(($r4*100/$count),2)); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 pr-0">
                                                    <div class="font-medium font-six">3</div>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 pl-0 pr-0 mar-le-star">
                                                    <div class="extra-small"><i class="fa fa-star" style="vertical-align: bottom; color: rgb(161, 161, 161);"></i></div>
                                                </div>
                                                <div class="col-10 col-sm-10 col-md-10 col-lg-10 pl-0 pr-2 mar-le-bar">
                                                    <div class="progress" style="height: 7px; margin-top: 10px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo(round(($r3*100/$count),2)); ?>%;" aria-valuenow="<?php echo(round(($r3*100/$count),2)); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 pr-0">
                                                    <div class="font-medium font-six">2</div>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 pl-0 pr-0 mar-le-star">
                                                    <div class="extra-small"><i class="fa fa-star" style="vertical-align: bottom; color: rgb(161, 161, 161);"></i></div>
                                                </div>
                                                <div class="col-10 col-sm-10 col-md-10 col-lg-10 pl-0 pr-2 mar-le-bar">
                                                    <div class="progress" style="height: 7px; margin-top: 10px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo(round(($r2*100/$count),2)); ?>%;" aria-valuenow="<?php echo(round(($r2*100/$count),2)); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 pr-0">
                                                    <div class="font-medium font-six">1</div>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 pl-0 pr-0 mar-le-star">
                                                    <div class="extra-small"><i class="fa fa-star" style="vertical-align: bottom; color: rgb(161, 161, 161);"></i></div>
                                                </div>
                                                <div class="col-10 col-sm-10 col-md-10 col-lg-10 pl-0 pr-2 mar-le-bar">
                                                    <div class="progress" style="height: 7px; margin-top: 10px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo(round(($r1*100/$count),2)); ?>%;" aria-valuenow="<?php echo(round(($r1*100/$count),2)); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 text-center">
                                            <div class="mt-2">
                                            <h1 class="font-six"><?php echo(round($avg_rating,2)); ?></h1>
                                            </div>
                                            <div class="mt-1">
                                            <?php for($i=0;$i<floor(round($avg_rating,2));$i++) {?>
                                                    <i class="fa fa-star text-warning font-medium"></i>
                                                <?php } ?>
                                                <?php if(round($avg_rating,2)- floor(round($avg_rating,2)) > 0) { ?>
                                                    <i class="fa fa-star-half text-warning"></i>
                                                    <?php for($j=0;$j<(4-round($avg_rating,2));$j++) {?>
                                                        <i class="fa fa-star font-medium" style="color: rgb(206, 206, 206);"></i>
                                                    <?php } ?>
                                                <?php } else {?>
                                                <?php for($j=0;$j<(5-floor(round($avg_rating,2)));$j++) {?>
                                                    <i class="fa fa-star font-medium" style="color: rgb(206, 206, 206);"></i>
                                                <?php } }?>
                                            </div>
                                            <div>
                                                <h5 class="extra-small font-six"><?php echo count($businessReview); ?> Reviews</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Latest reviews-->

                            <!--Role Management-->
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h5 class="font-weight-bold" style="font-size: 18px;">Role Management</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 col-sm-8 col-md-8">
                                            <span class="font-medium">Invite user to manage your business profile</span>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 text-center">
                                            <img src="<?php echo base_url(); ?>images/Icons/reviews.png" class="img-fluid" style="width: 70px;">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary mb-1 mt-2 font-medium font-six" data-toggle="modal" data-target="#role-mg" style="width: 30%;">Invite
                                    </button>

                                    <div class="modal fade" id="role-mg" tabindex="-1" role="dialog" aria-labelledby="role-mgLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document" style="text-align: -webkit-center !important;">
                                            <div class="modal-content" style="width: 80%;">
                                                <div class="modal-header d-flex">
                                                    <h5 class="modal-title" id="scrollmodalLabel">Role Management</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <h5 class="font-six">Manage Users</h5>
                                                        <button class="btn btn-sm btn-primary font-medium font-six">Add Employee</button>
                                                    </div>
                                                    <div class="d-flex mb-4">
                                                    <?php 
                                                            $owner = $this->User_model->show_user($this->session->userdata('user_id')); 
                                                            $employees = $this->Business_model->show_business_employee($business_registry_id); 
                                                        ?>

                                                        <div>
                                                            <img src="<?php echo $owner['profile_picture']; ?>" style="width: 45px; height: 45px; border-radius: 50%;">
                                                        </div>
                                                        <div class="ml-3" style="width: 45%;">
                                                            <h5 style="margin-top: 13px;"><?php echo $owner['first_name'].' '.$owner['last_name']; ?></h5>
                                                        </div>
                                                        <div style="width: 25%;">
                                                            <h6 class="font-medium text-secondary" style="margin-top: 15px;">Primary Owner
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <!--for employee-->
                                                    <?php if($employees != NULL) { 
                                                        $count = 2;
                                                        foreach($employees as $emp) { ?>

                                                    <div class="d-flex mb-4">
                                                        <div>
                                                            <img src="<?php echo $emp['profile_picture']; ?>" style="width: 45px; height: 45px; border-radius: 50%;">
                                                        </div>
                                                        <div class="ml-3" style="width: 45%;">
                                                            <h5 style="margin-top: 13px;"><?php echo $emp['first_name'].' '.$emp['last_name']; ?></h5>
                                                        </div>
                                                        <div style="width: 25%;">
                                                            <h6 class="font-medium" style="margin-top: 15px;"><?php echo $emp['role']; ?></h6>
                                                        </div>
                                                        <div class="text-center">
                                                            <!-- <div class="dropdown" style="margin-top: 5px;"> -->

                                                                <!-- <i class="fa fa-caret-down" style="font-size: 18px; padding: 10px; cursor: pointer;" id="user1" data-toggle="dropdown"></i> -->

                                                                <!-- <div class="dropdown-menu" aria-labelledby="user1" style="margin-top: 30px !important; margin-left: -120px;"> -->
                                                                    
                                                                <div style="width: 20%;">
                                                                    <select class="form-control font-medium">
                                                                        <option value="Primary Owner<">Primary Owner</option>
                                                                        <option value="Owner">Owner</option>
                                                                        <option value="Manager">Manager</option>
                                                                    </select>
                                                                </div>
                                                            <!-- </div> -->
                                                        </div>
                                                        <div class="ml-4">
                                                            <i class="fa fa-times" style="font-size: 18px; margin-top: 5px; padding: 8px; cursor: pointer;"></i>
                                                        </div>
                                                        <?php $count++; } } else { ?>
                                                        <div class="d-flex mb-4">
                                                            <div>
                                                                <span class="text-center">No employees yet.</span>
                                                            </div>
                                                        </div>
                                                        <?php } ?>   

                                                    </div>
                                                    <!-- <div class="d-flex mb-4">
                                                        <div>
                                                            <img src="images/avatar/3.jpg" style="width: 45px; height: 45px; border-radius: 50%;">
                                                        </div>
                                                        <div class="ml-3" style="width: 45%;">
                                                            <h5 style="margin-top: 13px;">Abhimanyu Rajput</h5>
                                                        </div>
                                                        <div style="width: 25%;">
                                                            <h6 class="font-medium" style="margin-top: 15px;">Owner</h6>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="dropdown" style="margin-top: 5px;">

                                                                <i class="fa fa-caret-down" style="font-size: 18px; padding: 10px; cursor: pointer;" id="user1" data-toggle="dropdown"></i>

                                                                <div class="dropdown-menu" aria-labelledby="user1" style="margin-top: 30px !important; margin-left: -120px;">
                                                                    <button class="dropdown-item" type="button">Primary Owner</button>
                                                                    <button class="dropdown-item" type="button">Owner</button>
                                                                    <button class="dropdown-item" type="button">Manager</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-4">
                                                            <i class="fa fa-times" style="font-size: 18px; margin-top: 5px; padding: 8px; cursor: pointer;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-4">
                                                        <div>
                                                            <img src="images/avatar/3.jpg" style="width: 45px; height: 45px; border-radius: 50%;">
                                                        </div>
                                                        <div class="ml-3" style="width: 45%;">
                                                            <h5 style="margin-top: 13px;">Abhimanyu roy</h5>
                                                        </div>
                                                        <div style="width: 25%;">
                                                            <h6 class="font-medium" style="margin-top: 15px;">Manager</h6>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="dropdown" style="margin-top: 5px;">

                                                                <i class="fa fa-caret-down" style="font-size: 18px; padding: 10px; cursor: pointer;" id="user1" data-toggle="dropdown"></i>

                                                                <div class="dropdown-menu" aria-labelledby="user1" style="margin-top: 30px !important; margin-left: -120px;">
                                                                    <button class="dropdown-item" type="button">Primary Owner</button>
                                                                    <button class="dropdown-item" type="button">Owner</button>
                                                                    <button class="dropdown-item" type="button">Manager</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-4">
                                                            <i class="fa fa-times" style="font-size: 18px; margin-top: 5px; padding: 8px; cursor: pointer;"></i>
                                                        </div> -->
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                                <div class="modal-footer">
                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Done</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                    </div>                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Role Management-->

                        </div>
                    </div>

                    <!--Appointment Request-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Appointment Request</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table-appointment" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Time Slot</th>
                                                <th>Phone</th>
                                                <th>Doctor</th>
                                                <th>Issue</th>
                                                <th>Accept</th>
                                                <th>Cancel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>10:00 AM - 12:00 PM</td>
                                                <td>9876543216</td>
                                                <td>Dr. S.K.Sarkar</td>
                                                <td>Teeth whitening</td>
                                                <td class="text-center"><a href="#"><i
                                                            class="fa fa-check text-success"></i></a></td>
                                                <td class="text-center">
                                                    <a href="#"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>10:00 AM - 12:00 PM</td>
                                                <td>8907654132</td>
                                                <td>Dr. Sushmita Roy Chowdhury</td>
                                                <td>Fever</td>
                                                <td class="text-center">
                                                    <a href="#"></a>
                                                </td>
                                                <td class="text-center"><a href="#"><i
                                                            class="fa fa-times text-danger"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>12:00 PM - 02:00 PM</td>
                                                <td>7890651243</td>
                                                <td>Dr. Kunal Goswami</td>
                                                <td>Hair transplant</td>
                                                <td class="text-center"><a href="#"><i
                                                            class="fa fa-check text-success"></i></a></td>
                                                <td class="text-center">
                                                    <a href="#"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rhona Davidson</td>
                                                <td>02:00 PM - 06:00 PM</td>
                                                <td>9876912340</td>
                                                <td>Dr. Sonia Agarwal</td>
                                                <td>Eye Checkup</td>
                                                <td class="text-center"><a href="#"><i
                                                            class="fa fa-check text-success"></i></a></td>
                                                <td class="text-center">
                                                    <a href="#"></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Appointment Request-->



                    <!--Product Manage-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <div><strong class="card-title" style="vertical-align: sub; font-size: 18px;">Product Manage</strong></div>
                                        <div class="d-flex">
                                            <div class="pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><strong class="card-title"><a href="#" class="text-dark" data-toggle="modal" data-target="#product" style="vertical-align: sub;"><i
                                                            class="fa fa-plus mr-1 text-success"></i><span class="font-normal">Add New</span></a></strong>
                                            </div>
                                            <!--Add new product modal-->
                                            <div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="productLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex justify-content-between">
                                                            <h5 class="modal-title" id="productLabel">Add new product</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <!--Drag and drop image-->
                                                            <div class="row mb-3">
                                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body text-center" style="background-color: rgb(235, 245, 253); border: 2px dotted rgb(0, 0, 0); height: 300px;">
                                                                            <div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%);">
                                                                                <div>Drop a file here or click the browse</div>
                                                                                <i class="fa fa-cloud-upload" style="font-size: 25px;"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /Drag and drop image-->

                                                            <form method="POST">
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-4">
                                                                        <div>
                                                                            <label for="pd-name" class="label">Product Name</label>
                                                                            <input type="text" name="pd-name" class="style">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">

                                                                        <div class="row">
                                                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                                                <label for="select-category" class="label">Select a category</label>
                                                                                <select name="select-category" class="style">
                                                                                    <option value="cat-1">Category 1</option>
                                                                                    <option value="cat-2">Category 2</option>
                                                                                    <option value="cat-3">Category 3</option>
                                                                                    <option value="cat-4">Category 4</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-4 mt-lg-0 mt-md-0 mt-xl-0">
                                                                                <div>
                                                                                    <label for="pd-price" class="label">Product Price (INR)</label>
                                                                                    <input type="text" name="pd-price" class="style">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <div class="set-ck-sty">
                                                                            <textarea name="desc" id="description" style="padding: 15px; color: #000;" placeholder="Description"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <div class="set-ck-sty">
                                                                            <textarea name="detail" id="detail" style="padding: 15px; color: #000;" placeholder="Detail"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <div class="set-ck-sty">
                                                                            <textarea name="fe-be" id="fe-be" style="padding: 15px; color: #000;" placeholder="Features & Benefits"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Add new product modal-->

                                            <div style="position: relative;">
                                                <a class="navbar-toggler pl-0 pr-0 pb-0 ml-2" data-toggle="collapse" data-target="#product-sort" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                    <button type="button" class="btn text-dark" style="background-color: lavender;">
                                                        <div class="d-flex">
                                                            <h4 class="mb-0 pr-3"><strong class="font-normal">Sort By</strong></h4>
                                                            <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                style="color: grey; font-size: small; margin-top: auto;"></i>
                                                        </div>
                                                    </button>
                                                </a>
                                                <div class="collapse cnf-nav-dpdown" id="product-sort" style="max-height: 345px;">
                                                    <div class="drop-style">
                                                        <label class="mb-0">1 Week</label>
                                                    </div>
                                                    <div class="drop-style">
                                                        <label class="mb-0">1 Month</label>
                                                    </div>
                                                    <div class="drop-style">
                                                        <label class="mb-0">1 Year</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table-product" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Conversion</th>
                                                <th>Feed</th>
                                                <th>Offer</th>
                                                <th>Create Ad</th>
                                                <!-- <th>Offer</th>
                                                <th>Create Ad</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>100</td>
                                                <td>50</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Instant feed</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Add Offer</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Create Ad</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>100</td>
                                                <td>50</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Instant feed</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Add Offer</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Create Ad</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>100</td>
                                                <td>50</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Instant feed</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Add Offer</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Create Ad</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rhona Davidson</td>
                                                <td>100</td>
                                                <td>50</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Instant feed</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Add Offer</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">                                                    
                                                        <span class="font-six">Create Ad</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Manage-->

                    <!--Service Manage-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <div><strong class="mb-0" style="vertical-align: sub; font-size: 18px;">Service Manage</strong></div>
                                        <div class="d-flex">
                                            <div class="pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><strong class="card-title"><a href="#" class="text-dark" style="vertical-align: sub;"><i
                                                            class="fa fa-plus mr-1 text-success"></i><span class="font-normal">Add New</span></a></strong>
                                            </div>
                                            <div style="position: relative;">
                                                <a class="navbar-toggler pl-0 pr-0 pb-0 ml-2" data-toggle="collapse" data-target="#service-sort" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                    <button type="button" class="btn text-dark" style="background-color: lavender;">
                                                        <div class="d-flex">
                                                            <h4 class="mb-0 pr-3"><strong class="font-normal">Sort By</strong></h4>
                                                            <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                style="color: grey; font-size: small; margin-top: auto;"></i>
                                                        </div>
                                                    </button>
                                                </a>
                                                <div class="collapse cnf-nav-dpdown" id="service-sort" style="max-height: 345px;">
                                                    <div class="drop-style">
                                                        <label class="mb-0">1 Week</label>
                                                    </div>
                                                    <div class="drop-style">
                                                        <label class="mb-0">1 Month</label>
                                                    </div>
                                                    <div class="drop-style">
                                                        <label class="mb-0">1 Year</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table-service" class="table table-striped table-bordered nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Service Name</th>
                                                <th>No. of request</th>
                                                <th>Conversion</th>
                                                <th>Feed</th>
                                                <th>Offer</th>
                                                <th>Create Ad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>100</td>
                                                <td>50</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Instant feed</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Add Offer</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Create Ad</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>100</td>
                                                <td>50</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Instant feed</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Add Offer</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Create Ad</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>100</td>
                                                <td>50</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Instant feed</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Add Offer</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Create Ad</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rhona Davidson</td>
                                                <td>100</td>
                                                <td>50</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Instant feed</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Add Offer</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <span class="font-six">Create Ad</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Service Manage-->


                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 pr-md-2 pr-lg-2">
                            <!--Latest feed-->
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <div class="mb-3">
                                        <h5 class="font-weight-bold">Your Latest Feed</h5>
                                    </div>
                                    <div class="img-crd">
                                        <img src="<?php echo base_url(); ?>images/aadc.png" class="img-fluid" style="border-radius: 5px;">
                                    </div>

                                    <div class="mt-2">
                                        <h4 class="font-six" style="font-size: 20px;">The title of post</h4>
                                    </div>
                                    <div class="vi-cli">
                                        <div class="font-six pr-2"><span class="mr-1 font-medium">1,699,109</span><span>Views</span></div>
                                        <div class="font-six"><span class="mr-1 font-medium">1,699</span><span>Clicks</span></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 pr-2">
                                            <button type="button" class="btn btn-primary btn-block font-medium font-six px-2" data-toggle="modal" data-target="#postfeed">Post Feed</button>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 pl-2"><button type="button" onclick="window.location.href='store.html'" class="btn btn-primary btn-block font-medium font-six px-2">See more</button></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Latest feed-->

                            <!--Modal of feed-->
                            <div class="modal fade" id="postfeed" tabindex="-1" role="dialog" aria-labelledby="postfeedLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-between">
                                        <h5 class="modal-title font-large" id="postfeedLabel">Feed</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h3 class="text-center">Keep your customers engage for better rich</h3>                
                                        <div class="card mb-0" style="-webkit-box-shadow: none; box-shadow: none;">
                                            <div class="card-body">
                                                <div class="custom-tab">
                
                                                    <nav>
                                                        <div class="nav nav-tabs text-center" id="nav-tab" role="tablist">
                                                            <a class="nav-item nav-link active" id="custom-nav-instant-feed-tab"
                                                                data-toggle="tab" href="#custom-nav-instant-feed" role="tab"
                                                                aria-controls="custom-nav-instant-feed" aria-selected="true"
                                                                style="width: calc(100% /2); font-size: 16px;">Instant feed</a>
                                                            <a class="nav-item nav-link" id="custom-nav-share-link-tab"
                                                                data-toggle="tab" href="#custom-nav-share-link" role="tab"
                                                                aria-controls="custom-nav-share-link" aria-selected="false"
                                                                style="width: calc(100% /2); font-size: 16px;">New Feed</a>
                                                        </div>
                                                    </nav>
                                                        <div class="tab-content pt-3" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="custom-nav-instant-feed" role="tabpanel" aria-labelledby="custom-nav-instant-feed-tab">
                                                                <div>
                                                                    <div class="input-group">
                                                                        <input type="text" id="input1-group2" name="input1-group2" placeholder="Search your list" class="form-control">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-primary">
                                                                                <i class="fa fa-search"></i> Search
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                                                        <div class="card selected-area">
                                                                            <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png" alt="Card image cap">
                                                                            <div class="p-2">
                                                                                <h4 class="card-title mb-2">Product Title</h4>
                                                                                <h4 class="card-title mb-1">Product Description :</h4>
                                                                                <div style="margin-left: 18px;">
                                                                                    <ul class="mb-2">
                                                                                        <li class="font-medium">Description 1</li>
                                                                                        <li class="font-medium">Description 2</li>
                                                                                        <li class="font-medium">Description 3</li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <i class="fa fa-chevron-circle-right text-success" style="font-size: 35px;"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                                                        <div class="card selected-area">
                                                                            <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png" alt="Card image cap">
                                                                            <div class="p-2">
                                                                                <h4 class="card-title mb-2">Product Title</h4>
                                                                                <h4 class="card-title mb-1">Product Description :</h4>
                                                                                <div style="margin-left: 18px;">
                                                                                    <ul class="mb-2">
                                                                                        <li class="font-medium">Description 1</li>
                                                                                        <li class="font-medium">Description 2</li>
                                                                                        <li class="font-medium">Description 3</li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <i class="fa fa-chevron-circle-right text-success" style="font-size: 35px;"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                                                        <div class="card selected-area">
                                                                            <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png" alt="Card image cap">
                                                                            <div class="p-2">
                                                                                <h4 class="card-title mb-2">Product Title</h4>
                                                                                <h4 class="card-title mb-1">Product Description :</h4>
                                                                                <div style="margin-left: 18px;">
                                                                                    <ul class="mb-2">
                                                                                        <li class="font-medium">Description 1</li>
                                                                                        <li class="font-medium">Description 2</li>
                                                                                        <li class="font-medium">Description 3</li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <i class="fa fa-chevron-circle-right text-success" style="font-size: 35px;"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="custom-nav-share-link" role="tabpanel" aria-labelledby="custom-nav-share-link-tab">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <form action="add_newFeed" method="post" enctype="multipart/form-data">
                                                                
                                                                            <div class="card-body text-center mb-3"
                                                                                style="background-color: rgb(235, 245, 253); border: 2px dotted rgb(0, 0, 0); height: 200px;">
                                                                                <div
                                                                                    style="position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%);">
                                                                                    <div>                                                                                
                                                                                        <label>Select Images: </label>
                                                                                        
                                                                                    </div>
                                                                                    <i class="fa fa-cloud-upload" style="font-size: 25px;"><input type="file" name="image[]" class="form-control" multiple></i>
                                                                                </div>
                                                                            </div>
                    
                                                                            <div class="row">
                                                                                <div class="col-12 mb-3">
                                                                                    <div>

                                                                                        <input type="hidden" name="business_registry_id" value="<?php echo $business_registry_id; ?>">
                                                                                        
                                                                                        <label for="mail" class="label">Paste Video
                                                                                            link</label>
                                                                                        <input type="text" name="video_link" class="style">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                    <div>
                                                                                        <label for="mail" class="label">Product
                                                                                            title</label>
                                                                                        <input type="text" name="title" class="style">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                    <div>
                                                                                        <textarea name="description"
                                                                                            id="post-product-desc"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                    
                                                                            <div class="d-flex justify-content-between">
                                                                                <button type="submit">
                                                                                    <i class="fa fa-chevron-circle-right text-success" style="font-size: 35px;"></i>
                                                                                </button>
                                                                                <a href="<?php echo base_url(); ?>users/post" class="btn btn-outline-success"> Visit Profile</a>
                                                                            </div>
                                                                        
                                                                        </form>
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
                            <!-- /Modal of feed-->
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 px-md-2 px-lg-2">
                            <!--Product Listing-->
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <div class="mb-3">
                                        <h5 class="font-weight-bold">Product Listing</h5>
                                    </div>
                                    <div class="img-crd">
                                        <img src="<?php echo base_url(); ?>images/doc_bg.png" class="img-fluid" style="border-radius: 5px;">
                                    </div>

                                    <div class="mt-2">
                                        <h4 class="font-six" style="font-size: 20px;">The title of product</h4>
                                    </div>
                                    <div class="vi-cli">
                                        <div class="font-six pr-2"><span class="mr-1 font-medium">1,699,109</span><span>Views</span></div>
                                        <div class="font-six"><span class="mr-1 font-medium">1,699</span><span>Clicks</span></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 pr-2"><button type="button" class="btn btn-primary btn-block font-medium bt-alpha font-six px-2" data-toggle="modal" data-target="#product">Add Product</button></div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 pl-2 text-right"><button type="button" onclick="window.location.href='store.html'" class="btn btn-primary btn-block font-medium font-six px-2 bt-beta">Manage</button></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Listing-->
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 px-md-2 px-lg-2">
                            <!--Service Listing-->
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <div class="mb-3">
                                        <h5 class="font-weight-bold">Service Listing</h5>
                                    </div>
                                    <div class="img-crd">
                                        <img src="<?php echo base_url(); ?>images/appointment.png" class="img-fluid" style="border-radius: 5px;">
                                    </div>
                                    <div class="mt-2">
                                        <h4 class="font-six" style="font-size: 20px;">The title of Service</h4>
                                    </div>
                                    <div class="vi-cli">
                                        <div class="font-six pr-2"><span class="mr-1 font-medium">1,699,109</span><span>Views</span></div>
                                        <div class="font-six"><span class="mr-1 font-medium">1,699</span><span>Clicks</span></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 pr-2"><button type="button" class="btn btn-primary btn-block font-medium font-six px-2 bt-alpha" data-toggle="modal" data-target="#staticModal">Add Service</button></div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 pl-2 text-right"><button type="button" onclick="window.location.href='store.html'" class="btn btn-primary btn-block font-medium font-six px-2 bt-beta">Manage</button></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Service Listing-->
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 pl-md-2 pl-lg-2">
                            <!--Check Offer-->
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <div class="mb-3">
                                        <h5 class="font-weight-bold">Check Offer</h5>
                                    </div>
                                    <div class="img-crd">
                                        <img src="<?php echo base_url(); ?>images/medical-5459631_1280.png" class="img-fluid" style="border-radius: 5px;">
                                    </div>

                                    <div class="mt-2">
                                        <h4 class="font-six" style="font-size: 20px;">The offer name</h4>
                                    </div>
                                    <div class="vi-cli">
                                        <div class="font-six pr-2"><span class="mr-1 font-medium">1,699,109</span><span>Views</span></div>
                                        <div class="font-six"><span class="mr-1 font-medium">1,699</span><span>Clicks</span></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 pr-2"><button type="button" class="btn btn-primary btn-block font-medium font-six px-2 bt-alpha" data-toggle="modal" data-target="#special-offer">Add Offer</button></div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 pl-2 text-right"><button type="button" onclick="window.location.href='store.html'" class="btn btn-primary btn-block font-medium font-six px-2 bt-beta-o">Manage</button></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Check Offer-->
                        </div>
                    </div>


                <?php } ?>


            </div>
        </div><!-- .content -->

        <div class="clearfix"></div>

        <?php $this->load->view('page_footer'); ?>


    </div><!-- /#right-panel -->



<?php } }  ?>