<?php 
    $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
    if($this->session->userdata('logged_in') && $user['user_type'] == 'Saler') { 
        $seller = $this->ServPro_model->show_saler_details($this->session->userdata('user_id'));
        $product_id = $this->uri->segment(3);
        $my_product_dtl = $this->Product_model->show_product_saler($this->session->userdata('user_id'),$product_id);

        $productReview = $this->Review_model->show_dealReview_seller($this->session->userdata('user_id'),$product_id);

        $dir_name = strtolower(substr((str_replace(' ', '', $my_product_dtl['deals_name'])), 0, 4));
        $deals_pic = explode(",",$my_product_dtl['deals_pic']);
?>
<?php if(!$seller['approved']) { ?>
<div class="row" style="position:fixed;
                    z-index:1000;
                    top:40%;
                    margin: auto auto;
                    width: 100%;
                    height:200px;">
    <div class="text-center col-md-4 col-sm-3 col-xs-1">&nbsp;</div>
    <div class="text-center col-md-4 col-sm-6 col-xs-10"
        style="background-color: #ed4928; border-radius: 16px; color:white; padding:10px;">
        <h4>Be patient. We are processing your request.</h4>
        <br>
        <button class="btn btn-sm btn-info">Contact</button>
    </div>
</div>

<div style="opacity: 0.1;">
    <?php } ?>

    <div class="single">
        <div class="container">
            <div class="single-top-main" style="margin-bottom:50px;">
                <div class="col-md-5 single-top">
                    <div class="single-w3agile">

                        <div id="picture-frame">
                            <img src="<?php echo base_url(); ?>assets/images/shop/<?php echo $my_product_dtl['business_registry_id']; ?>/<?php echo $dir_name; ?>/<?php echo $deals_pic[0]; ?>"
                                class="img-responsive" alt="<?php echo $my_product_dtl['cat_name']; ?>">
                        </div>
                        <script src="<?php echo base_url(); ?>assets/js/jquery.zoomtoo.js"></script>
                        <script>
                        $(function() {
                            $("#picture-frame").zoomToo({
                                magnify: 1
                            });
                        });
                        </script>

                    </div>
                </div>
                <div class="col-md-7 single-top-left ">
                    <div class="single-right">
                        <h3><?php echo $my_product_dtl['deals_name']; ?></h3>

                        <label>Total Review: </label>
                        <a href="<?php echo base_url(); ?>users/proReviewSL/<?php echo $product_id; ?>">
                            <?php if($productReview == NULL) { echo 'No reviewes yet.'; } else { 
                        $sum = 0;
                        foreach($productReview as $slrRv) 
                            $sum += $slrRv['rating'];
                        $avgRevw = round(($sum / count($productReview)),2);

                        if($avgRevw <= 2) $color = 'red';
                        elseif($avgRevw >= 4) $color = 'green';
                        else $color = 'yellow';
                    ?>
                            <span style="color:<?php echo $color; ?>;">
                                <i class="fa fa-star"></i>
                                <!--i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-quarter"></i-->
                                <?php echo $avgRevw; ?>
                                (<?php echo count($productReview); ?>)
                            </span>
                            <?php } ?>
                        </a>

                        <div class="block block-w3">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <p class="in-pa">
                            <b>Description:</b>
                            <?php echo $my_product_dtl['deals_descrption']; ?>
                        </p>
                        <p class="in-pa">
                            <b>Keywords:</b>
                            <?php echo $my_product_dtl['deals_descrption']; ?>
                        </p>

                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <?php if(!$seller['approved']) { ?>
</div>
<?php } ?>
<?php 
    } else {
        redirect('home');
    }
?>