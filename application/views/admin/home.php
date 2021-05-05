
    <div class="content">
        <div class="animated fadeIn">            
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-1"></div>
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-10">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <form class="user" action="backSignedin" method="POST">
                            <div class="form-group">
                                <input type="email" name="input_email" class="form-control form-control-user"
                                    aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                    required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" name="input_pswd" class="form-control form-control-user"
                                    placeholder="Password" required="required">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->