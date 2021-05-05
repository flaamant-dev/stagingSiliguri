<?php if(!$this->session->userdata('logged_in')) {
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


    $business = $this->ServPro_model->show_provider($this->session->userdata('user_id')); 
	
    
    //$user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
    //  if($user['user_type'] == 'Saler') { 
    //     $seller = $this->ServPro_model->show_saler_details($this->session->userdata('user_id'));
          
    //     $business = $this->ServPro_model->show_provider($this->session->userdata('user_id')); 
    //     $Categories = $this->Category_model->show_userReg_category($this->session->userdata('user_id'));
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
                
                    <div class="custom-tab">        
                        <form id="add_product_form" class="form-horizontal form-label-left" action="product/add_product" method="post" enctype="multipart/form-data">
                            <?php if(count($business)==1) { ?>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Business</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="hidden" name="business_registry_id" value="<?php echo $business[0]['business_registry_id']; ?>">
                                        <span class="form-control"><?php echo $business[0]['business_name']; ?></span>                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="hidden" name="deal_type" value="<?php echo $business[0]['business_type']; ?>">
                                        <?php if($business[0]['business_type'] == 'product' || $business[0]['business_type']== 'service') { ?>
                                        <span class="form-control"><?php echo ucfirst($business[0]['business_type']); ?></span>                                        
                                        <?php } else { ?>
                                            <div style="padding-top:10px;">
                                                <input type="radio" name="deal_type" value="product" checked> Product
                                                &nbsp;&nbsp;
                                                <input type="radio" name="deal_type" value="service"> Service
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Business</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="business_registry_id" class="form-control">
                                            <option disabled selected>Select Business</option>
                                            <?php foreach($business as $bis) { 
                                                echo '<option value="'.$bis['business_registry_id'].'">'.$bis['business_name'].'</option>';
                                            } ?>
                                        </select>                                                                    
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Choose Category</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="cat_id" class="form-control">
                                        <option disabled selected>Choose from your Category</option>
                                        <?php foreach($Categories as $cat) { 
                                            echo '<option value="'.$cat['cat_id'].'">'.$cat['cat_name'].'</option>';
                                        } ?>
                                    </select>                                         
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deals_name">Add Title</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="deals_name" name="deals_name" class="form-control" placeholder="Title of your ad">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deals_descrption">Description</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea id="deals_descrption" name="deals_descrption" height="6" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deals_price">Price</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="deals_price" name="deals_price" class="form-control" placeholder="Price of product">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deals_keyword">Keywords</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="deals_keyword" name="deals_keyword" class="form-control" placeholder="keywords">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image_upload">Image(s)/ Video(s)</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" name="images_upload[]" id="image_upload" multiple>                      
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                <div class="progress col-md-6 col-sm-6 col-xs-12" style="display:none;">
                                    <div class="bar"></div >
                                    <div class="percent">0%</div >
                                </div>
                            </div>
                            <!--div class="form-group">
                                <div class="col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                <div class="progress col-md-6 col-sm-6 col-xs-12" style="display:none;">
                                    <div id="status"></div>	
                                </div>
                            </div-->

                            <div class="ln_solid"></div>
                            <div class="form-group d-flex">
                                <a href="<?php echo base_url(); ?>users/products" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</a>
                                <button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Submit</button>
                            </div>

                        </form>
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

<?php } else { redirect('home'); } } ?>