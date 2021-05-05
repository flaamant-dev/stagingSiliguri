<?php
    $doctor_cat = $this->Category_model->show_category_doctor();
    $all_doctors =  $this->Doctor_model->show_doctors();
?>

<!-- <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-lg-6 col-sm-6">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h4>Book from 2493 Dentist in Bangalore</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <h5>With predicted wait-time & verified details</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<div class="content">
    <div class="animated fadeIn">

        <div class="filter-res" id="filter-res">
            <div id="mySidenav" class="sidenav filter-action">
                <a href="javascript:void(0)" class="closebtn" onclick="close_filter()">&times;</a>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Clients</a>
                <a href="#">Contact</a>
            </div>

            <span style="font-size:30px;cursor:pointer" onclick="open_filter()"><i class="fa fa-filter mr-1"></i>
            </span>
        </div>
        <div class="col-md-3 filter" style=" float: left">
            <div class="filter">
                <div class="col-12  bg-light filter1 filter-action">
                    <small>
                        <!-- Section: Sidebar -->
                        <section>

                            <!-- Section: Filters -->
                            <section class="pd-4 pt-4">
                                <h6 class="font-weight-bold text-uppercase">Filters</h6>
                            </section>
                            <hr>

                            <!-- Section: specialisation -->
                            <section class="mb-3 pl-3" id="specialization1">
                                <div class="d-flex" style="justify-content:space-between;">
                                    <a class="navbar-toggler pl-0 pr-0" data-toggle="collapse"
                                        data-target="#specialization" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <h6 class="font-weight-bold text-uppercase">Specialization</h6>
                                    </a>
                                    <a class="navbar-toggler pl-0" data-toggle="collapse" data-target="#specialization"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                            style="color: grey; font-size: small;"></i>
                                    </a>
                                </div>

                                <div class="navbar-collapse collapse pl-5" id="specialization"
                                    style="height:180px; overflow-y:auto;">
                                    <?php if( $doctor_cat != NULL ) { foreach($doctor_cat as $doccat) {?>
                                    <div class="form-check pl-0 mb-3" id="aaaasdssssddd">
                                        <input type="checkbox" class="form-check-input" id="xxxxxx">
                                        <label class="form-check-label"><?php echo $doccat['cat_name']; ?></label>
                                    </div>
                                    <?php }} ?>
                                </div>
                            </section>
                            <hr>
                            <!-- End Specialisation -->

                            <!-- Section: Available -->
                            <section class="mb-3 pl-3">

                                <div class="d-flex" style="justify-content:space-between;">
                                    <a class="navbar-toggler pl-0" data-toggle="collapse" data-target="#available"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <h6 class="font-weight-bold text-uppercase">Available</h6>
                                    </a>
                                    <a class="navbar-toggler" data-toggle="collapse" data-target="#available"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                            style="color: grey; font-size: small;"></i>
                                    </a>
                                </div>

                                <div class="navbar-collapse collapse pl-5" id="available">

                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">Now</label>
                                    </div>
                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input filled-in">
                                        <label class="form-check-label">Today</label>
                                    </div>
                                    <div class="d-flex" style="border: 1px solid rgba(0,0,0,.1); margin-left: -50px;">
                                        <div class="avail">Any</div>
                                        <div class="avail">S</div>
                                        <div class="avail">M</div>
                                        <div class="avail">T</div>
                                        <div class="avail">W</div>
                                        <div class="avail">T</div>
                                        <div class="avail">F</div>
                                        <div class="avail">S</div>
                                    </div>

                                </div>


                            </section>
                            <hr>
                            <!-- End Available -->

                            <!--Gender section-->
                            <section class="mb-3 pl-3">

                                <div class="d-flex" style="justify-content:space-between;">
                                    <a class="navbar-toggler pl-0" data-toggle="collapse" data-target="#gender"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <h6 class="font-weight-bold text-uppercase">Gender</h6>
                                    </a>

                                    <a class="navbar-toggler" data-toggle="collapse" data-target="#gender"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                            style="color: grey; font-size: small;"></i>
                                    </a>
                                </div>

                                <div class="collapse pl-4" id="gender">
                                    <div class="form-check">
                                        <div class="radio mb-3">
                                            <label for="radio1" class="form-check-label">
                                                <input type="radio" id="radio1" name="radios" value="option1"
                                                    class="form-check-input">Male
                                            </label>
                                        </div>
                                        <div class="radio mb-3">
                                            <label for="radio2" class="form-check-label">
                                                <input type="radio" id="radio2" name="radios" value="option2"
                                                    class="form-check-input">Female
                                            </label>
                                        </div>
                                    </div>



                                </div>
                                <hr>

                            </section>
                            <!--/ Gender section-->


                            <!-- Section: Sort -->
                            <section class="mb-4 pl-3">

                                <div class="d-flex" style="justify-content:space-between;">
                                    <a class="navbar-toggler pl-0" data-toggle="collapse" data-target="#sort"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <h6 class="font-weight-bold text-uppercase">Sort-by</h6>
                                    </a>
                                    <a class="navbar-toggler" data-toggle="collapse" data-target="#sort"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                            style="color: grey; font-size: small;"></i>
                                    </a>
                                </div>



                                <div class="collapse pl-5" id="sort">

                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">Relevance</label>
                                    </div>
                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input filled-in">
                                        <label class="form-check-label">Price low-high</label>
                                    </div>
                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input filled-in">
                                        <label class="form-check-label">Price high to low</label>
                                    </div>
                                    <div class="form-check pl-0 mb-3 pb-1">
                                        <input type="checkbox" class="form-check-input filled-in">
                                        <label class="form-check-label">Year of experience</label>
                                    </div>
                                    <div class="form-check pl-0 pb-1">
                                        <input type="checkbox" class="form-check-input filled-in">
                                        <label class="form-check-label">Recommendation</label>
                                    </div>
                                </div>
                                <hr>

                            </section>
                            <!-- End Sort -->


                            <!-- Section: Locality -->
                            <section class="mb-3 pl-3">

                                <div class="d-flex" style="justify-content:space-between;">
                                    <a class="navbar-toggler pl-0" data-toggle="collapse" data-target="#local"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <h6 class="font-weight-bold text-uppercase">Locality</h6>
                                    </a>
                                    <a class="navbar-toggler" data-toggle="collapse" data-target="#local"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                            style="color: grey; font-size: small;"></i>
                                    </a>
                                </div>

                                <div class="collapse pl-5" id="local">


                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input" value="on">
                                        <label class="form-check-label">Siliguri</label>
                                    </div>

                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input" value="on">
                                        <label class="form-check-label">Kolkata</label>
                                    </div>


                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input" value="on">
                                        <label class="form-check-label">Delhi</label>
                                    </div>


                                    <div class="form-check pl-0">
                                        <input type="checkbox" class="form-check-input" value="on">
                                        <label class="form-check-label">Mumbai</label>
                                    </div>

                                </div>
                                <hr>
                            </section>
                            <!-- End Locality -->

                            <!--section-Fees-->
                            <section class="mb-3 pl-3">

                                <div class="d-flex" style=" justify-content:space-between;">
                                    <a class="navbar-toggler pl-0" data-toggle="collapse" data-target="#offer"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <h6 class="font-weight-bold text-uppercase">Clinic Fees</h6>
                                    </a>
                                    <a class="navbar-toggler" data-toggle="collapse" data-target="#offer"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                            style="color: grey; font-size: small;"></i>
                                    </a>
                                </div>

                                <div class="collapse pl-5" id="offer">
                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">&#8377; 200 - &#8377; 500</label>
                                    </div>
                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">&#8377; 500 - &#8377; 800</label>
                                    </div>
                                    <div class="form-check pl-0">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">&#8377; 800 - &#8377; 1000</label>
                                    </div>
                                </div>
                                <hr>
                            </section>
                            <!-- end fees -->

                            <!-- Section: Services-->
                            <section class="mb-3 pl-3">

                                <div class="d-flex" style=" justify-content:space-between;">
                                    <a class="navbar-toggler pl-0" data-toggle="collapse" data-target="#services"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <h6 class=" font-weight-bold text-uppercase">Services</h6>
                                    </a>
                                    <a class="navbar-toggler" data-toggle="collapse" data-target="#services"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                            style="color: grey; font-size: small;"></i>
                                    </a>
                                </div>

                                <div class="collapse pl-5" id="services">


                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">Service 1</label>
                                    </div>

                                    <div class="form-check pl-0 mb-3">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">Service 2</label>
                                    </div>

                                    <div class="form-check pl-0">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">Service 3</label>
                                    </div>

                                </div>

                                <hr>
                            </section>
                            <!-- Section: Services-->

                        </section>
                        <!-- Section: Sidebar -->
                    </small>
                </div>

            </div>
        </div>
        <div class="col-md-9 d-full-md" style=" float: left">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 mb-2">
                                    <div class="mx-auto d-block">
                                        <img class="mx-auto d-block" src="images/Dental/dental-logo-1.jpg"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7">
                                    <div class="mx-auto d-block">
                                        <strong>
                                            <h4 class="mb-2" style="color: #14bef0;">Vignesh Dental Speciality
                                            </h4>
                                        </strong>
                                        <div class="mb-2" style="line-height: 20px;"><span class="font-medium">3
                                                Dentists,&nbsp;1 Oral and MaxilloFacial Surgeon,&nbsp;1
                                                Periodonist,&nbsp;2 Dental Surgeons,&nbsp;1 Pediatric
                                                Dentist.</span></div>
                                        <div class="d-none d-lg-block d-md-block">
                                            <div class="d-flex mb-2">
                                                <div><img src="images/Dental/dental-clinic-1.jpg" class="img-clinic">
                                                </div>
                                                <div><img src="images/Dental/dental-clinic-2.jpg"
                                                        class="img-clinic ml-1"></div>
                                                <div><img src="images/Dental/dental-clinic-3.jpg"
                                                        class="img-clinic ml-1"></div>
                                                <div><img src="images/Dental/dental-clinic-4.jpg"
                                                        class="img-clinic ml-1"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                                <div class="badge-style">
                                                    <span class="extra-small">Service 1</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-none d-lg-block d-md-block mb-2">
                                                <div class="badge-style">
                                                    <span class="extra-small">Service 2</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-none d-lg-block d-md-block mb-2">
                                                <div class="badge-style">
                                                    <span class="extra-small">Service 3</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                                <div class="">
                                                    <span class="extra-small" style="vertical-align: sub;">View
                                                        all 55 others</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-2 d-flex">
                                        <div><i class="fa fa-thumbs-up"></i></div>
                                        <div class="ml-2"><span
                                                class="font-medium text-success"><strong>97%</strong></span>
                                        </div>
                                    </div>
                                    <div class="mb-2 d-flex">
                                        <div><i class="fa fa-comments-o"></i></div>
                                        <div class="ml-2"><span class="font-medium">146 Patient Stories</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 d-flex">
                                        <div><i class="fa fa-map-marker"></i></div>
                                        <div class="ml-3"><span class="font-medium">Rajajinagar,
                                                Bangalore</span></div>
                                    </div>
                                    <div class="mb-2 d-flex">
                                        <div><i class="fa fa-money"></i></div>
                                        <div class="ml-2"><span class="font-medium"><i class="fa fa-rupee"></i>&nbsp;250
                                                - 350 <i class="fa fa-info-circle ml-2"></i></span></div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="d-flex">
                                            <div><i class="fa fa-clock-o"></i></div>
                                            <div class="ml-2"><span class="font-medium"
                                                    style="color: rgba(0, 0, 0, 0.8);"><strong>&nbsp;Mon-Sat</strong></span>
                                            </div>
                                        </div>
                                        <div class="extra-small" style="line-height: 20px;">10:00 AM - 01:30 PM
                                            , 05:00 PM - 09:00 PM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-between pt-3">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="text-muted mt-3" style="font-size: 11px;">SPONSERED</div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-6 pl-sm-0 pl-xs-0">
                                    <a href="tel:+919865743215">
                                        <button type="button" class="btn btn-sm btn-block resp-btn" style="background-color: #14bef0;">
                                            <i class="fa fa-phone text-white"></i>
                                            <span class="font-medium text-white res-text"><strong>Call now</strong></span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if( $all_doctors != NULL ) { foreach($all_doctors as $docs) {?>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 mb-2">
                                    <div class="mx-auto d-block" style="position: relative; width: 100px;">
                                        <img src="<?php echo $docs['profile_picture']; ?>" class="img-fluid"
                                            style="width: 100px; border-radius: 50%;">
                                        <div class="icon-pos"><i class="fa fa-check"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="mb-1">
                                        <a href="#" style="font-size: 20px; color: #14bef0;">Dr.
                                            <?php echo $docs['first_name'].' '.$docs['last_name']; ?></a>
                                    </div>
                                    <div class="mb-1">
                                        <div class="text-muted">Dentist</div>
                                        <div class="text-muted">18 years experience overall</div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex">
                                            <div><a href="#" class="font-medium text-dark"><strong>Jaynagar 9
                                                        block , Bangalore</strong></a></div>
                                            <div><i class="fa fa-circle ml-2 mr-2 icon-dot"></i></div>
                                            <div><a href="#" class="font-medium text-dark hov-underline">Infinit
                                                    Dental Solution</a></div>
                                            <div class="ml-2"><a href="#" class="font-medium text-dark hov-underline">+4
                                                    more</a>
                                            </div>
                                        </div>
                                        <div class="font-medium text-dark"><i class="fa fa-rupee mr-1"></i>300
                                            Consultation fee at clinic</div>
                                        <div class="mt-2 mb-2" style="border-bottom: 2px dotted rgb(221, 221, 221);">
                                        </div>
                                        <div class="mt-2">
                                            <button type="button" class="btn btn-danger btn-sm font-medium"
                                                style="padding: 2px 7px;">
                                                <i class="fa fa-heart mr-1"></i>&nbsp; 99%
                                            </button>
                                            <a href="#" class="text-dark">
                                                <span class="font-medium ml-2 font-weight-six"><u>81 Patient
                                                        Stories</u></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-lg-5 mt-md-5 mt-sm-2 mt-2">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 mb-2">
                                                <div class="font-medium text-success text-center">
                                                    <i class="fa fa-calendar mr-2"></i>
                                                    <strong>Available Today</strong>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 mb-2">
                                                <a class="btn btn-success btn-sm btn-block"
                                                    href="<?php echo base_url(); ?>doctor_details/<?php echo $docs['user_id']; ?>">
                                                    <i class="fa fa-bolt text-white"></i>
                                                    <span class="font-medium text-white"><strong>Book
                                                            Appointment</strong></span>
                                                </a>
                                            </div>
                                            <div class="col-md-12 col-sm-6 mb-2">
                                                <a href="tel:+919865743215" class="btn bg-success btn-sm btn-block">
                                                    <i class="fa fa-phone text-white"></i>
                                                    <span class="font-medium text-white"><strong>Call
                                                            Now</strong></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>


        </div>
    </div>
</div>
<div class="clearfix"></div>

<?php $this->load->view('page_footer'); ?>

</div>
<!-- /#right-panel -->