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
	
    $businessDetails = $this->Business_model->show_businessDetails($business_registry_id);
    $all_feed =  $this->Feed_model->show_feed($business_registry_id);

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

                <!--Post Feed-->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                                        <!--Nav Header-->
                                        <div class="post-card text-center d-flex justify-content-around mt-3" style="padding-bottom: 0;">
                                            <div class="custom-tab" style="width: 100%;">
                                                <nav>
                                                    <div class="nav nav-tabs d-flex justify-content-between" id="nav-tab" role="tablist">
                                        
                                                        <a class="nav-item nav-link text-center" id="custom-nav-logo-tab" data-toggle="tab"
                                                            href="#custom-nav-logo" role="tab" aria-controls="custom-nav-contact" aria-selected="false"
                                                            style="width: calc(100% /7);">
                                                            <div class="pb-2 font-medium">Logo</div>
                                                        </a>
                                                        <a class="nav-item nav-link text-center" id="custom-nav-cover-tab" data-toggle="tab"
                                                            href="#custom-nav-cover" role="tab" aria-controls="custom-nav-profile" aria-selected="false"
                                                            style="width: calc(100% /7);">
                                                            <div class="pb-2 font-medium">Covers</div>
                                                        </a>
                                                        <a class="nav-item nav-link text-center" id="custom-nav-video-tab" data-toggle="tab"
                                                            href="#custom-nav-video" role="tab" aria-controls="custom-nav-contact" aria-selected="false"
                                                            style="width: calc(100% /7);">
                                                            <div class="pb-2 font-medium">Video</div>
                                                        </a>
                                                        <a class="nav-item nav-link text-center" id="custom-nav-offer-tab" data-toggle="tab"
                                                            href="#custom-nav-offer" role="tab" aria-controls="custom-nav-contact" aria-selected="false"
                                                            style="width: calc(100% /7);">
                                                            <div class="pb-2 font-medium">Offers</div>
                                                        </a>
                                                        <a class="nav-item nav-link text-center" id="custom-nav-feed-tab" data-toggle="tab"
                                                            href="#custom-nav-feed" role="tab" aria-controls="custom-nav-profile" aria-selected="false"
                                                            style="width: calc(100% /7);">
                                                            <div class="pb-2 font-medium">Feeds</div>
                                                        </a>
                                                    </div>
                                                </nav>
                                            </div>
                                            <div class="mx-3"><i class="fa fa-align-left" style="vertical-align: middle;"></i></div>
                                        </div>

                                        <!--Nav content-->
                                        <div class="mt-4">
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active mt-4" id="custom-nav-logo" role="tabpanel"
                                                    aria-labelledby="custom-nav-logo-tab">
                                                    <div class="d-flex">
                                                        <div style="width: calc(100% /2);">
                                                            <img
                                                                src="<?php echo base_url(); ?>images/stores/<?php echo $business_registry_id; ?>/logo/<?php echo $businessDetails['logo']; ?>"
                                                                class="img-fluid">
                                                        </div>
                                                        <div class="p-2 ml-2" style="width: calc(100% /2);">
                                                            <h5 style="font-size: 24px; line-height: 35px;">Update your Logo</h5>
                                                            <h6 class="mt-3" style="line-height: 24px;">
                                                                Reach beyond just your followers - give everyone searching 
                                                                for your business a reason to come in by posting updates and
                                                                offers directly to your local listing on Google
                                                            </h6><br><br>
                                                            <form method="post" enctype="multipart/form-data" action="company_logo_update">
                                                                <input type="file" class="form-control" name="company_logo">
                                                                <input type="hidden" name="business_registry_id" value="<?php echo $business_registry_id; ?>">
                                                                <button type="submit" class="btn btn-lg btn-primary mt-3 font-medium font-six">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                    &nbsp; Update Logo
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade mt-4" id="custom-nav-cover" role="tabpanel"
                                                    aria-labelledby="custom-nav-cover-tab">
                                                    <div class="d-flex">
                                                        <div class="p-2" style="width: calc(100% /2);">
                                                            <h5 style="font-size: 24px; line-height: 35px;">Keep your
                                                                customers updated by sharing an offer</h5>
                                                            <h6 class="mt-3" style="line-height: 24px;">Reach beyond
                                                                just your followers - give everyone searching for your
                                                                business a reason to come in by posting updates and
                                                                offers directly to your local listing on Google</h6>
                                                            <button type="button"
                                                                class="btn btn-lg btn-primary mt-3 font-medium font-six"><i
                                                                    class="fa fa-file-text-o"></i>&nbsp; Post your first
                                                                offer</button>
                                                        </div>
                                                        <div style="width: calc(100% /2);"><img
                                                                src="<?php echo base_url(); ?>images/Icons/post_empty_state.png"
                                                                class="img-fluid"></div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade mt-4" id="custom-nav-video" role="tabpanel"
                                                    aria-labelledby="custom-nav-video-tab">
                                                    <div class="d-flex">
                                                        <div class="p-2" style="width: calc(100% /2);">
                                                            <h5 style="font-size: 24px; line-height: 35px;">Keep your
                                                                customers updated by sharing what's new</h5>
                                                            <h6 class="mt-3" style="line-height: 24px;">Reach beyond
                                                                just your followers - give everyone searching for your
                                                                business a reason to come in by posting updates and
                                                                offers directly to your local listing on Google</h6>
                                                            <button type="button"
                                                                class="btn btn-lg btn-primary mt-3 font-medium font-six"><i
                                                                    class="fa fa-file-text-o"></i>&nbsp; Create your
                                                                first post</button>
                                                        </div>
                                                        <div style="width: calc(100% /2);"><img
                                                                src="<?php echo base_url(); ?>images/Icons/post_empty_state.png"
                                                                class="img-fluid"></div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade mt-4" id="custom-nav-offer" role="tabpanel"
                                                    aria-labelledby="custom-nav-offer-tab">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                                            <div class="card">
                                                                <div class="card-body" style="background-color: rgb(235, 245, 253); border: 2px dotted rgb(0, 0, 0);">
                                                                    <div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%);">
                                                                        <div>Drop a file here or click the browse</div>
                                                                        <i class="fa fa-cloud-upload" style="font-size: 25px;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade mt-4" id="custom-nav-feed" role="tabpanel"
                                                    aria-labelledby="custom-nav-feed-tab">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-12">
                                                            <div class="card header-des">
                                                                <div class="card-body">
                                                                    <div class="text-center box-des">
                                                                        <h4 class="mb-1">Keep your Customers or Visitors</h4>
                                                                        <h5 class="font-weight-bold">Up-to-date</h5>
                                                                        <button type="button" class="btn btn-primary btn-sm mt-3 font-normal font-six" data-toggle="modal" data-target="#postfeed" style="cursor: pointer;">Post
                                                                            a Feed</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <?php
                                                            foreach($all_feed as $feed){
                                                        ?>

                                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                                                <div class="card">
                                                                    <div class="card-body">                                                                                               
                                                                        <img src="<?php echo base_url(); ?>images/feed_img/<?php  echo $feed['image'];?>" class="img-fluid" style="border-radius: 5px;">                                                                                                     
                                                                        <div class="mt-2">
                                                                            <h4 class="font-six" style="font-size: 20px;"><?php  echo $feed['title'];?></h4>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="font-six pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><span class="mr-1 font-medium">1,699,109</span><span>Views</span></div>
                                                                            <div class="font-six pl-2"><span class="mr-1 font-medium">1,699</span><span>Clicks</span></div>
                                                                        </div>                                           
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php
                                                            }
                                                        ?>

                                                        
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
                <!-- /Post Feed-->

            <?php } ?>
                
        </div>
    </div><!-- .content -->

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
                            <div class="tab-pane" id="custom-nav-share-link" role="tabpanel" aria-labelledby="custom-nav-share-link-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="add_newFeed" method="post" enctype="multipart/form-data">
                                            <div class="card-body text-center mb-3" style="background-color: rgb(235, 245, 253); border: 2px dotted rgb(0, 0, 0); height: 200px;">
                                                <div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%);">
                                                    <div>                                                                                
                                                        <label>Select Images: </label>                                                                                        
                                                    </div>
                                                    <i class="fa fa-cloud-upload" style="font-size: 25px;">
                                                        <input type="file" name="image[]" class="form-control" multiple>
                                                    </i>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <div>
                                                        <input type="hidden" name="business_registry_id" value="<?php echo $business_registry_id; ?>">
                                                                                        
                                                        <!-- <label for="mail" class="label">Paste Video link</label> -->
                                                        <input type="text" name="video_link" placeholder="Paste Video link" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <div>
                                                        <!-- <label for="mail" class="label">Product title</label> -->
                                                        <input type="text" name="title" placeholder="Product title" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <div>
                                                        <textarea name="description" class="form-control" placeholder="Feed description...." id="post-product-desc"></textarea>
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
    <!-- /Modal of feed-->

        
    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->
        
<?php } }  ?>