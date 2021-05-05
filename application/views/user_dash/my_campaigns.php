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


    <div class="about-w3 ">
        <div class="container">

            <div class="advantages">
                <div class="row">

                    <div class="col-md-3 pro-1" id="new_campaign">
                        <div class="col-m">
                            <a href="<?php echo base_url(); ?>users/create_campaign">
                                <img src="<?php echo base_url(); ?>assets/images/clickMe.gif" class="img-responsive"
                                    alt="">

                            </a>
                            <div class="mid-1">
                                <!--div class="women">
										<h6>Ad Heading</h6>						
									</div-->
                                <div class="add">
                                    <button class="btn btn-info my-cart-btn my-cart-b">New Ad</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal6" class="offer-img">
                                <img src="<?php echo base_url(); ?>assets/images/of5.png" class="img-responsive" alt="">
                                <div class="offer">
                                    <p><span>Offer</span></p>
                                </div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html">Kurkure</a>(100 g)</h6>
                                </div>
                                <div class="mid-2">
                                    <p><label>$1.00</label><em class="item_price">$0.70</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="6" data-name="Kurkure"
                                        data-summary="summary 6" data-price="0.70" data-quantity="1"
                                        data-image="<?php echo base_url(); ?>assets/images/of5.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal7" class="offer-img">
                                <img src="<?php echo base_url(); ?>assets/images/of6.png" class="img-responsive" alt="">
                                <div class="offer">
                                    <p><span>Offer</span></p>
                                </div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html">Popcorn</a>(250 g)</h6>
                                </div>
                                <div class="mid-2">
                                    <p><label>$2.00</label><em class="item_price">$1.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="7"
                                        data-name="product 1" data-summary="summary 1" data-price="1.00"
                                        data-quantity="1"
                                        data-image="<?php echo base_url(); ?>assets/images/of6.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal8" class="offer-img">
                                <img src="<?php echo base_url(); ?>assets/images/of7.png" class="img-responsive" alt="">
                                <div class="offer">
                                    <p><span>Offer</span></p>
                                </div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html"> Nuts</a>(250 g)</h6>
                                </div>
                                <div class="mid-2">
                                    <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="8" data-name="Nuts"
                                        data-summary="summary 8" data-price="3.50" data-quantity="1"
                                        data-image="<?php echo base_url(); ?>assets/images/of7.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal9" class="offer-img">
                                <img src="<?php echo base_url(); ?>assets/images/of8.png" class="img-responsive" alt="">
                                <div class="offer">
                                    <p><span>Offer</span></p>
                                </div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html">Banana</a>(6 pcs)</h6>
                                </div>
                                <div class="mid-2">
                                    <p><label>$2.00</label><em class="item_price">$1.50</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="9" data-name="Banana"
                                        data-summary="summary 9" data-price="1.50" data-quantity="1"
                                        data-image="<?php echo base_url(); ?>assets/images/of8.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal10" class="offer-img">
                                <img src="<?php echo base_url(); ?>assets/images/of9.png" class="img-responsive" alt="">
                                <div class="offer">
                                    <p><span>Offer</span></p>
                                </div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html">Onion</a>(1 kg)</h6>
                                </div>
                                <div class="mid-2">
                                    <p><label>$1.00</label><em class="item_price">$0.70</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="10" data-name="Onion"
                                        data-summary="summary 10" data-price="0.70" data-quantity="1"
                                        data-image="<?php echo base_url(); ?>assets/images/of9.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal11" class="offer-img">
                                <img src="<?php echo base_url(); ?>assets/images/of10.png" class="img-responsive"
                                    alt="">
                                <div class="offer">
                                    <p><span>Offer</span></p>
                                </div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html"> Bitter Gourd</a>(1 kg)</h6>
                                </div>
                                <div class="mid-2">
                                    <p><label>$2.00</label><em class="item_price">$1.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="11"
                                        data-name="Bitter Gourd" data-summary="summary 11" data-price="1.00"
                                        data-quantity="1"
                                        data-image="<?php echo base_url(); ?>assets/images/of10.png">Add to
                                        Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal12" class="offer-img">
                                <img src="<?php echo base_url(); ?>assets/images/of11.png" class="img-responsive"
                                    alt="">
                                <div class="offer">
                                    <p><span>Offer</span></p>
                                </div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html">Apples</a>(1 kg)</h6>
                                </div>
                                <div class="mid-2">
                                    <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="12" data-name="Apples"
                                        data-summary="summary 12" data-price="3.50" data-quantity="1"
                                        data-image="<?php echo base_url(); ?>assets/images/of11.png">Add to
                                        Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#new_campaign" id="hidd_camp"
                        style="display:none;color:yellow; position: fixed; bottom: 40%; right: 50px; z-index: 999; border: none; text-indent: 100%;">
                        <img src="<?php echo base_url(); ?>assets/images/asd.png" width="50px" height="50px">
                    </a>

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