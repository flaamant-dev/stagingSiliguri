<?php if(!$this->session->userdata('ulogged_in')) {
    redirect('home');
} else { 
    $product =  $this->Product_model->show_product_saler($this->session->userdata('user_id'));
    $this->load->view('all_modals'); 

    ?>

<div class="content">
    <div class="animated fadeIn">



        <!--Post Feed-->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-9 col-md-8 col-lg-7 offset-lg-1">
                                <!-- <div class="post-card text-center d-flex justify-content-around text-primary">
                                            <div class="card-bar-top">
                                                <i class="fa fa-exclamation-triangle font-large"></i>
                                                <div>
                                                    <h5 class="font-medium font-six">COVID-19</h5>
                                                </div>
                                                <div>
                                                    <h5 class="font-medium font-six">update</h5>
                                                </div>
                                            </div>

                                            <div class="card-bar-top">
                                                <i class="fa fa-tag font-large"></i>
                                                <div>
                                                    <h5 class="font-medium font-six">Add Offer</h5>
                                                </div>
                                            </div>

                                            <div class="card-bar-top">
                                                <i class="fa fa-refresh font-large"></i>
                                                <div>
                                                    <h5 class="font-medium font-six">Add Update</h5>
                                                </div>
                                            </div>

                                            <div class="card-bar-top">
                                                <i class="fa fa-calendar font-large"></i>
                                                <div>
                                                    <h5 class="font-medium font-six">Add Event</h5>
                                                </div>
                                            </div>

                                            <div class="card-bar-top">
                                                <i class="fa fa-calendar font-large"></i>
                                                <div>
                                                    <h5 class="font-medium font-six">Add Product</h5>
                                                </div>
                                            </div>
                                        </div> -->
                                <!--Nav Header-->
                                <div class="post-card text-center d-flex justify-content-around mt-3"
                                    style="padding-bottom: 0;">
                                    <div class="custom-tab" style="width: 100%;">
                                        <nav>
                                            <div class="nav nav-tabs d-flex justify-content-between" id="nav-tab"
                                                role="tablist">

                                                <a class="nav-item nav-link text-center active" id="custom-nav-all-tab"
                                                    data-toggle="tab" href="#custom-nav-all" role="tab"
                                                    aria-controls="custom-nav-home" aria-selected="true"
                                                    style="width: calc(100% /4);">
                                                    <div class="pb-2 font-medium">All</div>
                                                </a>
                                                <a class="nav-item nav-link text-center" id="custom-nav-offer-tab"
                                                    data-toggle="tab" href="#custom-nav-offer" role="tab"
                                                    aria-controls="custom-nav-profile" aria-selected="false"
                                                    style="width: calc(100% /4);">
                                                    <div class="pb-2 font-medium">Offers</div>
                                                </a>
                                                <a class="nav-item nav-link text-center" id="custom-nav-new-tab"
                                                    data-toggle="tab" href="#custom-nav-new" role="tab"
                                                    aria-controls="custom-nav-contact" aria-selected="false"
                                                    style="width: calc(100% /4);">
                                                    <div class="pb-2 font-medium">What's new</div>
                                                </a>
                                                <a class="nav-item nav-link text-center" id="custom-nav-event-tab"
                                                    data-toggle="tab" href="#custom-nav-event" role="tab"
                                                    aria-controls="custom-nav-contact" aria-selected="false"
                                                    style="width: calc(100% /4);">
                                                    <div class="pb-2 font-medium">Events</div>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                </div>

                                <!--Nav content-->
                                <div class="mt-3">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="custom-nav-all" role="tabpanel"
                                            aria-labelledby="custom-nav-all-tab">
                                            <div class="d-flex justify-content-between">
                                                <div class="post-card-content">

                                                    <div class="p-3">
                                                        <div>
                                                            <h6 class="font-medium" style="color: rgb(92, 92, 92);">
                                                                Posted Nov 9, 2020</h6>
                                                        </div>
                                                        <div class="mt-4">
                                                            <h6 class="font-medium">Hours were updated.</h6>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="d-flex justify-content-between card-des-footer pl-2 pr-2 pt-1 pb-1">
                                                        <div class="d-flex p-2">
                                                            <div style="cursor: pointer;"><span
                                                                    class="mr-4 font-medium">3,000 views</span></div>
                                                            <div style="cursor: pointer;"><span class="font-medium">199
                                                                    clicks</span></div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="p-2" style="cursor: pointer;"><i
                                                                    class="fa fa-share font-large text-primary pr-2"
                                                                    style="vertical-align: middle;"></i><span
                                                                    class="font-medium text-primary">Share post</span>
                                                            </div>
                                                            <div class="p-2" style="cursor: pointer;"><i
                                                                    class="fa fa-ellipsis-v font-large"
                                                                    style="vertical-align: middle;"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade mt-4" id="custom-nav-offer" role="tabpanel"
                                            aria-labelledby="custom-nav-offer-tab">

                                            <div class="d-flex">
                                                <div class="p-2" style="width: calc(100% /2);">
                                                    <h5 style="font-size: 24px; line-height: 35px;">Keep your customers
                                                        updated by sharing an offer</h5>
                                                    <h6 class="mt-3" style="line-height: 24px;">Reach beyond just your
                                                        followers - give everyone searching for your business a reason
                                                        to come in by posting updates and offers directly to your local
                                                        listing on Google</h6>
                                                    <button  
                                                        class="btn btn-lg btn-primary mt-3 font-medium font-six"
                                                        data-toggle="modal" data-target="#special-offer">
                                                        <i class="fa fa-file-text-o"></i>&nbsp; Post your first offer
                                                    </button>


                                                    <!--===================================================-->

                                                        <div class="modal fade" id="special-offer" tabindex="-1" role="dialog"
                                                            aria-labelledby="update-serviceLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document"
                                                                style="text-align: -webkit-center !important;">
                                                                <div class="modal-content" style="width: 80%;">
                                                                    <div class="modal-header d-flex">
                                                                        <h5 class="modal-title" id="scrollmodalLabel">Post your first offer</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-left mb-2">
                                                                        <div>
                                                                                                                                                         
                                                                            <form action="add_newPost" method="post" enctype="multipart/form-data">
                                                                                <!--Drag and drop image-->
                                                                                <div class="row">
                                                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                                                        <div class="card">
                                                                                            <div class="card-body text-center">
                                                                                                <label>Select Images: </label>
                                                                                                <input type="file" name="image[]" class="form-control" multiple>
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
                                                                                            <input type="text" name="offer_name" placeholder="Offer Title" class="style">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12 mb-4">
                                    
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                                                                <div class="d-flex">
                                                                                                    <div style="width: 100%;">
                                                                                                        <input type="date" name="start_date" class="form-control">
                                                                                                    </div>
                                                                                                    <div class="ml-1">
                                                                                                        <input type="time" name="start_time" class="form-control">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-sm-12 col-md-6 col-lg-6 mt-4 mt-lg-0 mt-md-0 mt-xl-0">
                                                                                                <div class="d-flex">
                                                                                                    <div style="width: 100%;">
                                                                                                        <input type="date" name="end_date" class="form-control">
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
                                                                                            <!-- <textarea id="off-detail" name="t-c"
                                                                                                placeholder="Offer Detail"></textarea> -->
                                                                                            <input type="text" name="offerdetails" placeholder="Offer Details" class="style">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12 mb-4">
                                                                                        <div>
                                                                                            <!-- <label for="coupon-code" class="label">Coupon code</label> -->
                                                                                            <input type="text" name="coupon_code" placeholder="Coupon Code" class="style">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12 mb-4">
                                                                                        <div>
                                                                                            <!-- <label for="reedem" class="label">Link to reedem</label> -->
                                                                                            <input type="text" name="reedem" placeholder="Link To Reedem" class="style">
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- <div class="col-md-12">
                                                                                        <div class="set-ck-sty">
                                                                                            <textarea id="term-c" name="t-c"
                                                                                                placeholder="Terms & Conditions"></textarea>
                                                                                        </div>
                                                                                    </div> -->
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit" class="btn btn-primary font-medium">Done</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    <!--======================================================-->


                                                </div>
                                                <div style="width: calc(100% /2);"><img
                                                        src="<?php echo base_url(); ?>images/Icons/post_empty_state.png"
                                                        class="img-fluid"></div>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade mt-4" id="custom-nav-new" role="tabpanel"
                                            aria-labelledby="custom-nav-new-tab">

                                            <div class="d-flex">
                                                <div class="p-2" style="width: calc(100% /2);">
                                                    <h5 style="font-size: 24px; line-height: 35px;">Keep your customers
                                                        updated by sharing what's new</h5>
                                                    <h6 class="mt-3" style="line-height: 24px;">Reach beyond just your
                                                        followers - give everyone searching for your business a reason
                                                        to come in by posting updates and offers directly to your local
                                                        listing on Google</h6>
                                                    <button type="button"
                                                        class="btn btn-lg btn-primary mt-3 font-medium font-six"><i
                                                            class="fa fa-file-text-o"></i>&nbsp; Create your first
                                                        post</button>
                                                </div>
                                                <div style="width: calc(100% /2);"><img
                                                        src="<?php echo base_url(); ?>images/Icons/post_empty_state.png"
                                                        class="img-fluid"></div>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade mt-4" id="custom-nav-event" role="tabpanel"
                                            aria-labelledby="custom-nav-event-tab">

                                            <div class="d-flex">
                                                <div class="p-2" style="width: calc(100% /2);">
                                                    <h5 style="font-size: 24px; line-height: 35px;">Keep your customers
                                                        updated by sharing an event</h5>
                                                    <h6 class="mt-3" style="line-height: 24px;">Reach beyond just your
                                                        followers - give everyone searching for your business a reason
                                                        to come in by posting updates and offers directly to your local
                                                        listing on Google</h6>
                                                    <button type="button"
                                                        class="btn btn-lg btn-primary mt-3 font-medium font-six"><i
                                                            class="fa fa-file-text-o"></i>&nbsp; Post your first
                                                        event</button>
                                                </div>
                                                <div style="width: calc(100% /2);"><img
                                                        src="<?php echo base_url(); ?>images/Icons/post_empty_state.png"
                                                        class="img-fluid"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Right Content-->
                            <div class="col-2 col-sm-3 col-md-3 col-lg-3">
                                <div class="p-4 post-card-content text-center">
                                    <h5 class="font-six">Your Posts</h5>
                                    <h6 class="mt-3 mb-3 font-medium font-six text-secondary">New views this week</h6>
                                    <h6 class="font-six" style="font-size: 24px;">2</h6>
                                    <h6 class="text-secondary font-medium mb-3">Updated just now</h6>
                                    <a href="#" class="text-primary font-medium font-six">Reach more customers through
                                        posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Post Feed-->





    </div>
</div><!-- .content -->

<div class="clearfix"></div>

<?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php } ?>