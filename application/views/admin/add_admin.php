<?php if(!$this->session->userdata('blogged_in')) {
    redirect('home');
} else { ?>
<?php if($this->uri->segment(1) == "admin") {
        $this->load->view('all_modals'); 
?>
    <div class="content">
        <div class="animated fadeIn">
        
                <div class="row">                                    
                        
                    <form id="add_product_form" class="form-horizontal form-label-left" action="add_adminn" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_name">Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="admin_name" class="form-control" placeholder="Name of the Admin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_type">Type</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="admin_type" class="form-control">
                                    <option disabled selected>Admin Type</option>
                                    <option value="SUPER_ADMIN">All Permission</option>
                                    <option value="ADMIN_ACCOUNTANT">Accounts</option>
                                    <option value="ADMIN_LOGISTICS">Logistics</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_email">Email</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="email" name="admin_email" class="form-control"
                                    placeholder="Official Email Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_pswd">Password</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" name="admin_pswd" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_pswd2">Confirm
                                Password</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" id="admin_pswd2" name="admin_pswd2" class="form-control"
                                    placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo base_url(); ?>admin/users"
                                    class="btn btn-danger col-md-6 col-sm-6 col-xs-12">Cancel</a>
                                <button type="submit" class="btn btn-success col-md-6 col-sm-6 col-xs-12">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
                
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php }} ?>