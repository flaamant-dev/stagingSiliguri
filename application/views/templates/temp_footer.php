<!-- Contact Section  -->
<section style="background-color: #353535;">

    <div class="container pt-5 text-light">
<style>
    ul,li {
        list-style-type:none;
    }
</style>
        <div class="row " style="list-style-type: none;">

            <div class="col-lg-3 ">

                <h4>About Us</h4>
                <div class="mt-4">
                    <p>
                        Cras fermentum odio eu feugiat.
                        Amet volutpat consequat mauris .volutpat consequat mauris nunc congue.
                    </p>
                </div>

            </div>

            <div class="col-lg-3 ">


                <h4>Menu</h4>
                <div class="mt-4">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>home" class="text-white">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>about" class="text-white">About</a></li>
                        <li><a href="<?php echo base_url(); ?>showDoc" class="text-white">All Doctors</a></li>
                        <li><a href="<?php echo base_url(); ?>home" class="text-white">Service</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3">

                <h4>Customer Services</h4>
                <div class="mt-4">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>privacy" class="text-white">Privacy Policy</a></li>
                        <li><a href="<?php echo base_url(); ?>terms" class="text-white">Terms & Conditions</a></li>
                        <li><a href="<?php echo base_url(); ?>faqs" class="text-white">FAQs</a></li>
                        <li><a href="<?php echo base_url(); ?>shipping" class="text-white">Online Shopping</a></li>
                    </ul>
                </div>
            </div>




            <div class="col-lg-3 ">

                <h4>My Account</h4>
                <div class="mt-4">
                    <ul>
                        <?php if($this->session->userdata('logged_in') ) {?>
                            <?php if($this->session->userdata('type') == 'SUPER_ADMIN') { ?>
                                <li><a class="text-white" href="<?php echo base_url(); ?>admin/dashboard">My Dashboard</a></li>
                                <li><a class="text-white" href="<?php echo base_url(); ?>admin/profile">My Profile</a></li>
                            <?php } else {?>
                                <li><a class="text-white" href="<?php echo base_url(); ?>users/dashboard">My Dashboard</a></li>
                                <li><a class="text-white" href="<?php echo base_url(); ?>users/profile">My Profile</a></li>
                                <li><a class="text-white" href="<?php echo base_url(); ?>users/provideService">Register Business</a></li>
                                    <?php $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); ?>
                                    <?php if($user['user_type'] == 'Saler') { ?>
                                        <li><a class="text-white" href="<?php echo base_url(); ?>users/store">My Store</a></li>
                                    <?php } ?>
                            <?php } ?>
                        <?php } else {?>
                            <li><a href="#" class="text-white" data-toggle="modal" data-target="#loginModal">Login / Register</a></li>
                            <li><a href="#" class="text-white" data-toggle="modal" data-target="#rndSlrModal">Register Business</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>




        </div>

        <div class="row">


            <div class="col-lg-12 text-center mt-5">

                <h3><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Siliguri.city company logo" width="160px"></h3>
                <p>Onestop solution for Siliguri</p>
                <p>
                    If you can not find it in Siliguri.City, you will not in SILIGURI.
                </p>
                <a href="#" class="fa fa-facebook" style="background-color: #3b5998; color: #fff;"></a>
                <a href="#" class="fa fa-twitter" style="background-color: #1da1f2; color: #fff;"><i></i></a>
                <a href="#" class="fa fa-pinterest" style="background-color: #e60023; color: #fff;"></a>
                <a href="#" class="fa fa-dribbble" style="background-color: #ea4c89; color: #fff;"></a>


            </div>
        </div>


        <div class="row pl-8 mt-3 pb-5">

            <div class="col-lg-4"><a href="#">Hakimpara,Siliguri-734003</a></div>
            <div class="col-lg-4"><a href="tel:+919865743215">9051311471</a></div>
            <div class="col-lg-4"><a href="mailto:info@siliguri.city">info@siliguri.city</a></div>

        </div>

    </div>

</section>