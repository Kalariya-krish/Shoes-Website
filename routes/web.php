<?php

use App\Http\Controllers\admin_controller;
use App\Http\Controllers\website_controller;
use App\Http\Middleware\session_middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('index');
});


// Normal User
Route::view('index','normal/index');
Route::view('men','normal/men');
Route::view('login','normal/login');
Route::view('registration','normal/registration');
Route::view('women','normal/women');
Route::view('kids','normal/kids');
Route::post('registration',[website_controller::class,'registration']);
Route::post('login_user',[website_controller::class,'login_user']);
Route::get('activate_account',[website_controller::class,'activate_account'])->name('activate.account');

Route::view('forget_password_form', 'normal/forget_password_form');
Route::post('forget_password_form_submit', [website_controller::class, 'forget_password_form_submit']);
Route::get('verify_forget_pwd_otp/{email}/{token}', [website_controller::class, 'verify_forget_pwd_otp']);
Route::post('verify_otp_forget_password_action', [website_controller::class, 'verify_otp_forget_password_action']);
Route::post('reset_pwd_action', [website_controller::class, 'reset_pwd_action']);

Route::get('index',[website_controller::class,'fetch_index']);
Route::get('men',[website_controller::class,'men_shoes']);
Route::get('women',[website_controller::class,'women_shoes']);
Route::get('kids',[website_controller::class,'kids_shoes']);
Route::get('men_type_shoes/{type}',[website_controller::class,'men_type_shoes']);
Route::get('women_type_shoes/{type}',[website_controller::class,'women_type_shoes']);
Route::get('kids_type_shoes/{type}',[website_controller::class,'kids_type_shoes']);

Route::view('view_product','normal/view_product');
Route::get('view_product/{id}',[website_controller::class,'view_product']);
Route::get('add_to_cart',[website_controller::class,'add_to_cart']);
Route::get('buy_now',[website_controller::class,'buy_now']);

//Guest user 
    
    Route::view('master_user','user/master_user');
    Route::view('user_index','user/user_index');
    Route::view('user_men','user/user_men');
    Route::view('user_women','user/user_women');
    Route::view('user_kids','user/user_kids');
    Route::get('user_men_type_shoes/{type}',[website_controller::class,'user_men_type_shoes']);
    Route::get('user_women_type_shoes/{type}',[website_controller::class,'user_women_type_shoes']);
    Route::get('user_kids_type_shoes/{type}',[website_controller::class,'user_kids_type_shoes']);
    // Route::view('user_change_password','user/user_change_password');
    Route::view('user_edit_profile','user/user_edit_profile');
    Route::view('user_my_cart','user/user_my_cart');
    Route::view('user_view_product','user/user_view_product');
    Route::get('user_index',[website_controller::class,'fetch_index2'])->middleware('login');
    Route::get('user_men',[website_controller::class,'men_shoes2'])->middleware('login');
    Route::get('user_women',[website_controller::class,'women_shoes2'])->middleware('login');
    Route::get('user_kids',[website_controller::class,'kids_shoes2'])->middleware('login');
    Route::get('user_edit_profile',[website_controller::class,'fetch_edit_profile'])->middleware('login');
    Route::get('user_change_password',[website_controller::class,'fetch_change_password'])->middleware('login');
    Route::post('change_password',[website_controller::class,'change_password'])->middleware('login');
    Route::post('update_data',[website_controller::class,'update_data'])->middleware('login');
    Route::get('user_my_cart',[website_controller::class,'user_my_cart'])->middleware('login');
    Route::get('increment_quantity/{id}',[website_controller::class,'increment_quantity'])->middleware('login');
    Route::get('decrement_quantity/{id}',[website_controller::class,'decrement_quantity'])->middleware('login');
    Route::get('user_remove_from_cart/{id}',[website_controller::class,'user_remove_from_cart'])->middleware('login');
    Route::get('logout_user',[website_controller::class,'logout_user'])->middleware('login');
    Route::get('user_view_product/{id}',[website_controller::class,'user_view_product'])->middleware('login');
    Route::get('user_add_to_cart/{id}',[website_controller::class,'user_add_to_cart'])->middleware('login');
    
    Route::get('user_buy_now/{id}',[website_controller::class,'user_buy_now'])->middleware('login');
    Route::post('user_place_order/{id}',[website_controller::class,'user_place_order'])->middleware('login');

    Route::get('user_my_order',[website_controller::class,'user_my_order'])->middleware('login');    


    Route::get('user_add_to_wishlist/{id}',[website_controller::class,'user_add_to_wishlist'])->middleware('login');
    Route::get('user_remove_to_wishlist/{id}',[website_controller::class,'user_remove_to_wishlist'])->middleware('login');
    Route::get('user_wishlist',[website_controller::class,'user_wishlist'])->middleware('login');

    Route::get('user_set_size6/{id}',[website_controller::class,'user_set_size6'])->middleware('login');
    Route::get('user_set_size7/{id}',[website_controller::class,'user_set_size7'])->middleware('login');
    Route::get('user_set_size8/{id}',[website_controller::class,'user_set_size8'])->middleware('login');
    Route::get('user_set_size9/{id}',[website_controller::class,'user_set_size9'])->middleware('login');
    Route::get('user_set_size10/{id}',[website_controller::class,'user_set_size10'])->middleware('login');
    



