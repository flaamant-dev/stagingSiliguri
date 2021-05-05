<?php if(!$this->session->userdata('logged_in')) {
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

    <!--breadcrumb-->
    <div class="grid_3 grid_5 wow fadeInLeft animated" data-wow-delay=".5s">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>home">Home</a></li>
            <li><a href="<?php echo base_url(); ?>users/dashboard">Dashboard</a></li>
            <li class="active">Feed Details</li>
        </ol>
    </div>

    <div class="about-w3 ">
        <div class="container">

            <div class="advantages">
                <div class="row">


                    <div class="clearfix"></div>
                </div>
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