<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>
<?php if($this->uri->segment(1) == "admin") {
        $this->load->view('all_modals'); 

        $seller_id = $this->uri->segment(3);
        $seller_detail = $this->ServPro_model->show_saler_details($seller_id);
    ?>


<div class="single">
    <div class="container">
        <div class="single-top-main">
            <div class="col-md-5 single-top">
                <div class="single-w3agile">
                    <div id="picture-frame">
                        <img src="<?php echo base_url(); ?>assets/images/shop/shop.gif" alt="Siliguri Online Shopping"
                            class="img-responsive" />
                    </div>
                </div>
            </div>
            <div class="col-md-7 single-top-left ">
                <div class="single-right">
                    <h3><?php echo $seller_detail['business_name']; ?></h3>

                    <div class="block block-w3">
                        <div class="starbox small ghosting"> </div>
                    </div>

                    <br>



                    <div id="container">
                        <div id="parentHorizontalTab">
                            <ul class="resp-tabs-list hor_1">
                                <li>Business</li>
                                <li>Contact</li>
                            </ul>
                            <div class="resp-tabs-container hor_1">
                                <div>
                                    <p class="in-pa">
                                        <b>About</b></br>
                                        <?php echo $seller_detail['business_about']; ?>
                                    </p>

                                    <p class="in-pa">
                                        <b>Address</b></br>
                                        <?php echo $seller_detail['business_address']; ?>
                                    </p>
                                </div>
                                <div>
                                    <div class="map-grid">
                                        <h5>Our Branches</h5>
                                        <ul>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i>Hakimpara, Siliguri.
                                            </li>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i>Asrampara, Siliguri.
                                            </li>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i>Hill Cart Road,
                                                Siliguri.</li>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i>Seboke Road,
                                                Siliguri.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="map-grid">
                                        <h5>Contact Me Through</h5>
                                        <ul>
                                            <li>Mobile : +91 9051311471</li>
                                            <li>WhatsApp : +91 9051311471</li>
                                            <li>Massenger : +123 456 7890</li>
                                            <li>Fax No : +123 456 7890</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>
<!---->
<div class="content-top offer-w3agile">
    <div class="container ">
        <div class="spec ">
            <h3>Product / Service provided by Saler</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class=" con-w3l wthree-of">

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
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="7" data-name="product 1"
                                data-summary="summary 1" data-price="1.00" data-quantity="1"
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
                        <img src="<?php echo base_url(); ?>assets/images/of10.png" class="img-responsive" alt="">
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
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="11" data-name="Bitter Gourd"
                                data-summary="summary 11" data-price="1.00" data-quantity="1"
                                data-image="<?php echo base_url(); ?>assets/images/of10.png">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal12" class="offer-img">
                        <img src="<?php echo base_url(); ?>assets/images/of11.png" class="img-responsive" alt="">
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
                                data-image="<?php echo base_url(); ?>assets/images/of11.png">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal13" class="offer-img">
                        <img src="<?php echo base_url(); ?>assets/images/of12.png" class="img-responsive" alt="">
                        <div class="offer">
                            <p><span>Offer</span></p>
                        </div>
                    </a>
                    <div class="mid-1">
                        <div class="women">
                            <h6><a href="single.html">Honey</a>(500g)</h6>
                        </div>
                        <div class="mid-2">
                            <p><label>$7.00</label><em class="item_price">$6.00</em></p>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="add">
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="13" data-name="Honey"
                                data-summary="summary 13" data-price="6.00" data-quantity="1"
                                data-image="<?php echo base_url(); ?>assets/images/of12.png">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal14" class="offer-img">
                        <img src="<?php echo base_url(); ?>assets/images/of13.png" class="img-responsive" alt="">
                        <div class="offer">
                            <p><span>Offer</span></p>
                        </div>
                    </a>
                    <div class="mid-1">
                        <div class="women">
                            <h6><a href="single.html">Chocos</a>(250g)</h6>
                        </div>
                        <div class="mid-2">
                            <p><label>$5.00</label><em class="item_price">$4.50</em></p>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="add">
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="14" data-name="Chocos"
                                data-summary="summary 14" data-price="4.50" data-quantity="1"
                                data-image="<?php echo base_url(); ?>assets/images/of13.png">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal15" class="offer-img">
                        <img src="<?php echo base_url(); ?>assets/images/of14.png" class="img-responsive" alt="">
                        <div class="offer">
                            <p><span>Offer</span></p>
                        </div>
                    </a>
                    <div class="mid-1">
                        <div class="women">
                            <h6><a href="single.html">Oats</a>(1 kg)</h6>
                        </div>
                        <div class="mid-2">
                            <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="add">
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="15" data-name="Oats"
                                data-summary="summary 15" data-price="3.50" data-quantity="1"
                                data-image="<?php echo base_url(); ?>assets/images/of14.png">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal16" class="offer-img">
                        <img src="<?php echo base_url(); ?>assets/images/of15.png" class="img-responsive" alt="">
                        <div class="offer">
                            <p><span>Offer</span></p>
                        </div>
                    </a>
                    <div class="mid-1">
                        <div class="women">
                            <h6><a href="single.html">Bread</a>(500 g)</h6>
                        </div>
                        <div class="mid-2">
                            <p><label>$1.00</label><em class="item_price">$0.80</em></p>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="add">
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="16" data-name="Bread"
                                data-summary="summary 16" data-price="0.80" data-quantity="1"
                                data-image="<?php echo base_url(); ?>assets/images/of15.png">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>




<?php }} ?>