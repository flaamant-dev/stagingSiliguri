<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    // $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
    // if($user['user_type'] == 'Saler') { 
    // $seller = $this->ServPro_model->show_saler_details($this->session->userdata('user_id'));


    $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
    if($user['user_type'] == 'Saler') { 
        $this->load->view('all_modals'); 
        $businesses =  $this->Business_model->show_user_business($this->session->userdata('user_id'));
        $Categories = $this->Category_model->show_sub_category(324);
        $doctors = $this->Doctor_model->show_doctors();
        if($this->uri->segment(3) == NULL) {
            $business_registry_id = $businesses[0]['business_registry_id'];
        } else {
            $business_registry_id = $this->uri->segment(3);
        }


    $business = $this->ServPro_model->show_provider($this->session->userdata('user_id')); 

?>

    <div class="content">
    <div class="animated fadeIn">
        <?php if(!$businesses[0]['approved']) { ?>        
            <div class="row">    
                <div class="row" style="
                    top:40%;
                    margin: auto auto;
                    width: 100%;
                    height:200px;">
                    <div class="text-center col-md-4 col-sm-3 col-xs-1">&nbsp;</div>
                    <div class="text-center col-md-4 col-sm-6 col-xs-10"
                        style="background-color: #ed4928; border-radius: 16px; color:white; padding:10px;">
                        <h4>Be patient. We are processing your request.</h4>
                    </div>
                </div>
            </div>
        <?php } else { ?>             
            <div class="card">
            <div class="card-body">                                 
                <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
                <div class="card mt-3 px-3 pt-3">
                
                    <div class="custom-tab">  
                        <form class="form-horizontal form-label-left" action="activity/create_campaign" method="post">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Choose Category</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select id="choose_cat" name="choose_cat" class="form-control">
                                        <option disabled selected>Choose from your Category</option>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>
                                        <option value="d">D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hsd">Add Title</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="title" name="title" class="form-control"
                                        placeholder="Title of your ad">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="advance">Content</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea id="content" name="content" height="6" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hsd">Image(s)/
                                    Video(s)</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="pics" name="pics" type="file">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group d-flex">
                                <a href="<?php echo base_url(); ?>users/my_campaigns" class="btn btn-danger col-md-6 col-sm-6 col-xs-12">Cancel</a>
                                <button type="submit" class="btn btn-success col-md-6 col-sm-6 col-xs-12">Submit</button>
                            </div>

                        </form>
                    </div>
                        
                </div>
                </div>
                </div>

            </div>
            </div>
        <?php } ?>  
    </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>

</div>

<?php } else { redirect('home'); } } ?>