<?php if(!$this->session->userdata('blogged_in')) {
    redirect('home');
} else { ?>
<?php if($this->uri->segment(1) == "admin") {
        $this->load->view('all_modals'); ?>


    <div class="content">
        <div class="animated fadeIn">
        
            <div class="row">


                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Business</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Business</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php 
                            $servPro = $this->ServPro_model->show_enrlSer();
                            if($servPro != NULL) {
                                foreach($servPro as $enrServ) {
                                    echo '<tr>';
                                    echo '<td><a href="'.base_url().'admin/seller_profile/'.$enrServ['user_id'].'">'.$enrServ['business_name'].'</a></td>';
                                    echo '<td><a href="tel:'.$enrServ['business_phone'].'">'.$enrServ['business_phone'].'</a></td>';
                                    echo '<td><a href="mail:'.$enrServ['business_email'].'">'.$enrServ['business_email'].'</a></td>';
                                    echo '<td>'.$enrServ['business_address'].'</td>';
                                    echo '<td>';
                                    echo '<a class="btn btn-sm btn-success" href="'.base_url().'admin/enrolled_details/'.$enrServ['business_registry_id'].'" ><i class="fa fa-eye"></i> check</a>';
                                    echo '<button onclick="approve_saler('.$enrServ['business_registry_id'].','.$enrServ['user_id'].');" class="btn btn-sm btn-warning"><i class="fa fa-check"></i> Approve</button>';
                                    echo '<button onclick="decline_saler('.$enrServ['user_id'].');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Decline</button>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="4">No data available</td></tr>';
                            }
                        ?>

                    </tbody>
                </table>
                        

            </div>
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->


<?php } } ?>