<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{   

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_brand_product(){
        $this->AuthLogin();
        return view('/admin.brand.add_brand_product');
    }

    public function all_brand_product(){
        $this->AuthLogin();
        $all_brand_product = DB::table('tbl_brand')->get();
        $manager_brand_product = view('admin.brand.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('/admin_layout')->with('admin.brand.all_brand_product', $manager_brand_product);
    }

    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_describe'] = $request->brand_describe;
        $data['brand_status'] = $request->brand_status;

        DB::table('tbl_brand')->insert($data);
        // Session::put('message', 'Thêm thương hiệu sản phẩm thành công!');
        return Redirect::to('/all-brand-product');
    }

    public function hide_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_id)->update(['brand_status' => 0]);
        // Session::put('message', 'Hiện thương hiệu sản phẩm thành công!');
        return Redirect::to('/all-brand-product');
    }

    public function show_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_id)->update(['brand_status' => 1]);
        // Session::put('message', 'Ẩn thương hiệu sản phẩm thành công!');
        return Redirect::to('/all-brand-product');
    }

    public function edit_brand_product($brand_id){
        $this->AuthLogin();
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_id)->get();
        $manager_brand_product = view('admin.brand.update_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.brand.update_brand_product', $manager_brand_product);

    }

    public function update_brand_product(Request $request, $brand_id){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_describe'] = $request->brand_describe;

        DB::table('tbl_brand')->where('brand_id', $brand_id)->update($data);
        return Redirect::to('/all-brand-product');
    }

    public function delete_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_id)->delete();
        return Redirect::to('/all-brand-product');
    }

    public function show_brand($brand_id){
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        $name_brand = DB::table('tbl_brand')->where('tbl_brand.brand_id', $brand_id)->get();
        $brand_by_id = DB::table('tbl_product')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('tbl_product.brand_id', $brand_id)->where('product_status', '0')->get();
        return view('pages.brand.show_brand')
        ->with('category', $category_product)
        ->with('brand', $brand_product)
        ->with('brand_by_id', $brand_by_id)
        ->with('name_brand', $name_brand)
        ->with('all_slider', $all_slider);
    }
}
