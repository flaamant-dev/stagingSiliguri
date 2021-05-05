<?php
	$product_cat = $this->Category_model->show_category_product();
?>
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <?php if($product_cat != NULL) { foreach($product_cat as $cat) { ?>
                    <?php $clcd = $cat['cat_id'] % 6; ?>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="card text-white bg-flat-color-<?php echo $clcd+1; ?>">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h4 class="mb-0 fw-r">
                                        <span class="float-left mr-1"><?php echo $cat['cat_name']; ?></span>                                        
                                    </h4><br>
                                    <p class="text-light mt-1 m-0"><span class="count">20</span></p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-cart"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                <?php } } ?>
            </div>
        </div>
    </div>
    <!-- /.content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>

</div>
<!-- /#right-panel -->