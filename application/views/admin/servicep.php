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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Service #</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Service #</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php 
                        $servPro = $this->ServPro_model->show_provider();
                        if($servPro != NULL) {
                            foreach($servPro as $adm) {

                                if($adm['user_stat'] == TRUE) {$chk='checked';} else {$chk='';}
                                echo '<tr>';
                                echo '<td><a href="'.base_url().'admin/seller_profile/'.$adm['user_id'].'">'.$adm['business_name'].'</a></td>';
                                echo '<td>'.$adm['phone'].'</td>';
                                echo '<td>'.$adm['email'].'</td>';
                                echo '<td>5</td>';
                                echo '<td><input type="checkbox" class="js-switch" '.$chk.' onchange="toggle_provider(\''.$adm['user_id'].'\');"></td>';
                                echo '<td>';
                                echo '<button class="btn btn-sm btn-info" onclick="edit_provider(\''.$adm['user_id'].'\');"><i class="fa fa-edit"></i></button>';
                                echo '<button class="btn btn-sm btn-danger" onclick="del_provider(\''.$adm['user_id'].'\');"><i class="fa fa-eye"></i></button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="6">No data available</td></tr>';
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

<?php }} ?>