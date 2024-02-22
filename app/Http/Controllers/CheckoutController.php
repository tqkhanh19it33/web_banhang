<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Filesystem\Filesystem;
use  Illuminate\Http\UploadedFile;
use Cart;
session_start();

class CheckoutController extends Controller
{
    
    public function checkout(){
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        return view('pages.checkout.checkout')
        ->with('category', $category_product)
        ->with('brand', $brand_product)
        ->with('all_slider', $all_slider);
    }
    public function save_checkout(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);

        return Redirect('/payment');
    }
    public function payment(){
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        return view('pages.checkout.payment')
        ->with('category', $category_product)
        ->with('brand', $brand_product)
        ->with('all_slider', $all_slider);
    }
    public function order(Request $request){
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        //insert payment method
        $data = array();
        $data['payment_method'] = $request->payment_method;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_details_data = array();
            $order_details_data['order_id'] = $order_id;
            $order_details_data['product_id'] = $v_content->id;
            $order_details_data['product_name'] = $v_content->name;
            $order_details_data['product_price'] = $v_content->price;
            $order_details_data['product_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_details_data);
        }
        if($data['payment_method'] ==1 ){
            Cart::destroy();
            return view('pages.checkout.bank')
            ->with('category', $category_product)
            ->with('brand', $brand_product)
            ->with('all_slider', $all_slider);
        }elseif ($data['payment_method'] == 2) {
            Cart::destroy();
            return view('pages.checkout.momo')
            ->with('category', $category_product)
            ->with('brand', $brand_product)
            ->with('all_slider', $all_slider);
        }else{
            Cart::destroy();
            return view('pages.checkout.cash')
            ->with('category', $category_product)
            ->with('brand', $brand_product)
            ->with('all_slider', $all_slider);
        }
       
      
    }
   
}
