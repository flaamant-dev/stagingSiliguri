<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url(); ?>home">
                    <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Siliguri City Logo">
                </a>
                <a class="navbar-brand hidden" href="<?php echo base_url(); ?>home">
                    <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Siliguri City Logo">
                </a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">

                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form" action="pages/search_form" method="post">
                            <input class="form-control mr-sm-2" id="cara_search_cat" type="text" placeholder="Search ..." aria-label="Search">
                            <input type="hidden" id="cara_search_cat_id">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                    <?php if($this->session->userdata('logged_in') ) {?>
                        <?php if(!($this->session->userdata('type') == 'SUPER_ADMIN' )) { ?>
                            <?php $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); ?>
                            <?php if($user['user_type'] == 'User') { ?>
                                <div class="dropdown for-notification">
                                    <a class="btn btn-primary dropdown-toggle" href="<?php echo base_url(); ?>users/provideService">
                                        <i class="fa fa-newspaper-o"></i>
                                    </a>
                                </div>
                            <?php } elseif($user['user_type'] == 'Saler') { ?>
                                <div class="dropdown for-notification">
                                    <a class="btn btn-primary dropdown-toggle" href="<?php echo base_url(); ?>users/provideService">
                                        <i class="fa fa-newspaper-o"></i>
                                    </a>
                                    <a class="btn btn-primary dropdown-toggle" href="<?php echo base_url(); ?>users/store">
                                        <i class="fa fa-building"></i>
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } else {?>

                        <div class="dropdown for-notification">
                            <button class="btn btn-primary dropdown-toggle" data-toggle="modal" data-target="#loginModal">
                                <i class="fa fa-sign-in"></i>
                            </button>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" data-toggle="modal" data-target="#rndSlrModal">
                                <i class="fa fa-tasks"></i>
                            </button>
                        </div>
                    <?php } ?>
                </div>

                <?php if($this->session->userdata('logged_in')) { ?>
                    <?php if($this->session->userdata('type') == 'SUPER_ADMIN') { ?>
                        <!-- ====ADMIN==== -->
                        <?php $admin = $this->Backend_model->show_admin($this->session->userdata('user_id')); ?>
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="<?php echo base_url(); ?>assets/images/admin.jpg" alt="Image">
                            </a>

                            <div class="user-menu dropdown-menu">
                                
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-laptop"></i>My Dashboard</a>
                                
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/profile"><i class="fa fa-user"></i>My Profile</a>

                                <a class="nav-link" href="<?php echo base_url(); ?>admin/notifications">
                                    <i class="fa fa-bell"></i>Notifications 
                                    <span class="count">13</span>
                                </a>

                                <a class="nav-link" href="<?php echo base_url(); ?>admin/settings"><i class="fa fa-cog"></i>Settings</a>
                                
                                <a class="nav-link" href="<?php echo base_url(); ?>users/logout"><i class="fa fa-power-off"></i>Logout</a>
                            </div>
                        </div>
                        <!-- //====ADMIN==== -->
                    <?php } else {?>
                        <!-- ====USER/SELLER==== -->
                        <?php $user = $this->User_model->show_user($this->session->userdata('user_id')); ?>
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="<?php echo $user['profile_picture']; ?>" alt="Image">
                            </a>

                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="<?php echo base_url(); ?>users/dashboard"><i class="fa fa-laptop"></i>My Dashboard</a>
                                
                                <a class="nav-link" href="<?php echo base_url(); ?>users/profile"><i class="fa fa-user"></i>My Profile</a>

                                <a class="nav-link" href="<?php echo base_url(); ?>users/notifications">
                                    <i class="fa fa-bell"></i>Notifications 
                                    <span class="count">13</span>
                                </a>

                                <a class="nav-link" href="<?php echo base_url(); ?>users/settings"><i class="fa fa-cog"></i>Settings</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>users/logout"><i class="fa fa-power-off"></i>Logout</a>
                            </div>
                        </div>
                        <!-- //====USER/SELLER==== -->
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </header>
    <!-- /#header -->