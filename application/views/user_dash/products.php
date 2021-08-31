<?php if(!$this->session->userdata('ulogged_in')) {
    redirect('home');
} else { 
    $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
    if($user['user_type'] == 'Saler') { 
        $this->load->view('all_modals'); 
        $businesses =  $this->Business_model->show_user_business($this->session->userdata('user_id'));

        $user_name = $this->User_model->show_user_name();
        if($this->uri->segment(3) == NULL) {
            $business_registry_id = $businesses[0]['business_registry_id'];
        } else {
            $business_registry_id = $this->uri->segment(3);
        }
        // $seller = $this->ServPro_model->show_saler_details($this->session->userdata('user_id'));
        $my_products = $this->Product_model->show_product_saler($this->session->userdata('user_id'));
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

                <div class="about-w3 ">
                    <div class="container">
                        <div class="advantages">
                            <div class="row">
                                <div class="col-md-3 pro-1" id="new_product">
                                    <div class="col-m">
                                        <a href="<?php echo base_url(); ?>users/add_product">
                                            <img src="<?php echo base_url(); ?>assets/images/clickMe.gif" class="img-responsive"
                                                alt="">
                                        </a>
                                        <div class="mid-1">
                                            <div class="add">
                                                <a href="<?php echo base_url(); ?>users/add_product"
                                                    class="btn btn-info my-cart-btn my-cart-b"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                if($my_products != NULL) { foreach($my_products as $prd) { 
                                    
                                    $dir_name = strtolower(substr((str_replace(' ', '', $prd['deals_name'])), 0, 4));
                                    $deals_pic = explode(",",$prd['deals_pic']);
                                ?>
                                    <a href="<?php echo base_url(); ?>users/single_product_seller/<?php echo $prd['deals_id']; ?>">

                                        <div class="col-md-3">
                                            <div class="card">
                                            <div class="card-body">
                                                <a href="<?php echo base_url(); ?>seller_profile_c">
                                                <div class="mx-auto d-block">
                                                    <img class="rounded-circle mx-auto d-block" src="<?php echo base_url(); ?>assets/images/shop/<?php echo $prd['business_registry_id']; ?>/<?php echo $dir_name; ?>/<?php echo $deals_pic[0]; ?>"
                                                    alt="<?php echo $prd['cat_name']; ?>" height="80px" width="80px">
                                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $prd['deals_name']; ?></h5>
                                                    <div class="location text-sm-center"><i class="fa fa-list-alt"></i><?php echo $prd['deals_price']; ?></div>
                                                </div>
                                                </a>
                                            </div>
                                            </div>
                                        </div>

                                    </a>
                                <?php }} ?>

                                <a href="#new_product" id="hidd_prd"
                                    style="display:none;color:yellow; position: fixed; bottom: 40%; right: 50px; z-index: 999; border: none; text-indent: 100%;">
                                    <img src="<?php echo base_url(); ?>assets/images/asd.png" width="50px" height="50px">
                                </a>

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
    



