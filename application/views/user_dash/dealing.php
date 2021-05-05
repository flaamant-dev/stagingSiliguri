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

    <div class="about-w3">
        <div class="container">
            <div class="advantages">
                <div class="col-md-6 advantages-left ">
                    <h3>Our Advantages</h3>
                    <div class="advn-one">
                        <div class="ad-mian">
                            <div class="ad-left">
                                <p>1</p>
                            </div>
                            <div class="ad-right">
                                <h4><a href="<?php echo base_url(); ?>single">Elacus a porta varius dui</a></h4>
                                <p>In neque arcu, vulputate vitae dignissim id, placerat adipiscing lorem. Nulla
                                    consectetur adipiscing metus vel pulvinar. Aenean molestie mauris non diam tincidunt
                                    faucibus. </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ad-mian">
                            <div class="ad-left">
                                <p>2</p>
                            </div>
                            <div class="ad-right">
                                <h4><a href="<?php echo base_url(); ?>single">Elacus a porta varius dui</a></h4>
                                <p>In neque arcu, vulputate vitae dignissim id, placerat adipiscing lorem. Nulla
                                    consectetur adipiscing metus vel pulvinar. Aenean molestie mauris non diam tincidunt
                                    faucibus. </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ad-mian">
                            <div class="ad-left">
                                <p>3</p>
                            </div>
                            <div class="ad-right">
                                <h4><a href="<?php echo base_url(); ?>single">Elacus a porta varius dui</a></h4>
                                <p>In neque arcu, vulputate vitae dignissim id, placerat adipiscing lorem. Nulla
                                    consectetur adipiscing metus vel pulvinar. Aenean molestie mauris non diam tincidunt
                                    faucibus. </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 advantages-left about-agi">
                    <h3>Our Skills</h3>
                    <div class="advn-two">
                        <h4><a href="<?php echo base_url(); ?>single"> eu tincidunt lacinia, elit quam ultri ces ipsum,
                                quis ultricies ipsum ante</a></h4>
                        <p>Donec sagittis interdum tellus sed bibendum. Aen ean fringilla ut lacus eu vehicula.
                            Curabitur non nibh quis nisi vestibulum aliquet non sed dolor. Ut est risus, consectetur sit
                            amet pretium in, cursus in dui. Donec ac rhoncus libero.</p>
                        <ul>
                            <li><a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>Praesent vestibulum
                                    molestie lacus</a></li>
                            <li><a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>Donec sagittis interdum
                                    tellus</a></li>
                            <li><a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>Nulla consectetur
                                    adipiscing</a></li>
                            <li><a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>Donec ac rhoncus
                                    libero.</a></li>
                            <li><a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>Erci eu tincidunt
                                    lacinia</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
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