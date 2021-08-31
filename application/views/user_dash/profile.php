<?php if(!$this->session->userdata('ulogged_in')) {
    redirect('home');
} else { ?>
<?php 
    $user = $this->User_model->show_user($this->session->userdata('user_id')); 
    $pro_count = 0;
    if($user['first_name'] == NULL ) $pro_count++;
    if($user['last_name'] == NULL ) $pro_count++;
    if($user['address'] == NULL ) $pro_count++;
    if($user['pincode'] == NULL ) $pro_count++;
    if($user['dob'] == NULL ) $pro_count++;
    if($user['phone'] == NULL ) $pro_count++;
    if($user['email'] == NULL ) $pro_count++;
    if($user['gender'] == NULL ) $pro_count++;
    if($user['occupation'] == NULL ) $pro_count++;
    if($user['education'] == NULL ) $pro_count++;

    $pro_count = (100 - $pro_count*10);
    if($pro_count < 31) {
        $pro_color = 'bg-danger';
    } elseif($pro_count >= 31 && $pro_count < 61) {
        $pro_color = 'bg-warning';
    } elseif($pro_count >= 61 && $pro_count < 99) {
        $pro_color = 'bg-info';
    } else {
        $pro_color = 'bg-success';
    } 
?>

    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header user-header alt bg-flat-color-6">
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" 
                                        style="width:85px; height:85px;" alt="User Profile Picture" 
                                        src="<?php echo $user['profile_picture']; ?>">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="text-light display-6"><?php echo $user['first_name'].' '.$user['last_name']; ?></h4>
                                        <p><small class="text-light"><b>Last Login : </b> <?php echo date("M d, Y",strtotime($user['updated_at'])); ?></small></p>
                                    </div>
                                </div>
                            </div>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-vcard"></i> Profile Status</a>

                                    <div class="progress mb-2">
                                        <div class="progress-bar <?php echo $pro_color; ?>" role="progressbar" style="width: <?php echo $pro_count; ?>%" 
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $pro_count; ?>%</div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo base_url(); ?>users/activity_log"> <i class="fa fa-tasks"></i> Recent Activity <span class="badge badge-danger pull-right">15</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo base_url(); ?>users/notifications"> <i class="fa fa-bell-o"></i> Notification <span class="badge badge-success pull-right">11</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-comments-o"></i> Message <span class="badge badge-warning pull-right r-activity">03</span></a>
                                </li>
                            </ul>

                        </section>
                    </aside>
                </div>
                
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="card shadow mb-4">
                        
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"> <?php echo $user['first_name'].' '.$user['last_name']; ?></h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">

                            <form class="form-wrapper" action="update_user_profile" method="POST" id="update_user_profile">
                                <input name="user_id" type="hidden" value="<?php echo $user['user_id']; ?>">
                                <input name="oth" type="hidden" value="<?php echo $user['login_oauth_uid']; ?>">

                                <div class="row">
                                    <div class="col-6 form-group">
                                        <small><label class="control-label mb-1"><b>Full Name</b></label></small>
                                        <p class="form-control-static"><?php echo $user['first_name'].' '.$user['last_name']; ?></p>
                                    </div>
                                    <div class="col-6 form-group">
                                        <small><label class="control-label mb-1"><b>Date of Birth</b></label></small>
                                        <input type="date" name="dob" value="<?php echo date("Y-m-d",strtotime($user['dob'])); ?>" class="input-sm form-control-sm">
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <small><label class="control-label mb-1"><b>Address</b></label></small>
                                    <textarea name="address" rows="2"
                                        class="input-sm form-control-sm form-control"><?php echo $user['address']; ?></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-4 form-group">
                                        <small><label class="control-label mb-1"><b>Pincode</b></label></small>
                                        <input name="pincode" type="text" class="input-sm form-control-sm form-control"
                                            value="<?php echo $user['pincode']; ?>" aria-required="true" aria-invalid="false">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4 form-group">
                                        <small><label class="control-label mb-1"><b>Phone Number</b></label></small>
                                        <input name="phone" type="text" class="input-sm form-control-sm form-control"
                                            value="<?php echo $user['phone']; ?>" aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="col-4 form-group">
                                        <small><label class="control-label mb-1"><b>Email Address</b></label></small>
                                        <input name="email" type="text" class="input-sm form-control-sm form-control"
                                            value="<?php echo $user['email']; ?>" aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="col-4 form-group">
                                        <small><label class="control-label mb-1"><b>Gender</b></label></small><br>
                                        <select name="gender" data-placeholder="Choose your gender..." class="form-control-sm" tabindex="5">
                                            <option value="" label="default"></option>
                                            <option value="male" <?php if($user['gender'] == 'MALE') echo 'selected'; ?>>Male
                                            </option>
                                            <option value="female" <?php if($user['gender'] == 'FEMALE') echo 'selected'; ?>>Female
                                            </option>
                                            <option value="middle" <?php if($user['gender'] == 'OTHER') echo 'selected'; ?>>Others
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 form-group">
                                        <small><label class="control-label mb-1"><b>Occupation</b></label></small>
                                        <input name="occupation" type="text" class="input-sm form-control-sm form-control"
                                            value="<?php echo $user['occupation']; ?>" aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="col-6 form-group">
                                        <small><label class="control-label mb-1"><b>Educational Qualification</b></label></small><br>
                                        <select name="education" class="form-control-sm" tabindex="5">
                                            <option value="" label="default"></option>
                                            <option value="postDoc" <?php if($user['education'] == 'postDoc') echo 'selected'; ?>>Post-Doctorate
                                            </option>
                                            <option value="phd" <?php if($user['education'] == 'phd') echo 'selected'; ?>>PhD
                                            </option>
                                            <option value="masters" <?php if($user['education'] == 'masters') echo 'selected'; ?>>Masters
                                            </option>
                                            <option value="graduate" <?php if($user['education'] == 'graduate') echo 'selected'; ?>>Graduate
                                            </option>
                                            <option value="hs" <?php if($user['education'] == 'hs') echo 'selected'; ?>>Higher Secondary
                                            </option>
                                            <option value="madhyamik" <?php if($user['education'] == 'madhyamik') echo 'selected'; ?>>Secondary
                                            </option>
                                            <option value="below" <?php if($user['education'] == 'below') echo 'selected'; ?>>Below Secondary
                                            </option>
                                            <option value="uneducated" <?php if($user['education'] == 'uneducated') echo 'selected'; ?>>No Education
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <button type="submit" class="btn btn-sm btn-success btn-block">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php } ?>