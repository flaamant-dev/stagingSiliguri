<body class="open">
    <style>
        body { padding-right: 0 !important }
        .fa-beat {
            color: #de2504;
            animation:fa-beat 5s ease infinite;
        }
        @keyframes fa-beat {
            0% {
                transform:scale(1);
            }
            5% {
                transform:scale(1.25);
            }
            20% {
                transform:scale(1);
            }
            30% {
                transform:scale(1);
            }
            35% {
                transform:scale(1.25);
            }
            50% {
                transform:scale(1);
            }
            55% {
                transform:scale(1.25);
            }
            70% {
                transform:scale(1);
            }
        }
    </style>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php if ($this->uri->segment(1) == "home"){ echo "active"; } ?>">
                        <a href="<?php echo base_url(); ?>home"><i class="menu-icon fa fa-home"></i>Home </a>
                    </li>
                    <li class="<?php if ($this->uri->segment(1) == "showDoc"){ echo "active"; } ?>">
                        <a href="<?php echo base_url(); ?>showDoc"> <i class="menu-icon fa fa-heartbeat fa-beat text-danger"></i>Doctor </a>
                    </li>
                    <!-- <li class="<?php //if ($this->uri->segment(1) == "product"){ echo "active"; } ?>">
                        <a href="<?php //echo base_url(); ?>product"> <i class="menu-icon fa fa-product-hunt"></i>Products </a>
                    </li>
                    <li class="<?php //if ($this->uri->segment(1) == "service"){ echo "active"; } ?>">
                        <a href="<?php //echo base_url(); ?>service"> <i class="menu-icon fa fa-envelope"></i>Services </a>
                    </li> -->



                    <?php if($this->session->userdata('logged_in')) {?>
                        <li class="menu-title">Logged In</li>
                        <?php if($this->session->userdata('type') == 'SUPER_ADMIN') { ?>
                            <li class="menu-item-has-children dropdown 
                                    <?php if($this->uri->segment(2) == 'dashboard'
                                            || $this->uri->segment(2) == 'admin_profile'
                                            || $this->uri->segment(2) == 'category'
                                            || $this->uri->segment(2) == 'enrolled_provider'
                                            || $this->uri->segment(2) == 'servicep'
                                            || $this->uri->segment(2) == 'users') 
                                    { echo 'active'; } ?>"
                                >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                    <i class="menu-icon fa fa-laptop"></i>Admin
                                </a>
                                <ul class="sub-menu children dropdown-menu">
                                    
                                    <li>
                                        <i class="fa fa-laptop"></i>
                                        <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-user"></i>
                                        <a href="<?php echo base_url(); ?>admin/admin_profile/<?php echo $this->session->userdata('user_id'); ?>">Profile</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-list"></i>
                                        <a href="<?php echo base_url(); ?>admin/category">Categories</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-laptop"></i>
                                        <a href="<?php echo base_url(); ?>admin/enrolled_provider">Requested Providers</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-laptop"></i>
                                        <a href="<?php echo base_url(); ?>admin/servicep">Service Providers</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-laptop"></i>
                                        <a href="<?php echo base_url(); ?>admin/users">Users</a>
                                    </li>
                                </ul>
                            </li>

                        <?php } else {?>
                            <?php 
                                $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); 
                            ?>
                            <?php if($user['user_type'] == 'User') { ?>
                                <li class="menu-item-has-children dropdown 
                                    <?php if($this->uri->segment(2) == 'dashboard'
                                            || $this->uri->segment(2) == 'profile' 
                                            || $this->uri->segment(2) == 'visited_doctor' 
                                            // || $this->uri->segment(2) == 'request_history' 
                                            // || $this->uri->segment(2) == 'purchase_history' 
                                            // || $this->uri->segment(2) == 'contacted_dealer' 
                                            // || $this->uri->segment(2) == 'activity_log'
                                            )
                                    { echo 'active'; } ?>
                                    ">
                                    
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                        <i class="menu-icon fa fa-laptop"></i>Dashboard
                                    </a>
                                    <ul class="sub-menu children dropdown-menu">
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php echo base_url(); ?>users/dashboard">Dashboard</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-user"></i>
                                            <a href="<?php echo base_url(); ?>users/visited_doctor">Visited Doctors</a>
                                        </li>
                                        <!-- <li>
                                            <i class="fa fa-user"></i>
                                            <a href="<?php //echo base_url(); ?>users/request_history">Request History</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-list"></i>
                                            <a href="<?php //echo base_url(); ?>users/purchase_history">Purchase History</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php //echo base_url(); ?>users/contacted_dealer">Contacted Dealer</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php //echo base_url(); ?>users/my_feeds">My Feeds</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php //echo base_url(); ?>users/activity_log">Activity Log</a>
                                        </li> -->
                                    </ul>

                                </li>
                                <?php if($user['profession'] == 'DOCTOR') { ?>
                                    <!-- <li class="<?php if ($this->uri->segment(2) == "professional_profile"){ echo "active"; } ?>">
                                        <a href="<?php echo base_url(); ?>users/professional_profile"> <i class="menu-icon fa fa-user text-info"></i>Doctor </a>
                                    </li> -->
                                    <li class="<?php if ($this->uri->segment(2) == "professional_profile"){ echo "active"; } ?>">
                                        <a href="<?php echo base_url(); ?>users/professional_profile"> <i class="menu-icon fa fa-plus text-success"></i>Products </a>
                                    </li>
                                <?php } ?>
                            <?php } elseif($user['user_type'] == 'Saler') { ?>
                                <li class="menu-item-has-children dropdown 
                                    <?php if($this->uri->segment(2) == 'dashboard'
                                            || $this->uri->segment(2) == 'profile' 
                                            || $this->uri->segment(2) == 'visited_doctor' 
                                            // || $this->uri->segment(2) == 'request_history' 
                                            // || $this->uri->segment(2) == 'purchase_history' 
                                            // || $this->uri->segment(2) == 'contacted_dealer' 
                                            // || $this->uri->segment(2) == 'activity_log'
                                            )
                                    { echo 'active'; } ?>
                                    ">                                  
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                        <i class="menu-icon fa fa-laptop"></i>Dashboard
                                    </a>

                                    <ul class="sub-menu children dropdown-menu">
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php echo base_url(); ?>users/dashboard">Dashboard</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-user"></i>
                                            <a href="<?php echo base_url(); ?>users/visited_doctor">Visited Doctors</a>
                                        </li>
                                        <!-- <li>
                                            <i class="fa fa-user"></i>
                                            <a href="<?php //echo base_url(); ?>users/request_history">Request History</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-list"></i>
                                            <a href="<?php //echo base_url(); ?>users/purchase_history">Purchase History</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php //echo base_url(); ?>users/contacted_dealer">Contacted Dealer</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php //echo base_url(); ?>users/my_feeds">My Feeds</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php //echo base_url(); ?>users/activity_log">Activity Log</a>
                                        </li> -->
                                    </ul>
                                </li>
                                <?php if($user['profession'] == 'DOCTOR') { ?>
                                    <li class="<?php if ($this->uri->segment(2) == "professional_profile"){ echo "active"; } ?>">
                                        <a href="<?php echo base_url(); ?>users/professional_profile"> <i class="menu-icon fa fa-user text-info"></i>Doctor </a>
                                    </li>
                                <?php } ?>
                                <li class="<?php if ($this->uri->segment(2) == "store"){ echo "active"; } ?>">
                                    <a href="<?php echo base_url(); ?>users/store"><i class="menu-icon fa fa-building"></i>My Store </a>
                                </li>
                                <!-- <li class="menu-item-has-children dropdown 
                                    <?php //if($this->uri->segment(2) == "my_campaigns" || $this->uri->segment(2) == "dealing" || $this->uri->segment(2) == "feed") { echo "active"; } ?>">
                                                                      
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                        <i class="menu-icon fa fa-building"></i>My Store
                                    </a>

                                    <ul class="sub-menu children dropdown-menu">
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php echo base_url(); ?>users/products">My Product / service</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-user"></i>
                                            <a href="<?php echo base_url(); ?>users/proReviewsSL">My Products Reviews</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-list"></i>
                                            <a href="<?php echo base_url(); ?>users/selReviewSL">My Company Reviews</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php echo base_url(); ?>users/orders">Order Request</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php echo base_url(); ?>users/my_campaigns">My Advertise Campaign</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-laptop"></i>
                                            <a href="<?php echo base_url(); ?>users/dealing">Dealing Details</a>
                                        </li>
                                    </ul>
                                </li> -->
                            <?php } ?>
                        <?php } ?>
                        <li>
                            <a href="<?php echo base_url(); ?>users/logout">
                            <i class="menu-icon fa fa-power-off"></i>Logout </a>
                        </li>
                    <?php } ?>




                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->