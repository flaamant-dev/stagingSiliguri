
       

    <div class="content">
        <div class="animated fadeIn">

            <div class="ui-typography">
                <div class="row">

                    <div class="col-md-12">


                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title" v-if="headerText">Stay safe stay healthy - Bigkart (Tagline)
                                <i class="fa fa-share-alt" aria-hidden="true" style="float: right; color: #007BFF; font-size: 25px"></i></strong>    
                            </div>
                            

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="feed-box text-center">
                                            <section class="card">
                                                <div class="card-body">
                                                    <div class="corner-ribon blue-ribon">
                                                        <i class="fa fa-twitter"></i>
                                                    </div>
                                                    <a href="#">
                                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/l.jpg">
                                                    </a>
                                                    <h2>Bigkart Shopping <img class="align-self-center rounded-circle mr-3" style="width:22px;" alt="" src="images/badge2.png"></h2>
                                                    <h4 style="padding: 10px 0 10px 0;">Catagory . Sub-cat</h4>
                                                    <div class="weather-category twt-category">
                                                <ul>
                                                    <li style="color: #000;">
                                                        <h5> <img class="align-self-center rounded-circle mr-3" style="width:22px;" alt="" src="images/love.png">750</h5>
                                                    </li>
                                                    <li style="color: #000;">
                                                        <h5>265</h5>
                                                        Rating
                                                    </li>
                                                    <li style="border: 0; color: #000;">
                                                        <h5><i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i></h5>
                                                        4.6/5
                                                    </li>
                                                </ul>
                                            </div>                                   
                                            <button type="button" class="btn btn-success btn-lg" onclick="location.href='#book_appointment'">Order</button>
                                            <button type="button" class="btn btn-secondary btn-lg" onclick="location.href='tel:+919641666523'">Call</button>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <section class="card">
                                            <div class="card-body" style="padding-bottom: 0;">
                                                <div class="card-body" style="padding-bottom: 0;">
                                                    <div class="corner-ribon blue-ribon">
                                                        <i class="fa fa-twitter"></i>
                                                    </div>
                                                    <p>Bigkart the grocery Store</p>
                                                    <p >every grocery items in best price in market, available monthly subscription offer also available home delivery</p>
                                                    <p><a href="#1"><i class="fa fa-comments"></i> 381 Happy Customer Stories</a></p>
                                                
                                                </div>
                                            </div>                                                     
                                        </section>
                                    </div>                      
                                </div>
                                
                            </div>
                                            
                        </div>
                        <div class="slideshow-container">

                            <div class="mySlides fade">
                            <div class="numbertext">1 / 3</div>
                            <img src="images/ba.jpg" style="width:100%">
                            <div class="text">Caption Text</div>
                            </div>

                            <div class="mySlides fade">
                            <div class="numbertext">2 / 3</div>
                            <img src="images/b.png" style="width:100%">
                            <div class="text">Caption Two</div>
                            </div>

                            <div class="mySlides fade">
                            <div class="numbertext">3 / 3</div>
                            <img src="images/ba.jpg" style="width:100%">
                            <div class="text">Caption Three</div>
                            </div>

                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>

                        </div>

                        <br>

                        
                        <script>
                            var slideIndex = 1;
                            showSlides(slideIndex);

                            function plusSlides(n) {
                            showSlides(slideIndex += n);
                            }

                            function currentSlide(n) {
                            showSlides(slideIndex = n);
                            }

                            function showSlides(n) {
                            var i;
                            var slides = document.getElementsByClassName("mySlides");
                            var dots = document.getElementsByClassName("dot");
                            if (n > slides.length) {slideIndex = 1}    
                            if (n < 1) {slideIndex = slides.length}
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";  
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                            slides[slideIndex-1].style.display = "block";  
                            dots[slideIndex-1].className += " active";
                            }
                        </script>
                        <div class="breadcrumbs">
                            <div class="breadcrumbs-inner">
                                <div class="row m-0">
                                    <div class="col-md-12 mnu">
                                        <div class="scrollmenu" id="stky" style="">
                                            
                                                <a href="#service">Service</a>
                                                <a href="#product">Product</a>
                                                <a href="#about">About</a>
                                                <a href="#review">Review</a>
                                                <a href="#feeds">Feeds</a>
                                                <a href="#videos">Videos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>           
                                        
                        <div class="content">
                            <div class="animated fadeIn">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title" v-if="headerText">Our Services/Products </strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="images/of.png">
                                                            <div class="mx-auto d-block">
                                                            
                                                                <h5 class="text-sm-center mt-2 mb-1">American Sweet Corn</h5>
                                                            </div>
                                                            <hr>
                                                            <div class="card-text text-sm-center">
                                                                <a href="#"><i class="fa fa-inr" aria-hidden="true"></i> 200 per kg</i></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <strong class="card-title mb-3"><img src="images/offer.png" width="25px"> Offer bulk purchase</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="images/of4.png">
                                                            <div class="mx-auto d-block">
                                                            
                                                                <h5 class="text-sm-center mt-2 mb-1">American Sweet Corn</h5>
                                                            </div>
                                                            <hr>
                                                            <div class="card-text text-sm-center">
                                                                <a href="#"><i class="fa fa-inr" aria-hidden="true"></i> 200 per kg</i></a>
                                                            </div>
                                                        </div>
                                                        <!--<div class="card-footer">
                                                            <strong class="card-title mb-3"><img src="images/offer.png" width="25px"> Offer bulk purchase</strong>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="images/of3.png">
                                                            <div class="mx-auto d-block">
                                                            
                                                                <h5 class="text-sm-center mt-2 mb-1">American Sweet Corn</h5>
                                                            </div>
                                                            <hr>
                                                            <div class="card-text text-sm-center">
                                                                <a href="#"><i class="fa fa-inr" aria-hidden="true"></i> 200 per kg</i></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <strong class="card-title mb-3"><img src="images/offer.png" width="25px"> Offer bulk purchase</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            
                            </div>
                        </div>
                                    
                        <div class="content">
                            <div class="animated fadeIn">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title" v-if="headerText">Testimonials</strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="mx-auto d-block">
                                                                <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">
                                                                <h5 class="text-sm-center mt-2 mb-1">Steven Lee</h5>
                                                                <div class="card-text text-sm-center">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </div>
                                                                <hr>
                                                                <div class="location text-sm-center"> very much good at this service in this catagory also have good sense of humour to conveince in right path of sales. knowledgeful guys helping so much</div>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        <div class="card-footer">
                                                            <strong class="card-title mb-3">Review Title</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="mx-auto d-block">
                                                                <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">
                                                                <h5 class="text-sm-center mt-2 mb-1">Evan Lee</h5>
                                                                <div class="card-text text-sm-center">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            </div>
                                                                <hr>
                                                                <div class="location text-sm-center"> very much good at this service in this catagory also have good sense of humour to conveince in right path of sales. knowledgeful guys helping so much</div>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        <div class="card-footer">
                                                            <strong class="card-title mb-3">Review Title</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="mx-auto d-block">
                                                                <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">
                                                                <h5 class="text-sm-center mt-2 mb-1">Bruce Lee</h5>
                                                                <div class="card-text text-sm-center">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            </div>
                                                                <hr>
                                                                <div class="location text-sm-center"> very much good at this service in this catagory also have good sense of humour to conveince in right path of sales. knowledgeful guys helping so much</div>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        <div class="card-footer">
                                                            <strong class="card-title mb-3">Review Title</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                </div>
                        
                            </div>
                        </div>  
                        
                    </div>
                </div>
            </div>



        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->