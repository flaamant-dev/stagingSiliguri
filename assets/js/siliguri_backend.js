//============================BACKEND OPERATION============================

//add category
function add_category() {   
    var data = '';

    data += '<form class="form-horizontal form-label-left" method="post" action="category/add_category">';
    data += '<div class="row" style="padding:10px 20px";>';
    data += '<div class="row form-group">';
    data += '<label>Category Name</label>';
    data += '<input type="text" name="cat_name" class="form-control">';
    data += '</div>';
    data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
    data += '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
    data += '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Add</button>';
    data += '</div>';
    data += '</div>';
    data += '</form>';

    jQuery( document ).ready(function( $ ) {
        $('.Bsmall-modal-title').text("Add Category");
        $('#smallModal_body').html(data);
        $('#smallModal').modal("show");       
    });
}
//add SUB category
function add_subcategory(id) {   
    var data = '';

    data += '<form class="form-horizontal form-label-left" method="post" action="category/add_subcategory">';
    data += '<div class="row" style="padding:10px 20px";>';
    data += '<div class="row form-group">';
    data += '<label>Category Name</label>';
    data += '<input type="hidden" name="sub_cat_id" value="'+id+'">';
    data += '<input type="text" name="cat_name" class="form-control">';
    data += '</div>';
    data += '<div class="row form-group">';
    data += '<label>Keywords</label>';
    data += '<textarea name="keywords" rows="4" class="form-control"></textarea>';
    data += '</div>';
    data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
    data += '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
    data += '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Add</button>';
    data += '</div>';
    data += '</div>';
    data += '</form>';

    jQuery( document ).ready(function( $ ) {
        $('.Bsmall-modal-title').text("Add SubCategory");
        $('#smallModal_body').html(data);
        $('#smallModal').modal("show");       
    });
    // $('.Bsmall-modal-title').text("Add Category");
    // $('#smallModal_body').html(data);
    // $('#smallModal').modal("show"); 
}
//edit category
function edit_category(name,id) {   
    var data = '';

    data += '<form class="form-horizontal form-label-left" method="post" action="category/edit_category">';
    data += '<div class="row" style="padding:10px 20px";>';
    data += '<div class="row form-group">';
    data += '<label>Category Name</label>';
    data += '<input type="hidden" name="cat_id" value="'+id+'">';
    data += '<input type="text" name="cat_name" value="'+name+'" class="form-control">';
    data += '</div>';
    data += '<div class="row form-group">';
    data += '<label>Keywords</label>';
    data += '<textarea name="keywords" rows="4" class="form-control"></textarea>';
    data += '</div>';
    data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
    data += '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
    data += '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Update</button>';
    data += '</div>';
    data += '</div>';
    data += '</form>';

    jQuery( document ).ready(function( $ ) {
        $('.Bsmall-modal-title').text("Edit Category");
        $('#smallModal_body').html(data);
        $('#smallModal').modal("show");         
    });
}
//delete category
function del_category(id) {   
    var data = '';

    data += '<form class="form-horizontal form-label-left" method="post" action="category/del_category">';
    data += '<div class="row" style="padding:10px 20px";>';
    data += '<div class="row form-group">';
    data += '<label>Are you sure, you want to delete this category?</label>';
    data += '<input type="hidden" name="cat_id" value="'+id+'">';
    data += '</div>';
    data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
    data += '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
    data += '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
    data += '</div>';
    data += '</div>';
    data += '</form>';

    jQuery( document ).ready(function( $ ) {
        $('.Bsmall-modal-title').text("Delete Category");
        $('#smallModal_body').html(data);
        $('#smallModal').modal("show"); 
    });
}
//exchange category
function exng_category(cat_id,sub_id) {  
    
    $.ajax({  
        url:'category/exng_category',  
        type: 'post',
        data:{cat_id:cat_id,sub_id:sub_id},  
        success:function(data){                      
            $('.Bsmall-modal-title').text("Exchange Category");
            $('#smallModal_body').html(data);
            $('#smallModal').modal("show"); 
        }  
    });
}
//approve seller
function approve_saler(reg_id,user_id) {   
    var data = '';

    data += '<form class="form-horizontal form-label-left" method="post" action="users/approve_saler">';
    data += '<div class="row" style="padding:10px 20px";>';
    data += '<div class="row form-group">';
    data += '<input type="file" name="approved_doc" requird="requird">';
    data += '<input type="hidden" name="business_registry_id" value="'+reg_id+'">';
    data += '<input type="hidden" name="user_id" value="'+user_id+'">';
    data += '</div>';
    data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
    data += '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
    data += '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Approve</button>';
    data += '</div>';
    data += '</div>';
    data += '</form>';

    jQuery( document ).ready(function( $ ) {
        $('.Bsmall-modal-title').text("Approve seller");
        $('#smallModal_body').html(data);
        $('#smallModal').modal("show"); 
    });
}

