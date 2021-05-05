<?php
    //$doctor_cat = $this->Category_model->show_category_doctor();
    $all_doctors =  $this->Doctor_model->show_doctors();
?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
        
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Click a category to search a Doctor in it</h4>
                        </div>
                        <!-- <div class="card-body">
                            <div class="custom-tab">

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <?php if($doctor_cat != NULL) { foreach($doctor_cat as $cat) { ?>
                                            <a 
                                                class="nav-item nav-link <?php if($cat['cat_name'] == 'Ayurvedic Doctors') echo 'active'; ?>"
                                                href="#custom-nav_<?php echo $cat['cat_id']; ?>" 
                                                id="custom-nav_<?php echo $cat['cat_id']; ?>_tab" 
                                                data-toggle="tab" 
                                                role="tab" 
                                                aria-controls="custom-nav_<?php echo $cat['cat_id']; ?>" 
                                                aria-selected="<?php if($cat['cat_name'] == 'Ayurvedic Doctors') echo 'true'; else echo 'false'; ?>">
                                                <?php echo $cat['cat_name']; ?>
                                            </a>
                                        <?php } } ?>
                                            
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">

                                    <?php //if($doctor_cat != NULL) { foreach($doctor_cat as $cat) { ?>


                                    <div class="tab-pane fade <?php //if($cat['cat_name'] == 'Ayurvedic Doctors') echo 'show active'; ?>" id="custom-nav_<?php echo $cat['cat_id']; ?>" role="tabpanel" aria-labelledby="custom-nav_<?php echo $cat['cat_id']; ?>_tab">
                                        <?php //$business = $this->ServPro_model->show_saler_category($cat['cat_id']); ?>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <?php //if($business != NULL) { foreach($business as $bis) { ?>
                                                
                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <a href="<?php //echo base_url(); ?>business_profile/<?php //echo $bis['business_registry_id']; ?>">
                                                                    <div class="mx-auto d-block">
                                                                        <img class="rounded-circle mx-auto d-block" src="<?php //echo base_url(); ?>assets/images/shop/shop1.gif" alt="<?php //echo $bis['business_name']; ?>" height="80px" width="80px">
                                                                        <h5 class="text-sm-center mt-2 mb-1"><?php //echo $bis['business_name']; ?></h5>
                                                                        <div class="location text-sm-center"><i class="fa fa-list-alt"></i> <?php //echo $bis['cat_name']; ?></div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php //} } else echo 'No business registered'; ?>

                                            </div>
                                        </div>
                                    </div>

                                    <?php //} } ?>


                                </div>

                            </div>
                        </div> -->
                    </div>
                </div>
            </div>



        
            <div class="row">
            <div class="col-md-12">
                <?php if($all_doctors != NULL) { foreach($all_doctors as $docs) { ?>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?php echo base_url(); ?>doctor_details/<?php echo $docs['user_id']; ?>">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="<?php echo $docs['profile_picture']; ?>" alt="<?php echo $docs['first_name'].' '.$docs['last_name']; ?>" height="80px" width="80px">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $docs['first_name'].' '.$docs['last_name']; ?></h5>
                                    <div class="location text-sm-center"><i class="fa fa-list-alt"></i> ========</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } } ?>

            </div>
            </div>

        </div>
    </div>
    <!-- /.content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>

</div>
<!-- /#right-panel -->