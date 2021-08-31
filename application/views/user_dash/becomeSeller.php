<?php if(!$this->session->userdata('ulogged_in')) {
    redirect('home');
} else { 
    $user = $this->User_model->show_user($this->session->userdata('user_id'));
	$Categories = $this->Category_model->show_category(); 
    $businesses =  $this->Business_model->show_user_business($this->session->userdata('user_id'));
?>

    <div class="content">
        <div class="animated fadeIn">

                <?php if($user['user_type'] == 'User') { 
                    
                    $previous_applied = $this->User_model->show_declined_saler($this->session->userdata('user_id'));
                    
                    if($previous_applied === NULL) { ?>
                    
                        <div class="row">

                            <div class="container">
                                <h4>Please fill up the fields to register your business</h4>
                                <div class="wrapper">
                                    <ul class="steps">
                                        <li class="is-active">Step 1</li>
                                        <li>Step 2</li>
                                        <li>Step 3</li>
                                        <li>Step 4</li>
                                    </ul>
                                    <form class="form-wrapper" action="business_register" method="POST" id="becomeSelll" enctype="multipart/form-data">
                                        <input name="user_id" type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>">
                                        
                                        <fieldset class="section is-active">
                                            <div class="form-group">
                                                <small><label class="control-label mb-1"><b>Name of your Business</b></label></small>
                                                <input name="business_name" type="text" class="input-sm form-control-sm form-control"
                                                    placeholder="Business name" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <small><label class="control-label mb-1"><b>Business contact person</b></label></small>
                                                <input name="business_contact_person" type="text" placeholder="<?php echo $user['first_name'].' '.$user['last_name']; ?>"
                                                    class="input-sm form-control-sm form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col-6 form-group">
                                                    <small><label class="control-label mb-1"><b>Business Email</b></label></small>
                                                    <input name="business_email" type="email" placeholder="<?php echo $user['email']; ?>"
                                                        class="input-sm form-control-sm form-control">
                                                </div>
                                                <div class="col-6 form-group">
                                                    <small><label class="control-label mb-1"><b>Business Phone</b></label></small>
                                                    <input name="business_phone" type="text" placeholder="<?php echo $user['phone']; ?>"
                                                        class="input-sm form-control-sm form-control">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 30px;">
                                                <div class="button next">Next</div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="section">
                                            <div class="form-group">
                                                <small><label class="control-label mb-1"><b>About your Business</b></label></small>
                                                <textarea name="business_about" rows="3" placeholder="Few words about your business..."
                                                    class="input-sm form-control-sm form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <small><label class="control-label mb-1"><b>Business Addess</b></label></small>
                                                <textarea name="business_address" rows="3" placeholder="Few words about your business..."
                                                    class="input-sm form-control-sm form-control"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 form-group">
                                                    <small><label class="control-label mb-1"><b>City</b></label></small>
                                                    <input name="business_city" type="text"
                                                        class="input-sm form-control-sm form-control" value="Siliguri" disabled>
                                                </div>
                                                <div class="col-4 form-group">
                                                    <small><label class="control-label mb-1"><b>Postal Code</b></label></small>
                                                    <input name="business_zip" type="text"
                                                        class="input-sm form-control-sm form-control">
                                                </div>
                                                <div class="col-4 form-group">
                                                    <small><label class="control-label mb-1"><b>Google Map Location</b></label></small>
                                                    <input name="business_gmap" type="text"
                                                        class="input-sm form-control-sm form-control">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 30px;">
                                                <div class="button previous">Previous</div>
                                                <div class="button next">Next</div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="section">
                                            <div class="form-group">
                                                <small><label class="control-label mb-1"><b>Type of Business</b></label></small>
                                                <br>
                                                <div class="form-check-inline form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="business_type" value="product"
                                                            class="form-check-input"> Product
                                                    </label>&nbsp;
                                                    <label class="form-check-label">
                                                        <input type="radio" name="business_type" value="service"
                                                            class="form-check-input"> Service
                                                    </label>&nbsp;
                                                    <label class="form-check-label">
                                                        <input type="radio" name="business_type" value="both" class="form-check-input">
                                                        Both
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small><label class="control-label mb-1"><b>Business Category</b></label></small>

                                                <select name="business_cat[]" data-placeholder="Choose a category..." multiple class="standardSelect"
                                                    tabindex="5">
                                                    <option value="" label="default"></option>
                                                    <?php foreach($Categories as $cat) { ?>
                                                    <?php $subcat = $this->Category_model->show_sub_category($cat['cat_id']); ?>
                                                    <optgroup label="<?php echo $cat['cat_name']; ?>">
                                                        <?php foreach($subcat as $sub) { ?>
                                                        <option value="<?php echo $sub['cat_id']; ?>"><?php echo $sub['cat_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </optgroup>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <small>
                                                    <label class="control-label mb-1"><b>Company Logo</b></label>
                                                    <div class="col-12 col-md-9">
                                                        <input type="file" id="company_logo" name="company_logo" class="form-control-file">
                                                    </div>
                                                </small>
                                            </div>
                                            <div class="row" style="margin-top: 35px;">
                                                <div class="button previous">Previous</div>
                                                <div class="button next">Next</div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="section">
                                            <div class="form-group" style="padding-left:20px">
                                                <div class="row">
                                                <small>
                                                    <label class="control-label mb-1"><b>Company Address Proof</b></label>
                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                                            class="form-control-file"></div>
                                                </small>
                                                <small class="col-6">
                                                    <label class="control-label mb-1"><b>Company Registration Proof</b></label>
                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                                            class="form-control-file"></div>
                                                </small>
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding-left:20px">
                                                <div class="row">
                                                <small>
                                                    <label class="control-label mb-1"><b>Owner ID Proof</b></label>
                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                                            class="form-control-file"></div>
                                                </small>
                                                <small class="col-6">
                                                    <label class="control-label mb-1"><b>PAN</b></label>
                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                                            class="form-control-file"></div>
                                                </small>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 30px;">
                                                <div class="button previous">Previous</div>
                                                <div class="button next">Next</div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="section" style="padding-left:20px">
                                            <div class="form-group" style="padding-left:20px">
                                                <input type="checkbox" name="checkbox" class="form-check-input" id="pr_py_confirm">
                                                &nbsp;&nbsp;
                                                By clicking, I aggree with Siliguri.City's 
                                                <a href="<?php echo base_url(); ?>terms" target="_blank" style="color:#f8941c;">Terms of use</a> and 
                                                <a href="<?php echo base_url(); ?>privacy" target="_blank" style="color:#f8941c;">Privacy Policy</a>.
                                            </div>

                                            <div class="row" style="margin-top: 55px;">
                                                <button class="button submit" id="sendNewSms" disabled>
                                                    Request to enroll
                                                </button>
                                            </div>

                                        </fieldset>
                                    </form>
                                </div>
                            </div>

                            <script>
                                jQuery(document).ready(function($) {
                                    var checker = document.getElementById('pr_py_confirm');
                                    var sendbtn = document.getElementById('sendNewSms');
                                    checker.onchange = function() {
                                        sendbtn.disabled = !this.checked;
                                    };

                                    $(".form-wrapper .button").click(function() {
                                        var button = $(this);
                                        var currentSection = button.parents(".section");
                                        var currentSectionIndex = currentSection.index();
                                        var headerSection = $('.steps li').eq(currentSectionIndex-1);

                                        if (button.hasClass('next')) {
                                            currentSection.removeClass("is-active").next().addClass("is-active");
                                            headerSection.removeClass("is-active").next().addClass("is-active");

                                        } else if (button.hasClass('previous')) {
                                            currentSection.removeClass("is-active").prev().addClass("is-active");
                                            headerSection.removeClass("is-active").prev().addClass("is-active");

                                        } else if (button.hasClass('submit')) {
                                            $( "#becomeSelll" ).submit();
                                        }

                                    });
                                });
                            </script>

                        </div>

                    <?php } else { ?>
                        
                        <div class="row">
                            <div class="container">
                                <div class="wrapper">
                                    
                                    <h3>Your application was rejected earlier. Do you want to apply again?</h3>
                                    <br>

                                    <form class="form-horizontal form-label-left" method="post" action="apply_saler_again">
                                        <input type="hidden" name="user_id"
                                            value="<?php echo $this->session->userdata('user_id'); ?>">
                                        <buttonn type="submit" class="btn btn-info btn-md">Yes, I want to apply again</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        
                    <?php } 

                } else { ?>

                    <div class="container">

                        <div class="advantages">

                            <div class="row">
                                                            
                                <div class="row col-12">
                                    <?php if($businesses != NULL) { foreach($businesses as $bis) { ?>
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                            <a href="<?php echo base_url(); ?>users/store">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p><?php echo $bis['business_name']; ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } } ?>
                                    <hr>
                                </div>

                            </div>

                        
                            <div class="row">

                                <div class="container">
                                    <h4>Please fill up the fields to register your business</h4>
                                    <div class="wrapper">
                                        <ul class="steps">
                                            <li class="is-active">Step 1</li>
                                            <li>Step 2</li>
                                            <li>Step 3</li>
                                            <li>Step 4</li>
                                        </ul>
                                        <form class="form-wrapper" action="business_register" method="POST" id="becomeSelll" enctype="multipart/form-data">
                                            <input name="user_id" type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>">
                                            
                                            <fieldset class="section is-active">
                                                <div class="form-group">
                                                    <small><label class="control-label mb-1"><b>Name of your Business</b></label></small>
                                                    <input name="business_name" type="text" class="input-sm form-control-sm form-control"
                                                        placeholder="Business name" aria-required="true" aria-invalid="false">
                                                </div>
                                                <div class="form-group">
                                                    <small><label class="control-label mb-1"><b>Business contact person</b></label></small>
                                                    <input name="business_contact_person" type="text" placeholder="<?php echo $user['first_name'].' '.$user['last_name']; ?>"
                                                        class="input-sm form-control-sm form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 form-group">
                                                        <small><label class="control-label mb-1"><b>Business Email</b></label></small>
                                                        <input name="business_email" type="email" placeholder="<?php echo $user['email']; ?>"
                                                            class="input-sm form-control-sm form-control">
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <small><label class="control-label mb-1"><b>Business Phone</b></label></small>
                                                        <input name="business_phone" type="text" placeholder="<?php echo $user['phone']; ?>"
                                                            class="input-sm form-control-sm form-control">
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 30px;">
                                                    <div class="button next">Next</div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="section">
                                                <div class="form-group">
                                                    <small><label class="control-label mb-1"><b>About your Business</b></label></small>
                                                    <textarea name="business_about" rows="3" placeholder="Few words about your business..."
                                                        class="input-sm form-control-sm form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <small><label class="control-label mb-1"><b>Business Addess</b></label></small>
                                                    <textarea name="business_address" rows="3" placeholder="Few words about your business..."
                                                        class="input-sm form-control-sm form-control"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4 form-group">
                                                        <small><label class="control-label mb-1"><b>City</b></label></small>
                                                        <input name="business_city" type="text"
                                                            class="input-sm form-control-sm form-control" value="Siliguri" disabled>
                                                    </div>
                                                    <div class="col-4 form-group">
                                                        <small><label class="control-label mb-1"><b>Postal Code</b></label></small>
                                                        <input name="business_zip" type="text"
                                                            class="input-sm form-control-sm form-control">
                                                    </div>
                                                    <div class="col-4 form-group">
                                                        <small><label class="control-label mb-1"><b>Google Map Location</b></label></small>
                                                        <input name="business_gmap" type="text"
                                                            class="input-sm form-control-sm form-control">
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 30px;">
                                                    <div class="button previous">Previous</div>
                                                    <div class="button next">Next</div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="section">
                                                <div class="form-group">
                                                    <small><label class="control-label mb-1"><b>Type of Business</b></label></small>
                                                    <br>
                                                    <div class="form-check-inline form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" name="business_type" value="product"
                                                                class="form-check-input"> Product
                                                        </label>&nbsp;
                                                        <label class="form-check-label">
                                                            <input type="radio" name="business_type" value="service"
                                                                class="form-check-input"> Service
                                                        </label>&nbsp;
                                                        <label class="form-check-label">
                                                            <input type="radio" name="business_type" value="both" class="form-check-input">
                                                            Both
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <small><label class="control-label mb-1"><b>Business Category</b></label></small>

                                                    <select name="business_cat[]" data-placeholder="Choose a category..." multiple class="standardSelect"
                                                        tabindex="5">
                                                        <option value="" label="default"></option>
                                                        <?php foreach($Categories as $cat) { ?>
                                                        <?php $subcat = $this->Category_model->show_sub_category($cat['cat_id']); ?>
                                                        <optgroup label="<?php echo $cat['cat_name']; ?>">
                                                            <?php foreach($subcat as $sub) { ?>
                                                            <option value="<?php echo $sub['cat_id']; ?>"><?php echo $sub['cat_name']; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </optgroup>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <small>
                                                        <label class="control-label mb-1"><b>Company Logo</b></label>
                                                        <div class="col-12 col-md-9">
                                                            <input type="file" id="company_logo" name="company_logo" class="form-control-file">
                                                        </div>
                                                    </small>
                                                </div>
                                                <div class="row" style="margin-top: 35px;">
                                                    <div class="button previous">Previous</div>
                                                    <div class="button next">Next</div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="section">
                                                <div class="form-group" style="padding-left:20px">
                                                    <div class="row">
                                                    <small>
                                                        <label class="control-label mb-1"><b>Company Address Proof</b></label>
                                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                                                class="form-control-file"></div>
                                                    </small>
                                                    <small class="col-6">
                                                        <label class="control-label mb-1"><b>Company Registration Proof</b></label>
                                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                                                class="form-control-file"></div>
                                                    </small>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="padding-left:20px">
                                                    <div class="row">
                                                    <small>
                                                        <label class="control-label mb-1"><b>Owner ID Proof</b></label>
                                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                                                class="form-control-file"></div>
                                                    </small>
                                                    <small class="col-6">
                                                        <label class="control-label mb-1"><b>PAN</b></label>
                                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                                                class="form-control-file"></div>
                                                    </small>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 30px;">
                                                    <div class="button previous">Previous</div>
                                                    <div class="button next">Next</div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="section" style="padding-left:20px">
                                                <div class="form-group" style="padding-left:20px">
                                                    <input type="checkbox" name="checkbox" class="form-check-input" id="pr_py_confirm">
                                                    &nbsp;&nbsp;
                                                    By clicking, I aggree with Siliguri.City's 
                                                    <a href="<?php echo base_url(); ?>terms" target="_blank" style="color:#f8941c;">Terms of use</a> and 
                                                    <a href="<?php echo base_url(); ?>privacy" target="_blank" style="color:#f8941c;">Privacy Policy</a>.
                                                </div>

                                                <div class="row" style="margin-top: 55px;">
                                                    <button class="button submit" id="sendNewSms" disabled>
                                                        Request to enroll
                                                    </button>
                                                </div>

                                            </fieldset>
                                        </form>
                                    </div>
                                </div>

                                <script>
                                    jQuery(document).ready(function($) {
                                        var checker = document.getElementById('pr_py_confirm');
                                        var sendbtn = document.getElementById('sendNewSms');
                                        checker.onchange = function() {
                                            sendbtn.disabled = !this.checked;
                                        };

                                        $(".form-wrapper .button").click(function() {
                                            var button = $(this);
                                            var currentSection = button.parents(".section");
                                            var currentSectionIndex = currentSection.index();
                                            var headerSection = $('.steps li').eq(currentSectionIndex-1);

                                            if (button.hasClass('next')) {
                                                currentSection.removeClass("is-active").next().addClass("is-active");
                                                headerSection.removeClass("is-active").next().addClass("is-active");

                                            } else if (button.hasClass('previous')) {
                                                currentSection.removeClass("is-active").prev().addClass("is-active");
                                                headerSection.removeClass("is-active").prev().addClass("is-active");

                                            } else if (button.hasClass('submit')) {
                                                $( "#becomeSelll" ).submit();
                                            }

                                        });
                                    });
                                </script>

                            </div>
                            
                        </div>
                    </div>

                <?php } ?>

            <div class="clearfix"></div>
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->



<?php } ?>