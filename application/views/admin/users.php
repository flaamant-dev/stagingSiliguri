<?php if(!$this->session->userdata('blogged_in')) {
    redirect('home');
} else { ?>
<?php if($this->uri->segment(1) == "admin") {
        $this->load->view('all_modals'); 
        $admins = $this->Backend_model->show_admin();
?>



    <div class="content">
        <div class="animated fadeIn">
        
            <div class="row">


                <?php 
                    if($admins != NULL) { foreach($admins as $adm) {
                        if($adm['admin_login'] == NULL) {
                            $logg= 'Never logged in';
                        } else {
                            if(date('Y-m-d', strtotime($adm['admin_login'])) == date('Y-m-d')) {
                                $logg = date('h:i A', strtotime($adm['admin_login']));
                            } else {
                                $logg = date('d M, Y', strtotime($adm['admin_login']));
                            }
                        }
                        if($adm['admin_stat'] == TRUE) { $chk='checked'; } else { $chk=''; } 
                ?>

                    <div class="col-md-4">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <a href="<?php echo base_url(); ?>admin/admin_profile/<?php echo $adm['admin_id']; ?>">
                                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url(); ?>assets/images/user_profile/img.png">
                                        </a>
                                        <div class="media-body">
                                            <h2 class="text-light display-6"><?php echo $adm['admin_name']; ?></h2>
                                            <p><?php echo $adm['admin_type']; ?></p>
                                        </div>
                                    </div>
                                </div>


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <small>
                                            <button class="btn btn-sm btn-info" onclick="edit_admin(<?php echo $adm['admin_id']; ?>);">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" onclick="chngP_admin(<?php echo $adm['admin_id']; ?>);">
                                                <i class="fa fa-key"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" onclick="del_admin(<?php echo $adm['admin_id']; ?>);">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </small>
                                    </li>
                                    <li class="list-group-item">
                                        Last Login <span class="pull-right"><?php echo $logg; ?></span></a>
                                    </li>
                                    <li class="list-group-item">
                                        Permission <span class="pull-right"><input type="checkbox" <?php echo $chk; ?>></span></a>
                                    </li>
                                </ul>

                            </section>
                        </aside>
                    </div>

                <?php } } ?>
                
            </div>
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->


<?php }} ?>