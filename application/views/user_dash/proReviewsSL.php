<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?> 
    <?php $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); ?>
    <?php if($user['user_type'] == 'Saler') { 
        $seller = $this->ServPro_model->show_saler_details($this->session->userdata('user_id'));
        $my_products = $this->Product_model->show_product_saler($this->session->userdata('user_id'));
?> 
        
		<?php if(!$seller['approved']) { ?>
			
			<div class="row" style="position:fixed;
						z-index:1000;
						top:40%;
                        margin: auto auto;
						width: 100%;
      					height:200px;">
				<div class="text-center col-md-4 col-sm-3 col-xs-1">&nbsp;</div>
                <div class="text-center col-md-4 col-sm-6 col-xs-10" style="background-color: #ed4928; border-radius: 16px; color:white; padding:10px;">
                    <h4>Be patient. We are processing your request.</h4>
                    <br>
                    <button class="btn btn-sm btn-info">Contact</button>
                </div>
            </div>

            <div  style="opacity: 0.1;">
        <?php } ?>

			
			<div class="about-w3 "><div class="container"><div class="advantages">	
                <div class="row">
        
                    <?php 
                        if($my_products != NULL) { foreach($my_products as $prd) { 
                            
                            $dir_name = strtolower(substr((str_replace(' ', '', $prd['deals_name'])), 0, 4));
                            $deals_pic = explode(",",$prd['deals_pic']);
                            $sum = 0;
                            $productReview = $this->Review_model->show_dealReview_seller($this->session->userdata('user_id'),$prd['deals_id']);
                            IF($productReview != null ) {
                                foreach($productReview as $slrRv) 
                                    $sum += $slrRv['rating'];
                                $avgRevw = round(($sum / count($productReview)),2);

                                if($avgRevw <= 2) $color = 'red';
                                elseif($avgRevw >= 4) $color = 'green';
                                else $color = 'yellow';
                            } else {
                                $avgRevw = 0;
                            }
                    ?>
                        
                        <a href="<?php echo base_url(); ?>users/proReviewSL/<?php echo $prd['deals_id']; ?>">   
                            <div class="card shadow mb-4 col-md-4 col-sm-6">
                                <div class="card-header py-3 mb-2 d-flex flex-row align-items-center justify-content-between">
                                    <h4 class="m-0 font-weight-bold text-primary"><b><?php echo $prd['deals_name']; ?></b></h4>
                                </div>							
                                <div class="card-body">
                                    <div class="col-md-3 col-sm-4 col-xs-12" style="position: relative; float: left;">
                                        <img src="<?php echo base_url(); ?>assets/images/shop/<?php echo $prd['business_registry_id']; ?>/<?php echo $dir_name; ?>/<?php echo $deals_pic[0]; ?>" class="img-responsive avatar-view">
                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-12" style="position: relative; float: left;">
                                        <h5>Total reviews: <?php echo count($productReview); ?></h5>
                                        <p>Average review: <?php echo $avgRevw.'/ 5'; ?></p>
                                    </div>
                                </div>
                            </div>
                        </a> 
                    <?php }} ?>
                </div>
                <div class="clearfix"></div>
			</div></div></div>
        <?php if(!$seller['approved']) { ?>
            </div>
        <?php } ?>
    <?php } else {
        redirect('home');
    }?>

<?php } ?>