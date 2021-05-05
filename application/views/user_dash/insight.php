<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>
<?php 
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
	
?>


    <div class="content">
        <div class="animated fadeIn">                                
            <?php if(!$businesses[0]['approved']) { ?>
        
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
                    <div class="col-6 col-sm-6 col-md-5 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div style="position: relative;">
                                            <a class="navbar-toggler pl-0 pr-0 pb-0" data-toggle="collapse"
                                                data-target="#company-name" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">
                                                <button type="button" class="text-dark"
                                                    style="background-color: #fff; padding-left: 0; margin-left: -2; border: 0;">
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




                <!--  Visit Graph  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;">
                                            <strong>Visits</strong></h4>
                                        <div>
                                            <span class="mr-1" style="font-size: 22px;">190</span>
                                            <span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: middle;"></i></span>                                                    
                                            <!--<span><i class="fa fa-caret-down"></i>--></span><span class="text-success" style="font-size: 14px;">21&#37;</span>                                                
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div style="position: relative;">
                                            <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                data-target="#visit" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">
                                                <button type="button" class="btn text-dark"
                                                    style="background-color: lavender;">
                                                    <div class="d-flex">
                                                        <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                                            style="color: grey; font-size: small; margin-top: auto;"></i>
                                                    </div>
                                                </button>
                                            </a>
                                            <div class="collapse cus-nav-dpdown" id="visit">
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



                                        <i class="fa fa-calendar pl-3 custom-cal"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-8 col-md-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->

                                        <canvas id="visit-chart"></canvas>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="card-body">

                                        <div class="progress-box progress-2 mb-3">


                                        </div>

                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Current Visitors</h4>
                                            <div class="por-txt">3,220 Users (24%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                    style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Previous Visitors</h4>
                                            <div class="por-txt">29,658 Users (60%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Increase Rate</h4>
                                            <div class="por-txt">99,658 Users (90%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                    style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->

                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Visit Graph -->

                <!--  Click Graph  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;"><strong>Click</strong>
                                        </h4>
                                        <div>
                                            <span class="mr-1" style="font-size: 22px;">190</span>
                                            <!--<span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: middle;"></i></span>--><span><i
                                                    class="fa fa-caret-down text-danger mr-1"
                                                    style="vertical-align: middle;"></i></span>
                                            <!--<span class="text-success" style="font-size: 14px;">21&#37;</span>--><span
                                                class="text-danger" style="font-size: 14px;">21&#37;</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div style="position: relative;">
                                            <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                data-target="#click" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">
                                                <button type="button" class="btn text-dark"
                                                    style="background-color: lavender;">
                                                    <div class="d-flex">
                                                        <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                                            style="color: grey; font-size: small; margin-top: auto;"></i>
                                                    </div>
                                                </button>
                                            </a>
                                            <div class="collapse cus-nav-dpdown" id="click">
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



                                        <i class="fa fa-calendar pl-3 custom-cal"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-8 col-md-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->

                                        <canvas id="click-chart"></canvas>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="card-body">

                                        <div class="progress-box progress-2 mb-3">


                                        </div>

                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Current Visitors</h4>
                                            <div class="por-txt">3,220 Users (24%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                    style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Previous Visitors</h4>
                                            <div class="por-txt">29,658 Users (60%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Increase Rate</h4>
                                            <div class="por-txt">99,658 Users (90%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                    style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->

                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Click Graph -->

                <!--Target Graph-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;">
                                            <strong>Target</strong></h4>
                                        <div>
                                            <span class="mr-1" style="font-size: 22px;">190</span>
                                            <!--<span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: middle;"></i></span>--><span><i
                                                    class="fa fa-caret-down text-danger mr-1"
                                                    style="vertical-align: middle;"></i></span>
                                            <!--<span class="text-success" style="font-size: 14px;">21&#37;</span>--><span
                                                class="text-danger" style="font-size: 14px;">21&#37;</span>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div style="position: relative;">
                                            <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                data-target="#target" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">
                                                <button type="button" class="btn text-dark"
                                                    style="background-color: lavender;">
                                                    <div class="d-flex">
                                                        <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                                            style="color: grey; font-size: small; margin-top: auto;"></i>
                                                    </div>
                                                </button>
                                            </a>
                                            <div class="collapse cus-nav-dpdown" id="target">
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



                                        <i class="fa fa-calendar pl-3 custom-cal"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-8 col-md-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->

                                        <canvas id="target-chart"></canvas>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="card-body">

                                        <div class="progress-box progress-2 mb-3">


                                        </div>

                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Current Visitors</h4>
                                            <div class="por-txt">3,220 Users (24%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                    style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Previous Visitors</h4>
                                            <div class="por-txt">29,658 Users (60%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Increase Rate</h4>
                                            <div class="por-txt">99,658 Users (90%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                    style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->

                        </div>
                    </div><!-- /# column -->
                </div>
                <!--/Target Graph-->

                <!--Review-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;">
                                            <strong>Review</strong></h4>
                                        <div>
                                            <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                    class="fa fa-caret-up text-success mr-1"
                                                    style="vertical-align: middle;"></i></span>
                                            <!--<span><i class="fa fa-caret-down text-danger mr-1"  style="vertical-align: middle;"></i></span>--><span
                                                class="text-success" style="font-size: 14px;">21&#37;</span>
                                            <!--<span class="text-danger" style="font-size: 14px;">21&#37;</span>-->

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div style="position: relative;">
                                            <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                data-target="#review" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">
                                                <button type="button" class="btn text-dark"
                                                    style="background-color: lavender;">
                                                    <div class="d-flex">
                                                        <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                                            style="color: grey; font-size: small; margin-top: auto;"></i>
                                                    </div>
                                                </button>
                                            </a>
                                            <div class="collapse cus-nav-dpdown" id="review">
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



                                        <i class="fa fa-calendar pl-3 custom-cal"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-8 col-md-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->

                                        <canvas id="review-chart"></canvas>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="card-body">

                                        <div class="progress-box progress-2 mb-3">


                                        </div>

                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Current Visitors</h4>
                                            <div class="por-txt">3,220 Users (24%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                    style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Previous Visitors</h4>
                                            <div class="por-txt">29,658 Users (60%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Increase Rate</h4>
                                            <div class="por-txt">99,658 Users (90%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                    style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->

                        </div>
                    </div><!-- /# column -->
                </div>
                <!--/Review-->

                <!--Conversion Rate-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;"><strong>Conversion
                                        Rate</strong></h4>
                            </div>
                            <div class="card-body">
                                <!--Conformation-->
                                <div class="">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;">
                                                    <strong>Conformation</strong></h4>
                                                <div>
                                                    <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                            class="fa fa-caret-up text-success mr-1"
                                                            style="vertical-align: middle;"></i></span>
                                                    <!--<span><i class="fa fa-caret-down text-danger mr-1"  style="vertical-align: middle;"></i></span>--><span
                                                        class="text-success" style="font-size: 14px;">21&#37;</span>
                                                    <!--<span class="text-danger" style="font-size: 14px;">21&#37;</span>-->

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div style="position: relative;">
                                                    <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                        data-target="#conformation"
                                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                                        aria-label="Toggle navigation">
                                                        <button type="button" class="btn text-dark"
                                                            style="background-color: lavender;">
                                                            <div class="d-flex">
                                                                <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                                <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                    style="color: grey; font-size: small; margin-top: auto;"></i>
                                                            </div>
                                                        </button>
                                                    </a>
                                                    <div class="collapse cus-nav-dpdown" id="conformation">
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



                                                <i class="fa fa-calendar pl-3 custom-cal"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="card-body">
                                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                                <canvas id="conformation-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="card-body">

                                                <div class="progress-box progress-2 mb-3">


                                                </div>

                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Current Visitors</h4>
                                                    <div class="por-txt">3,220 Users (24%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                            style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Previous Visitors</h4>
                                                    <div class="por-txt">29,658 Users (60%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                            style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Increase Rate</h4>
                                                    <div class="por-txt">99,658 Users (90%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                            style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.card-body -->
                                        </div>
                                    </div> <!-- /.row -->
                                </div>
                                <!--/Conformation-->

                                <!--Cancel Rate-->
                                <div class="mt-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;"><strong>Cancel
                                                        Rate</strong></h4>
                                                <div>
                                                    <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                            class="fa fa-caret-up text-success mr-1"
                                                            style="vertical-align: middle;"></i></span>
                                                    <!--<span><i class="fa fa-caret-down text-danger mr-1"  style="vertical-align: middle;"></i></span>--><span
                                                        class="text-success" style="font-size: 14px;">21&#37;</span>
                                                    <!--<span class="text-danger" style="font-size: 14px;">21&#37;</span>-->

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div style="position: relative;">
                                                    <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                        data-target="#cancel" aria-controls="navbarSupportedContent"
                                                        aria-expanded="false" aria-label="Toggle navigation">
                                                        <button type="button" class="btn text-dark"
                                                            style="background-color: lavender;">
                                                            <div class="d-flex">
                                                                <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                                <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                    style="color: grey; font-size: small; margin-top: auto;"></i>
                                                            </div>
                                                        </button>
                                                    </a>
                                                    <div class="collapse cus-nav-dpdown" id="cancel">
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



                                                <i class="fa fa-calendar pl-3 custom-cal"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="card-body">
                                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                                <canvas id="cancel-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="card-body">

                                                <div class="progress-box progress-2 mb-3">


                                                </div>

                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Current Visitors</h4>
                                                    <div class="por-txt">3,220 Users (24%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                            style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Previous Visitors</h4>
                                                    <div class="por-txt">29,658 Users (60%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                            style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Increase Rate</h4>
                                                    <div class="por-txt">99,658 Users (90%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                            style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.card-body -->
                                        </div>
                                    </div> <!-- /.row -->
                                </div>
                                <!--/Cancel Rate-->
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--/Convention Rate-->

                <!--Peak Timming-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;"><strong>Peak
                                                Timming</strong></h4>
                                        <div>
                                            <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                    class="fa fa-caret-up text-success mr-1"
                                                    style="vertical-align: middle;"></i></span>
                                            <!--<span><i class="fa fa-caret-down text-danger mr-1"  style="vertical-align: middle;"></i></span>--><span
                                                class="text-success" style="font-size: 14px;">21&#37;</span>
                                            <!--<span class="text-danger" style="font-size: 14px;">21&#37;</span>-->

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div style="position: relative;">
                                            <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                data-target="#timming" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">
                                                <button type="button" class="btn text-dark"
                                                    style="background-color: lavender;">
                                                    <div class="d-flex">
                                                        <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                                            style="color: grey; font-size: small; margin-top: auto;"></i>
                                                    </div>
                                                </button>
                                            </a>
                                            <div class="collapse cus-nav-dpdown" id="timming">
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



                                        <i class="fa fa-calendar pl-3 custom-cal"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-8 col-md-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->

                                        <canvas id="timming-chart"></canvas>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="card-body">

                                        <div class="progress-box progress-2 mb-3">


                                        </div>

                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Current Visitors</h4>
                                            <div class="por-txt">3,220 Users (24%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                    style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Previous Visitors</h4>
                                            <div class="por-txt">29,658 Users (60%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Increase Rate</h4>
                                            <div class="por-txt">99,658 Users (90%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                    style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->

                        </div>
                    </div><!-- /# column -->
                </div>
                <!--/Peak Timming-->

                <!--Return Rate-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;"><strong>Return
                                                Rate</strong></h4>
                                        <div>
                                            <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                    class="fa fa-caret-up text-success mr-1"
                                                    style="vertical-align: middle;"></i></span>
                                            <!--<span><i class="fa fa-caret-down text-danger mr-1"  style="vertical-align: middle;"></i></span>--><span
                                                class="text-success" style="font-size: 14px;">21&#37;</span>
                                            <!--<span class="text-danger" style="font-size: 14px;">21&#37;</span>-->

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div style="position: relative;">
                                            <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                data-target="#return" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">
                                                <button type="button" class="btn text-dark"
                                                    style="background-color: lavender;">
                                                    <div class="d-flex">
                                                        <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                                            style="color: grey; font-size: small; margin-top: auto;"></i>
                                                    </div>
                                                </button>
                                            </a>
                                            <div class="collapse cus-nav-dpdown" id="return">
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



                                        <i class="fa fa-calendar pl-3 custom-cal"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-8 col-md-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->

                                        <canvas id="return-chart"></canvas>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="card-body">

                                        <div class="progress-box progress-2 mb-3">


                                        </div>

                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Current Visitors</h4>
                                            <div class="por-txt">3,220 Users (24%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                    style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Previous Visitors</h4>
                                            <div class="por-txt">29,658 Users (60%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title font-styl">Increase Rate</h4>
                                            <div class="por-txt">99,658 Users (90%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                    style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->

                        </div>
                    </div><!-- /# column -->
                </div>
                <!--/Return Rate-->










            <?php } ?>
                
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php } }  ?>