//decline seller
function decline_saler(user_id) {   
    var data = '';

    data += '<form class="form-horizontal form-label-left" method="post" action="users/decline_saler">';
    data += '<div class="row" style="padding:10px 20px";>';
    data += '<div class="row form-group">';
    data += '<label>Are you sure, you want to decline the request?</label>';
    data += '<input type="hidden" name="user_id" value="'+user_id+'">';
    data += '</div>';
    data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
    data += '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
    data += '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Yes</button>';
    data += '</div>';
    data += '</div>';
    data += '</form>';

    jQuery( document ).ready(function( $ ) {
        $('.Bsmall-modal-title').text("Decline seller");
        $('#smallModal_body').html(data);
        $('#smallModal').modal("show"); 
    });
}

// //add post/offer
function add_offer(user_id) { 
    $.ajax({  
        url:'Post/add_offer_modal',  
        type: 'post',
        data:{user_id:user_id},
        
        success:function(data){  
            $('.Bmedium-modal-title').text("Add Offer");  
            $('#mediumModal_body').html(data);  
            $('#mediumModal').modal("show");  
        }  
    });  
}

// //add reply
// function add_reply(review_id) { 

//     $('.reply').on('click',function(){  
//         // var review_id=
//     });

//     $.ajax({  
//         url:'Reply/add_reply_modal',  
//         type: 'post',
//         data:{review_id:review_id},
        
//         success:function(data){  
//             // $('.Bmedium-modal-title').text("Add Reply");  
//             // $('#mediumModal_body').html(data);  
//             // $('#mediumModal').modal("show");  
//         }  
//     });  
// }

//============================BACKEND OPERATION============================




//============================SELLER OPERATION============================
//action on resources
function resource_action(reg_id,user_id) { 
    
    jQuery( document ).ready(function( $ ) {    
        $.ajax({  
            url:'users/resource_action',  
            type: 'post',
            data:{reg_id:reg_id,user_id:user_id},  
            success:function(data){   
                $('.Bsmall-modal-title').text("Resource Managememt");
                $('#smallModal_body').html(data);
                $('#smallModal').modal("show");  
            }  
        }); 
    });
}

jQuery('.send-review-reply').on('click',function(event){
    event.preventDefault();
    var review_id = jQuery(this).attr("value");

    var data='';
    data += '<form class="form-horizontal form-label-left" method="post">';
    data += '<div class="row" style="padding:10px 20px;">';
    data += '<div class="form-group" style="padding-left:10px;">';
    data += '<input type="hidden" name="review_id" id="review_id1111" value="'+review_id+'">';
    data += '<textarea name="review_reply" id="review_reply1111"></textarea>';
    data += '</div>';
    data += '<div class="form-group col-md-12 col-sm-12 col-xs-12 d-flex justify-content-between">';
    data += '<button type="button" data-dismiss="modal" class="btn btn-info btn-sm">Cancel</button>';
    data += '<button type="button" class="btn btn-warning btn-sm" id="seller-rating-review-reply" onclick="review_reply123();">Reply</button>';
    data += '</div>';
    data += '</div>';
    data += '</form>';

    jQuery('.Bsmall-modal-title').text("Review Reply");
    jQuery('#smallModal_body').html(data);
    jQuery('#smallModal').modal("show");  
});

function review_reply123() {
    var xxx = jQuery('#review_id1111').val();
    jQuery.ajax({  
        url:'review_reply',  
        type: 'post',
        data:{
            review_id:jQuery('#review_id1111').val(),
            review_reply:jQuery('#review_reply1111').val()
        },  
        success:function(data){  
            jQuery('#smallModal').modal("hide");  
            jQuery('#hidden-seller-reply-show-'+xxx).toggle();
        }  
    });  
}

jQuery('.edit-review-reply').on('click',function(event){
    event.preventDefault();
    var review_id = jQuery(this).attr("value");

    var data='';
    data += '<form class="form-horizontal form-label-left" method="post">';
    data += '<div class="row" style="padding:10px 20px;">';
    data += '<div class="form-group" style="padding-left:10px;">';
    data += '<input type="hidden" name="review_id" id="review_id1111" value="'+review_id+'">';
    data += '<textarea name="review_reply" id="review_reply1111"></textarea>';
    data += '</div>';
    data += '<div class="form-group col-md-12 col-sm-12 col-xs-12 d-flex justify-content-between">';
    data += '<button type="button" data-dismiss="modal" class="btn btn-info btn-sm">Cancel</button>';
    data += '<button type="button" class="btn btn-warning btn-md" id="seller-rating-review-reply" onclick="Edit_reply();">Edit</button>';
    data += '</div>';
    data += '</div>';
    data += '</form>';

    jQuery('.Bsmall-modal-title').text("Edit Review Reply");
    jQuery('#smallModal_body').html(data);
    jQuery('#smallModal').modal("show");  
});

