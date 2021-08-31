<?php if(!$this->session->userdata('ulogged_in')) {
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
            


                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="">
                                        <h5 class="font-weight-bold font-large mt-2">Manage Service</h5>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary btn-sm mt-1 font-normal font-six">Add
                                            service</button>
                                    </div>
                                </div>
                                <div class="card mt-4 mb-3 px-3 pt-3">
                                    <div class="custom-tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active show" id="custom-nav-all-tab"
                                                    data-toggle="tab" href="#custom-nav-all" role="tab"
                                                    aria-controls="custom-nav-all" aria-selected="true">
                                                    <div class="mb-3 text-center">
                                                        <h5 class="font-six font-medium">All</h5>
                                                    </div>
                                                </a>
                                                <a class="nav-item nav-link" id="custom-nav-service-1-tab"
                                                    data-toggle="tab" href="#custom-nav-service-1" role="tab"
                                                    aria-controls="custom-nav-service-1" aria-selected="false">
                                                    <div class="mb-3 text-center">
                                                        <h5 class="font-six font-medium">Service-1</h5>
                                                    </div>
                                                </a>
                                                <a class="nav-item nav-link" id="custom-nav-service-2-tab"
                                                    data-toggle="tab" href="#custom-nav-service-2" role="tab"
                                                    aria-controls="custom-nav-service-2" aria-selected="false">
                                                    <div class="mb-3 text-center">
                                                        <h5 class="font-six font-medium">Service-2</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                </div>

                                <div class="card p-3">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade active show in" id="custom-nav-all" role="tabpanel"
                                            aria-labelledby="custom-nav-all-tab">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="custom-nav-service-1" role="tabpanel"
                                            aria-labelledby="custom-nav-service-1-tab">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-nav-service-2" role="tabpanel"
                                            aria-labelledby="custom-nav-service-2-tab">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://i.imgur.com/hrS2McC.png"
                                                            alt="Card image cap">
                                                        <div class="p-2">
                                                            <h4 class="card-title mb-2">Service title</h4>
                                                            <div class="d-flex">
                                                                <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span class="extra-small">Views</span></div>
                                                                <div class="font-six pl-1"><span class="mr-1 font-medium">1,699</span><span class="extra-small">Clicks</span></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <span class="font-six extra-small" style="color: rgb(105, 105, 105);">Performance
                                                                    over the past 28 days</span>
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



            <?php } ?>
        
        </div>
    </div><!-- .content -->
        
    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->
        
<?php } }  ?>