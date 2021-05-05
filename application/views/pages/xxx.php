<?php 
    $user = $this->User_model->show_user(7); 
    $professional_details =  $this->User_model->show_professional_info(7); 
?>


    <div class="content">
        <div class="animated fadeIn">
            

                <div class="ui-typography">
                    <div class="row">
                        <div class="col-md-12">
          
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title" v-if="headerText"><?php echo $professional_details['first_name'].' '.$professional_details['last_name']; ?>
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
                                                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo $professional_details['profile_picture']; ?>">
                                                        </a>
                                                        <h2>
                                                            Dr. <?php echo $professional_details['first_name'].' '.$professional_details['last_name']; ?>
                                                            <img class="align-self-center rounded-circle mr-3" style="width:22px;" alt="" src="images/badge2.png">
                                                        </h2>
                                                        <h4 style="padding: 10px 0 10px 0;">Cardiologist . Surgeon</h4>
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
                                                    <button type="button" class="btn btn-success btn-sm" onclick="location.href='#book_appointment'">Book Appointment</button>
                                                    <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='tel:+919641666523'">Call</button>
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
                                                        <p>MBBS DM in Cardiolgy</p>
                                                        <p >Specializations in heart surgery, bypass surgery, halter monitoring, pulse expert with 11 year experience</p>
                                                        <p><a href="#1"><i class="fa fa-comments"></i> 381 Patient Stories</a></p>
                                                    
                                                    </div>
                                                </div>                                                     
                                            </section>
                                        </div>                      
                                    </div>
                                                                        
                                </div>
                                                                                    
                            </div>

                        </div>
                    </div>
                </div>

                
                <div class="ui-typography">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title" v-if="headerText">Stay safe stay healthy - Dr. Aron Jose </strong>
                                </div>
                                <div class="card-body">
                                    <div class="row col-12">
                                        <div class="col-md-7">
                                            <iframe width="100%" height="257" src="https://www.youtube.com/embed/e5ZIrUQ_Gwc?autoplay=1&mute=1" frameborder="0" allow="accelerometer; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                        <div class="col-md-5 appointment_area" id="book_appointment">
                                            <h4 class=" appointment" align="center">Appointment with Dr. Alen Jose</h4> 
                                            <div class="alert alert-success ad_doc_app" >
                                                <p class="clinic_head">Agfa Heart Clinic</p><br>
                                                <a href="" class="app_date">5:00pm - 7:00pm</a>
                                                <a href="" class="app_date">5:00pm - 7:00pm</a>
                                                <a href="" class="app_date">5:00pm - 7:00pm</a>
                                                <a href="" class="app_date">5:00pm - 7:00pm</a><br><br>
                                                <p class="clinic_head">CMGK Heart Clinic</p><br>
                                                <a href="" class="app_date">5:00pm - 7:00pm</a>
                                                <a href="" class="app_date">5:00pm - 7:00pm</a>
                                                <a href="" class="app_date">5:00pm - 7:00pm</a>
                                                <a href="" class="app_date">5:00pm - 7:00pm</a><br>
                                            </div>                    
                                        </div>   
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="ui-typography">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                            
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Review</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Blogs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-qa-tab" data-toggle="pill" href="#pills-qa" role="tab" aria-controls="pills-qa" aria-selected="false">Q & A</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <h3>Info</h3>
                                            <p><i class="fa fa-info-circle" aria-hidden="true"></i></p>
                                            <p>Short description about the business like product or service details or dealing details</p><br>
                                            <p>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i> 
                                            20 ratings
                                            </p><br>
                                            <p><i class="fa fa-thumbs-up" aria-hidden="true"></i> 1020 people like this</p><br>
                                            <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:09641666523">9641666523</a></p><br>
                                            <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:sandipantar@gmail.com">sandipantar@gmail.com</a></p><br>
                                            <p><i class="fa fa-list-alt" aria-hidden="true"></i> Catgory . sub- catagory</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Service</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Specializations</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Award & Recognitions</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Education & Qualifications</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Experience</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Membership</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card border border-success">
                                                        <div class="card-header">
                                                            <strong class="card-title">Registration</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>                                                                    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <h3>Review</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nobis, fugit pariatur minima! Dolorum modi pariatur aperiam quas odio nulla, illo necessitatibus dolor a.
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <h3>Blogs</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nobis, fugit pariatur minima! Dolorum modi pariatur aperiam quas odio nulla, illo necessitatibus dolor a.
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="pills-qa" role="tabpanel" aria-labelledby="pills-qa-tab">
                                            <h3>Q & A</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nobis, fugit pariatur minima! Dolorum modi pariatur aperiam quas odio nulla, illo necessitatibus dolor a.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="breadcrumbs">
                                <div class="breadcrumbs-inner">
                                    <div class="row m-0">
                                        <div class="col-sm-12">
                                            <div class="page-header float-left">
                                                <div class="page-title">
                                                    <h2>More Cardiologists are</h2>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                                                    
                                <div class="col-md-4">
                                    <section class="card">
                                        <div class="twt-feed blue-bg">
                                            <div class="corner-ribon black-ribon">
                                                <i class="fa fa-twitter"></i>
                                            </div>
                                            <div class="fa fa-twitter wtt-mark"></div>

                                            <div class="media">
                                                <a href="#">
                                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/admin.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <h2 class="text-white display-6">Jim Doe</h2>
                                                    <p class="text-light">Project Manager</p>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="weather-category twt-category">
                                            <ul>
                                                <li class="active">
                                                    <h5>750</h5>
                                                    Tweets
                                                </li>
                                                <li>
                                                    <h5>865</h5>
                                                    Following
                                                </li>
                                                <li>
                                                    <h5>3645</h5>
                                                    Followers
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="twt-write col-sm-12">
                                            <textarea placeholder="Write your Tweet and Enter" rows="1" class="form-control t-text-area"></textarea>
                                        </div>
                                        <footer class="twt-footer">
                                            <a href="#"><i class="fa fa-camera"></i></a>
                                            <a href="#"><i class="fa fa-map-marker"></i></a>
                                            New Castle, UK
                                            <span class="pull-right">
                                                32
                                            </span>
                                        </footer>
                                    </section>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> 
                               
        
        </div>
    </div><!-- .content -->



    <div class="clearfix"></div>

    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    ===================================
                </div>
                <div class="col-sm-6 text-right">
                    ====================================
                </div>
            </div>
        </div>
    </footer>