function Edit_reply() {
    var xxx = jQuery('#review_id1111').val();
    jQuery.ajax({  
        url:'edit_review_reply',  
        type: 'post',
        data:{
            review_id:jQuery('#review_id1111').val(),
            review_reply:jQuery('#review_reply1111').val()
        },  
        success:function(data){  
            jQuery('#smallModal').modal("hide");  
            jQuery('#seller-responce-reply-show-'+xxx).toggle();
            jQuery('#hidden-seller-reply-show-'+xxx).toggle();
        }  
    });  
}

jQuery('.del-review-reply').on('click',function(event){
    event.preventDefault();
    var review_id = jQuery(this).attr("value");
    var data='';
    data += '<form class="form-horizontal form-label-left" method="post">';
    data += '<div class="row" style="padding:10px 20px";>';
    data += '<div class="form-group" style="padding-left:10px;">';
    data += '<label>Are you sure, you want to delete this review?</label>';
    data += '</div>';
    data += '<input type="hidden" name="review_id" id="review_id" value="'+review_id+'">';
    data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
    data += '<button type="button" data-dismiss="modal" class="btn btn-info btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
    data += '<button type="submit" class="btn btn-warning btn-sm col-md-6 col-sm-6 col-xs-12" onclick="delete_reply();">Delete</button>';
    data += '</div>';
    data += '</div>';
    data += '</form>';

    jQuery('.Bsmall-modal-title').text("Delete Review Reply");
    jQuery('#smallModal_body').html(data);
    jQuery('#smallModal').modal("show");  
});

function delete_reply() {
    var xxx = jQuery('#review_id').val();
    jQuery.ajax({  
        url:'del_review_reply',  
        type: 'post',
        data:{
            review_id:jQuery('#review_id').val(),
            review_reply:jQuery('#review_reply1111').val()
        },  
        success:function(data){  
            jQuery('#smallModal').modal("hide");  
            jQuery('#seller-responce-reply-show-'+xxx).toggle();
            jQuery('#hidden-seller-reply-show-'+xxx).toggle();
        }  
    });  
}

function activate_business_open(business_registry_id) {
    $.ajax({
      url: "activate_business_open",
      type: "post",
      data: { business_registry_id: business_registry_id },
      success: function (data){
        console.log(data);
      }
    });
}

function offer_availability(business_registry_id) {
    $.ajax({
      url: "offer_availability",
      type: "post",
      data: { business_registry_id: business_registry_id },
      success: function (data){
        console.log(data);
      }
    });
}

//============================SELLER OPERATION============================


//============================USER OPERATION============================
//action on resources
function avail_time(day) { 
    
    jQuery( document ).ready(function( $ ) {    
        var enrolment_id =$('#enrolment_id').val();
        $.ajax({  
            url:'users/check_availability',  
            type: 'post',
            data:{enrolment_id:enrolment_id,day:day},  
            success:function(data){ 
                return $('.show_clinic_time').html(data);
            }  
        }); 
    });
}
//============================USER OPERATION============================


//============================DOCTOR OPERATION============================
//action on resources
function get_session_data(id) { 
    
    jQuery( document ).ready(function( $ ) {   
        $.ajax({  
            url:'search_user_session_asd',  
            type: 'post',
            data:{id:id},  
            success:function(data){         
                data = JSON.parse(data);
                localStorage.setItem('token',data.token);
                localStorage.setItem('device-id',data.device_id);
                localStorage.setItem('device-type',data['device_type']);
                localStorage.setItem('user-type',data['user_type']);
            }  
        }); 
    });
}

jQuery( document ).ready(function( $ ) { 

    $(".like-portfolio").each(function(){
          $(this).unbind().click(function(){
              
               var this_portfolio = this;
               var likePortfolio=  $(this_portfolio);
               $.ajax({  
                   url:'pages/like_portfolio',  
                   type: 'post',
                   data:{p_id:likePortfolio.attr('user-id')},  
                   success:function(data){  
                       likePortfolio.children().empty().html(`&nbsp;&nbsp;${data}`);
                   }  
               }); 
           });
     }); 

 });
 

function open_filter() {
    jQuery("#filter-res").style.width = "250px";
}

function close_filter() {
    jQuery("#filter-res").style.width = "0";
}
//============================DOCTOR OPERATION============================