<?php if(!$this->session->userdata('ulogged_in')) {
    redirect('home');
} else { 
    
    $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
    if($user['user_type'] == 'Saler') { 
    $this->load->view('all_modals'); 
    $businesses =  $this->Business_model->show_user_business($this->session->userdata('user_id'));
	$Categories = $this->Category_model->show_sub_category(324);
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
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
                    <div class="card mt-3 px-3 pt-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="custom-tab">        
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link" id="custom-nav-replied-tab" data-toggle="tab" href="#custom-nav-replied" role="tab" aria-controls="custom-nav-replied" aria-selected="false">
                                            <div class="mb-3"><h5 class="font-six font-medium"><?php echo $businesses[0]['business_name']; ?></h5></div>
                                        </a>
                                        <!-- ======================= -->
                                        

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- ======================= -->
                                    </div>
                                </nav>                                      
                            </div>
                        </div>
                        
                        <div>
                            <div style="position: relative;">
                                <a class="navbar-toggler pl-0 pr-0 pb-0 ml-2" data-toggle="collapse"
                                    data-target="#product-sort" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <button type="button" class="btn text-dark"
                                        style="background-color: lavender;">
                                        <div class="d-flex">
                                            <h4 class="mb-0 pr-3"><strong class="font-normal">Company</strong></h4>
                                            <i class="fa fa-chevron-down navbar-toggler-icon"
                                                style="color: grey; font-size: small; margin-top: auto;"></i>
                                        </div>
                                    </button>
                                </a>
                                <div class="collapse cnf-nav-dpdown" id="product-sort" style="max-height: 345px;">
                                    <?php if($businesses != NULL) { foreach($businesses as $bis) { ?>
                                        <div class="drop-style">
                                            <label class="mb-0"><?php echo $bis['business_name']; ?></label>
                                        </div>
                                    <?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="post-card-content">
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="custom-nav-all" role="tabpanel" aria-labelledby="custom-nav-all-tab">
                            <?php $review=$this->Review_model->show_sellerReview_seller($business_registry_id);
                            foreach ($review as $view) { ?>
                            <div class="p-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div class="d-flex">
                                            <div><img src="<?php echo $view['profile_picture'];?>" class="align-self-center rounded-circle res-wid-img"></div>
                                            <div class="ml-2">
                                                <h5 class="font-six text-dark"><?php echo $view['first_name']; ?> <?php echo $view['last_name']; ?></h5>
                                                <div class="extra-small">
                                                    <?php for($i=0;$i<floor($view['rating']);$i++) {?>
                                                        <i class="fa fa-star text-warning"></i>
                                                    <?php } ?>
                                                    <?php if($view['rating']- floor($view['rating']) > 0) { ?>
                                                        <i class="fa fa-star-half text-warning"></i>
                                                        <?php for($j=0;$j<(4-floor($view['rating']));$j++) {?>
                                                            <i class="fa fa-star" style="color: rgb(206, 206, 206);"></i>
                                                        <?php } ?>
                                                    <?php } else {?>
                                                    <?php for($j=0;$j<(5-floor($view['rating']));$j++) {?>
                                                        <i class="fa fa-star" style="color: rgb(206, 206, 206);"></i>
                                                    <?php } }?>
                                                    <span class="text-info extra-small font-six">&nbsp;<?php echo date("d/m/Y",strtotime($view['date'])); ?></span>
                                                </div>
                                                <?php if ($view['review']==NULL) { ?>
                                                    <i class="mt-1 font-medium text-secondary"><b><?php echo $view['first_name']; ?> <?php echo $view['last_name']; ?></b> didn't write a review, and has left just a rating.</i>
                                                <?php } else{ ?>
                                                    <i class="mt-1 font-medium text-secondary"><?php  echo $view['review'];?></i>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>                                                  
                                    <div class="text-center ell-btn dropdown" style="padding: 5px 16px;" 
                                            id="rrrrppply" data-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v font-large" style="vertical-align: sub;">
                                        </i>
                                        <?php if($view['seller_review_stat']==1) { ?>
                                            <div class="dropdown-menu" aria-labelledby="rrrrppply"
                                                style="margin-top: 30px !important; margin-left: -40px; width: 50px;">
                                                <button class="dropdown-item edit-review-reply" value="<?php echo $view['review_id']; ?>">Edit Reply</a>
                                                <button class="dropdown-item del-review-reply" value="<?php echo $view['review_id']; ?>">Delete Reply</a>
                                            </div>
                                        <?php } else { ?>
                                            <div class="dropdown-menu" aria-labelledby="rrrrppply"
                                                style="margin-top: 30px !important; margin-left: -40px; width: 50px;">
                                                <button class="dropdown-item send-review-reply" value="<?php echo $view['review_id']; ?>">reply</button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="mt-3 ml-5" id="hidden-seller-reply-show-<?php echo $view['review_id']; ?>" style="display:none">
                                    <div class="d-flex">
                                        <div><img src="<?php echo base_url(); ?>images/stores/<?php echo $business_registry_id; ?>/logo/<?php echo $view['logo'];?>" class="align-self-center rounded-circle res-wid-img"></div>
                                        <div class="ml-2">
                                            <h5 class="font-six text-dark"><?php echo $view['business_name'];?></h5>
                                            <div class="extra-small">                                                                
                                                <span class="text-info extra-small font-six">&nbsp;<?php echo date("d/m/Y"); ?></span>
                                            </div>
                                            <i class="mt-1 font-medium text-secondary">Your responce will be updated soon.</i>
                                        </div>
                                    </div>
                                </div>

                                <?php if($view['seller_review_stat']==1) { ?>
                                    <?php $reply=$this->Review_model->show_reply($view['review_id']); ?>
                                    <div class="mt-3 ml-5" id="seller-responce-reply-show-<?php echo $view['review_id']; ?>">
                                        <div class="d-flex">
                                            <div><img src="<?php echo base_url(); ?>images/stores/<?php echo $business_registry_id; ?>/logo/<?php echo $view['logo'];?>" class="align-self-center rounded-circle res-wid-img"></div>
                                            <div class="ml-2">
                                                <h5 class="font-six text-dark"><?php echo $view['business_name'];?></h5>
                                                <div class="extra-small">                                                                
                                                    <span class="text-info extra-small font-six">&nbsp;<?php echo date("d/m/Y",strtotime($reply['reply_date'])); ?></span>
                                                </div>
                                                <i class="mt-1 font-medium text-secondary"><?php echo $reply['reply']; ?></i>
                                            </div>
                                        </div>
                                    </div> 
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>

                    </div>
                    </div>
                </div>
                </div>                                              
                </div>
                </div>                
            <?php } ?>        
        </div>
    </div>
    
    <div class="clearfix"></div>
    <?php $this->load->view('page_footer'); ?>

</div>
<?php } }  ?>