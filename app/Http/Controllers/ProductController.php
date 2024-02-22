<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Filesystem\Filesystem;
use  Illuminate\Http\UploadedFile;
session_start();

class ProductController extends Controller
{   
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_product(){
        $this->AuthLogin();
        $category = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        
      
        return view('admin.product.add_product')->with('category_product', $category)->with('brand_product', $brand);
    }

    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderBy('tbl_product.product_id','desc')->get();
        $manager_product = view('admin.product.all_product')->with('all_product', $all_product);
        return view('/admin_layout')->with('admin.product.all_product', $manager_product);
    }

    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
        $data['product_describe'] = $request->product_describe;
        $data['category_id'] = $request->category_product;
        $data['brand_id'] = $request->brand_product;
        $data['product_status'] = $request->product_status;
        $data['product_new'] = $request->product_new;


        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            return Redirect::to('/all-product');
        }
        $data['product_image'] = '';
        
        DB::table('tbl_product')->insert($data);
        return Redirect::to('/add-product');
    }

    public function hide_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        // Session::put('message', 'Hiện thương hiệu sản phẩm thành công!');
        return Redirect::to('/all-product');
    }

    public function show_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        // Session::put('message', 'Ẩn thương hiệu sản phẩm thành công!');
        return Redirect::to('/all-product');
    }

    public function not_new_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_new' => 0]);
        // Session::put('message', 'Hiện thương hiệu sản phẩm thành công!');
        return Redirect::to('/all-product');
    }

    public function new_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_new' => 1]);
        // Session::put('message', 'Ẩn thương hiệu sản phẩm thành công!');
        return Redirect::to('/all-product');
    }

    public function edit_product($product_id){
        $this->AuthLogin();
        $category_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.product.update_product')->with('edit_product', $edit_product)
        ->with('category_product', $category_product)
        ->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.product.update_product', $manager_product);

    }

    public function update_product(Request $request, $product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
        $data['product_describe'] = $request->product_describe;
        $data['category_id'] = $request->category_product;
        $data['brand_id'] = $request->brand_product;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            return Redirect::to('/all-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        return Redirect::to('/all-product');
    }

    public function delete_product($product_id){
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        return Redirect::to('/all-product');
    }
    public function product_details($product_id){
        $category_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('tbl_slider.slider_id','desc')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id', $product_id)->get();

        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
        }

        $same_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.product_id',[$product_id])->limit(8)->get();

        return view('pages.product.product_details')
        ->with('category', $category_product)
        ->with('brand', $brand_product)
        ->with('product_details', $details_product)
        ->with('same_product', $same_product)
        ->with('all_slider', $all_slider);
    }
}
