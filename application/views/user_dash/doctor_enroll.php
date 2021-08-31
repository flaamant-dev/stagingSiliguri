<?php if(!$this->session->userdata('ulogged_in')) {
    redirect('home');
} else { ?>
<?php 
    $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 

	$Categories = $this->Category_model->show_sub_category(324);
    
?>

    <div class="content">
        <div class="animated fadeIn">
            <?php //if($user['user_type'] == 'User') {   ?>
                <div class="row">

                    <div class="container">
                        <h4>Please fill up the fields to enroll as a Doctor</h4>
                        <div class="wrapper">
                            <ul class="steps">
                                <li class="is-active">Step 1</li>
                                <li>Step 2</li>
                                <li>Step 3</li>
                            </ul>
                            <form class="form-wrapper" action="doctor_enroll_form" method="POST" id="doctor_enroll_form" enctype="multipart/form-data">
                                <input name="user_id" type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>">
                                <input name="user_type" type="hidden" value="DOCTOR">
                                
                                <fieldset class="section is-active">
                                    <div class="form-group">
                                        <small><label class="control-label mb-1"><b>Specializations</b></label></small>

                                        <select name="doc_cat[]" data-placeholder="Choose a category..." multiple class="standardSelect"
                                            tabindex="5">
                                            <option value="" label="default"></option>
                                            <?php foreach($Categories as $cat) { ?>
                                                <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                    </div>

                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <small><label class="control-label mb-1"><b>Registration Number</b></label></small>
                                            <input name="license_no" type="text" class="input-sm form-control-sm form-control"
                                                placeholder="Business name" aria-required="true" aria-invalid="false">
                                        </div>
                                        <div class="col-6 form-group">
                                            <small>
                                                <label class="control-label mb-1"><b>Registration Picture</b></label>
                                                <input type="file" id="company_logo" name="licence_pic" class="form-control-file">
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <small><label class="control-label mb-1"><b>About yourself</b></label></small>
                                        <textarea name="about" rows="2" placeholder="Few wods about your business..."
                                            class="input-sm form-control-sm form-control"></textarea>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="button next">Next</div>
                                    </div>
                                </fieldset>
                                <fieldset class="section">
                                    <div class="form-group">
                                        <small><label class="control-label mb-1"><b>Experience</b></label></small>
                                        <textarea name="experience" rows="2" placeholder="Few words about your Experience..."
                                            class="input-sm form-control-sm form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <small><label class="control-label mb-1"><b>Service</b></label></small>
                                        <textarea name="service" rows="2" placeholder="Few words about your Service..."
                                            class="input-sm form-control-sm form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <small><label class="control-label mb-1"><b>Awards & Recognitions</b></label></small>
                                        <textarea name="award" rows="2" placeholder="Few words about your Awards & Recognitions..."
                                            class="input-sm form-control-sm form-control"></textarea>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="button previous">Previous</div>
                                        <div class="button next">Next</div>
                                    </div>
                                </fieldset>
                                <fieldset class="section">
                                    <div class="form-group">
                                        <small><label class="control-label mb-1"><b>Education & Qualifications</b></label></small>
                                        <textarea name="education" rows="2" placeholder="Few words about your Education & Qualifications..."
                                            class="input-sm form-control-sm form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <small><label class="control-label mb-1"><b>Memberships</b></label></small>
                                        <textarea name="membership" rows="2" placeholder="Few words about your Memberships..."
                                            class="input-sm form-control-sm form-control"></textarea>
                                    </div>
                                    <div class="row" style="margin-top: 35px;">
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
                                var headerSection = $('.steps li').eq(currentSectionIndex-2);

                                if (button.hasClass('next')) {
                                    currentSection.removeClass("is-active").next().addClass("is-active");
                                    headerSection.removeClass("is-active").next().addClass("is-active");

                                } else if (button.hasClass('previous')) {
                                    currentSection.removeClass("is-active").prev().addClass("is-active");
                                    headerSection.removeClass("is-active").prev().addClass("is-active");

                                } else if (button.hasClass('submit')) {
                                    $( "#doctor_enroll_form" ).submit();
                                }

                            });
                        });
                    </script>

                </div>
            <?php// } ?>
        </div>
    </div>

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php } ?>