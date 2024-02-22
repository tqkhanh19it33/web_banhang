<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');
Route::post('/search', 'HomeController@search');
Route::get('/show-news', 'HomeController@show_news');
Route::get('/chi-tiet-tin-tuc/{new_id}', 'NewController@new_details');


//hien thi san pham theo danh muc
Route::get('/danh-muc/{category_id}', 'CategoryProduct@show_category');
Route::get('/thuong-hieu/{brand_id}', 'BrandProduct@show_brand');
Route::get('/chi-tiet-san-pham/{product_id}', 'ProductController@product_details');
//Admin
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard', 'AdminController@login');
Route::get('/show-user', 'UserController@show_user');
Route::get('/delete-user/{customer_id}', 'UserController@delete_user');
//slider
Route::get('/management-slider', 'SliderController@management_slider');
Route::get('/add-slider', 'SliderController@add_slider');
Route::post('/save-slider', 'SliderController@save_slider');
Route::get('/hide-slider/{slider_id}', 'SliderController@hide_slider');
Route::get('/show-slider/{slider_id}', 'SliderController@show_slider');
Route::get('/delete-slider/{slider_id}', 'SliderController@delete_slider');
Route::get('/edit-slider/{slider_id}', 'SliderController@edit_slider');
Route::post('/update-slider/{slider_id}', 'SliderController@update_slider');

//new

Route::get('/all-new','NewController@all_new');
Route::get('/add-new','NewController@add_new');
Route::post('/save-new', 'NewController@save_new');
Route::get('/delete-new/{new_id}', 'NewController@delete_new');
Route::get('/hide-new/{new_id}', 'NewController@hide_new');
Route::get('/show-new/{new_id}', 'NewController@show_new');
Route::get('/edit-new/{new_id}', 'NewController@edit_new');
Route::post('/update-new/{new_id}', 'NewController@update_new');



// quan ly don hang
Route::get('/management-order', 'AdminController@management_order');
Route::get('/delete-order/{customer_id}', 'AdminController@delete_order');


//Category Product
Route::get('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/all-category-product', 'CategoryProduct@all_category_product');
Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::get('/hide-category-product/{category_id}', 'CategoryProduct@hide_category_product');
Route::get('/show-category-product/{category_id}', 'CategoryProduct@show_category_product');
Route::get('/delete-category-product/{category_id}', 'CategoryProduct@delete_category_product');
Route::get('/edit-category-product/{category_id}', 'CategoryProduct@edit_category_product');
Route::post('/update-category-product/{category_id}', 'CategoryProduct@update_category_product');

//Brand Product
Route::get('/add-brand-product', 'BrandProduct@add_brand_product');
Route::get('/all-brand-product', 'BrandProduct@all_brand_product');
Route::post('/save-brand-product', 'BrandProduct@save_brand_product');
Route::get('/hide-brand-product/{brand_id}', 'BrandProduct@hide_brand_product');
Route::get('/show-brand-product/{brand_id}', 'BrandProduct@show_brand_product');
Route::get('/delete-brand-product/{brand_id}', 'BrandProduct@delete_brand_product');
Route::get('/edit-brand-product/{brand_id}', 'BrandProduct@edit_brand_product');
Route::post('/update-brand-product/{brand_id}', 'BrandProduct@update_brand_product');

// Product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/all-product', 'ProductController@all_product');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/hide-product/{product_id}', 'ProductController@hide_product');
Route::get('/show-product/{product_id}', 'ProductController@show_product');
Route::get('/not-new-product/{product_id}', 'ProductController@not_new_product');
Route::get('/new-product/{product_id}', 'ProductController@new_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

//Cart
Route::post('/add-cart','CartController@add_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-cart/{rowId}','CartController@delete_cart');
Route::post('/update-cart','CartController@update_cart');

//Checkout

Route::get('/checkout','CheckoutController@checkout');
Route::post('save-checkout','CheckoutController@save_checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/order','CheckoutController@order');
//login sigup 

Route::get('/login-checkout','UserController@login_checkout');
Route::post('/signup','UserController@signup');
Route::post('/login-customer','UserController@login_customer');
Route::get('/logout-checkout','UserController@logout_checkout');

//new


