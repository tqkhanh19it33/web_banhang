<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class UserController extends Controller
{
    public function login_checkout(){
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        return view('pages.checkout.login_checkout')
        ->with('category', $category_product)
        ->with('brand', $brand_product)
        ->with('all_slider', $all_slider);
    }
    public function signup(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return Redirect('/checkout');
    }

    public function logout_checkout(){
        Session::flush();
        return Redirect('/login-checkout');
    }
    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customer')->where('customer_email', $email)->where('customer_password', $password)->first();

        if($result){
            Session::put('customer_id', $result->customer_id);
            return Redirect('/checkout');
        }else{
            return Redirect('/login-checkout');
        }
       

       
    }

    public function show_user(){
        $all_user = DB::table('tbl_customer')->select('tbl_customer.*')->orderBy('tbl_customer.customer_id','desc')->get();
        $manager_user = view('admin.user.show_user')->with('all_user', $all_user);
        return view('admin.user.show_user')->with('all_user', $all_user)->with('manager_user', $manager_user);
    }
    public function delete_user($customer_id){
        DB::table('tbl_customer')->where('customer_id', $customer_id)->delete();
        return Redirect::to('/show-user');
    }
}
