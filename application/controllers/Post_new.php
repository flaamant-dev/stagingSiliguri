<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_new extends CI_Controller {
    
    public function add_newPost() {    

        $product_id=$this->input->post('select-category');
        if (!is_dir('./'.$product_id)) {
            mkdir('./'.$product_id, 0777, TRUE);                    
        }

        $config['upload_path']      = './'.$product_id;
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 150000;

        $this->load->library('upload', $config);
        $count = count($_FILES['image']['name']);

        $file_name = NULL;
        for($i = 0; $i < $count; $i++){

            $_FILES['file']['name']       = $_FILES['image']['name'][$i];
            $_FILES['file']['type']       = $_FILES['image']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['image']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['image']['error'][$i];
            $_FILES['file']['size']       = $_FILES['image']['size'][$i];

                
    
            if( $this->upload->do_upload('file')) {                    
                $data = $this->upload->data();
                $file_name[$i] =  $data['file_name'];
            } 
        }

        $file=implode("^^",$file_name);

        $data_product= array(
            'offer_name'            =>  $this->input->post('offer_name'),
            'product_id'            =>  $this->input->post('select_product'),
            'start_date'            =>  $this->input->post('start_date'),
            'end_date'              =>  $this->input->post('end_date'),
            'offer_details'         =>  $this->input->post('offerdetails'),
            'coupon_code'           =>  $this->input->post('coupon_code'),
            'link'                  =>  $this->input->post('reedem'),
            'offer_img'             =>  $file               
        );

        $eb_id=$this->Post_model->add_offer($data_product);
        // redirect('users/post');
        $referer=$_SERVER['HTTP_REFERER'];
        header("Location:$referer");
    }
    
    //add offer modal
    public function add_offer_modal(){
        
        $user_id = $this->input->post('user_id');
        $product =  $this->Product_model->show_product_saler($user_id);

        
        $str = '';
        $str .='
            <form id="add-offer" class="form-horizontal form-label-left" action="Post/add_post" method="post">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body text-center"
                            style="background-color: rgb(235, 245, 253); border: 2px dotted rgb(0, 0, 0); height: 300px;">
                            <div
                                style="position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%);">
                                <div>Drop a file here or click the browse</div>
                                <input type="file" name="image[]" class="form-control" multiple> <i class="fa fa-cloud-upload" style="font-size: 25px;"></i> </input>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label for="" class="label"></label>
                    <select name="select-category" class="style">';
                     
                        foreach ($product as $pro){                            
                        $str.='<option value="'.$pro['deals_id'].'">'.$pro['deals_name'].'</option>';                            
                        }
                    
                    $str.='</select>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="set-ck-sty">
                        <textarea name="pd-name" id="title-pd"
                            placeholder="Offer Title"></textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="d-flex">
                                <div style="width: 100%;">

                                    <textarea name="start-date" id="title-pd" placeholder="Start Date"></textarea>

                                </div>
                            </div>
                        </div>
                        <div
                            class="col-12 col-sm-12 col-md-6 col-lg-6 mt-4 mt-lg-0 mt-md-0 mt-xl-0">
                            <div class="d-flex">
                                <div style="width: 100%;">
                                <textarea name="end-date" id="title-pd" placeholder="End Date"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="set-ck-sty">
                        <textarea id="off-detail" name="offerdetails"
                            placeholder="Offer Detail"></textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div>
                        <input type="text" name="couponcode" class="style">
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div>
                        <label for="reedem" class="label">Link to reedem</label>
                        <input type="text" name="reedem" class="style">
                    </div>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary font-medium">Done</button>
            </div>
        </form>';

        echo $str;
    }

    
}