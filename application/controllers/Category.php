<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	//add Category
	public function add_category() {        
        $result = $this->Category_model->add_category();        
        redirect('admin/category');		
    }
      
    //add SUB Category
	public function add_subcategory() {        
        $result = $this->Category_model->add_subcategory();        
        redirect('admin/category');		
    }

	//edit Category
	public function edit_category() {        
        $result = $this->Category_model->edit_category();        
        redirect('admin/category');		
    }

	//delete Category
	public function del_category() {        
        $result = $this->Category_model->del_category();        
        redirect('admin/category');		
    }

	//exchange Category
	public function exng_category() {   
        
        $Categories = $this->Category_model->show_category();
        $sub_id = $this->input->post('sub_id');
        $old_cat_id = $this->input->post('cat_id');
		
		$str = '';

        $str .= '
            <form class="form-horizontal form-label-left" method="post" action="category/exng_category123">
                <div class="row" style="padding:10px 20px";>
                    <div class="row form-group">
                        <label>Category</label>
                        <select name="cat_id" class="form-control">';
                        foreach($Categories as $cat) {
                            $str .= '<option value="'.$cat['cat_id'].'"';
                                if($cat['cat_id'] == $old_cat_id) $str .= ' selected';
                            $str .= '>'.$cat['cat_name'].'</option>';
                        }
                        $str .= '</select>
                        <input type="hidden" name="sub_id" value="'.$sub_id.'">
                    </div>
                    <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                        <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Change</button>
                    </div>
                </div>
            </form>
        ';     
        echo $str;		
    }

	//exchange Category123
	public function exng_category123() {        
        $result = $this->Category_model->exng_category();        
        redirect('admin/category');		
    }

	//enable/disable category
	public function toggle_category() {        
        $result = $this->Category_model->toggle_category();        
        echo $result;		
    }
}