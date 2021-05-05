<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>
<?php $user = $this->Status_model->show_user_professional_status($this->session->userdata('user_id')); ?>



    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="visited-data-history" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Visited Date</th>
                                        <th>Next Visit Date</th>
                                        <th>View Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>Michael Bruce</td>
                                        <td><?php echo date("d M, Y"); ?></td>
                                        <td><?php echo date("d M, Y"); ?></td>
                                        <td><a class="btn btn-sm btn-info">View Details</a></td>
                                    </tr>
                                    <tr>
                                        <td>Michael Bruce</td>
                                        <td><?php echo date("d M, Y"); ?></td>
                                        <td><?php echo date("d M, Y"); ?></td>
                                        <td><a class="btn btn-sm btn-info">View Details</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php $this->load->view('page_footer'); ?>


</div><!-- /#right-panel -->

<?php } ?>