<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>
<?php if($this->uri->segment(1) == "admin") {
        $this->load->view('all_modals'); 
        $Categories = $this->Category_model->show_category();
?>


    <div class="content">
        <div class="animated fadeIn">
        
            <div class="row">

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    Add New Category Sectiopn
                                </strong>
                            </div>
                            <div class="card-body" style="height:180px; width:100%; overflow-y:auto;">
                                <button class="btn btn-lg btn-info" onclick="add_category();"><i class="fa fa-plus"></i></a>
                                            
                            </div>
                        </div>
                    </div>

                <?php 
                    if($Categories != NULL) { foreach($Categories as $cat) {
                    $subCat = $this->Category_model->show_sub_category($cat['cat_id']); 
                ?>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <?php echo $cat['cat_name'].' ('.count($subCat).')'; ?>
                                    <small class="float-right">
                                        <a onclick="add_subcategory(<?php echo $cat['cat_id']; ?>);">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a onclick="edit_category('<?php echo $cat['cat_name']; ?>',<?php echo $cat['cat_id']; ?>);">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a onclick="del_category(<?php echo $cat['cat_id']; ?>);">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </small>
                                </strong>
                            </div>
                            <div class="card-body" style="height:180px; width:100%; overflow-y:auto;">
                                <?php
                                    if($subCat != NULL) { foreach($subCat as $sub) { ?>
                                        <span style="float: left;"><?php echo $sub['cat_name']; ?></span>
                                        <div style="float:right;">
                                            <a onclick="add_subcategory(<?php echo $sub['cat_id']; ?>);"><i class="fa fa-plus"></i></a>
                                            <a onclick="edit_category('<?php echo $sub['cat_name']; ?>',<?php echo $sub['cat_id']; ?>);"><i
                                                    class="fa fa-edit"></i></a>
                                            <a onclick="exng_category(<?php echo $cat['cat_id']; ?>,<?php echo $sub['cat_id']; ?>);"><i
                                                    class="fa fa-exchange"></i></a>
                                            <a onclick="del_category(<?php echo $sub['cat_id']; ?>);"><i class="fa fa-trash"></i></a>
                                        </div><br>
                                        <?php $subsub = $this->Category_model->show_sub_category($sub['cat_id']); 
                                        if($subsub != NULL) { foreach($subsub as $ssuubb) { ?>
                                            <span style="float: left; padding-left:20px;"><?php echo $ssuubb['cat_name']; ?></span>
                                            <div style="float:right;">
                                                <a
                                                    onclick="edit_category('<?php echo $ssuubb['cat_name']; ?>',<?php echo $ssuubb['cat_id']; ?>);"><i
                                                        class="fa fa-edit"></i></a>
                                                <a onclick="del_category(<?php echo $ssuubb['cat_id']; ?>);"><i class="fa fa-trash"></i></a>
                                            </div><br>
                                        <?php }} ?>
                                <?php }} else { echo 'No category enlisted'; } ?>
                            </div>
                        </div>
                    </div>

                <?php }} ?>



            </div>
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>


    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php }} ?>