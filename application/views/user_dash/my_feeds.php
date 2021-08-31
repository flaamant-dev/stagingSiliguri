<?php if(!$this->session->userdata('ulogged_in')) {
    redirect('home');
} else { ?>
<?php $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); ?>
<?php if($user['user_type'] == 'Saler') { 
        $seller = $this->ServPro_model->show_saler_details($this->session->userdata('user_id'));
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
                    <a href="<?php echo base_url(); ?>users/create_feed" class="list-group-item" id="new_feed">
                        <div><b>New Feed</b></div>
                        <br></hr>
                        <div class="row">Click to post new feed</div>
                    </a>

                    <a href="<?php echo base_url(); ?>users/feed_details" class="list-group-item">
                        <div class="justify-content-between">
                            <div style="float:left">Reach <span class="badge badge-primary"> 11</span></div>
                            <div>Communicate <span class="badge badge-success"> 6</span></div>
                            <div style="float:right"><?php echo date("d M, Y"); ?></div>
                        </div>
                        <div><b>Heading 1</b></div>
                        <br></hr>

                        <div class="row">jhdfjeh wefhbrher ehbferhf e rjhfberhf</div>
                    </a>
                    <a href="<?php echo base_url(); ?>users/feed_details" class="list-group-item">
                        <div class="justify-content-between">
                            <div style="float:left">Reach <span class="badge badge-primary"> 11</span></div>
                            <div>Communicate <span class="badge badge-success"> 6</span></div>
                            <div style="float:right"><?php echo date("d M, Y"); ?></div>
                        </div>
                        <div><b>Heading 1</b></div>
                        <br></hr>

                        <div class="row">jhdfjeh wefhbrher ehbferhf e rjhfberhf</div>
                    </a>
                    <a href="<?php echo base_url(); ?>users/feed_details" class="list-group-item">
                        <div class="justify-content-between">
                            <div style="float:left">Reach <span class="badge badge-primary"> 11</span></div>
                            <div>Communicate <span class="badge badge-success"> 6</span></div>
                            <div style="float:right"><?php echo date("d M, Y"); ?></div>
                        </div>
                        <div><b>Heading 1</b></div>
                        <br></hr>

                        <div class="row">jhdfjeh wefhbrher ehbferhf e rjhfberhf</div>
                    </a>
                    <a href="<?php echo base_url(); ?>users/feed_details" class="list-group-item">
                        <div class="justify-content-between">
                            <div style="float:left">Reach <span class="badge badge-primary"> 11</span></div>
                            <div>Communicate <span class="badge badge-success"> 6</span></div>
                            <div style="float:right"><?php echo date("d M, Y"); ?></div>
                        </div>
                        <div><b>Heading 1</b></div>
                        <br></hr>

                        <div class="row">jhdfjeh wefhbrher ehbferhf e rjhfberhf</div>
                    </a>
                    <a href="<?php echo base_url(); ?>users/feed_details" class="list-group-item">
                        <div class="justify-content-between">
                            <div style="float:left">Reach <span class="badge badge-primary"> 11</span></div>
                            <div>Communicate <span class="badge badge-success"> 6</span></div>
                            <div style="float:right"><?php echo date("d M, Y"); ?></div>
                        </div>
                        <div><b>Heading 1</b></div>
                        <br></hr>

                        <div class="row">jhdfjeh wefhbrher ehbferhf e rjhfberhf</div>
                    </a>
                    <a href="<?php echo base_url(); ?>users/feed_details" class="list-group-item">
                        <div class="justify-content-between">
                            <div style="float:left">Reach <span class="badge badge-primary"> 11</span></div>
                            <div>Communicate <span class="badge badge-success"> 6</span></div>
                            <div style="float:right"><?php echo date("d M, Y"); ?></div>
                        </div>
                        <div><b>Heading 1</b></div>
                        <br></hr>

                        <div class="row">jhdfjeh wefhbrher ehbferhf e rjhfberhf</div>
                    </a>
                </div>
                <div class="clearfix"></div>

                <a href="#new_feed" id="hidd_feed"
                    style="display:none;color:yellow; position: fixed; bottom: 40%; right: 50px; z-index: 999; border: none; text-indent: 100%;">
                    <img src="<?php echo base_url(); ?>assets/images/asd.png" width="50px" height="50px">
                </a>
            </div>
        </div>
    </div>
    <?php if(!$seller['approved']) { ?>
</div>
<?php } ?>
<?php } else {
        redirect('home');
    }?>

<?php } ?>