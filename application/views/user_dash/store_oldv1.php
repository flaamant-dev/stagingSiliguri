<?php if(!$this->session->userdata('ulogged_in')) {
    redirect('home');
} else {
    $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id'));
    if($user['user_type'] == 'Saler') { 
        $this->load->view('all_modals'); 
        $businesses =  $this->Business_model->show_user_business($this->session->userdata('user_id'));
        //$seller = $this->ServPro_model->show_saler_details($this->session->userdata('user_id'));
        $Categories = $this->Category_model->show_sub_category(324);
        $user_name = $this->User_model->show_user_name();
        $doctors = $this->Doctor_model->show_doctors();
        $business_registry_id = $this->uri->segment(3);
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

                <!--Choose Business-->
                <div class="row">
                    <?php if($businesses != NULL) { foreach($businesses as $bis) { ?>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                        <div class="card">
                            <a href="<?php echo base_url(); ?>users/store/<?php echo $bis['business_registry_id']; ?>">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span><?php echo $bis['business_name']; ?></span>
                                        <div style="line-height: 14px;">
                                            <?php if($bis['approved']) { ?>
                                                <span class="extra-small text-success">Verified</span>
                                            <?php } else { ?>
                                                <span class="extra-small text-danger">Not Verified</span>
                                            <?php } ?>
                                            <!--<i class="fa fa-check text-success extra-small"></i>-->
                                            <i class="fa fa-exclamation text-danger extra-small"></i>
                                        </div>
                                    </div>
                                    <div style="position: relative; width: 30px;">
                                        <a href="#">
                                            <i class="fa fa-bell bell-style"></i>
                                            <div class="bell-button">3</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <!--/Choose Business-->


                <?php if($business_registry_id == NULL ) { ?>
                
                              
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="box-title">Traffic </h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="card-body">
                                                
                                                <div id="traffic-chart" class="traffic-chart"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="progress-box progress-1">
                                                    <h4 class="por-title">Visits</h4>
                                                    <div class="por-txt">96,930 Users (40%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title">Bounce Rate</h4>
                                                    <div class="por-txt">3,220 Users (24%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title">Unique Visitors</h4>
                                                    <div class="por-txt">29,658 Users (60%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title">Targeted  Visitors</h4>
                                                    <div class="por-txt">99,658 Users (90%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="card-body"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <div class="orders">
                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="card ov-h">
                                        <div class="card-body bg-flat-color-2">
                                            <div id="flotBarChart" class="float-chart ml-4 mr-4"></div>
                                        </div>
                                        <div id="cellPaiChart" class="float-chart"></div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-12">
                                            <div class="card br-0">
                                                <div class="card-body">
                                                    <div class="chart-container ov-h">
                                                        <div id="flotPie1" class="float-chart"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xl-12">
                                            <div class="card bg-flat-color-3  ">
                                                <div class="card-body">
                                                    <h4 class="card-title m-0  white-color ">August 2018</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="flotLine5" class="flot-line"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Pie Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <span class="pie" data-peity='{ "fill": ["#13dafe", "#f2f2f2"]}'>1/4</span>
                                            </div>
                                            <div class="col-lg-2">
                                                <span class="pie" data-peity='{ "fill": ["#6164C1", "#f2f2f2"]}'>236/360</span>
                                            </div>
                                            <div class="col-lg-2">
                                                <span class="pie" data-peity='{ "fill": ["#F96262", "#f2f2f2"]}'>0.45/1.561</span>
                                            </div>
                                            <div class="col-lg-2">
                                                <span class="pie" data-peity='{ "fill": ["#99D683", "#f2f2f2"]}'>1,4</span>
                                            </div>
                                            <div class="col-lg-2">
                                                <span class="pie" data-peity='{ "fill": ["#FFCA4A", "#f2f2f2"]}'>366,100</span>
                                            </div>
                                            <div class="col-lg-2">
                                                <span class="pie" data-peity='{ "fill": ["#4C5667", "#f2f2f2"]}'>0.52,1.041</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3">Line Chart</h4>
                                        <div class="flot-container">
                                            <div id="chart1" style="width:100%;height:275px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3">Bar Chart</h4>
                                        <div class="flot-container">
                                            <div id="flotBar" style="width:100%;height:275px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                <?php } else { ?>

                        <div class="orders">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="card br-0 col-12">
                                            <h4 class="weather-title box-title">Add Resources</h4>
                                            <div class="card-body" style="height:300px; width:100%; overflow-y:auto;">
                                                <form action="add_employee" class="form-wrapper" method="POST" id="add_employee">
                                                    <input type="hidden" name="business_registry_id" value="<?php echo $business_registry_id; ?>">
                                                    <div class="form-group">
                                                        <select name="resource_type" id="resource_type" class="form-control-sm form-control">
                                                            <option disabled selected>Please select</option>
                                                            <option value="doctor">Doctor</option>
                                                            <option value="resource">Employees</option>
                                                        </select>
                                                    </div>
                                                    <div style='display:none;' id='doctor'>
                                                        <input type="hidden" name="d_role" value="DOCTOR">
                                                        <div class="form-group">
                                                            <small><label class="control-label mb-1"><b>Category</b></label></small>

                                                            <select name="category" id="category_select" data-placeholder="Choose a category..." class="standardSelect" tabindex="5">
                                                                <option value="" label="default"></option>
                                                                <?php foreach($Categories as $cat) { ?>
                                                                    <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>

                                                        </div>
                                                        
                                                        <div class="form-group" style='display:none;' id='specialist'>
                                                            <small><label class="control-label mb-1"><b>Choose Doctor</b></label></small>

                                                            <select name="doctor_id" data-placeholder="Choose a Doctor..." class="standardSelect" tabindex="5">
                                                                <option value="" label="default"></option>
                                                                <?php foreach($doctors as $doc) { ?>
                                                                    <option value="<?php echo $doc['user_id']; ?>"><?php echo $doc['first_name'].' '.$doc['last_name']; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div style='display:none;' id='resource'>
                                                        
                                                        <div class="form-group">
                                                            <small><label class="control-label mb-1"><b>Resources</b></label></small>

                                                            <select name="resource_id" data-placeholder="Choose a employee..." class="standardSelect" tabindex="5">
                                                                <option value="" label="default"></option>
                                                                <?php foreach($user_name as $usr) { ?>
                                                                    <option value="<?php echo $usr['user_id']; ?>"><?php echo $usr['first_name'].' '.$usr['last_name']; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>

                                                        </div>
                                                            
                                                        <div class="form-group">
                                                            <select name="r_role" id="r_role" class="form-control-sm form-control">
                                                                <option value="0" disabled selected>Please select a Role</option>
                                                                <option value="ACCOUNTANT">Accountant</option>
                                                                <option value="HELP DESK">Help desk</option>
                                                                <option value="MANAGER">Manager</option>
                                                            </select>
                                                        </div>
                                                    
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="box-title">Resources </h4>
                                        </div>
                                        <div class="card-body" style="height:300px; width:100%; overflow-y:auto;">
                                            <div class="table-stats order-table ov-h">
                                                <?php 
                                                    $user = $this->User_model->show_user($this->session->userdata('user_id')); 
                                                    $employees = $this->Business_model->show_business_employee($business_registry_id); 
                                                ?>
                                                <table class="table ">
                                                    <thead>
                                                        <tr>
                                                            <th class="serial">#</th>
                                                            <th class="avatar">Avatar</th>
                                                            <th>Name</th>
                                                            <th>Role</th>
                                                            <th>Last Login</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="serial">1.</td>
                                                            <td class="avatar">
                                                                <div class="round-img">
                                                                    <a href="#"><img class="rounded-circle" src="<?php echo $user['profile_picture']; ?>" alt=""></a>
                                                                </div>
                                                            </td>
                                                            <td>  <span class="name"><?php echo $user['first_name'].' '.$user['last_name']; ?></span> </td>
                                                            <td> <span class="product">Admin</span> </td>
                                                            <?php 
                                                                if( date("d/m/Y") == date("d/m/Y",strtotime($user['updated_at'])) ) 
                                                                    $datee = date("h:i:sa",strtotime($user['updated_at']));
                                                                else 
                                                                    $datee = date("d/m/Y",strtotime($user['updated_at']));
                                                            ?>
                                                            <td><span class="product"><?php echo $datee; ?></span></td>
                                                            <td>
                                                                <span class="badge badge-complete">Owner</span>
                                                            </td>
                                                        </tr>  
                                                        <?php if($employees != NULL) { 
                                                            $count = 2;
                                                            foreach($employees as $emp) { ?>

                                                            <tr>
                                                                <td class="serial"><?php echo $count; ?>.</td>
                                                                <td class="avatar">
                                                                    <div class="round-img">
                                                                        <a href="#"><img class="rounded-circle" src="<?php echo $emp['profile_picture']; ?>" alt=""></a>
                                                                    </div>
                                                                </td>
                                                                <td>  <span class="name"><?php echo $emp['first_name'].' '.$emp['last_name']; ?></span> </td>
                                                                <td> <span class="product"><?php echo $emp['role']; ?></span> </td>
                                                                <?php 
                                                                    if( date("d/m/Y") == date("d/m/Y",strtotime($emp['updated_at'])) ) 
                                                                        $datee = date("h:i:sa",strtotime($emp['updated_at']));
                                                                    else 
                                                                        $datee = date("d/m/Y",strtotime($emp['updated_at']));
                                                                ?>
                                                                <td><span class="product"><?php echo $datee; ?></span></td>
                                                                <td>
                                                                    <span class="badge badge-complete" onclick="resource_action(<?php echo $business_registry_id; ?>,<?php echo $emp['user_id']; ?>);"><i class="fa fa-child"></i></span>
                                                                </td>
                                                            </tr>   
                                                            
                                                        <?php $count++; } } else { ?>
                                                            <tr><td colspan="6"><span class="product text-center">No employees yet.</span></td></tr>
                                                        <?php } ?>                                           
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                        
                        <div class="row">

                            <div class="col-lg-4 col-md-6">
                                <div class="card br-0">
                                    <div class="card-body">
                                        <div class="chart-container ov-h">
                                            <div id="flotPie1" class="float-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="card br-0">
                                    <div class="card-body">
                                        <div class="chart-container ov-h">
                                            <div id="flotPie1" class="float-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="card bg-flat-color-3  ">
                                    <div class="card-body">
                                        <h4 class="card-title m-0  white-color ">August 2018</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotLine5" class="flot-line"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--Appointment Request-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Appointment Request</strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table-appointment" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Patient Name</th>
                                                    <th>Time Slot</th>
                                                    <th>Phone</th>
                                                    <th>Doctor</th>
                                                    <th>Issue</th>
                                                    <th>Accept</th>
                                                    <th>Cancel</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>10:00 AM - 12:00 PM</td>
                                                    <td>9876543216</td>
                                                    <td>Dr. S.K.Sarkar</td>
                                                    <td>Teeth whitening</td>
                                                    <td class="text-center"><a href="#"><i
                                                                class="fa fa-check text-success"></i></a></td>
                                                    <td class="text-center"><a href="#"></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>10:00 AM - 12:00 PM</td>
                                                    <td>8907654132</td>
                                                    <td>Dr. Sushmita Roy Chowdhury</td>
                                                    <td>Fever</td>
                                                    <td class="text-center"><a href="#"></a></td>
                                                    <td class="text-center"><a href="#"><i
                                                                class="fa fa-times text-danger"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Ashton Cox</td>
                                                    <td>12:00 PM - 02:00 PM</td>
                                                    <td>7890651243</td>
                                                    <td>Dr. Kunal Goswami</td>
                                                    <td>Hair transplant</td>
                                                    <td class="text-center"><a href="#"><i
                                                                class="fa fa-check text-success"></i></a></td>
                                                    <td class="text-center"><a href="#"></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Rhona Davidson</td>
                                                    <td>02:00 PM - 06:00 PM</td>
                                                    <td>9876912340</td>
                                                    <td>Dr. Sonia Agarwal</td>
                                                    <td>Eye Checkup</td>
                                                    <td class="text-center"><a href="#"><i
                                                                class="fa fa-check text-success"></i></a></td>
                                                    <td class="text-center"><a href="#"></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Appointment Request-->

                        <!--Confirmed Appointment-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div><strong class="card-title">Confirmed Appointments</strong></div>
                                            <div class="d-flex">
                                                <div class="pr-2" style="border-right: 1px solid rgb(189, 189, 189);"><strong
                                                        class="card-title"><a href="#" class="text-dark"><i
                                                                class="fa fa-plus mr-1 text-success"></i>Add New</a></strong>
                                                </div>
                                                <div class="pl-2"><strong class="card-title"><a href="#" class="text-dark">Show
                                                            All</a></strong></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table-conform" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Patient Name</th>
                                                    <th>Time Slot</th>
                                                    <th>Phone</th>
                                                    <th>Doctor</th>
                                                    <th>Issue</th>
                                                    <th>Manage</th>
                                                    <th>Cancel</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>12:00 PM - 03:00 PM</td>
                                                    <td>9876543216</td>
                                                    <td>Dr. S.K.Sarkar</td>
                                                    <td>Teeth whitening</td>
                                                    <td class="text-center">
                                                        <div>
                                                            <a href="#" class="text-dark mr-2" style="padding: 10px 8px;"><i
                                                                    class="fa fa-long-arrow-up"></i></a>
                                                            <a href="#" class="text-dark" style="padding: 10px 8px;"><i
                                                                    class="fa fa-long-arrow-down"></i></a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><a href="#" style="padding: 10px;"><i
                                                                class="fa fa-times text-danger"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>03:00 PM - 06:00 PM</td>
                                                    <td>8907654132</td>
                                                    <td>Dr. Sushmita Roy Chowdhury</td>
                                                    <td>Fever</td>
                                                    <td class="text-center">
                                                        <div>
                                                            <a href="#" class="text-dark mr-2" style="padding: 10px 8px;"><i
                                                                    class="fa fa-long-arrow-up"></i></a>
                                                            <a href="#" class="text-dark" style="padding: 10px 8px;"><i
                                                                    class="fa fa-long-arrow-down"></i></a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><a href="#" style="padding: 10px;"><i
                                                                class="fa fa-times text-danger"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Ashton Cox</td>
                                                    <td>04:00 PM - 06:00 PM</td>
                                                    <td>7890651243</td>
                                                    <td>Dr. Kunal Goswami</td>
                                                    <td>Hair transplant</td>
                                                    <td class="text-center">
                                                        <div>
                                                            <a href="#" class="text-dark mr-2" style="padding: 10px 8px;"><i
                                                                    class="fa fa-long-arrow-up"></i></a>
                                                            <a href="#" class="text-dark" style="padding: 10px 8px;"><i
                                                                    class="fa fa-long-arrow-down"></i></a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><a href="#" style="padding: 10px;"><i
                                                                class="fa fa-times text-danger"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Rhona Davidson</td>
                                                    <td>06:00 PM - 09:00 PM</td>
                                                    <td>9876912340</td>
                                                    <td>Dr. Sonia Agarwal</td>
                                                    <td>Eye Checkup</td>
                                                    <td class="text-center">
                                                        <div>
                                                            <a href="#" class="text-dark mr-2" style="padding: 10px 8px;"><i
                                                                    class="fa fa-long-arrow-up"></i></a>
                                                            <a href="#" class="text-dark" style="padding: 10px 8px;"><i
                                                                    class="fa fa-long-arrow-down"></i></a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><a href="#" style="padding: 10px;"><i
                                                                class="fa fa-times text-danger"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Confirmed Appointment-->

                        <!--  Visit Graph  -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;">
                                                    <strong>Visits</strong></h4>
                                                <div>
                                                    <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                            class="fa fa-caret-up text-success mr-1"
                                                            style="vertical-align: middle;"></i></span>
                                                    <!--<span><i class="fa fa-caret-down"></i>--></span><span
                                                        class="text-success" style="font-size: 14px;">21&#37;</span>

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div style="position: relative;">
                                                    <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                        data-target="#visit" aria-controls="navbarSupportedContent"
                                                        aria-expanded="false" aria-label="Toggle navigation">
                                                        <button type="button" class="btn text-dark"
                                                            style="background-color: lavender;">
                                                            <div class="d-flex">
                                                                <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                                <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                    style="color: grey; font-size: small; margin-top: auto;"></i>
                                                            </div>
                                                        </button>
                                                    </a>
                                                    <div class="collapse cus-nav-dpdown" id="visit">
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Week</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Month</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Year</label>
                                                        </div>
                                                    </div>
                                                </div>



                                                <i class="fa fa-calendar pl-3 custom-cal"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="card-body">
                                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                                <canvas id="visit-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="card-body">

                                                <div class="progress-box progress-2 mb-3">


                                                </div>

                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Current Visitors</h4>
                                                    <div class="por-txt">3,220 Users (24%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                            style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Previous Visitors</h4>
                                                    <div class="por-txt">29,658 Users (60%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                            style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Increase Rate</h4>
                                                    <div class="por-txt">99,658 Users (90%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                            style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.card-body -->
                                        </div>
                                    </div> <!-- /.row -->

                                </div>
                            </div><!-- /# column -->
                        </div>
                        <!--  /Visit Graph -->

                        <!--  Click Graph  -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;"><strong>Click</strong>
                                                </h4>
                                                <div>
                                                    <span class="mr-1" style="font-size: 22px;">190</span>
                                                    <!--<span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: middle;"></i></span>--><span><i
                                                            class="fa fa-caret-down text-danger mr-1"
                                                            style="vertical-align: middle;"></i></span>
                                                    <!--<span class="text-success" style="font-size: 14px;">21&#37;</span>--><span
                                                        class="text-danger" style="font-size: 14px;">21&#37;</span>

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div style="position: relative;">
                                                    <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                        data-target="#click" aria-controls="navbarSupportedContent"
                                                        aria-expanded="false" aria-label="Toggle navigation">
                                                        <button type="button" class="btn text-dark"
                                                            style="background-color: lavender;">
                                                            <div class="d-flex">
                                                                <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                                <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                    style="color: grey; font-size: small; margin-top: auto;"></i>
                                                            </div>
                                                        </button>
                                                    </a>
                                                    <div class="collapse cus-nav-dpdown" id="click">
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Week</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Month</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Year</label>
                                                        </div>
                                                    </div>
                                                </div>



                                                <i class="fa fa-calendar pl-3 custom-cal"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="card-body">
                                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                                <canvas id="click-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="card-body">

                                                <div class="progress-box progress-2 mb-3">


                                                </div>

                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Current Visitors</h4>
                                                    <div class="por-txt">3,220 Users (24%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                            style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Previous Visitors</h4>
                                                    <div class="por-txt">29,658 Users (60%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                            style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Increase Rate</h4>
                                                    <div class="por-txt">99,658 Users (90%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                            style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.card-body -->
                                        </div>
                                    </div> <!-- /.row -->

                                </div>
                            </div><!-- /# column -->
                        </div>
                        <!--  /Click Graph -->

                        <!--Target Graph-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;">
                                                    <strong>Target</strong></h4>
                                                <div>
                                                    <span class="mr-1" style="font-size: 22px;">190</span>
                                                    <!--<span><i class="fa fa-caret-up text-success mr-1" style="vertical-align: middle;"></i></span>--><span><i
                                                            class="fa fa-caret-down text-danger mr-1"
                                                            style="vertical-align: middle;"></i></span>
                                                    <!--<span class="text-success" style="font-size: 14px;">21&#37;</span>--><span
                                                        class="text-danger" style="font-size: 14px;">21&#37;</span>

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div style="position: relative;">
                                                    <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                        data-target="#target" aria-controls="navbarSupportedContent"
                                                        aria-expanded="false" aria-label="Toggle navigation">
                                                        <button type="button" class="btn text-dark"
                                                            style="background-color: lavender;">
                                                            <div class="d-flex">
                                                                <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                                <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                    style="color: grey; font-size: small; margin-top: auto;"></i>
                                                            </div>
                                                        </button>
                                                    </a>
                                                    <div class="collapse cus-nav-dpdown" id="target">
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Week</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Month</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Year</label>
                                                        </div>
                                                    </div>
                                                </div>



                                                <i class="fa fa-calendar pl-3 custom-cal"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="card-body">
                                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                                <canvas id="target-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="card-body">

                                                <div class="progress-box progress-2 mb-3">


                                                </div>

                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Current Visitors</h4>
                                                    <div class="por-txt">3,220 Users (24%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                            style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Previous Visitors</h4>
                                                    <div class="por-txt">29,658 Users (60%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                            style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Increase Rate</h4>
                                                    <div class="por-txt">99,658 Users (90%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                            style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.card-body -->
                                        </div>
                                    </div> <!-- /.row -->

                                </div>
                            </div><!-- /# column -->
                        </div>
                        <!--/Target Graph-->

                        <!--Review-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;">
                                                    <strong>Review</strong></h4>
                                                <div>
                                                    <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                            class="fa fa-caret-up text-success mr-1"
                                                            style="vertical-align: middle;"></i></span>
                                                    <!--<span><i class="fa fa-caret-down text-danger mr-1"  style="vertical-align: middle;"></i></span>--><span
                                                        class="text-success" style="font-size: 14px;">21&#37;</span>
                                                    <!--<span class="text-danger" style="font-size: 14px;">21&#37;</span>-->

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div style="position: relative;">
                                                    <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                        data-target="#review" aria-controls="navbarSupportedContent"
                                                        aria-expanded="false" aria-label="Toggle navigation">
                                                        <button type="button" class="btn text-dark"
                                                            style="background-color: lavender;">
                                                            <div class="d-flex">
                                                                <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                                <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                    style="color: grey; font-size: small; margin-top: auto;"></i>
                                                            </div>
                                                        </button>
                                                    </a>
                                                    <div class="collapse cus-nav-dpdown" id="review">
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Week</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Month</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Year</label>
                                                        </div>
                                                    </div>
                                                </div>



                                                <i class="fa fa-calendar pl-3 custom-cal"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="card-body">
                                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                                <canvas id="review-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="card-body">

                                                <div class="progress-box progress-2 mb-3">


                                                </div>

                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Current Visitors</h4>
                                                    <div class="por-txt">3,220 Users (24%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                            style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Previous Visitors</h4>
                                                    <div class="por-txt">29,658 Users (60%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                            style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Increase Rate</h4>
                                                    <div class="por-txt">99,658 Users (90%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                            style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.card-body -->
                                        </div>
                                    </div> <!-- /.row -->

                                </div>
                            </div><!-- /# column -->
                        </div>
                        <!--/Review-->

                        <!--Conversion Rate-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;"><strong>Conversion
                                                Rate</strong></h4>
                                    </div>
                                    <div class="card-body">
                                        <!--Conformation-->
                                        <div class="">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex justify-content-between">
                                                        <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;">
                                                            <strong>Conformation</strong></h4>
                                                        <div>
                                                            <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                                    class="fa fa-caret-up text-success mr-1"
                                                                    style="vertical-align: middle;"></i></span>
                                                            <!--<span><i class="fa fa-caret-down text-danger mr-1"  style="vertical-align: middle;"></i></span>--><span
                                                                class="text-success" style="font-size: 14px;">21&#37;</span>
                                                            <!--<span class="text-danger" style="font-size: 14px;">21&#37;</span>-->

                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div style="position: relative;">
                                                            <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                                data-target="#conformation"
                                                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                                                aria-label="Toggle navigation">
                                                                <button type="button" class="btn text-dark"
                                                                    style="background-color: lavender;">
                                                                    <div class="d-flex">
                                                                        <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                            style="color: grey; font-size: small; margin-top: auto;"></i>
                                                                    </div>
                                                                </button>
                                                            </a>
                                                            <div class="collapse cus-nav-dpdown" id="conformation">
                                                                <div class="drop-style">
                                                                    <label class="mb-0">1 Week</label>
                                                                </div>
                                                                <div class="drop-style">
                                                                    <label class="mb-0">1 Month</label>
                                                                </div>
                                                                <div class="drop-style">
                                                                    <label class="mb-0">1 Year</label>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <i class="fa fa-calendar pl-3 custom-cal"></i>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="card-body">
                                                        <!-- <canvas id="TrafficChart"></canvas>   -->

                                                        <canvas id="conformation-chart"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="card-body">

                                                        <div class="progress-box progress-2 mb-3">


                                                        </div>

                                                        <div class="progress-box progress-2">
                                                            <h4 class="por-title font-styl">Current Visitors</h4>
                                                            <div class="por-txt">3,220 Users (24%)</div>
                                                            <div class="progress mb-2" style="height: 5px;">
                                                                <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                                    style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-box progress-2">
                                                            <h4 class="por-title font-styl">Previous Visitors</h4>
                                                            <div class="por-txt">29,658 Users (60%)</div>
                                                            <div class="progress mb-2" style="height: 5px;">
                                                                <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-box progress-2">
                                                            <h4 class="por-title font-styl">Increase Rate</h4>
                                                            <div class="por-txt">99,658 Users (90%)</div>
                                                            <div class="progress mb-2" style="height: 5px;">
                                                                <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                                    style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- /.card-body -->
                                                </div>
                                            </div> <!-- /.row -->
                                        </div>
                                        <!--/Conformation-->

                                        <!--Cancel Rate-->
                                        <div class="mt-4">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex justify-content-between">
                                                        <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;"><strong>Cancel
                                                                Rate</strong></h4>
                                                        <div>
                                                            <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                                    class="fa fa-caret-up text-success mr-1"
                                                                    style="vertical-align: middle;"></i></span>
                                                            <!--<span><i class="fa fa-caret-down text-danger mr-1"  style="vertical-align: middle;"></i></span>--><span
                                                                class="text-success" style="font-size: 14px;">21&#37;</span>
                                                            <!--<span class="text-danger" style="font-size: 14px;">21&#37;</span>-->

                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div style="position: relative;">
                                                            <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                                data-target="#cancel" aria-controls="navbarSupportedContent"
                                                                aria-expanded="false" aria-label="Toggle navigation">
                                                                <button type="button" class="btn text-dark"
                                                                    style="background-color: lavender;">
                                                                    <div class="d-flex">
                                                                        <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                                        <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                            style="color: grey; font-size: small; margin-top: auto;"></i>
                                                                    </div>
                                                                </button>
                                                            </a>
                                                            <div class="collapse cus-nav-dpdown" id="cancel">
                                                                <div class="drop-style">
                                                                    <label class="mb-0">1 Week</label>
                                                                </div>
                                                                <div class="drop-style">
                                                                    <label class="mb-0">1 Month</label>
                                                                </div>
                                                                <div class="drop-style">
                                                                    <label class="mb-0">1 Year</label>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <i class="fa fa-calendar pl-3 custom-cal"></i>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="card-body">
                                                        <!-- <canvas id="TrafficChart"></canvas>   -->

                                                        <canvas id="cancel-chart"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="card-body">

                                                        <div class="progress-box progress-2 mb-3">


                                                        </div>

                                                        <div class="progress-box progress-2">
                                                            <h4 class="por-title font-styl">Current Visitors</h4>
                                                            <div class="por-txt">3,220 Users (24%)</div>
                                                            <div class="progress mb-2" style="height: 5px;">
                                                                <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                                    style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-box progress-2">
                                                            <h4 class="por-title font-styl">Previous Visitors</h4>
                                                            <div class="por-txt">29,658 Users (60%)</div>
                                                            <div class="progress mb-2" style="height: 5px;">
                                                                <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-box progress-2">
                                                            <h4 class="por-title font-styl">Increase Rate</h4>
                                                            <div class="por-txt">99,658 Users (90%)</div>
                                                            <div class="progress mb-2" style="height: 5px;">
                                                                <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                                    style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- /.card-body -->
                                                </div>
                                            </div> <!-- /.row -->
                                        </div>
                                        <!--/Cancel Rate-->
                                    </div>
                                </div>
                            </div><!-- /# column -->
                        </div>
                        <!--/Convention Rate-->

                        <!--Peak Timming-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;"><strong>Peak
                                                        Timming</strong></h4>
                                                <div>
                                                    <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                            class="fa fa-caret-up text-success mr-1"
                                                            style="vertical-align: middle;"></i></span>
                                                    <!--<span><i class="fa fa-caret-down text-danger mr-1"  style="vertical-align: middle;"></i></span>--><span
                                                        class="text-success" style="font-size: 14px;">21&#37;</span>
                                                    <!--<span class="text-danger" style="font-size: 14px;">21&#37;</span>-->

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div style="position: relative;">
                                                    <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                        data-target="#timming" aria-controls="navbarSupportedContent"
                                                        aria-expanded="false" aria-label="Toggle navigation">
                                                        <button type="button" class="btn text-dark"
                                                            style="background-color: lavender;">
                                                            <div class="d-flex">
                                                                <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                                <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                    style="color: grey; font-size: small; margin-top: auto;"></i>
                                                            </div>
                                                        </button>
                                                    </a>
                                                    <div class="collapse cus-nav-dpdown" id="timming">
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Week</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Month</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Year</label>
                                                        </div>
                                                    </div>
                                                </div>



                                                <i class="fa fa-calendar pl-3 custom-cal"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="card-body">
                                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                                <canvas id="timming-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="card-body">

                                                <div class="progress-box progress-2 mb-3">


                                                </div>

                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Current Visitors</h4>
                                                    <div class="por-txt">3,220 Users (24%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                            style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Previous Visitors</h4>
                                                    <div class="por-txt">29,658 Users (60%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                            style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Increase Rate</h4>
                                                    <div class="por-txt">99,658 Users (90%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                            style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.card-body -->
                                        </div>
                                    </div> <!-- /.row -->

                                </div>
                            </div><!-- /# column -->
                        </div>
                        <!--/Peak Timming-->

                        <!--Return Rate-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mb-0 mr-2" style="margin-top: 6px;"><strong>Return
                                                        Rate</strong></h4>
                                                <div>
                                                    <span class="mr-1" style="font-size: 22px;">190</span><span><i
                                                            class="fa fa-caret-up text-success mr-1"
                                                            style="vertical-align: middle;"></i></span>
                                                    <!--<span><i class="fa fa-caret-down text-danger mr-1"  style="vertical-align: middle;"></i></span>--><span
                                                        class="text-success" style="font-size: 14px;">21&#37;</span>
                                                    <!--<span class="text-danger" style="font-size: 14px;">21&#37;</span>-->

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div style="position: relative;">
                                                    <a class="navbar-toggler pl-0 pr-0 pb-0 mr-3" data-toggle="collapse"
                                                        data-target="#return" aria-controls="navbarSupportedContent"
                                                        aria-expanded="false" aria-label="Toggle navigation">
                                                        <button type="button" class="btn text-dark"
                                                            style="background-color: lavender;">
                                                            <div class="d-flex">
                                                                <h4 class="mb-0 pr-3"><strong>Sort By</strong></h4>
                                                                <i class="fa fa-chevron-down navbar-toggler-icon"
                                                                    style="color: grey; font-size: small; margin-top: auto;"></i>
                                                            </div>
                                                        </button>
                                                    </a>
                                                    <div class="collapse cus-nav-dpdown" id="return">
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Week</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Month</label>
                                                        </div>
                                                        <div class="drop-style">
                                                            <label class="mb-0">1 Year</label>
                                                        </div>
                                                    </div>
                                                </div>



                                                <i class="fa fa-calendar pl-3 custom-cal"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="card-body">
                                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                                <canvas id="return-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="card-body">

                                                <div class="progress-box progress-2 mb-3">


                                                </div>

                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Current Visitors</h4>
                                                    <div class="por-txt">3,220 Users (24%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-2" role="progressbar"
                                                            style="width: 24%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Previous Visitors</h4>
                                                    <div class="por-txt">29,658 Users (60%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-3" role="progressbar"
                                                            style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-box progress-2">
                                                    <h4 class="por-title font-styl">Increase Rate</h4>
                                                    <div class="por-txt">99,658 Users (90%)</div>
                                                    <div class="progress mb-2" style="height: 5px;">
                                                        <div class="progress-bar bg-flat-color-4" role="progressbar"
                                                            style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.card-body -->
                                        </div>
                                    </div> <!-- /.row -->

                                </div>
                            </div><!-- /# column -->
                        </div>
                        <!--/Return Rate-->

                <?php } ?>                

                <!-- <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                        
                    <div class="tab-pane fade show active" id="asd">
                                      
                    </div>

                    <?php //if($businesses != NULL) { foreach($businesses as $bis) {?>
                        <?php //$aaa = str_replace(' ', '', $bis['business_name']); ?>
                    <div class="tab-pane fade" id="<?php //echo $aaa; ?>" aria-labelledby="<?php echo $aaa; ?>-tab">
                        <h1><?php //echo $bis['business_name']; ?></h1>
                    </div>
                    <?php //} } ?>
                </div> -->



                <script>
                    jQuery(document).ready(function($) {

                        $('#resource_type').on('change', function() {
                        if ( this.value == 'doctor') {
                            $("#doctor").show();
                            $("#resource").hide();
                        } else if ( this.value == 'resource') {
                            $("#doctor").hide();
                            $("#resource").show();
                        }
                        });

                        $('#category_select').on('change', function() {
                            // if ( this.value == 'doctor') {
                            //     $("#doctor").show();
                            //     $("#resource").hide();
                            // } else if ( this.value == 'resource') {
                            //     $("#doctor").hide();
                            //     $("#resource").show();
                            // }
                            $("#specialist").show();
                        });
                    });
                </script>


            <?php } ?>
                
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php } ?>
<?php } ?>