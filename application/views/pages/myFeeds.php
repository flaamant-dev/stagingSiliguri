<?php
    $all_feed =  $this->Feed_model->show_feed();


?>
    <div class="animated fadeIn">
        <div class="row mx-auto">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">


                <div class="row mx-auto">
                    <!--Feed detail-->
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 px-0">

                        <div class="p-3">
                            <div class="row mb-3">
                                <div class="col-8">
                                    <select class="form-control searchFeed" name="state" id="searchFeed" style="width: 100%;">    
                                    <option value="AR">Argentina</option>
                                    <option value="AU">Australia</option>
                                </select>

                                </div>
                                <div class="col-4 pl-0">
                                    <label class="custom-select">
                                        <select name="sample">
                                          <option value="1">one</option>
                                          <option value="2">two</option>
                                          <option value="3">three</option>
                                          <option value="4">four</option>
                                        </select>
                                    </label>
                                </div>
                            </div>


                            <div class="row mr-sm-0">
                                <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 pr-sm-0">
                                    <div class="cus-info-border mb-3 bg-white">
                                        <div class="cus-info-header">
                                            <div class="d-flex row-middle">
                                                <div class="cs-logo-container">
                                                    <img src="./images/l.jpg" class="cs-logo-rounded">
                                                </div>
                                                <div class="ml-2 line-height-16 d-inline-block text-truncate" style="max-width: 95%;">
                                                    <span class="font-small font-bold cs-text-dark mb-0">Name of Business or title
                                                            </span>
                                                    <span class="d-block font-extra-small text-secondary">5 Days Ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-feed-image-container">
                                            <img src="./images/aadc.png" class="w-100" />
                                        </div>
                                        <div class="p-3">
                                            <h5 class="font-small d-block font-bold cs-text-dark mb-1">Name of Business or title</h5>
                                            <p class="font-extra-small text-secondary line-height-16 mb-1">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs</p>
                                            <span class="d-block line-height-16 mb-1">
                                                        <span class="font-extra-small">Link :</span>
                                            <a href="https://www.w3schools.com/" target="_blank" class="font-extra-small">Google</a>
                                            </span>
                                            <div class="d-flex justify-content-around mt-2">
                                                <img class="align-self-center rounded-circle" style="width:22px;" src="images/love.png">
                                                <i class="fa fa-share-alt" style="color: #007BFF; font-size: 22px"></i>
                                                <i class="fa fa-ellipsis-v" style="color: #007BFF; font-size: 22px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 pr-sm-0">
                                    <div class="cus-info-border mb-3 bg-white">
                                        <div class="cus-info-header">
                                            <div class="d-flex row-middle">
                                                <div class="cs-logo-container">
                                                    <img src="./images/l.jpg" class="cs-logo-rounded">
                                                </div>
                                                <div class="ml-2 line-height-16 d-inline-block text-truncate" style="max-width: 95%;">
                                                    <span class="font-small font-bold cs-text-dark mb-0">Name of Business or title
                                                            </span>
                                                    <span class="d-block font-extra-small text-secondary">5 Days Ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-feed-image-container">
                                            <img src="./images/aadc.png" class="w-100" />
                                        </div>
                                        <div class="p-3">
                                            <h5 class="font-small d-block font-bold cs-text-dark mb-1">Name of Business or title</h5>
                                            <p class="font-extra-small text-secondary line-height-16 mb-1">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs</p>
                                            <span class="d-block line-height-16 mb-1">
                                                        <span class="font-extra-small">Link :</span>
                                            <a href="https://www.w3schools.com/" target="_blank" class="font-extra-small">Google</a>
                                            </span>
                                            <div class="d-flex justify-content-around mt-2">
                                                <img class="align-self-center rounded-circle" style="width:22px;" src="images/love.png">
                                                <i class="fa fa-share-alt" style="color: #007BFF; font-size: 22px"></i>
                                                <i class="fa fa-ellipsis-v" style="color: #007BFF; font-size: 22px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 pr-sm-0">
                                    <div class="cus-info-border mb-3 bg-white">
                                        <div class="cus-info-header">
                                            <div class="d-flex row-middle">
                                                <div class="cs-logo-container">
                                                    <img src="./images/l.jpg" class="cs-logo-rounded">
                                                </div>
                                                <div class="ml-2 line-height-16 d-inline-block text-truncate" style="max-width: 95%;">
                                                    <span class="font-small font-bold cs-text-dark mb-0">Name of Business or title
                                                            </span>
                                                    <span class="d-block font-extra-small text-secondary">5 Days Ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-feed-image-container">
                                            <img src="./images/aadc.png" class="w-100" />
                                        </div>
                                        <div class="p-3">
                                            <h5 class="font-small d-block font-bold cs-text-dark mb-1">Name of Business or title</h5>
                                            <p class="font-extra-small text-secondary line-height-16 mb-1">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs</p>
                                            <span class="d-block line-height-16 mb-1">
                                                        <span class="font-extra-small">Link :</span>
                                            <a href="https://www.w3schools.com/" target="_blank" class="font-extra-small">Google</a>
                                            </span>
                                            <div class="d-flex justify-content-around mt-2">
                                                <img class="align-self-center rounded-circle" style="width:22px;" src="images/love.png">
                                                <i class="fa fa-share-alt" style="color: #007BFF; font-size: 22px"></i>
                                                <i class="fa fa-ellipsis-v" style="color: #007BFF; font-size: 22px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <?php
                                    foreach($all_feed as $feed){
                                ?>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 pr-sm-0">
                                    <div class="cus-info-border mb-3 bg-white">
                                        <div class="cus-info-header">
                                            <div class="d-flex row-middle">
                                                <div class="cs-logo-container">
                                                    <img src="./images/stores/<?php echo $feed['business_registry_id']; ?>/logo/<?php echo $feed['logo'];?>" class="cs-logo-rounded">
                                                </div>
                                                <div class="ml-2 line-height-16 d-inline-block text-truncate" style="max-width: 95%;">
                                                    <span class="font-small font-bold cs-text-dark mb-0"><?php  echo $feed['business_name'];?>
                                                            </span>
                                                    <span class="d-block font-extra-small text-secondary"><?php echo date("d/m/Y",strtotime($feed['timestamp'])); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-feed-image-container">
                                            <img src="./images/feed_img/<?php  echo $feed['image'];?>" class="w-100" />
                                        </div>
                                        <div class="p-3">
                                            <h5 class="font-small d-block font-bold cs-text-dark mb-1"><?php  echo $feed['title'];?></h5>
                                            <p class="font-extra-small text-secondary line-height-16 mb-1"><?php  echo character_limiter($feed['description'],50);?></p>
                                            <span class="d-block line-height-16 mb-1">
                                                        <span class="font-extra-small">Link :</span>
                                            <a href="https://www.w3schools.com/" target="_blank" class="font-extra-small">Google</a>
                                            </span>
                                            <div class="d-flex justify-content-around mt-2">
                                                <img class="align-self-center rounded-circle" style="width:22px;" src="images/love.png">
                                                <i class="fa fa-share-alt" style="color: #007BFF; font-size: 22px"></i>
                                                <i class="fa fa-ellipsis-v" style="color: #007BFF; font-size: 22px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>




                                <!--Display block on small devices i.e under 767px-->
                                <div class="col-12 pr-sm-0 d-block d-md-none d-lg-none d-xl-none">
                                    <!--Sponser-->
                                    <div class="cus-info-border">
                                        <div class="cus-info-header">
                                            <span class="font-bold cs-text-dark">Sponser</span>
                                        </div>
                                        <div class="cus-info-body">
                                            <div class="d-flex mb-2 row-middle">
                                                <div class="cs-logo-container">
                                                    <img src="./images/l.jpg" class="cs-logo-rounded">
                                                </div>
                                                <div class="ml-2 line-height-16">
                                                    <h5 class="font-small d-block font-bold cs-text-dark mb-0">Name of Business or title
                                                    </h5>
                                                    <span>
                                                        <span class="font-extra-small">Link :</span>
                                                    <a href="https://www.w3schools.com/" target="_blank" class="font-extra-small">Google</a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2 row-middle">
                                                <div class="cs-logo-container">
                                                    <img src="./images/Dental/dental-logo-2.jpg" class="cs-logo-rounded">
                                                </div>
                                                <div class="ml-2 line-height-16">
                                                    <h5 class="font-small d-block font-bold cs-text-dark mb-0">Name of Business or title
                                                    </h5>
                                                    <span>
                                                        <span class="font-extra-small">Link :</span>
                                                    <a href="https://www.w3schools.com/" target="_blank" class="font-extra-small">Google</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <!--End Sponser-->

                                    <!--Your Feed-->
                                    <div class="cus-info-border mt-3">
                                        <div class="cus-info-header">
                                            <span class="font-bold">Your Feed</span>
                                        </div>
                                        <div class="cus-info-body">
                                            <div class="d-flex mb-3">
                                                <div class="cs-logo-container">
                                                    <img src="./images/Dental/dental-logo-2.jpg" class="cs-logo-rounded" />
                                                </div>
                                                <div class="ml-2 line-height-16">
                                                    <h5 class="font-small d-block font-bold cs-text-dark mb-1">Name of Business or title
                                                    </h5>
                                                    <span class="font-extra-small text-secondary">Lorem ipsum, or lipsum
                                                        as it is sometimes known, is dummy text used in laying out
                                                        print, graphic or web designs</span>
                                                    <div class="d-flex mt-1">
                                                        <button type="button" class="btn btn-primary btn-sm font-extra-small">View</button>
                                                        <button type="button" class="btn btn-primary btn-sm font-extra-small ml-2">New&nbsp;&nbsp;<i
                                                                class="fa fa-plus"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <div class="cs-logo-container">
                                                    <img src="./images/l.jpg" class="cs-logo-rounded" />
                                                </div>
                                                <div class="ml-2 line-height-16">
                                                    <h5 class="font-small d-block font-bold cs-text-dark mb-1">Name of Business or title
                                                    </h5>
                                                    <span class="font-extra-small text-secondary">Lorem ipsum, or lipsum
                                                        as it is sometimes known, is dummy text used in laying out
                                                        print, graphic or web designs</span>
                                                    <div class="d-flex mt-1">
                                                        <button type="button" class="btn btn-primary btn-sm font-extra-small">View</button>
                                                        <button type="button" class="btn btn-primary btn-sm font-extra-small ml-2">New&nbsp;&nbsp;<i
                                                                    class="fa fa-plus"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Your Feed-->
                                </div>
                                <!--Display block on small devices i.e under 767px-->
                            </div>
                        </div>
                    </div>
                    <!-- /Feed detail-->

                    <!--Display none on smaller devices-->
                    <div class="d-none d-sm-none d-md-block d-lg-block d-xl-block col-md-4 px-0">
                        <div class="sticky-top pr-md-3">
                            <!--Sponser-->
                            <div class="cus-info-border bg-white">
                                <div class="cus-info-header">
                                    <span class="font-bold cs-text-dark">Sponser</span>
                                </div>
                                <div class="cus-info-body">
                                    <div class="d-flex mb-2 row-middle">
                                        <div class="cs-logo-container">
                                            <img src="./images/l.jpg" class="cs-logo-rounded">
                                        </div>
                                        <div class="ml-2 line-height-16 d-inline-block text-truncate" style="max-width: 95%;">
                                            <span class="font-small font-bold cs-text-dark mb-0">Name of Business or title
                                            </span>
                                            <span class="d-block">
                                                        <span class="font-extra-small">Link :</span>
                                            <a href="https://www.w3schools.com/" target="_blank" class="font-extra-small">Google</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-2 row-middle">
                                        <div class="cs-logo-container">
                                            <img src="./images/Dental/dental-logo-2.jpg" class="cs-logo-rounded">
                                        </div>
                                        <div class="ml-2 line-height-16 d-inline-block text-truncate" style="max-width: 95%;">
                                            <span class="font-small font-bold cs-text-dark mb-0">Name of Business or title
                                            </span>
                                            <span class="d-block">
                                                        <span class="font-extra-small">Link :</span>
                                            <a href="https://www.w3schools.com/" target="_blank" class="font-extra-small">Google</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <!--End Sponser-->

                            <!--Your Feed-->
                            <div class="cus-info-border bg-white mt-3">
                                <div class="cus-info-header">
                                    <span class="font-bold">Your Feed</span>
                                </div>
                                <div class="cus-info-body">
                                    <div class="d-flex mb-3">
                                        <div class="cs-logo-container">
                                            <img src="./images/Dental/dental-logo-2.jpg" class="cs-logo-rounded" />
                                        </div>
                                        <div class="ml-2 line-height-16">
                                            <div class="d-inline-block text-truncate" style="max-width: 95%;">
                                                <span class="font-small font-bold cs-text-dark mb-1">Name of Business or title</span>
                                            </div>

                                            <p class="font-extra-small line-height-16 text-secondary mb-0">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs</p>
                                            <div class="d-flex mt-1">
                                                <button type="button" class="btn btn-primary btn-sm font-extra-small">View</button>
                                                <button type="button" class="btn btn-primary btn-sm font-extra-small ml-2">New&nbsp;&nbsp;<i
                                                                class="fa fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="cs-logo-container">
                                            <img src="./images/l.jpg" class="cs-logo-rounded" />
                                        </div>
                                        <div class="ml-2 line-height-16">
                                            <div class="d-inline-block text-truncate" style="max-width: 95%;">
                                                <span class="font-small font-bold cs-text-dark mb-1">Name of Business or title</span>
                                            </div>

                                            <p class="font-extra-small line-height-16 text-secondary mb-0">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs</p>
                                            <div class="d-flex mt-1">
                                                <button type="button" class="btn btn-primary btn-sm font-extra-small">View</button>
                                                <button type="button" class="btn btn-primary btn-sm font-extra-small ml-2">New&nbsp;&nbsp;<i
                                                                class="fa fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Your Feed-->

                        </div>
                    </div>
                    <!--Display none on smaller devices-->

                </div>

            </div>

        </div>
    </div>
    <!-- .animated -->


    <div class="clearfix"></div>

    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-6">
                    Copyright &copy; 2018 Ela Admin
                </div>
                <div class="col-6 text-right">
                    Designed by <a href="https://colorlib.com">Colorlib</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


    <!-- Select 2 Script -->
    <script src="./assets/Plugins/select2/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            // $('.searchCategory').select2({
            //     minimumResultsForSearch: Infinity
            // });

            $('.searchFeed').select2();
        });
        //custom select
        const selector = document.querySelector('.custom-select');

        selector.addEventListener('change', e => {
            console.log('changed', e.target.value)
        })

        selector.addEventListener('mousedown', e => {
            if (window.innerWidth >= 320) { // override look for non mobile
                e.preventDefault();

                const select = selector.children[0];
                const dropDown = document.createElement('ul');
                dropDown.className = "selector-options";

                [...select.children].forEach(option => {
                    const dropDownOption = document.createElement('li');
                    dropDownOption.textContent = option.textContent;

                    dropDownOption.addEventListener('mousedown', (e) => {
                        e.stopPropagation();
                        select.value = option.value;
                        selector.value = option.value;
                        select.dispatchEvent(new Event('change'));
                        selector.dispatchEvent(new Event('change'));
                        dropDown.remove();
                    });

                    dropDown.appendChild(dropDownOption);
                });

                selector.appendChild(dropDown);

                // handle click out
                document.addEventListener('click', (e) => {
                    if (!selector.contains(e.target)) {
                        dropDown.remove();
                    }
                });
            }
        });
    </script>
    <!-- Select 2 Script -->
