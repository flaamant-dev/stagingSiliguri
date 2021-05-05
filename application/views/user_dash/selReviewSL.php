<?php 
    $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
    if($this->session->userdata('logged_in') && $user['user_type'] == 'Saler') { 
        $seller = $this->ServPro_model->show_saler_details($this->session->userdata('user_id'));
        $companyReview = $this->Review_model->show_sellerReview_seller($this->session->userdata('user_id'));
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

    <div class="about-w3 ">
        <div class="container">
            <div class="advantages">
                <div class="list-group list-group-alternate">
                    <?php if($companyReview == NULL) { 
                echo 'You do not have any review yet.';
            } else { 
                foreach($companyReview as $slrRv) { 
                    if($slrRv['rating'] == 1 || $slrRv['rating'] == 2) $color = 'red';
                    elseif($slrRv['rating'] == 4 || $slrRv['rating'] == 5) $color = 'green';
                    else $color = 'yellow';
            ?>
                    <div class="justify-content-between">
                        <div style="float:left"><b><?php echo $slrRv['user_name']; ?></b></div>
                        <div style="float:right"><?php echo date("d M, Y",strtotime($slrRv['date'])); ?></div>
                    </div>
                    <br></hr>

                    <div class="row" style="margin-left:15px;color:<?php echo $color; ?>;">
                        <?php for($i=0; $i<$slrRv['rating']; $i++) { echo '<i class="fa fa-star"></i>';} ?>
                    </div>
                    <div class="row" style="margin-left:15px;">
                        <?php echo $slrRv['review']; ?>
                    </div>
                    <?php }} ?>
                </div>
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