<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
$route['admin/dashboard'] = 'Backend/view/dashboard';
$route['business_profile/(:any)'] = 'Pages/view/business_profile/$1';
$route['doctor_details/(:any)'] = 'Pages/view/doctor_details/$1';
//$route['fb/fb_callback'] = 'Pages/fb_callback';
$route['single_product/(:any)'] = 'Pages/view/single_product/$1';
$route['admin/backSignedin'] = 'Backend/backSignedin';
$route['admin/add_adminn'] = 'Backend/add_admin';
$route['admin/admin_profile/(:any)'] = 'Backend/view/admin_profile/$1';
$route['admin/seller_profile/(:any)'] = 'Backend/view/seller_profile/$1';
$route['admin/enrolled_details/(:any)'] = 'Backend/view/enrolled_details/$1';
$route['admin/(:any)'] = 'Backend/view/$1';
$route['admin/logout'] = 'Backend/logout';
$route['admin/users/(:any)'] = 'Users/$1';
$route['admin/category/(:any)'] = 'Category/$1';
$route['users/userlogin'] = 'Users/userlogin';
$route['users/add_employee'] = 'Users/add_employee';
$route['users/update_user_profile'] = 'Users/update_user_profile';
$route['users/store/users/resource_action'] = 'Users/resource_action';
$route['users/store/(:any)'] = 'Users/view/store/$1';
$route['users/single_product_seller/(:any)'] = 'Users/view/single_product_seller/$1';

$route['Post/add_offer_modal'] = 'Post_new/add_offer_modal';
$route['users/add_newPost'] = 'Post_new/add_newPost';
$route['users/activate_business_open'] = 'Business/activate_business_open';
$route['users/offer_availability'] = 'Business/offer_availability';

$route['users/add_newFeed'] = 'Feed/add_newFeed';

$route['Reply/add_reply_modal'] = 'Reply/add_reply_modal';
$route['users/proReviewSL/(:any)'] = 'Users/view/proReviewSL/$1';
$route['users/business_register'] = 'Users/business_register';
$route['users/review_reply'] = 'Review/review_reply';
$route['users/edit_review_reply'] = 'Review/edit_review_reply';
$route['users/del_review_reply'] = 'Review/del_review_reply';
$route['users/company_logo_update'] = 'Users/company_logo_update';
$route['users/coverPic_update'] = 'Users/coverPic_update';
$route['users/doctor_enroll_form'] = 'Users/doctor_enroll_form';
$route['users/apply_saler_again'] = 'Users/apply_saler_again';
$route['users/product/(:any)'] = 'Product/$1';
$route['users/search_user_session_asd'] = 'Users/search_user_session_asd';
$route['users/logout'] = 'Users/logout';
//$route['doctors/(:any)'] = 'Connect_doctor/index';
$route['users/(:any)'] = 'Users/view/$1';
$route['doctor_details/users/(:any)'] = 'Users/$1';
$route['(:any)'] = 'Pages/view/$1';
$route['pages/like_portfolio'] = 'Pages/like_portfolio';
$route['doctor_details/pages/like_portfolio'] = 'Pages/like_portfolio';
$route['users/pages/like_portfolio'] = 'Pages/like_portfolio';
$route['users/doctor_details/pages/like_portfolio'] = 'Pages/like_portfolio';
$route['default_controller'] = 'Pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;