//Admin
Route::prefix('admin')->group(function () {
    Route::get('admin_dashboard',[admin_controller::class,'admin_dashboard']);
    Route::get('user',[admin_controller::class,'display_user']);
    Route::get('product',[admin_controller::class,'display_products']);
    Route::get('order',[admin_controller::class,'display_orders']);
    Route::get('add_to_cart',[admin_controller::class,'display_add_to_cart']);
    Route::get('slider',[admin_controller::class,'display_slider']);
    Route::get('offer_discount',[admin_controller::class,'display_offer_discount']);

    Route::get('user_view_more/{email}',[admin_controller::class,'user_view_more']);
    Route::get('user_edit/{email}',[admin_controller::class,'user_edit']);
    Route::post('user_update',[admin_controller::class,'user_update']);
    Route::get('user_delete/{email}',[admin_controller::class,'user_delete']);
    Route::get('user_deactive/{email}',[admin_controller::class,'user_deactive']);
    Route::get('user_active/{email}',[admin_controller::class,'user_active']);
    Route::get('user_add',[admin_controller::class,'user_add']);
    Route::post('user_insert',[admin_controller::class,'user_insert']);

    Route::get('product_view_more/{id}',[admin_controller::class,'product_view_more']);
    Route::get('product_edit/{id}',[admin_controller::class,'product_edit']);
    Route::post('product_update',[admin_controller::class,'product_update']);
    Route::get('product_delete/{id}',[admin_controller::class,'product_delete']);
    Route::get('product_deactive/{id}',[admin_controller::class,'product_deactive']);
    Route::get('product_active/{id}',[admin_controller::class,'product_active']);
    Route::get('product_add',[admin_controller::class,'product_add']);
    Route::post('product_insert',[admin_controller::class,'product_insert']);
    
    Route::get('order_delete/{id}',[admin_controller::class,'order_delete']);
    Route::get('order_notdeliver/{id}',[admin_controller::class,'order_notdeliver']);
    Route::get('order_deliver/{id}',[admin_controller::class,'order_deliver']);

    Route::get('add_to_cart_delete/{id}',[admin_controller::class,'add_to_cart_delete']);

    Route::get('slider_edit/{email}',[admin_controller::class,'slider_edit']);
    Route::post('slider_update',[admin_controller::class,'slider_update']);
    Route::get('slider_delete/{id}',[admin_controller::class,'slider_delete']);
    Route::get('slider_add',[admin_controller::class,'slider_add']);
    Route::post('slider_insert',[admin_controller::class,'slider_insert']);

    Route::get('admin_edit_profile',[admin_controller::class,'admin_profile']);
    Route::post('admin_update',[admin_controller::class,'admin_update']);

    Route::get('admin_logout',[admin_controller::class,'admin_logout']);
});


// INSERT INTO `products` (`id`, `Pro_id`, `Pro_name`, `Pro_type`, `Gender`, `Pro_price`, `Color`, `Ava_size_6`, `Ava_size_7`, `Ava_size_8`, `Ava_size_9`, `Pro_img`, `Other_img1`, `Other_img2`, `Other_img3`, `Other_img4`, `Product_status`, `created_at`, `updated_at`) VALUES ('1', '1', 'White Shoes', 'running shoes', 'Male', '999', 'White', '40', '40', '40', '40', 'men_1.jpg', 'men_1_1.jpg', 'men_1_2.jpg', 'men_1_3.jpg', 'men_1_4.jpg', 'Active', NULL, NULL);